<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 20/10/2019
 * Time: 20:55
 */

namespace CodingByJerez\MondialRelayBundle\Services;


use CodingByJerez\MondialRelayBundle\Exception\AdresseException;
use CodingByJerez\MondialRelayBundle\Exception\CreationEtiquetteException;
use CodingByJerez\MondialRelayBundle\Model\Parcel\AdresseModel;
use CodingByJerez\MondialRelayBundle\Model\Parcel\EtiquetteModel;

use CodingByJerez\MondialRelayBundle\Model\Creation\ExpeditionModel;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;



/**
 * Class ShipmentCreation
 * @package CodingByJerez\MondialRelayBundle\Services
 */
class CBJCreationEtiquette extends AbstractMondialRelay
{

    private const METHOD = "WSI2_CreationEtiquette";

    /** @var ExpeditionModel  */
    private $request;


    /**
     * ShipmentCreation constructor.
     * @param array $api_identifiants
     * @param array $adresse_commerce
     * @param ValidatorInterface $validator
     * @param TranslatorInterface $translator
     */
    public function __construct(array $api_identifiants, array $adresse_commerce, ValidatorInterface $validator, TranslatorInterface $translator)
    {
        parent::__construct($api_identifiants, $validator, $translator);

        $adresse = new AdresseModel();
        $adresse
            ->setIdentite($adresse_commerce["identite"])
            ->setIdentiteComplement($adresse_commerce["identite_complement"] ?? null)
            ->setAdresse($adresse_commerce["adresse"])
            ->setAdresseComplement($adresse_commerce["adresse_complement"] ?? null)
            ->setCodePostal($adresse_commerce["code_postal"])
            ->setVille($adresse_commerce["ville"])
            ->setPaysCode($adresse_commerce["pays_code"])
            ->setTel($adresse_commerce["tel"])
            ->setTel2($adresse_commerce["tel2"] ?? null)
            ->setCourriel($adresse_commerce["courriel"] ?? null)
            ->setLangage($adresse_commerce["language"])
        ;

        $this->request = new ExpeditionModel();
        $this->request->setEnseigne($this->websiteId);
        $this->setAdresseExpediteur($adresse);

        return $this;
    }


    /**
     * @param AdresseModel $adresse
     * @return $this
     * @throws \CodingByJerez\MondialRelayBundle\Exception\AbstractValidatorException
     */
    public function setAdresseExpediteur(AdresseModel $adresse)
    {
        if(count($errors = $this->validator->validate($adresse)) == 0){
            $this->request
                ->setExpediteurLangage($adresse->getLangage())
                ->setExpediteurAdresseLigne1($adresse->getIdentite())
                ->setExpediteurAdresseLigne2($adresse->getIdentiteComplement())
                ->setExpediteurAdresseLigne3($adresse->getAdresse())
                ->setExpediteurAdresseLigne4($adresse->getAdresseComplement() ?? null)
                ->setExpediteurVille($adresse->getVille())
                ->setExpediteurCP($adresse->getCodePostal())
                ->setExpediteurPays($adresse->getPaysCode())
                ->setExpediteurTel1($adresse->getTel())
                ->setExpediteurTel2($adresse->getTel2() ?? null)
                ->setExpediteurCourriel($adresse->getCourriel() ?? null)
            ;
        }else throw (new AdresseException("error Parcel Adresse Expediteur"))->setErrorValidator($this->createErrorValidationArray($errors, "Error Parcel Adresse Expediteur: "));

        return $this;
    }

    /**
     * @param AdresseModel $adresse
     * @return $this
     * @throws \CodingByJerez\MondialRelayBundle\Exception\AbstractValidatorException
     */
    private function setAdresseDestinataire(AdresseModel $adresse)
    {
        if(count($errors = $this->validator->validate($adresse)) == 0){
            $this->request
                ->setDestinataireLangage($adresse->getLangage())
                ->setDestinataireAdresseLigne1($adresse->getIdentite())
                ->setDestinataireAdresseLigne2($adresse->getIdentiteComplement())
                ->setDestinataireAdresseLigne3($adresse->getAdresse())
                ->setDestinataireAdresseLigne4($adresse->getAdresseComplement() ?? null)
                ->setDestinataireVille($adresse->getVille())
                ->setDestinataireCP($adresse->getCodePostal())
                ->setDestinatairePays($adresse->getPaysCode())
                ->setDestinataireTel1($adresse->getTel())
                ->setDestinataireTel2($adresse->getTel2() ?? null)
                ->setDestinataireCourriel($adresse->getCourriel() ?? null)
            ;
        }else throw (new AdresseException("error Parcel Adresse Destinataire"))->setErrorValidator($this->createErrorValidationArray($errors, "Error Parcel Adresse Destinataire: "));

        return $this;
    }

    /**
     * @param string $modeCollecte (CCC|CDR|CDS|REL)
     * @param string $modeLivraison (LCC|LD1|LDS|24R|24L|24X|ESP|DRI)
     * @param AdresseModel $adresse
     * @param int $poids
     * @param int $nombreColis
     * @param int $contreRemboursementMontant
     * @return CBJCreationEtiquette
     */
    public function initEtiquette(
        string $modeCollecte,
        string $modeLivraison,
        AdresseModel $adresse,
        int $poids,
        int $nombreColis,
        int $contreRemboursementMontant
    ): self
    {
        $this->setAdresseDestinataire($adresse);
        $this->request
            ->setModeCollecte($modeCollecte)
            ->setModeLivraison($modeLivraison)
            ->setPoids($poids)
            ->setNombreColis($nombreColis)
            ->setContreRemboursementMontant($contreRemboursementMontant)
        ;

        return $this;
    }

    /**
     * @return EtiquetteModel
     * @throws \CodingByJerez\MondialRelayBundle\Exception\AbstractValidatorException
     */
    public function createEtiquette(): EtiquetteModel
    {

        if(count($errors = $this->validator->validate($this->request)) > 0)
            throw (new CreationEtiquetteException("Error Parcel Creation Etiquette"))->setErrorValidator($this->createErrorValidationArray($errors, "Error Parcel Creation Etiquette: "));

        $parameterArray = $this->serializer($this->request);

        $result = $this->callWebApi(self::METHOD, $parameterArray);

        if(($code = $result[self::METHOD ."Result"]["STAT"]) != 0)
            throw new \InvalidArgumentException($this->translator->trans("status_code.code_{$code}", [], "cbj_mondial_relay"), $code);

        return new EtiquetteModel($result[self::METHOD ."Result"]);
    }

    /**
     * @param int $collectePointRelaisID
     * @param string $collectePointRelaisPays
     * @return CBJCreationEtiquette
     */
    public function setCollectePointRelais(int $collectePointRelaisID, string $collectePointRelaisPays = "XX"): self
    {
        $this->request
            ->setCollectePointRelaisPays($collectePointRelaisPays)
            ->setCollectePointRelaisID($collectePointRelaisID)
        ;

        return $this;
    }

    /**
     * @param int $livraisonPointRelaisID
     * @param string $livraisonPointRelaisPays
     * @return CBJCreationEtiquette
     */
    public function setLivraisonPointRelais(int $livraisonPointRelaisID, string $livraisonPointRelaisPays): self
    {
        $this->request
            ->setLivraisonPointRelaisID($livraisonPointRelaisID)
            ->setLivraisonPointRelaisPays($livraisonPointRelaisPays)
        ;

        return $this;
    }


    /**
     * @param string $numeroDossier
     * @return CBJCreationEtiquette
     */
    public function setOptionNumeroDossier(string $numeroDossier): self
    {
        $this->request->setNumeroDossier($numeroDossier);

        return $this;
    }

    /**
     * @param string $numeroClient
     * @return CBJCreationEtiquette
     */
    public function setOptionNumeroClient(string $numeroClient): self
    {
        $this->request->setNumeroClient($numeroClient);

        return $this;
    }

    /**
     * @param int $longueur
     * @return CBJCreationEtiquette
     */
    public function setOptionLongueur(int $longueur): self
    {
        $this->request->setLongueur($longueur);

        return $this;
    }

    /**
     * @param string $taille
     * @return CBJCreationEtiquette
     */
    public function setOptionTaille(string $taille): self
    {
        $this->request->setTaille($taille);

        return $this;
    }

    /**
     * @param string $contreRemboursementDevise
     * @return CBJCreationEtiquette
     */
    public function setOptionContreRemboursementDevise(string $contreRemboursementDevise): self
    {
        $this->request->setContreRemboursementDevise($contreRemboursementDevise);

        return $this;
    }

    /**
     * @param int $expeditionValeur
     * @return CBJCreationEtiquette
     */
    public function setOptionExpeditionValeur(int $expeditionValeur): self
    {
        $this->request->setExpeditionValeur($expeditionValeur);

        return $this;
    }

    /**
     * @param string $expeditionDevise
     * @return CBJCreationEtiquette
     */
    public function setOptionExpeditionDevise(string $expeditionDevise): self
    {
        $this->request->setExpeditionDevise($expeditionDevise);

        return $this;
    }

    /**
     * @param bool $demandeAvisage
     * @return CBJCreationEtiquette
     */
    public function setOptionDemandeAvisage(bool $demandeAvisage): self
    {
        $this->request->setDemandeAvisage($demandeAvisage);

        return $this;
    }

    /**
     * @param bool $demandeReprise
     * @return CBJCreationEtiquette
     */
    public function setOptionDemandeReprise(bool $demandeReprise): self
    {
        $this->request->setDemandeReprise($demandeReprise);

        return $this;
    }

    /**
     * @param int $tempsMontage
     * @return CBJCreationEtiquette
     */
    public function setOptionTempsMontage(int $tempsMontage): self
    {
        $this->request->setTempsMontage($tempsMontage);

        return $this;
    }

    /**
     * @param bool $demandeRendezVous
     * @return CBJCreationEtiquette
     */
    public function setOptionDemandeRendezVous(bool $demandeRendezVous): self
    {
        $this->request->setDemandeRendezVous($demandeRendezVous);

        return $this;
    }

    /**
     * @param string $assurance
     * @return CBJCreationEtiquette
     */
    public function setOptionAssurance(string $assurance): self
    {
        $this->request->setAssurance($assurance);

        return $this;
    }

    /**
     * @param string $instructions
     * @return CBJCreationEtiquette
     */
    public function setOptionInstructions(string $instructions): self
    {
        $this->request->setInstructions($instructions);

        return $this;
    }

    /**
     * @param string $texte
     * @return CBJCreationEtiquette
     */
    public function setOptionTexte(string $texte): self
    {
        $this->request->setTaille($texte);

        return $this;
    }

}
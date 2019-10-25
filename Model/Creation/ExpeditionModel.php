<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 22/10/2019
 * Time: 14:56
 */

namespace CodingByJerez\MondialRelayBundle\Model\Creation;

use Symfony\Component\Serializer\Annotation\SerializedName;


class ExpeditionModel
{

    /**
     * @var string
     *
     * @SerializedName("Enseigne")
     */
    private $enseigne;


    /**
     * @var null|string
     * (null for not error expression validation)
     * @SerializedName("ModeCol")
     */
    private $modeCollecte;


    /**
     * @var null|string
     * (null for not error expression validation)
     * @SerializedName("ModeLiv")
     */
    private $modeLivraison;


    /**
     * @var null|string
     *
     * @SerializedName("NDossier")
     */
    private $numeroDossier;

    /**
     * @var null|string
     *
     * @SerializedName("NClient")
     */
    private $numeroClient;





    /**
     * @var string
     *
     * @SerializedName("Expe_Langage")
     */
    private $expediteurLangage;

    /**
     * @var string
     *
     * @SerializedName("Expe_Ad1")
     */
    private $expediteurAdresseLigne1;

    /**
     * @var null|string
     *
     * @SerializedName("Expe_Ad2")
     */
    private $expediteurAdresseLigne2;

    /**
     * @var string
     *
     * @SerializedName("Expe_Ad3")
     */
    private $expediteurAdresseLigne3;

    /**
     * @var null|string
     *
     * @SerializedName("Expe_Ad4")
     */
    private $expediteurAdresseLigne4;

    /**
     * @var string
     *
     * @SerializedName("Expe_Ville")
     */
    private $expediteurVille;

    /**
     * @var string
     *
     * @SerializedName("Expe_CP")
     */
    private $expediteurCP;

    /**
     * @var string
     *
     * @SerializedName("Expe_Pays")
     */
    private $expediteurPays;

    /**
     * @var string
     *
     * @SerializedName("Expe_Tel1")
     */
    private $expediteurTel1;


    /**
     * @var null|string
     *
     * @SerializedName("Expe_Tel2")
     */
    private $expediteurTel2;

    /**
     * @var null|string
     *
     * @SerializedName("Expe_Mail")
     */
    private $expediteurCourriel;







    /**
     * @var string
     *
     * @SerializedName("Dest_Langage")
     */
    private $destinataireLangage;

    /**
     * @var string
     *
     * @SerializedName("Dest_Ad1")
     */
    private $destinataireAdresseLigne1;

    /**
     * @var null|string
     *
     * @SerializedName("Dest_Ad2")
     */
    private $destinataireAdresseLigne2;

    /**
     * @var string
     *
     * @SerializedName("Dest_Ad3")
     */
    private $destinataireAdresseLigne3;

    /**
     * @var null|string
     *
     * @SerializedName("Dest_Ad4")
     */
    private $destinataireAdresseLigne4;

    /**
     * @var string
     *
     * @SerializedName("Dest_Ville")
     */
    private $destinataireVille;

    /**
     * @var string
     *
     * @SerializedName("Dest_CP")
     */
    private $destinataireCP;

    /**
     * @var string
     *
     * @SerializedName("Dest_Pays")
     */
    private $destinatairePays;

    /**
     * @var string
     *
     * @SerializedName("Dest_Tel1")
     */
    private $destinataireTel1;


    /**
     * @var null|string
     *
     * @SerializedName("Dest_Tel2")
     */
    private $destinataireTel2;

    /**
     * @var null|string
     *
     * @SerializedName("Dest_Mail")
     */
    private $destinataireCourriel;









    /**
     * @var integer
     *
     * @SerializedName("Poids")
     */
    private $poids;

    /**
     * @var null|integer
     *
     * @SerializedName("Longueur")
     */
    private $longueur;

    /**
     * @var null|string
     *
     * @SerializedName("Taille")
     */
    private $taille;


    /**
     * @var integer
     *
     * @SerializedName("NbColis")
     */
    private $nombreColis;

    /**
     * @var integer
     *
     * @SerializedName("CRT_Valeur")
     */
    private $contreRemboursementMontant;

    /**
     * @var null|string
     *
     * @SerializedName("CRT_Devise")
     */
    private $contreRemboursementDevise;

    /**
     * @var null|integer
     *
     * @SerializedName("Exp_Valeur")
     */
    private $expeditionValeur;

    /**
     * @var null|string
     *
     * @SerializedName("Exp_Devise")
     */
    private $expeditionDevise;

    /**
     * @var null|string
     *
     * @SerializedName("COL_Rel_Pays")
     */
    private $collectePointRelaisPays;

    /**
     * @var integer
     *
     * @SerializedName("COL_Rel")
     */
    private $collectePointRelaisID;

    /**
     * @var null|string
     *
     * @SerializedName("LIV_Rel_Pays")
     */
    private $livraisonPointRelaisPays;

    /**
     * @var null|integer
     *
     * @SerializedName("LIV_Rel")
     */
    private $livraisonPointRelaisID;

    /**
     * @var null|string
     *
     * @SerializedName("TAvisage")
     */
    private $demandeAvisage;

    /**
     * @var null|string
     *
     * @SerializedName("TReprise")
     */
    private $demandeReprise;

    /**
     * @var null|integer
     *
     * @SerializedName("Montage")
     */
    private $tempsMontage;

    /**
     * @var null|string
     *
     * @SerializedName("TRDV")
     */
    private $demandeRendezVous;

    /**
     * @var null|string
     *
     * @SerializedName("Assurance")
     */
    private $assurance;

    /**
     * @var null|string
     *
     * @SerializedName("Instructions")
     */
    private $instructions;



    /**
     * @return string
     */
    public function getEnseigne(): string
    {
        return $this->enseigne;
    }

    /**
     * @param string $enseigne
     * @return ExpeditionModel
     */
    public function setEnseigne(string $enseigne): self
    {
        $this->enseigne = str_pad($enseigne,8);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getModeCollecte(): ?string
    {
        return $this->modeCollecte;
    }

    /**
     * @param string $modeCollecte
     * @return ExpeditionModel
     */
    public function setModeCollecte(string $modeCollecte): self
    {
        $this->modeCollecte = strtoupper($modeCollecte);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getModeLivraison(): ?string
    {
        return $this->modeLivraison;
    }

    /**
     * @param null|string $modeLivraison
     * @return ExpeditionModel
     */
    public function setModeLivraison(?string $modeLivraison): self
    {
        $this->modeLivraison = strtoupper($modeLivraison);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumeroDossier(): ?string
    {
        return $this->numeroDossier;
    }

    /**
     * @param null|string $numeroDossier
     * @return ExpeditionModel
     */
    public function setNumeroDossier(?string $numeroDossier): self
    {
        $this->numeroDossier = strtoupper($numeroDossier);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumeroClient(): ?string
    {
        return $this->numeroClient;
    }

    /**
     * @param null|string $numeroClient
     * @return ExpeditionModel
     */
    public function setNumeroClient(?string $numeroClient): self
    {
        $this->numeroClient = strtoupper($numeroClient);
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurLangage(): string
    {
        return $this->expediteurLangage;
    }

    /**
     * @param string $expediteurLangage
     * @return ExpeditionModel
     */
    public function setExpediteurLangage(string $expediteurLangage): self
    {
        $this->expediteurLangage = strtoupper($expediteurLangage);
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurAdresseLigne1(): string
    {
        return $this->expediteurAdresseLigne1;
    }

    /**
     * @param string $expediteurAdresseLigne1
     * @return ExpeditionModel
     */
    public function setExpediteurAdresseLigne1(string $expediteurAdresseLigne1): self
    {
        $this->expediteurAdresseLigne1 = $expediteurAdresseLigne1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpediteurAdresseLigne2(): ?string
    {
        return $this->expediteurAdresseLigne2;
    }

    /**
     * @param null|string $expediteurAdresseLigne2
     * @return ExpeditionModel
     */
    public function setExpediteurAdresseLigne2(?string $expediteurAdresseLigne2): self
    {
        $this->expediteurAdresseLigne2 = $expediteurAdresseLigne2;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurAdresseLigne3(): string
    {
        return $this->expediteurAdresseLigne3;
    }

    /**
     * @param string $expediteurAdresseLigne3
     * @return ExpeditionModel
     */
    public function setExpediteurAdresseLigne3(string $expediteurAdresseLigne3): self
    {
        $this->expediteurAdresseLigne3 = $expediteurAdresseLigne3;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpediteurAdresseLigne4(): ?string
    {
        return $this->expediteurAdresseLigne4;
    }

    /**
     * @param null|string $expediteurAdresseLigne4
     * @return ExpeditionModel
     */
    public function setExpediteurAdresseLigne4(?string $expediteurAdresseLigne4): self
    {
        $this->expediteurAdresseLigne4 = $expediteurAdresseLigne4;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurVille(): string
    {
        return $this->expediteurVille;
    }

    /**
     * @param string $expediteurVille
     * @return ExpeditionModel
     */
    public function setExpediteurVille(string $expediteurVille): self
    {
        $this->expediteurVille = $expediteurVille;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurCP(): string
    {
        return $this->expediteurCP;
    }

    /**
     * @param string $expediteurCP
     * @return ExpeditionModel
     */
    public function setExpediteurCP(string $expediteurCP): self
    {
        $this->expediteurCP = $expediteurCP;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurPays(): string
    {
        return $this->expediteurPays;
    }

    /**
     * @param string $expediteurPays
     * @return ExpeditionModel
     */
    public function setExpediteurPays(string $expediteurPays): self
    {
        $this->expediteurPays = $expediteurPays;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpediteurTel1(): string
    {
        return $this->expediteurTel1;
    }

    /**
     * @param string $expediteurTel1
     * @return ExpeditionModel
     */
    public function setExpediteurTel1(string $expediteurTel1): self
    {
        $this->expediteurTel1 = $expediteurTel1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpediteurTel2(): ?string
    {
        return $this->expediteurTel2;
    }

    /**
     * @param null|string $expediteurTel2
     * @return ExpeditionModel
     */
    public function setExpediteurTel2(?string $expediteurTel2): self
    {
        $this->expediteurTel2 = $expediteurTel2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpediteurCourriel(): ?string
    {
        return $this->expediteurCourriel;
    }

    /**
     * @param null|string $expediteurCourriel
     * @return ExpeditionModel
     */
    public function setExpediteurCourriel(?string $expediteurCourriel): self
    {
        $this->expediteurCourriel = $expediteurCourriel;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireLangage(): string
    {
        return $this->destinataireLangage;
    }

    /**
     * @param string $destinataireLangage
     * @return ExpeditionModel
     */
    public function setDestinataireLangage(string $destinataireLangage): self
    {
        $this->destinataireLangage = $destinataireLangage;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireAdresseLigne1(): string
    {
        return $this->destinataireAdresseLigne1;
    }

    /**
     * @param string $destinataireAdresseLigne1
     * @return ExpeditionModel
     */
    public function setDestinataireAdresseLigne1(string $destinataireAdresseLigne1): self
    {
        $this->destinataireAdresseLigne1 = $destinataireAdresseLigne1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDestinataireAdresseLigne2(): ?string
    {
        return $this->destinataireAdresseLigne2;
    }

    /**
     * @param null|string $destinataireAdresseLigne2
     * @return ExpeditionModel
     */
    public function setDestinataireAdresseLigne2(?string $destinataireAdresseLigne2): self
    {
        $this->destinataireAdresseLigne2 = $destinataireAdresseLigne2;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireAdresseLigne3(): string
    {
        return $this->destinataireAdresseLigne3;
    }

    /**
     * @param string $destinataireAdresseLigne3
     * @return ExpeditionModel
     */
    public function setDestinataireAdresseLigne3(string $destinataireAdresseLigne3): self
    {
        $this->destinataireAdresseLigne3 = $destinataireAdresseLigne3;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDestinataireAdresseLigne4(): ?string
    {
        return $this->destinataireAdresseLigne4;
    }

    /**
     * @param null|string $destinataireAdresseLigne4
     * @return ExpeditionModel
     */
    public function setDestinataireAdresseLigne4(?string $destinataireAdresseLigne4): self
    {
        $this->destinataireAdresseLigne4 = $destinataireAdresseLigne4;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireVille(): string
    {
        return $this->destinataireVille;
    }

    /**
     * @param string $destinataireVille
     * @return ExpeditionModel
     */
    public function setDestinataireVille(string $destinataireVille): self
    {
        $this->destinataireVille = $destinataireVille;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireCP(): string
    {
        return $this->destinataireCP;
    }

    /**
     * @param string $destinataireCP
     * @return ExpeditionModel
     */
    public function setDestinataireCP(string $destinataireCP): self
    {
        $this->destinataireCP = $destinataireCP;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinatairePays(): string
    {
        return $this->destinatairePays;
    }

    /**
     * @param string $destinatairePays
     * @return ExpeditionModel
     */
    public function setDestinatairePays(string $destinatairePays): self
    {
        $this->destinatairePays = $destinatairePays;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinataireTel1(): string
    {
        return $this->destinataireTel1;
    }

    /**
     * @param string $destinataireTel1
     * @return ExpeditionModel
     */
    public function setDestinataireTel1(string $destinataireTel1): self
    {
        $this->destinataireTel1 = $destinataireTel1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDestinataireTel2(): ?string
    {
        return $this->destinataireTel2;
    }

    /**
     * @param null|string $destinataireTel2
     * @return ExpeditionModel
     */
    public function setDestinataireTel2(?string $destinataireTel2): self
    {
        $this->destinataireTel2 = $destinataireTel2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDestinataireCourriel(): ?string
    {
        return $this->destinataireCourriel;
    }

    /**
     * @param null|string $destinataireCourriel
     * @return ExpeditionModel
     */
    public function setDestinataireCourriel(?string $destinataireCourriel): self
    {
        $this->destinataireCourriel = $destinataireCourriel;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPoids(): int
    {
        return $this->poids;
    }

    /**
     * @param integer $poids
     * @return ExpeditionModel
     */
    public function setPoids(int $poids): self
    {
        $this->poids = $poids;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    /**
     * @param null|string $longueur
     * @return ExpeditionModel
     */
    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTaille(): ?string
    {
        return $this->taille;
    }

    /**
     * @param null|string $taille
     * @return ExpeditionModel
     */
    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;
        return $this;
    }

    /**
     * @return integer
     */
    public function getNombreColis(): int
    {
        return $this->nombreColis;
    }

    /**
     * @param integer $nombreColis
     * @return ExpeditionModel
     */
    public function setNombreColis(int $nombreColis): self
    {
        $this->nombreColis = $nombreColis;
        return $this;
    }

    /**
     * @return integer
     */
    public function getContreRemboursementMontant(): int
    {
        return $this->contreRemboursementMontant;
    }

    /**
     * @param integer $contreRemboursementMontant
     * @return ExpeditionModel
     */
    public function setContreRemboursementMontant(int $contreRemboursementMontant): self
    {
        $this->contreRemboursementMontant = $contreRemboursementMontant;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContreRemboursementDevise(): ?string
    {
        return $this->contreRemboursementDevise;
    }

    /**
     * @param null|string $contreRemboursementDevise
     * @return ExpeditionModel
     */
    public function setContreRemboursementDevise(?string $contreRemboursementDevise): self
    {
        $this->contreRemboursementDevise = $contreRemboursementDevise;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpeditionValeur(): ?string
    {
        return $this->expeditionValeur;
    }

    /**
     * @param null|string $expeditionValeur
     * @return ExpeditionModel
     */
    public function setExpeditionValeur(?string $expeditionValeur): self
    {
        $this->expeditionValeur = $expeditionValeur;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpeditionDevise(): ?string
    {
        return $this->expeditionDevise;
    }

    /**
     * @param null|string $expeditionDevise
     * @return ExpeditionModel
     */
    public function setExpeditionDevise(?string $expeditionDevise): self
    {
        $this->expeditionDevise = $expeditionDevise;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCollectePointRelaisPays(): ?string
    {
        return $this->collectePointRelaisPays;
    }

    /**
     * @param null|string $collectePointRelaisPays
     * @return ExpeditionModel
     */
    public function setCollectePointRelaisPays(?string $collectePointRelaisPays): self
    {
        $this->collectePointRelaisPays = $collectePointRelaisPays;
        return $this;
    }

    /**
     * @return integer
     */
    public function getCollectePointRelaisID(): int
    {
        return $this->collectePointRelaisID;
    }

    /**
     * @param integer $collectePointRelaisID
     * @return ExpeditionModel
     */
    public function setCollectePointRelaisID(int $collectePointRelaisID): self
    {
        $this->collectePointRelaisID = $collectePointRelaisID;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLivraisonPointRelaisPays(): ?string
    {
        return $this->livraisonPointRelaisPays;
    }

    /**
     * @param null|string $livraisonPointRelaisPays
     * @return ExpeditionModel
     */
    public function setLivraisonPointRelaisPays(?string $livraisonPointRelaisPays): self
    {
        $this->livraisonPointRelaisPays = $livraisonPointRelaisPays;
        return $this;
    }

    /**
     * @return null|integer
     */
    public function getLivraisonPointRelaisID(): ?int
    {
        return $this->livraisonPointRelaisID;
    }

    /**
     * @param null|integer $livraisonPointRelaisID
     * @return ExpeditionModel
     */
    public function setLivraisonPointRelaisID(?int $livraisonPointRelaisID): self
    {
        $this->livraisonPointRelaisID = $livraisonPointRelaisID;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDemandeAvisage(): ?string
    {
        return $this->demandeAvisage;
    }

    /**
     * @param bool $demandeAvisage
     * @return ExpeditionModel
     */
    public function setDemandeAvisage(bool $demandeAvisage): self
    {
        $this->demandeAvisage = $demandeAvisage ? "O" : "N";
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDemandeReprise(): ?string
    {
        return $this->demandeReprise;
    }

    /**
     * @param bool $demandeReprise
     * @return ExpeditionModel
     */
    public function setDemandeReprise(bool $demandeReprise): self
    {
        $this->demandeReprise = $demandeReprise ? "O" : "N";
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTempsMontage(): ?string
    {
        return $this->tempsMontage;
    }

    /**
     * @param null|string $tempsMontage
     * @return ExpeditionModel
     */
    public function setTempsMontage(?string $tempsMontage): self
    {
        $this->tempsMontage = $tempsMontage;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDemandeRendezVous(): ?string
    {
        return $this->demandeRendezVous;
    }

    /**
     * @param bool $demandeRendezVous
     * @return ExpeditionModel
     */
    public function setDemandeRendezVous(bool $demandeRendezVous): self
    {
        $this->demandeRendezVous = $demandeRendezVous ? "O" : "N";
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    /**
     * @param bool $assurance
     * @return ExpeditionModel
     */
    public function setAssurance(bool $assurance): self
    {
        $this->assurance = $assurance ? "O" : "N";
        return $this;
    }

    /**
     * @return null|string
     */
    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    /**
     * @param null|string $instructions
     * @return ExpeditionModel
     */
    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;
        return $this;
    }





}
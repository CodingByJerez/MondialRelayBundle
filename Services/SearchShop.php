<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 17/10/2019
 * Time: 19:27
 */

namespace CodingByJerez\MondialRelayBundle\Services;


use CodingByJerez\MondialRelayBundle\Exception\AdresseException;
use CodingByJerez\MondialRelayBundle\Model\Creation\RecherchePointRelaisModel;

use CodingByJerez\MondialRelayBundle\Model\Parcel\PointRelaisModel;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class SearchShop extends AbstractMondialRelay
{

    private const METHOD = "WSI4_PointRelais_Recherche";

    /** @var RecherchePointRelaisModel */
    private $request;

    /** @var array<ParcelShopModel> */
    private $parcelShopArray;


    /**
     * SearchShop constructor.
     * @param array $api_identifiants
     * @param ValidatorInterface $validator
     * @param TranslatorInterface $translator
     */
    public function __construct(array $api_identifiants, ValidatorInterface $validator, TranslatorInterface $translator)
    {
        parent::__construct($api_identifiants, $validator, $translator);
        $this->parcelShopArray = [];
        $this->request = (new RecherchePointRelaisModel())->setEnseigne($this->websiteId);


        return $this;
    }

    /**
     * @param string $pays
     * @param string $codePostal
     * @param null|string $ville
     * @param int $nombreResultats
     * @return SearchShop
     */
    public function rechercheByAdresse(string $pays, string $codePostal, string $ville = null, int $nombreResultats = 10): self
    {
        $this->request
            ->setPays($pays)
            ->setCodePostal($codePostal)
            ->setVille($ville)
            ->setNombreResultats($nombreResultats)
        ;

        return $this;
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @param int $nombreResultats
     * @return SearchShop
     */
    public function rechercheByLatLong(float $latitude, float $longitude, int $nombreResultats = 10): self
    {
        $this->request
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setNombreResultats($nombreResultats)
        ;

        return $this;
    }

    /**
     * @param string $pays
     * @param int $idShop
     * @param int $nombreResultats
     * @return SearchShop
     */
    public function rechercheById(string $pays, int $idShop, int $nombreResultats = 10): self
    {
        $this->request
            ->setPays($pays)
            ->setNumPointRelais($idShop)
            ->setNombreResultats($nombreResultats)
        ;

        return $this;
    }


    /* ---------------
     *    OPTION
     * --------------- */

    /**
     * @param int $rayon
     * @return SearchShop
     */
    public function setRayonRecherche(int $rayon): self
    {
        $this->request->setRayonRecherche($rayon);

        return $this;
    }

    /**
     * @param $jours
     * @return SearchShop
     * @throws \Exception
     */
    public function setDelaiEnvoi($jours): self
    {

        if(!preg_match("^-?([0-9]{2})$", $jours))
            throw new \Exception("Le format du delai d'envoi est incorect il doit etre au format numerique ^-?([0-9]{2})$");

        $this->request->setDelaiEnvoi($jours);

        return $this;
    }

    /**
     * @param $modeCollecte
     * @return SearchShop
     * @throws \Exception
     */
    public function setAction($modeCollecte): self
    {
        if(in_array($modeCollecte, ["REL", "24R", "24L", "24X", "DRI"]))
            throw new \Exception("Le Mode de collecte ou de livraison est incorect. Liste de valeur: (REL|24R|24L|24X|DRI)");

        $this->request->setAction($modeCollecte);

        return $this;
    }

    /**
     * @param int $grammes
     * @return SearchShop
     * @throws \Exception
     */
    public function setPoids(int $grammes): self
    {
        if(!preg_match("^[0-9]{1,6}$", $grammes))
            throw new \Exception("Le format du poids du colis est incorect il doit etre au format numerique ^[0-9]{1,6}$");

        $this->request->setPoids($grammes);

        return $this;
    }

    /**
     * @param string $taille
     * @return SearchShop
     * @throws \Exception
     */
    public function setTaille(string $taille): self
    {
        if(in_array($taille, ["XS", "S", "M", "L", "XL", "XXL", "3XL"]))
            throw new \Exception("Le format de la taille du colis est incorect. Liste de valeur: (XS|S|M|L|XL|XXL|3XL)");

        $this->request->setTaille($taille);

        return $this;
    }


    /**
     * @return array
     * @throws \CodingByJerez\MondialRelayBundle\Exception\AbstractValidatorException
     */
    public function rechercheShops(): array
    {

        if(count($errors = $this->validator->validate($this->request)) > 0)
            throw (new AdresseException("Error Creation Shipment"))->setErrorValidator($this->createErrorValidationArray($errors, "Error Creation Shipment: "));

        $parameterArray = $this->serializer($this->request);

        $result = $this->callWebApi(self::METHOD, $parameterArray);

        if(($code = $result[self::METHOD ."Result"]["STAT"]) != 0)
            throw new \InvalidArgumentException($this->translator->trans("status_code.code_{$code}", [], "cbj_mondial_relay"), $code);


        foreach($result[self::METHOD . "Result"]["PointsRelais"]["PointRelais_Details"] as $val)
                $this->parcelShopArray[] = new PointRelaisModel($val);

        return $this->parcelShopArray;
    }

}
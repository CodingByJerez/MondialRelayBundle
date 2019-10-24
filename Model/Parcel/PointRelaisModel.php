<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 17/10/2019
 * Time: 17:18
 */

namespace CodingByJerez\MondialRelayBundle\Model\Parcel;


class PointRelaisModel
{

    /** @var integer */
    private $ParcelShopId;

    /** @var string */
    private $Name;

    /** @var string */
    private $Adress1;

    /** @var string */
    private $Adress2;

    /** @var string */
    private $PostCode;

    /** @var string */
    private $City;

    /** @var string */
    private $CountryCode;

    /** @var float */
    private $Latitude;

    /** @var float */
    private $Longitude;

    /** @var string */
    private $LocalisationDetails;

    /** @var array<TimeSlotModel> */
    private $OpeningHours;

    /** @var string */
    private $ClosedPeriods;

    /** @var string */
    private $ActivityCode;

    /** @var string */
    private $PictureUrl;

    /** @var string */
    private $MapUrl;


    public function __construct($result)
    {
        $this->ParcelShopId         = $result["Num"];
        $this->Name                 = $result["LgAdr1"];
        $this->Adress1              = $result["LgAdr3"];
        $this->Adress2              = $result["LgAdr4"];
        $this->PostCode             = $result["CP"];
        $this->City                 = $result["Ville"];
        $this->CountryCode          = $result["Pays"];

        $this->Latitude             = $result["Latitude"];
        $this->Longitude            = $result["Longitude"];

        $this->LocalisationDetails  = $result["Localisation1"] . " " . $result["Localisation2"];

        $this->ClosedPeriods;

        foreach (["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"] as $jour)
            $this->OpeningHours[$jour] = new TimeSlotModel($result["Horaires_{$jour}"]);

        $this->ActivityCode         = $result["TypeActivite"];

        $this->PictureUrl           = $result["URL_Photo"];
        $this->MapUrl               = $result["URL_Plan"];


        return $this;
    }

    /**
     * @return int
     */
    public function getParcelShopId(): int
    {
        return $this->ParcelShopId;
    }

    /**
     * @param int $ParcelShopId
     * @return PointRelaisModel
     */
    public function setParcelShopId(int $ParcelShopId): self
    {
        $this->ParcelShopId = $ParcelShopId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return PointRelaisModel
     */
    public function setName(string $Name): self
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdress1(): string
    {
        return $this->Adress1;
    }

    /**
     * @param string $Adress1
     * @return PointRelaisModel
     */
    public function setAdress1(string $Adress1): self
    {
        $this->Adress1 = $Adress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdress2(): string
    {
        return $this->Adress2;
    }

    /**
     * @param string $Adress2
     * @return PointRelaisModel
     */
    public function setAdress2(string $Adress2): self
    {
        $this->Adress2 = $Adress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->PostCode;
    }

    /**
     * @param string $PostCode
     * @return PointRelaisModel
     */
    public function setPostCode(string $PostCode): self
    {
        $this->PostCode = $PostCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return PointRelaisModel
     */
    public function setCity(string $City): self
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     * @return PointRelaisModel
     */
    public function setCountryCode(string $CountryCode): self
    {
        $this->CountryCode = $CountryCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->Latitude;
    }

    /**
     * @param float $Latitude
     * @return PointRelaisModel
     */
    public function setLatitude(float $Latitude): self
    {
        $this->Latitude = $Latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->Longitude;
    }

    /**
     * @param float $Longitude
     * @return PointRelaisModel
     */
    public function setLongitude(float $Longitude): self
    {
        $this->Longitude = $Longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalisationDetails(): string
    {
        return $this->LocalisationDetails;
    }

    /**
     * @param string $LocalisationDetails
     * @return PointRelaisModel
     */
    public function setLocalisationDetails(string $LocalisationDetails): self
    {
        $this->LocalisationDetails = $LocalisationDetails;
        return $this;
    }

    /**
     * @return array
     */
    public function getOpeningHours(): array
    {
        return $this->OpeningHours;
    }

    /**
     * @param array $OpeningHours
     * @return PointRelaisModel
     */
    public function setOpeningHours(array $OpeningHours): self
    {
        $this->OpeningHours = $OpeningHours;
        return $this;
    }

    /**
     * @return string
     */
    public function getClosedPeriods(): string
    {
        return $this->ClosedPeriods;
    }

    /**
     * @param string $ClosedPeriods
     * @return PointRelaisModel
     */
    public function setClosedPeriods(string $ClosedPeriods): self
    {
        $this->ClosedPeriods = $ClosedPeriods;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivityCode(): string
    {
        return $this->ActivityCode;
    }

    /**
     * @param string $ActivityCode
     * @return PointRelaisModel
     */
    public function setActivityCode(string $ActivityCode): self
    {
        $this->ActivityCode = $ActivityCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPictureUrl(): string
    {
        return $this->PictureUrl;
    }

    /**
     * @param string $PictureUrl
     * @return PointRelaisModel
     */
    public function setPictureUrl(string $PictureUrl): self
    {
        $this->PictureUrl = $PictureUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getMapUrl(): string
    {
        return $this->MapUrl;
    }

    /**
     * @param string $MapUrl
     * @return PointRelaisModel
     */
    public function setMapUrl(string $MapUrl): self
    {
        $this->MapUrl = $MapUrl;
        return $this;
    }

}
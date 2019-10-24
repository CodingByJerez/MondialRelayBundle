<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 24/10/2019
 * Time: 11:46
 */

namespace CodingByJerez\MondialRelayBundle\Model\Parcel;


class EtiquetteModel
{

    /** @var integer */
    private $numeroExpedition;

    /** @var string */
    private $urlEtiquette;


    public function __construct(array $param)
    {
        $this->numeroExpedition = $param["ExpeditionNum"];
        $this->urlEtiquette = $param["URL_Etiquette"];

        return $this;
    }


    /**
     * @return int
     */
    public function getNumeroExpedition(): int
    {
        return $this->numeroExpedition;
    }

    /**
     * @param int $numeroExpedition
     * @return EtiquetteModel
     */
    public function setNumeroExpedition(int $numeroExpedition): self
    {
        $this->numeroExpedition = $numeroExpedition;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlEtiquette(): string
    {
        return $this->urlEtiquette;
    }

    /**
     * @param string $urlEtiquette
     * @return EtiquetteModel
     */
    public function setUrlEtiquette(string $urlEtiquette): self
    {
        $this->urlEtiquette = $urlEtiquette;
        return $this;
    }



}
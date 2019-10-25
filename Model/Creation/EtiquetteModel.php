<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 25/10/2019
 * Time: 10:59
 */

namespace CodingByJerez\MondialRelayBundle\Model\Creation;

use Symfony\Component\Serializer\Annotation\SerializedName;


class EtiquetteModel extends ExpeditionModel
{

    /**
     * @var null|string
     *
     * @SerializedName("Texte")
     */
    private $texte;

    /**
     * @return null|string
     */
    public function getTexte(): ?string
    {
        return $this->texte;
    }

    /**
     * @param null|string $texte
     * @return EtiquetteModel
     */
    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;
        return $this;
    }

}
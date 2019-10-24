<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 24/10/2019
 * Time: 12:24
 */

namespace CodingByJerez\MondialRelayBundle\Model\Creation;

use Symfony\Component\Serializer\Annotation\SerializedName;


class RecherchePointRelaisModel
{

    /**
     * @var string
     *
     * @SerializedName("Enseigne")
     */
    private $enseigne;

    /**
     * @var string
     *
     * @SerializedName("Pays")
     */
    private $pays;

    /**
     * @var null|string
     *
     * @SerializedName("NumPointRelais")
     */
    private $numPointRelais;

    /**
     * @var null|string
     *
     * @SerializedName("Ville")
     */
    private $ville;

    /**
     * @var null|string
     *
     * @SerializedName("CP")
     */
    private $codePostal;

    /**
     * @var null|float
     *
     * @SerializedName("Latitude")
     */
    private $latitude;

    /**
     * @var null|float
     *
     * @SerializedName("Longitude")
     */
    private $longitude;

    /**
     * @var null|string
     *
     * @SerializedName("Taille")
     */
    private $taille;

    /**
     * @var null|integer
     *
     * @SerializedName("Poids")
     */
    private $poids;

    /**
     * @var null|string
     *
     * @SerializedName("Action")
     */
    private $action;

    /**
     * @var null|integer
     *
     * @SerializedName("DelaiEnvoi")
     */
    private $delaiEnvoi;

    /**
     * @var null|integer
     *
     * @SerializedName("RayonRecherche")
     */
    private $rayonRecherche;

    /**
     * @var null|string
     *
     * @SerializedName("TypeActivite")
     */
    private $typeActivite;

    /**
     * @var integer
     *
     * @SerializedName("NombreResultats")
     */
    private $nombreResultats = 10;

    /**
     * @return string
     */
    public function getEnseigne(): string
    {
        return $this->enseigne;
    }

    /**
     * @param string $enseigne
     * @return RecherchePointRelaisModel
     */
    public function setEnseigne(string $enseigne): self
    {
        $this->enseigne = str_pad($enseigne,8);
        return $this;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     * @return RecherchePointRelaisModel
     */
    public function setPays(string $pays): self
    {
        $this->pays = $pays;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumPointRelais(): ?string
    {
        return $this->numPointRelais;
    }

    /**
     * @param null|string $numPointRelais
     * @return RecherchePointRelaisModel
     */
    public function setNumPointRelais(?string $numPointRelais): self
    {
        $this->numPointRelais = $numPointRelais;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * @param null|string $ville
     * @return RecherchePointRelaisModel
     */
    public function setVille($ville): self
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    /**
     * @param null|string $codePostal
     * @return RecherchePointRelaisModel
     */
    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     * @return RecherchePointRelaisModel
     */
    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     * @return RecherchePointRelaisModel
     */
    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;
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
     * @return RecherchePointRelaisModel
     */
    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPoids(): ?int
    {
        return $this->poids;
    }

    /**
     * @param int|null $poids
     * @return RecherchePointRelaisModel
     */
    public function setPoids(?int $poids): self
    {
        $this->poids = $poids;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param null|string $action
     * @return RecherchePointRelaisModel
     */
    public function setAction(?string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDelaiEnvoi(): ?int
    {
        return $this->delaiEnvoi;
    }

    /**
     * @param int|null $delaiEnvoi
     * @return RecherchePointRelaisModel
     */
    public function setDelaiEnvoi(?int $delaiEnvoi): self
    {
        $this->delaiEnvoi = $delaiEnvoi;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRayonRecherche(): ?int
    {
        return $this->rayonRecherche;
    }

    /**
     * @param int|null $rayonRecherche
     * @return RecherchePointRelaisModel
     */
    public function setRayonRecherche(?int $rayonRecherche): self
    {
        $this->rayonRecherche = $rayonRecherche;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTypeActivite(): ?string
    {
        return $this->typeActivite;
    }

    /**
     * @param null|string $typeActivite
     * @return RecherchePointRelaisModel
     */
    public function setTypeActivite(?string $typeActivite): self
    {
        $this->typeActivite = $typeActivite;
        return $this;
    }

    /**
     * @return int
     */
    public function getNombreResultats(): int
    {
        return $this->nombreResultats;
    }

    /**
     * @param int $nombreResultats
     * @return RecherchePointRelaisModel
     */
    public function setNombreResultats(int $nombreResultats): self
    {
        $this->nombreResultats = $nombreResultats;
        return $this;
    }


}
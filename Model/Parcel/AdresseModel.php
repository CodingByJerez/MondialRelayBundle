<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 22/10/2019
 * Time: 15:46
 */

namespace CodingByJerez\MondialRelayBundle\Model\Parcel;


class AdresseModel
{

    /**
     * @var string
     */
    private $langage;

    /**
     * @var string $identite Civilité Nom Prénom
     */
    private $identite;

    /**
     * @var null|string $identite Complement Civilité Nom Prénom (Complément)
     */
    private $identiteComplement;

    /**
     * @var string $adresse
     */
    private $adresse;

    /**
     * @var null|string $adresseComplement
     */
    private $adresseComplement;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $codePostal;

    /**
     * @var string
     */
    private $paysCode;

    /**
     * @var string
     */
    private $tel;


    /**
     * @var null|string
     */
    private $tel2;

    /**
     * @var null|string
     */
    private $courriel;

    /**
     * @return string
     */
    public function getLangage(): string
    {
        return $this->langage;
    }

    /**
     * @param string $langage
     * @return AdresseModel
     */
    public function setLangage(string $langage): self
    {
        $this->langage = $langage;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentite(): string
    {
        return $this->identite;
    }

    /**
     * @param string $identite
     * @return AdresseModel
     */
    public function setIdentite(string $identite): self
    {
        $this->identite = $identite;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIdentiteComplement(): ?string
    {
        return $this->identiteComplement;
    }

    /**
     * @param null|string $identiteComplement
     * @return AdresseModel
     */
    public function setIdentiteComplement(?string $identiteComplement): self
    {
        $this->identiteComplement = $identiteComplement;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     * @return AdresseModel
     */
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdresseComplement(): ?string
    {
        return $this->adresseComplement;
    }

    /**
     * @param null|string $adresseComplement
     * @return AdresseModel
     */
    public function setAdresseComplement(?string $adresseComplement): self
    {
        $this->adresseComplement = $adresseComplement;
        return $this;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     * @return AdresseModel
     */
    public function setVille(string $ville): self
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    /**
     * @param string $codePostal
     * @return AdresseModel
     */
    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaysCode(): string
    {
        return $this->paysCode;
    }

    /**
     * @param string $paysCode
     * @return AdresseModel
     */
    public function setPaysCode(string $paysCode): self
    {
        $this->paysCode = $paysCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     * @return AdresseModel
     */
    public function setTel(string $tel): self
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    /**
     * @param null|string $tel2
     * @return AdresseModel
     */
    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    /**
     * @param null|string $courriel
     * @return AdresseModel
     */
    public function setCourriel(?string $courriel): self
    {
        $this->courriel = $courriel;
        return $this;
    }


}
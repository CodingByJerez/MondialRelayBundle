<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 17/10/2019
 * Time: 17:19
 */

namespace CodingByJerez\MondialRelayBundle\Model\Parcel;


class TimeSlotModel
{

    /** @var integer */
    public $OpenAMAt;

    /** @var integer */
    public $CloseAMAt;

    /** @var integer */
    public $OpenPMAt;

    /** @var integer */
    public $ClosePMAt;

    /** @var string */
    public $Closed;


    public function __construct(array $result)
    {
        $this->OpenAMAt     = $result["string"][0];
        $this->CloseAMAt    = $result["string"][1];
        $this->OpenPMAt     = $result["string"][2];
        $this->ClosePMAt    = $result["string"][3];
        $this->Closed;

        return $this;
    }

    /**
     * @return int
     */
    public function getOpenAMAt(): int
    {
        return $this->OpenAMAt;
    }

    /**
     * @param int $OpenAMAt
     * @return TimeSlotModel
     */
    public function setOpenAMAt(int $OpenAMAt): self
    {
        $this->OpenAMAt = $OpenAMAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getCloseAMAt(): int
    {
        return $this->CloseAMAt;
    }

    /**
     * @param int $CloseAMAt
     * @return TimeSlotModel
     */
    public function setCloseAMAt(int $CloseAMAt): self
    {
        $this->CloseAMAt = $CloseAMAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenPMAt(): int
    {
        return $this->OpenPMAt;
    }

    /**
     * @param int $OpenPMAt
     * @return TimeSlotModel
     */
    public function setOpenPMAt(int $OpenPMAt): self
    {
        $this->OpenPMAt = $OpenPMAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getClosePMAt(): int
    {
        return $this->ClosePMAt;
    }

    /**
     * @param int $ClosePMAt
     * @return TimeSlotModel
     */
    public function setClosePMAt(int $ClosePMAt): self
    {
        $this->ClosePMAt = $ClosePMAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getClosed(): string
    {
        return $this->Closed;
    }

    /**
     * @param string $Closed
     * @return TimeSlotModel
     */
    public function setClosed(string $Closed): self
    {
        $this->Closed = $Closed;
        return $this;
    }




}
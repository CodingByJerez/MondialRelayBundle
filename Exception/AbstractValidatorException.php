<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 24/10/2019
 * Time: 11:03
 */

namespace CodingByJerez\MondialRelayBundle\Exception;


abstract class AbstractValidatorException extends \Exception
{

    /** @var array */
    private $error;


    public function getErrorValidator(): array
    {
        return $this->error;
    }

    public function setErrorValidator(array $error): self
    {
        $this->error = $error;

        return $this;
    }

}
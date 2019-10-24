<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 20/10/2019
 * Time: 13:09
 */

namespace CodingByJerez\MondialRelayBundle\Services;


use Doctrine\Common\Annotations\AnnotationReader;
use nusoap_client;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractMondialRelay
{
    protected const URL_APIV1 = "http://api.mondialrelay.com/";

    protected const PATH_APIV1 = "Web_Services.asmx?WSDL";

    /** @var string */
    protected $websiteId;

    /** @var string */
    protected $websiteKey;

    /** @var ValidatorInterface  */
    protected $validator;

    /** @var TranslatorInterface */
    protected $translator;

    /** @var \nusoap_client */
    protected $client;

    /** @var Serializer */
    private $serializer;


    /**
     * AbstractMondialRelay constructor.
     * @param array $api_identifiants
     * @param ValidatorInterface $validator
     * @param TranslatorInterface $translator
     */
    public function __construct(array $api_identifiants, ValidatorInterface $validator, TranslatorInterface $translator)
    {
        $this->websiteId = $api_identifiants['customer_code'];
        $this->websiteKey = $api_identifiants['secret_key'];

        $this->validator = $validator;
        $this->translator = $translator;

        $this->client = new nusoap_client(self::URL_APIV1 . self::PATH_APIV1, true);
        $this->client->soap_defencoding = 'utf-8';

    }


    /**
     * @param array $parameterArray
     * @return array
     */
    protected function setSecurityinParameter(array $parameterArray): array
    {
        $code = implode("", $parameterArray);
        $code .=  $this->websiteKey;

        $parameterArray["Security"] = strtoupper(md5(utf8_decode($code)));

        return $parameterArray;
    }


    /**
     * @param \Symfony\Component\Validator\ConstraintViolationListInterface $errors
     * @param string|null $label
     * @return array
     */
    protected function createErrorValidationArray(\Symfony\Component\Validator\ConstraintViolationListInterface $errors, string $label = null): array
    {
        $array = [];
        foreach($errors as $v){
            $array[] = $label . $this->translator->trans($v->getMessage(), [], "cbj_mondial_relay");
        }

        return $array;
    }

    /**
     * @param $object
     * @return array
     */
    protected function serializer($object): array
    {
        if(is_null($this->serializer)){
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
            $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter);
            $this->serializer = new Serializer([$normalizer]);
        }

        return $this->serializer->normalize($object);
    }


    /**
     * @param string $methodName
     * @param array $params
     * @return array
     */
    protected function callWebApi(string $methodName, array $params): array
    {
        $params = $this->setSecurityinParameter($params);
        return $result = $this->client->call($methodName, $params,self::URL_APIV1, self::URL_APIV1 . $methodName);
    }

}
<?php

namespace Bpay\Payment\Check;


/**
 * Class Check
 * @package Bpay\Payment\Check
 */
/**
 * Class Check
 * @package Bpay\Payment\Check
 */
/**
 * Class Check
 * @package Bpay\Payment\Check
 */
class Check implements \Serializable
{

    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $merchantId;

    /**
     * @var
     */
    private $amount;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $method;

    /**
     * @var
     */
    private $orderId;

    /**
     * @var
     */
    private $successUrl;

    /**
     * @var
     */
    private $failUrl;

    /**
     * @var
     */
    private $callbackUrl;

    /**
     * @var
     */
    private $lang;

    /**
     * @var
     */
    private $advanced1;

    /**
     * @var
     */
    private $advanced2;

    /**
     * @var
     */
    private $isTest;

    /**
     * @var
     */
    private $getUrl;


    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param mixed $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getSuccesUrl()
    {
        return $this->succesUrl;
    }

    /**
     * @param mixed $successUrl
     */
    public function setSuccessUrl($successUrl = '')
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return mixed
     */
    public function getFailUrl()
    {
        return $this->failUrl;
    }

    /**
     * @param mixed $failUrl
     */
    public function setFailUrl($failUrl = '')
    {
        $this->failUrl = $failUrl;
    }

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param mixed $callbackUrl
     */
    public function setCallbackUrl($callbackUrl = '')
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getAdvanced1()
    {
        return $this->advanced1;
    }

    /**
     * @param mixed $advanced1
     */
    public function setAdvanced1($advanced1)
    {
        $this->advanced1 = $advanced1;
    }

    /**
     * @return mixed
     */
    public function getAdvanced2()
    {
        return $this->advanced2;
    }

    /**
     * @param mixed $advanced2
     */
    public function setAdvanced2($advanced2)
    {
        $this->advanced2 = $advanced2;
    }

    /**
     * @return mixed
     */
    public function getisTest()
    {
        return $this->isTest;
    }

    /**
     * @param mixed $isTest
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;
    }


    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            'type' => $this->type,
            'merchantid' => $this->merchantId,
            'amount' => $this->amount,
            'description' => $this->description,
            'method' => $this->method,
            'order_id' => $this->orderId,
            'success_url' => $this->successUrl,
            'fail_url' => $this->failUrl,
            'callback_url' => $this->callbackUrl,
            'lang' => $this->lang,
            'advanced1' => $this->advanced1,
            'advanced2' => $this->advanced2,
            'istest' => $this->isTest
        ]);

    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}
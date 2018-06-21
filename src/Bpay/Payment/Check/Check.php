<?php

namespace Bpay\Payment\Check;


/**
 * Class Check
 * @package Bpay\Payment\Check
 */
class Check
{

    /**
     * @var string
     */
    private $type = '1.2';

    /**
     * @var string
     */
    private $merchantId;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $successUrl;

    /**
     * @var string
     */
    private $failUrl;

    /**
     * @var string
     */
    private $callbackUrl;

    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $advanced1;

    /**
     * @var string
     */
    private $advanced2 = '';

    /**
     * @var bool
     */
    private $isTest = false;

    /**
     * @var bool
     */
    private $getUrl = true;


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl = '')
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return string
     */
    public function getFailUrl()
    {
        return $this->failUrl;
    }

    /**
     * @param string $failUrl
     */
    public function setFailUrl($failUrl = '')
    {
        $this->failUrl = $failUrl;
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl($callbackUrl = '')
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getAdvanced1()
    {
        return $this->advanced1;
    }

    /**
     * @param string $advanced1
     */
    public function setAdvanced1($advanced1)
    {
        $this->advanced1 = $advanced1;
    }

    /**
     * @return string
     */
    public function getAdvanced2()
    {
        return $this->advanced2;
    }

    /**
     * @param string $advanced2
     */
    public function setAdvanced2($advanced2)
    {
        $this->advanced2 = $advanced2;
    }

    /**
     * @return bool
     */
    public function isTest()
    {
        return $this->isTest;
    }

    /**
     * @param bool $isTest
     */
    public function setTest($isTest)
    {
        $this->isTest = $isTest;
    }

    /**
     * @return bool
     */
    public function isGetUrl()
    {
        return $this->getUrl;
    }

    /**
     * Array representation of object
     * @return array
     */
    public function toArray()
    {
        return [
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
            'getUrl' => $this->getUrl ? '1' : '0',
            'istest' => $this->isTest ? '1' : '0'
        ];
    }
}
<?php


namespace Bpay\Payment\Response;


/**
 * Class Response
 * @package Bpay\Payment\Response
 */
class Response
{
    /**
     * @var string
     */
    private $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param $data
     * @return string
     */
    public function toJson($data)
    {
        return json_encode($data);
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->getCode() === '100';
    }
}


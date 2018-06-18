<?php


namespace Bpay\Payment\Response;


/**
 * Class Response
 * @package Bpay\Payment\Response
 */
class Response
{
    /**
     * @param $data
     * @return string
     */
    public function toJson($data)
    {
        return json_encode($data);
    }

}


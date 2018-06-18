<?php


namespace Bpay\Payment\Response;

use GuzzleHttp;

/**
 * Class Response
 * @package Bpay\Payment\Response
 */
class Response
{
    /**
     * Response constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $data
     * @return string
     */
    public function toJson($data)
    {
        $result = GuzzleHttp\json_encode($data);
//           $result = json_encode($data);
           return $result;
    }

}


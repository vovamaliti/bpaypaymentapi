<?php

namespace Bpay\Payment;


/**
 * Interface PaymentInterface
 * @package Bpay\Payment
 */
interface PaymentInterface
{


    /**
     * @param $url
     * @param $data
     * @param $signature
     * @return mixed
     */
    public function check($url, $data, $signature);


    /**
     * @param $key
     * @param $data
     * @param $signature
     * @return mixed
     */
    public function getCheckInfo($key, $data, $signature);

    /**
     * @param $url
     * @param $data
     * @param $key
     * @return mixed
     */
    public function transfer($url, $data, $key);

    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    public function getTransactionInfo($url, $data);


    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    public function getPaymentHistory($url, $data);
}

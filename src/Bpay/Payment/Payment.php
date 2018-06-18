<?php


namespace Bpay\Payment;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use LSS\Array2XML;
use Bpay\Payment\Response\Response as Res;


/**
 * Class Payment
 * @package Bpay\Payment
 */
class Payment implements PaymentInterface
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $res;


    /**
     * Payment constructor.
     *
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->res = new Res();
    }

    /**
     * @param $url
     * @param $data
     * @param $signature
     * @return mixed
     */
    public function check($url, $data, $signature)
    {
        $arr = unserialize($data);
        if (filter_var($url, FILTER_VALIDATE_URL) && is_array($arr)) {

            $xml = Array2XML::createXML('payment', $arr);
            $xmlData = $xml->saveXML();
            $xmlData = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $xmlData);
            $dataResult = base64_encode($xmlData);
            $sign = md5(md5($xmlData) . md5($signature));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
            $data = [
                'data' => $dataResult,
                'key' => $sign,
            ];

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $output = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);

            return $info;
        }

        return false;
    }

    /**
     * @param $key
     * @param $data
     * @param $signature
     * @return mixed
     */
    public function getCheckInfo($key, $data, $signature)
    {
        if (!empty($key) && !empty($data) && !empty($signature)) {
            $arrayResponse = [];
            $xmlData = base64_decode($data);
            $vrfsign = md5(md5($xmlData) . md5($signature));
            if ($key == $vrfsign) {
                $xml = simplexml_load_string($xmlData);
                switch ($xml) {
                    case (string)$xml->comand == 'check':
                        $arrayResponse = ['code' => '50', 'text' => 'not exist'];
                        $xml = Array2XML::createXML('result', $arrayResponse);
                        return $xml->saveXML();
                        break;
                    case (string)$xml->comand == 'pay';
                        $arrayResponse = ['code' => '100', 'text' => 'success'];
                        $xml = Array2XML::createXML('result', $arrayResponse);
                        return $xml->saveXML();
                        break;
                    default:
                        $arrayResponse = ['code' => '30', 'unknown method'];
                        $xml = Array2XML::createXML('result', $arrayResponse);
                        return $xml->saveXML();
                }
            } else {
                $arrayResponse = ['code' => '30', 'text' => 'incorrect signature'];
                $xml = Array2XML::createXML('result', $arrayResponse);
                return $xml->saveXML();
            }
        }
        $arrayResponse = ['text' => 'empty data'];
        $xml = Array2XML::createXML('result', $arrayResponse);
        return $xml->saveXML();
    }

    /**
     * @param $url
     * @param $data
     * @param $key
     * @return mixed
     */
    public function transfer($url, $data, $key)
    {
        $arr = unserialize($data);
        if (filter_var($url, FILTER_VALIDATE_URL) && is_array($arr)) {
            $sign = md5($arr['time'] . $arr['$payer_account'] . $arr['$account'] . $arr['$amount'] . $arr['$description'] . $arr['$txnid'] . $arr['$test'] . $key);
            $xml = Array2XML::createXML('request', $arr);
            $xmlData = $xml->saveXML();

            try {
                $response = $this->client->request('POST', $url, [
                    'form_params' => [
                        'data' => $xmlData,
                        'key' => $sign,
                    ]
                ]);
                return $this->res->toJson(simplexml_load_string($response->getBody()->getContents()));

            } catch (GuzzleException $exception) {

            }

        }
        return false;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    public function getTransactionInfo($url, $data)
    {
        $arr = unserialize($data);
        if (filter_var($url, FILTER_VALIDATE_URL) && is_array($arr)) {
            $xml = Array2XML::createXML('request', $arr);
            $xmlData = $xml->saveXML();
            $xmlData = str_replace('<auth>', '<auth type="1">', $xmlData);

            $response = $this->client->post($url, [
                'body' => $xmlData
            ]);

            return $this->res->toJson(simplexml_load_string($response->getBody()->getContents()));

        }
        return false;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    public function getPaymentHistory($url, $data)
    {

        $arr = unserialize($data);

        if (filter_var($url, FILTER_VALIDATE_URL) && is_array($arr)) {
            $xml = Array2XML::createXML('request', $arr);
            $xmlData = $xml->saveXML();
            $xmlData = str_replace('<auth>', '<auth type="1">', $xmlData);

            $response = $this->client->post($url, [
                'body' => $xmlData
            ]);
            return $this->res->toJson(simplexml_load_string($response->getBody()->getContents()));

        }
        return false;
    }


}


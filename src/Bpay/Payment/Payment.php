<?php


namespace Bpay\Payment;

use Bpay\Payment\Check\Check;
use Bpay\Payment\PaymentHistory\PaymentHistory;
use Bpay\Payment\Transaction\Transaction;
use Bpay\Payment\Transfer\Transfer;
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
     * @var Res
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
     * @param string $url
     * @param Check $check
     * @param string $signature
     * @return mixed
     */
    public function check($url, $check, $signature)
    {
        if ($check instanceof Check && filter_var($url, FILTER_VALIDATE_URL)) {

            $xml = Array2XML::createXML('payment', $check->toArray());
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
     * @param string $key
     * @param string $data
     * @param string $signature
     * @return string|bool XML string, or false if an error occurred
     */
    public function getCheckInfo($key, $data, $signature)
    {
        if (!empty($key) && !empty($data) && !empty($signature)) {
            $xmlData = base64_decode($data);
            $vrfsign = md5(md5($xmlData) . md5($signature));
            if ($key === $vrfsign) {
                $xml = simplexml_load_string($xmlData);
                switch ($xml) {
                    case (string)$xml->comand === 'check':
                        $arrayResponse = ['code' => '50', 'text' => 'not exist'];
                        $xml = Array2XML::createXML('result', $arrayResponse);
                        return $xml->saveXML();
                        break;
                    case (string)$xml->comand === 'pay';
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
     * @param string $url
     * @param Transfer $transfer
     * @param string $key
     * @return string|bool
     */
    public function transfer($url, $transfer, $key)
    {
        if ($transfer instanceof Transfer && filter_var($url, FILTER_VALIDATE_URL)) {
            $isTest = $transfer->isTest() ? '1' : '0';
            $sign = md5(
                $transfer->getTime() .
                $transfer->getPayerAccount() .
                $transfer->getAccount() .
                $transfer->getAmount() .
                $transfer->getDescription() .
                $transfer->getTxnId() .
                $isTest .
                $key);
            $xml = Array2XML::createXML('request', $transfer->toArray());
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
     * @param string $url
     * @param Transaction $transaction
     * @return string|bool
     */
    public function getTransactionInfo($url, $transaction)
    {
        if ($transaction instanceof Transaction && filter_var($url, FILTER_VALIDATE_URL)) {
            $xml = Array2XML::createXML('request', $transaction->toArray());
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
     * @param string $url
     * @param PaymentHistory $paymentHistory
     * @return string|bool
     */
    public function getPaymentHistory($url, $paymentHistory)
    {
        if ($paymentHistory instanceof PaymentHistory && filter_var($url, FILTER_VALIDATE_URL)) {
            $xml = Array2XML::createXML('request', $paymentHistory->toArray());
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

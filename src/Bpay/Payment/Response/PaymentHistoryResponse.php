<?php

namespace Bpay\Payment\Response;


class PaymentHistoryResponse extends Response
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $payments;

    /**
     * @var float
     */
    private $totalSum;

    /**
     * @var int
     */
    private $totalPayments;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return array
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param array $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return float
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * @param float $totalSum
     */
    public function setTotalSum($totalSum)
    {
        $this->totalSum = $totalSum;
    }

    /**
     * @return int
     */
    public function getTotalPayments()
    {
        return $this->totalPayments;
    }

    /**
     * @param int $totalPayments
     */
    public function setTotalPayments($totalPayments)
    {
        $this->totalPayments = $totalPayments;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return PaymentHistoryResponse
     */
    public static function fromXml($xml)
    {
        $array = self::xml2array($xml);
        $payments = [];
        foreach ($array['payments']['payment'] as $payment) {
            $payments[] = $payment['@attributes'];
        }
        $response = new self();
        $response->setText($array['text']);
        $response->setCode($array['code']);
        $response->setPayments($payments);
        $response->setTotalPayments($array['total']['total_payments']);
        $response->setTotalSum($array['total']['total_sum']);

        return $response;
    }


}
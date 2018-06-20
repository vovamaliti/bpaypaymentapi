<?php

namespace Bpay\Payment\Response;


class TransactionInfoResponse extends Response
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $params;

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
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return TransactionInfoResponse
     */
    public static function fromXml($xml)
    {
        $response = new self();
        $params = [];
        foreach ($xml->params->children() as $item) {
            $params[(string)$item[0]['name']] = (string)$item[0];
        }
        $response->setCode($xml->code->__toString());
        $response->setText($xml->text->__toString());
        $response->setParams($params);

        return $response;
    }
}
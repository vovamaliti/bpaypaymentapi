<?php

namespace Bpay\Payment\Response;


class CheckResponse extends Response
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $params;

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'https://bpay.md' . $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return CheckResponse
     */
    public static function fromXml($xml)
    {
        $array = self::xml2array($xml);
        $response = new self();
        $response->setCode($array['code']);
        $response->setMessage($array['message']);
        $response->setUrl($array['url']);
        $response->setParams($array['params']);

        return $response;
    }
}
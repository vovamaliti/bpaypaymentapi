<?php

namespace Bpay\Payment\PaymentHistory;


/**
 * Class PaymentHistory
 * @package Bpay\Payment\PaymentHistory
 */
class PaymentHistory
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $dateStart;

    /**
     * @var string
     */
    private $dateEnd;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $service;

    /**
     * @var string
     */
    private $dateType;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getDateType()
    {
        return $this->dateType;
    }

    /**
     * @param string $dateType
     */
    public function setDateType($dateType)
    {
        $this->dateType = $dateType;
    }


    /**
     * Array representation of object
     * @return array
     */
    public function toArray()
    {
        return [
            'auth' => [
                'login' => $this->login,
                'password' => $this->password,
            ],
            'account' => $this->account,
            'date_start' => $this->dateStart,
            'date_end' => $this->dateEnd,
            'state' => $this->state,
            'service' => $this->service,
            'date_type' => $this->dateType
        ];
    }
}
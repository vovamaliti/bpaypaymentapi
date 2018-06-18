<?php

namespace Bpay\Payment\PaymentHistory;


/**
 * Class PaymentHistory
 * @package Bpay\Payment\PaymentHistory
 */
class PaymentHistory implements \Serializable
{
    /**
     * @var
     */
    private $login;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $account;

    /**
     * @var
     */
    private $dateStart;

    /**
     * @var
     */
    private $dateEnd;

    /**
     * @var
     */
    private $state;

    /**
     * @var
     */
    private $service;

    /**
     * @var
     */
    private $dateType;

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getDateType()
    {
        return $this->dateType;
    }

    /**
     * @param mixed $dateType
     */
    public function setDateType($dateType)
    {
        $this->dateType = $dateType;
    }


    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
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

        ]);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}
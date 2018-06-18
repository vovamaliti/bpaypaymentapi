<?php

namespace Bpay\Payment\Transfer;


/**
 * Class Transfer
 * @package Bpay\Payment\Transfer
 */
class Transfer
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
    private $time;

    /**
     * @var string
     */
    private $payerAccount;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $txnId;

    /**
     * @var bool
     */
    private $test = false;

    /**
     * @var string
     */
    private $sign;

    /**
     * Transfer constructor.
     */
    public function __construct()
    {
        $this->setTime(date('Ymd His'));
    }

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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getPayerAccount()
    {
        return $this->payerAccount;
    }

    /**
     * @param string $payerAccount
     */
    public function setPayerAccount($payerAccount)
    {
        $this->payerAccount = $payerAccount;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * @param string $txnId
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;
    }

    /**
     * @return bool
     */
    public function isTest()
    {
        return $this->test;
    }

    /**
     * @param bool $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
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
            'transfer' => [
                'time' => $this->time,
                'payer_account' => $this->payerAccount,
                'account' => $this->account,
                'amount' => $this->amount,
                'description' => $this->description,
                'txnid' => $this->txnId,
                'test' => $this->test ? '1' : '0'
            ],
            [
                'sign' => $this->sign
            ]
        ];
    }
}
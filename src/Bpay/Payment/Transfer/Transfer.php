<?php

namespace Bpay\Payment\Transfer;


/**
 * Class Transfer
 * @package Bpay\Payment\Transfer
 */
/**
 * Class Transfer
 * @package Bpay\Payment\Transfer
 */
class Transfer implements \Serializable
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
    private $time;

    /**
     * @var
     */
    private $payerAccount;

    /**
     * @var
     */
    private $account;

    /**
     * @var
     */
    private $amount;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $txnId;

    /**
     * @var
     */
    private $test;

    /**
     * @var
     */
    private $sign;

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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param
     */
    public function setTime()
    {
        $this->time = date('Ymd His');
    }

    /**
     * @return mixed
     */
    public function getPayerAccount()
    {
        return $this->payerAccount;
    }

    /**
     * @param mixed $payerAccount
     */
    public function setPayerAccount($payerAccount)
    {
        $this->payerAccount = $payerAccount;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * @param mixed $txnId
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param mixed $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
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
            'transfer' => [
                'time' => $this->time,
                'payer_account' => $this->payerAccount,
                'account' => $this->account,
                'amount' => $this->amount,
                'description' => $this->description,
                'txnid' => $this->txnId,
                'test' => $this->test
            ],
            [
                'sign' => $this->sign
            ]



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
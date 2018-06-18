<?php

namespace Bpay\Payment\Transaction;


/**
 * Class Transaction
 * @package Bpay\Payment\Transaction
 */
class Transaction
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
    private $transId;

    /**
     * @var string
     */
    private $receipt;

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
    public function getTransId()
    {
        return $this->transId;
    }

    /**
     * @param string $transId
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
    }

    /**
     * @return string
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @param string $receipt
     */
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;
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
            'transid' =>$this->transId,
            'receipt' =>$this->receipt

        ];
    }
}
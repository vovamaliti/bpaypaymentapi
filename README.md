# bpay/bpay-md-payment-api - library for  integration with Bpay.md api




Library allows you to carry:
 out billing for payment from the website of the online store,
 receiving and automatically processing a payment notice (CALLBACK),
 making payments from your account bpay.md,
 request transaction information,
 account statement.

## Installation

Install the latest version with

```bash
$ composer require bpay/bpay-md-payment-api
```

## Basic Usage

```php
<?php
use Bpay\Payment\Check\Check;
use Bpay\Payment\Payment;
use Bpay\Payment\PaymentHistory\PaymentHistory;
use Bpay\Payment\Transaction\Transaction;



//check
$check = new Check();
$check->setType('1.2');
$check->setMerchantId('merchantId');
$check->setAmount('0.1');
$check->setDescription('some description');
$check->setMethod('bpay');
$check->setOrderId('admin@admin.com');
$check->setSuccessUrl('http://yourdomain.com');
$check->setFailUrl('https://yourdomain.com');
$check->setCallbackUrl('http://yourdomain.com');
$check->setLang('ru');
$check->setAdvanced1('221B Baker Street');
$check->setAdvanced2('');
$check->setIsTest('1'); //0 - real payment, 1 - test payment
$data = $check->serialize();

$payment = new Payment();
$result = $payment->check('https://www.bpay.md/user-api/payment1', $data, 'h42kd20d');

//callback
$payment1 = new Payment();
$data = 'DQogICAgICAgIDxwYXltZW50Pg0K3r3r3rICAgICAgICAJPHR5cGU+MS490ZXN0Pg0KICAgICAgICA8L3BheW1lbnQ+
';

$key = '0cb795b89fd49c82a233r3t3t3t34d01c0ce76785d';
$result = $payment1->getCheckInfo($key,$data, 'g5g3g3fg6');

//transaction 

$transaction = new Transaction();
$transaction->setLogin('yourlogin');
$transaction->setPassword('yourpassword');
$transaction->setTransId('1111111'); //or
$transaction->setReceipt('21445124124214214');

$transactionData = $transaction->serialize();

$payment1 = new Payment();
$result = $payment1->getTransactionInfo('https://www.bpay.md/user-api/checkstate1', $transactionData);

//payment history
$paymentHistory  = new PaymentHistory();
$paymentHistory->setLogin('yourlogin');
$paymentHistory->setPassword('yourpassword');
$paymentHistory->setAccount('1111111');
$paymentHistory->setDateStart('2018-06-12 ');
$paymentHistory->setDateEnd('2018-06-15 ');
$paymentHistory->setState('30');
$paymentHistory->setService('');
$paymentHistory->setDateType('');


$paymentHistoryResult = $paymentHistory->serialize();
$payment3 = new Payment();
$result  = $payment3->getPaymentHistory('https://www.bpay.md/user-api/getpaymentshistory',$paymentHistoryResult);

//transfer
$transfer = new \Bpay\Payment\Transfer\Transfer();
$transfer->setLogin('');
$transfer->setPassword('admin@admin.com');
$transfer->setTime();
$transfer->setPayerAccount('123425916');
$transfer->setAccount('2343451241');
$transfer->setAmount('1');
$transfer->setDescription('test payment');
$transfer->setTxnId(rand(1,1000));
$transfer->setTest('1');
$transfer->setSign('');

$transfer->serialize();

$paymentTransfer = new  Payment();
$paymentTransfer->transfer('https://www.bpay.md/user-api/transfer',$transfer,'key');



```



## Third Party Packages


[Guzzle, PHP HTTP client](https://github.com/guzzle/guzzle) ,
[Array2XML conversion library ](https://github.com/nullivex/lib-array2xml)


## About

### Requirements

- bpay/bpay-md-payment-api works with PHP 5.6> 


### Authors

Petrovschii Vladimir - <petrovschii.vladimir@gmail.com>
VR Dev Team - <tv@vr-dev.team>

### License

bpay/bpay-md-payment-api is licensed under the MIT License


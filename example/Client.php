<?php
use Bpay\Payment\Check\Check;
use Bpay\Payment\Payment;
use Bpay\Payment\PaymentHistory\PaymentHistory;
use Bpay\Payment\Transaction\Transaction;



//check
$check = new Check();
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
$check->setTest(true); //false - real payment(by default), true - test payment

$payment = new Payment();
$result = $payment->check('https://www.bpay.md/user-api/payment1', $check, 'thaM8aiy');



//example callback
$payment1 = new Payment();
$data = 'DQogICAgICAgIDxwYXltZW50Pg0K3r3r3rICAgICAgICAJPHR5cGU+MS4yPC90eXBlPg0KICAgIAkgICAgPG1lcmNoYW50aWQ+cmVnX25hbWVzLmNvbTwvbWVyY2hhbnRpZD4NCiAgICAgICAgICAgIDxvcmRlcl9pZD5wZXRyb3ZzY2hpaV92bGFkaW1pckBnbWFpbC5jb208L29yZGVyX2lkPg0KICAgICAgICAgICAgPGFtb3VudD4wLjEwPC9hbW91bnQ+DQogICAgICAgICAgICA8dmFsdXRlPjg0MDwvdmFsdXRlPg0KICAgICAgICAgICAgPHBheWVyYWNjPjExNzk4OTE2PC9wYXllcmFjYz4NCiAgICAgICAgICAgIDxjb21hbmQ+cGF5PC9jb21hbmQ+DQogICAgICAgICAgICA8YWR2YW5jZWQxPjEyLCBMZW5pbmEgc3RyZWV0IGFwLiA0NjwvYWR2YW5jZWQxPg0KICAgICAgICAgICAgPGFkdmFuY2VkMj48L2FkdmFuY2VkMj4NCiAgICAgICAgICAgIDx0cmFuc2lkPjQ3NzA2NjQ8L3RyYW5zaWQ+DQogICAgICAgICAgICA8cmVjZWlwdD4xMDc0NjU5Njk0NzA3NjQ8L3JlY2VpcHQ+DQogICAgICAgICAgICA8dGltZT4yMDE4LTA2LTE1IDE1OjE5OjE1PC90aW1lPg0KICAgICAgICAgICAgPHRlc3Q+PC90ZXN0Pg0KICAgICAgICA8L3BheW1lbnQ+
';

$key = '0cb795b89fd49c82a233r3t3t3t34d01c0ce76785d';
$result = $payment1->getCheckInfo($key,$data, 'g5g3g3fg6');


//transaction example

$transaction = new Transaction();
$transaction->setLogin('admin@admin.com');
$transaction->setPassword('2345234');
//$transaction->setTransId('4767606'); //or
$transaction->setReceipt('106853870569593');


$payment1 = new Payment();
$result = $payment1->getTransactionInfo('https://www.bpay.md/user-api/checkstate1', $transaction);




$paymentHistory  = new PaymentHistory();
$paymentHistory->setLogin('admi@admin.com');
$paymentHistory->setPassword('4f34g34ggsg');
$paymentHistory->setAccount('4343462424111');
$paymentHistory->setDateStart('2018-06-12 ');
$paymentHistory->setDateEnd('2018-06-15 ');
$paymentHistory->setState('30');
$paymentHistory->setService('');
$paymentHistory->setDateType('');

//var_dump($paymentHistoryResult);
$payment3 = new Payment();
$result  = $payment3->getPaymentHistory('https://www.bpay.md/user-api/getpaymentshistory',$paymentHistory);



$transfer = new \Bpay\Payment\Transfer\Transfer();
$transfer->setLogin('admin@admin.com');
$transfer->setPassword('password123');
$transfer->setPayerAccount('1174234398916');
$transfer->setAccount('111172342894');
$transfer->setAmount('1');
$transfer->setDescription('test payment');
$transfer->setTxnId(rand(1,1000));
$transfer->setTest(true);
$transfer->setSign('');


$paymentTransfer = new  Payment();
$paymentTransfer->transfer('https://www.bpay.md/user-api/transfer',$transfer,'');




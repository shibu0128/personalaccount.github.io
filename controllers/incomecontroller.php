<?php

require_once '../beans/Income.php';
require_once '../Daos/IncomeDao.php';
require_once '../beans/Bankbook.php';
require_once '../Daos/BankBookDao.php';
require_once '../beans/Cashbook.php';
require_once '../Daos/CashBookDao.php';


session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /index.php");
}

$opn = $_GET['opn'];
$uid = $_GET['userid'];
$inc = $_POST['inc'];
$inccat = $_POST['inccat'];
$amount = $_POST['amount'];
$recieveby = $_POST['recieveby'];
$remark = $_POST['remark'];
$date = $_POST['date'];
$fdate = date("Y-m-d", strtotime($date));
$ib = new Income;
$id = new IncomeDao;
$cb = new Cashbook;
$cd = new CashBookDao;
$bnb = new Bankbook;
$bnd = new BankBookDao;


if ($opn != NULL) {
    if ($opn == "add" && $uid != NULL && $inc != NULL && $inccat != NULL && $amount != NULL && $recieveby != NULL && $remark != NULL && $fdate != NULL) {
        $ib->setAmount($amount);
        $ib->setIncac($inc);
        $ib->setInccatid($inccat);
        $ib->setRecieveby($recieveby);
        $ib->setRemark($remark);
        $ib->setTrandate($fdate);
        $ib->setUserid($uid);
        if ($recieveby == "Check") {
            $bnb->setAcccount("Bank A/c");
            $bnb->setTrandate($fdate);
            $bnb->setAmount($amount);
            $bnb->setUserid($uid);
            $bnb->setOperation("pay");
            $bnd->create($bnb);
        } else if ($recieveby == "Cash") {
            $cb->setAcccount("Cash A/c");
            $cb->setTrandate($fdate);
            $cb->setAmount($amount);
            $cb->setUserid($uid);
            $cb->setOperation("pay");
            $cd->create($cb);
        }

        $id->create($ib);
        header("Location: /MyAccount/home.php");
    }
}

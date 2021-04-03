<?php

require_once '../beans/Expenses.php';
require_once '../Daos/ExpensesDao.php';
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
$expense = $_POST['exp'];
$expcat = $_POST['expcat'];
$amount = $_POST['amount'];
$payby = $_POST['payby'];
$remark = $_POST['remark'];
$date = $_POST['date'];
$fdate = date("Y-m-d", strtotime($date));
$exb = new Expenses;
$exd = new ExpensesDao;
$cb = new Cashbook;
$cd = new CashBookDao;
$bnb = new Bankbook;
$bnd = new BankBookDao;
if ($opn != NULL) {
    if ($opn == "add" && $uid != NULL && $expense != NULL && $expcat != NULL && $amount != NULL && $payby != NULL && $remark != NULL && $fdate != NULL) {
        $exb->setAmount($amount);
        $exb->setExpac($expense);
        $exb->setExpcatid($expcat);
        $exb->setPayby($payby);
        $exb->setRemark($remark);
        $exb->setTrandate($fdate);
        $exb->setUserid($uid);
        if ($payby == "Check") {
            $bnb->setAcccount("Bank A/c");
            $bnb->setTrandate($fdate);
            $bnb->setAmount($amount);
            $bnb->setUserid($uid);
            $bnb->setOperation("pay");
            $bnd->create($bnb);
        }else if ($payby == "Cash") {
            $cb->setAcccount("Cash A/c");
            $cb->setTrandate($fdate);
            $cb->setAmount($amount);
            $cb->setUserid($uid);
            $cb->setOperation("pay");
            $cd->create($cb);
        }
        $exd->create($exb);
        header("Location: /MyAccount/home.php");
    }
}

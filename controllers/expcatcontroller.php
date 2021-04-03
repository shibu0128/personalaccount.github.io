<?php

require_once '../Daos/ExpensesCategoryDao.php';
require_once '../beans/Expensescategory.php';

session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}

$expcatname = $_POST['expcatname'];
$expcatdetails = $_POST['expcatdetails'];
$uid = $_GET['userid'];
$opn = $_GET['opn'];
$expcatid = $_GET['expcatid'];
$exb = new Expensescategory;
$exd = new ExpensesCategoryDao;
if ($opn != NULL) {
    if ($opn == "add" && $expcatdetails != NULL && $expcatname != NULL && $uid != NULL) {
        $exb->setUserid($uid);
        $exb->setExpcatdetails($expcatdetails);
        $exb->setExpcatname($expcatname);
        $exd->create($exb);
        header("Location: /MyAccount/expensescategory/expensecategoryview.php");
    } else if ($opn == "delete" && $expcatid != NULL) {
        $exd->remove($expcatid);
        header("Location: ../expensescategory/expensecategoryview.php");
    } elseif ($opn = "edit" && $expcatid != NULL && $expcatdetails != NULL && $expcatname != NULL && $uid != NULL) {
        $exb->setUserid($uid);
        $exb->setExpcatdetails($expcatdetails);
        $exb->setExpcatname($expcatname);
        $exb->setExpcatid($expcatid);
        $exd->edit($exb);
        header("Location: /MyAccount/expensescategory/expensecategoryview.php");
    }
}



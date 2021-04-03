<?php

require_once '../Daos/IncomeCategoryDao.php';
require_once '../beans/Incomecategory.php';

session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /index.php");
}

$inccatname = $_POST['inccatname'];
$inccatdetails = $_POST['inccatdetails'];
$uid = $_GET['userid'];
$opn = $_GET['opn'];
$inccatid = $_GET['inccatid'];
$icb = new Incomecategory;
$icd = new IncomeCategoryDao;
if ($opn != NULL) {
    if ($opn == "add" && $inccatdetails != NULL && $inccatname != NULL && $uid != NULL) {
        $icb->setUserid($uid);
        $icb->setInccatdetails($inccatdetails);
        $icb->setInccatname($inccatname);
        $icd->create($icb);
        header("Location: ../incomecategory/incomecategoryview.php");
    } else if ($opn == "delete" && $inccatid != NULL) {
        $icd->remove($inccatid);
        header("Location: ../incomecategory/incomecategoryview.php");
    } elseif ($opn = "edit" && $inccatdetails != NULL && $inccatname != NULL && $uid != NULL) {
        $icb->setUserid($uid);
        $icb->setInccatdetails($inccatdetails);
        $icb->setInccatname($inccatname);
        $icb->setInccatid($inccatid);
        $icd->edit($icb);
        header("Location: ../incomecategory/incomecategoryview.php");
    }
}



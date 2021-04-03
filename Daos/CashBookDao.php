<?php

require_once '../beans/Cashbook.php';
require_once '../utilities/dbconnect.php';

class CashBookDao {

    function create($cashbookbean) {
        $con = Dbconnect::getConnection();
        $account = $cashbookbean->getAccount();
        $trandate = $cashbookbean->getTrandate();
        $amount = $cashbookbean->getAmount();
        $userid = $cashbookbean->getUserid();
        $operation = $cashbookbean->getOperation();
        $query = "insert into cash_book (account, tran_date, amount, userid, operation) values('$account', '$trandate', '$amount', '$userid', '$operation')";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    function edit($cashbookbean) {
        $con = Dbconnect::getConnection();
        $account = $cashbookbean->getAccount();
        $trandate = $cashbookbean->getTrandate();
        $amount = $cashbookbean->getAmount();
        $userid = $cashbookbean->getUserid();
        $operation = $cashbookbean->getOperation();
        $acid = $cashbookbean->getAcid();
        $query = "update cash_book set account = '$account' , tran_date = '$trandate' , amount = '$amount' , userid = '$userid' , operation = '$operation' where acid = $acid";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from cash_book where acid = $id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function findAll($userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "select * from cash_book where userid=$userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Cashbook;
            $bean->setAcid($row['acid']);
            $bean->setAcccount($row['account']);
            $bean->setAmount($row['amount']);
            $bean->setOperation($row['operation']);
            $bean->setTrandate($row['tran_date']);
            $bean->setUserid($row['userid']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function find($acid) {
        $bean = new Cashbook;
        $con = Dbconnect::getConnection();
        $query = "select * from cash_book where acid=$acid";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {

            $bean->setAcid($row['acid']);
            $bean->setAcccount($row['account']);
            $bean->setAmount($row['amount']);
            $bean->setOperation($row['operation']);
            $bean->setTrandate($row['tran_date']);
            $bean->setUserid($row['userid']);
        }
        mysqli_close($con);
        return $bean;
    }

    function findAllDateWise($sdate, $edate, $userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "select * from cash_book where tran_date between '$sdate' and '$edate' and userid=$userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Cashbook;
            $bean->setAcid($row['acid']);
            $bean->setAcccount($row['account']);
            $bean->setAmount($row['amount']);
            $bean->setOperation($row['operation']);
            $bean->setTrandate($row['tran_date']);
            $bean->setUserid($row['userid']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function closingBalance($userid) {
        $clb = 0.0;
        $con = Dbconnect::getConnection();
        $query = "select (SELECT sum(amount) as total_payment FROM cash_book b where userid = $userid and operation='receive')-(SELECT sum(amount) as total_receivied FROM cash_book b where userid = $userid and operation='pay') as 'Closing Balance' from dual";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $clb = $row[0];
        }
        mysqli_close($con);
        return $clb;
    }

}

//$cb = new Cashbook;
//$cd = new CashBookDao;
//$cb->setAcccount("Current");
//$cb->setAmount(5000);
//$cb->setOperation("Deposite");
//$cb->setTrandate("2014-05-08");
//$cb->setUserid(1);
//$cb->setAcid(9);
//echo 'Closing balance: '.$cd->closingBalance(7);
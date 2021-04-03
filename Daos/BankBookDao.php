<?php

require_once '../beans/Bankbook.php';
require_once '../utilities/dbconnect.php ';

class BankBookDao {

    function create($bankbookbean) {
        $con = Dbconnect::getConnection();
        $account = $bankbookbean->getAccount();
        $trandate = $bankbookbean->getTrandate();
        $amount = $bankbookbean->getAmount();
        $userid = $bankbookbean->getUserid();
        $operation = $bankbookbean->getOperation();
        $query = "insert into bank_book (account, tran_date, amount, userid, operation) values(\"$account\", \"$trandate\", \"$amount\", \"$userid\", \"$operation\")";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    function edit($bankbookbean) {
        $con = Dbconnect::getConnection();
        $account = $bankbookbean->getAccount();
        $trandate = $bankbookbean->getTrandate();
        $amount = $bankbookbean->getAmount();
        $userid = $bankbookbean->getUserid();
        $operation = $bankbookbean->getOperation();
        $acid = $bankbookbean->getAcid();
        $query = "update bank_book set account = \"$account\" , tran_date = \"$trandate\" , amount = \"$amount\" , userid = \"$userid\" , operation = \"$operation\" where acid = \"$acid\"";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from bank_book where acid = $id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function findAll() {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "select * from bank_book";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Bankbook;
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

    function find($userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "select * from bank_book where userid=$userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Bankbook;
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

    function findAllDateWise($sdate, $edate, $userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "select * from bank_book where tran_date between \"$sdate\" and \"$edate\" and userid=$userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Bankbook;
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
        $query = "select (SELECT sum(amount) as total_payment FROM bank_book b where userid = $userid and operation='receive')-(SELECT sum(amount) as total_receivied FROM bank_book b where userid = $userid and operation='pay') as 'Closing Balance' from dual";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $clb = $row['Closing Balance'];
        }
        mysqli_close($con);
        return $clb;
    }

}

//$bd = new BankBookDao();
//$list = $bd->closingBalance(2);
//echo 'Balance ' . $list;
//foreach ($list as $b) {
//    echo 'Account' . $b->getAmount() . '<br>';
//}
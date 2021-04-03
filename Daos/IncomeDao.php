<?php

require_once '../beans/Income.php';
require_once '../utilities/dbconnect.php';

class IncomeDao {

    function create($incomebean) {
        $con = Dbconnect::getConnection();
        $inc_ac = $incomebean->getIncac();
        $userid = $incomebean->getUserid();
        $inc_catid = $incomebean->getInccatid();
        $amount = $incomebean->getAmount();
        $trandate = $incomebean->getTrandate();
        $recieveby = $incomebean->getRecieveby();
        $remark = $incomebean->getRemark();
        $query = "Insert into income (inc_ac ,userid ,inc_catid ,amount ,tran_date , receivby , remark )  values('$inc_ac', '$userid', '$inc_catid', '$amount', '$trandate','$recieveby','$remark')";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    function edit($expensesbean) {
        $con = Dbconnect::getConnection();
        $expid = $expensesbean->getExpid();
        $exp_ac = $expensesbean->getExpac();
        $userid = $expensesbean->getUserid();
        $exp_catid = $expensesbean->getExpcatid();
        $amount = $expensesbean->getAmount();
        $trandate = $expensesbean->getTrandate();
        $payby = $expensesbean->getPayby();
        $remark = $expensesbean->getRemark();
        $query = "Update expenses set exp_ac='$exp_ac',userid='$userid',exp_catid='$exp_catid',amount='$amount',tran_date='$trandate',payby='$payby',remark='$remark' where exp_id = $expid";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from expenses where exp_id = $id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function findAll() {
        $list = array();
        $i = 0;
        $con = Dbconnect::getConnection();
        $query = "Select * from expenses";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Expenses;
            $bean->setExpid($row['exp_id']);
            $bean->setExpac($row['exp_ac']);
            $bean->setUserid($row['userid']);
            $bean->setExpcatid($row['exp_catid']);
            $bean->setAmount($row['amount']);
            $bean->setTrandate($row['tran_date']);
            $bean->setPayby($row['payby']);
            $bean->setRemark($row['remark']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function find($userid) {
        $list = array();
        $i = 0;
        $con = Dbconnect::getConnection();
        $query = "Select * from expenses where userid=$userid";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Expenses;
            $bean->setExpid($row['exp_id']);
            $bean->setExpac($row['exp_ac']);
            $bean->setUserid($row['userid']);
            $bean->setExpcatid($row['exp_catid']);
            $bean->setAmount($row['amount']);
            $bean->setTrandate($row['tran_date']);
            $bean->setPayby($row['payby']);
            $bean->setRemark($row['remark']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function findAllDateWise($sdate, $edate, $userid) {
        $list = array();
        $i = 0;
        $con = Dbconnect::getConnection();
        $query = "Select * from income where tran_date between '$sdate' and '$edate' and userid=$userid order by tran_date";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Income;
            $bean->setIncid($row['inc_id']);
            $bean->setIncac($row['inc_ac']);
            $bean->setUserid($row['userid']);
            $bean->setInccatid($row['inc_catid']);
            $bean->setAmount($row['amount']);
            $bean->setTrandate($row['tran_date']);
            $bean->setRecieveby($row['receivby']);
            $bean->setRemark($row['remark']);
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
//$ed=new IncomeDao;
//$eb->setAmount(50000);
//$eb->setExpac("Saving");
//$eb->setExpcatid(1);
//$eb->setExpid(7);
//$eb->setPayby("Cash");
//$eb->setRemark("Done");
//$eb->setTrandate("2014-05-06");
//$eb->setUserid(1);
//$list = $ed->findAllDateWise("2012-06-29", "2012-06-30", 4);
//foreach ($list as $s) {
//    echo '<br>Pay by: ' . $s->getRecieveby();
//}
//echo 'Closing balance: ' . $ed->closingBalance(2);

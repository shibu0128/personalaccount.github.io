<?php

require_once '../utilities/dbconnect.php';

class ExpensesCategoryDao {

    function create($expensecategorybean) {
        $con = Dbconnect::getConnection();
        $expcatname = $expensecategorybean->getExpcatname();
        $expcatdetails = $expensecategorybean->getExpcatdetails();
        $userid = $expensecategorybean->getUserid();
        $query = "Insert into expenses_category (exp_catname ,exp_catdetails, userid )  values('$expcatname','$expcatdetails','$userid')";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    function edit($expensecategorybean) {
        $con = Dbconnect::getConnection();
        $expcatname = $expensecategorybean->getExpcatname();
        $expcatdetails = $expensecategorybean->getExpcatdetails();
        $userid = $expensecategorybean->getUserid();
        $expcatid = $expensecategorybean->getExpcatid();
        $query = "Update expenses_category set exp_catname='$expcatname',exp_catdetails='$expcatdetails' where exp_catid = $expcatid";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from expenses_category where exp_catid= $id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function findAll($userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "Select * from expenses_category where userid = $userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Expensescategory;
            $bean->setExpcatname($row['exp_catname']);
            $bean->setExpcatdetails($row['exp_catdetails']);
            $bean->setUserid($row['userid']);
            $bean->setExpcatid($row['exp_catid']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function find($expcatid) {
        $bean = new Expensescategory;
        $con = Dbconnect::getConnection();
        $query = "Select * from expenses_category where  exp_catid =$expcatid";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Expensescategory;
            $bean->setExpcatname($row['exp_catname']);
            $bean->setExpcatdetails($row['exp_catdetails']);
            $bean->setUserid($row['userid']);
            $bean->setExpcatid($row['exp_catid']);
        }
        mysqli_close($con);
        return $bean;
    }

}

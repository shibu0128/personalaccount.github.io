<?php
require_once '../beans/Incomecategory.php';
require_once '../utilities/dbconnect.php';

class IncomeCategoryDao {

    function create($incomecategorybean) {
        $con = Dbconnect::getConnection();
        $inccatname = $incomecategorybean->getInccatname();
        $inccatdetails = $incomecategorybean->getInccatdetails();
        $userid = $incomecategorybean->getUserid();
        $query = "Insert into income_category (inc_catname ,inc_catdetails,userid )  values('$inccatname','$inccatdetails','$userid')";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    function edit($incomecategorybean) {
        $con = Dbconnect::getConnection();
        $inccatname = $incomecategorybean->getInccatname();
        $inccatdetails = $incomecategorybean->getInccatdetails();
        $userid = $incomecategorybean->getUserid();
        $inccatid = $incomecategorybean->getInccatid();
        $query = "Update income_category set inc_catname='$inccatname',inc_catdetails='$inccatdetails' where inc_catid = $inccatid";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from income_category where inc_catid=$id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function findAll($userid) {
        $list = array();
        $con = Dbconnect::getConnection();
        $query = "Select * from income_category where userid=$userid";
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Incomecategory;
            $bean->setInccatname($row['inc_catname']);
            $bean->setInccatdetails($row['inc_catdetails']);
            $bean->setUserid($row['userid']);
            $bean->setInccatid($row['inc_catid']);
            $list[$i] = $bean;
            $i++;
        }
        mysqli_close($con);
        return $list;
    }

    function find($expcatid) {
        $bean = new Incomecategory;
        $con = Dbconnect::getConnection();
        $query = "Select * from income_category where  inc_catid =$expcatid";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $bean = new Incomecategory;
            $bean->setInccatname($row['inc_catname']);
            $bean->setInccatdetails($row['inc_catdetails']);
            $bean->setUserid($row['userid']);
            $bean->setInccatid($row['inc_catid']);
        }
        mysqli_close($con);
        return $bean;
    }

}

<?php

require_once '../beans/Users.php';
require_once '../utilities/dbconnect.php ';

class UsersDao {

    function create($userbean) {
        $con = Dbconnect::getConnection();
        $username = $userbean->getUsername();
        $password = $userbean->getPasword();
        $name = $userbean->getName();
        $address = $userbean->getAddress();
        $mobile = $userbean->getMobile();
        $email = $userbean->getEmail();
        $query = "Insert into users (username ,password ,name ,address ,mobile ,email )  values('$username','$password','$name','$address','$mobile','$email')";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

        mysqli_close($con);
    }

    
    
    
    
    
    
    
    
    function edit($userbean) {
        $con = Dbconnect::getConnection();
        $uid = $userbean->getUid();
        $username = $userbean->getUsername();
        $password = $userbean->getPasword();
        $name = $userbean->getName();
        $address = $userbean->getAddress();
        $mobile = $userbean->getMobile();
        $email = $userbean->getEmail();
        $query = "Update users set username='$username',password='$password',name='$name',address='$address',mobile='$mobile',email='$email' where uid = $uid";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record updated";

        mysqli_close($con);
    }

    function remove($id) {
        $con = Dbconnect::getConnection();
        $query = "delete from users where uid= $id";
        if (!mysqli_query($con, $query)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record deleted";

        mysqli_close($con);
    }

   
    function authenticate($username, $password) {
        $bean = new Users;
        $con = Dbconnect::getConnection();
        $query = "Select * from users where  username = '$username' and password = '$password'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {

            $bean->setUid($row['uid']);
            $bean->setUsername($row['username']);
            $bean->setPasword($row['password']);
            $bean->setName($row['name']);
            $bean->setAddress($row['address']);
            $bean->setMobile($row['mobile']);
            $bean->setEmail($row['email']);
        }
        mysqli_close($con);
        return $bean;
    }

}

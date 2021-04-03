<?php

require_once '../beans/Users.php';
require_once '../Daos/UsersDao.php';

$userid = $_POST['userid'];
$uname = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$opn = $_POST['opn'];
echo 'id ' . $userid;

$ub = new Users;
$ud = new UsersDao;
if ($opn != NULL) {
    if ($opn == "add" && $address != NULL && $email != NULL && $mobile != NULL && $name != NULL && $password != NULL && $uname != NULL) {
        $ub->setUsername($uname);
        $ub->setPasword($password);
        $ub->setName($name);
        $ub->setAddress($address);
        $ub->setMobile($mobile);
        $ub->setEmail($email);
        $ud->create($ub);
        header("Location: ../index.php");
    } elseif ($opn == "update" && $userid != NULL && $address != NULL && $email != NULL && $mobile != NULL && $name != NULL && $password != NULL && $uname != NULL) {
        $ub->setUid($userid);
        $ub->setUsername($uname);
        $ub->setPasword($password);
        $ub->setName($name);
        $ub->setAddress($address);
        $ub->setMobile($mobile);
        $ub->setEmail($email);
        $ud->edit($ub);
        header("Location: ../profile.php");
    }
}


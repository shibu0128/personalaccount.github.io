<?php

require_once '../beans/Users.php';
require_once '../Daos/UsersDao.php';
require_once '../utilities/dbconnect.php';

$uname = $_POST['login'];
$password = $_POST['password'];
$ub = new Users;
$ud = new UsersDao;
$ub = $ud->authenticate($uname, $password);
if (($uname != NULL) && ($password != NULL) && ($ub != NULL)) {
    if ($uname == $ub->getUsername()) {
        session_start();
        $_SESSION['user'] = serialize($ub);
        header("Location: ../home.php");
    } else {
        header("Location: ../index.php");
    }
}
?>



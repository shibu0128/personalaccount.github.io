<?php

class Dbconnect {

    public static function getConnection() {
        //properties

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "myaccount";
        $port = "3306";

        //create connection

        $con = mysqli_connect($host, $user, $password, $database, $port);

//check connection

        if (mysqli_connect_errno()) {
            echo 'Fail to connect to mysql' . mysqli_connect_error();
        }
        return $con;
    }

}

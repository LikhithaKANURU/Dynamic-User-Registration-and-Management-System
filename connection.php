<?php
error_reporting(0);
    $servername="localhost";
    $username="root";
    $password="Likhi@08";
    $dbname="responsiveform3";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if($conn)
    {
        //echo "Connection ok";
    }
    else
    {
        echo "Connection failed".mysqli_connect_error();
    }
?>
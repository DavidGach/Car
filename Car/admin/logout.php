<?php

   include('session.php');

   $sql = "UPDATE `admin` SET `lastaccess` = '".date("Y-m-d")."' WHERE `admin`.`username` = '".$_SESSION['login_user']."'";

           if (!mysqli_query($db, $sql)) {
             echo "error";
           }else {
             header("Location: log-out.php");
           }




?>

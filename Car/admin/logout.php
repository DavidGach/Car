<?php

   session_start();
   include('session.php');
   include("config.php");
   $sql = "UPDATE `admin` SET `lastaccess` = '".date("Y-m-d")."' WHERE `admin`.`username` = '".$myusername."'";

           if (!mysqli_query($db, $sql)) {
             echo "error";
           }else {
             if(session_destroy()) {
                header("Location: admin.php");
             }
           }

?>

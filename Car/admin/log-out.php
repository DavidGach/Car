<?php
include("session.php");
if(session_destroy()) {
   header("Location: admin.php");

}
 ?>

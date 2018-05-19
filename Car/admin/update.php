<?php
include("config.php");
if (isset($_POST["submit"])) {

  if (isset($_POST["facebook"]) && $_POST["facebook"]!= "") {
    $sql = "UPDATE `social` SET `url` = '".$_POST["facebook"]."' WHERE `social`.`id` = 1";
    if (mysqli_query($db, $sql)) {
        echo "Record updated successfully";

    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
  }

if (isset($_POST["tweeter"]) && $_POST["tweeter"]!= "") {
  $sql = "UPDATE social SET url= '".$_POST["tweeter"]."' WHERE `social`.`id` = 3";
  if (mysqli_query($db, $sql)) {


    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($db);
  }
}
if (isset($_POST["instagram"]) && $_POST["instagram"]!= "") {
  $sql = "UPDATE social SET url= '".$_POST["instagram"]."' WHERE`social`.`id`= 2";
  if (mysqli_query($db, $sql)) {

      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . mysqli_error($db);
  }
}

header("Location: socialLinks.php");


}


 ?>

<?php
include("config.php");
if (isset($_POST["submit"])) {

  if (isset($_POST["facebook"]) && $_POST["facebook"]!= "") {
    $sql = "UPDATE `social` SET `url` = '".$_POST["facebook"]."' WHERE `social`.`id` =".$_POST["facebookh"];
    if (mysqli_query($db, $sql)) {
        echo "Record updated successfully";

    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
  }

if (isset($_POST["Google"]) && $_POST["Google"]!= "") {
  $sql = "UPDATE social SET url= '".$_POST["Google"]."' WHERE `social`.`id` =".$_POST["googleh"];
  if (mysqli_query($db, $sql)) {


    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($db);
  }
}
if (isset($_POST["twitter"]) && $_POST["twitter"]!= "") {
  $sql = "UPDATE social SET url= '".$_POST["twitter"]."' WHERE`social`.`id`=".$_POST["twitterh"];
  if (mysqli_query($db, $sql)) {

      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . mysqli_error($db);
  }
}

header("Location: socialLinks.php");


}


 ?>

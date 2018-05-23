<?php
include("config.php");
if (isset($_POST["send"])) {


$images=0;
$promotions=0;
$updates=0;
$joboffers=0;

 if(in_array('images', $_POST['arr'])){
  $images=1;
 }

 if(in_array('promotions', $_POST['arr'])){
   $promotions=1;
 }
 if(in_array('updates', $_POST['arr'])){
  $updates=1;
 }
 if(in_array('joboffers', $_POST['arr'])){
   $joboffers=1;
 }

  $sql="INSERT INTO `subscribers` (`name`, `email`, `subject`, `text`, `gender`, `resiveImages`, `resivePromotions`, `resiveUpdates`, `resiveJobOffers`, `date`)
   VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["subject"]."', '".$_POST["text"]."', '".$_POST["gender"]."',
    '".$images."', '".$promotions."', '".$updates."', '".$joboffers."', '".date("Y/m/d")."')";

  if (!$db->query($sql) === TRUE) {
    echo "New record created successfully";
}else {
  header("Location: index.php");
}
}
 ?>

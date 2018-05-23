<?php
   include('session.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="assets/css/custom1.css">

</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="home.php">Welcome  dato</a>
          </div>
          <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">Last Access : 2018-05-19    <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
      </nav>
         <!-- /. NAV TOP  -->
              <nav class="navbar-default navbar-side" role="navigation">
                   <!-- /. menu  -->
          <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
      <li class="text-center">
                  <img src="assets/img/find_user.png" class="user-image img-responsive"/>
        </li>

                  <li>
                     <a  href="home.php" ><i class="fa fa-square-o fa-3x"></i>Home </a>
                 </li>
                  <li>
                      <a  href="dashboard.php" class="active-menu"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                  </li>
                   <li>
                      <a  href="services.php" ><i class="fa fa-qrcode fa-3x"></i> Services </a>
                  </li>
                  <li>
                     <a  href="socialLinks.php" ><i class="fa fa-desktop fa-3x"></i>Social Links </a>
                 </li>
                 <li>
                    <a  href="subscribers.php" ><i class="fa fa-edit fa-3x"></i>Subscribers </a>
                </li>
          </div>
      </nav>



      <div id="page-wrapper" >
<div class="page-inner">

  <?php
  $i=0;
  $sql="SELECT * FROM subscribers ";
    $result = $db->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          $i++;
          }
      }
   ?>
  <a href="subscribers.php">
  <div class="row">
                 <div class="col-md-3 col-sm-6 col-xs-6">
 			<div class="panel panel-back noti-box">
                 <span class="icon-box bg-color-red set-icon">
                     <i class="fa fa-envelope-o"></i>
                 </span>
                 <div class="text-box">
                     <p class="main-text"><?php  echo  $i; ?> New</p>
                     <p class="text-muted">Messages</p>
                 </div>
              </div>
 		     </div>
          </a>
   <?php
          $i=0;
          $sql="SELECT * FROM images ";
            $result = $db->query($sql);
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                  $i++;
                  }
              }else {
                echo "error";
              }
   ?>
          <a href="home.php">
                     <div class="col-md-3 col-sm-6 col-xs-6">
 			<div class="panel panel-back noti-box">
                 <span class="icon-box bg-color-green set-icon">
                     <i class="fa fa-bars"></i>
                 </span>
                 <div class="text-box">
                     <p class="main-text"><?php echo $i; ?> pictures</p>
                     <p class="text-muted">on slider</p>
                 </div>
              </div>
 		     </div>

          </a>


          <?php
                 $i=0;
                 $sql="SELECT * FROM services ";
                   $result = $db->query($sql);
                     if ($result->num_rows > 0) {
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
                         $i++;
                         }
                     }else {
                       echo "error";
                     }
          ?>
          <a href="services.php">
            <div class="col-md-3 col-sm-6 col-xs-6">
               <div class="panel panel-back noti-box">
                      <span class="icon-box bg-color-brown set-icon">
                          <i class="fa fa-rocket"></i>
                      </span>
                      <div class="text-box">
                          <p class="main-text"><?php echo $i; ?> services</p>
                          <p class="text-muted">services</p>
                      </div>
                   </div>
               </div>
          </a>

    </div>
        </div>
        <!-- slider -->

<h1>Preview Slider</h1>
                 <div id="slider">
                   <a href="#" class="control_next">></a>
                   <a href="#" class="control_prev"><</a>
                   <ul>
                     <?php

                     $sql = "SELECT * FROM images";
                         $result = $db->query($sql);

                         if ($result->num_rows > 0) {
                             // output data of each row
                             while($row = $result->fetch_assoc()) {


                      ?>
                      <li style='background-image: url("../user/media/images/slider/<?php echo $row["url"];?>");'></li>
                      <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($db);
                     ?>

                   </ul>
                 </div>

                 <div class="slider_option">
                   <input type="checkbox" id="checkbox">
                   <label for="checkbox">Autoplay Slider</label>
                 </div>

        <!-- slider -->


</div>


<script type="text/javascript">
jQuery(document).ready(function ($) {

$('#checkbox').change(function(){
  setInterval(function () {
      moveRight();
  }, 3000);
});

var slideCount = $('#slider ul li').length;
var slideWidth = $('#slider ul li').width();
var slideHeight = $('#slider ul li').height();
var sliderUlWidth = slideCount * slideWidth;

$('#slider').css({ width: slideWidth, height: slideHeight });

$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

  $('#slider ul li:last-child').prependTo('#slider ul');

  function moveLeft() {
      $('#slider ul').animate({
          left: + slideWidth
      }, 200, function () {
          $('#slider ul li:last-child').prependTo('#slider ul');
          $('#slider ul').css('left', '');
      });
  };

  function moveRight() {
      $('#slider ul').animate({
          left: - slideWidth
      }, 200, function () {
          $('#slider ul li:first-child').appendTo('#slider ul');
          $('#slider ul').css('left', '');
      });
  };

  $('a.control_prev').click(function () {
      moveLeft();
  });

  $('a.control_next').click(function () {
      moveRight();
  });

});

</script>

     <!-- /. WRAPPER  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>

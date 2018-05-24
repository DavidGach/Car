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
                <a class="navbar-brand" href="home.php"><?php echo "Welcome  ".$login_session; ?></a>
            </div>
  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Last Access : <?php $sql="SELECT lastaccess FROM admin where username = '".$login_session."'";
                                                                                          $result = $db->query($sql);
                                                                                          while($row = $result->fetch_assoc()) {
                                                                                                  echo $row["lastaccess"]."   ";
                                                                                              }

  ?> <a href = "logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>

                    <li>
                       <a  href="home.php" ><i class="fa fa-square-o fa-3x"></i>Home </a>
                   </li>
                    <li>
                        <a  href="dashboard.php" ><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="services.php" ><i class="fa fa-qrcode fa-3x"></i> Services </a>
                    </li>
                    <li>
                       <a  href="socialLinks.php" class="active-menu"><i class="fa fa-desktop fa-3x"></i>Social Links </a>
                   </li>
                   <li>
                      <a  href="subscribers.php" ><i class="fa fa-edit fa-3x"></i>Subscribers </a>
                  </li>








            </div>
        </nav>
        <div id="page-wrapper" >
  <!-- /.     //subscribers   -->

  <?php
  $arr = array();
  $arr1=array();
    $sql="SELECT * FROM social";
    $i=0;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $arr[$i]=$row["url"];
          $arr1[$i]=$row["id"];
          $i++;
        }
        }else {
          $arr[2]="plus.google.com";
          $arr[0]="facebook.com";
          $arr[1]="twitter.com";
          for ($i=0; $i < 3; $i++) {
            $sql="INSERT INTO social (url)VALUES ('". $arr[$i] ."')";
            if (!mysqli_query($db, $sql)) {
                echo " <script>alert('error saving')</script>";
            }
          }
        }


   ?>




<form class="form-horizontal" method="POST" action="update.php">

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Google+:<br>
            <a href="https://<?php echo $arr[1]; ?>"> <?php echo $arr[2]; ?> </a>
            <input type="hidden" name="googleh" value="<?php echo $arr1[2]; ?>">
          </label>
          <div class="col-sm-10">

            <input type="text" class="form-control" name="Google" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Facebook:<br>
            <a href="https://<?php echo $arr[0]; ?>"> <?php echo $arr[0]; ?> </a>
            <input type="hidden" name="facebookh" value="<?php echo $arr1[0]; ?>">

          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="facebook"  >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">twitter:<br>
            <a href="https://<?php echo $arr[2]; ?>"> <?php echo $arr[1]; ?> </a>
            <input type="hidden" name="twitterh" value="<?php echo $arr1[1]; ?>">

           </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="twitter"  >
          </div>
        </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" value="Save" class="btn btn-default">
      </div>
    </div>
  </form>







    </div>
        </div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
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

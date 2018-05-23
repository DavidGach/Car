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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


      <style>
    .panel, .flip {
           padding: 5px;
           border: solid 1px #c3c3c3;

      }

      .panel {
          padding: 10px;
          display: none;
      }
      </style>
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
  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">Last Access : <?php $sql="SELECT lastaccess FROM admin where username = '".$login_session."'";
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
                       <a  href="socialLinks.php" ><i class="fa fa-desktop fa-3x"></i>Social Links </a>
                   </li>
                   <li>
                      <a  href="subscribers.php" class="active-menu"><i class="fa fa-edit fa-3x"></i>Subscribers </a>
                  </li>








            </div>
        </nav>
        <div id="page-wrapper" >
  <!-- /.     //subscribers   -->


      <?php
    $sql="SELECT * FROM `subscribers`";

    $result = $db->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
    ?>

    <script>

    $(document).ready(function(){
        $("#<?php echo  $row["name"].$row["id"]."flip"; ?>").click(function(){
            $("#<?php echo $row["name"].$row["id"]."panel"; ?>").slideToggle("slow");
        });
    });
    </script>


    <div id="<?php  echo  $row["name"].$row["id"]."flip"; ?>" class="flip"><?php echo  $row["email"]; ?></div>
    <div id="<?php  echo $row["name"].$row["id"]."panel";?>" class="panel"><h3><b>Subject:</b> <?php echo  $row["subject"]; ?></h3>
      <h5><b>Name:</b><?php echo  $row["name"]; ?></h5>
      <h5><b>Text:</b><?php echo  $row["text"]; ?></h5>
      <h5><a href="del1.php?id=<?php echo  $row["id"]; ?>" style="color:red;">delete</a></h5>

    </div>

    <?php
          }
      }else {
        echo "0 subscribers";
      }
       ?>








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

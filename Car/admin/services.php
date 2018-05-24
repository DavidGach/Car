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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link href="assets/css/custom1.css" rel="stylesheet" />
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
            <a  href="services.php" class="active-menu"><i class="fa fa-qrcode fa-3x"></i> Services </a>
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
        <!-- /.     //subscribers   -->



      <br>
      <br>

      <section id="services">
        <h1>Preview Services</h1><br><br><br>

        <?php
        $record="";
        $error="";
        if (isset($_POST["change1"])){
            $sql= "UPDATE services SET keyword= '".$_POST["t1"]."' WHERE`services`.`id`= 5";
              if (!mysqli_query($db, $sql)) {
                  $error = "Error updating record: " ;
                  echo "error updating";
              }
        }
        if (isset($_POST["change2"])){
            $sql= "UPDATE services SET keyword= '".$_POST["t2"]."' WHERE`services`.`id`= 6";
              if (!mysqli_query($db, $sql)) {
                  $error = "Error updating record: " ;
                  echo "error updating";
              }
        }
        if (isset($_POST["change3"])){
            $sql= "UPDATE services SET keyword= '".$_POST["t3"]."' WHERE`services`.`id`= 7";
              if (!mysqli_query($db, $sql)) {
                  $error = "Error updating record: " ;
                  echo "error updating";
              }
        }


        $sql = "SELECT * FROM services";
        $result = $db->query($sql);
        $arr = array();
        $arrimg = array();
        $id = array();

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            array_push($arr,$row["keyword"]) ;
            array_push($arrimg,$row["url"]) ;
            array_push($id,$row["id"]) ;

          }
        } else {
          echo "0 results";
        }

        ?>




        <script type="text/javascript">
        $(document).ready(function() {
          $('#upload').bind("click",function()
          {
            var imgVal = $('#fileToUpload').val();
            if(imgVal=='')
            {
              alert("empty input file");
              return false;
            }


          });
        });
        </script>



          <div class="cards-container">
            <form class="card modify" method="post">
              <img src="../user/media/images/<?php echo $arrimg[0]; ?>">
              <h3 id="test1"><?php echo $arr[0]; ?></h3>
<span>
                  <input required type="text" name="t1" value="">
                  <input type="submit" id="btn1" name="change1" value="change">
                  </form>
                      <form action="uploadservice.php" method="post" enctype="multipart/form-data">
                          <input type="file" name="fileToUpload" id="fileToUpload" required>
                          <input type="hidden" name="id" value="5">
                          <input type="submit" value="Upload Image" id="upload" name="submit1">
                      </form>
</span>



            <form class="card buy" method="post">
              <img src="../user/media/images/<?php echo $arrimg[1]; ?>">
              <h3 id="2"><?php echo $arr[1]; ?></h3>
<span>
                  <input required type="text" name="t2" value="">
                  <input type="submit" name="change2" value="change2">
                    </form>
                      <form action="uploadservice.php" method="post" enctype="multipart/form-data">
                          <input type="file" name="fileToUpload" id="fileToUpload" required>
                          <input type="hidden" name="id" value="6">

                          <input type="submit" value="Upload Image" id="upload" name="submit">
                      </form>
</span>



            <form class="card repair" method="post">
              <img src="../user/media/images/<?php echo $arrimg[2]; ?>">
              <h3 id="3"><?php echo $arr[2]; ?></h3>
  <span>
                <input required type="text" name="t3" value="">
                <input type="submit" name="change3" value="change">
                  </form>
                  <form action="uploadservice.php" method="post" enctype="multipart/form-data">
                      <input type="file" name="fileToUpload" id="fileToUpload" required>
                      <input type="hidden" name="id" value="7">
                      <input type="submit" value="Upload Image" id="upload" name="submit3">

  </span>
            </form>


          </div>



        </section>






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

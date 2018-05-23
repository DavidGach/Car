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
   <style media="screen">
   .gallery-title
{
  font-size: 36px;
  color: #42B32F;
  text-align: center;
  font-weight: 500;
  margin-bottom: 70px;
}
.gallery-title:after {
  content: "";
  position: absolute;
  width: 7.5%;
  left: 46.5%;
  height: 45px;
  border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
  font-size: 18px;
  border: 1px solid #42B32F;
  border-radius: 5px;
  text-align: center;
  color: #42B32F;
  margin-bottom: 30px;

}
.filter-button:hover
{
  font-size: 18px;
  border: 1px solid #42B32F;
  border-radius: 5px;
  text-align: center;
  color: #ffffff;
  background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
  background-color: #42B32F;
  color: white;
}

.port-image
{
  width: 100%;
}

.gallery_product
{
  margin-bottom: 30px;
}

.img-wrap {

    position: relative;
    color: red;
    opacity: 100%;

    ...
}
.img-wrap .close {
  width: 80%;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: wrap;
  }
.close{
  color: red;
  opacity: 100%;

}

.pics-holder {
	width: 80%;
	display: flex;
	justify-content: flex-start;
	align-items: center;
	flex-wrap: wrap;
}

.pic {
	flex-basis: 416px;
	height: 234px;
	margin: 30px;
  margin-top: 0px;
	background-position: center;
	background-size: contain;
	background-repeat: no-repeat;

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
                     <!-- /. menu  -->
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>

                    <li>
                       <a  href="home.php" class="active-menu"><i class="fa fa-square-o fa-3x"></i>Home </a>
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
                      <a  href="subscribers.php" ><i class="fa fa-edit fa-3x"></i>Subscribers </a>
                  </li>
            </div>
        </nav>


        <div id="page-wrapper" >
  <!-- /.     //main content   -->
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
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required><br>
    <input type="submit" value="Upload Image" id="upload" name="submit">
</form>

    <br>
    <br>

        <?php
        $sql = "SELECT * FROM images";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    ?>

                    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">

                      <div style="margin-left: 30px;">


                            <form method="post" action="home.php">
                              <a  href="del.php?id=<?= $row['id'] ?>">Delete</a>
                              <input style="margin-left: 10px; height: 30px; " type="date" name="date" value="<?php echo $row["date"]; ?>" >
                              <input type="submit" id="bt<?php echo $row["id"]; ?>" name="bt<?php echo $row["id"]; ?>" style="height: 30px; width: 60px;" value="save" >

                           </form>

                           <?php

                           if (isset($_POST["bt".$row["id"]])) {
                             $sql = "UPDATE `images` SET `date` = '".$_POST["date"]."' WHERE `images`.`id` = ".$row["id"];
                             if (!mysqli_query($db, $sql)) {
                                 echo " <script>alert('error saving')</script>";
                             }else {
                               ?>
                               <script type="text/javascript">
                                 getElementById('bt<?php echo $row["id"]; ?>').value=<?php echo$_POST["date"]; ?>
                               </script>
                               <?php
                             }
                           }

                           ?>
                           </div>
                           <div class="pics-holder">
                          		<div class="pic" style='background-image: url("../user/media/images/slider/<?php echo $row["url"];?>");'></div>


                         </div>
                       </div>

                    <?php
                }
            } else {
                echo "0 results";
            }
            mysqli_close($db);
         ?>



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

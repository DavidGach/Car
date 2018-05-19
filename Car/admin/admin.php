<?php
  include("config.php");
  session_start();
  $error ="";
  if($_SERVER["REQUEST_METHOD"] == "POST") {

     $myusername = mysqli_real_escape_string($db,$_POST['username']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']);

     $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
     if ($sql== null) {
       echo "";
     }
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


     $count = mysqli_num_rows($result);


     if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
                 header("location: home.php");

     }else {
        $error = "Your Login Name or Password is invalid";
        echo "<script> alert('Your Login Name or Password is invalid');</script>";
     }
     mysqli_close($db);
  }
?>
<html>

  <head>
     <title>Login Page</title>

     <style type = "text/css">
        body {
           font-family:Arial, Helvetica, sans-serif;
           font-size:14px;
        }
        label {
           font-weight:bold;
           width:100px;
           font-size:14px;
        }
        .box {
           border:#666666 solid 1px;
        }
        .vertical{
          margin-top: 15%;


        }

     </style>

  </head>

  <body bgcolor = "#FFFFFF">

     <div align = "center" class="vertical">
        <div style = "width:300px; border: solid 1px #333333; " align = "left">
           <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

           <div style = "margin:30px">

              <form action = "" method = "post">
                <p style="color: red;"><?php echo $error; ?></p>

                 <label>UserName  :</label><input type = "text" name = "username" class = "box" required/><br><br>



                 <label>Password  :</label><input type = "password" name = "password" class = "box" required/><br><br>





                 <input type = "submit" value = " Submit " name="submit"/><br />
              </form>

              <div style = "font-size:11px; color:#cc0000; margin-top:10px">
              </div>

           </div>

        </div>

     </div>

  </body>
</html>

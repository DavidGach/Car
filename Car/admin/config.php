<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');



  $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);
  $database="carrepair";
  $query="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME=?";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s',$database);
  $stmt->execute();
  $stmt->bind_result($data);
  if($stmt->fetch())
  {
      echo "Database exists.";

  }
  else
  {
      echo"Database does not exist!!!";
      echo"<br>";
      echo "creating database...";
      echo "<script>alert('create database?')</script>";
      $sql = "CREATE DATABASE carrepair";
      if ($db->query($sql) === TRUE) {
          echo "Database created successfully";

          header("location: ../admin");
      }

  }
  $stmt->close();
// Create database


// function import(){
//   $mysqlDatabaseName ='carrepair';
//   $mysqlUserName ='root';
//   $mysqlPassword ='';
//   $mysqlExportPath ='carrepair.sql';
//
//   //DO NOT EDIT BELOW THIS LINE
//   $mysqlHostName ='localhost';
//   //Export the database and output the status to the page
//   $command='mysqldump -u' .$mysqlUserName .' -S /kunden/tmp/mysql5.sock -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
//   exec($command,$output=array(),$worked);
//   switch($worked){
//       case 0:
//           echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
//           break;
//       case 1:
//           echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
//           break;
//       case 2:
//           echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
//           break;
//   }
// }

?>

<?php
  include("config.php");
  $recordToDelete = is_numeric($_GET['id']) ? $_GET['id'] : null;
  $sql = "DELETE FROM images WHERE id = '" . $recordToDelete."'";
  if ($db->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $db->error;
  }
  echo $recordToDelete;


      if (isset($_SERVER["HTTP_REFERER"])) {
          header("Location: " . $_SERVER["HTTP_REFERER"]);
      }
?>

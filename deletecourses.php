<?php

 include_once 'configdata/config.php';

  if(isset($_GET['del'])){
     $id = $_GET['del'];
     $sql_obj = mysqli_query($config, "DELETE FROM courses WHERE id=$id");
     header('location:courses.php');
  }

?>
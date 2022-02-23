<?php

 include_once 'configdata/config.php';

  if(isset($_GET['del'])){
     $id = $_GET['del'];
     $sql_obj = mysqli_query($config, "DELETE FROM students WHERE id=$id");
     header('location:students.php');
  }

?>
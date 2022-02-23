<?php
  require_once 'configdata/config.php';

  if(isset($_POST['save'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $enroll_number = $_POST['enroll_number'];
        $date_of_admission = $_POST['date_of_admission'];
        $age = $_POST['age'];

        $sql = "INSERT INTO `students` (name, email, phone, enroll_number, date_of_admission,age) 
            VALUES ('$name', '$email', '$phone', '$enroll_number', '$date_of_admission', '$age')"; 
        if(!mysqli_query($config,$sql)){
            die('impossible d’ajouter cet enregistrement : ' . mysqli_error());
        }
        
        
    // echo "L’enregistrement est ajouté ";

        header('location: students.php');
    }
?>
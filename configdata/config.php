<?php

$hostname='localhost';
$username='root';
$password='';
$dname='e_classe_db';
$config=mysqli_connect($hostname,$username,$password,$dname);//mysqli_connect is function 

 if(!$config){
     echo "Error!! " ;
 }

 ?>
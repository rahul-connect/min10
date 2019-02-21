<?php
 session_start();

$host="localhost";
$user="root";
$pass="";
$db_name="10min";

$con = mysqli_connect($host,$user,$pass,$db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }




?>
<?php
session_start();

$con = mysqli_connect("localhost","root","root","ss");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set('Asia/Manila');
$treg =  date('Y-m-d');
?>
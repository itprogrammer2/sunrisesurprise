<?php
include("../../include/connect.php");
$iid = $_GET['id'];
$delete = mysqli_query($con, "DELETE FROM tbl_admin WHERE id='$iid'");
header("location: ../index.php");
?>
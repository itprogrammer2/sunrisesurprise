<?php
include("../../include/connect.php");
$iid = $_GET['id'];
$delete = mysqli_query($con, "DELETE FROM ref_sub_type WHERE id='$iid'");
header("location: ../stype.php");
?>
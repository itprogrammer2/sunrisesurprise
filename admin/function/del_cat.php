<?php
include("../../include/connect.php");
$iid = $_GET['id'];
$delete = mysqli_query($con, "DELETE FROM ref_type WHERE id='$iid'");
header("location: ../type.php");
?>
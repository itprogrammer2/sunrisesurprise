<?php
include("../../include/connect.php");
$iid = $_GET['id'];
$delete = mysqli_query($con, "DELETE FROM category WHERE catid='$iid'");
header("location: ../type.php");
?>
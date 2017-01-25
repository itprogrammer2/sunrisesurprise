<?php
include("../include/connect.php");
$column = $_POST['column'];
$editval = $_POST['editval'];
$id = $_POST['id'];

$result = mysqli_query($con, "UPDATE cms_about set $column = '$editval' WHERE  id='$id'");
?>
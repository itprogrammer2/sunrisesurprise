<?php include("../include/connect.php");

$query  = mysqli_query($con, "SELECT * FROM cms_image WHERE id='1'");
$row = mysqli_fetch_array($query);
$logo = "../img/".$row['image_file'];

if(isset($_SESSION['admin_id'])){
	$myid = $_SESSION['admin_id'];
} else {
	header("location: function/logout.php");
}

$try = "";
if(isset($_GET['id'])){
$id = $_GET['id'];
	$query = mysqli_query($con, "SELECT * FROM ref_category WHERE id='$id'");
	$row = mysqli_fetch_array($query);
	$category_name = $row['category_name'];
	$place = $category_name;
	$bname = "update_type";
	$label = "Update Category";
} else {
$category_name = "";
$bname = "add_type";
$label = "Add Category";
$place = "Category";
}

if(isset($_POST['update_type']))
	{
	$category_name = htmlentities($_POST['category_name'], ENT_QUOTES, "UTF-8");
	$category_id = $_POST['category_id'];
	$query = mysqli_query($con, "SELECT * FROM ref_category WHERE category_name='$category_name' AND id != '$category_id'");
	$num = mysqli_num_rows($query);
	if($num == "0"){
		$query1 = mysqli_query($con, "SELECT * FROM ref_category WHERE id = '$category_id'");
		$row1 = mysqli_fetch_array($query1);
		$dbcategory_name = $row1['category_name'];

		if($dbcategory_name != $category_name){
			$add = mysqli_query($con, "INSERT INTO ref_category_logs VALUES ('','$category_id','$dbcategory_name','category_name','$myid',CURRENT_TIMESTAMP)");
		}

		$update = mysqli_query($con, "UPDATE ref_category SET category_name='$category_name' WHERE id='$category_id'");
		$try = '
			swal({   title: "",   text: "Update Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("category.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("category.php")}, 1500);';
	} else {
		$try = '
			swal({   title: "",   text: "Category existed!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("category.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("category.php")}, 1500);';
	}
	
	}
	
if(isset($_POST['add_type']))
	{
	$category_name = htmlentities($_POST['category_name'], ENT_QUOTES, "UTF-8");
	$query = mysqli_query($con, "SELECT * FROM ref_category WHERE category_name='$category_name'");
	echo $num = mysqli_num_rows($query);
	if($num == "0")
		{
		$add = mysqli_query($con, "INSERT INTO ref_category VALUES ('','$category_name','$myid',CURRENT_TIMESTAMP)");
		$try = '
		swal({   title: "",   text: "Append Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("type.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("category.php")}, 1500);';
		}
	else
		{
		$try = '
				 swal({   title: "",   text: "Category existed!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("category.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("category.php")}, 1500);';
		}
	}
include("include/header.php");//git gitan
?>
	<body onload='<?php echo $try; ?>;'>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Banner -->
							<section class="main">
								<header class="major">
									<h1>Category</h1>
								</header>
								<h2><?php echo $label?></h2>
								<form action="category.php" method="POST">
								<?php
								if(isset($_GET['id'])){
								$category_id = $_GET['id'];
								?>
								<input type="hidden" name="category_id" value="<?php echo $category_id?>" required>
								<?php
								}
								?>
									<div class="row uniform collapse-at-2">
									<div class="4 12u$(xsmall)">
										<input type="text" name="category_name" value="<?php echo $category_name?>" placeholder="<?php echo $place?>" required>
									</div>
									<div class="8u 12u$(xsmall)">
										<ul class="actions">
											<li><input class="special" type="submit" value="<?php echo $label?>" name="<?php echo $bname?>"/></li>
											<?php
											if(isset($_GET['id'])){
											$idid = $_GET['id'];
											?>
											<li><a class="button" href="category.php">Cancel</a></li>
											<?php
											}
											?>
										</ul>
									</div>
									</div>
								</form>
							</section>
							<section id="list" class="main">
							<h2>Category List</h2>
								<div class="row uniform collapse-at-2">
									<div class="12u">
										<table id="table_id" class="display">
										<?php
										$query = mysqli_query($con, "SELECT * FROM ref_category");
										?>
										<thead>
											<tr>
												<th>Category</th>
												<th>Created By</th>
												<th>Date Created</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php
										while($row = mysqli_fetch_assoc($query))
											{
											$type_name = $row['category_name'];
											$id = $row['id'];
											$date_created = $row['date_created'];
											$created_by = $row['created_by'];
											$query1 = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id='$created_by'");
											$row1 = mysqli_fetch_array($query1);
											$created_by = $row1['fname'];
										?>
											<tr>
												<td style="color: black;"><?php echo $type_name; ?></th>
												<td style="color: black;"><?php echo $created_by; ?></th>
												<td style="color: black;"><?php echo $date_created; ?></th>
												<td style="color: black;">
												<a href='category.php?id=<?php echo $id; ?>'><center><img title='Updater' style='width: 20px; align: center;' src='images/dit.png'></center></a>
												</td>
												<!-- <td style="color: black;">
												<a href='function/del_cat.php?id=<?php echo $id; ?>'><center><img title='Updater' style='width: 20px; align: center;' src='images/del.png'></center></a>
												</td> -->
											</tr>
										<?php
											}
										?>
										</tbody>
										</table>
									</div>
								</div>
					</section>
						</div>
					</div>

				<!-- Sidebar -->
				<?php
				if(isset($_SESSION['admin_id'])){
				?>
					<div id="sidebar">
						<div class="inner">

					<?php include("include/menu.php"); ?>		

							<!-- Footer -->
								
						</div>
					</div>
				<?php } ?>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<link rel="stylesheet" type="text/css" href="js/DataTables/media/css/jquery.dataTables.css">
		<!-- jQuery -->
			<script type="text/javascript" charset="utf8" src="js/DataTables/media/js/jquery.js"></script>
			<!-- DataTables -->
			<script type="text/javascript" charset="utf8" src="js/DataTables/media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf-8">
				/* $(document).ready( function () {
				$('#table_id').DataTable();
			} ); */
			
			$(document).ready(function() {
				$('#table_id').DataTable( {
					//"order": [[ 6, "asc" ]]
					//"sScrollX": "100%",
					//"sScrollY": "600px",
					//"bScrollCollapse": true,
					//"bPaginate": false,
					//"bJQueryUI": true,
				} );
			} );
			</script>

	</body>
</html>
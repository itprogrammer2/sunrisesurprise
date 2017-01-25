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
	$bname = "update_product";
	$label = "Update Product";
} else {
$product_name = "";
$description = "";
$bname = "add_product";
$label = "Add Product";
$place = "Product";
$splace = "Description";
$product_amount = "0";
}

if(isset($_POST['update_product']))
	{
	$product_name = htmlentities($_POST['product_name'], ENT_QUOTES, "UTF-8");
	$product_amount = $_POST['product_amount'];
	$category_id = $_POST['category_id'];
	$item_id = $_POST['item_id'];
	$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
	$query = mysqli_query($con, "SELECT * FROM tbl_menu WHERE product_name='$product_name' AND id != '$item_id'");
	$num = mysqli_num_rows($query);
	if($num == "0"){
		$size = $_FILES['myfile']['size'];
		$query = mysqli_query($con, "SELECT * FROM tbl_menu WHERE id='$item_id'");
		$row = mysqli_fetch_array($query);
		$dbimage_file = $row['image_file'];
		$dbproduct_name = $row['product_name'];
		$dbproduct_amount = $row['amount'];
		$dbdescription = $row['description'];
		$dbcategory_id = $row['category_id'];
		$dbactual_image_name = $row['image_file'];
			if($size != 0){
			$session_id='1';
			$path="../uploads/";
			$valid_formats = array("jpg", "JPG", "PNG", "png");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
				{
					$name = $_FILES['myfile']['name'];
					$size = $_FILES['myfile']['size'];
					
					if(strlen($name))
						{
							list($txt, $ext) = explode(".", $name);
							if(in_array($ext,$valid_formats))
							{
									$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
									$tmp = $_FILES['myfile']['tmp_name'];
									if(move_uploaded_file($tmp, $path.$actual_image_name))
										{
											$add = mysqli_query($con, "INSERT INTO tbl_menu_logs VALUES ('','$item_id','$dbactual_image_name','image_file','$myid',CURRENT_TIMESTAMP)");
											$dbactual_image_name = $actual_image_name;
										}
									else
										echo "failed";				
								}
					}
				}
			}
		//proceed here
		if($dbproduct_name != $product_name){
			$add = mysqli_query($con, "INSERT INTO tbl_menu_logs VALUES ('','$item_id','$dbproduct_name','product_name','$myid',CURRENT_TIMESTAMP)");
		}

		if($dbcategory_id != $category_id){
			$add = mysqli_query($con, "INSERT INTO tbl_menu_logs VALUES ('','$item_id','$dbcategory_id','category_id','$myid',CURRENT_TIMESTAMP)");
		}

		if($dbdescription != $description){
			$add = mysqli_query($con, "INSERT INTO tbl_menu_logs VALUES ('','$item_id','$dbdescription','description','$myid',CURRENT_TIMESTAMP)");
		}

		if($dbproduct_amount != $product_amount){
			$add = mysqli_query($con, "INSERT INTO tbl_menu_logs VALUES ('','$item_id','$dbproduct_amount','amount','$myid',CURRENT_TIMESTAMP)");
		}

		$update = mysqli_query($con, "UPDATE tbl_menu SET category_id='$category_id', product_name='$product_name', description='$description', amount='$product_amount', image_file='$dbactual_image_name' WHERE id='$item_id'");

		$try = '
			swal({   title: "",   text: "Update Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("item.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("item.php")}, 1500);';

	} else {
		$try = '
			swal({   title: "",   text: "Product already existed!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("item.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("item.php")}, 1500);';
	}
	
	}
	
if(isset($_POST['add_product']))
	{
	$product_name = htmlentities($_POST['product_name'], ENT_QUOTES, "UTF-8");
	$product_amount = $_POST['product_amount'];
	$category_id = $_POST['category_id'];
	$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
	$query = mysqli_query($con, "SELECT * FROM tbl_menu WHERE product_name='$product_name'");
	$num = mysqli_num_rows($query);
	if($num == "0")
		{
		$session_id='1';
		$path="../uploads/";
		$valid_formats = array("jpg", "JPG", "PNG", "png");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$name = $_FILES['myfile']['name'];
				$size = $_FILES['myfile']['size'];
				
				if(strlen($name))
					{
						list($txt, $ext) = explode(".", $name);
						if(in_array($ext,$valid_formats))
						{
								$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
								$tmp = $_FILES['myfile']['tmp_name'];
								if(move_uploaded_file($tmp, $path.$actual_image_name))
									{
										$add = mysqli_query($con, "INSERT tbl_menu VALUES ('','$category_id','$product_name','$description','$product_amount','$actual_image_name','$myid',CURRENT_TIMESTAMP)");
										$try = '
										swal({   title: "",   text: "Append Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("item.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("item.php")}, 1500);';
									}
								else
									echo "failed";				
							}
				}
			}
		}
	else
		{
		$try = '
		swal({   title: "",   text: "Product already existed!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("item.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("item.php")}, 1500);';
		}
	}
include("include/header.php");
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
									<h1>Product</h1>
								</header>
								<h2><?php echo $label?></h2>
								<form action="item.php" enctype="multipart/form-data" id="formname" name="formname" method="POST">
								<?php
								if(isset($_GET['id'])){
								$item_id = $_GET['id'];
								$query = mysqli_query($con, "SELECT * FROM tbl_menu WHERE id='$item_id'");
								$row = mysqli_fetch_array($query);
								$path = "../uploads/".$row['image_file'];
								$category_id = $row['category_id'];
								$description = $row['description'];
								$splace = $description;
								$product_amount = $row['amount'];
								$product_name = $row['product_name'];
								$place = $product_name;
								?>
								<input type="hidden" name="item_id" value="<?php echo $item_id?>" required>
								<?php
								} else {
									$path = "../img/logo.png";
								}
								?>
									<div class="row uniform collapse-at-2">
									<div class="12u 12u$(xsmall)">
									<center>
									<label class="filebutton" style="width: 25%;">
									<img style="width: 100%;" id="output" src="<?php echo $path;?>"/>
									<span><input <?php if(!isset($_GET['id'])){ echo'required="required"'; }?> type="file" id="myfile" name="myfile" onchange="loadFile(event)" accept=".jpg, .png, .PNG, .JPG"></span>
									</label>
									</center>
										<script>
										  var loadFile = function(event) {
											var output = document.getElementById('output');
											output.src = URL.createObjectURL(event.target.files[0]);
										  };
										</script>
									</div>
									<div class="3u 12u$(xsmall)">
									<label>Category</label>
										<div class="select-wrapper">
											<select name="category_id" reuiqred="required">
											<option>Selct a category</option>
											<?php
											$query = mysqli_query($con, "SELECT * FROM ref_category ORDER BY category_name");
											while($row = mysqli_fetch_assoc($query)){
												$dbcategory_name = $row['category_name'];
												$dbcategory_id = $row['id'];
												?>
												<option value="<?php echo $dbcategory_id; ?>" 
												<?php
												if(isset($_GET['id'])){
													if($dbcategory_id == $category_id){
														echo"selected";
													}
												}
												?>
												><?php echo $dbcategory_name; ?></option>
												<?php
											}
											?>
											</select>
										</div>
									</div>
									<div class="3u 12u$(xsmall)">
									<label>Product Name</label>
										<input type="text" name="product_name" value="<?php echo $product_name?>" placeholder="<?php echo $place?>" required>
									</div>
									<div class="2u 12u$(xsmall)">
									<label>Amount</label>
										<input type="number" name="product_amount" steps="any" value="<?php echo $product_amount?>" min="0" required>
									</div>
									<div class="4u 12u$(xsmall)">
									<label>Description</label>
									<textarea name="description" reuiqred="required" placeholder="<?php echo $splace; ?>"><?php echo $description; ?></textarea>
									</div>
									<div class="12u 12u$(xsmall)">
									<label>&nbsp;</label>
										<ul class="actions">
											<li><input class="special" type="submit" value="<?php echo $label?>" name="<?php echo $bname?>"/></li>
											<?php
											if(isset($_GET['id'])){
											$idid = $_GET['id'];
											?>
											<li><a class="button" href="item.php">Cancel</a></li>
											<?php
											}
											?>
										</ul>
									</div>
									</div>
								</form>
							</section>
							<section id="list" class="main">
							<h2>Item List</h2>
								<div class="row uniform collapse-at-2">
									<div class="12u">
										<table id="table_id" class="display">
										<?php
										$query = mysqli_query($con, "SELECT * FROM tbl_menu");
										?>
										<thead>
											<tr>
												<th></th>
												<th>Category</th>
												<th>Product Name</th>
												<th>Description</th>
												<th>Amount</th>
												<th>Created By</th>
												<th>Date Created</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php
										while($row = mysqli_fetch_assoc($query))
											{
											$product_name = $row['product_name'];
											$id = $row['id'];
											$category_id = $row['category_id'];
											$description = $row['description'];
											$amount = $row['amount'];
											$date_created = $row['date_created'];
											$created_by = $row['created_by'];
											$image_file = "<img src='../uploads/".$row['image_file']."' style='width: 50px; vertical-align: middle;'/>";
											$query1 = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id='$created_by'");
											$row1 = mysqli_fetch_array($query1);
											$created_by = $row1['fname'];
											$query2 = mysqli_query($con, "SELECT * FROM ref_category WHERE id='$category_id'");
											$row2 = mysqli_fetch_array($query2);
											$category_name = $row2['category_name'];
										?>
											<tr style="vertical-align: middle;">
												<td style="color: black;"><?php echo $image_file; ?></td>
												<td style="color: black;"><?php echo $category_name; ?></td>
												<td style="color: black;"><?php echo $product_name; ?></td>
												<td style="color: black;"><?php echo $description; ?></td>
												<td style="color: black;"><?php echo $amount; ?></td>
												<td style="color: black;"><?php echo $created_by; ?></td>
												<td style="color: black;"><?php echo $date_created; ?></td>
												<td style="color: black;">
												<a href='item.php?id=<?php echo $id; ?>'><center><img title='Updater' style='width: 20px; align: center;' src='images/dit.png'></center></a>
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
					"order": [[ 2, "asc" ]]
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
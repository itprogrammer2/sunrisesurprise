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
	$query = mysqli_query($con, "SELECT * FROM cms_image WHERE id='$id'");
	$num = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	$description = $row['description'];
	$label = "Update ".$description." Image";
	$bname = "update_icon";
}

if(isset($_POST['update_icon']))
	{
	$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
	$image_id = $_POST['image_id'];
	$size = $_FILES['myfile']['size'];
	$query = mysqli_query($con, "SELECT * FROM cms_image WHERE id='$image_id'");
	$row = mysqli_fetch_array($query);
	$dbimage_file = $row['image_file'];
	$dbactual_image_name = $row['image_file'];
		if($size != 0){
		$session_id='1';
		$path="../icons/";
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
										$add = mysqli_query($con, "INSERT INTO cms_images_logs VALUES ('','$image_id','$dbactual_image_name','image_file','$myid',CURRENT_TIMESTAMP)");
										$dbactual_image_name = $actual_image_name;
									}
								else
									echo "failed";				
							}
				}
			}
		}

	$update = mysqli_query($con, "UPDATE cms_image SET image_file='$dbactual_image_name' WHERE id='$image_id'");

	$try = '
		swal({   title: "",   text: "Update Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("icon.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("icon.php")}, 1500);';
	
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
								<?php
								if(isset($_GET['id'])){
								$image_id = $_GET['id'];
								$query = mysqli_query($con, "SELECT * FROM cms_image WHERE id='$image_id'");
								$row = mysqli_fetch_array($query);
								$path = "../img/".$row['image_file'];
								?>
							<section class="main">
								<header class="major">
									<h1>Icon</h1>
								</header>
								
								<h2><?php echo $label?></h2>
								<form action="icon.php" enctype="multipart/form-data" id="formname" name="formname" method="POST">
								
								
								<input type="hidden" name="image_id" value="<?php echo $image_id?>" required>
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
									<div class="12u 12u$(xsmall)">
									<label>&nbsp;</label>
									<center>
										<ul class="actions">
											<li><input class="special" type="submit" value="<?php echo $label?>" name="<?php echo $bname?>"/></li>
											<?php
											if(isset($_GET['id'])){
											$idid = $_GET['id'];
											?>
											<li><a class="button" href="images.php">Cancel</a></li>
											<?php
											}
											?>
										</ul>
									</center>
									</div>
									</div>
								</form>
							</section>
							<?php
								}
							?>
							<section id="list" class="main">
							<h2>Icon List</h2>
								<div class="row uniform collapse-at-2">
									<div class="12u">
										<table id="table_id" class="display">
										<?php
										$query = mysqli_query($con, "SELECT * FROM cms_image");
										?>
										<thead>
											<tr>
												<th></th>
												<th>Description</th>
												<th>Created By</th>
												<th>Date Created</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php
										while($row = mysqli_fetch_assoc($query))
											{
											$id = $row['id'];
											$description = $row['description'];
											$date_created = $row['date_created'];
											$created_by = $row['created_by'];
											$image_file = "<img src='../img/".$row['image_file']."' style='width: 50px; vertical-align: middle;'/>";
											$query1 = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id='$created_by'");
											$row1 = mysqli_fetch_array($query1);
											$created_by = $row1['fname'];
										?>
											<tr style="vertical-align: middle;">
												<td style="color: black;"><?php echo $image_file; ?></td>
												<td style="color: black;"><?php echo $description; ?></td>
												<td style="color: black;"><?php echo $created_by; ?></td>
												<td style="color: black;"><?php echo $date_created; ?></td>
												<td style="color: black;">
												<a href='images.php?id=<?php echo $id; ?>'><center><img title='Updater' style='width: 20px; align: center;' src='images/dit.png'></center></a>
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
					"order": [[ 1, "asc" ]]
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
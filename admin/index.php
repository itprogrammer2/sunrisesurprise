<?php include("../include/connect.php");

$query  = mysqli_query($con, "SELECT * FROM cms_image WHERE id='1'");
$row = mysqli_fetch_array($query);
$logo = "../img/".$row['image_file'];

$try = "";
if(isset($_POST['login'])){
$uname = $_POST['uname'];
$query = mysqli_query($con, "SELECT * FROM tbl_admin WHERE uname='$uname'");
$num = mysqli_num_rows($query);
	if($num != "0"){
	$row = mysqli_fetch_array($query);
	$pword = sha1($_POST['pword']);
	$dbpword = $row['pword'];
		if($pword == $dbpword)
			{
			$admin_id = $row['id'];
			$_SESSION['admin_id'] = $admin_id;
			$update = mysqli_query($con, "UPDATE tbl_admin SET last_log = CURRENT_TIMESTAMP WHERE id = '$admin_id'");
			$try = '
			swal({   title: "",   text: "Login Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("index.php")}, 1500);';
			}
		else
			{
			$try = '
				 swal({   title: "",   text: "Wrong password!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("index.php")}, 1500);
				';
			}
	} else {
	$try = '
			swal({   title: "",   text: "User Do not Exist!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("index.php")}, 1500);';
	}
}

if(isset($_POST['add_access']))
	{
	$username = $_POST['uname'];
	$fname = htmlentities($_POST['fname'], ENT_QUOTES, "UTF-8");
	$pword = sha1($_POST['pword']);
	$login = mysqli_query($con, "SELECT * FROM tbl_admin WHERE uname='$username'");
	$num = mysqli_num_rows($login);
	if($num == "0")
		{
		$add = mysqli_query($con, "INSERT INTO tbl_admin VALUES ('','$fname','$username','$pword',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
		$try = '
		swal({   title: "",   text: "Append Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("index.php")}, 1500);';
		}
	else
		{
		$try = '
				 swal({   title: "",   text: "User already existed!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("index.php")}, 1500);';
		}
	}
	
if(isset($_POST['chng_pass']))
	{
	$opass = sha1($_POST['opass']);
	$nword = sha1($_POST['npass']);
	$id = $_POST['emp_id'];
	$query = mysqli_query($con, "SELECT * FROM tbl_admin WHERE aid='$id'");
	$row = mysqli_fetch_array($query);
	$pword = $row['pword'];
	if($pword == $opass)
		{
		$update = mysqli_query($con, "UPDATE tbl_admin SET pword='$nword' WHERE aid='$id'");
		$try = '
			swal({   title: "",   text: "Update Successful!",   type: "success", confirmButtonText: "Ok",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     top.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { top.location.assign("index.php")}, 1500);';
		}
	else
		{
		$try = '
				 swal({   title: "",   text: "Wrong current password!",   type: "warning",  confirmButtonColor: "#DD6B55",   confirmButtonText: "Try Again",  closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     window.location.assign("index.php");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } }),setTimeout(function() { window.location.assign("index.php")}, 1500);
				';
		
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
							<?php
							if(!isset($_SESSION['admin_id'])){
							?>
								<section id="main">
								<center>
									<div class="content">
										<header>
										<img style="width: 100%; max-width: 250px;" src="<?php echo $logo;?>"/>
											<p>Dashboard</p>
										</header>
									</div>
									<span class="image object" style="padding: 40px; border-radius: 25px; border: solid;">
									<form method="post" action="index.php" style="margin: 0px;">
										<div class="row uniform">
											<div class="12u 12u$(xsmall)">
												<input type="text" name="uname" placeholder="Username" required>
											</div>
											<div class="12u$ 12u$(xsmall)">
												<input type="password" name="pword" placeholder="Password" required>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" name="login" value="Login" class="special" /></li>
												</ul>
											</div>
										</div>
									</form>
									</span>
									</center>
								</section>
								<?php } else { ?>
							<section class="main">
								<header class="major">
									<h1>Accessibility</h1>
								</header>
								<h2>Add Admin</h2>
								<form action="index.php" method="POST">
									<div class="row uniform collapse-at-2">
									<div class="3u 12u$(xsmall)">
									<input type="text" name="uname" value="" placeholder="Username" required>
									</div>
									<div class="3u 12u$(xsmall)">
									<input type="text" name="fname" value="" placeholder="Full Name" required>
									</div>
									<div class="3u 12u$(xsmall)">
									<input type="password" name="pword" value="" placeholder="Password" required>
									</div>
									<div class="3u">
									<ul class="actions">
										<li><input class="special" type="submit" value="Add Access" name="add_access"/></li>
									</ul>
									</div>
									</div>
								</form>
							</section>
							<section class="main">
								<h2>Change Password</h2>
								<form action="index.php" method="POST">
								<div class="row uniform collapse-at-2">
								<div class="4u 12u$(xsmall)">
								<input type="hidden" name="emp_id" value="<?php echo $_SESSION['admin_id']; ?>" placeholder="Current Password" required>
								<input type="password" name="opass" value="" placeholder="Current Password" required>
								</div>
								<div class="4u 12u$(xsmall)">
								<input type="password" name="npass" value="" placeholder="New Desired Password" required>
								</div>
								<div class="4u 12u$(xsmall)">
								<ul class="actions">
									<li><input class="special" type="submit" value="Change Password" name="chng_pass"/></li>
								</ul>
								</div>
								</div>
								</form>
							</section>
							<section id="list" class="main">
							<h2>Admin List</h2>
								<div class="row uniform collapse-at-2">
									<div class="12u">
										<table id="table_id" class="display">
										<?php
										$query = mysqli_query($con, "SELECT * FROM tbl_admin");
										$num = mysqli_num_rows($query);
										?>
										<thead>
											<tr>
												<th>Admin Name</th>
												<th>Full Name</th>
												<?php
												if($num != 1)
													{
												?>
												<th>Delete</th>
												<?php
													}
												?>
											</tr>
										</thead>
										<tbody>
										<?php
										while($row = mysqli_fetch_assoc($query))
											{
											$uname = $row['uname'];
											$fname = $row['fname'];
											$admin_id = $row['id'];
										?>
											<tr>
												<td style="color: black;"><?php echo $uname; ?></th>
												<td style="color: black;"><?php echo $fname; ?></th>
												<?php
												if($num != 1)
													{
													
												?>
												<td style="color: black;">
													<?php
													if($_SESSION['admin_id'] != "$admin_id")
														{
														?>
												<a href='function/remove.php?id=<?php echo $admin_id; ?>'><center><img title='Updater' style='width: 20px; align: center;' src='images/del.png'></center></a>
														<?php
														}
														?>
												</td>
												<?php
													}
												?>
											</tr>
										<?php
											}
										?>
										</tbody>
										</table>
									</div>
								</div>
					</section>
								
								<?php } ?>
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
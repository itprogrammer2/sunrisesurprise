<?php include("include/header.php"); ?>
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides" id="slider">
					<?php
					$query = mysqli_query($con, "SELECT * FROM cms_banner ORDER BY rand()");
					while($row = mysqli_fetch_array($query)){
					$id = $row['id'];
					$banner_name = $row['banner_name'];
					$description = $row['description'];
					$banner_image = "uploads/banner/".$row['image_file'];
					?>
						 <li>	 
							<div class="caption">
							<div class="col-md-6 cap-img">
							<img src="<?php echo $banner_image; ?>"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<h3><?php echo $banner_name; ?></h3>  
								<p><?php echo $description; ?></p>
								<a class="button" href="#menu">View More</a>
							</div>
							</div>
							<div class="clearfix"></div>
						 </li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--header-->
			<!--content-->
		<div class="content" id="menu">
			<div class="about-section">
				<div class="container">
				<?php
				$query = mysqli_query($con, "SELECT * FROM cms_about WHERE id='1'");
				$row = mysqli_fetch_array($query);
				$id = $row['id'];
				$title = $row['title'];
				$content = $row['content'];
				?>
					<h2><span <?php echo $editable; ?> onBlur="saveToDatabase(this,'title','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $title; ?></span> <font <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></font></h2>
						<div class="about-grids">
							<div class="col-md-3 about-grid">
								<center>
								<?php
								$query = mysqli_query($con, "SELECT * FROM tbl_menu ORDER BY rand() LIMIT 4");
								$x = 0;
								while($row = mysqli_fetch_assoc($query)){
									$pic[$x] = "uploads/".$row['image_file'];
									$x++;
								}
								?>
								<table width="100%">
									<tr>
									<td style="vertical-align: middle;"><center><img style="width: 100%; max-width: 150px; padding: .5em;" src="<?php echo $pic[0]; ?>"/></center></td>
									<td style="vertical-align: middle;"><center><img style="width: 100%; max-width: 150px; padding: .5em;" src="<?php echo $pic[1]; ?>"/></center></td>
									</tr>
									<tr>
									<td style="vertical-align: middle;"><center><img style="width: 100%; max-width: 150px; padding: .5em;" src="<?php echo $pic[2]; ?>"/></center></td>
									<td style="vertical-align: middle;"><center><img style="width: 100%; max-width: 150px; padding: .5em;" src="<?php echo $pic[3]; ?>"/></center></td>
									</tr>
								</table>
								</center>
							</div>
							<?php
							$query = mysqli_query($con, "SELECT * FROM cms_about WHERE id='4'");
							$row = mysqli_fetch_array($query);
							$id = $row['id'];
							$sub_content = $row['sub_content'];
							$content = $row['content'];
							?>
							<div class="col-md-9 about-grid">
								<h5 <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></h5>
								<div <?php echo $editable; ?> onBlur="saveToDatabase(this,'sub_content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $sub_content; ?></div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 about-grid">
								<center><a class="button" href="menu.html">View All</a></center>
							</div>
							<div class="clearfix"></div>
						</div>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="about-section" style="background: white;">
				<div class="container">
				<?php
				$query = mysqli_query($con, "SELECT * FROM cms_about WHERE id='2'");
				$row = mysqli_fetch_array($query);
				$id = $row['id'];
				$title = $row['title'];
				$content = $row['content'];
				?>
					<h2><span <?php echo $editable; ?> onBlur="saveToDatabase(this,'title','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $title; ?></span> <font <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></font></h2>
						<div class="about-grids">
						<?php
						$query = mysqli_query($con, "SELECT * FROM cms_about WHERE id='5'");
						$row = mysqli_fetch_array($query);
						$id = $row['id'];
						$sub_content = $row['sub_content'];
						$content = $row['content'];
						?>
							<div class="col-md-9 about-grid">
								<h5 <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></h5>
								<div <?php echo $editable; ?> onBlur="saveToDatabase(this,'sub_content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $sub_content; ?></div>
							</div>
							<div class="col-md-3 about-grid1">
								<center><img src="img/background.jpg" class="img-responsive" alt="/"></center>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 about-grid">
								<center><a class="button" href="about.html">Find out</a></center>
							</div>
							<div class="clearfix"></div>
						</div>
				</div>
			</div>
		</div>
<?php include("include/footer.php"); ?>

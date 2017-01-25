<?php include("include/header.php"); ?>
</div>
			<!--content-->
				<div class="content">
				<!--about-->
					<div class="about-section">
						<div class="container">
						<?php
						$query1 = mysqli_query($con, "SELECT * FROM cms_about WHERE id='2'");
						$row1 = mysqli_fetch_array($query1);
						$id = $row1['id'];
						$title = $row1['title'];
						$content = $row1['content'];
						?>
							<h2><span <?php echo $editable; ?> onBlur="saveToDatabase(this,'title','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $title; ?></span> <font <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></font></h2>
								<div class="about-grids">
									<div class="col-md-3 about-grid1">
									<?php
									$query  = mysqli_query($con, "SELECT * FROM cms_image WHERE id='4'");
									$row = mysqli_fetch_array($query);
									$logo1 = "img/".$row['image_file'];
									?>
										<center><img src="<?php echo $logo1; ?>" class="img-responsive" alt="/"></center>
									</div>
									<?php
									$query1 = mysqli_query($con, "SELECT * FROM cms_about WHERE id='5'");
									$row1 = mysqli_fetch_array($query1);
									$id = $row1['id'];
									$sub_content = $row1['sub_content'];
									$content = $row1['content'];
									?>
									<div class="col-md-9 about-grid">
										<h5 <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></h5>
										<div <?php echo $editable; ?> onBlur="saveToDatabase(this,'sub_content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $sub_content; ?></div>
									</div>
									<div class="clearfix"></div>
								</div>
						</div>
					</div>
					<!-- <div class="cooking">
						<div class="container">
							<div class="cooking-grids">
								<div class="about_padding">
								<div class="col-md-4 cook-grid">
									<div class="cook1">
										<h3>Our Mission </h3>
										<p>Fratione uptate mseesciun neque porroisqm estrem equia dolorer ntreterase geryiuyasa miertase.</p>
									</div>
									</div>
								<div class="col-md-4 cook-grid">
									<div class="cook2">
										<h3>Vision</h3>
										<p>Fratione uptate mseesciun neque porroisqm estrem equia dolorer ntreterase geryiuyasa miertase.</p>
									</div>						
								</div>
								<div class="col-md-4 cook-grid">
									<div class="cook3">
										<h3>Objective</h3>
										<p>Fratione uptate mseesciun neque porroisqm estrem equia dolorer ntreterase geryiuyasa miertase.</p>
									</div>	
								</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15405.683365303363!2d120.5664539!3d15.1352155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ee02b78586be2df!2sSunrise+Surprise!5e0!3m2!1sen!2sph!4v1484018897516"></iframe>
				</div>
				<!--copy-->
					<div class="copy-section">
						<div class="container">
							<p>&copy; 2016 Good Food. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
						</div>
					</div>
				<!--copy-->
</body>
</html>

<?php include("include/header.php"); ?>
</div>
<!--header-->
			<!--content-->
				<div class="content">
				<!--about-->
					<div class="about-section">
						<div class="container">
						<?php
						$query1 = mysqli_query($con, "SELECT * FROM cms_about WHERE id='1'");
						$row1 = mysqli_fetch_array($query1);
						$id = $row1['id'];
						$title = $row1['title'];
						$content = $row1['content'];
						?>
							<h2><span <?php echo $editable; ?> onBlur="saveToDatabase(this,'title','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $title; ?></span> <font <?php echo $editable; ?> onBlur="saveToDatabase(this,'content','<?php echo $id; ?>')" onClick="showEdit(this);"><?php echo $content; ?></font></h2>

								<div class="col-md-6 about-in">
								<?php
								$second = 0;
								$first = 0;
								$query = mysqli_query($con, "SELECT * FROM ref_category WHERE id IN (SELECT DISTINCT category_id FROM tbl_menu)");
								$num = mysqli_num_rows($query);
								$second = $num / 2;
								$second = intval($second);
								$first = $num - $second;
								$x = 1;
								while($row = mysqli_fetch_assoc($query)){
									$category = $row['category_name'];
									$category_id = $row['id'];
								?>
								
									<font style="color:#ec2128; font-weight: bold; font-size: 30px; font-family: pharmacy;"><center><?php echo $category; ?></center></font>
									<?php
									$query1 = mysqli_query($con, "SELECT * FROM tbl_menu WHERE category_id='$category_id'");
									while($row1 = mysqli_fetch_assoc($query1)){
										$image_file = $row1['image_file'];
										$product_name = $row1['product_name'];
										$description = $row1['description'];
										$amount = $row1['amount'];
										?>
										<div class="col-md-12" style="padding: 1em 0;">
										<div class="col-md-3">
										<center><img style="width: 80%; max-width: 100px;" src="uploads/<?php echo $image_file; ?>"/></center>
										</div>
										<div class="col-md-9" style="padding: .5em 0;">
										<p style="font-weight: bold;"><?php echo $product_name?>- <i>&#8369; <?php echo $amount; ?></i></p>
										<p><?php echo $description; ?></p>
										</div>
										<div class="clearfix"> </div>
										</div>
										<?php

									}

									if($x == $first){
									?>
										</div>
										<div class="col-md-6 about-in">
										<?php
									}
									$x++;
									if($x == $num){
									?>

									<?php
									}
								}
								?>
								</div>
										<div class="clearfix"></div>
								</div>
						</div>
					</div>
<?php include("include/footer.php");

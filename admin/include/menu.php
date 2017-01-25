<?php
$basename = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF'])));
?>
<nav id="menu">
<section>
	<div class="mini-posts">
		<article>
			<center><a style="border-bottom: none;" href="../"><img style="max-width: 200px;" src="<?php echo $logo?>" alt="" /></a>
			<p>dashboard</p>
			</center>
			
		</article>
	</div>
</section>

	<header class="major">
		<h2>Menu</h2>
	</header>
	<ul>
		<li><a href="index.php" <?php if($basename == "index.php"){ echo "class='active_menu'"; }?>>Accessibility</a></li>
		<li>
			<span class="opener <?php if($basename == "item.php" || $basename == "category.php"){ echo "active_menu"; }?>" >Menu</span>
			<ul>
				<li><a href="category.php" <?php if($basename == "category.php"){ echo "class='active_menu'"; }?>>Category</a></li>
				<li><a href="item.php" <?php if($basename == "item.php"){ echo "class='active_menu'"; }?>>Items</a></li>
			</ul>
		</li>
		<li>
			<span class="opener <?php if($basename == "image.php"){ echo "active_menu"; }?>" >CMS</span>
			<ul>
				<li><a href="images.php" <?php if($basename == "images.php"){ echo "class='active_menu'"; }?>>Images</a></li>
				<li><a href="banner.php" <?php if($basename == "banner.php"){ echo "class='active_menu'"; }?>>Banner</a></li>
			</ul>
		</li>
		<li><a href="function/logout.php">Logout</a></li>
	</ul>
</nav>
<footer id="footer">
	<p class="copyright">&copy; 2016 Raw Ritual All rights reserved | Design by <a href="#">NERDVANA</a>
	
	</p>
</footer>

<?php
include("include/connect.php");
$query  = mysqli_query($con, "SELECT * FROM cms_image WHERE id='1'");
$row = mysqli_fetch_array($query);
$logo = "img/".$row['image_file'];

$query  = mysqli_query($con, "SELECT * FROM cms_image WHERE id='2'");
$row = mysqli_fetch_array($query);
$background = "img/".$row['image_file'];

if(isset($_SESSION['admin_id'])){
	$editable = " contenteditable='true'";
} else {
	$editable = "";
}
$basename = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF'])));
if($basename == "index.php"){
	$test = ""; 
} else {
	$test = "header-top";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sunrise Surprise</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sunrise Suprise is a resturant located on pampanga that has a focus bright light concept perfect for picture"/>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $logo; ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $logo; ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $logo; ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo $logo; ?>">
<link rel="shortcut icon" href="<?php echo $logo; ?>">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="admin/assets/ckeditor/ckeditor.js"></script>
<!--<link href='fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href='fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'> -->
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <!--startsmothscrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
	<script>
<!--endsmothscrolling-->
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>
<style>
.header {
    background: url(<?php echo $background; ?>);
    background-size: cover;
}
.menu{
   list-style:none;    
   overflow:hidden;
   padding:10px;
   position:relative;
   margin-bottom: 10px;
}s
 .menu label{
   text-align:left;
   background: #f2f2f2;
   padding-right:10px;
   z-index:2;
   position:absolute; 
   color: #262526;
   font-weight: bold;
}
 .menu span{
   float:right;
   background:#f2f2f2;
   padding-left:10px;
   z-index:2;
   color: #262526;
}
.dotted-bg{
   border-top:dotted 2px #ccc;
   position:absolute;   
   top:30px;
   left:0;
   width:90%;
   z-index:1;
}

 .menu p{
   margin: 0px;
}

.solid-bg{
margin: 10px 0px 10px 0px;
   border-top:solid .1em #515150;
   
}

.chef-label {
	background-color: #c59d5f;
	padding: 6px;
	color: white;
}

.new-label {
	background-color: #c59d5f;
	padding: 6px;
	color: white;
}
.menu-box {
	border: solid 2px #c59d5f
}
</style>
<script>
function showEdit(editableObj) {
			//$(editableObj).css("background","#FFF");
		} 
		
function saveToDatabase(editableObj,column,id) {
	//$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
	$.ajax({
		url: "function/edit.php",
		type: "POST",
		data: {
			column: column,
			editval: editableObj.innerHTML,
			id: id
		},
		//data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			//console.log(data);
			//$(editableObj).css("background","#FDFDFD");
		}        
   });
}
</script>
</head>
<body>
<!--header-->
	<div class="header <?php echo $test; ?>">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>				  
						<div class="navbar-brand">
							<a href="index.php"><img style="max-width: 155px;" src="<?php echo $logo; ?>"/></a>
						</div>
					</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li <?php if($basename == "index.php"){ echo "class='active'"; }?> ><a href="index.php">Home</a></li>
							<li <?php if($basename == "menu.php"){ echo "class='active'"; }?> ><a href="menu.php">Menu</a></li>
							<li <?php if($basename == "about.php"){ echo "class='active'"; }?> ><a href="about.php">About</a></li>
							<?php
							if(isset($_SESSION['admin_id'])){
								?>
								<li><a href="admin/index.php">Admin</a></li>
								<li><a href="admin/function/logout.php">Logout</a></li>
								<?php
							}
							?>
						</ul>
								  
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
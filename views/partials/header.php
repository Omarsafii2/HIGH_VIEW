
<?php require_once 'core/init.php';
$conn = new conn();
$pdo = $conn->connect();?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="views/public/images/done.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>High view</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="views/public/css/linearicons.css">
	<link rel="stylesheet" href="views/public/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/public/css/themify-icons.css">
	<link rel="stylesheet" href="views/public/css/bootstrap.css">
	<link rel="stylesheet" href="views/public/css/owl.carousel.css">
	<link rel="stylesheet" href="views/public/css/nice-select.css">
	<link rel="stylesheet" href="views/public/css/nouislider.min.css">
	<link rel="stylesheet" href="views/public/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="views/public/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="views/public/css/magnific-popup.css">
	<link rel="stylesheet" href="views/public/css/main.css">
    <link rel="stylesheet" href="views/public/css/404style.css">

	<script src="https://kit.fontawesome.com/8510d63d0e.js" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/"><img src="views/public/images/done.png" alt="" height="80px" width="85px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
							
							<li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
					
							<li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
							</li>
							<li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
							
							
							<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
							<li ><a class="nav-link custom-btn2" href="/login"> Login</a></li>
							<li ><a class="nav-link custom-btn2" href="/signup"> Sign Up</a></li>
							
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="/cart" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
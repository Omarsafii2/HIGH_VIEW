<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="../index.php"><img src="../img/Higt_view.png" alt="" height="80px" width="150px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
							
									<li class="nav-item"><a class="nav-link" href="../pages/category.php">Shop</a></li>
							
									<li class="nav-item"><a class="nav-link" href="../pages/blog.php">Blog</a></li>
								

							<li class="nav-item"><a class="nav-link" href="../pages/about_us.php">About Us</a></li>
							
							
							<li class="nav-item"><a class="nav-link" href="../pages/contact.php">Contact</a></li>
							<li ><a class="nav-link custom-btn2" href="../pages/login.pages"> Login</a></li>
							<li ><a class="nav-link custom-btn2" href="../pages/signup.pages"> Sign Up</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="../pages/cart.php" class="cart"><span class="ti-bag"></span></a></li>
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
</body>
</html>
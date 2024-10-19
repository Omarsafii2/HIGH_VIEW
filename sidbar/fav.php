<?php include ('../conn.php')?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/linearicons.css">
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/themify-icons.css">
	<link rel="stylesheet" href="../css/nice-select.css">
	<link rel="stylesheet" href="../css/nouislider.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/main.css">
	<script src="https://kit.fontawesome.com/8510d63d0e.js" crossorigin="anonymous"></script>
 

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Profile</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <?php
       
       $email = "john.doe@example.com";
       $sql = $conn->prepare("SELECT `first_name`, `last_name`, `img` FROM `users` WHERE `email` = :email");
       
       $sql->bindParam(':email', $email);
       $sql->execute();
       $result = $sql->fetch(PDO::FETCH_ASSOC);
       if(count($result)>0){
        ?>
          
         
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="../img/<?php echo $result['img']?>" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name" style="color:black ; font-size:16px;">
          <?php echo $result['first_name'] ?>
            <strong><?php echo $result['last_name'] ?></strong>
          </span>
          
          <span class="user-role">Customer</span>
         
        </div>
      </div>
      <!-- sidebar-header  -->
     
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
  <ul>
    <li class="header-menu">
      <span>Account Overview</span>
    </li>
    <li class="">
      <a href="index.php">
        <i class="fa fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="">
      <a href="profile.php">
        <i class="fa fa-user"></i>
        <span>Profile Information</span>
      </a>
    </li>
    <li class="">
      <a href="#">
        <i class="fa fa-shield-alt"></i>
        <span>Security & Privacy</span>
      </a>
    </li>

    <li class="header-menu">
      <span>Shopping Information</span>
    </li>
    <li>
      <a href="orders.php">
        <i class="fa fa-shopping-bag"></i>
        <span>Orders</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-heart"></i>
        <span>Favorites</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-star"></i>
        <span>Reviews</span>
      </a>
    </li>

    <li class="header-menu">
      <span>Support & Communication</span>
    </li>
    <li>
      <a href="contact">
        <i class="fa fa-history"></i>
        <span>Contact History</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-question-circle"></i>
        <span>Help/Support</span>
      </a>
    </li>

    <li class="header-menu">
      <span>Settings</span>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-sign-out-alt"></i>
        <span>Log Out</span>
      </a>
    </li>
  </ul>
</div>

      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
 
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Welcome back,<?php echo $result['first_name'] ?>! </h2>
      <?php } ?>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
          <h3>Your adventure <a href="../category.php" style="color:#FFBA01">Gear</a> awaits—let's get you ready for your next journey!</h3>
          <h6><a href="../category.php" style="color:#FFBA01"> Explore our gear </a>and embark on your next journey with confidence!</h6>
        </div>
  
        <div class="form-group col-md-12">
          <div class="alert alert alert-warning" role="alert">
            <h4 class="alert-heading">Explore What's New!</h4>
            <p>Discover our latest collection of outdoor gear designed for adventurers like you! From cutting-edge equipment to stylish apparel, explore what’s new and gear up for your next adventure.</p>
          
          </div>

        </div>
      </div>
      <h5>Favorite</h5>
      <hr>
      <?php
    $ID = 1;
    $sql2 = $conn->prepare("
        SELECT 
          `product`.`id`,  
          `product`.`name` AS product_name, 
          `product`.`price`, 
          `product`.`category_id`, 
          `product`.`total_rating`, 
          `product`.`subtype_id`,
          `product_images`.`front_view`, 
          `product_images`.`side_view`, 
          `product_images`.`back_view`, 
          `category`.`name` AS category_name,
          `favorite`.`user_id`, 
          `favorite`.`product_id` AS favproduct
        FROM `product`
        INNER JOIN `product_images` 
          ON `product`.`id` = `product_images`.`product_id`
        INNER JOIN `category`
          ON `product`.`category_id` = `category`.`id`
        INNER JOIN `favorite`
          ON `product`.`id` = `favorite`.`product_id`
        WHERE `favorite`.`user_id` = :id
    ");
    
    $sql2->bindParam(':id', $ID);
    $sql2->execute();
  
    
      
      $result=$sql2->fetchALL(PDO::FETCH_ASSOC);
      
      if(count($result)>0){
        for($i=0; $i<count($result);$i++){
      ?>
      <div class="row">
        <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="card rounded-0 p-0 shadow-sm">
          <img src="../img/<?php echo $result[$i]['front_view']; ?>" alt="Product Image">
            <div class="card-body text-center">
              <h6 class="card-title"><?php echo $result[$i]['name']; ?> </h6>
              <p> <?php echo $result[$i]['price'] ?> <small> <small></p>
            </div>
          </div>
        </div> -->
        <div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="../img/<?php echo $result[$i]['front_view']; ?>" alt="">
								<div class="product-details">
									<h6><?php echo $result[$i]['product_name']; ?></h6>
									<div class="price">
										<h6><?php echo $result[$i]['price'] ?></h6>
										<!-- <h6 class="l-through">$210.00</h6> -->
									</div>
									<div class="prd-bottom">

										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>
									</div>
								</div>
							</div>
						</div>
        
      </div>
      <hr>
<?php }}?>
      <footer class="text-center">
        <div class="mb-2">
          <small>
            &copy; All rights reserved to High View team
          </small>
        </div>
      </footer>
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="../js/vendor/bootstrap.min.js"></script>
	<script src="../js/jquery.ajaxchimp.min.js"></script>
	<script src="../js/jquery.nice-select.min.js"></script>
	<script src="../js/jquery.sticky.js"></script>
	<script src="../js/nouislider.min.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="../js/gmaps.min.js"></script>
	<script src="../js/main.js"></script>
    
</body>

</html>
<?php include ('../pages/conn.php')?>
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
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
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
       
       $id = 1;
       $sql = $conn->prepare("SELECT `first_name`, `last_name`, `img` FROM `users` WHERE `id` = :id");
       
       $sql->bindParam(':id', $id);
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
      <a href="fav.php">
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
      <a href="contact.php">
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
      <h5>Reviews History</h5>
      <hr>
     
      <div class="row">
     
<div class="container">
<div class="col-md-12">
 
                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                    <h5 class="mb-0 mb-4">Your Ratings and Reviews</h5>
                   
                 
                </div>
                <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                   
                    <h5 class="mb-1">All Ratings and Reviews</h5>
                    <div class="reviews-members pt-4 pb-4">
                        <?php 
                        
                        
                        
                        
                        
                        
                        ?>
                        <div class="media">
                            <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
                            <div class="media-body">
                                <div class="reviews-members-header">
                                    <span class="star-rating float-right">
                                          <a href="#"><i class="icofont-ui-rating active"></i></a>
                                          <a href="#"><i class="icofont-ui-rating active"></i></a>
                                          <a href="#"><i class="icofont-ui-rating active"></i></a>
                                          <a href="#"><i class="icofont-ui-rating active"></i></a>
                                          <a href="#"><i class="icofont-ui-rating"></i></a>
                                          </span>
                                    <h6 class="mb-1"><a class="text-black" href="#">Singh Osahan</a></h6>
                                    <p class="text-gray">Tue, 20 Mar 2020</p>
                                </div>
                                <div class="reviews-members-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
                                </div>
                                <div class="reviews-members-footer">
                                    <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 856M</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 158K</a>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                    <hr>
                    <a class="text-center w-100 d-block mt-4 font-weight-bold" href="#">See All Reviews</a>
                </div>
               
            </div>
        </div>
    </div>
</div>
</div>
      
      <hr>

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
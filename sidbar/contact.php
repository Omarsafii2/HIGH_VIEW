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
      <a href="reviews.php">
        <i class="fa fa-star"></i>
        <span>Reviews</span>
      </a>
    </li>

    <li class="header-menu">
      <span>Support & Communication</span>
    </li>
    <li>
      <a href="#">
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
      <h5>Recent Messages</h5>
      <hr>
     
      <div class="row">
      <section style="background-color:#FEFEFC">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
    <div class="col-md-12 col-lg-12">
      <div class="card text-body" style="width: 100%;">
          <div class="card-body p-4">
            <h4 class="mb-0">Recent Messages</h4>
            <p class="fw-light mb-4 pb-2">Latest messages by YOU </p>

            <div class="d-flex flex-start">
            <?php
       
       $id = 1;
       $sql = $conn->prepare("SELECT `first_name`, `last_name`, `img` FROM `users` WHERE `id` = :id");
       
       $sql->bindParam(':id', $id);
       $sql->execute();
       $result = $sql->fetch(PDO::FETCH_ASSOC);
       if(count($result)>0){
        ?>
              <img class="rounded-circle shadow-1-strong me-3"
                src="../img/<?php echo $result['img'];?>" alt="avatar" width="60" height="60" />
              <div>
           
          
                <h6 class="fw-bold mb-1"><?php echo $result['first_name']." " . $result['last_name'];?></h6>
                <?php }?>
                
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                  <?php
      $id = 1;
      $sql1 = $conn->prepare("
      SELECT 
        `id`, `user_id`, `message`, `status` ,'reply'
      FROM 
        `contact`
      WHERE 
        `user_id` = :ID
  ");
  $sql1->bindParam(':ID',$id);
      $sql1->execute();
      
      $msg=$sql1->fetchALL(PDO::FETCH_ASSOC);
      
      if(count($msg)>0){
        for($i=0; $i<count($msg);$i++){
      ?>
                    <span class="badge bg-primary"><?php echo $msg[$i]['status'] ?></span>
                  </p>
               
                </div>
                <p class="mb-0">
                  <?php echo $msg[$i]['message'] ?>
                </p>

                <hr class="my-0" />
                <p class="mb-0">
                  <?php
                  if($msg[$i]['status'] =='replied'){
                  echo $msg[$i]['reply'];
                }else{
                  echo "There is no reply";
                }
                  
                  ?>
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

        

          <hr class="my-0" style="height: 1px;" />

          

          <hr class="my-0" />
          <?php }}?>
       
        </div>
      </div>
    </div>
  </div>
  
</section>
      
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
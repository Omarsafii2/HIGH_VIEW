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
            <h4 class="alert-heading"><a href="../category.php" style="color:#000000">Explore What's New! </a></h4>
            <p>Discover our latest collection of outdoor gear designed for adventurers like you! From cutting-edge equipment to stylish apparel, explore what’s new and gear up for your next adventure.</p>
          
          </div>

        </div>
      </div>
      <h5>profile Information</h5>
      <hr>
      <?php
      $id = 1;
      $sql = $conn->prepare("SELECT `id`,`first_name`, `last_name`, `img` ,`email` , `phone` ,`city`, `district`, `street`, `building_num` FROM `users` WHERE `id` = :id");
      
      $sql->bindParam(':id', $id);
      $sql->execute();
      $result = $sql->fetch(PDO::FETCH_ASSOC);
      if(count($result)>0){
       

  
  
      ?>
      <div class="row">
        <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['first_name']." " . $result['last_name'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['email'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['phone'];?></p>
              </div>
            </div>
        
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['city']." , ".$result['district'] ." , ". $result['street']." , ". $result['building_num']?></p>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-warning btn-custom"  onclick="appear()">Edit your profile </button>
          
      </div>

      <div style="display:none;" id="edit" class="custom-card">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <form method="post">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Enter first name" value="<?php echo htmlspecialchars($result['first_name']); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Enter last name" value="<?php echo htmlspecialchars($result['last_name']); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12">
                        <div class="form-group">
    <label for="email" >Email</label>
    <i class="help-icon fas fa-question-circle" style="color:#FFBA01" ></i>
    <input type="email" class="form-control" name="email" placeholder="Enter email ID" value="<?php echo htmlspecialchars($result['email']); ?>" disabled onclick="toggleTooltip();">
    <label class="tooltip" id="emailTooltip" aria-hidden="true">This is an explanation about the email input.</label>
</div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" value="<?php echo htmlspecialchars($result['phone']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City" value="<?php echo htmlspecialchars($result['city']); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="district">District</label>
                                <input type="text" class="form-control" name="district" placeholder="Enter district" value="<?php echo htmlspecialchars($result['district']); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" name="street" placeholder="Enter Street" value="<?php echo htmlspecialchars($result['street']); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="buildingNumber">Building Number</label>
                                <input type="text" class="form-control" name="b_number" placeholder="Building number" value="<?php echo htmlspecialchars($result['building_num']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12">
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" onclick="hide()">Cancel</button>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    <?php }?>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
 
  </script>

    
</body>

</html>


<?php 

if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $street = $_POST['street'];
    $b_number = $_POST['b_number'];

    if (!empty($fname) && !empty($lname) && !empty($phone) && !empty($city) && !empty($district) && !empty($street) && !empty($b_number)) {
        $sql = $conn->prepare("UPDATE `users` SET `first_name` = :fname, `last_name` = :lname, `phone` = :phone, `city` = :city, `district` = :district, `street` = :street, `building_num` = :building WHERE `id` = 1");
        
        $sql->bindParam(':fname', $fname);
        $sql->bindParam(':lname', $lname);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':city', $city);
        $sql->bindParam(':district', $district);
        $sql->bindParam(':street', $street);
        $sql->bindParam(':building', $b_number);
        
        if ($sql->execute()) {
           
            echo "<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Edited successfully'
                });
            </script>";
        } else {
         
            echo "<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'error',
                    title: 'Error updating user'
                });
            </script>";
        }
    } else {
        
        echo "<script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'error',
                title: 'some fields are empty'
            });
        </script>";
    }
}

?>

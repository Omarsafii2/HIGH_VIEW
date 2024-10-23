<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>
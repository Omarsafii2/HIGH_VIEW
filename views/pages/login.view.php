<?php
// Start session
session_start();
require_once 'controller/utils.php';

// Redirect to profile if logged in
if (Utils::isLoggedIn()) {
  Utils::redirect('profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="views/public/css/login-style.css" />
    <link rel="stylesheet" href="views/public/css/login-alert.css" />
    <title>Registration</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css"
      integrity="sha512-Cb0WDP6lVyVaQJulFMEOBGpkgqU6UAOEBpthbb9BfdhmUXnmYQwobuCm6Xp2YYL6Pd/l0ZA5Up/ijp0fu+nFpQ=="
      crossorigin="anonymous"
    />
    <scri src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <a href="/" class="home-button">Home</a>

    <div class="container" id="container">
      <!-- Welcome Back Section -->
      <div class="card-left card">
        <div class="content" id="SignIn">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info.</p>
          <button id="btn-signin">Sign in</button>
        </div>
      </div>

      <!-- Hello Friends Section -->
      <div class="card-left">
        <div class="content" id="SignUp">
          <h1>Hello Friends!</h1>
          <p>Enter Your Personal Details and start your journey with us</p>
          <button id="btn-signup">Sign up</button>
        </div>
      </div>
      <!-- Form Container for Sign Up -->
      <div class="form-container form-c">
        <div class="form" id="Create">
          <form id="form-email">
            <h1>Create Account</h1>
            <!-- Social Icons -->
            <div class="social-icons">
              <a href="#" class="icons"> <i class="fab fa-facebook-f"></i></a>
              <a href="#" class="icons"> <i class="fab fa-google"></i></a>
            </div>

            <div class="hr">
              <hr />
              <span>or</span>
              <hr />
            </div>

            <div class="image-preview-container">
              <img
                id="image-preview"
                src=""
                alt="Your Image"
                style="display: none"
              />
            </div>

            <div>
              <input
                id="first_name"
                type="text"
                placeholder="First Name"
                required
              />
              <input
                id="last_name"
                type="text"
                placeholder="Last Name"
                required
              />
              <div>
                <input id="email" type="email" placeholder="Email" required />
                <input
                  id="phone"
                  type="number"
                  placeholder="Phone Number"
                  required
                />
              </div>
              <div class="password-container">
                <div class="password-field">
                  <input
                    id="password"
                    type="password"
                    placeholder="Password"
                    required
                  />
                  <i
                    class="fas fa-eye"
                    id="togglePassword"
                    style="cursor: pointer"
                  ></i>
                </div>
                <div class="password-field">
                  <input
                    id="confirm_password"
                    type="password"
                    placeholder="Confirm Password"
                    required
                  />
                  <i
                    class="fas fa-eye"
                    id="toggleConfirmPassword"
                    style="cursor: pointer"
                  ></i>
                </div>
              </div>
            </div>

            <div>
              <button id="btn-signup-submit" type="submit" class="btn">
                Sign Up
                <i class="fas fa-sign-in-alt" style="font-size: 17px"></i>
              </button>
            </div>

            <!-- Alert Section -->
            <div id="alert" class="alert hide">
              <span class="fas fa-exclamation-circle"></span>
              <span class="msg">Warning: This is a warning alert!</span>
              <div class="close-btn">
                <span class="fas fa-times"></span>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Form Container for Sign In -->
      <div class="form-container">
        <div class="form" id="Login">
          <h1>Sign in</h1>

          <!-- Social Icons -->
          <div class="social-icons">
            <a href="#" class="icons"> <i class="fab fa-facebook-f"></i></a>
            <a href="#" class="icons"> <i class="fab fa-google"></i></a>
          </div>

          <div class="hr">
            <hr />
            <span>or</span>
            <hr />
          </div>

          <!-- Login Form -->
          <form id="form-email-in">
            <input type="email" placeholder="Email" required />
            <input type="password" placeholder="Password" required />
            <a href="#">Forgot Password?</a>
            <button form="form-email-in" type="submit" class="btn">
              Sign In
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../views/public/js/login.js"></script>
    <script src="../views/public/js/login-alert.js"></script>

  </body>
</html>

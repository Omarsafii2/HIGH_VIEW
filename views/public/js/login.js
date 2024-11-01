// Select the login form
const loginForm = document.querySelector("form");

loginForm.addEventListener("submit", async function (e) {
  e.preventDefault(); // Prevent the default form submission

  // Gather form data
  const formData = new FormData(loginForm);
  const email = formData.get("user_email");
  const password = formData.get("user_password");

  // Validate form data
  if (!email || !password) {
    Swal.fire(
      "Missing Information",
      "Please enter both email and password.",
      "warning"
    );
    return;
  }

  try {
    // Send the form data using fetch
    const response = await fetch("/login", {
      method: "POST",
      body: formData,
    });

    // Parse response
    const data = await response.json();

    if (data.success) {
      // Success popup and redirect
      Swal.fire({
        title: "Login Successful!",
        text: "Redirecting to your profile...",
        icon: "success",
        timer: 2000,
        showConfirmButton: false,
      });

      // Redirect after showing the SweetAlert
      setTimeout(() => {
        window.location.href = data.redirect || "/profile";
      }, 2500);
    } else {
      // Error popup for invalid credentials
      // Display the specific error message received from the server
      Swal.fire(
        "Login Failed",
        data.message || "Invalid email or password.",
        "error"
      );
    }
  } catch (error) {
    // Show error popup for unexpected errors
    console.error("Login Error:", error);
    Swal.fire(
      "Error",
      "An unexpected error occurred. Please try again later.",
      "error"
    );
  }
});

function onGoogleSignIn(googleUser) {
  const profile = googleUser.getBasicProfile();
  const email = profile.getEmail();
  console.log("Email: " + email);
}

function googleLogin() {
  gapi.load("auth2", function () {
    gapi.auth2
      .init({
        client_id: "YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com",
      })
      .then(function (auth2) {
        auth2.signIn().then(onGoogleSignIn);
      });
  });
}

 function togglePassword() {
      const passwordField = document.getElementById('user_password');
      const toggleIcon = document.getElementById('togglePassword');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }
document.addEventListener("DOMContentLoaded", function () {
  const signUpButton = document.getElementById("btn-signup-submit");
  const alertBox = document.getElementById("alert");
  const firstName = document.getElementById("first_name");
  const lastName = document.getElementById("last_name");
  const email = document.getElementById("email");
  const phone = document.getElementById("phone");
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm_password");
  const alertMsg = document.querySelector(".alert .msg");

  // Email validation regex (only Gmail, Outlook, Hotmail, Yahoo)
  const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail\.com|outlook\.com|hotmail\.com|yahoo\.com)$/;

  // Password validation regex (at least 1 uppercase, 1 lowercase, 1 number, 1 special character)
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  // Phone number validation regex (only digits allowed)
  const phonePattern = /^[0-9]+$/;

  // Add event listener to the sign-up button
  signUpButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent form submission
    validateForm(); // Call the validation function
  });

  function validateForm() {
    // Check if all fields are filled and valid
    if (!firstName.value) {
      showAlert("Please enter your first name");
    } else if (!lastName.value) {
      showAlert("Please enter your last name");
    } else if (!email.value || !emailPattern.test(email.value)) {
      showAlert("Please enter a valid email (Gmail, Outlook, Hotmail, Yahoo)");
    } else if (!phone.value || !phonePattern.test(phone.value)) {
      showAlert("Please enter a valid phone number (only digits)");
    } else if (!password.value || !passwordPattern.test(password.value)) {
      showAlert("Password must contain at least 8 characters, including uppercase, lowercase, numbers, and symbols");
    } else if (password.value !== confirmPassword.value) {
      showAlert("Passwords do not match");
    } else {
      // If all fields are valid, show success popup
      // showSuccessPopup();

      // Reset form fields
      resetForm();
    }
  }

  function showAlert(message) {
    alertMsg.textContent = message; // Update the alert message
    alertBox.classList.add("showAlert", "show");
    alertBox.classList.remove("hide");

    // Hide the alert after 4 seconds
    setTimeout(function () {
      alertBox.classList.add("hide");
      alertBox.classList.remove("showAlert", "show");
    }, 4000);
  }

  // function showSuccessPopup() {
  //   Swal.fire({
  //     position: "center",
  //     icon: "success",
  //     title: "Registration successful!",
  //     showConfirmButton: false,
  //     timer: 1500,
  //     customClass: {
  //       popup: "custom-popup",
  //     },
  //   });

  //   setTimeout(function () {
  //     document.getElementById("btn-signin").click(); // Simulate a click to sign in after success
  //   }, 1500); // Adjust timing if necessary
  // }

  function resetForm() {
    firstName.value = "";
    lastName.value = "";
    email.value = "";
    phone.value = "";
    password.value = "";
    confirmPassword.value = "";
  }

  // Close button for alert
  const closeBtn = document.querySelector(".alert .close-btn");
  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      alertBox.classList.add("hide");
      alertBox.classList.remove("showAlert", "show");
    });
  }

  // PASSWORDS: Toggle password visibility
  const togglePassword = document.getElementById("togglePassword");
  if (togglePassword) {
    togglePassword.addEventListener("click", function () {
      // Toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      this.classList.toggle("fa-eye-slash");
    });
  }

  // Optionally add similar functionality for confirm password
  const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
  if (toggleConfirmPassword) {
    toggleConfirmPassword.addEventListener("click", function () {
      const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
      confirmPassword.setAttribute("type", type);
      this.classList.toggle("fa-eye-slash");
    });
  }
});

// Form Elements and Password Requirements
const form = document.getElementById("registerForm");
const inputs = form.querySelectorAll("input[required]");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm_password");
const strengthMeterFill = document.getElementById("strength-meter-fill");
const strengthText = document.getElementById("strength-text");
const passwordMatch = document.getElementById("password-match");
const submitButton = form.querySelector("button[type='submit']");

// Password requirements elements
const requirements = {
  length: document.getElementById("length"),
  uppercase: document.getElementById("uppercase"),
  lowercase: document.getElementById("lowercase"),
  number: document.getElementById("number"),
  special: document.getElementById("special"),
};

// Add Input Validation Listener to All Fields
inputs.forEach((input) => {
  input.addEventListener("input", function () {
    validateField(this);
  });
});

// Individual Field Validation Function
function validateField(field) {
  const validationMessage = field.parentElement.querySelector(
      ".validation-message"
  );
  let isValid = true;

  switch (field.id) {
    case "first_name":
    case "last_name":
      isValid = /^[A-Za-z ]{2,50}$/.test(field.value);
      break;
    case "email":
      isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value);
      break;
    case "phone":
      isValid = /^[0-9]{8,15}$/.test(field.value);
      break;
    default:
      isValid = field.value.length > 0;
  }

  field.classList.toggle("is-valid", isValid);
  field.classList.toggle("is-invalid", !isValid);
  if (validationMessage) {
    validationMessage.classList.toggle("show", !isValid && field.value !== "");
  }

  return isValid;
}

// Password Strength Meter and Requirements Update
passwordInput.addEventListener("input", function () {
  const password = this.value;
  const strength = calculatePasswordStrength(password);
  updateRequirements(password);

  strengthMeterFill.style.width = strength.percentage + "%";
  strengthMeterFill.className = "strength-meter-fill " + strength.className;
  strengthText.textContent = strength.text;
  strengthText.className = "strength-text " + strength.textClass;

  checkPasswordMatch();
});

// Confirm Password Match Check
confirmPasswordInput.addEventListener("input", checkPasswordMatch);

function updateRequirements(password) {
  const checks = {
    length: password.length >= 8,
    uppercase: /[A-Z]/.test(password),
    lowercase: /[a-z]/.test(password),
    number: /[0-9]/.test(password),
    special: /[!@#$%^&*(),.?":{}|<>]/.test(password),
  };

  for (const [requirement, valid] of Object.entries(checks)) {
    const element = requirements[requirement];
    element.classList.toggle("valid", valid);
  }
}

// Password Strength Calculation
function calculatePasswordStrength(password) {
  let strengthScore = 0;
  const hasUpperCase = /[A-Z]/.test(password);
  const hasLowerCase = /[a-z]/.test(password);
  const hasNumbers = /[0-9]/.test(password);
  const hasSpecialChars = /[!@#$%^&*(),.?":{}|<>]/.test(password);
  const lengthCriteria = password.length >= 8;

  if (hasUpperCase) strengthScore += 1;
  if (hasLowerCase) strengthScore += 1;
  if (hasNumbers) strengthScore += 1;
  if (hasSpecialChars) strengthScore += 1;
  if (lengthCriteria) strengthScore += 1;

  let strength = {
    percentage: 0,
    className: "weak",
    text: "Weak",
    textClass: "weak-text",
  };

  if (strengthScore === 5) {
    strength = {
      percentage: 100,
      className: "strong",
      text: "Strong",
      textClass: "strong-text",
    };
  } else if (strengthScore >= 3) {
    strength = {
      percentage: 60,
      className: "medium",
      text: "Medium",
      textClass: "medium-text",
    };
  } else if (strengthScore > 0) {
    strength = {
      percentage: 30,
      className: "weak",
      text: "Weak",
      textClass: "weak-text",
    };
  }
  return strength;
}

// Password Match Validation Display
function checkPasswordMatch() {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  if (confirmPassword === "") {
    passwordMatch.textContent = "";
    passwordMatch.style.color = "";
  } else if (password === confirmPassword) {
    passwordMatch.textContent = "Passwords match!";
    passwordMatch.style.color = "#4caf50";
  } else {
    passwordMatch.textContent = "Passwords do not match";
    passwordMatch.style.color = "#ff4d4d";
  }
}

// Toggle Password Visibility
function togglePassword(fieldId, icon) {
  const passwordField = document.getElementById(fieldId);
  if (passwordField.type === "password") {
    passwordField.type = "text";
    icon.classList.replace("fa-eye", "fa-eye-slash");
  } else {
    passwordField.type = "password";
    icon.classList.replace("fa-eye-slash", "fa-eye");
  }
}

// Submit Form with Validation Checks
form.addEventListener("submit", async function (e) {
  e.preventDefault();

  let isValid = true;

  // Check if first name and last name are filled
  const firstName = document.getElementById("first_name").value.trim();
  const lastName = document.getElementById("last_name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();

  if (!firstName || !lastName || !email || !phone) {
    swal({
      title: "Missing Information",
      text: "Please fill in all fields.",
      icon: "warning",
      button: "OK",
    });
    isValid = false;
  }

  // Validate all other fields
  inputs.forEach((input) => {
    if (!validateField(input)) {
      isValid = false;
    }
  });

  // Further validation checks
  if (!isValid) {
    return;
  }

  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  if (password !== confirmPassword) {
    swal("Error", "Passwords do not match!", "error");
    return;
  }

  const strength = calculatePasswordStrength(password);
  if (strength.text !== "Strong") {
    swal("Weak Password", "Your password needs to be stronger.", "warning");
    return;
  }

  const formData = new FormData(this);
  submitButton.disabled = true;

  // Call the registerUser function with formData
  await registerUser(formData);

  // Reset the submit button after the request is complete
  submitButton.disabled = false;
});

// Register User Function
async function registerUser(formData) {
  try {
    const response = await fetch("/register", {
      method: "POST",
      body: formData,
    });

    // Check if the response is ok (status code 200-299)
    if (!response.ok) {
      const errorText = await response.text(); // Get response as text
      console.error('Server error:', errorText); // Log the error text
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const textResponse = await response.text(); // Get the response as text
    console.log('Raw response:', textResponse); // Log the response to see what you are getting

    // Parse the JSON response
    const data = JSON.parse(textResponse);

    // Handle the data accordingly
    if (data.success) {
      // Redirect or show success message
      window.location.href = data.redirect; // Redirect to the login page
    } else {
      // Show error message
      alert(data.message);
    }
  } catch (error) {
    console.error('Error during registration:', error.message);
    alert('An error occurred during registration. Please try again.'); // Show a user-friendly error message
  }
}

// Login Form Elements
// Login Form Elements
const loginForm = document.querySelector("form");
const passwordField = document.querySelector("input[name='user_password']");
const emailField = document.querySelector("input[name='user_email']");

// Password Toggle for Login Form with Show on Input
function setupPasswordToggle() {
  const passwordFields = document.querySelectorAll('input[type="password"]');

  passwordFields.forEach((field) => {
    // Create toggle button but hide it initially
    const toggleButton = document.createElement("span");
    toggleButton.className = "toggle-password";
    toggleButton.innerHTML = '<i class="fa fa-eye"></i>'; // Eye icon
    toggleButton.style.cursor = "pointer";
    toggleButton.style.marginLeft = "5px";
    field.parentNode.insertBefore(toggleButton, field.nextSibling);

    // Toggle password visibility on click
    toggleButton.addEventListener("click", function () {
      const isPasswordVisible = field.type === "text";
      field.type = isPasswordVisible ? "password" : "text";
      toggleButton.innerHTML = isPasswordVisible
          ? '<i class="fa fa-eye"></i>' // Show eye icon
          : '<i class="fa fa-eye-slash"></i>'; // Hide eye icon
    });
  });
}

// Call the setupPasswordToggle function
setupPasswordToggle();

// Login Form Submit
loginForm.addEventListener("submit", async function (e) {
  e.preventDefault(); // Prevent form submission

  const email = emailField.value.trim();
  const password = passwordField.value.trim();

  // Check if email and password fields are filled
  if (!email || !password) {
    alert("Please fill in both email and password fields.");
    return;
  }

  // Prepare data for submission
  const loginData = new FormData();
  loginData.append("user_email", email);
  loginData.append("user_password", password);

  try {
    const response = await fetch("/login", {
      method: "POST",
      body: loginData,
    });

    if (!response.ok) {
      const errorText = await response.text(); // Get response as text
      console.error('Server error:', errorText); // Log the error text
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const textResponse = await response.text(); // Get the response as text
    console.log('Raw response:', textResponse); // Log the response to see what you are getting

    const data = JSON.parse(textResponse); // Parse the JSON response

    if (data.success) {
      window.location.href = data.redirect; // Redirect on success
    } else {
      alert(data.message); // Show error message
    }
  } catch (error) {
    console.error('Error during login:', error.message);
    alert('An error occurred during login. Please try again.'); // Show a user-friendly error message
  }
});

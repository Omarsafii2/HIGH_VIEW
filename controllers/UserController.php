<?php

require_once 'model/User.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // Show different views
    public function showLogin()
    {
        require 'views/pages/login.php';
    }

    public function showRegister()
    {
        require 'views/pages/register.php';
    }

    public function showProfile()
    {
        require 'views/pages/profile.php';
    }

    public function showForgot()
    {
        require 'views/pages/forgot.php';
    }

    public function showReset()
    {
        require 'views/pages/reset.php';
    }

    public function registerUser($data) {
        // Ensure required fields are present
        $email = $data['user_email'] ?? '';
        $password = $data['user_password'] ?? '';

        // Example validation (you may want to add more)
        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Email and password are required.']);
            exit;
        }

        // Simulate registration logic (e.g., save to the database)
        $registrationSuccessful = true; // Change this based on your logic

        // Return JSON response
        if ($registrationSuccessful) {
            echo json_encode(['success' => true, 'redirect' => '/login']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Registration failed.']);
        }
        exit; // Ensure no further output is sent
    }
    public function loginUser()
    {
        if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];

            // Verify if the user exists
            $user = $this->user->getUserByEmail($email);

            if ($user) {
                // Check if the password is correct
                if (password_verify($password, $user['password'])) { // Assume passwords are hashed
                    session_start();
                    $_SESSION['user'] = $user;

                    // Respond with success
                    echo json_encode([
                        'success' => true,
                        'redirect' => '/profile', // Redirect URL
                    ]);
                    exit;
                } else {
                    // Incorrect password
                    echo json_encode([
                        'success' => false,
                        'message' => 'Incorrect password.', // Specific message for incorrect password
                    ]);
                    exit;
                }
            } else {
                // User does not exist
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid email address.', // Specific message for invalid email
                ]);
                exit;
            }
        }

        // Handle the case where POST data is not set
        echo json_encode([
            'success' => false,
            'message' => 'Please provide both email and password.', // Message for missing data
        ]);
        exit;
    }

    // Logout user
    public function logoutUser()
    {
        // Assuming you have a logout function that handles the session destruction
        session_start();
        session_destroy();
        header('Location: /login'); // Redirect after logout
        exit();
    }

    // Send reset email
    public function resetPassword() {
        header('Content-Type: application/json');

        // Decode JSON input
        $input = json_decode(file_get_contents('php://input'), true);
        $email = $input['email'] ?? null;
        $newPassword = $input['newPassword'] ?? null;

        if (!$email || !$newPassword) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Email and new password are required.'
            ]);
            return;
        }

        // Check if email exists in the database
        if (!$this->user->emailExists($email)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Email not found in our system.'
            ]);
            return;
        }

        // Update the password
        $isUpdated = $this->user->updatePassword($email, $newPassword);

        if ($isUpdated) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Password successfully reset.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to reset password. Please try again.'
            ]);
        }
    }
}
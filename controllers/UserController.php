<?php

require_once 'model/User.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // Show different views
    public function showlogin()
    {
        require 'views/pages/login.php';
    }
    public function showregister()
    {
        require 'views/pages/register.php';
    }
    public function showprofile()
    {
        require 'views/pages/profile.php';
    }
    public function showforgot()
    {
        require 'views/pages/forgot.php';
    }
    public function showreset()
    {
        require 'views/pages/reset.php';
    }
    public function showcontact()
    {
        require 'views/pages/contact.php'; 
    }
    
    public function registerUser($data)
    {
        header('Content-Type: application/json');

        if ($this->user->emailExists($data['email'])) {
            echo json_encode(['success' => false, 'message' => 'Email already registered']);
            exit();
        }

        if ($this->user->phoneExists($data['phone'])) {
            echo json_encode(['success' => false, 'message' => 'Phone number already registered']);
            exit();
        }

        if ($this->user->registerUser($data)) {
            echo json_encode(['success' => true, 'redirect' => '/login']);
            exit();
        }

        echo json_encode(['success' => false, 'message' => 'Registration failed']);
        exit();
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
        $this->user->logoutUser();
        return 'User logged out';
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
        $user = new User();
        if (!$user->emailExists($email)) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'Email not found in our system.'
            ]);
            return;
        }
    
        // Update the password
        $isUpdated = $user->updatePassword($email, $newPassword);
    
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

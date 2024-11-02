<?php 

require_once 'Model.php';

class User extends Model {

    public function __construct() {
        parent::__construct('users'); 
    }

    // Retrieve a user by email
    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return user data if exists
    }

    // Create a new user
    public function createUser($firstName, $lastName, $email, $phone) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)");

        // Bind parameters
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

        // Execute the statement
        return $stmt->execute();
    }

    // Check if an email exists
    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Returns true if email exists
    }

    // Check if a phone number exists
    public function phoneExists($phone) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table} WHERE phone = :phone");
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Returns true if phone exists
    }

    // Update password
    public function updatePassword($email, $newPassword) {
        if (strlen($newPassword) < 8) {
            return false; // Password validation: minimum length
        }
    
        $query = "UPDATE {$this->table} SET password = :password WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Ensure password is hashed
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        
        return $stmt->execute();
    }

    // Reset the user's password
    public function resetPassword($email, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET password = :password, reset_token = NULL, token_expiration = NULL WHERE email = :email");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Save a password reset token
    public function savePasswordResetToken($email, $token) {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET reset_token = :token, token_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Check if a token is valid
    public function isTokenValid($token) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table} WHERE reset_token = :token AND token_expiration > NOW()");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Returns true if token is valid
    }

    // Reset password by token
    public function resetPasswordByToken($token, $newPassword) {
        $stmt = $this->pdo->prepare("SELECT email FROM {$this->table} WHERE reset_token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $email = $stmt->fetchColumn();

        if ($email) {
            // Reset the password for the user
            return $this->resetPassword($email, $newPassword);
        }
        return false; // Return false if email not found
    }
}

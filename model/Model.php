<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

class Model
{
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;

        // Load environment variables from .env file
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $server_name = $_ENV['DB_SERVER'];
        $db_name = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host={$server_name};dbname={$db_name}";

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    //saveContact
    public function saveContact($name, $email, $subject, $message)
    {
        $sql = "INSERT INTO contact (user_id, message) VALUES (:user_id, :message)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        return $stmt->execute();
    }
    // Register a new user with a hashed password
    public function registerUser($data)
    {
        unset($data['register']); // Exclude any unexpected keys
        unset($data['confirm_password']); // Exclude confirm_password

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $keys = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ($keys) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data); // Returns true on successful registration
    }

    // Verify login credentials
    public function verifyUser($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                return $user; // Return user data if login is successful
            }
        }
        return false; // Return false if login fails
    }


    // Check if an email is already registered
    public function emailExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Returns true if email exists
    }

    // Logout the user by destroying the session
    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    // Get user data by email
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return user data as an associative array
    }

    // Reset user password with a new hashed password
    public function resetPassword($email, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET password = :password WHERE email = :email");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        return $stmt->execute(); // Return true if password reset is successful
    }

    // Find a record by ID
    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Retrieve all records
    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new record
    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    // Update a record by ID
    public function update($id, $data)
    {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");

        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET $fields WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

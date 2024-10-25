<?php
require_once 'config.php';
class Database {
  private const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
  private $conn;
  
  // method to connect to the database
  public function __construct() {
    try {
      $this->conn = new PDO(self::DSN, DB_USER, DB_PASS);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  // method to register a user with first name, last name, email, phone, and password
  public function register($first_name, $last_name, $email, $phone, $password, $confirm_password) {
    // Check if password and confirm password match
    if ($password !== $confirm_password) {
      return 'Passwords do not match!';
    }

    // Check if email already exists
    if ($this->getUserByEmail($email)) {
      return 'Email already exists!';
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user data into database
    $sql = 'INSERT INTO users (first_name, last_name, email, phone, password) VALUES (:first_name, :last_name, :email, :phone, :password)';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' => $email,
      'phone' => $phone,
      'password' => $hashed_password
    ]);

    return 'User registered successfully!';
  }

  // method to login a user
  public function login($email, $password) {
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      if (password_verify($password, $user['password'])) {
        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  // method to check if email already exists
  public function getUserByEmail($email) {
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  // method to set token
  public function setToken($email, $token) {
    $sql = 'UPDATE users SET token = :token WHERE email = :email';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'token' => $token,
      'email' => $email
    ]);
    return true;
  }

  // method to get user by token
  public function getUserByToken($token) {
    $sql = 'SELECT * FROM users WHERE token = :token';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  // method to update password
  public function updatePassword($email, $password) {
    $sql = 'UPDATE users SET password = :password, token = :token WHERE email = :email';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'password' => $password,
      'token' => null,
      'email' => $email
    ]);
    return true;
  }
}

<?php

class Coupon
{
    private $id;
    private $promocode;
    private $createdBy;
    private $percentage;
    private $expiryDate;
    private $conn;

    // Constructor accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $promocode = null, $createdBy = null, $percentage = null, $expiryDate = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->promocode = $promocode;
        $this->createdBy = $createdBy;
        $this->percentage = $percentage;
        $this->expiryDate = $expiryDate;
    }

    // Create a new coupon
    public function create()
    {
        $query = "INSERT INTO coupon (promocode, created_by, percentage, expiry_date) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->promocode, $this->createdBy, $this->percentage, $this->expiryDate])) {
            return true;
        }
        return false;
    }

    // Read a coupon by ID
    public function read()
    {
        $query = "SELECT * FROM coupon WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing coupon
    public function update()
    {
        $query = "UPDATE coupon SET promocode = ?, created_by = ?, percentage = ?, expiry_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->promocode, $this->createdBy, $this->percentage, $this->expiryDate, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a coupon
    public function delete()
    {
        $query = "DELETE FROM coupon WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Check if a coupon is valid based on expiry date
    public function isValid()
    {
        $currentDate = date('Y-m-d');
        return $this->expiryDate >= $currentDate;
    }

    // Get all coupons
    public static function getAll($dbConnection)
    {
        $query = "SELECT * FROM coupon";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

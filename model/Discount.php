<?php

class Discount
{
    private $id;
    private $productId;
    private $newPrice;
    private $startDate;
    private $endDate;
    private $conn;

    // Constructor to initialize database connection and optionally properties
    public function __construct($dbConnection, $id = null, $productId = null, $newPrice = null, $startDate = null, $endDate = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->productId = $productId;
        $this->newPrice = $newPrice;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    // Create a new discount
    public function create()
    {
        $query = "INSERT INTO discount (id_product, newprice, startdate, enddate) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->productId, $this->newPrice, $this->startDate, $this->endDate])) {
            return true;
        }
        return false;
    }

    // Read a discount by ID
    public function read()
    {
        $query = "SELECT * FROM discount WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing discount
    public function update()
    {
        $query = "UPDATE discount SET id_product = ?, newprice = ?, startdate = ?, enddate = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->productId, $this->newPrice, $this->startDate, $this->endDate, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a discount
    public function delete()
    {
        $query = "DELETE FROM discount WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Check if the discount is active based on the current date
    public function isActive()
    {
        $currentDate = date('Y-m-d');
        return $this->startDate <= $currentDate && $this->endDate >= $currentDate;
    }

    // Get all discounts
    public static function getAll($dbConnection)
    {
        $query = "SELECT * FROM discount";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

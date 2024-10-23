<?php

class ProductColor
{
    private $id;
    private $colorName;
    private $typeId;
    private $conn;

    // Constructor to initialize database connection and optional parameters
    public function __construct($dbConnection, $id = null, $colorName = null, $typeId = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->colorName = $colorName;
        $this->typeId = $typeId;
    }

    // Create a new product color entry
    public function create()
    {
        $query = "INSERT INTO product_color (color_name, type_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->colorName, $this->typeId])) {
            return true;
        }
        return false;
    }

    // Read a product color by ID
    public function read()
    {
        $query = "SELECT * FROM product_color WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing product color
    public function update()
    {
        $query = "UPDATE product_color SET color_name = ?, type_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->colorName, $this->typeId, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a product color entry
    public function delete()
    {
        $query = "DELETE FROM product_color WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Find a product color by name
    public function findByName()
    {
        $query = "SELECT * FROM product_color WHERE color_name = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->colorName]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

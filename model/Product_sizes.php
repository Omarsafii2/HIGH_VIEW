<?php

class ProductSizes
{
    private $id;
    private $productId;
    private $size;
    private $typeId;
    private $conn;

    // Constructor to initialize the database connection and optional parameters
    public function __construct($dbConnection, $id = null, $productId = null, $size = null, $typeId = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->productId = $productId;
        $this->size = $size;
        $this->typeId = $typeId;
    }

    // Create a new product size entry
    public function create()
    {
        $query = "INSERT INTO product_sizes (product_id, size, type_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->productId, $this->size, $this->typeId])) {
            return true;
        }
        return false;
    }

    // Read a product size by ID
    public function read()
    {
        $query = "SELECT * FROM product_sizes WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing product size
    public function update()
    {
        $query = "UPDATE product_sizes SET product_id = ?, size = ?, type_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->productId, $this->size, $this->typeId, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a product size entry
    public function delete()
    {
        $query = "DELETE FROM product_sizes WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Find all sizes for a specific product ID
    public function findByProductId()
    {
        $query = "SELECT * FROM product_sizes WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->productId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

<?php

class ProductImages
{
    private $conn;
    private $id;
    private $productId;
    private $frontView;
    private $sideView;
    private $backView;
    private $createdBy;

    // Constructor to initialize the database connection and optionally the product image data
    public function __construct($dbConnection, $productId = null, $frontView = null, $sideView = null, $backView = null, $createdBy = null)
    {
        $this->conn = $dbConnection;
        $this->productId = $productId;
        $this->frontView = $frontView;
        $this->sideView = $sideView;
        $this->backView = $backView;
        $this->createdBy = $createdBy;
    }

    // Add product images to the database
    public function addImages()
    {
        $query = "INSERT INTO product_images (product_id, front_view, side_view, back_view, created_by) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->productId, $this->frontView, $this->sideView, $this->backView, $this->createdBy])) {
            return true;
        }
        return false;
    }

    // Get product images by product ID
    public function getImages($productId)
    {
        $query = "SELECT * FROM product_images WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$productId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update product images
    public function updateImages()
    {
        $query = "UPDATE product_images SET front_view = ?, side_view = ?, back_view = ? WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->frontView, $this->sideView, $this->backView, $this->productId])) {
            return true;
        }
        return false;
    }

    // Delete product images by product ID
    public function deleteImages($productId)
    {
        $query = "DELETE FROM product_images WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$productId])) {
            return true;
        }
        return false;
    }

    // Get all product images
    public static function getAllImages($dbConnection)
    {
        $query = "SELECT * FROM product_images";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


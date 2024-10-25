<?php

class UserReview
{
    private $id;
    private $idUser;
    private $idProduct;
    private $review;
    private $rate;
    private $status;
    private $updatedBy;
    private $createdAt;
    private $conn;

    // Constructor accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $idUser = null, $idProduct = null, $review = null, $rate = null, $status = 'appear', $updatedBy = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->review = $review;
        $this->rate = $rate;
        $this->status = $status;
        $this->updatedBy = $updatedBy;
        $this->createdAt = null; // This will be set by the database on creation
    }

    // Create a new user review
    public function create()
    {
        $query = "INSERT INTO user_review (id_user, id_product, review, rate, status, updated_by) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->idUser, $this->idProduct, $this->review, $this->rate, $this->status, $this->updatedBy])) {
            return true;
        }
        return false;
    }

    // Read a review by ID
    public function read()
    {
        $query = "SELECT * FROM user_review WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing review
    public function update()
    {
        $query = "UPDATE user_review SET review = ?, rate = ?, status = ?, updated_by = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->review, $this->rate, $this->status, $this->updatedBy, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a review
    public function delete()
    {
        $query = "DELETE FROM user_review WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Get all reviews for a specific product
    public static function getByProductId($dbConnection, $idProduct)
    {
        $query = "SELECT * FROM user_review WHERE id_product = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute([$idProduct]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all reviews by a specific user
    public static function getByUserId($dbConnection, $idUser)
    {
        $query = "SELECT * FROM user_review WHERE id_user = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute([$idUser]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

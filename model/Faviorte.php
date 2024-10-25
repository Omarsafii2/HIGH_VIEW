<?php

class Favorite
{
    private $id;
    private $userId;
    private $productId;
    private $conn;

    // Constructor with an existing database connection
    //The Favorite class does indeed have a constructor, but it's a simplified one that accepts only the $dbConnection parameter. It initializes the $conn property, allowing the class to interact with the database.
    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Create a new favorite entry
    public function create($userId, $productId)
    {
        $query = "INSERT INTO favorite (user_id, product_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$userId, $productId])) {
            return true;
        }
        return false;
    }

    // Read favorite by ID
    public function read($id)
    {
        $query = "SELECT * FROM favorite WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Read all favorites by user_id
    public function readByUserId($userId)
    {
        $query = "SELECT * FROM favorite WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a favorite entry
    public function update($id, $userId, $productId)
    {
        $query = "UPDATE favorite SET user_id = ?, product_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$userId, $productId, $id])) {
            return true;
        }
        return false;
    }

    // Delete a favorite entry
    public function delete($id)
    {
        $query = "DELETE FROM favorite WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$id])) {
            return true;
        }
        return false;
    }
}

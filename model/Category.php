<?php

class Category
{
    private $id;
    private $name;
    private $img;
    private $conn;

    // Constructor accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $name = null, $img = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
    }

    // Create a new category
    public function create()
    {
        $query = "INSERT INTO category (name, img) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->name, $this->img])) {
            return true;
        }
        return false;
    }

    // Read a category by ID
    public function read()
    {
        $query = "SELECT * FROM category WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing category
    public function update()
    {
        $query = "UPDATE category SET name = ?, img = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->name, $this->img, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a category
    public function delete()
    {
        $query = "DELETE FROM category WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Get all categories
    public static function getAll($dbConnection)
    {
        $query = "SELECT * FROM category";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

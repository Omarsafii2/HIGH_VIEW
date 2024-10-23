<?php

class Type
{
    private $id;
    private $typeName;
    private $conn;

    // Constructor to initialize the database connection and optional parameters
    public function __construct($dbConnection, $id = null, $typeName = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->typeName = $typeName;
    }

    // Create a new type entry
    public function create()
    {
        $query = "INSERT INTO type (type_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->typeName])) {
            return true;
        }
        return false;
    }

    // Read a type by ID
    public function read()
    {
        $query = "SELECT * FROM type WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing type
    public function update()
    {
        $query = "UPDATE type SET type_name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->typeName, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a type entry
    public function delete()
    {
        $query = "DELETE FROM type WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Find a type by its name
    public function findByName()
    {
        $query = "SELECT * FROM type WHERE type_name = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->typeName]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

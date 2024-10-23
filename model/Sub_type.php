<?php

class SubType
{
    private $id;
    private $typeId;
    private $name;
    private $conn;

    // Constructor that accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $typeId = null, $name = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->typeId = $typeId;
        $this->name = $name;
    }

    // Create a new subtype
    public function create()
    {
        $query = "INSERT INTO sub_type (type_id, name) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->typeId, $this->name])) {
            return true;
        }
        return false;
    }

    // Read a subtype by ID
    public function read()
    {
        $query = "SELECT * FROM sub_type WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing subtype
    public function update()
    {
        $query = "UPDATE sub_type SET type_id = ?, name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->typeId, $this->name, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a subtype
    public function delete()
    {
        $query = "DELETE FROM sub_type WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Get all subtypes for a given type ID
    public static function getByTypeId($dbConnection, $typeId)
    {
        $query = "SELECT * FROM sub_type WHERE type_id = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute([$typeId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

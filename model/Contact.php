<?php

class Contact
{
    private $id;
    private $userId;
    private $message;
    private $status;
    private $adminId;
    private $reply;
    private $conn;

    // Constructor accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $userId = null, $message = null, $status = 'not_replied', $adminId = null, $reply = 'waiting for a value')
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->userId = $userId;
        $this->message = $message;
        $this->status = $status;
        $this->adminId = $adminId;
        $this->reply = $reply;
    }

    // Create a new contact message
    public function create()
    {
        $query = "INSERT INTO contact (user_id, message, status, admin_id, reply) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->userId, $this->message, $this->status, $this->adminId, $this->reply])) {
            return true;
        }
        return false;
    }

    // Read a contact message by ID
    public function read()
    {
        $query = "SELECT * FROM contact WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing contact message (e.g., when admin replies)
    public function update()
    {
        $query = "UPDATE contact SET message = ?, status = ?, admin_id = ?, reply = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->message, $this->status, $this->adminId, $this->reply, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete a contact message
    public function delete()
    {
        $query = "DELETE FROM contact WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Get all contact messages
    public static function getAll($dbConnection)
    {
        $query = "SELECT * FROM contact";
        $stmt = $dbConnection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

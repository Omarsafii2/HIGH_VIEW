<?php

class Article
{
    private $id;
    private $body;
    private $views;
    private $featuredImg;
    private $createdBy;
    private $title;
    private $conn;

    // Constructor that accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $id = null, $body = null, $views = 0, $featuredImg = null, $createdBy = null, $title = null)
    {
        $this->conn = $dbConnection;
        $this->id = $id;
        $this->body = $body;
        $this->views = $views;
        $this->featuredImg = $featuredImg;
        $this->createdBy = $createdBy;
        $this->title = $title;
    }

    // Create a new article
    public function create()
    {
        $query = "INSERT INTO articles (body, views, featured_img, created_by, title) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->body, $this->views, $this->featuredImg, $this->createdBy, $this->title])) {
            return true;
        }
        return false;
    }

    // Read an article by ID
    public function read()
    {
        $query = "SELECT * FROM articles WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing article
    public function update()
    {
        $query = "UPDATE articles SET body = ?, views = ?, featured_img = ?, created_by = ?, title = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->body, $this->views, $this->featuredImg, $this->createdBy, $this->title, $this->id])) {
            return true;
        }
        return false;
    }

    // Delete an article
    public function delete()
    {
        $query = "DELETE FROM articles WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }

    // Increment the views of an article
    public function incrementViews()
    {
        $query = "UPDATE articles SET views = views + 1 WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }
}

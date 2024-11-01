<?php
require_once ('Model.php');
class Category extends Model
{
    public function  __construct(){
        parent::__construct("category"); ///////////to establish the db connection form the parent
    }
    public function searchCategories($query) {
        $query = $this->pdo->real_escape_string($query);
        $sql = "SELECT `id`, `name` FROM `category` WHERE `name` LIKE '%$query%'";
        $result = $this->pdo->query($sql);

        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row; // Collect categories
            }
        }
        return $categories;
    }
}
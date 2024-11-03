<?php
require_once 'Model.php';
class Faviorte extends Model
{
    public function  __construct(){
        parent::__construct("favorite"); ///////////to establesh the db connection form the parent
    }

    public function getFavoriteWithProductDetails()
    {
        $stmt = $this->pdo->prepare("
            SELECT favorite.*, product.name, product.description, product.price 
            FROM {$this->tableName} 
            JOIN product ON favorite.product_id = product.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Check if a product is already in the wishlist
    public function findByProductId($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}




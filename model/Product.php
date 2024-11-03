<?php
require_once ('Model.php');
class Product extends Model
{
    public function  __construct(){
        parent::__construct("product"); ///////////to establish the db connection form the parent
    }
    public function orderByPrice(){
        $sql = "SELECT * FROM product ORDER BY price ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetchAll();
        return $product;
    }
    public function orderBytimeNew(){
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetchAll();
        return $product;
    }
    public function orderBytimeOld(){
        $sql = "SELECT * FROM product ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetchAll();
        return $product;
    }
    public function orderByCategory($categoryId) {
        $sql = "SELECT * FROM product WHERE category_id = :category_id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByTypeId($typeId)
    {
        $sql='SELECT name,price FROM product WHERE type_id = :typeId';  
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':typeId', $typeId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function getPaginatedProducts($limit, $offset) {
        $sql = "SELECT * FROM product LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function countAllProducts() {
        $sql = "SELECT COUNT(*) AS total FROM product";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }   


    public function getDiscountedProducts() 
    {
        $sql = 'SELECT product.id,product.name, product.price, product_images.front_view AS img, discount.newprice, discount.startdate, discount.enddate
                FROM product 
                INNER JOIN discount ON product.id = discount.id_product
                LEFT JOIN product_images ON product.id = product_images.product_id
                WHERE discount.startdate <= NOW() AND discount.enddate >= NOW() LIMIT 3';   
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getImageByProductId($productId)
    {
       $sql='SELECT front_view FROM product_images WHERE product_id = :product_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
   

   

   
   
    


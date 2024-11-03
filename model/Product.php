<?php
require_once ('Model.php');
class Product extends Model
{
    public function  __construct(){
        parent::__construct("product"); ///////////to establish the db connection form the parent
    }
    
    public function getBestSellers()
    {
        try {
            $sql = "SELECT p.id, c.name AS category_name, pi.front_view
                    FROM product p
                    JOIN category c ON p.category_id = c.id
                    JOIN product_images pi ON p.id = pi.product_id
                    ORDER BY p.total_rating DESC 
                    LIMIT 10";




    
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return []; // Return an empty array on error
        }
    }
    
    public function getBestSellersProduct() {
        $query = "
             SELECT p.id, p.name,  p.price,  
                   COALESCE(d.newprice, p.price) AS newprice, 
                   pi.front_view 
            FROM product p
            LEFT JOIN product_images pi ON p.id = pi.product_id
            LEFT JOIN discount d ON p.id = d.id_product
            ORDER BY p.total_rating DESC  -- Assume sales_count column exists
            LIMIT 10;";  // Adjust the limit as needed
        return $this->pdo->query($query);
    }


    public function getRandomPackage()
    {
        $query = "SELECT p.*, pi.front_view 
                  FROM product p
                  JOIN product_images pi ON p.id = pi.product_id
                  WHERE p.is_package = 'yes' 
                  ORDER BY RAND() LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomCategory()
    {
        $query = "SELECT c.name,c.img,  pi.front_view 
                  FROM category c 
                  JOIN product p ON c.id = p.category_id 
                  JOIN product_images pi ON p.id = pi.product_id 
                  ORDER BY RAND() LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomDiscountProduct()
    {
        $query = "SELECT p.name,p.price, pi.front_view, d.newprice 
                  FROM discount d 
                  JOIN product p ON d.id_product = p.id 
                  JOIN product_images pi ON p.id = pi.product_id 
                  ORDER BY RAND() LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomLatestProduct()
    {
        $query = "SELECT p.name, pi.front_view, d.newprice 
                  FROM product p 
                  LEFT JOIN discount d ON p.id = d.id_product 
                  JOIN product_images pi ON p.id = pi.product_id 
                  ORDER BY p.created_at DESC 
                  LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsForSlider() {
        $query = "
            SELECT p.id, p.description, p.price, pi.front_view AS image,
                   COALESCE(d.newprice, p.price) AS new_price
            FROM product p
            JOIN product_images pi ON p.id = pi.product_id
            LEFT JOIN discount d ON p.id = d.id_product
            ORDER BY p.created_at DESC;
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductDiscountExpiryDates() {
        $query = "
           SELECT p.id, d.enddate AS expiry_date
FROM product p
LEFT JOIN discount d ON p.id = d.id_product
WHERE d.enddate IS NOT NULL
ORDER BY p.created_at DESC;

        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public function getComingProducts() {
        $query = "SELECT p.*, pi.front_view, d.newprice 
                  FROM product p 
                  JOIN product_images pi ON p.id = pi.product_id 
                  JOIN discount d ON p.id = d.id_product 
                  WHERE p.status = 'visible' 
                  ORDER BY p.created_at DESC 
                  LIMIT 4"; // Adjust LIMIT as needed
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestProducts() {
        $query = "SELECT p.*, pi.front_view, d.newprice 
                  FROM product p 
                  JOIN product_images pi ON p.id = pi.product_id 
                  LEFT JOIN discount d ON p.id = d.id_product 
                  WHERE p.status = 'visible' 
                  ORDER BY p.created_at DESC 
                  LIMIT 4"; // Adjust LIMIT as needed
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

}
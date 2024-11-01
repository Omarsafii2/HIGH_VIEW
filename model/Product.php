<?php
require_once ('Model.php');
class Product extends Model
{
    public function  __construct(){
        parent::__construct("product"); ///////////to establish the db connection form the parent
    }

    public function getProducts() {
        $stmt = $this->pdo->query("SELECT 
        `product`.`id`,
        `product`.`name`,
        `product`.`price`,
        `product`.`description`, 
        `product`.`stock`, 
        `product`.`status`,
        `product`.`type_id`, 
        `product`.`image_id`,
        `product`.`created_at`,
        `product_images`.`product_id`,
        `product_images`.`front_view`
    FROM  
        `product`
    INNER JOIN 
        `product_images` ON `product`.`id` = `product_images`.`product_id`
    WHERE 
        `product`.`stock` > 0 AND 
        `product`.`status` = 'visible'
    ORDER BY 
        `product`.`created_at` DESC 
    LIMIT 3");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }





}
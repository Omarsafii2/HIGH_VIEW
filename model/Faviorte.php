<?php
require_once ('Model.php');
class Faviorte extends Model
{
    public function __construct()
    {
        parent::__construct("favorite"); ///////////to establesh the db connection form the parent
    }

    public function favorite($id)
    {
        // Prepare the SQL statement
        $sql = "
   SELECT 
    `product`.`id`,  
    `product`.`name` AS product_name, 
    `product`.`price`, 
    `product`.`category_id`, 
    `product`.`total_rating`, 
    `product`.`type_id`,
    `product_images`.`front_view`, 
    `product_images`.`side_view`, 
    `product_images`.`back_view`, 
    `category`.`name` AS category_name,
    `favorite`.`user_id`, 
    `favorite`.`product_id` AS favproduct
FROM `product`
INNER JOIN `product_images` 
    ON `product`.`image_id` = `product_images`.`id` -- Corrected join condition
INNER JOIN `category`
    ON `product`.`category_id` = `category`.`id`
INNER JOIN `favorite`
    ON `product`.`id` = `favorite`.`product_id`
WHERE `favorite`.`user_id` = :id;

";

// Prepare the statement
        $stmt = $this->pdo->prepare($sql);

// Bind the parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Execute the statement
        $stmt->execute();

// Fetch and return all results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
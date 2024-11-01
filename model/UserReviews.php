<?php
require_once ('Model.php');
class User_reviews extends Model
{
    public function  __construct(){
        parent::__construct("user_review"); ///////////to establish the db connection form the parent
    }

    public function get_reviews($user_id){
        $sql = ("SELECT 
    `user_review`.`id_user`,
    `user_review`.`id_product`,
    `user_review`.`review`,
    `user_review`.`rate`,
    `user_review`.`created_at`,
    `product`.`id` AS product_id,
    `product`.`name` AS product_name,
    `user`.`id` AS user_id
FROM 
    `user_review`
INNER JOIN 
    `product` ON `user_review`.`id_product` = `product`.`id`
INNER JOIN 
    `user` ON `user`.`id` = `user_review`.`id_user`
WHERE 
    `user`.`id` = :user_id;
");
        $stmt = $this->pdo->prepare($sql);

// Bind the parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Execute the statement
        $stmt->execute();

// Fetch and return all results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
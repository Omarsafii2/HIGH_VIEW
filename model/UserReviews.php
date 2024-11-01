<?php
require_once ('Model.php');
class UserReviews extends Model
{
    public function  __construct(){
        parent::__construct("user_review"); ///////////to establish the db connection form the parent
    }

    public function getReviews($user_id) {
        $sql = "SELECT 
    `user_review`.`id_user`,
    `user_review`.`id_product`,
    `user_review`.`review`,
    `user_review`.`rate`,
    `user_review`.`created_at`,
    `product`.`id` AS product_id,
    `product`.`name` AS product_name,
    `product`.`image_id` AS product_img,
    `product_images`.`front_view`, 
    
    `users`.`id` AS user_id
FROM 
    `user_review`
INNER JOIN 
    `product` ON `user_review`.`id_product` = `product`.`id`
INNER JOIN 
    `product_images` ON `product`.`image_id` = `product_images`.`id` 
INNER JOIN 
    `users` ON `users`.`id` = `user_review`.`id_user`
WHERE 
    `users`.`id` = :user_id;
";

        $stmt = $this->pdo->prepare($sql);

        // Bind the parameter with the correct name
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch and return all results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
<?php
require_once ('Model.php');
class Contact extends Model
{
    public function  __construct(){
        parent::__construct("contact"); ///////////to establish the db connection form the parent
    }

    public function getContact($id) {
        $sql = "SELECT 
        `contact`.`user_id`,
        `contact`.`message`,
        `contact`.`status`,
        `contact`.`created_at`,
        `contact`.`reply`,
        `users`.`id`
        FROM `contact` 
        inner join 
            `users` 
        on  `users`.`id`=`contact`.`user_id`
        WHERE `contact`.`user_id` = :id";

        $stmt = $this->pdo->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch and return all results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
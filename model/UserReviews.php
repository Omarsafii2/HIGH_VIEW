<?php
require_once ('Model.php');
class User_reviews extends Model
{
    public function  __construct(){
        parent::__construct("user_review"); ///////////to establish the db connection form the parent
    }





    public function getProductReviews( $product_id){
        $sql = "SELECT review,rate FROM user_review WHERE id_product = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserName($product_id) {
        // SQL statement to join user_review and users to get the user name
        $sql = "
            SELECT users.first_name , users.last_name , users.img
            FROM user_review 
            JOIN users  ON user_review.id_user = users.id
            WHERE user_review.id_product = :product_id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function AVGRate($product_id){
        $sql = "SELECT AVG(rate) FROM user_review WHERE id_product = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['AVG(rate)']??0;
    }
    public function countReview( $product_id){
        $sql ='SELECT COUNT(*) AS review_count 
            FROM user_review 
            WHERE id_product = :product_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['review_count']??0;



    }




    public function addReview($data) {
        $sql = "INSERT INTO user_review (id_product, review, rate) 
                    VALUES (:product_id, :review, :rate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $data['product_id'], PDO::PARAM_INT);
        // $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':review', $data['review'], PDO::PARAM_STR);
        $stmt->bindParam(':rate', $data['rate'], PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Assuming you're using a Review model

    public function getReviewsByProductId($productId)
    {
        $sql=' SELECT user_review.review, user_review.rate, users.img, users.first_name, users.last_name
            FROM user_review
            JOIN users ON user_review.id_user = users.id
            WHERE user_review.id_product = :productId';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}










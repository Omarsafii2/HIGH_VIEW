<?php
require_once ('Model.php');

class Order extends Model
{
    public function __construct(){
        parent::__construct("orders");
    }
    
    public function getOrderById($orderId) {
        $stmt = $this->pdo->prepare("
            SELECT o.*, u.first_name, u.last_name, u.email 
            FROM orders o 
            JOIN users u ON o.user_id = u.id 
            WHERE o.order_id = ?");
        $stmt->execute([$orderId]);
        $order = $stmt->fetch();
        if (!$order) {
            throw new Exception("Order not found.");
        }
        return $order;
    }
    

    public function getOrderItems($orderId) {
        $stmt = $this->pdo->prepare("
            SELECT ci.*, p.name, p.price 
            FROM cart_items ci 
            JOIN product p ON ci.product_id = p.id 
            WHERE ci.order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll();
    }
}

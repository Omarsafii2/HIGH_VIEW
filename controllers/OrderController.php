<?php
require_once 'model/Cart.php';
require_once 'model/Order.php';
require_once 'model/Order_products.php';

class OrderController 
{
    private $model;

    public function __construct() {
        $this->model = new Order();
    }

    public function confirmation($orderId) {
        try {
            $order = $this->model->getOrderById($orderId);
            $items = $this->model->getOrderItems($orderId);
            require 'views/user/confirmation.php';
        } catch (Exception $e) {
            // Redirect or display an error message
            echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}

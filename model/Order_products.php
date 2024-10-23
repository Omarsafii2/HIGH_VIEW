<?php

class OrderProducts
{
    private $orderItemId;
    private $orderId;
    private $productId;
    private $quantity;
    private $priceAtPurchase;
    private $total;
    private $conn;

    // Constructor that accepts a database connection and optionally initializes properties
    public function __construct($dbConnection, $orderItemId = null, $orderId = null, $productId = null, $quantity = null, $priceAtPurchase = null, $total = null)
    {
        $this->conn = $dbConnection;
        $this->orderItemId = $orderItemId;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->priceAtPurchase = $priceAtPurchase;
        $this->total = $total;
    }

    // Create a new order product entry
    public function create()
    {
        $query = "INSERT INTO order_products (order_id, product_id, quantity, price_at_purchase, total) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->orderId, $this->productId, $this->quantity, $this->priceAtPurchase, $this->total])) {
            return true;
        }
        return false;
    }

    // Read a specific order product by order_item_id
    public function read()
    {
        $query = "SELECT * FROM order_products WHERE order_item_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->orderItemId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Read all products in a specific order
    public function readByOrderId()
    {
        $query = "SELECT * FROM order_products WHERE order_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$this->orderId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update an existing order product entry
    public function update()
    {
        $query = "UPDATE order_products SET order_id = ?, product_id = ?, quantity = ?, price_at_purchase = ?, total = ? 
                  WHERE order_item_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->orderId, $this->productId, $this->quantity, $this->priceAtPurchase, $this->total, $this->orderItemId])) {
            return true;
        }
        return false;
    }

    // Delete an order product entry
    public function delete()
    {
        $query = "DELETE FROM order_products WHERE order_item_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->orderItemId])) {
            return true;
        }
        return false;
    }
}

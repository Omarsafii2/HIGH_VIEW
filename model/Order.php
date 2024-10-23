<?php

class Order {
    private $order_id;
    private $user_id;
    private $order_total;
    private $order_status;
    private $payment_status;
    private $shipping_address;
    private $created_at;
    private $updated_at;
    private $product_quantity;

    public function __construct($user_id, $order_total, $order_status, $payment_status, $shipping_address, $created_at, $updated_at, $product_quantity) {
        $this->user_id = $user_id;
        $this->order_total = $order_total;
        $this->order_status = $order_status;
        $this->payment_status = $payment_status;
        $this->shipping_address = $shipping_address;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->product_quantity = $product_quantity;
    }

  

    public function getOrderId() {
        return $this->order_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getOrderTotal() {
        return $this->order_total;
    }

    public function setOrderTotal($order_total) {
        $this->order_total = $order_total;
    }

    public function getOrderStatus() {
        return $this->order_status;
    }

    public function setOrderStatus($order_status) {
        $this->order_status = $order_status;
    }

    public function getPaymentStatus() {
        return $this->payment_status;
    }

    public function setPaymentStatus($payment_status) {
        $this->payment_status = $payment_status;
    }

    public function getShippingAddress() {
        return $this->shipping_address;
    }

    public function setShippingAddress($shipping_address) {
        $this->shipping_address = $shipping_address;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getProductQuantity() {
        return $this->product_quantity;
    }

    public function setProductQuantity($product_quantity) {
        $this->product_quantity = $product_quantity;
    }
}

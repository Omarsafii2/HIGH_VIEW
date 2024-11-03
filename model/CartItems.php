<?php require_once 'Model.php';

class CartItems extends Model{

    public function __construct()
    {
        parent::__construct("cart_items");
    }
    
    public function addProductToCart($product_id, $quantity) {
        // Optional: Check if the product is already in the cart for the current session
        $sql = "INSERT INTO cart_items (product_id, quantity) VALUES (:product_id,:quantity)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);


        return $stmt->execute();
    }

    public function findByProductId($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateQuantity($productId, $quantity)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->tableName} SET quantity = :quantity WHERE product_id = :product_id");
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
<?php  require 'model/CartItems.php'; 
       require 'model/product.php';
     

class CartItemsController {
        
protected $cartModel;

public function __construct(){
    $this->cartModel = new CartItems();
  
}

public function store() {

    // Ensure the form was submitted via POST and required fields are set
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
        $productId = (int) $_POST['product_id'];
        $quantity = (int) $_POST['quantity'];

        // Get the product to check its stock
        $product = new Product();
        $productDetails = $product->find($productId);

        if (!$productDetails) {
            // Product not found
            header("Location: /products?error=Product not found");
            exit();
        }

        $stock = $productDetails['stock'];

        // Validate the quantity
        if ($quantity > 0 && $quantity <= $stock) {
            // Check if the product is already in the cart
            $existingProduct = $this->cartModel->findByProductId($productId);

            if (!$existingProduct) {
                // If not in cart, add it with the specified quantity
                $this->cartModel->addProductToCart($productId, $quantity);
                header("Location: /products?message=Product added to your cart");
                exit();
            } else {
                // If already in cart, update the quantity with the new quantity
                $this->cartModel->updateQuantity($productId, $quantity); // Set the quantity directly to the new one
                header("Location: /products?message=Cart updated successfully");
                exit();
            }
        } else {
            // Handle invalid quantity
            header("Location: /products?error= more than stock available");
            exit();
        }
    } else {
        // Handle invalid request
        header("Location: /products?error=Failed to add product to your cart");
        exit();
    }
}






}







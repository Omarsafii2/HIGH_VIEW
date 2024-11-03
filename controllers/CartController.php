<?php
require_once 'model/Cart.php';
require_once 'model/Coupon.php';

class CartController
{
    public $id = 1; // Assume this represents the user ID; modify as needed

    public function showCart()
    {
        $cart = new Cart();
        $cart_items = $cart->getitems($this->id);
        require 'views/products/cart.view.php';
    }

   

    public function deleteFromCart($id)
    {
        error_log("Delete from cart method reached.");

        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartModel = new Cart();

            // Check if product_id is provided
            if (isset($_POST['product_id'])) {
                $productId = intval($_POST['product_id']); // Sanitize input

                // Attempt to delete the item from the cart
                if ($cartModel->delete($productId)) {
                    // Set a success message
                    $_SESSION['message'] = "Item successfully deleted from the cart.";
                } else {
                    // Log the failure
                    error_log("Failed to delete item from cart for product ID: $productId");
                    $_SESSION['error'] = "Failed to delete item from the cart.";
                }
            } else {
                // Log missing product ID
                error_log("No product ID provided in deleteFromCart method.");
                $_SESSION['error'] = "No product ID provided.";
            }
        } else {
            // Log unexpected request method
            error_log("Unexpected request method: " . $_SERVER['REQUEST_METHOD']);
        }

        // Redirect back to the cart page after handling the request
        header("Location: /cart"); // Adjust the path as necessary
        exit();
    }

    public function applyCoupon()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['coupon_code'])) {
                $couponCode = trim($_POST['coupon_code']); // Sanitize input
                $coupon = new Coupon();

                // Validate the coupon code
                $valid = $coupon->couponValid($couponCode);
                if (!empty($valid)) {

                    // Get the discount percentage from the valid coupon
                    $_SESSION['discount'] = $valid['percentage']; // Assuming 'percentage' is the column name
                    // Redirect or send success message
                    header("Location: /cart"); // Redirect to the cart page after applying the coupon
                    exit();
                } else {
                    // Handle invalid coupon
                    $_SESSION['error'] = "Invalid coupon code.";
                    header("Location: /cart"); // Redirect back to the cart page
                    exit();
                }

            }}}

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            dd($_POST); // Debug line to inspect posted data

            if (isset($_POST['qty']) && is_array($_POST['qty'])) {
                $cart = new Cart();
                $quantities = $_POST['qty'];

                foreach ($quantities as $product_id => $quantity) {
                    if (is_numeric($quantity) && $quantity > 0) {
                        var_dump( "Updating product ID: $product_id with quantity: $quantity\n"); // Debug output
                        $cart->update($product_id, (int)$quantity);
                    }
                }


                // Optionally, set a success message
                $_SESSION['message'] = "Cart updated successfully.";
                header("Location: /cart"); // Adjust the path as necessary
                exit();
            } else {
                $_SESSION['error'] = "No quantities provided.";
                header("Location: /cart");
                exit();
            }
        } else {
            header("Location: /cart");
            exit();
        }
    }



}

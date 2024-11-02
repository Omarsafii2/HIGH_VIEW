<?php require 'model/User_reviews.php';


class ReviewController {
    private $reviewModel;

    public function __construct() {
        $this->reviewModel = new User_reviews();
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['name'], $_POST['email'], $_POST['message'], $_POST['rate'])) {
            $productId = (int) $_POST['product_id'];
            $userId = (int) $_POST['user_id'];
            $name = htmlspecialchars(trim($_POST['name']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $message = htmlspecialchars(trim($_POST['message']));
            $rate = (int) $_POST['rate'];

            // Basic validation for required fields
            if (!$name || !$email || !$message || $rate < 0 || $rate > 5) {
                header("Location: /product/{$productId}?error=Invalid input data");
                exit();
            }

            // Data to insert
            $data = [
                'product_id' => $productId,
                'user_id' => $userId,
                'name' => $name,
                'email' => $email,
                'review' => $message,
                'rate' => $rate
            ];

            // Save the review in the database
            if ($this->reviewModel->addReview($data)) {
                header("Location: /products?message=Review added successfully");
            } else {
                header("Location: /products?error=Failed to add review");
            }
            exit();
        } else {
            header("Location: /products?error=Invalid request");
            exit();
        }
    }
}

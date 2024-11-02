<?php  require 'model/Faviorte.php';


class FavoriteController{

    protected $favoriteModel;

    public function __construct(){
        $this->favoriteModel = new Faviorte();

    }

    public function store()
    {
        $productId = $_POST['product_id'] ?? null;

        if ($productId) {
            // Check if the product is already in the wishlist to avoid duplicates
            $existingProduct = $this->favoriteModel->findByProductId($productId);

            if (!$existingProduct) {
                $this->favoriteModel->create(['product_id' => $productId]);
                header("Location: /products?message=Product added to wishlist");
                exit();
            } else {
                header("Location: /products?error=Product already in wishlist");
                exit();
            }
        } else {
            header("Location: /products?error=Failed to add product to wishlist");
            exit();
        }
    }







}







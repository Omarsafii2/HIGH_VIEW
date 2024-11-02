<?php
require_once ('model/Product.php');

require 'model/Category.php';
require 'model/Type.php';
require 'model/Product_images.php';
require 'model/Product_sizes.php';
require 'model/UserReviews.php' ;
require 'model/Discount.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();

    }






    public function showLatestProducts() {
        $latestProducts = $this->model->getLatestProducts();

        require 'views/pages/index.view.php';
    }

    public function showComingProducts() {
        $comingProducts = $this->model->getComingProducts();
        require 'views/pages/index.view.php';
    }
    public function showSliderProducts() {
        $products = $this->model->getProductsForSlider();
        $expiryDates = $this->model->getProductDiscountExpiryDates();
        require 'views/pages/index.view.php';
    }




    public function index() {

        $bestSellerProducts = $this->model->getBestSellersProduct();
        if (empty($bestSellerProducts)) {
            $bestSellerProducts = [['front_view' => 'default.jpg', 'name' => 'No Best Seller Available']];
        }
        $bestSeller = $this->model->getBestSellers(); // Ensure this returns an array
        if (empty($bestSeller)) {
            // Handle case when no best sellers are found
            $bestSeller = ['front_view' => 'default.jpg', 'name' => 'No Best Seller Available'];}
        $package = $this->model->getRandomPackage();
        $category = $this->model->getRandomCategory();
        $discount = $this->model->getRandomDiscountProduct();
        $latestProduct = $this->model->getRandomLatestProduct();
        $products = $this->model->getProductsForSlider();
        $expiryDates = $this->model->getProductDiscountExpiryDates();
        $latestProducts = $this->model->getLatestProducts();
        $comingProducts = $this->model->getComingProducts();
//        var_dump($bestSeller, $package, $category, $discount, $latestProduct);
//        die(); // Temporarily stop script to inspect output

//        dd($comingProducts);
        // Ensure you are correctly assigning values to view variables
        require 'views/pages/index.view.php';
    }

    public function show()
    {
        $product = new Product();
        $category = new Category();
        $discount = new Discount();
        $discounts = $discount->all();
        $categories = $category->all();
        $type = new Type();
        $types = $type->all();

        // Pagination parameters
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 21; // Define how many items you want per page
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Get paginated products and total count
        $products = $product->getPaginatedProducts($itemsPerPage, $offset);
        $totalProducts = $product->countAllProducts();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        require 'views/products/product.view.php';
    }


    public function filter()
    {
        $product = new Product();
        $category = new Category();
        $categories = $category->all();

        $sort = $_POST['sort'] ?? 'all';
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 21;
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Determine sorting method based on `sort` parameter
        switch ($sort) {
            case 'price':
                $products = $product->orderByPrice();
                break;
            case 'newest':
                $products = $product->orderBytimeNew();
                break;
            case 'oldest':
                $products = $product->orderBytimeOld();
                break;
            default:
                $products = $product->all();
                break;
        }

        // Implement pagination for filtered products
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $itemsPerPage);
        $products = array_slice($products, $offset, $itemsPerPage);

        require 'views/products/product.view.php';
    }



    public function categoryFilter()
    {
        $product = new Product();
        $category = new Category();
        $categories = $category->all();

        $this->category = $_POST['categorySort'];
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 21;
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Filter products by category and apply pagination
        $products = $product->orderByCategory($this->category);
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $itemsPerPage);
        $products = array_slice($products, $offset, $itemsPerPage);

        require 'views/products/product.view.php';
    }


    public function showDetails(){
        $product = new Product();
        $product_image = new Product_images();
        $product_size = new Product_sizes();
        $product_review = new UserReviews();
        $category = new Category();

        $id = $_GET['product_id'];
        $categories = $category->getCategoryName($id);
        $product = $product->find($id);
        $product_images = $product_image->getProductImg($id);
        $product_sizes = $product_size->getProductSize($id);
        $product_reviews = $product_review->getProductReviews($id); // All reviews
        $avg = $product_review->AVGRate($id);
        $count = $product_review->countReview($id);
        $user_reviews_name = $product_review->getUserName($id);

        require 'views/products/productDetails.view.php';
    }







}
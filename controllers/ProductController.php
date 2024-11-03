<?php
require_once ('model/Product.php');

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
    
        // Ensure you are correctly assigning values to view variables
        require 'views/pages/index.view.php'; 
    }
    
    
    
    
    
    
}

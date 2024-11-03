<?php require 'model/Product.php';
      require 'model/Category.php';
      require 'model/Type.php';
      require 'model/Product_images.php';
      require 'model/Product_sizes.php';   
      require 'model/User_reviews.php' ;
      require 'model/Discount.php';

 class ProductController 
{      
    
public $category;
public function show() 
{
    $product = new Product();
    $category = new Category();
   
    $discount = new Discount();
    $discounts = $discount->all();
    $categories = $category->all();
    $type = new Type();
    $types = $type->all();
    $discount = $product->getDiscountedProducts();

    // Pagination parameters
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 9;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Get paginated products and total count
    $products = $product->getPaginatedProducts($itemsPerPage, $offset);
    $totalProducts = $product->countAllProducts();
    $totalPages = ceil($totalProducts / $itemsPerPage);

    // Retrieve images for each product
    foreach ($products as &$prod) {
        $prod['front_view'] = $product->getImageByProductId($prod['id'])['front_view'] ?? 'default.jpg';
    }

    require 'views/products/product.view.php';
}

    
public function filter()
{
    $product = new Product();
    $category = new Category();
    $categories = $category->all();
    $type = new Type();
    $types = $type->all();


    $discount = new Discount();
    $discounts = $discount->all();
    $discount = $product->getDiscountedProducts();



    $sort = $_POST['sort'] ?? 'all';
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 9;
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

    foreach ($products as &$prod) {
        $prod['front_view'] = $product->getImageByProductId($prod['id'])['front_view'] ?? 'default.jpg';
    }


    require 'views/products/product.view.php';
}



public function categoryFilter() 
{
    $product = new Product();
    $category = new Category();
    $categories = $category->all();
    $discount = new Discount();
    $discounts = $discount->all();
    $discount = $product->getDiscountedProducts();
    $type = new Type();
    $types = $type->all();


    // Check if the category is set from POST or GET
    if (isset($_POST['categorySort'])) {
        $this->category = $_POST['categorySort'];
    } elseif (isset($_GET['category_id'])) {
        $this->category = $_GET['category_id'];
    } else {
        // Handle case when no category is selected
        $this->category = null; // or set a default category
    }

    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 9;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Filter products by category and apply pagination
    $products = $product->orderByCategory($this->category);
    $totalProducts = count($products);
    $totalPages = ceil($totalProducts / $itemsPerPage);
    $products = array_slice($products, $offset, $itemsPerPage);

    foreach ($products as &$prod) {
        $prod['front_view'] = $product->getImageByProductId($prod['id'])['front_view'] ?? 'default.jpg';
    }


    require 'views/products/product.view.php';
}

public function filterProducts()
{
    $category = new Category();
    $categories = $category->all();
    
    $product = new Product();
    $discount = new Discount();
    $discounts = $discount->all();
    $discount = $product->getDiscountedProducts();
    $type = new Type();
    $types = $type->all();

    $typeId = $_POST['type_id'] ?? null;

    if ($typeId) {
        // Filter products by the selected type_id
        $products = $product->getProductsByTypeId($typeId);
    } else {
        // If no type is selected, get all products
        $products = $product->all();
  
    }
  
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 9;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Filter products by category and apply pagination
    $products = $product->orderByCategory($this->category);
    $totalProducts = count($products);
    $totalPages = ceil($totalProducts / $itemsPerPage);
    $products = array_slice($products, $offset, $itemsPerPage);

    foreach ($products as &$prod) {
        $prod['front_view'] = $product->getImageByProductId($prod['id'])['front_view'] ?? 'default.jpg';
    }






    require 'views/products/product.view.php';
}




public function showDetails(){
    $product = new Product();
    $product_image = new Product_images();
    $product_size = new Product_sizes();
    $product_review = new User_reviews();
    $category = new Category();
    $review = new User_reviews();

    
    
    $id = $_GET['product_id'];
    $productDetails = $product->find($id);
    $reviews = $review->getReviewsByProductId($id);
    // Assuming you have a method to get product details

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



// public function showDiscountedProducts()
// {
//     $product = new Product();
//     $discount = $product->getDiscountedProducts();

//     require 'views/products/product.view.php';  
// }

// }
}
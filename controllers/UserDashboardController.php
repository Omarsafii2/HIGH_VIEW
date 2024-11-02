<?php
require 'model/User.php';
require 'model/Product.php';
require 'model/Faviorte.php';
require 'model/UserReviews.php';
require 'model/Contact.php';
require 'model/Orders.php';
require 'model/Cancellation_fees.php';
class UserDashboardController
{

    public $id;

    public function __construct() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }


        if (isset($_SESSION['user'])) {
            // Assuming $_SESSION['user'] is an associative array with an 'id' key
            $this->id = $_SESSION['user']['id']; // Adjust as necessary
        } else {
            $this->id = null;
        }
    }

    public function show()
    {
        $user = new User();
        $users = $user->find($this->id);

       $_SESSION['firstName']= $users['first_name'];
       $_SESSION['secondName']= $users['last_name'];
       $_SESSION['img']= $users['img'];

        $product = new Product();
        $products = $product->getProducts();
//var_dump($products);
        // Pass $users to header and index view files
        require 'views/user_profile/index.php';
    }



    public function showUser()
    {
//    echo 'hello from inside the user controller';
        $usersP = new User();
        $userP = $usersP->find($this->id);
        require 'views/user_profile/profile.php';

    }


    public function showPivacyPage(){
        require 'views/pages/securityAndPrivacy.php';
    }
    public function showHelpPage(){
        require 'views/pages/helpAndSupport.php';
    }

    public function showContactPage(){
        require 'views/user_profile/contact.php';
    }


    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and validate input data as needed
            $data = [
                'first_name' => htmlspecialchars(trim($_POST['firstName'])),
                'last_name' => htmlspecialchars(trim($_POST['lastName'])),
                'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                'phone' => htmlspecialchars(trim($_POST['phone'])),
                'city' => htmlspecialchars(trim($_POST['city'])),
                'district' => htmlspecialchars(trim($_POST['district'])),
                'street' => htmlspecialchars(trim($_POST['street'])),
                'building_num' => htmlspecialchars(trim($_POST['b_number']))
            ];

            // Hash the new password only if it's provided
            if (!empty(trim($_POST['newPassword']))) {
                $data['password'] = password_hash(trim($_POST['newPassword']), PASSWORD_DEFAULT);
            }

            // Perform the update
            $user = new User();
            $updateResult = $user->update($this->id, $data);

            // Set feedback message for Toast notification
            if ($updateResult) {
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Edited successfully';
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Error updating user';
            }

            // Redirect back to profile to show feedback
            header('Location: /user/profile');
            exit;
        }
    }





    public function getFaviorte(){
        $faviorte = new Faviorte();
        $faviortes=$faviorte->favorite($this->id);
//        dd($faviortes);
        require 'views/user_profile/fav.php';
    }


    public function showreview()
    {
        $review = new UserReviews();
        $reviews = $review->getReviews($this->id);
    require 'views/user_profile/reviews.php';
    }




    public function showContact(){
        $contact = new Contact();
        $contacts = $contact->getContact($this->id);
        require "views/user_profile/contact.php";
    }

    public function showOrderHistory() {
        $orders = new Orders();

        $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status'] : null;

        if ($status) {
            $orderDetails = $orders->onStatus($this->id, $status);
        } else {
            $orderDetails = $orders->getOrderDetails($this->id); // Fetch all orders if no status selected
        }
        // Fetch counts for different order statuses
        $totalOrders = $orders->getOrders($this->id);
        $deliveredOrders = $orders->getNumberDelivered($this->id);
        $cancelledOrders = $orders->getNumberCancelled($this->id);
        $pendingOrders = $orders->getNumberPending($this->id);
        $processingOrders = $orders->getNumberProcessing($this->id);
        $shippedOrders = $orders->getNumberShipped($this->id);

        $ordersData = []; // Structure orders and their items

        foreach ($orderDetails as $row) {
            $orderId = $row['order_id'];

            // Initialize order details if it’s a new order
            if (!isset($ordersData[$orderId])) {
                $ordersData[$orderId] = [
                    'order_id' => $row['order_id'],
                    'order_total' => $row['order_total'],
                    'order_status' => $row['order_status'],
                    'payment_status' => $row['payment_status'],
                    'shipping_address' => $row['shipping_address'],
                    'product_quantity' => $row['product_quantity'],
                    'created_at' => $row['order_created_at'],
                    'updated_at' => $row['order_updated_at'],
                    'items' => []
                ];
            }

            // Append each product as an item within the order's 'items' array
            $ordersData[$orderId]['items'][] = [
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price_at_purchase' => $row['price_at_purchase'],
                'order_item_total' => $row['order_item_total'],
                'product_price' => $row['product_price'],
                'front_view' => $row['front_view'],
            ];
        }

        // Load the view, passing the organized orders data and order counts
        require 'views/user_profile/orders.php';
    }


public function cancelOrder($id , $status){
        $order= new Orders();
        $order->orderCancel($id);

        $cancel=new Cancellation_fees();
  if($status == 'Delivered'){
      $data=[
          'fee_amount'=>'15.00',
          'user_id'=>$this->id,
          'status'=>'Delivered'
      ];
      $cancel->create($data);
  }else if($status == 'Shipped'){
      $data=[
          'fee_amount'=>'10.00',
          'user_id'=>$this->id,
          'status'=>'Shipped'
      ];
      $cancel->create($data);
  }else if($status == 'Pending' ){
      $data=[
          'fee_amount'=>'5.00',
          'user_id'=>$this->id,
          'status'=>'Pending'
      ];
      $cancel->create($data);
  }else if($status == 'Processing'){
      $data=[
          'fee_amount'=>'5.00',
          'user_id'=>$this->id,
          'status'=>'Processing'
      ];
      $cancel->create($data);
  }
header('Location: /user/order');
exit();
}






}
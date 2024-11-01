<?php
require 'model/User.php';
require 'model/Product.php';
class UserProfileController
{

    public $id=1;

    public function show()
    {
        $user = new User();
        $users = $user->find($this->id);
        $product = new Product();
        $products = $product->getProducts();

        // Pass $users to header and index view files
        require 'views/user_profile/partials/header.php';
        require 'views/user_profile/index.php';
    }

    public function showUser()
    {
//    echo 'hello from inside the user controller';
        $usersP = new User();
        $userP = $usersP->find($this->id);
        require 'views/user_profile/profile.php';



    }



    public function edit(){
    if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $data=[

        'first_name' => $_POST['firstName'],
        'last_name' => $_POST['lastName'],
        'phone' => $_POST['phone'],
        'city' => $_POST['city'],
        'district' => $_POST['district'],
        'street' => $_POST['street'],
        'building_num' => $_POST['b_number']
        ];
        $user_edit = new User();
        $user_edit = $user_edit->update($this->id , $data);
        require 'views/user_profile/profile.php';
    }
}




}
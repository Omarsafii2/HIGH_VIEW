<?php 
class User{

private $first_name;
private $last_name ;
private $phone;
private $email ; 
private $password;
private $img;
private $role ; 
private $address;



public function __construct($first_name ,$last_name ,$phone , $email, $password,$img ,$role,Address $address){
$this->first_name=$first_name;
$this->last_name=$last_name;
$this->phone=$phone;
$this->email=$email;
$this->password=password_hash($password, PASSWORD_DEFAULT);
$this->img=$img;
$this->role=$role;
$this->address=$address;


}

public function getFirstName() {
    return $this->first_name;
}

public function setFirstName($first_name) {
    $this->first_name = $first_name;
}

public function getLastName() {
    return $this->last_name;
}

public function setLastName($last_name) {
    $this->last_name = $last_name;
}

public function getPhone() {
    return $this->phone;
}

public function setPhone($phone) {
    $this->phone = $phone;
}

public function getEmail() {
    return $this->email;
}

public function setEmail($email) {
    $this->email = $email;
}

public function getPassword() {
    return $this->password;
}

public function setPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
}

public function getImg() {
    return $this->img;
}

public function setImg($img) {
    $this->img = $img;
}

public function getRole() {
    return $this->role;
}

public function setRole($role) {
    $this->role = $role;
}

public function getAddress() {
    return $this->address;
}

public function setAddress(Address $address) {
    $this->address = $address;
}


public function getUserInfo() {
    return "Name: $this->first_name $this->last_name, Phone: $this->phone, Email: $this->email, Role: $this->role, Address: " . $this->address->getFullAddress();
}




}







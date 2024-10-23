<?php 
class User{

private $first_name;
private $last_name ;
private $phone;
private $email ; 
private $password;
private $img;
private $role ;
private $city;
private $street;
private $district;
private $building_num;



public function __construct($first_name ,$last_name ,$phone , $email, $password,$img ,$role,$city , $street , $district , $building_num){
$this->first_name=$first_name;
$this->last_name=$last_name;
$this->phone=$phone;
$this->email=$email;
$this->password=password_hash($password, PASSWORD_DEFAULT);
$this->img=$img;
$this->role=$role;
$this->city=$city;
$this->street=$street;
$this->district=$district;
$this->building_num=$building_num;


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

    public function getcity(){
        return $this->city ;

    }

    public function setcity($city){
        $this->city= $city;
    }

    public function getstreet(){
        return  $this->street;
    }

    public function setstreet($street){
        $this->street=$street;
    }

    public function getdistrict(){
        return $this->district;
    }

    public function setdistrict($district){
        $this->district=$district;
    }

    public function getbuilding_num(){
        return $this->building_num;
    }
    public function setbuilding_num($building_num){
        $this->building_num=$building_num;
    }

public function getUserInfo() {
    return "Name: $this->first_name $this->last_name, Phone: $this->phone, Email: $this->email, Role: $this->role, Address: " . "city:". $this->city . "district:" . $this->district . "street:". $this->street ."building number:" . $this->building_num ;
}




}







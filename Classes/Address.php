<?php 

class Address{

    private $city;
    private $street;
    private $district; 
    private $building_num;


    public function __construct($city , $street , $district , $building_num){
$this->city=$city;
$this->street=$street;
$this->district=$district;
$this->building_num=$building_num;

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

      public function getfulladdress(){
        return "city:". $this->city . "district:" . $this->district . "street:". $this->street ."building number:" . $this->building_num ; 
      }



      
}
<?php
require_once ('Model.php');
class Product_images extends Model
{
    public function  __construct(){
        parent::__construct("product_images"); ///////////to establish the db connection form the parent
    }
}
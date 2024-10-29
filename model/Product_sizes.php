<?php
require_once ('Model.php');
class Product_sizes extends Model
{
    public function  __construct(){
        parent::__construct("product_sizes"); ///////////to establish the db connection form the parent
    }
}
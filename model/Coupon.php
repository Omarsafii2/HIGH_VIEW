<?php
require_once ('Model.php');
class Coupon extends Model
{
    public function  __construct(){
        parent::__construct("coupon"); ///////////to establish the db connection form the parent
    }
}
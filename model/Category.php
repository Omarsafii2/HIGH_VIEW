<?php
require_once ('Model.php');
class Category extends Model
{
    public function  __construct(){
        parent::__construct("category"); ///////////to establish the db connection form the parent
    }
}
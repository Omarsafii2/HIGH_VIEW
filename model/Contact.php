<?php
require_once ('Model.php');
class Contact extends Model
{
    public function  __construct(){
        parent::__construct("contact"); ///////////to establish the db connection form the parent
    }
}
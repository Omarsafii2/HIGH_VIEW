<?php
require_once ('Model.php');
class Articles extends Model
{
    public function  __construct(){
        parent::__construct("articles"); ///////////to establish the db connection form the parent
    }
}
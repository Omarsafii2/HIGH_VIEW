<?php
require_once ('Model.php');
class Faviorte extends Model
{
    public function  __construct(){
        parent::__construct("favorite"); ///////////to establesh the db connection form the parent
    }
}
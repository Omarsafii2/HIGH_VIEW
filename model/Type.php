<?php
require_once ('Model.php');
class Type extends Model
{
    public function  __construct(){
        parent::__construct("type"); ///////////to establish the db connection form the parent
    }
}
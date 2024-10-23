<?php 

 class conn{
private $dbname="e_commerce";
private $host="localhost";
private $user ="root";
private $passWord="";

public function connect(){
    try{
        $pdo = new PDO ("mysql:host=" .$this->host . ";dbname=". $this->dbname , $this->user ,$this->passWord );
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo ;

    }catch(PDOException $e){
   die("Connection failed" . $e->getMessage());
    }
}




 }
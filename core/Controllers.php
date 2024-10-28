<?php

class Controllers
{

    public function view($name){

        $filename="views/".$name.".view.php";
        if(file_exists($filename)){
            require $filename;
        }else{
            $filename="views/pages/404.view.php";
            require $filename;
        }
    }


}
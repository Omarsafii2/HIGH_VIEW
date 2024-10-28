<?php
require 'model/Articles.php';
class Article
{

    public function showArticle(){
        $articles = new Articles();
        $article= $articles->all();
        require 'views/pages/blog.view.php';
    }


}




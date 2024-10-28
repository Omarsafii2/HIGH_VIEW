<?php
require 'model/Articles.php';

class ArticleController
{
    public function showArticle()
    {

        $articles = new Articles();
        $article = $articles->all();

        require 'views/pages/blog.view.php';
    }

}
$articleController = new ArticleController();
$articleController->showArticle();
var_dump($articleController);
exit();
<?php
require 'model/Articles.php';

class ArticleController
{
    public function show()
    {
        echo "Inside showArticle method"; // Debugging line
        $articles = new Articles();
        $article = $articles->all();
        require '../views/pages/blog.view.php';
    }
}
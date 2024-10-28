<?php
// base url generating dynamically, you can also set static url if you are keeping your project in htdocs folder
// define('BASE_URL', 'http://localhost/php-auth');
define('BASE_URL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" . "://" . $_SERVER['HTTP_HOST']);
// database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'e_commerce');
// smtp2go.com api key for email sending
define('MAIL_API_KEY', '3126442ba0509a07e7e6a461cbf40da0554f09993db844234392cfc0852ef300');



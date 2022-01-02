<!-- 12/30/21 Defining the url's in one place, dynamically-->

<?php
//Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'steelers01');
define('DB_NAME', 'mvc-php-pdo');

//Echos back the files/directories, but truncated
//echo dirname(dirname(__FILE__));
//Define our APPROOT constant
define('APPROOT', 'dirname(dirname(__FILE__))');

//Define our URLROOT constant for dynamic links <a href="URLROOT" />
define('URLROOT', 'localhost/mvc-php-pdo');

//Define sitename as a constant
define('SITENAME', 'PHP_MVC_FRAMEWORK');



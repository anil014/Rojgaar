<?php
error_reporting(-1);
require 'vendor/autoload.php';
require_once "config/config.php";
require_once "system/Database.php";
require_once "config/mail.php";


$phpVersion = phpversion();

    $uri = isset($_GET['url']) ? $_GET['url'] : 'home';


$title = $uri;


$patePath = page_path('pages/' . $uri . '.php');

require_once "layouts/header.php";
require_once page_path('layouts/nav.php');
if (file_exists($patePath) && is_file($patePath)) {

    require_once $patePath;
} else {
    require_once page_path('messages/errors/404.php');
}


?>

<?php
require_once "layouts/footer.php";
?>


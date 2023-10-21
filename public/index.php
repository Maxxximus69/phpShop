<?php 
require_once 'vendor/autoload.php';

use src\Controllers\ShopifyController;

$controller = new ShopifyController();

if ($_GET['action'] === 'fetchProducts') {
    $controller->fetchProducts();
} elseif ($_GET['action'] === 'statistics') {
    $controller->statistics();
} else {
    $controller->index();
}
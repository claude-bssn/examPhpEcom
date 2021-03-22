<?php
// Database connection : $pdo

session_start();

include_once '../pdo_connection.php';

include '../layout/header.php';

// Manage query strings
$slug =  explode('?', $_SERVER['REQUEST_URI'])[0];

// Router
switch ($slug) {
    // url
    case '/':
        // php file (controller)
        include '../controller/home_controller.php';
        break;
    case '/register':
        include '../controller/register_controller.php';
        break;
    case '/login':
        include '../controller/login_controller.php';
        break;
    case '/item':
        include '../controller/item_controller.php';
        break;
    case '/account':
        include '../controller/account_controller.php';
        break;
    case '/cart':
        include '../controller/cart_controller.php';
        break;
    case '/account_edit':
        include '../controller/account_edit_controller.php';
        break;
    case '/account_delete':
        include '../controller/account_delete_controller.php';
        break;
    case '/logout':
        include '../controller/logout_controller.php';
        break;
    case '/payment':
        include '../controller/payment_controller.php';

        break;
    default:
        include "../controller/404_controller.php";
        break;
}

include '../layout/footer.php';

?>


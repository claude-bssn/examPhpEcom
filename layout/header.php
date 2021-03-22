<?php
include '../model/order.php';
$cartSum['SUM(quantity)'] = '';


if (isset($_SESSION['id'])){
$dataOrder = getOpenOrderByIdClient($pdo, $_SESSION['id']);

    if ($dataOrder !== false) {
        $cartSum = countItem($pdo, $dataOrder['id']);
        $cartSum['SUM(quantity)'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/global.css" />
    <script type="text/javascript" src="/public/js/main.js"></script>
    <title>Welcome</title>
</head>

<body>
    <header>
        <h1>TERMINAFLOR</h1>
        <div class="menu">
            <ul class="nav">
                <div class="main_menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/item">Product</a></li>
                </div>
                <div class="client_menu">
                    <li><a href="/login">Login / Sign in</a></li>
                    <?php if (isset($_SESSION['id'])) : ?>
                        <li><a href="/account">Account</a></li>
                        <li><a href="/cart">Cart</a> <span><?= $cartSum['SUM(quantity)']; ?></li></span>
                        <li><a href="/logout">Logout</a></li>
                    <?php endif ?>
                </div>
            </ul>
        </div>

    </header>
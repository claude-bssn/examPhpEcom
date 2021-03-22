<?php

$dataOrder= orderByIdClient($pdo, $_SESSION['id']);
$total= 0;
// var_dump($dataOrder);
// foreach($dataOrder as $values){
//     $order = getHistoricOrder($pdo, $values['id']);
//     var_dump($order);
// }
include '../view/account_view.php';
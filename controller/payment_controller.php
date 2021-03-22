<?php
include '../model/item.php';

// var_dump($_SESSION);
if(isset($_POST['paid'])){
    if($_POST['paid'] === '1'){
        $index=1;
        $dataItem=getAllItem($pdo); 
        $cartContent = (getContentOrder($pdo, $_SESSION['id']));
        
        $dataOrder=getOpenOrderByIdClient($pdo, $_SESSION['id']);
        
        orderPaid($pdo, $_SESSION['id'], $index);
        foreach($cartContent as $item){
            $dataCategory= getCategoryById($pdo,$item['id_category']);
            
            // var_dump($dataCategory);
            addTooO_I_Snapshot($pdo, $dataOrder['id'], $item['name'], $item['price'], $dataCategory['name'], $item['quantity']);
            deleteContentOrder($pdo, $dataOrder['id']);
            // deleteOrder($pdo, $dataOrder['id_client']);
            // var_dump($item);
        }
    //     var_dump($dataOrder);
    // //  var_dump($dataItem);
}
header('Location: payment');
    exit();
}
// var_dump($_POST);
include '../view/payment_view.php';
<?php
include '../model/item.php';

$cart = (getContentOrder($pdo, $_SESSION['id']));

$cartEmpty='';

if($_SESSION['connected']===true){


    if(getOpenOrderByIdClient($pdo, $_SESSION['id']) === false){
        $cartEmpty='<h2>Votre panier est vide</h2>';
    }elseif(empty($cart)!==false){
        $cartEmpty='<h2>Votre panier est vide</h2>';
    }else{
        $cartEmpty='<h2>Votre panier contient</h2>';
        $cart = (getContentOrder($pdo, $_SESSION['id']));
    }
}
$i=1;
$total= 0;


if(empty($_POST)=== false){
    $dataOrder = getOpenOrderByIdClient($pdo, $_SESSION['id']);
    foreach($cart as $value){
        
        foreach($_POST as $key =>$id){
            modifyItemQuantity($pdo, $id , $dataOrder['id'] , $key);
        }
    }
    header("Location: cart");
    exit();
}

if(isset($_GET["remove_item"])){
   removeItem($pdo, $_GET["remove_item"]);
    echo"coucou";
    header("Location: /cart ");
    exit();
}

foreach($cart as $key=>$value){
    $i++;
} 

include '../view/cart_view.php';
?>
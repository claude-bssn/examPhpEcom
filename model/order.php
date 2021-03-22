<?php
function openOrder($pdo, $data){
    $sql = "
        INSERT INTO `order` (id_client, paid)
        VALUES (:id_client, :paid);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                'id_client'=> $_SESSION['id'],
                'paid'=>0
            ]
        ); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function addToCart($pdo, $post, $dataOrder){
    $sql = "
        INSERT INTO content_order (id_order, id_item, quantity)
        VALUES (:id_order, :id_item, :quantity);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                'id_order'=>$dataOrder['id'],
                'id_item'=> $post['id_item'],
                'quantity'=>$post['quantity']
            ]
        ); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }



}
function orderByIdClient($pdo, $id){
    $sql = "
        SELECT *
        FROM `order`
        WHERE id_client = :id;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$id,
            ]
        ); 
        return $stmt->fetchAll();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function getOpenOrderByIdClient($pdo, $id){
    $sql = "
        SELECT *
        FROM `order`
        WHERE id_client = :id AND paid = '0' ;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$id,
            ]
        ); 
        return $stmt->fetch();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function getContentOrder($pdo, $data){
    $sql = "
        SELECT i.name, co.quantity, i.price, i.id_category, co.id_item
        FROM `order` AS o	 
        inner join content_order AS co
        ON o.id = co.id_order
        INNER join item as i
        ON co.id_item = i.id
        WHERE o.id_client=:id AND o.paid=0
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$data,
            ]
        ); 
        return $stmt->fetchAll();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function scanOrderContent($pdo, $dataOrder, $post){
    $sql = "
        SELECT *
        FROM content_order
        WHERE id_order = :id_order AND id_item = :id_item  ;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id_order'=>$dataOrder['id'],
                'id_item'=> $post['id_item']
            ]
        ); 
        return $stmt->fetch();
    
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function modifyItemQuantity($pdo, $updatedQuantity,$dataOrder, $post ){
    $sql ="
        UPDATE content_order
        SET quantity = :qts
        WHERE id_order = :id_order AND id_item = :id_item  ;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'qts'=> $updatedQuantity,
                'id_order'=>$dataOrder,
                'id_item'=> $post
            ]
        );
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function removeItem($pdo, $id){
    $sql="
        DELETE FROM content_order
        WHERE id_item= :id;
    ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=> $id,
            ]
        ); 
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function countItem($pdo,$id){
    $sql="
    SELECT SUM(quantity)
    FROM content_order
    
    WHERE id_order= :id;
    ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=> $id,
            ]
        ); 
        return $stmt->fetch();

    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function orderPaid($pdo, $id, $index){
    $sql="
        UPDATE `order`
        SET paid = :index
        WHERE id_client = :id  ;
    ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'index'=> $index,
                'id'=>$id
            ]
        ); 
        

    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function addTooO_I_Snapshot($pdo, $idOrder, $name, $price, $category, $quantity){
    $sql="
        INSERT INTO ordered_item_snapshot (id_order, name_item, price, category, quantity)
        VALUES ( :id_order, :name_item, :price , :category, :quantity );
        ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id_order' => $idOrder,
                'name_item' =>$name,
                'price' => $price,
                'category'=> $category,
                'quantity'=>$quantity
            ]
        ); 
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function deleteContentOrder($pdo, $idOrder){
    $sql="
        DELETE FROM content_order
        WHERE id_order= :id_order;
        ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id_order' => $idOrder,
            ]
        ); 
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}
function deleteOrder($pdo, $idClient){
    $sql="
        DELETE FROM `order`
        WHERE id_client = :id;
        ";
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id' => $idClient,
            ]
        ); 
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}
function getHistoricOrder($pdo, $idOrder){
    $sql = "
        SELECT id_order, name_item, quantity, price, category 
        FROM ordered_item_snapshot 
        WHERE id_order= :id;
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=>$idOrder,
            ]
        ); 
        return $stmt->fetchAll();

    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

}
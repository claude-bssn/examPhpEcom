<?php
function getItemByCategory ($pdo, $id) {
    $sql = "
        SELECT *
        FROM item
        WHERE id_category = :id;
    "; 

    $stmt = $pdo->prepare($sql); 

    $stmt->execute(
        [
            'id'=>$id,
        ]
    ); 

    try {
       return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}
function getCategoryById($pdo,$id ){
    $sql = "
        SELECT name
        FROM category
        WHERE id =:id ;
        
    "; 
    $stmt = $pdo->prepare($sql); 
    try {
        $stmt->execute(
            [
                'id'=> $id
            ]
        ); 
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getAllItem($pdo) {
    $sql = "
        SELECT *
        FROM item;
        
    "; // on définit la requête sql

    $stmt = $pdo->prepare($sql); // on la prépare
    try {
        $stmt->execute(); // true or false
        return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getItemById ($pdo, $id) {
    $sql = "
        SELECT *
        FROM item
        WHERE id = :id;
    "; 

    $stmt = $pdo->prepare($sql); 

    $stmt->execute(
        [
            'id'=>$id,
        ]
    ); 

    try {
       return $stmt->fetchAll();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

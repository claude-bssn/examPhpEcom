<?php

function addUser($pdo, $data){
    $sql = "
        INSERT INTO client (first_name, last_name, email, password, phone)
        VALUES (:firstname, :lastname, :email, :password, :phone);
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute($data); 
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getEmailPassword($pdo, $email) {
    $sql = "
        SELECT email, password, first_name
        FROM client
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(
            [
                "email" => $email,
            ]
        );
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getClient($pdo, $email){
    $sql = "
        SELECT id, email, password, first_name, last_name, phone
        FROM client
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(
            [
                "email" => $email,
            ]
        );
        return $stmt->fetch();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function updateClient($pdo, $fromage)
{
    $first_name = $fromage['first_name'];
    $last_name = $fromage['last_name'];
    $email = $fromage['email'];
    $phone = $fromage['phone'];
    $sql = "
        UPDATE client
        SET first_name = :first_name , last_name = :last_name , email = :email , phone = :phone
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone
            ]
        );
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function deleteClient($pdo, $fromage)
{
    $email = $fromage['email'];
    $sql = "
        DELETE FROM client
        WHERE email = :email;
    ";

    $stmt = $pdo->prepare($sql);

    try {
        return $stmt->execute(
            [
                "email" => $email,
            ]
        );
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}




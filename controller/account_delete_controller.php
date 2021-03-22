<?php
include '../model/user.php';

if (isset($_POST['password'])) {
    if (password_verify($_POST['password'], getEmailPassword($pdo, $_POST['email'])['password'])) {
        $_SESSION['email'] = trim($_POST['email']);
        $_SESSION['password'] = trim($_POST['password']);
        $passwordHash = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
        $_SESSION['password'] = $passwordHash;
        echo 'fromage';
        var_dump($_POST);
        // var_dump($_SESSION);
        deleteClient($pdo, $_POST);
        // echo 'Your account has been deleted';
    }
}

var_dump($_SESSION);
var_dump(deleteClient($pdo, $_SESSION));



include '../view/account_delete_view.php';

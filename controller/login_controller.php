<?php
include_once '../model/user.php';

if (isset($_POST['email'])) {
    $_SESSION['date'] = date('d/m/Y');
    $_SESSION['time'] = date('H:i');
    $dateTime = '['.$_SESSION['date'].'|'.$_SESSION['time'].']';


    $dataSession= getEmailPassword($pdo, $_POST['email']);
        if($dataSession!== false){
        $_SESSION['email'] = $dataSession['email'];
        $verifiedEmail = $dataSession['email'];
        $passwordHash = $dataSession['password'];

            if (password_verify($_POST['password'], $passwordHash) && $_POST['email'] === $verifiedEmail) {
                $_SESSION['connected'] = true;
                $clientInfos = getClient($pdo, $_SESSION['email']);
                $_SESSION['id'] = $clientInfos['id'];
                $_SESSION['first_name'] = $clientInfos['first_name'];
                $_SESSION['last_name'] = $clientInfos['last_name'];
                $_SESSION['phone'] = $clientInfos['phone'];
             
                header('Location: item');
                exit();
            } else {
                $_SESSION['connected'] = false;
                echo "Wrong password" . '<br>';
            }
        }else{
        $_SESSION['connected'] = false;
        echo "<h2> Please sign in </h2>";
    }
}
if (isset($_SESSION['connected'])&& $_SESSION['connected']=== true){
    header("Location: account");
}




include '../view/login_view.php';
include '../controller/register_controller.php';
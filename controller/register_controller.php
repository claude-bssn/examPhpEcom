<?php

include_once '../model/user.php';

if (empty($_POST['email']) === false && empty($_POST['password']) === false && empty($_POST['lastname']) === false){
        $dataSession= getEmailPassword($pdo, $_POST['email']);
        if($dataSession!== false){
            $_SESSION['email'] = $dataSession['email'];
            $verifiedEmail = $dataSession['email'];
            $passwordHash = $dataSession['password'];
            $firstname = $dataSession['first_name'];

            if (password_verify($_POST['password'], $passwordHash) && $_POST['email'] === $verifiedEmail) {

                $_SESSION['connected'] = true;
                $clientInfos = getClient($pdo, $_SESSION['email']);
                $_SESSION['id'] = $clientInfos['id'];
                $_SESSION['first_name'] = $clientInfos['first_name'];
                $_SESSION['last_name'] = $clientInfos['last_name'];
                $_SESSION['phone'] = $clientInfos['phone'];
                echo "<p>Session connecté</p>";
                echo "<p>Bonjour " . $firstname . '</p>';
                // header("Location: /profil");

                // $my_logs = fopen('../logs/' . $_SESSION['date'] . 'logs.txt', 'a+');
                // fputs($my_logs, $_SESSION['email'] . ' session connectée' . $_SERVER['REQUEST_URI'] . $dateTime . "\n");
                // header('Location: item');
                // exit();
                // }
                header('Location: account');
                exit();
            }else{
                echo "Cet email existe déjà " . '<br>';
            }
        }

    if(isset($_POST['email']) ){
        $_POST['firstname']= trim($_POST['firstname']);
        $_POST['lastname']= trim($_POST['lastname']);
        $_POST['email']= trim($_POST['email']);
        $_POST['phone']= trim($_POST['phone']);
        $_POST['password']= trim($_POST['password']);
        $passwordHash = password_hash(trim($_POST['password']),PASSWORD_BCRYPT);
        $_POST['password'] = $passwordHash;

        addUser($pdo, $_POST);
  
        
    }
}






##################################################################
//code pour log-in

// if(isset($_POST['email'])){ //vérifie si le champ email est remplie
//     if(password_verify($_POST['password'], $passwordHash) && $_POST['email']=== 'mail@mail.fr'){ //vérifie si le password haché est correct et si il correspond a la bonne adresse email.
//         $connected = password_verify($_POST['password'], $passwordHash) ;
        
//         $my_logs = fopen('./logs/'.$_SESSION ['date'].'logs.txt', 'a+');
//         fputs($my_logs, $_SESSION['email'].' session connectée'.$_SERVER['REQUEST_URI'].$dateTime."\n");
        
//         $_SESSION['connected'] = $connected;
//         echo "Session connecté!".'<br>';
//     }else{
//         $_SESSION['connected'] = false;
//         echo "mot de passe invalide".'<br>';
//         $my_logs = fopen('./logs/'.$_SESSION ['date'].'logs.txt', 'a+');
//         fputs($my_logs,$_POST['email'].' a tenté de se connecter '.$_SERVER['REQUEST_URI'].$dateTime."\n");
//     }
// };

include '../view/register_view.php';
?>


<?php
    session_start();
    require_once 'config.php';
    require_once 'controller.php';
    
     // Login registered user
     if(isset($_POST['action']) && isset($_POST['action']) === 'login'){
        $email = test_input($_POST['login-email']);
        $password = test_input($_POST['login-password']);
        // print_r($_POST);
        $loggedInUser = login($conn,$email);
        if($loggedInUser != null){
            // check password
            if(password_verify($password,$loggedInUser['password'])){
                
                echo 'login';
                $_SESSION['user'] = $email;
            }else{
                echo showMessage('warning','Password is incorrect');
            }
        }else{
            echo showMessage('danger','User is not registered!');
        }
    }
?>
<?php
    session_start();
    require_once 'config.php';
    require_once 'controller.php';

     // register a User
    if($_POST['action'] && $_POST['action'] === 'register'){
        $name = test_input($_POST['reg-name']);
        $email = test_input($_POST['reg-email']);
        $pass = test_input($_POST['reg-pwd']);

        $hasPwd = password_hash($pass,PASSWORD_DEFAULT);
        // print_r($_POST);

        if(userExist($conn,$email)){
            echo showMessage('warning',"This E-mail is already taken");
        }else {
            if (register($conn,$name,$email,$hasPwd)) {
                $_SESSION['user'] = $email;
                echo 'registered';
            }else {
                echo showMessage('warning',"Server Error");
            }
        }
        
    }
?>
<?php
    session_start();
    require_once 'config.php';
    require_once 'controller.php';
   
    if(!isset($_SESSION['user'])){
        header('location: login.php');
        die;
    }
    $email = $_SESSION['user'];
    $data = currentUser($conn,$email);
    $name = $data['name'];
    $userId = $data['id'];
    
?>
<?php
    session_start();
    require_once 'config.php';
    require_once 'controller.php';

        $email = $_SESSION['user'];
        $data = currentUser($conn,$email);
        $name = $data['name'];
        $userId = $data['id'];
     
    // Create Post
    if(isset($_FILES['image']) || isset($_POST['title']) || isset($_POST['body']) ){
        $title = test_input($_POST['title']);
        $body = test_input($_POST['body']);
        $file_name = $_FILES['image']['name'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $postImage = date('d-m-y-h-i').$file_name;
        $folder = '../uploads/';
        
        $sql = "INSERT INTO posts(userId,title,body,image) VALUES(:userId,:title,:body,:image)";
        $stmt = $conn->prepare($sql);
        $save = $stmt->execute(['userId'=>$userId,'title'=>$title,'body'=>$body,'image'=>$postImage]);
        if($save){
            move_uploaded_file($file_tmp,$folder.$postImage);
        }
    }
?>
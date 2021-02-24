<?php
    session_start();
    require_once "inc/header.php";
    require_once "inc/config.php";
    require_once "inc/controller.php";

    // $ip = get_client_ip_add();
    $ip = "192.168.10.1";
    $unique = checkVisitor($conn,$ip);
 
    if($unique < 1){
        addVisitors($conn,$ip);
    }
    
?>
    <div class="container mt-5">
        <div class="jumbotron jumbotron-fluid bg-dark p-5 text-center text-light">
            <h2 >Welcome to Blog Xpress</h2>
            <p class="px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Laborum dignissimos, iusto necessitatibus aliquid qui alias
              nihil aliquam quo inventore earum.</p>
              <?php if(isset($_SESSION['user'])): ?>
                <a href="home.php" class="btn btn-primary">View Blog Posts</a>
              <?php else: ?>
                <a href="signup.php" class="btn btn-primary">Register</a>
                <a href="login.php" class="btn btn-success">Login</a>
              <?php endif; ?>
        </div>
    </div>

<?php
    require_once "inc/footer.php";
?>  

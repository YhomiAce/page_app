<?php
    session_start();
    require_once 'inc/header.php';
    if(isset($_SESSION['user'])){
        header('location:home.php');
    }

?>

<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Login to your Account</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <!-- Form -->
    <form class="text-center" id="login-form" method="POST" style="color: #757575;" action="#!">
        <div id="loginAlert"></div>
        <!-- E-mai -->
        <div class="md-form">
            <input type="email" id="login-email" 
                class="form-control" name="login-email" 
                required
            >
            <label for="materialSubscriptionFormEmail">E-mail</label>
        </div>
        <div class="md-form">
            <input type="password" id="login-password" 
                class="form-control" name="login-password"  
                required
            >
            <label for="materialSubscriptionFormEmail">Password</label>
        </div>
           
        <div class="clearfix"></div>
        <!-- Sign in button -->
        <input type="submit" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
         value="Sign in" id="login-btn">

    </form>
    <!-- Form -->

</div>

</div>
    </div>
</div>

<?php
    require_once 'inc/footer.php';
?>
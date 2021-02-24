<?php
    session_start();
    require_once 'inc/header.php';
    if(isset($_SESSION['user'])){
        header('location:home.php');
    }

?>
<body>
    <!-- Material form register -->
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Register Here</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" id="register-form" method="POST" style="color: #757575;" action="#!">
                <div id="regMsg"></div>
                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" id="reg-name" name="reg-name" class="form-control" required>
                            <label for="materialRegisterFormFirstName">Full name</label>
                        </div>
                    </div>
                    
                </div>

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" name="reg-email" id="reg-email" class="form-control" required>
                    <label for="materialRegisterFormEmail">E-mail</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" id="reg-pwd" name="reg-pwd" required class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                    <label for="materialRegisterFormPassword">Password</label>
                </div>
                <!-- Password Confirmation -->
                <div class="md-form">
                    <input type="password" id="reg-Cpwd" name="reg-Cpwd" class="form-control" required aria-describedby="materialRegisterFormPasswordHelpBlock">
                    <label for="materialRegisterFormPassword">Confirm Password</label>
                    <p id="passMsg" class="text-center text-danger"></p>
                </div>

            
                <!-- Sign up button -->
                <input value="Sign up" class="btn btn-primary btn-block"
                type="submit" id="reg-btn">
                  
            </form>
            <!-- Form -->

        </div>
    </div>
<?php
    require_once 'inc/footer.php';
?>
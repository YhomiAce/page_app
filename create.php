<?php
    session_start();
    require_once "inc/header.php";
    if(!isset($_SESSION['user'])){
        header('location: login.php');
        die;
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-info">
                <div class="card-header bg-primary">
                    <h4 class="text-light text-center">Create New post</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="add-post-form">
                        <div class="form-group">
                            <label for="title">Title of Post</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Content of Post </label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" id="exampleFormControlFile1">
                        </div>
                        <input type="submit" value="Create Post" id="addPostBtn" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once "inc/footer.php";
?>


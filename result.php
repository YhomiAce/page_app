<?php
    require_once "inc/header.php";
    require_once "inc/config.php";
    require_once "inc/controller.php";
    $visitor = getAllVisitors($conn);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h4 class="text-center text-light">Solution of Test</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Number of Unique Users: 
                            <span class="btn btn-success float-right btn-sm"><?= $visitor; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "inc/footer.php";
?>
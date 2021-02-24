<?php
    require_once "inc/header.php";
    require_once "inc/config.php";

    $sql = "SELECT * FROM posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();

?>  

<div class="container mt-5">
    <div class="row">
        <?php foreach($rows as $row): ?>


        <div class="col-lg-4 col-md-12 mb-4">

            <!--Card Light-->
            <div class="card">
              <!--Card image-->
              <div class="view overlay">
                <img src="uploads/<?= $row['image']; ?>" class="card-img-top" alt="">
                <a>
                  <div class="mask waves-effect waves-light"></div>
                </a>
              </div>
              <!--/.Card image-->
              <!--Card content-->
              <div class="card-body">
                <!--Social shares button-->
                
                <!--Title-->
                <h4 class="card-title"><?= $row['title']; ?></h4>
                <hr>
                <!--Text-->
                <p class="card-text"><?= substr($row['body'],0,99);?>...</p>
                <a href="show.php?post_id=<?= $row['id']; ?>" class="link-text">
                  <h5>Read more <i class="fas fa-chevron-right"></i></h5>
                </a>
              </div>
              <!--/.Card content-->
            </div>
            <!--/.Card Light-->

        </div>
    <?php endforeach; ?>
    </div>
</div>

<?php
    require_once "inc/footer.php";
?>    
<?php
    require_once "inc/header.php";
    require_once "inc/config.php";
    require_once "inc/controller.php";

    if(isset($_GET['post_id'])){
        $id = $_GET['post_id'];
        $post = getPost($conn,$id);

        $isViewed = checkPostView($conn,$id);
        if($isViewed > 0){
            updateView($conn,$id);
        }else{
            addView($conn,$id);
        }
        $view = getView($conn,$id);
        
    }
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- Card -->
            <div class="card card-cascade wider reverse">

              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img class="card-img-top" src="uploads/<?= $post['image']; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight waves-effect waves-light"></div>
                </a>
              </div>

              <!--Post data-->
              <div class="card-body card-body-cascade text-center">
                <h2><a><strong><? $post['title']; ?></strong></a></h2>
                <p>Written by <a>Abby Madison</a>, 26/08/2016</p>

                <!--Social shares-->
                <div class="social-counters ">

                  <!--Comments-->
                  <a class="btn btn-blue-grey  waves-effect waves-light">
                    <i class="fas fa-read left "></i>
                    <span class="clearfix d-none d-md-block">Total Views</span>
                  </a>
                  <span class="counter "><?= $view['total_views']; ?></span>

                </div>
                <!--Social shares-->

              </div>
              <!--Post data-->
            </div>

            <!--Excerpt-->
            <div class="excerpt mt-5 wow fadeIn" data-wow-delay="0.3s">
              <p><?= $post['body']; ?>  </p>
              <p><?= $post['body']; ?>  </p>
              <p><?= $post['body']; ?>  </p>
 
            </div>
          </div>

        </div>
    </div>
</div>

<?php
    require_once "inc/footer.php";
?>  
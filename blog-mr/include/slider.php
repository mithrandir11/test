<?php
$query_post = "SELECT * FROM posts";
$posts = $db->query($query_post);



?>




<div id="my-slider" class="container mt-5">
    <div class="row ">
        <div class="  col-md-10 col-xl-9 m-auto ">

            <div id="slider" class="carousel carousel-fade slide mb-5 mt-5" data-ride="carousel">

               

                <div class="carousel-inner ">
                    <?php
                        if ($posts->rowCount() > 0){
                            foreach ($posts as $post){
                                // $id=$post['id'];
                                $active=$post['postactive'];
                                // $query_posts = " SELECT * FROM posts WHERE id=$id_post";
                                // $post=$db->query($query_posts)->fetch();
                    ?>

                    <div class="carousel-item  <?php echo($active) ? "active" : "" ; ?>">
                        <img class="img-fluid " src="./upload/post/<?php echo $post['image'] ?>" alt="">
                        <div class="carousel-caption text-justify px-3 bg-secondary">
                           <a href="single.php?post=<?php echo $post['id'] ?>" class="text-white nav-link p-0">
                               <h5><?php echo $post['title'] ?></h5>
                            </a>
                            <p id="p-slider" class="mb-2">  <?php echo $post['prebody']. " ..."  ?></p>
                        </div>
                    </div>

                    <?php
                       }
                    }
                        ?>

                </div>
                <!------------ controler --------------->
                <a href="#slider" class="carousel-control-prev order-2" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#slider" class="carousel-control-next order-1" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>












        </div>
    </div>
</div>
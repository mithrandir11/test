<?php
    include("./include/header.php");

    if(isset($_GET['search'])){
        $keyword=$_GET['search'];
        $posts = $db->prepare("SELECT * FROM posts WHERE title LIKE :keyword OR body LIKE :keyword ");
        $posts -> execute(['keyword' => "%$keyword%"]);
    }
?>


<section>
    <div class="container-fluid pt-5">
        <div class="row mt-5  ">
            <div class="col-md-8  col-xl-9 mt-5">

                <div class="row">
                    <div id="find-alert" class="col">
                        <div class="alert alert-primary text-right">پست های مرتبط با [<?php echo $_GET['search'] ?>]</div>
                    </div>
                </div>

                <div class="row  ">

                <?php 
                    if($posts->rowCount() > 0){ 
                        foreach($posts as $post){
                            $category_id=$post['category_id'];
                            $query_post_category="SELECT * FROM categories WHERE id=$category_id";
                            $post_category=$db->query( $query_post_category)->fetch();
                ?>


                    <div class="col-sm-6 col-xl-4">
                        <div class="card mt-3  mx-auto shadow">
                            <img src="./upload/post/<?php echo $post['image'] ?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <h1 class="card-header d-flex text-right justify-content-between">
                                <?php echo $post['title'] ?>
                                <span class="badge badge-secondary mt-1"><?php echo $post_category['title'] ?></span>
                                </h1>
                                
                                
                                <p id="card-text-index" class="card-text  text-justify"><?php echo $post['prebody']." ..." ; ?></p>
                                <div class="row justify-content-between mx-1">
                                <p class="mt-1 p-0 mb-1" style="font-size: 0.8rem;">نویسنده: <?php echo $post['author'] ?></p>
                                    <a href="single.php?post=<?php echo $post['id'] ?>" class="btn btn-outline-secondary px-1" style="font-size: 0.8rem !important;">ادامه مطلب ...</a>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

                   

                    <?php
                }
                    } else {
                    ?>
                    <Script>
                        $(document).ready(function(){
                            $("#find-alert").hide();
                        });
                    </Script>
                <div class="col">
                    <div class="alert alert-danger text-right">یافت نشد</div>
                </div>

                <?php  
                }
                ?>

                </div>




                <div class="row">
                    <div class=" col-5 col-md-4 col-xl-3 mx-auto  p-0 mb-3">
                        <div class="btn-group mt-3 mx-auto btn-block shadow">
                            <button class="btn btn-secondary order-5">1</button>
                            <button class="btn btn-outline-secondary order-4">2</button>
                            <button class="btn btn-outline-secondary order-3">3</button>
                            <button class="btn btn-outline-secondary order-2">...</button>
                            <button class="btn btn-outline-secondary order-1">10</button>
                        </div>
                    </div>
                </div>




            </div>


            <?php
                include("./include/sidebar.php");
            ?>







        </div>
</section>




<?php
include("./include/footer.php");
?>
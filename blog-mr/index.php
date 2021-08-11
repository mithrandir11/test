<?php
    include("./include/header.php");
?>

<!-------------------------------------------- carousel ----------------------------------------------------------------->
<?php
include("./include/slider.php");
?>
<!-------------------------------------------- end carousel ----------------------------------------------------------------->


<?php 
    // $query_posts = "SELECT * FROM posts ORDER BY id DESC";
    // $posts= $db->query($query_posts);
    $p=0;

    if(isset($_GET['page'])){
        $p=($_GET['page']-1)*4;

           
            if($_GET['page'] < 6){

                    $s1=1;
                    $s2=2;
                    $s3=3;
                    $s4=4;
                    $s5=5;
                    $s6=6;
                
            } else {
                $s1=1;
                $s2=$_GET['page']-2;
                $s3=$_GET['page']-1;
                $s4=$_GET['page'];
                $s5=$_GET['page']+1;
                $s6=$_GET['page']+2;
              
            }


    } else {
       

        $s1=1;
        $s2=2;
        $s3=3;
        $s4=4;
        $s5=5;
        $s6=6;
    }

    $query_posts = "SELECT * FROM posts ORDER BY id DESC LIMIT $p , 4";
    $posts= $db->query($query_posts);

 
 
?>



<!-------------------------------------------- body ----------------------------------------------------------------->
<section>
    <div class="container-fluid mt-3  " >
        <div class="row mt-3  justify-content-center">
            <div class="col-12 col-md-8  col-xl-9">

                <div class="row  px-4 mt-5">

                <?php 
                    if($posts->rowCount() > 0){
                        foreach($posts as $post){
                            $category_id=$post['category_id'];
                            $query_post_category="SELECT * FROM categories WHERE id=$category_id";
                            $post_category=$db->query( $query_post_category)->fetch();


                            if(isset($_GET['category'])){
                                if( $category_id == $_GET['category']){
                                    ?>

                                        <div class="col-sm-6 col-xl-4">
                                            <div class="card mt-3  mx-auto ">
                                                <img id="card-img" src="./upload/post/<?php echo $post['image'] ?>" class="card-img-top " alt="">
                                                <div class="card-body">
                                                    <h1 class="card-header d-flex text-right justify-content-between">
                                                    <?php echo $post['title'] ?>
                                                    <span class="badge badge-secondary mt-1"><?php echo $post_category['title'] ?></span>
                                                    </h1>
                                                    
                                                    

                                                    <p id="card-text-index" class="card-text  text-right"><?php echo $post['prebody']. "..." ; ?></p>
                                                    <div class="row justify-content-between mx-1">
                                                    <p class="mt-1 p-0 mb-1" style="font-size: 0.8rem; ">نویسنده: <?php echo $post['author'] ?></p>
                                                        <a href="single.php?post=<?php echo $post['id'] ?>" class="btn shadow btn-outline-info px-1" style="font-size: 0.8rem !important;">ادامه مطلب ...</a>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                            <?php
                                }
                            } else {
                                ?>          
                                <div class="col-sm-6 col-xl-4">
                                    <div class="card mt-3  mx-auto ">
                                        <img id="card-img" src="./upload/post/<?php echo $post['image'] ?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h1 class="card-header d-flex text-right justify-content-between">
                                            <?php echo $post['title'] ?>
                                            <span class="badge badge-secondary mt-1"><?php echo $post_category['title'] ?></span>
                                            </h1>
                                            
                                            
                                            <p id="card-text-index" class="card-text "><?php echo $post['prebody'] . "  ..." ; ?></p>
                                            <div class="row justify-content-between mx-1">
                                            <p class="mt-1 p-0 mb-1" style="font-size: 0.8rem;">نویسنده: <?php echo $post['author'] ?></p>
                                                <a href="single.php?post=<?php echo $post['id'] ?>" class="btn shadow btn-outline-info px-1" style="font-size: 0.8rem !important;">ادامه مطلب ...</a>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                    <?php
                            }
                                ?>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="col ">
                            <div class="alert alert-danger text-right">پستی یافت نشد !!</div>
                            <div style="height: 25rem;"></div>
                        </div>
                        <?php
                    }
                    ?>



                </div>




                  
              
                    <div class=" d-flex flex-wrap justify-content-center  mt-4 mb-5" >
                        <div class=" col col-sm-8  col-xl-7 px-lg-5 p-0 m-0  ">
                            <form method="get" class="btn-group mt-3 btn-block shadow ">
                                <button class="btn btn-secondary order-7 mr-1" > »</button>
                                <button id="page1" type="submit" name="page" class="btn btn-outline-secondary  order-6" value="<?php echo $s1 ?>"><?php echo $s1 ?></button>
                                <button id="page2" type="submit" name="page" class="btn btn-outline-secondary order-5" value="<?php echo $s2 ?>"><?php echo $s2 ?></button>
                                <button id="page3" type="submit" name="page" class="btn btn-outline-secondary order-4" value="<?php echo $s3 ?>"><?php echo $s3 ?></button>
                                <button id="page4" type="submit" name="page" class="btn btn-outline-secondary order-3" value="<?php echo $s4 ?>"><?php echo $s4 ?></button>
                                <button id="page5" type="submit" name="page" class="btn btn-outline-secondary order-2" value="<?php echo $s5 ?>"><?php echo $s5 ?></button>
                                <button id="page6" type="submit" name="page" class="btn btn-outline-secondary order-1" value="<?php echo $s6 ?>"><?php echo $s6 ?></button>
                                <!-- <button class="btn btn-outline-secondary order-1">10</button> -->
                                <button class="btn btn-secondary order-0 ml-1"> «</button>
                            </form>
                        </div>
                    </div>
              



            </div>


            <?php
                include("./include/sidebar.php");
            ?>







        </div>
</section>
<!-------------------------------------------- end body ----------------------------------------------------------------->



<!-------------------------------------------- footer ----------------------------------------------------------------->

<?php
include("./include/footer.php");
?>
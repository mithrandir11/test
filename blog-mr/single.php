<?php
    include("./include/header.php");

    if(isset($_GET['post'])){
        $post_id= $_GET['post'];
        $post = $db->prepare("SELECT * FROM posts WHERE id = :id");
        $post->execute(['id' => $post_id]);
        $post=$post->fetch();
    }


    if(isset($_POST['post_comment'])){
        if(trim($_POST['name']) !="" || trim($_POST['comment']) != "" || trim($_POST['email']) != ""){
                $name = $_POST['name'];
                $comment = $_POST['comment'];
                $email = $_POST['email'];
                $comment_insert = $db->prepare("INSERT INTO comments (name , comment , post_id ,email) VALUES (:name , :comment , :post_id , :email) ");
                $comment_insert->execute(['name' => $name , 'comment' => $comment , 'post_id' => $post_id , 'email' => $email]);
              
                header("Location:single.php?post=$post_id");
                exit();

                
        } else {

        }

        
    }

  
?>

<section>
    <div class="container-fluid">
        <div class="row mt-5  ">
            <div class="col-md-8  col-xl-9 mt-5">

                

                <?php 
                    if($post){ 
                            $category_id=$post['category_id'];
                            $query_post_category="SELECT * FROM categories WHERE id=$category_id";
                            $post_category=$db->query($query_post_category)->fetch();

                            $post_id=$post['id'];
                            
                            $comments = $db->prepare("SELECT * FROM comments WHERE post_id=:id AND status='1' ");
                            $comments->execute(['id' => $post_id]);

                        ?>

                                            <div class="row  ">


                                                <div class="col">
                                                    <div class="card mt-3  mx-auto shadow border-0">
                                                        <img src="./upload/post/<?php echo $post['image'] ?>" class="card-img-top" alt="">
                                                        <div class="card-body">
                                                            <h1 class="card-header d-flex text-right justify-content-between">
                                                            <?php echo $post['title'] ?>
                                                            <span class="badge badge-secondary mt-1"><?php echo $post_category['title'] ?></span>
                                                            </h1>
                                                            
                                                            <script>
                                                                $(document).ready(function() {
                                                                                                                
                                                                // $("p").addClass('text-right');
                                                                $("p").addClass('text-justify');
                                                                                                                
                                                                });
                                                            </script>

                                                            <p id="p-body" class="card-text   px-2 line" style="line-height: 2rem; font-size: 1rem !important;"><?php echo $post['body'] ; ?></p>

                                                          
                                                           
                                                            <p class="mt-1 p-0 mb-1 text-secondary ml-3" style="font-size: 0.8rem;">نویسنده: <?php echo $post['author'] ?></p>
                                                            


                                                            <form class=" border p-3 mt-4" method="POST" >
                                                                    <div class="row">
                                                                    <div class="col-6 form-group text-right">
                                                                            <label class="mr-2" for="name">نام</label>
                                                                            <input required type="text" class="form-control" name="name">
                                                                        </div>

                                                                        <div class="col-6 form-group text-right">
                                                                            <label class="mr-2" for="email">ایمیل</label>
                                                                            <input required type="email" class="form-control" name="email">
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group text-right">
                                                                        <label for="comment">دیدگاه :</label>
                                                                        <textarea required class="form-control" name="comment"  ></textarea>
                                                                    </div>

                                                                        <div class="row justify-content-start">
                                                                            <button class="btn btn-dark mr-3" name="post_comment" type="submit">فرستادن دیدگاه</button>
                                                                        </div>
                                                             


                                                            </form>




                                                            <script>
                                                                $(document).ready(function () {

                                                                    $("#comment").hide();

                                                                    $("#btn-comment").click(function (e) {
                                                                        $("#comment").show(1500); 
                                                                      
                                                                        
                                                                    });
                                                                   
                                                                });
                                                            </script> 

                                                            <div class="row justify-content-start mr-2 mt-3">
                                                            <p id="btn-comment" class="text-primary" style="cursor: pointer;">نمایش دیدگاه ها:</p>
                                                            </div>
                                                           
                                                        
                                                            <div id="comment" class="row border mt-5 p-2 mx-2 ">
                                                                   <p class="mt-3">تعداد کامنت: (<?php echo $comments->rowCount() ?>)</p>
                                                                   <?php
                                                                    if($comments->rowCount() > 0){
                                                                        foreach($comments as $comment){
                                                                            ?>
                                                                            <div class="col-12">
                                                                                <div class="card bg-light mt-2">
                                                                                    <div class="card-body ">
                                                                                        <h6 class="card-title text-right mt-2"><?php echo $comment['name']." :" ?></h4>
                                                                                        <p class="card-text text-right"><?php echo $comment['comment'] ?></p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    
                                                            </div> 







                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                           
                                            </div>



                        <?php
                    } else {
                        ?>

                        <div class="alert alert-danger">یافت نشد</div>

                        <?php
                    }
                  ?>      
                


                   




              




        




            </div>


            <?php
                include("./include/sidebar.php");
            ?>







        </div>
</section>


<?php
include("./include/footer.php");
?>
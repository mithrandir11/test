<?php
    include("./include/Aheader.php");


    if(isset($_GET['entity']) &&  isset($_GET['action']) && isset($_GET['id']) ){   
        $entity =$_GET['entity'];
        $action =$_GET['action'];
        $id = $_GET['id'];

        if($action == "delete"){

            if($entity == "post"){
                $query=$db->prepare("DELETE FROM posts WHERE id = :id");
            }
            elseif($entity == "category"){
                $query=$db->prepare("DELETE FROM categories WHERE id = :id");
            } else {
                $query=$db->prepare("DELETE FROM comments WHERE id = :id");
            }

            $query->execute(['id' => $id]);


        } else {  //approve
            $query = $db->prepare("UPDATE comments SET status='1' WHERE id = :id");
            $query->execute(['id' => $id]);
        }
    }




    $query_posts="SELECT * FROM posts ORDER BY id DESC";
    $posts = $db->query($query_posts);

    $query_comment= "SELECT * FROM comments WHERE status='0' ORDER BY id DESC";
    $comments = $db->query($query_comment);

    $query_categories= "SELECT * FROM categories ";
    $categories = $db->query($query_categories);

    
?>






<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


                <h4>مقالات اخیر</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm border">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th class="w-25">تنظیمات</th>
                                </tr>
                            </thead>

                            <tbody>
                    <?php
                            if($posts->rowCount() > 0){
                            foreach($posts as $post){
                                ?>
                                <tr>
                                    <td> <?php echo $post['id'] ?></td>
                                    <td> <?php echo $post['title'] ?></td>
                                    <td> <?php echo $post['author'] ?></td>

                                    <td>
                                        <a href="edit_post.php?id=<?php echo $post['id'] ?>" class="btn-block btn btn-info">ویرایش</a>
                                        <a href="Aindex.php?entity=post&action=delete&id=<?php echo $post['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>





                
                    <h5 class="mt-5">کامنت های اخیر</h5>
                    <div class="table-responsive">
                            <table class="table table-striped table-sm border ">
                                <thead style="overflow: hidden !important;">
                                    <tr id="comment-head" class="bg-secondary " >
                                        <!-- <th  >#</th> -->
                                        <th>نام</th>
                                        <th >کامنت</th>
                                        <th >تنظیمات</th>
                                    </tr>
                                </thead>

                                <tbody >
                                <?php
                                    if($comments->rowCount() > 0){
                                        foreach($comments as $comment){
                                            ?>
                                            <tr >
                                                <!-- <td > <?php echo $comment['id'] ?></td> -->
                                                <td > <?php echo substr($comment['name'],0,10)  ?></td>
                                                <td > <?php echo substr($comment['comment'],0,200) ?></td>


                                                        <td class="border" style="height: 100px !important;">
                                                                <a href="Aindex.php?entity=comment&action=approve&id=<?php echo $comment['id'] ?>" class="btn-block btn btn-success">تایید</a>
                                                                <a href="Aindex.php?entity=comment&action=delete&id=<?php echo $comment['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
                                                        </td>
                                    
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <script>
                                            $(document).ready(function () {
                                                $("#comment-head").hide();
                                            });
                                        </script>

                                        <div class="col ">
                                            <div class="alert alert-danger">کامنتی وجود ندارد یا همه کامنت ها تعیین وضعیت شده اند!</div>
                                        </div>
                                        
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                    </div>



                






                    <h4 class="mt-5">دسته بندی</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm border">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="w-25">تنظیمات</th>
                                </tr>
                            </thead>

                            <tbody>
                    <?php
                            if($categories->rowCount() > 0){
                            foreach($categories as $category){
                                ?>
                                <tr>
                                    <td> <?php echo $category['id'] ?></td>
                                    <td> <?php echo $category['title'] ?></td>
                                    

                                    <td>
                                        <a href="edit_category.php?id=<?php echo $category['id'] ?>" class="btn-block btn btn-primary">ویرایش</a>
                                        <a href="Aindex.php?entity=category&action=delete&id=<?php echo $category['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="alert alert-danger text-right" role="alert">
                                    دسته بندی ای یافت نشد!
                                </div>
                                <?php
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>











    
            </div>


        </div>
    </div>
</section>



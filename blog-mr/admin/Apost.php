<?php
    include("./include/Aheader.php");

    $query_posts="SELECT * FROM posts ORDER BY id DESC";
    $posts = $db->query($query_posts);

    if(isset($_GET['action']) && isset($_GET['id']) ){   
        $id = $_GET['id'];

        $query=$db->prepare("DELETE FROM posts WHERE id = :id");
        $query->execute(['id' => $id]);

        header("Location:Apost.php");
        exit();
        
    }

?>




<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


               <div class="row justify-content-between px-4">
               <h4>مقالات اخیر</h4>
                <a href="new_post.php" class="btn btn-primary">+ ایجاد پست</a>
               </div>

                    <div class="table-responsive mt-4">
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
                                        <a href="Apost.php?entity=post&action=delete&id=<?php echo $post['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>


            </div>


        </div>
    </div>
</section>
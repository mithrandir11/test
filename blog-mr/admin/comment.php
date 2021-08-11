<?php
    include("./include/Aheader.php");

    $query_comment= "SELECT * FROM comments  ORDER BY id DESC";
    $comments = $db->query($query_comment);


    if( isset($_GET['action']) && isset($_GET['id']) ){   
      
        $action =$_GET['action'];
        $id = $_GET['id'];

        if($action == "delete"){

            $query=$db->prepare("DELETE FROM comments WHERE id = :id");
            $query->execute(['id' => $id]);

            ?>

            <!-- <script>
                $(document).ready(function () {
                    alert("حذف گردید")
                });
            </script> -->

            <?php

            


        } else {  //approve
            $query = $db->prepare("UPDATE comments SET status='1' WHERE id = :id");
            $query->execute(['id' => $id]);
            ?>
             <!-- <script>
                $(document).ready(function () {
                    $(".btn-outline-info").addClass('active')
                });
            </script> -->
            <?php
        }
    }

?>




<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


           


            <div class="row justify-content-between px-0">
            <h5 class="mt-2 mr-3">کامنت های اخیر</h5>
               
            </div>

               <div class="table-responsive mt-4">
                            <table class="table table-striped table-sm  ">
                                <thead>
                                    <tr id="comment-head" class="bg-secondary">
                                        <!-- <th  >#</th> -->
                                        <th >نام</th>
                                        <th >کامنت</th>
                                        <th class="w-25" >تنظیمات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                    if($comments->rowCount() > 0){
                                        foreach($comments as $comment){
                                            ?>
                                            <tr >
                                                <!-- <td> <?php echo $comment['id'] ?></td> -->
                                                <!-- <td> <?php echo $comment['name'] ?></td> -->
                                                <td > <?php echo substr($comment['name'],0,8)  ?></td>
                                                
                                                <td > <?php echo substr($comment['comment'],0,200) ?></td>


                                                        <td >
                                                        <?php
                                                            if($comment['status']){
                                                                ?>
                                                                <a href="" class="btn-block btn btn-success active">تایید شده</a>

                                                                <?php

                                                            } else {
                                                                ?>
                                                                <a href="comment.php?action=approve&id=<?php echo $comment['id'] ?>" class="btn-block btn btn-outline-info">در انتظار تایید</a>
                                                             <?php
                                                            }
                                                         ?>
                                                               
                                                                <a href="comment.php?action=delete&id=<?php echo $comment['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
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



                   

            </div>


        </div>
    </div>
</section>
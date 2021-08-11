<?php
    include("./include/Aheader.php");

    $query_categories= "SELECT * FROM categories ";
    $categories = $db->query($query_categories);

    if( isset($_GET['action']) && isset($_GET['id']) ){   
        $id = $_GET['id'];

        $query=$db->prepare("DELETE  FROM categories WHERE id = :id");
        $query->execute(['id' => $id]);
        header("Location:category.php");

    }






    ?>





    
<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


                    
                    



            <div class="row justify-content-between px-4">
               <h4>دسته بندی</h4>
                <a href="new_category.php" class="btn btn-info">+ ایجاد دسته</a>
               </div>



                    <div class="table-responsive mt-4">
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
                                        <a href="category.php?action=delete&id=<?php echo $category['id'] ?>" class="btn-block btn btn-outline-danger">حذف</a>
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
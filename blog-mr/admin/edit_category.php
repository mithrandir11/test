<?php
    include("./include/Aheader.php");


    if($_GET['id']){

        $category_id = $_GET['id'];

        $category=$db->prepare("SELECT * FROM categories WHERE id = :id");
        $category->execute(['id' => $category_id]);
        $category = $category->fetch();
    }

    if(isset($_POST['edit_category'])){
        if(trim($_POST['title'] != "")){
                $title=$_POST['title'];

                $category_update=$db->prepare("UPDATE categories SET title = :title WHERE id = :id");
                $category_update->execute(['title' => $title , 'id' => $category_id]);

                header("Location:category.php");

        } else {

        }
    }

    ?>


<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


            <h4 class="mt-5">دسته بندی</h4>
                   
              <form method="POST">
                <div class="form-group mt-5">
                    <label for="category">عنوان :</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $category['title'] ?>">
                </div>
                <button type="submit" name="edit_category" class="btn btn-primary mb-3">ویرایش</button>
              </form>



            </div>


        </div>
    </div>
</section>
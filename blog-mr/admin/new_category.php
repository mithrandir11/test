<?php
    include("./include/Aheader.php");


    

    if(isset($_POST['add_category'])){
        if(trim($_POST['title'] != "")){
                $title=$_POST['title'];

                $category_insert=$db->prepare("INSERT INTO categories (title) VALUE  (:title) ");
                $category_insert->execute(['title' => $title ]);

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


            <h4 class="mt-5">ایجاد دسته  </h4>
                   
              <form method="POST">
                <div class="form-group mt-5">
                    <label for="category">عنوان :</label>
                    <input type="text" class="form-control" name="title" >
                </div>
                <button type="submit" name="add_category" class="btn btn-primary mb-3">ایجاد</button>
              </form>



            </div>


        </div>
    </div>
</section>
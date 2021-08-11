<?php
    include("./include/Aheader.php");

    $query_categories="SELECT * FROM categories";
    $categories = $db->query($query_categories);

    
    
    if(isset($_POST['add_post'])){
        if (trim($_POST['title']) != "" && trim($_POST['author']) != "" && trim($_POST['category_id']) != "" && trim($_POST['body']) != "" && trim($_POST['prebody']) != "" && trim($_FILES['image']['name']) != "" ){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $category_id = $_POST['category_id'];
            $body = $_POST['body'];
            $prebody = $_POST['prebody'];
            $postactive=$_POST['slider'] ;

            $name_image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, "../upload/post/$name_image");
                

            $post_insert = $db->prepare("INSERT INTO posts (title, author, category_id, body, prebody, postactive, image) VALUES (:title , :author , :category_id, :body, :prebody, :postactive , :image)");
            $post_insert->execute(['title' => $title, 'author' => $author, 'category_id' => $category_id, 'body' => $body, 'prebody' => $prebody , 'postactive' => $postactive , 'image' => $name_image]);
            

            

            ?> 
            <script>
                $(document).ready(function () {
                    alert("پست با موفقیت ایجاد شد")
                });
            </script>
            <?php
            header("Location:Apost.php");
            exit();

        } else {
           
            ?>
              <script>
                  $(document).ready(function () {
                      alert("همه فیلد ها باید پر شوند")
                  });
              </script>
              <?php

                
        }
    }
    

?>


<section>
    <div class="container-fluid">
        <div class="row ">

<?php include("./include/Asidebar.php") ?>

            <div role="main" class="col-9 col-sm-8  border text-right mt-3 pt-3">


               <form method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="name">عنوان :</label>
                       <input type="text" class="form-control" name="title" id="title">
                       <!-- <small></small> -->
                   </div>

                   <div class="form-group ">
                       <label class="mt-3" for="author">نویسنده :</label>
                       <input type="text" class="form-control" name="author" id="author">
                       <!-- <small></small> -->
                   </div>

                   <div class="form-group">
                       <label class="mt-3" for="category">دسته بندی :</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php
                                if($categories->rowCount() > 0 ){
                                    foreach($categories as $category){
                                        ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                                        <?php
                                    }
                                } 
                            ?>
                        </select>
                       
                   </div>


                   <div class="form-group">
                       <label class="mt-3" for="slider">اسلایدر اکتیو</label>
                        <select class="form-control" name="slider" id="slider">
                            
                            <option value="0" selected>غیر اکتیو</option>
                            <option value="1">اکتیو</option>
                               
                        </select>
                       
                   </div>





                   <div class="form-group">
                       <label class="mt-3" for="body-h">متن مقاله :</label>
                       <textarea  name="body" id="body"  rows="3" class="ckeditor"></textarea>
                       <!-- <div id="body" ></div> -->
                   </div>

                   <div class="form-group">
                       <label class="mt-3" for="prebody">پیش نمایش متن مقاله :</label>
                       <textarea  name="prebody" id="prebody"  rows="3" ></textarea>
                       <!-- <div id="body" ></div> -->
                   </div>



                   <div class="form-group">
                       <label class="mt-3" for="img"> تصویر :</label>
                       <input type="file" class="form-control" name="image" id="image" >
                       <!-- <small></small> -->
                   </div>

                  <div class="row justify-content-end">
                    <button type="submit" name="add_post" class="btn btn-primary mt-3 mb-5 ml-4">ایجاد پست</button>

                  </div>


               </form>



                 

            </div>


        </div>
    </div>
</section>


<script src="../ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('body');
</script>

</body>





</html>
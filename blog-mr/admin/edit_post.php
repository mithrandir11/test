<?php
    include("./include/Aheader.php");
    $query_post_active = "SELECT * FROM posts";
    $posts_active = $db->query($query_post_active);

    if(isset($_GET['id'])){
        $post_id=$_GET['id'];

        $post=$db->prepare("SELECT * FROM posts WHERE id = :id");
        $post->execute(['id' => $post_id]);
        $post=$post->fetch();

        $query_categories= "SELECT * FROM categories";
        $categories=$db->query($query_categories);
    }




     
    if(isset($_POST['edit_post'])){
        if (trim($_POST['title']) != "" && trim($_POST['author']) != "" && trim($_POST['category_id']) != "" && trim($_POST['body']) != "" && trim($_POST['prebody']) != "" ){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $category_id = $_POST['category_id'];
            $body = $_POST['body'];
            $prebody = $_POST['prebody'];
            $postactive=$_POST['slider'] ;


            if(trim($_FILES['image']['name']) != ""){
                
                $name_image = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp_name, "../upload/post/$name_image");
                    
    
                $post_update = $db->prepare("UPDATE  posts SET  title=:title , author=:author , category_id=:category_id , postactive=:postactive , body=:body , prebody=:prebody , image=:image WHERE id = :id");
                $post_update->execute(['title' => $title, 'author' => $author, 'category_id' => $category_id, 'postactive' => $postactive , 'body' => $body, 'prebody' => $prebody , 'image' => $name_image , 'id' => $post_id]);
                
                ?> 
                <script>
                    $(document).ready(function () {
                        alert("پست با موفقیت ویرایش شد")
                    });
                </script>
                <?php
                header("Location:Apost.php");
                exit();

            } else {
                $post_update = $db->prepare("UPDATE  posts SET  title=:title , author=:author , category_id=:category_id , postactive=:postactive  , body=:body ,prebody=:prebody WHERE id= :id");
                $post_update->execute(['title' => $title, 'author' => $author, 'category_id' => $category_id, 'postactive' => $postactive , 'body' => $body, 'prebody' => $prebody, 'id' => $post_id]);
                ?> 
                <script>
                    $(document).ready(function () {
                        alert("پست با موفقیت ویرایش شد")
                    });
                </script>
                <?php
                header("Location:Apost.php");
                exit();
            }



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
                       <input type="text" value="<?php echo $post['title'] ?>" class="form-control" name="title" id="title">
                       <!-- <small></small> -->
                   </div>

                   <div class="form-group ">
                       <label class="mt-3" for="author">نویسنده :</label>
                       <input type="text"  class="form-control" name="author" id="author" value="<?php echo $post['author'] ?>" >
                       <!-- <small></small> -->
                   </div>

                   <div class="form-group">
                       <label class="mt-3" for="category">دسته بندی :</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php
                                if($categories->rowCount() > 0 ){
                                    foreach($categories as $category){
                                        ?>
                                        <option value="<?php echo $category['id'] ?>" <?php echo($category['id'] == $post['category_id']) ? "selected" : "" ?> > <?php echo $category['title'] ?> </option>
                                        <?php
                                    }
                                } 
                            ?>
                        </select>
                   </div>


                   <div class="form-group">
                       <label class="mt-3" for="slider">اسلایدر اکتیو</label>
                        <select class="form-control" name="slider" id="slider">
                            <option value="1" <?php echo($post['postactive'] == 1) ? "selected" : "" ?>>اکتیو</option>
                            <option value="0" <?php echo($post['postactive'] == 0) ? "selected" : "" ?>>غیر اکتیو</option>
                        </select>
                   </div>



                   <div class="form-group">
                       <label class="mt-3" for="body-h">متن مقاله :</label>
                       <textarea  name="body" id="body"  rows="3" class="ckeditor" >
                            <?php echo $post['body'] ?>
                       </textarea>
                       <!-- <div id="body" ></div> -->
                   </div>

                   <div class="form-group">
                       <label class="mt-3" for="prebody">متن مقاله :</label>
                       <textarea  name="prebody" id="prebody"  rows="3"  >
                            <?php echo $post['prebody'] ?>
                       </textarea>
                       <!-- <div id="body" ></div> -->
                   </div>



                   <img class="img-fluid" src="../upload/post/<?php echo $post['image'] ?>" alt="">
                   <div class="form-group">
                       <label class="mt-3" for="img"> تصویر :</label>
                       <input type="file" class="form-control" name="image" id="image">
                       <!-- <small></small> -->
                   </div>

                  <div class="row justify-content-end">
                    <button type="submit" name="edit_post" class="btn btn-primary mt-3 mb-5 ml-4">ویرایش پست</button>

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
<?php
$query_categories = "SELECT * FROM categories";

$categories = $db->query($query_categories);

?>





<div class="col-md-4  col-xl-3 mt-5">
<ul class="list-group mt-3 mx-2 shadow">
    <li id="dastebandi-header" class="nav-link bg-secondary text-white text-right text-decoration-none" style="border-top-left-radius: 0.25rem;border-top-right-radius: 0.25rem;" > دسته بندی ها  </li>
        <?php
            if($categories->rowCount() > 0){
                foreach($categories as $category){
        ?>
                        <a href="index.php?category=<?php echo $category['id'] ?>" class="list-group-item text-right text-secondary text-decoration-none">
                            <?php echo $category['title'] ?>
                        </a>
              <?php          
                }
            }
              ?>

    </ul>





        <div class="card-body">
 

            <?php
                if(isset($_POST['subscribe'])){
                    if(trim($_POST['name']) != "" && trim($_POST['email']) != ""){
                        $name = $_POST['name'];
                        $email= $_POST['email'];
                        
                        $subscribe_insert = $db->prepare("INSERT INTO subscribers (name, email) VALUES (:name , :email)");
                        $subscribe_insert->execute(['name' => $name, 'email' => $email]);
                    } 
                }
             ?>
            
        <form method="POST" >
            <div id="div-form" class="form-group mt-5 shadow card-group border p-3 rounded mx-2 bg-light">
                    <label class="mt-2 text-right " for="name" >نام کاربری</label>
                    <input required class="form-control " name="name" type="text" placeholder="نام کاربری خود را وارد کنید">

                    <label class="mt-4 text-right" for="email">ایمیل</label>
                    <input required class="form-control " name="email" type="email" id="email" placeholder="ایمیل را وارد کنید"> 
                    <button id="btn-form" class="btn btn-primary mt-4" type="submit" name="subscribe">ارسال</button>  
            </div>
           
            
        </form>
        </div>
       
            


</div>










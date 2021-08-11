<?php
include("./include/config.php");
include("./include/db.php");

$query = "SELECT * FROM categories";
$categories = $db->query($query);


$categories2 = $db->query($query);
?>



<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    

    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <link rel="stylesheet" href="./css/styles.css">

    <title>انیمه بازان</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/custom.js"></script>
    
   
 
    
    
</head>
<body>

<!-------------------------------------------- navbar ----------------------------------------------------------------->
<nav class="bg-my navbar-dark ">
    
    <div id="my-svg" style="  width: 100%; height: 15vh;" >
        <svg id="wave" style="transform:rotate(180deg) ; transition: 0.3s" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(0, 50.5, 96.052, 1)" offset="0%"></stop><stop stop-color="rgba(209.891, 4.222, 119.611, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,98L60,81.7C120,65,240,33,360,24.5C480,16,600,33,720,73.5C840,114,960,180,1080,187.8C1200,196,1320,147,1440,122.5C1560,98,1680,98,1800,130.7C1920,163,2040,229,2160,236.8C2280,245,2400,196,2520,155.2C2640,114,2760,82,2880,98C3000,114,3120,180,3240,179.7C3360,180,3480,114,3600,138.8C3720,163,3840,278,3960,326.7C4080,376,4200,359,4320,302.2C4440,245,4560,147,4680,155.2C4800,163,4920,278,5040,294C5160,310,5280,229,5400,187.8C5520,147,5640,147,5760,122.5C5880,98,6000,49,6120,81.7C6240,114,6360,229,6480,261.3C6600,294,6720,245,6840,253.2C6960,261,7080,327,7200,351.2C7320,376,7440,359,7560,343C7680,327,7800,310,7920,294C8040,278,8160,261,8280,269.5C8400,278,8520,310,8580,326.7L8640,343L8640,490L8580,490C8520,490,8400,490,8280,490C8160,490,8040,490,7920,490C7800,490,7680,490,7560,490C7440,490,7320,490,7200,490C7080,490,6960,490,6840,490C6720,490,6600,490,6480,490C6360,490,6240,490,6120,490C6000,490,5880,490,5760,490C5640,490,5520,490,5400,490C5280,490,5160,490,5040,490C4920,490,4800,490,4680,490C4560,490,4440,490,4320,490C4200,490,4080,490,3960,490C3840,490,3720,490,3600,490C3480,490,3360,490,3240,490C3120,490,3000,490,2880,490C2760,490,2640,490,2520,490C2400,490,2280,490,2160,490C2040,490,1920,490,1800,490C1680,490,1560,490,1440,490C1320,490,1200,490,1080,490C960,490,840,490,720,490C600,490,480,490,360,490C240,490,120,490,60,490L0,490Z"></path></svg>
    </div>

    
    
   <div class="row w-100">

        <div class="col-10 col-sm-8 ">
            <div class="navbar navbar-expand-sm  position-absolute px-0 py-4 align-items-baseline ">
                <div class="  p-1">
                    
                    <button  class="navbar-toggler order-2 p-1 mr-3 my-toggler-icon1"  >
                        <i class="bi bi-list" style="font-size: 1.5rem; color: white;"></i>
                    </button>
                   
                    <a href="index.php" class=" navbar-brand mr-3 order-2 m-0 ">انیمه بازان</a>
        
                </div>


                
                <div id="my-nav" class="d-none  d-sm-flex navbar-collapse  p-0 " >
                    <ul id="my-nav-list" class="col navbar-nav m-0 p-0  " >
                      

                    <?php
                    if ($categories->rowCount() > 0) {
                        foreach ($categories as $category) {
                            ?>
                            <li class="nav-item mr-1 <?php echo ( isset($_GET['category']) && $category['id'] == $_GET['category']) ? "active" : ""; ?> ">
                                <a class="nav-link text-light" href="index.php?category=<?php echo $category['id'] ?>"> <?php echo $category['title'] ?> </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                       
                    </ul>

                </div>




            </div>




            <div id="blue-nav" class="  p-0 m-0 position-fixed" >
                <div  class="flex-column   navbar-collapse  p-0 " >
                        <div class="row justify-content-start p-2 mt-2">
                           
                                <button  class="navbar-toggler order-2 p-1 mr-4 mt-2 my-toggler-icon2 "  >
                                <i class="bi bi-list" style="font-size: 2rem; color: white;"></i>
                                </button>
                   
                                <a href="index.php" class=" navbar-brand mr-3 order-2 mt-2 fc2">انیمه بازان</a>
                            
                        </div>

                        <ul  class="col flex-column  navbar-nav m-0 p-0  " >
                        

                        <?php
                        if ($categories2->rowCount() > 0) {
                            foreach ($categories2 as $category2) {
                                ?>
                                <li class="nav-item  <?php echo ( isset($_GET['category']) && $category2['id'] == $_GET['category']) ? "active" : ""; ?> ">
                                    <a class="nav-link text-light" href="index.php?category=<?php echo $category2['id'] ?>"> <?php echo $category2['title'] ?> </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                        
                        </ul>

                        <form action="search.php" method="get" class="input-group  p-0 ml-0 mt-4 px-3 fc2" >
                           
                            <div class="input-group-prepend order-2">
                                <button class="btn btn-outline-light p-1 my-show px-2" type="submit"   ">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <input  required name="search" class="form-control order-1 my-show" type="text" placeholder="جستجو..."  >


                        </form>
                   

                </div>
            </div>


        </div>



        
        <div class="col-3 col-sm-3 col-md-2 m-0 mr-5 mr-sm-2  px-0 mt-2 "  >
                      
                        <form action="search.php" method="get" class="input-group  p-0 ml-0 mt-4 d-none d-sm-flex " >
                            <input  required name="search" class="form-control order-2 my-show" type="text" placeholder="جستجو..."  >
                            <div class="input-group-append ">
                                <button class="btn btn-outline-light p-1 my-show " type="submit"   ">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>


                        </form>
                   

        </div>
        
   
    </div>

   



</nav>





<!-------------------------------------------- end navbar ----------------------------------------------------------------->



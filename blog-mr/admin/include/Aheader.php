<?php
session_start();
include("./include/Aconfig.php");
include("./include/Adb.php");

if(!isset( $_SESSION['email'])) {
    header("Location:signin.php");
    exit();
}

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
    <link rel="stylesheet" href=".admin/css/Astyles.css">

    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
</head>
<body>

<!-------------------------------------------- navbar ----------------------------------------------------------------->
<nav class="navbar bg-dark navbar-dark p-0 ">
    

        <div class="col-auto   py-2 bg-warning ">
            <div class="navbar navbar-expand-sm    px-0 py-0 my-0">
                <div class=" px-2  mx-auto">
                    
                    <a href="Aindex.php" class=" navbar-brand   m-0">MrRobot.com</a>
        
                </div>

                
            </div>

        </div>

        <div>
                    <a type="btn"  class="btn btn-outline-light ml-2 " href="logout.php">خروج</a>
                </div>


</nav>


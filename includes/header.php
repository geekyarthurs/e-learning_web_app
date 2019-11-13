<?php

session_start();
session_start();
if(!isset($_SESSION['classes'])){
  
    header("Location: index.php");
    die;
}else{


$adminPanel = "<li class = 'disabled text-secondary'>
                    <a href='#'>Representative Panel</a>
                </li>";


}


include 'core/init.php';



 ?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home | <?php echo $_SESSION['classes'] ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

     

     

    


    



</head>
<body>

  

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="js/ckeditor.js"></script>

    <script src="js/modernizr-2.6.2.min.js"></script>

    <script src="js/jquery-letterfx.min.js"></script>

  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js">

    <script src="js/image-slider.js"></script>

    <script src = "js/main.js"> </script>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Student Portal</h3>
            </div>

            <ul class="list-unstyled components">
                <div class = "sidebar-header font-weight-bold text-light text-center">Logged In | <a href="profile.php" class  = "btn btn-outline-light"> <?php echo strtoupper($_SESSION['username']); ?></a></div>
               

                <li class = "bg-primary active mt-3">
                    <a href="index.php">Home</a>
                </li>
                <?php echo $adminPanel; ?>
                <li>
                    <a href="routine.php">Routine</a>
                </li>

                <li>
                    <a href="notes.php">Notes</a>
                </li>
                <li>
                    <a href="feed.php">Question / Answer Feed</a>
                </li>
                <li>
                    <a href="#">Student Info</a>
                </li>
                <li>
                    <a href="chat.php">Chat Room</a>
                </li>

               <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">More..</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">About the Developers</a>
                        </li>
                        <li>
                            <a href="#">Report Bugs</a>
                        </li>


                    </ul>

                </li>
                <!-- <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>  -->

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="includes/logout.php" class="download">Logout</a>
                </li>
                
            </ul> 
        </nav>


        <!-- Page Content  -->
        <div id="content">

            <nav class="mb-3 navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>

                     
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->
                    
                   
                </div>
            </nav>



<?php
session_start();
include 'core/init.php';
session_start();

if(!isset($_SESSION['token'])){
$_SESSION['token'] = bin2hex(random_bytes(32));
}


if (isset($_SESSION['username'])){

  header("Location: home.php");
  die;
}

if(isset($_POST['login'])){


  if(isset($_POST['user']) && isset($_POST['pswd'])  ){


$user = $_POST['user'];
$password = $_POST['pswd'];
$token = $_POST['token'];

if ($token != $_SESSION['token'] ){
  die;
}else{
  unset($_SESSION['token']);
}



if ($User->login($user,$password) === false){

  echo "<script>alert('You are not allowed to login.')</script>";
}else {

  echo "<script>alert('Please wait 24hr before you are revalidated to login.')</script>";
}

}else{

  echo "<script>alert('Please fill up the form')</script>";

}


}

if(isset($_POST['signup'])){

  $email = strip_tags($_POST['email']);
  $user = strip_tags($_POST['user']);
  $pwd = strip_tags($_POST['pwd']);
  $class = strip_tags($_POST['class']);
  $section = strip_tags($_POST['section']);
  $college = strip_tags($_POST['college']);
  $stream = strip_tags($_POST['stream']);
  $screenName = strip_tags($_POST['screenName']);
  $token = strip_tags($_POST['token']);
  if ( $token != $_SESSION['token'] ){
    die;
  }
  $avatars = ["images/avatars/myAvatar1.png","images/avatars/myAvatar2.png","images/avatars/myAvatar3.png","images/avatars/myAvatar4.png","images/avatars/myAvatar5.png","images/avatars/myAvatar6.png"];

  $pickedAvatar = $avatars[array_rand($avatars)];




  $status = $User->signup($user,$pwd,$class,$section,$college,$email,$stream,$pickedAvatar,$screenName);

  if($status === true){

     echo "<script>alert('Congratulations, you are in ! Please wait 24hr before you are revalidated to login.')</script>";


  }else{

    echo "<script>alert('Can\'t register you right now. Please try with different username after 24hrs')</script>";

  }






}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="js/jquery-letterfx.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="js/jquery-letterfx.min.js"></script>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand ml-3 " href="#">Student Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hiddenData" aria-controls="hiddenData" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="hiddenData">
    <ul class="navbar-nav mr-auto mr-5 font-weight-bold">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="alert('Coming Soon...')">Notes and Solutions</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" onclick="alert('Coming Soon...')">Practice</a>
      </li>


    </ul>

    <ul class="ml-auto navbar-nav font-weight-bold mr-5">

      <li class="nav-item">
        <a class="nav-link" href="privacy.html">Privacy Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="terms-of-service.html">Terms of Services</a>
      </li>
      
    </ul>

    
  </div>
</nav> -->


  <div class="h1 text-light text-center tagline p-3">Student Hub</div>

  <div class="row mt-5 align-items-center d-flex justify-content-center">
  
  <div class="col-sm-12 col-md-2 m-3 mr-5">
  <div class="text-center h3 my-3 text-light font-weight-bold  d-md-block d-none">Login | Sign Up</div>
  <form class="form-inline-lg formed login-form" method="POST">
    
    <input type="text" class="form-control my-5" id="email" placeholder="Enter username" name="user" required>
   
    <input type="password" class="form-control my-5" id="pwd" placeholder="Enter password" name="pswd" required>
  
    
    
    <input type = "hidden" value = "<?php echo $_SESSION['token']; ?>" name = "token">


    <button type="submit" class="btn btn-primary" name = "login">Login</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Sign Up!
</button>
  </form>
</div>

<div class="col-sm-12 col-md-8 d-none d-md-block hidden-sm hidden-md ">
  

  <div class="card-deck mt-5">
  <div class="card mx-3">
    <img class="card-img-top" src="images/assets/card1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title button btn-dark btn">HSEB Notes | Under Construction </h5>
      <p class="card-text">Get your notes from the website as fast as possible to secure your chances on your study..</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card mx-3 login-card hover">
    <img class="card-img-top" src="images/assets/card2.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title button btn-dark btn">Notes | Grade 9 & 10</h5>
      <p class="card-text">Come on, lets grasp the fundamental concepts by the advanced notes provided from us to you in secondary level education.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

  <div class="card mx-3 login-card hover">
    <img class="card-img-top" src="images/assets/card3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title button btn-dark btn">Educational News | Under Construction</h5>
      <p class="card-text">Feel free to sign up or login and view your routines, notes and assignments if your college has necessary materials for us to provide you.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  
</div>
  
</div>


  <!-- --------------------------------------------------SGNUP ------------------------------------------------------------------ -->

  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-inline-lg formed signup-form" method="POST">
    
    <div class="input-group my-2">
      
          <input type="text" class="form-control " placeholder="Email.." name="email" required aria-label="email" aria-describedby="email">
    </div>

    <div class="input-group my-2">
      
          <input type="text" class="form-control " placeholder="Username.." name="user" required aria-label="Username" aria-describedby="username">
    </div>

    <div class="input-group my-2">
      
          <input type="text" class="form-control " name="screenName" placeholder="Full Name" required aria-label="screenName" aria-describedby="screenName">
    </div>

    <div class="input-group my-2">
     
          <input type="password" class="form-control" name="pwd" placeholder="Password.." required aria-labPassword" aria-describedby="Password">
    </div>

    <div class="input-group my-2">
      <div class="input-group-prepend">
       <span class="input-group-text" id="class">Class</span>
      </div>
          <select class="form-control " aria-label="class" aria-describedby="class" name = "class" required>
        <option>XI</option>
        <option>XII</option>
        
    </select> 
    </div>

    <div class="input-group my-2">
      

          <input type="text" class="form-control" name="section" aria-describedby="section" placeholder="Section.." required>
    </div>

    
      

    
    <div class="input-group my-2">
      <div class="input-group-prepend">
      <span class="input-group-text" id="college">College</span>
    </div>
    <select class="form-control " aria-label="College" aria-describedby="college" name = "college">
        <option>DAV</option>
        <option>Trinity</option>
        <option>Uniglobe</option>
        <option>KMC</option>
        <option>Bern Hardt</option>
    </select>  
</div>

<div class="input-group my-2">
      <div class="input-group-prepend">
      <span class="input-group-text" id="college">Stream</span>
    </div>
    <select class="form-control" aria-label="College" aria-describedby="college" name = "stream">
        <option>Science</option>
        <option>Management</option>
        
    </select>  
</div>

  
    
    <input type = "hidden" value = "<?php echo $_SESSION['token']; ?>" name = "token">



    <button type="submit" class="btn btn-primary btn-block" name = "signup">Sign Up !</button>
  </form>
      </div>
      <div class="modal-footer">
        
       &copy; Mahesh C. Regmi, 2018
        
      </div>
    </div>
  </div>
</div>

 
  </div>

  

  </div>
</div> <!-- container finish -->

<script src = "js/main.js"></script>

</body>
</html>

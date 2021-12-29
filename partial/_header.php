<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){

}
echo '  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Top Categary
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql="SELECT catagory_name, catagory_id FROM `catagories` LIMIT 5";
          $result=mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
        echo' <li><a class="dropdown-item" href="threadlist.php?catid='.$row['catagory_id'].'">'.$row['catagory_name'].'</a></li>';
          }
          
      echo  '  </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php" tabindex="-1" >Contact Us</a>
      </li>
    </ul>
   <!-- <div class="row mx-2">--> ';
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
        echo '<form class="d-flex mx-2" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
       <p class="text-light my-2 mx-2 ">'. $_SESSION['useremail'].' </p>
       <a href="partial/logout.php" class="btn  btn-outline-success">Logout</a>
      </form';
    }else{
       echo '
        <form class="d-flex mx-2">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
            <button class="btn btn-outline-success btn-small ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <button class="btn btn-outline-success btn-small mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
           ';
    }
  echo' <!--  </div>-->
  </div>
      </div>
      </nav>';

include 'partial/login.php';
include 'partial/signup.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now Login. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Your Email address already Exists. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your loggedin Successfully. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> You Login failed. Your credantial not match. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
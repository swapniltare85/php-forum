<?php
$showError="false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'db.php';
    $email=$_POST['signupemail'];
    $pass=$_POST['signuppassword'];
      $cpass=$_POST['signupcpassword'];

    // check whethwere email exits
    $existsql="select * from users where email='$email'";
    $result=mysqli_query($conn, $existsql);
    $numRow=mysqli_num_rows($result);
    if($numRow>0){
      $showError="username email alrady in use";
    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `email`, `password`, `date`, `sts`)
             VALUES ( '$email', '$hash', current_timestamp(), '0')";
             $result=mysqli_query($conn, $sql);
             if($result){
                $showAlert=true;
                  header('location:/~NewPhp/forum/index.php?signupsuccess=true');
                exit();
             }
         
        }else{
            $showError="password don't match";
           
        }
    }
    header ('location:/~NewPhp/forum/index.php?signupsuccess=false&error=$showError');


}

?>
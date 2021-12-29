<?php
$showError="false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'db.php';
    $email=$_POST['loginEmail'];
    $pass=$_POST['loginPassword'];

   

    $sql="select * from users where email='$email'";
    $result=mysqli_query($conn, $sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
            $row=mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                  session_start();
                  $_SESSION['loggedin']=true;
                  $_SESSION['sno']=$row['sno'];
                  $_SESSION['useremail']=$email;
                  header ('location:/~NewPhp/forum/index.php?loginsuccess=true');
                exit();
             }
             else{
                header ('location:/~NewPhp/forum/index.php?loginsuccess=false');
             }
            
           
        
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss - Coding forum</title>
</head>

<body>
    <?php
    include './partial/db.php';
  include './partial/_header.php';
  
?>
    <?php
            $tid=$_GET['thrdid'];
            $sql="SELECT * FROM `threads` WHERE thrd_id=$tid";
            $result=mysqli_query($conn, $sql);
      
            while($row= mysqli_fetch_assoc($result)){
               $thrdtitle=$row['thrd_title'];
                $desc=$row['thrd_desc'];
                $thrd_user_id=$row['thrd_user_id'];

                 //  show user
               $sql2="SELECT * FROM `users` where sno=$thrd_user_id";
               $result2=mysqli_query($conn, $sql2);
               $row2=mysqli_fetch_assoc($result2);
               $posted_by=$row2['email'];

            }
  ?>
  <?php
    $shwAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST')  {
        //insert records db
        $comment=$_POST['comment'];
        $comment=str_replace("<", "&lt;", $comment);
        $comment=str_replace(">", "&gt;", $comment);
        $sno=$_POST['sno'];
        if($comment==null){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error!</strong> please field the comment. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
        $sql="INSERT INTO `comments` (  `cmt_content`, `thrd_id`, `cmt_by`, `date`, `sts`) 
        VALUES (  '$comment', '$tid', ' $sno', current_timestamp(), '0')";
        $result=mysqli_query($conn, $sql);
      
        $shwAlert=true;
        if($shwAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You comment has been added. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }
    }
    
    ?>
  
    <div class="container my-3">

        <div class="jumbotron bg-light p-4">
            <h1 class="display-4"> <?php echo $thrdtitle; ?> Forum</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This Forum is for sharing knownledge each other.
                No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Do not PM users asking for help.
            </p>
            <p class="lead">
               <p >Posted by <b><?php echo  $posted_by; ?> </b></p>
            </p>
        </div>
    </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
       echo '<div class="container my-2">
        <h2> Post a Comment</h2>
        <form class="p-4" action="'. $_SERVER['REQUEST_URI'].'" method="post">
          
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Type Your Comment</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"></textarea>
                <input type="hidden"  name="sno" value="'.$_SESSION['sno'].'">
                </div>

            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
}
else{
     echo '<div class="container"> <h2> Post a Comment</h2>
     <p class="lead">You are not logged in. Please login to able to post comment.</p></div>';
}

    ?>
    <div class="container my-3">
        <h2>Discussions</h2>
         <?php
            $tid=$_GET['thrdid'];
            $sql="SELECT * FROM `comments` WHERE thrd_id=$tid ";
            $result=mysqli_query($conn, $sql);
            $noResult=true;
            while($row= mysqli_fetch_assoc($result)){
                $noResult=false;
                $thrdtitle=$row['cmt_id'];
               $content=$row['cmt_content'];
               $cmt_time=$row['date'];
               $thrd_user_id=$row['cmt_by'];

               //  show user
               $sql2="SELECT * FROM `users` where sno=$thrd_user_id";
               $result2=mysqli_query($conn, $sql2);
               $row2=mysqli_fetch_assoc($result2);
  
       echo '<div class="d-flex py-2">
            <div class="flex-shrink-0 center">
                <img src="./img/user.png" width="50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="fw-bold">Asked by: ' .$row2['email'].' <span class="float-end">'.$cmt_time.'</span></p>
                '.$content.'
            </div>
        </div>';
    }
    if($noResult){
        echo '<div class="bg-light p-4">
        <p class="display-5">No Comments Found</p><b> Be the first person to ask a question</b></div>';
    }
    ?> 
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <?php include './partial/_footer.php' ?>
</body>

</html>
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
            $cid=$_GET['catid'];
            $sql="SELECT * FROM `catagories` WHERE catagory_id=$cid";
            $result=mysqli_query($conn, $sql);
          
            while($row= mysqli_fetch_assoc($result)){
               
               $catname=$row['catagory_name'];
                $desc=$row['desc'];
            }
            
           
  ?>
    <?php
    $shwAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST')  {
        //insert records db
        $th_title=$_POST['title'];
        $th_title=str_replace("<", "&lt;", $th_title);
        $th_title=str_replace(">", "&gt;", $th_title);
        $th_desc=$_POST['desc'];
        $th_desc=str_replace("<", "&lt;", $th_desc);
        $th_desc=str_replace(">", "&gt;", $th_desc);
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` ( `thrd_title`, `thrd_desc`, `thrd_cat_id`, `thrd_user_id`, `date`, `sts`) 
        VALUES ( '$th_title', '$th_desc', '$cid', '$sno', current_timestamp(), '0')";
        $result=mysqli_query($conn, $sql);
        $shwAlert=true;
        if($shwAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You thread has been added. Please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    
    ?>
    <div class="container my-3">

        <div class="jumbotron bg-light p-4">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
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
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
       echo '<div class="container my-2">
            <h2> Start a Discussions</h2>
            <form class="p-4" action="' . $_SERVER["REQUEST_URI"].'" method="post">
                <div class="mb-3">
                <input type="hidden"  name="sno" value="'.$_SESSION['sno'].'">
                    <label for="title" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">keep Your title as short and crisp as possible</div>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Elaborate Your Problem</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    }
        else{
             echo '<div class="container"> <h2> Start a Discussions</h2>
             <p class="lead">You are not logged in. Please login to start a discussions</p></div>';
        }
    ?>
    
    <div class="container my-3">
        <h2>Browse Questions</h2>
        <?php
            $cid=$_GET['catid'];
            $sql="SELECT * FROM `threads` WHERE thrd_cat_id=$cid";
            $result=mysqli_query($conn, $sql);
            $noResult=true;
            while($row= mysqli_fetch_assoc($result)){
                $noResult=false;
                $tid=$row['thrd_id'];
               $thrdtitle=$row['thrd_title'];
                $thrddesc=$row['thrd_desc'];
                $thrd_time=$row['date'];
                $thrd_user_id=$row['thrd_user_id'];
            //  show user
                $sql2="SELECT * FROM `users` where sno=$thrd_user_id";
                $result2=mysqli_query($conn, $sql2);
                $row2=mysqli_fetch_assoc($result2);
               
  
       echo '<div class="d-flex py-2">
            <div class="flex-shrink-0 center">
                <img src="./img/user.png" width="50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="fw-bold">Asked by: ' .$row2['email'].' <span class="float-end">'.$thrd_time.'</span></p>
                <h3><a class="text-dark" href="thread.php?thrdid='.$tid.'"> '.$thrdtitle.' </a></h3>
                '.$thrddesc.'
            </div>
        </div>';
        }
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="bg-light p-4">
            <p class="display-5">No Threads Found</p><b> Be the first person to ask a question</b></div>';
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
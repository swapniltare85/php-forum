<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss - Contact Us</title>
</head>

<body>
    <?php
     include './partial/db.php';
  include './partial/_header.php';
?>

    <?php
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=="POST")  {
        //insert records db
       $cnt_name=$_POST['fname'];
        $cnt_email=$_POST['email'];
        $cnt_number=$_POST['number'];
        $cnt_desc=$_POST['desc'];
        if($cnt_name=="" && $cnt_number==null){
          echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
              <strong>Error!</strong> Please Enter Name & Number .
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else{
        $sql="INSERT INTO `contactus` ( `name`, `email`, `number`, `descp`, `date`, `sts`) VALUES ( '$cnt_name', '$cnt_email', '$cnt_number', '$cnt_desc', current_timestamp(), '0')";
         $result=mysqli_query($conn, $sql);

        
        if($result){
        echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Your Contact details Submited. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
           
         
      }
   
     else{
        echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
              <strong>Error!</strong> Your Contact details not Submited. 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        
     }
    }
    }
?>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Contact Us</h3>
                <form action="<?php $_SERVER["REQUEST_URI"]?>" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Mobile No.</label>
                        <input type="number" class="form-control" id="number" name="number" min="9">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Discription</label>
                        <textarea id="desc" name="desc" rows="5" cols="10" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="https://source.unsplash.com/500x350/?contact us,coding" class="w-100 my-4" alt="...">
            </div>
        </div>
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
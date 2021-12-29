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
   
<!-- search result -->
<div class="container my-3">
    <h2>Search Result for <em>" <?php echo $_GET['search'];?> "</em></h2>
    <?php
    $noresult=true;
       $query=$_GET["search"];
        $sql="SELECT * FROM `threads` where match(thrd_title, thrd_desc) against('$query')";
         $result=mysqli_query($conn, $sql);
  
        while($row= mysqli_fetch_assoc($result)){
           $thrdtitle=$row['thrd_title'];
            $desc=$row['thrd_desc'];
           $thrd_id=$row['thrd_id'];
           $noresult=false;
           $url="thread.php?thrdid=".$thrd_id;

           // search result
           echo '<div class="result">
                    <h3 ><a href="'.$url.'" class="text-dark">'. $thrdtitle.'</a></h3>
                    <p>'.$desc.'</p>
                </div>';
        }
       if($noresult){
       echo '<div class="container my-3">
                
                <div class="bg-light p-4">
                <p class="display-5">No Result Found</p>
                <p>Suggestions:
              <ul>
            <li> Make sure that all words are spelled correctly.</li>
            <li> Try different keywords.</li>
            <li> Try more general keywords.</li>
                </p>
                </ul></div> 
            </div>';
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
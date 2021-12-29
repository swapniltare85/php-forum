<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss -About Us</title>
</head>

<body>
    <?php
    include './partial/db.php';
  include './partial/_header.php';
?>
  <div class="container my-3">
      <h2 class="text-center">About Us</h2>
      <div class="row">
          <div class="col-md-6">
              <p class="lead">You will get quick response about your questions. Another good thing is that it is not specific to any particular language or technology.
                   You can ask anything related to computer science. Explore the tags to find existing topics. You will find answers for most of your question without asking it because most probably someone would already have asked it.</p>
                   <p class="lead"> So search already asked questions before asking your question. Plus there are also many forums for
               specific languages and technologies. So if you are looking for any particular language or technology, provide some more details about it.</p>
          
            </div>
          <div class="col-md-6"> <img src="https://source.unsplash.com/500x350/?computer,code" class="w-100" alt="..."></div>
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
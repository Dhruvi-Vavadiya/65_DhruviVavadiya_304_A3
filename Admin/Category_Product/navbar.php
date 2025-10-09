<?php 
   // session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <nav class="nav justify-content-center">
      <h1>
         <?php
//             if(isset($_SESSION['unm'])){
//    $_SESSION['unm'];
//    print_r($_SESSION());
// }
         ?>
      </h1>
     <a class="nav-link active" href="add.php">Add Category</a>
      <a class="nav-link active" href="list.php">Show Category</a>
        <a class="nav-link active" href="addproduct.php">Add Product</a>
        <a class="nav-link active" href="listproduct.php">Show Product</a>
     <a class="nav-link" href="../logout.php">Logout</a>

   </nav>
</body>
</html>
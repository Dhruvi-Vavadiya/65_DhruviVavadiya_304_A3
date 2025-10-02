<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include('navbar.php');
//     if(!isset($_SESSION['unm'])){
//    header("location:../Login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artists</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
    <form action="" method="post">
    <table  class="table table-borderless">
        <h1 align="center">Add Category </h1>
        <tr>
            <td>Category Name</td>
            <td>
                <input  type="text" class="form-control" name="cnm" required >
            </td>
        </tr>
        <tr>
            <td>Category Description</td>
            <td>
                <input  type="text" class="form-control" name="des" required >
            </td>
        </tr>
       
       
        <tr>
      
            <td><input type="submit" name="add" value="Add" class="btn btn-primary btn-block btn-lg"></td>
            
        </tr>
    </table>
    </form>
</center>
</div>
</div>
</body>
</html>
<?php

    if(isset($_REQUEST['add'])){
            $cnm=$_REQUEST['cnm'];
            $desc=$_REQUEST['des'];
             $q="insert into categories values (NULL,'$cnm','$desc')";
            // echo $q;
             if(mysqli_query($conn,$q)){
            
                header("location:list.php");
             }else {   
                die("Update Failed!!!".mysqli_error($conn));
             }
     }
    
   
?>

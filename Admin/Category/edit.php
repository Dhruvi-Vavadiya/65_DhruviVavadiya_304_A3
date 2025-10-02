<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include('navbar.php');

    if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
        $q="select * from categories where id='$cid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
    }else{
        header("location:list.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artists</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
    <form action="" method="post">
    <table  class="table table-borderless">
        <h1 align="center">Update Category </h1>
        <tr>
            <td>Category Name</td>
            <td>
                <input  type="text" class="form-control" name="cnm" required value="<?php echo $r[1];?>">
            </td>
        </tr>
        <tr>
            <td>Category Description</td>
            <td>
                <input  type="text" class="form-control" name="des" required value="<?php echo $r[2];?>">
            </td>
        </tr>
       
       
        <tr>
      
            <td><input type="submit" name="update" value="Update" class="btn btn-primary btn-block btn-lg"></td>
            
        </tr>
    </table>
    </form>
</center>
</div>
</div>
</body>
</html>
<?php

    if(isset($_REQUEST['update'])){
            $cnm=$_REQUEST['cnm'];
            $desc=$_REQUEST['des'];
             $q="update categories set name='$cnm',description='$desc' where id='$cid'";
            // echo $q;
             if(mysqli_query($conn,$q)){
            
                header("location:list.php");
             }else {   
                die("Update Failed!!!".mysqli_error($conn));
             }
     }
    
   
?>

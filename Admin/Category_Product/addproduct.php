<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include('navbar.php');
session_start();
if(!isset($_SESSION['unm'])){
   header("location:../Login.php");
}
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
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <h1 align="center">Add Product </h1>
                        <tr>
                            <td>Product Name</td>
                            <td>
                                <input type="text" class="form-control" name="pnm" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Size</td>
                            <td>
                                <select name="psize" class="form-control">
                                    <option selected disabled>---Select Size---</option>
                                    <?php 
                    $type=array('S','M','XL','XXL','L','XS','XXXL');
                    foreach($type as $t){
                       echo "<option value='$t'>$t</option>";
                    }
                echo "</select>";
                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td>
                                <input type="text" class="form-control" name="ppric" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Category Name</td>
                            <td>
                                <select name="cid" class="form-control">
                                        <option selected disabled>---Select Category---</option>
                                        <?php
                                                 $q="select * from categories order by name";
                                                $r=mysqli_query($conn,$q) or die();
                                                while($result=mysqli_fetch_array($r)){
                                                        echo "<option value='$result[0]'>$result[1]</option>";
                                            }
                                    ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Product image</td>
                            <td>
                                <input type="file" name="ppic" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="padd" value="Add" class="btn btn-primary btn-block btn-lg">
                            </td>
                        </tr>
                    </table>
                </form>
        </center>
    </div>
    </div>
</body>

</html>
<?php

    if(isset($_REQUEST['padd'])){
            $pnm=$_REQUEST['pnm'];
            $psize=$_REQUEST['psize'];
            $ppric=$_REQUEST['ppric'];
            $cid=$_REQUEST['cid'];

              $pic_name=$_FILES['ppic']['name'];
        $pic_loc=$_FILES['ppic']['tmp_name'];
        move_uploaded_file($pic_loc,"../uploads/".$pic_name);


             $q="insert into products values (NULL,'$pnm','$psize','$ppric','uploads/$pic_name','$cid')";
            // echo $q;
             if(mysqli_query($conn,$q)){
            
                header("location:listproduct.php");
             }else {   
                die("Update Failed!!!".mysqli_error($conn));
             }
     }
    
?>
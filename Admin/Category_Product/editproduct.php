<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include('navbar.php');
session_start();
if(!isset($_SESSION['unm'])){
   header("location:../Login.php");
}
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
        $q="select * from products where id='$pid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
    }else{
        header("location:listproduct.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
    <form action="" method="post" enctype="multipart/form-data">
    <table  class="table table-borderless">
        <h1 align="center">Update Products </h1>
        <tr>
            <td>Product Name</td>
            <td>
                <input  type="text" class="form-control" name="pnm" required value="<?php echo $r[1];?>">
            </td>
        </tr>
        <tr>
            <td>Product Size</td>
            <td>
            <select name="psize" class="form-control">
                <option selected disabled>---Select Type---</option>
                 <?php 
                   $type=array('S','M','XL','XXL','L','XS','XXXL');
                    foreach($type as $t){
                        echo "<option value='$t'";
                        if($t==$r[2]){
                            echo "selected";
                        } 
                        echo ">$t</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>
          <tr>
            <td>Product Price</td>
            <td>
                <input  type="text" class="form-control" name="ppric" required value="<?php echo $r[3];?>">
            </td>
        </tr>
        <tr>
            <td>Category Name</td>
            <td>
                <select name="cid" class="form-control">
                                    <option selected disabled>---Select Category---</option>
                                    <?php
                                        
                                        $q="select * from categories order by name";
                                        $res=mysqli_query($conn,$q) or die();
                                        while($r1=mysqli_fetch_array($res)){
                                            echo "<option value=$r1[0] ";
                                            if($r1[0]==$r[5]) echo "selected";
                                            echo ">$r1[1]</option>";
                                        }
                                        ?>
                                </select>
            </td>
        </tr>
          <tr>
            <td>Product image</td>
            <td>
                <img src="../<?php echo $r[4];?>"  width=70 height=70 class='rounded-circle'>
                 <input  type="file" name="ppic"  class="form-control"  value="<?php echo $r[4];?>">
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
           $pnm=$_REQUEST['pnm'];
            $psize=$_REQUEST['psize'];
            $ppric=$_REQUEST['ppric'];
            $cid=$_REQUEST['cid'];

            if(isset($_FILES['ppic'])){
                $pic_name=$_FILES['ppic']['name'];
                // echo "<script>alert($pic_name);</script>";
                $pic_loc=$_FILES['ppic']['tmp_name'];
                        //  echo "<script>alert($pic_loc);</script>";
                move_uploaded_file($pic_loc,"../uploads/".$pic_name);
                $picc = "uploads/".$pic_name;
                        //  echo "<script>alert($picc);</script>";
            }else{
                $picc=$r[4];
            }

             $q="update products set name='$pnm',size='$psize',price='$ppric',image='$picc',cid='$cid' where id='$pid'";
            // echo $q;
             if(mysqli_query($conn,$q)){
                header("location:listproduct.php");
             }else {   
                die("Update Failed!!!".mysqli_error($conn));
             }
     }
    
   
?>

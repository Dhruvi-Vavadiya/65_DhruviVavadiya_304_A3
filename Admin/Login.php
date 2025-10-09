<?php
session_start();
ob_start();
 include('./head_tag.php');
 include('./conn.php'); 
 
 if(isset($_SESSION['unm'])){
   header("location:Category_Product/list.php");
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="vh-50 mt-5">
        <div class="container-fluid mt-5">
            <div class="row d-flex justify-content-center align-items-center  h-100">


                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                    <form method="post">
                        <h2 class="text-center mb-4"> Login In</h2>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <div class="input-group mb-3">
                                <input type="text" name="unm" class="form-control form-control-lg"
                                    placeholder="UserName" value="<?php 
                               if(isset($_COOKIE['user'])){
                                $e=$_COOKIE['user'];
                                echo $e;}
                            ?>">
                               
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <div class="input-group mb-3"> 
                                <input type="password" name="pwd" class="form-control form-control-lg"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input  " type="checkbox" name="rme" />Remember me
                            </div>

                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg"
                                style="padding-left: 3rem; padding-right: 3rem;" value="Login">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php

    if(isset($_REQUEST['submit'])){
      $unm=$_REQUEST['unm'];
      $pwd=$_REQUEST['pwd'];
    
      if(empty($unm) || empty($pwd)){
        echo "<script>alert('Fill TextBox');</script>";
      }else{
            $q="select * from users where email='$unm' and password='$pwd'";
          $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
          $r=mysqli_fetch_array($res);
              if(mysqli_num_rows($res)>0){
                  $_SESSION['unm']= $r[1];
                       if(!empty($_REQUEST['rme'])){
                          setcookie("user",$unm,time() + 86400);
                          }                  
                  header("location:Category_Product/list.php");
                  
           }else{
            session_destroy();
            echo "<script>alert('unm and pwd mismatch!!!');</script>";
            header("location:Login.php");
           }
           
        }
      }
?>
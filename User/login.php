<?php
session_start();
include('includes/db.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$username' AND password='$password'");
    if(mysqli_num_rows($res)>0){
        $_SESSION['user']=$username;
        echo "<script>alert('Login Successful');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
<form method="post">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>

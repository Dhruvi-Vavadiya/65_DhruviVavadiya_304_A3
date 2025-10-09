<?php
session_start();
include('includes/db.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    // echo $captcha;
    $email = $username . "@gmail.com"; 

    if($captcha == $_SESSION['captcha_code']){
        mysqli_query($conn, "INSERT INTO users(id,name,email,password) VALUES(NULL,'$username','$email','$password')");
        echo "<script>alert('Registered Successfully!');</script>";
    } else {
        echo "<script>alert('Invalid CAPTCHA');</script>";
    }
}
?>
<form method="post">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <img src="captcha.php" alt="CAPTCHA"><br>
  Enter CAPTCHA: <input type="text" name="captcha" required><br>
  <button type="submit">Register</button>
</form>

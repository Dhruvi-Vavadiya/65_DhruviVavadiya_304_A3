

<?php
    ob_start();
    include("conn.php");
    $xml = simplexml_load_file("students.xml") or die("Error: Cannot create object");

    foreach($xml->student as $stu){
        $name = $stu->name;
        $email = $stu->email;
        $password = $stu->password;

        $q = "insert into users values (NULL,'$name','$email','$password')";
        if(mysqli_query($conn,$q)){
            echo "<div class='alert alert-success'>
  <strong>Success!  " . $stu->name ."</strong> Your Recored Inserted Successfully.
</div>";
        }else {   
            echo "<div class='alert alert-success'>
  <strong> " . $stu->name ." Your record not Insert Failed!!!</strong> ". mysqli_error($conn) ."
</div>";
            
        }
    }

    mysqli_close($conn);
    
   
?>

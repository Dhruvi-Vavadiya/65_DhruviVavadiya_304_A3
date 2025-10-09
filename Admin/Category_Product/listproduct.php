
<?php
ob_start();
    include('../head_tag.php'); 
    include('../conn.php');
    include('navbar.php');
    session_start();
if(!isset($_SESSION['unm'])){
   header("location:../Login.php");
}
    $q="select p.*,c.name from products as p,categories as c where p.cid=c.id order by p.id desc";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
                    <h1 class='text-center mt-5'>Product Details</h1>
                   
                    <table  class='table mt-5 table-bordered border border-dark'>";
           echo "<thead><tr> 
                <th>Id</th>
                <th>Name</th>
                <th>categoryName</th>
                <th>size</th>
                <th>price</th>
                <th>Image</th>
                 <th>Edit</th>
                <th>Delete</th>
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[6]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                        <td><img src='../$r[4]'  width=70 height=70 class='rounded-circle'></td>
                        <td><a href='editproduct.php?pid=$r[0]'style='text-decoration: none'>Edit</a></td>
                        <td>
                            <form  method='post'>
    <input type='hidden' name='delid' value='$r[0]'>
    <input type='submit' class='btn btn-danger' name='del' value='Delete' onclick=\"return confirm('Are you sure you want to delete this item?');\">
</form>
                        </td>
                        
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
    if(isset($_POST['del'])){
        $did=$_POST['delid'];
    //    echo "<script>alert($did);</script>";
        $q="delete from products where id='$did'";
        if(mysqli_query($conn,$q))
            header("location:listproduct.php");
        else    
            die("Deletion Failed!!!".mysqli_error($conn));
    }
?>



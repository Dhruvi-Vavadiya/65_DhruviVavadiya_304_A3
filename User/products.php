<?php
include('includes/db.php');

$cid = $_GET['category_id'] ?? 0;
$page = $_GET['page'] ?? 1;
$limit = 2;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM products WHERE cid=$cid LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

echo "<table border='1' cellpadding='5'>
<tr><th>Pic</th><th>Product Name</th><th>Price</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><img src='../Admin/{$row['image']}' width='80'></td>
            <td>{$row['name']}</td>
            <td>₹{$row['price']}</td>
          </tr>";
}
echo "</table>";

// pagination
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products WHERE cid=$cid"));
$total_pages = ceil($total / $limit);

for($i=1;$i<=$total_pages;$i++){
    echo "<a href='#' class='page-link' data-page='$i' data-cid='$cid'>$i</a> ";
}
?>
<script>
$('.page-link').click(function(){
    var cid = $(this).data('cid');
    var page = $(this).data('page');
    $.ajax({
        url: 'products.php',
        data: { category_id: cid, page: page },
        success: function(data){
            $('#product-area').html(data);
        }
    });
});
</script>

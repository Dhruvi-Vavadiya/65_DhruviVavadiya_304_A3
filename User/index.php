<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Categories</h2>
<table border="1" cellpadding="10">
  <tr><th>Categories</th><th>Pic</th><th>pname</th><th>price</th></tr>
  <tr>
    <td>
      <?php
        $res = mysqli_query($conn, "SELECT * FROM categories");
        while($row = mysqli_fetch_assoc($res)) {
          echo "<a href='#' class='cat-link' data-id='{$row['id']}'>{$row['name']}</a><br>";
        }
      ?>
    </td>
    <td colspan='3' id="product-area">Select a category to view products.</td>
  </tr>
</table>

<script>
$(document).on('click', '.cat-link', function() {
    var cid = $(this).data('id');
    $('#product-area').html('Loading...');
    $.ajax({
        url: 'products.php',
        type: 'GET',
        data: { category_id: cid },
        success: function(data){
            $('#product-area').html(data);
        }
    });
});
</script>

</body>
</html>

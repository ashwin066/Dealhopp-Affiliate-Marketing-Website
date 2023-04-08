<?php
$con = mysqli_connect("localhost", "root", "", "dealhopp");
$select_product ="Select * from `products` JOIN `category` JOIN `brands` WHERE products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY pinned DESC, DATE DESC";
include './functions/common_function.php';
?>

  <?php $i = 1; ?>

   <?php 
     get_products();
    
?>
</table>

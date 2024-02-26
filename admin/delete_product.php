<?php 
//secure
//session_start();
if(!isset ($_SESSION["username"]))
{
header ("location: ../user_area/login.php");
}
if($_SESSION['user_type']!=='admin'){
  header ("location: ../index.php");
}
//secure

if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    // delete query
    $delete_product="DELETE FROM `products` WHERE product_id=$delete_id";
    $result_query=mysqli_query($con,$delete_product);
    if($result_query){
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_product','_self')</script>";
    }
}


?>
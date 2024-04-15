  <?php
  
include ('../includes/connect.php');
//secure

if(!isset ($_SESSION["username"]))
{
header ("location: ../user_area/login.php");
}
if($_SESSION['user_type']!=='admin'){
  header ("location: ../index.php");
}
//secure

$product_id=$_GET['pin_id'];
$sql="select * from `products` where product_id=$product_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$product_id=$row['product_id'];
$pinned=$row['pinned'];

        echo $product_id;
       echo $pinned;

       if($pinned==1){
        $pin="update `products` set pinned='0' where product_id=$product_id";
        $result=mysqli_query($con,$pin);

       }
       if($pinned==0){
        $pin="update `products` set pinned='1' where product_id=$product_id";
        $result=mysqli_query($con,$pin);


       }

?>

  <?php 
 $result=mysqli_query($con,$pin);
 if($result){
  echo "<script>alert('success')</script>";
        echo "<script>window.open('./index.php?view_product','_self')</script>";
 }
 else{
   die(mysqli_error($con));
 }
 ?>
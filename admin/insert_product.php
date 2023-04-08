<?php
 //secure

// if(!isset ($_SESSION["username"]))
// {
// header ("location: ../user_area/login.php");
// }
// if($_SESSION['user_type']!=='admin'){
//   header ("location: ../index.php");
// }
//secure
 //session_start();
if(isset($_POST['insert_product'])){
  global $con;
  include '../includes/connect.php';

  $product_img3='';
  $product_posted_user='';
  $product_title=$_POST['product_title'];
  $product_description=$_POST['product_description'];
  $product_old_price=$_POST['product_old_price'];
  $product_price=$_POST['product_price'];
  //if empty
  if(isset($_POST['product_keywords'])){
    $product_keywords=$_POST['product_keywords'];
  }else{
    $product_keywords='';
  }
  if(isset($_POST['product_img2'])){
    $product_img2=$_POST['product_img2'];
  }else{
    $product_img2='';
  }
  if(isset($_POST['product_img3'])){
    $product_img3=$_POST['product_img3'];
  }else{
    $product_img3='';
  }
    //if empty
  $category_title=$_POST['product_category'];
  $brand_title=$_POST['product_brand'];
  $product_img1=$_POST['product_img1'];
  $product_link=$_POST['product_link'];
  $product_posted_user=$_SESSION["user_id"];
  $product_status='true';

//Select data from db
$select_query="Select * from `products` where product_title = '$product_title'";
$result_select=mysqli_query($con,$select_query);
$number=mysqli_num_rows($result_select);


if($number>0){
  echo "<script>alert('Category already exists')</script>";
 }else{
$insert_query="insert into `products` (product_title, product_description,
product_keywords, product_category, product_brand, product_img1, product_img2, product_img3,product_old_price,
product_price,product_link, date, status,posted_user_id) values ('$product_title','$product_description','$product_keywords','$category_title','$brand_title','$product_img1','$product_img2','$product_img3','$product_old_price','$product_price','$product_link',NOW(),'$product_status','  $product_posted_user')";
$result=mysqli_query($con,$insert_query);
if($result){
  echo "<script>alert('Posted successfully')</script>";
  echo "<script>window.open('./index.php?view_product','_self')</script>";
}
else{
  die(mysqli_error($con));
}
}}
  ?>
<div class="container a_category-item w-100 bg-light p-4">
      <h2 class="text-center">Add Product</h2>
  <form method="post" enctype='multipart/form-data'>
  
  <div class="form-group">
    <label for="product_title">Product Title</label>
    <input type="text" class="border-secondary a_category-item px-2" name="product_title" id="product_title" placeholder="Product Title">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="text-danger">Old Price</label>
      <input type="text" class="a_category-item px-2 border-danger" id="product_old_price" name="product_old_price"  placeholder="Old Price">
    </div>
    <div class="form-group col-md-6">
      <label class="text-success">New Price</label>
      <input type="text" class="a_category-item px-2 border-success" id="product_price" name="product_price" placeholder="New Price">
    </div>
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea type="textarea" class="w-100 a_category-item px-2 border-secondary" id="product_description" name="product_description" placeholder="Description..."></textarea>
  </div>
  <div class="row">
  <!--keywords -->
<div class="form-group col-md-6">
<label for="product_keywords" class="form-label "> Product
Keywords</label>
<input type="text" name="product_keywords"
id="product_keywords" class="border-secondary a_category-item px-2"
placeholder="Enter product keywords" autocomplete="on">
</div>

<div class="form-group col-md-6">
<label for="product_link " class="form-label"> Product
Link</label>
<input type="text" name="product_link"
id="product_link" class="border-secondary a_category-item px-2"
placeholder="Enter product link" autocomplete="off"
required="required">
</div>

</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Select Category</label>
      <select id="category_title" name="product_category" class="a_category-item px-2 border-secondary">
      
        <?php
                    $select_category ="Select * from `category` ";
                    $result_category =mysqli_query ($con,$select_category) ;
                    while($row_data=mysqli_fetch_assoc($result_category )){
                      $category_title=$row_data['category_title'];
                      $category_id=$row_data['category_id'];
                      $category_logo=$row_data['category_logo'];
                      echo  "<option value='$category_id'>$category_title</option>";  }
                      ?>

      
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Select Brand(Store)</label>
      <select id="brand_title" name="product_brand" class="a_category-item px-2 border-secondary">
      <?php
          $select_brands ="Select * from `brands` ";
          $result_brands =mysqli_query ($con,$select_brands) ;
          while($row_data=mysqli_fetch_assoc($result_brands )){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            $brand_logo=$row_data['brand_logo'];
            echo "<option value='$brand_id'>$brand_title</option>";  }
            ?>
      </select>
    </div>
    </div>

    <div class="form-row">

    <div class="form-group col-md-4">
    <label for="product_img">Product Image 1</label>
    <input type="text" class="a_category-item px-2 border-secondary" id="product_img1" name="product_img1" placeholder="Paste Product Image Link Here..." required="required">
  </div>

  <div class="form-group col-md-4">
    <label for="product_img">Product Image 2(Optional)</label>
    <input type="text" class="a_category-item px-2 border-secondary" id="product_img2" name="product_img2" placeholder="Paste Product Image Link Here...">
  </div>

  <div class="form-group col-md-4">
    <label for="product_img">Product Image 3(Optional)</label>
    <input type="text" class="a_category-item px-2 border-secondary" id="product_img3" name="product_img3" placeholder="Paste Product Image Link Here...">
  </div>

    </div>
    <div class="form-group">
  <input type="submit" class="btn a_btn" name="insert_product" value="Post">
</div>
</form>
</div>    

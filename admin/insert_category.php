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
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];
  $category_logo=$_FILES['category_logo'];
  //Select data from db
  $select_query="Select * from `category` where category_title= '$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);

  

  $category_logo_filename=$category_logo['name']; 
  // print_r($brand_logo_filename);
  // echo '<br>';
  $category_logo_fileerror=$category_logo['error']; 
  // print_r($brand_logo_fileerror);
  // echo '<br>';
  $category_logo_filetmp=$category_logo['tmp_name'];
  // print_r($brand_logol_filetmp);
  // echo '<br>';
  $category_logo_name_separate=explode('.',$category_logo_filename);
  // print_r($brand_logo_name_separate);
  // echo '<br>';
  $category_logo_extension=strtolower(end($category_logo_name_separate));
  // print_r($brand_logo_extension);
  $extension = array('png', 'jpg', 'jpeg','webp','gif','jfif','svg');
  if(in_array ($category_logo_extension,$extension)){
    $upload_logo ='category_logo/'.$category_logo_filename;
    move_uploaded_file($category_logo_filetmp,$upload_logo);

 if($number>0){
  echo "<script>alert('Category already exists')</script>";
 }else{
  $insert_query="insert into `category` (category_title,category_logo) values ('$category_title','$upload_logo')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Category has been inserted Successfully')</script>";
  }
  
}
}
}
?>
<div class="card bg-light w-100 p-4">
<h4 class="text-center text-secondary">INSERT CATEGORY</h4>
<form action="" method="post" class="mb-2" enctype='multipart/form-data'>
<div class="input-group w-90 mb-3">
 
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Insert Category" aria-describedby="basic-addon1">
</div>

<div class="">
  <label for="file" class="form-label">Select an Logo for Category</label>
  <input type="file" id="category_logo" name="category_logo" >
  
  </div><br>

<div class="input-group w-10 mb-3">
  <input type="submit" class="mx-auto btn a_btn" name="insert_cat" Value="Insert Category" aria-describedby="basic-addon1">
  
</div>
</form>
</div>
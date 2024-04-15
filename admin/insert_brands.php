<?php

include('../includes/connect.php');
//secure

if (!isset($_SESSION["username"])) {
  header("location: ../user_area/login.php");
}
if ($_SESSION['user_type'] !== 'admin') {
  header("location: ../index.php");
}
//secure
if (isset($_POST['insert_brand'])) {
  $brand_title = $_POST['brand_title'];
  $brand_url = $_POST['brand_url'];
  $brand_logo = $_FILES['brand_logo'];
  //Select data from db
  $select_query = "Select * from `brands` where brand_title= '$brand_title'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);


  $brand_logo_filename = $brand_logo['name'];
  // print_r($brand_logo_filename);
  // echo '<br>';
  $brand_logo_fileerror = $brand_logo['error'];
  // print_r($brand_logo_fileerror);
  // echo '<br>';
  $brand_logo_filetmp = $brand_logo['tmp_name'];
  // print_r($brand_logol_filetmp);
  // echo '<br>';
  $brand_logo_name_separate = explode('.', $brand_logo_filename);
  // print_r($brand_logo_name_separate);
  // echo '<br>';
  $brand_logo_extension = strtolower(end($brand_logo_name_separate));
  // print_r($brand_logo_extension);
  $extension = array('png', 'jpg', 'jpeg', 'webp', 'gif', 'jfif', 'svg');
  if (in_array($brand_logo_extension, $extension)) {
    $upload_logo = 'brand_logo/' . $brand_logo_filename;
    move_uploaded_file($brand_logo_filetmp, $upload_logo);


    if ($number > 0) {
      echo "<script>alert('Category already exists')</script>";
    } else {
      $insert_query = "insert into `brands` (brand_title,brand_logo,brand_url) values ('$brand_title','/$upload_logo','$brand_url')";
      $result = mysqli_query($con, $insert_query);
      if ($result) {
        echo "<script>alert('Brand has been inserted Successfully')</script>";
      }
    }
  }
}
?>
<div class="card w-100 bg-light p-4 mb-4">
    <h4 class="text-center text-secondary">INSERT BRAND</h4>
    <form action="" method="post" class="mb-2" enctype='multipart/form-data'>
        <div class="input-group w-90 mb-3">

            <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand Name here..."
                aria-label="Insert Brands" aria-describedby="basic-addon1">
        </div>
        <div class="input-group w-90 mb-3">

            <input type="text" class="form-control" name="brand_url"
                placeholder="Insert Brand URL here...(Example: amazon.com)" aria-label="Insert Brand URL here..."
                aria-describedby="basic-addon1">
        </div>

        <div class="">
            <label for="file" class="form-label">Select an Logo for Brand(Store)</label>
            <input type="file" id="brand_logo" name="brand_logo">

        </div><br>

        <div class="input-group w-10 mb-3">
            <input type="submit" class="mx-auto btn  a_btn" name="insert_brand" Value="Insert Brands"
                aria-describedby="basic-addon1">

        </div>
    </form>

</div>
<!-- Table for Listing Brand -->
<div class="table-responsive">
    <table class="w-full table table-striped   text-center  ">
        <thead class="thead-dark ">
            <tr>
                <th>Brand Id</th>
                <th>Brand Name</th>
                <th>Brand Logo</th>
            </tr>
        </thead>
        <tbody>
            <?php get_brands_cat_for_admin(false) ?>
        </tbody>

    </table>
</div>
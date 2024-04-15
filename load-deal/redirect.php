<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealhopp - Please Wait</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="../assets/css/style-prefix.css">

    <!--
    - google font link
  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>


    </style>
</head>

<body>



    <?php
  include('../includes/connect.php');

  global $con;
  //&store=amazon
  if (isset($_GET['store'])) {
    $brands_title = $_GET['store'];

    if (isset($_GET['redirect'])) {
      $product_linker = $_GET['redirect'];

      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.product_brand=$brands_title AND products.product_id= $product_linker AND products.product_brand=brands.brand_id";
      $result_product = mysqli_query($con, $select_product);
      $num_of_rows = mysqli_num_rows($result_product);
      if ($num_of_rows == 0) {
        echo '<h6 class="text-orange">No Products Available for this Store.</h6>';
      }
      $row_data = mysqli_fetch_assoc($result_product);
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      $brand_logo = $row_data['brand_logo'];
      $product_link = $row_data['product_link'];
      echo '
  <div class="redirect-box container  mt-5">
    <div class="card mt-3 mx-2 p-2">
    <img src="/dealhopp/assets/images/logo/Logo1.png" width="210px" class="mx-auto mb-4 mt-2">
       <h6 class="text-secondary text-center">Please Wait While We Are Redirecting You to ' . $brand_title . '!</h6>
       <p class="text-secondary text-center small">Keep Visiting Dealhopp for more such offers.</p>

    </div>
    <div class="a_row row_width d-flex align-items-center mx-auto">
    <div class="a_column m-auto"><img src="../assets/images/logo/Logo2.png" width="100px" class="mx-auto">
    </div>
    <div class="a_column"><img src="../assets/images/icons/arrow.gif" width="50px" class="mx-auto">
   </div>
  <div class="a_column m-auto ">
  <img src="../admin' . $brand_logo . '" width="90px" class="mx-auto">
  </div>
  
  <meta http-equiv = "refresh" content = "2.3; url = ' . $product_link . '" />
  
  </div>
</div>';
    }
  }

  ?>

</body>

</html>
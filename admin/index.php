<?php
include('../includes/connect.php');
include('../functions/common_function.php');
//secure
session_start();

if (!isset($_SESSION["username"])) {
  header("location: ../user_area/login.php");
}
if ($_SESSION['user_type'] !== 'admin') {
   header("location: ../index.php");
}
//secure
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="../assets/css/style-prefix.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--
    - google font link
  -->
    <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&display=swap"
        rel="stylesheet">

    <title>Dealhopp Admin</title>
    <style>
    .b_sc {
        display: none;
    }

    .a_btn:hover .b_sc {
        display: block;
        margin-top: 2px !important;
    }

    .progress {
        border-radius: 8px;
        background-color: #ffffff87;
    }

    .product-grid .price-box {
        margin-bottom: 0;
    }
    </style>
</head>

<body>
    <!-- <button onclick="back_to_top_Function()" title="Go to top"><i id="back-to-top"
            class="fa-solid fa-angles-up"></i></button> -->


    <?php
  get_back_to_top();
  include '../parts/admin-nav.php' ?>
    <div class="container">
        <h5 class="text-center text-orange">Admin Panel <i class="text-dark fa-solid fa-user-tie"></i></h5>
        <div class="category d-flex justify-content-center mb-3">


            <div class="category-item-container mt-2 has-scrollbar">
                <a href="index.php?insert_product" class="d-flex align-items-center flex-column a_tbn">
                    <div class="a_category-item">

                        <div class="category-img-box">
                            <img src="https://cdn-icons-png.flaticon.com/128/1160/1160515.png" alt="dress & frock"
                                width="30">
                        </div>

                        <div class="category-content-box">

                            <div class="category-content-flex">
                                <h3 class="category-item-title text_wrap">Insert Products</h3>

                            </div>

                        </div>
                </a>

            </div>
            <a href="index.php?view_product" class="d-flex align-items-center flex-column a_tbn">
                <div class="a_category-item">

                    <div class="category-img-box">
                        <img src="https://cdn-icons-png.flaticon.com/128/1458/1458212.png" alt="winter wear" width="30">
                    </div>

                    <div class="category-content-box">

                        <div class="category-content-flex">
                            <h3 class="category-item-title text_wrap">View Products</h3>

                        </div>


                    </div>
            </a>

        </div>
        <a href="index.php?insert_category" class="d-flex align-items-center flex-column a_tbn">
            <div class="a_category-item">

                <div class="category-img-box">
                    <img src="https://cdn-icons-png.flaticon.com/128/6736/6736258.png" alt="glasses & lens" width="30">
                </div>

                <div class="category-content-box">

                    <div class="category-content-flex">
                        <h3 class="category-item-title text_wrap">Insert Category</h3>

                    </div>


                </div>
        </a>

    </div>

    <a href="index.php?insert_brands" class="d-flex align-items-center flex-column a_tbn">
        <div class="a_category-item">

            <div class="category-img-box">
                <img src="https://cdn-icons-png.flaticon.com/128/5110/5110827.png" alt="t-shirts" width="30">
            </div>

            <div class="category-content-box">

                <div class="category-content-flex">
                    <h3 class="category-item-title text_wrap">Insert Brands</h3>

                </div>


            </div>
    </a>



    </div>
    <!-- <a href="#" class="d-flex align-items-center flex-column a_tbn">
        <div class="a_category-item">

            <div class="category-img-box">
                <img src="https://cdn-icons-png.flaticon.com/128/3566/3566260.png" alt="shorts & jeans" width="30">
            </div>

            <div class="category-content-box">

                <div class="category-content-flex">
                    <h3 class="category-item-title text_wrap">View Category</h3>

                </div>


            </div>
    </a>

    </div> -->
    <!-- <a href="#" class="d-flex align-items-center flex-column a_tbn">
    <div class="a_category-item">

      <div class="category-img-box">
        <img src="https://cdn-icons-png.flaticon.com/128/7111/7111069.png" alt="jacket" width="30">
      </div>

      <div class="category-content-box">

        <div class="category-content-flex">
          <h3 class="category-item-title text_wrap">View Brands</h3>

        </div>


      </div></a> -->

    <!-- </div> -->
    <!-- <a href="#" class="d-flex align-items-center flex-column a_tbn">
    <div class="a_category-item">

      <div class="category-img-box">
        <img src="https://cdn-icons-png.flaticon.com/128/476/476863.png" alt="watch" width="30">
      </div>

      <div class="category-content-box">

        <div class="category-content-flex">
          <h3 class="category-item-title text_wrap">List Users</h3>

        </div>


      </div></a> -->
    <!-- 
    </div> -->

    <a href="index.php?edit_banners" class="d-flex align-items-center flex-column a_tbn">
        <div class="a_category-item">

            <div class="category-img-box">
                <img src="https://cdn-icons-png.flaticon.com/512/8606/8606871.png" alt="shorts & jeans" width="30">
            </div>

            <div class="category-content-box">

                <div class="category-content-flex">
                    <h3 class="category-item-title text_wrap">Promo Banners</h3>

                </div>


            </div>
    </a>

    </div>

    </div>

    </div>







    <?php
  if (isset($_GET['insert_category'])) {
    include('insert_category.php');
  }
  if (isset($_GET['insert_brands'])) {
    include('insert_brands.php');
  }
  if (isset($_GET['insert_product'])) {
    include('insert_product.php');
  }
  if (isset($_GET['view_product'])) {
    include('view_product.php');
  }
  if (isset($_GET['edit_banners'])) {
    include('edit_banners.php');
  }

  if (isset($_GET['updateid'])) {
    include('update.php');
  }
  if (isset($_GET['pin_id'])) {
    include('pin_product.php');
  }
    if (isset($_GET['delete_product'])) {
      include('delete_product.php');
    }
    if (isset($_GET['edit_banner_id'])) {
      include('edit_banner.php');
    }
  ?>
    <?php
  get_post_popup();
  ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/script.js"></script>

    <script src="./assets/js/back_to_top.js"></script>
    <script src="./assets/js/dark-theme.js"></script>
    <script src="../assets/js/skeleton_loading.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/back_to_top.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>
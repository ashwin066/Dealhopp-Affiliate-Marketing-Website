<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
  if (!isset($_SESSION['username'])) {
    get_login_form();
    get_signup_form();
  }
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealhopp - Deals Website</title>
    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style-prefix.css">

    <!--
    - google font link
  -->
    <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>

    </style>
</head>

<body>

    <?php
  get_back_to_top();
  get_slide_notify();
  ?>
    <!--
  - HEADER
-->

    <?php include 'parts/nav.php' ?>




    <!--
  - MAIN
-->

    <main>

        <!--
    - PRODUCT
  -->

        <div class="product-container mt-2">

            <div class="container">


                <!--
        - SIDEBAR
      -->


                <!--
          - PRODUCT FEATURED
        -->
                <div class="w-100">

                    <?php
          product_details();
          ?>

                    <!--
            - PRODUCT MINIMAL
          -->
                    <div class="w-100"></div>
                    <div class="product-minimal">

                        <div class="product-showcase">

                            <h2 class="title">Similar Products</h2>

                            <div class="showcase-wrapper has-scrollbar">

                                <?php
                get_related_product();
                ?>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>



        <?php

    include 'parts/footer.php';
    ?>
        <!--
    - ionicon link
  -->

        <script>
        let copybtn = document.querySelector(".copybtn");


        function copyIt() {
            let copyInput = document.querySelector('#copyvalue');

            copyInput.select();

            document.execCommand("copy");

            copybtn.textContent = "COPIED";


            //redirect

        }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="./assets/js/script.js"></script>
        <script src="./assets/js/back_to_top.js"></script>
        <script src="./assets/js/swipe_function_bs.js"></script>
        <script src="./assets/js/dark-theme.js"></script>
        <script src="./assets/js/skeleton_loading.js"></script>

</body>

</html>
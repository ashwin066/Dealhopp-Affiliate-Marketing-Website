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
    - PRODUCT
  -->


    <div class="container">


        <div class="product-featured a_filter  mt-2 p-4">

            <h2 class="showcase-title mb-4">Disclaimer</h2>


            <p>Applicable with <a href="terms_of_use.php" style="display: inline;">Terms of Service</a> and <a
                    href="privacy_policy.php" style="display: inline;">Privacy Policy</a></p>

            <p></p>
            <p> How Dealhopp Makes Money?</p>
            <p> Our business is based on a simple idea: When you follow our links to visit a Merchant, that
                Merchant
            </p>
            <p> pays us a commission on whatever you buy during your visit. Some merchants also Compensate us
                for
                Visit,</p>
            <p> Free Signup or Intended action on Merchants Website.</p>
            <p> In Simple words, retailers pay to partner with us because we send shoppers. They may also pay us
                to
                help</p>
            <p> grow their brand & Presence. That means we might feature them on our website, in emails, Social
                Media</p>
            <p> etc. This Partnership helps us to Keep this platform free for our users.</p>
            <p></p>
            <p> Amazon Associate & Trademark Disclosure</p>
            <p> As an Amazon Associate I earn from qualifying purchases</p>
            <p> Amazon and the Amazon logo are trademarks of Amazon or its affiliates.</p>
            <p> Calculation of Discount</p>
            <p> Price of Products and Discount is Rounded off to Nearest Rupees and Percentage.</p>
            <p></p>
            <p> Banner on Deals</p>
            <p> We may provide information via placing a banner on an image of a post which can be an opinion,
            </p>
            <p> suggestion, additional product information, relevant details or any other details. The
                information
            </p>
            <p> provided via banner, in any manner, does not create a contractual agreement between users of the
                website</p>
            <p> and Dealhopp.</p>
            <p></p>
            <p> Pricing & Availability</p>
            <p> Product prices and availability are accurate as of the date/time indicated and are subject to
                change.</p>
            <p> Any price and availability information displayed on on Store (i.e. Amazon, Flipkart, Myntra..
                etc.)
                at</p>
            <p> the time of purchase will apply to the purchase of Displayed products.</p>
            <p></p>
            <p> Brand Logos & Trademarks</p>
            <p> All logos, brand name, and trademarks are property of their respected owners.</p>
            <p> If you find unappropriated use of your owned logo, brand name or trademark, please DM us,
            </p>
            <p> we will rectify it as soon as possible. (Kindly include legit ownership
            </p>
            <p> Information so that we can verify your ownership & this will help us to avoid fake &
                unauthorized
            </p>
            <p> requests.)</p>
            <p></p>
            <p> Content & Information Provided</p>
            <p> Information,Photos, Text and Other Material Displayed on the Product page may contain
                information
            </p>
            <p> obtained from Store Listing Page, Official Brand websites, Product Brochure, Social Media</p>
            <p> Announcement</p>
            <p> by competent Authority/Person and other Medium. Sometimes Such information Displayed As it is
                Basis
            </p>
            <p> without any Modification.We take utmost care while obtaining information but does not claim that
            </p>
            <p> information Provided on website is 100% Accurate & Error Free.</p>
            <p> If you find any Incorrect information you can reach out to hello@dealhopp.com or Submit Here. We
            </p>
            <p> will</p>
            <p> Try to Rectify as soon as Possible.</p>




        </div>
    </div>

    <?php
   
  include 'parts/footer.php';
  ?>


    <!--
    - ionicon link
  -->

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
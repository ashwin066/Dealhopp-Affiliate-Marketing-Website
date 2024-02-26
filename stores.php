 <?php
session_start();

if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}
if (isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}
if (isset($_COOKIE['user_image'])) {
    $_SESSION['user_image'] = $_COOKIE['user_image'];
}
if (isset($_COOKIE['user_type'])) {
    $_SESSION['user_type'] = $_COOKIE['user_type'];
}

include('includes/connect.php');
include('functions/common_function.php');
include('user_area/common_function_user.php');
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
     <!--
    - flickity
  -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet"
         crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet"
         crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
     <script type="text/javascript">
     $(document).ready(function() {
         $("#filter").hide();


         //select only one
         $('.price').click(function() {
             $('.price').not(this).prop('checked', false);
         });
         //select only one


         $("#loading").hide();

         function myHandler() {
             $("#loading").show();
             var action = 'data';
             var brand = get_filter_text('brand');
             var category = get_filter_text('category');
             var price = get_filter_text('price');

             $.ajax({
                 url: 'products_data.php',
                 method: 'POST',
                 data: {
                     action: action,
                     brand: brand,
                     category: category,
                     price: price,
                 },
                 success: function(response) {
                     $("#result").html(response);
                     $("#loading").hide();
                     $("#textChange").text("Filtered Products");
                 }
             });
         };
         $(".product_check").ready(myHandler);
         $(".product_check").on("click", myHandler);
         $('#search input[type="text"]').blur(function() {

             $.urlParam = function(name) {
                 var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
                 return results[1] || 0;
             }
             if ($.urlParam('search') =
                 ''
             ) { // variable_name would be the name of your variable within your url following the ? symbol
                 //execute if empty
             } else {
                 $(".search").keyup(function() {
                     $("#loading").show();
                     var input = $(this);
                     if (input.val() == "") {
                         document.getElementById("lets_reverse").style.cssText = `
            display: block;
          `;
                         $("#blobs-container").show();
                         $("#search-btn").show();
                         $("#search-btn-mob").show();
                     } else {
                         window.scrollTo({
                             top: 0,
                             behavior: 'smooth'
                         });
                         document.getElementById("lets_reverse").style.cssText = `
          display: flex;
          flex-direction: column-reverse;
        `;
                         document.getElementById("filter").style.cssText = `
          display: none;`;
                         $("#blobs-container").hide();
                         $("#search-btn").hide();
                         $("#search-btn-mob").hide();
                     }
                     var action = 'data';
                     $.ajax({
                         type: 'post',
                         url: 'products_data.php',
                         data: {
                             action: action,
                             search: $(this).val()
                         },
                         success: function(response) {
                             $("#loading").hide();
                             $('#result').html(response);
                         }
                     });
                 });
                 // execute if there is a variable
             }
         });


         function get_filter_text(text_id) {
             var filterData = [];
             $('#' + text_id + ':checked').each(function() {
                 filterData.push($(this).val());
             });
             return filterData;
         }
     });
     </script>
     <!--login & signup not complete see this ashwin-->
     <script>
     function openForm() {
         document.getElementById("myForm").style.display = "block";
     }

     function closeForm() {
         document.getElementById("myForm").style.display = "none";
     }
     $('input[type="checkbox"]').on('change', function() {
         var priceid = getElementById("price");
         priceid.siblings('input[type="checkbox"]').prop('checked', false);
     });
     </script>
     <style></style>
 </head>

 <body class="">
     <!--login & signup-->
     <!-- <script type="text/javascript">
    function table(){
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function(){
        document.getElementById("product_load").innerHTML = this.responseText;
      }
      xhttp.open("GET", "Get_product.php");
      xhttp.send();
    }

    setInterval(function(){
      table();
    }, 13000);
    
     
  </script> -->
     <!--
    - HEADER
  -->
     <?php
    get_back_to_top();
    get_slide_notify();

    include 'parts/nav.php';
    ?>
     <!--
    - MAIN
  -->
     <main>
         <!--
      - BANNER
    -->
         <!-- 
    <div class="banner"><div class="container"><div class="slider-container has-scrollbar"><div class="slider-item"><img src="./assets/images/banner-1.jpg" alt="women's latest fashion sale" class="banner-img"><div class="banner-content"><p class="banner-subtitle">Trending item</p><h2 class="banner-title">Women's latest fashion sale</h2><p class="banner-text">
                starting at &dollar; <b>20</b>.00
              </p></div></div><div class="slider-item"><img src="./assets/images/banner-2.jpg" alt="modern sunglasses" class="banner-img"><div class="banner-content"><p class="banner-subtitle">Trending accessories</p><h2 class="banner-title">Modern sunglasses</h2><p class="banner-text">
                starting at &dollar; <b>15</b>.00
              </p></div></div><div class="slider-item"><img src="./assets/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img"><div class="banner-content"><p class="banner-subtitle">Sale Offer</p><h2 class="banner-title">New fashion summer sale</h2><p class="banner-text">
                starting at &dollar; <b>29</b>.99
              </p></div></div></div></div></div>
 -->
         <!--
      - CATEGORY
    -->
         <div class="container">
             <div class=" a_filter a_p-15">
                 <!--
       
                 <!--
      - PRODUCT
    -->

                 <h1 class="title1 align-self-center mt-2 text-uppercase font-weight-bold">Our Partner Stores</h1>
                 <div class="container">
                     <div class="row d-flex justify-content-center">
                         <?php get_Brands_card();?>
                     </div>
                 </div>
     </main> <?php
   
  include 'parts/footer.php';
  ?>
     <!--
    - custom js link
  -->
     <script src="./assets/js/script.js"></script>
     <!--
    - ionicon link
  -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" crossorigin="anonymous"
         defer></script>
     <script type="text/javascript">
     $(document).ready(function() {

         $('.a_stickslider2').slick({

             slidesToShow: 1,
             speed: 400,
             autoplay: true,
             autoplaySpeed: 3500,
         });
     });
     </script>
     <script src="./assets/js/back_to_top.js"></script>
     <script src="./assets/js/dark-theme.js"></script>
     <script src="./assets/js/skeleton_loading.js"></script>
 </body>

 </html>
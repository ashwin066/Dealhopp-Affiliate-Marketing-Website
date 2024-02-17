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
                    search: $("#search").val()
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
        $(".search").on("keyup", myHandler);
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
      - BANNER
    -->
                <div id="lets_reverse">
                    <div id="top_part">
                        <div class="banner skeleton border-radius-11 mb-2">
                            <div class="slider-container content has-scrollbar a_stickslider2">
                                <?php
                get_promo_banners()
                ?>
                                <!-- <a href="https://www.flipkart.com/" target="_blank">
                                    <div class="slider-item">
                                        <img src="https://rukminim1.flixcart.com/flap/1844/1400/image/f0ba4ffe837c8881.jpg"
                                            alt="-" class="banner-img">
                                    </div>
                                </a>
                                <a href="https://www.flipkart.com/" target="_blank">
                                    <div class="slider-item">
                                        <img src="https://rukminim1.flixcart.com/fk-p-flap/1844/1400/image/69a5dcc9c9549f01.jpg"
                                            alt="-" class="banner-img">
                                    </div>
                                </a>
                                <a href="https://amzn.to/3hxza44" target="_blank">
                                    <div class="slider-item">
                                        <img src="https://rukminim2.flixcart.com/flap/1800/1800/image/d47e9fe5365c0445.jpg"
                                            alt="-" class="banner-img">
                                    </div>
                                </a>
                                <a href="https://amzn.to/3PQAfRv" target="_blank">
                                    <div class="slider-item">
                                        <img src="https://rukminim2.flixcart.com/flap/1844/1400/image/743fe64aa6337316.png?q=50"
                                            alt="-" class="banner-img">
                                    </div>
                                </a>
                                <a href="https://www.flipkart.com/oppo-reno8-pro-5g-house-dragon-house-dragon-256-gb/p/itma4b519a4477a4?pid=MOBGKY54KCHFYFZW&otracker=clp_bannerads_1_13.bannerAdCard.BANNERADS_Oppo%2BReno8pro%2B5g%2BPreode_mobile-phones-big-saving-days-dec22-eidj8fs-store_VJD61YP7DX1T"
                                    target="_blank">
                                    <div class="slider-item">
                                        <img src="https://rukminim1.flixcart.com/fk-p-flap/1844/1400/image/a87c5508e24536f7.jpg"
                                            alt="-" class="banner-img">
                                    </div>
                                </a> -->

                            </div>
                        </div>
                    </div>
                    <!--
      - PRODUCT
    -->
                    <div class="product-container main_part">
                        <div class="container p-2 mb-2 noselect showcase border-radius-11 border border-orange a_filter a_filter_sticky"
                            id="filter">
                            <div class="category mb-1">
                                <div class="category-item-container has-scrollbar"> <?php
                                                                    get_Brands()
                                                                    ?> </div>
                                <!-- <div class="category-item-container  has-scrollbar"></div> -->
                            </div>
                            <!--Category-->
                            <div class="category mb-1">
                                <div class="category-item-container"> <?php
                                                      get_category()
                                                      ?> </div>
                            </div>
                            <div class="category">
                                <div class="category-item-container"> <?php
                                                      get_price_filter()
                                                      ?> </div>
                            </div>
                        </div>
                        <div id="blobs-container" class="position-relative"> <?php get_titles(); ?> </div>
                        <div class="d-flex justify-content-center position-relative" style="gap: 15px;">
                            <div class="product-box d-flex w-100">
                                <!--
            - PRODUCT GRID
          -->
                                <div class="product-main w-100" id="result">
                                    <!-- <div class="showcase-actions"><button class="btn-action"><ion-icon name="heart-outline"></ion-icon></button><button class="btn-action"><ion-icon name="eye-outline"></ion-icon></button><button class="btn-action"><ion-icon name="repeat-outline"></ion-icon></button><button class="btn-action"><ion-icon name="bag-add-outline"></ion-icon></button></div> -->
                                </div>
                            </div>
                            <!-- <div>sidebar</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
            get_post_popup();
            ?>
        <!--
      -TESTIMONIALS, CTA & SERVICE
    -->
        <!-- 
    <div><div class="container"><div class="testimonials-box"> -->
        <!--
            - TESTIMONIALS
          -->
        <!-- <div class="testimonial"><h2 class="title">testimonial</h2><div class="testimonial-card"><img src="./assets/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80"
                height="80"><p class="testimonial-name">Alan Doe</p><p class="testimonial-title">CEO & Founder Invision</p><img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26"><p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p></div></div> -->
        <!--
            - CTA
          -->
        <!-- <div class="cta-container"><img src="./assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner"><a href="#" class="cta-content"><p class="discount">25% Discount</p><h2 class="cta-title">Summer collection</h2><p class="cta-text">Starting @ ₹10</p><button class="cta-btn">Shop now</button></a></div> -->
        <!--
            - SERVICE
          -->
        <!-- 
          <div class="service"><h2 class="title">Our Services</h2><div class="service-container"><a href="#" class="service-item"><div class="service-icon"><ion-icon name="boat-outline"></ion-icon></div><div class="service-content"><h3 class="service-title">Worldwide Delivery</h3><p class="service-desc">For Order Over ₹100</p></div></a><a href="#" class="service-item"><div class="service-icon"><ion-icon name="rocket-outline"></ion-icon></div><div class="service-content"><h3 class="service-title">Next Day delivery</h3><p class="service-desc">UK Orders Only</p></div></a><a href="#" class="service-item"><div class="service-icon"><ion-icon name="call-outline"></ion-icon></div><div class="service-content"><h3 class="service-title">Best Online Support</h3><p class="service-desc">Hours: 8AM - 11PM</p></div></a><a href="#" class="service-item"><div class="service-icon"><ion-icon name="arrow-undo-outline"></ion-icon></div><div class="service-content"><h3 class="service-title">Return Policy</h3><p class="service-desc">Easy & Free Return</p></div></a><a href="#" class="service-item"><div class="service-icon"><ion-icon name="ticket-outline"></ion-icon></div><div class="service-content"><h3 class="service-title">30% money back</h3><p class="service-desc">For Order Over ₹100</p></div></a></div></div></div></div></div>

 -->
        <!--
      - BLOG
    -->
        <!-- 
    <div class="blog"><div class="container"><div class="blog-container has-scrollbar"><div class="blog-card"><a href="#"><img src="./assets/images/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives"
                width="300" class="blog-banner"></a><div class="blog-content"><a href="#" class="blog-category">Fashion</a><a href="#"><h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3></a><p class="blog-meta">
                By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time></p></div></div><div class="blog-card"><a href="#"><img src="./assets/images/blog-2.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300"></a><div class="blog-content"><a href="#" class="blog-category">Clothes</a><h3><a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a></h3><p class="blog-meta">
                By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time></p></div></div><div class="blog-card"><a href="#"><img src="./assets/images/blog-3.jpg" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
                class="blog-banner" width="300"></a><div class="blog-content"><a href="#" class="blog-category">Shoes</a><h3><a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a></h3><p class="blog-meta">
                By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time></p></div></div><div class="blog-card"><a href="#"><img src="./assets/images/blog-4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300"></a><div class="blog-content"><a href="#" class="blog-category">Electronics</a><h3><a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a></h3><p class="blog-meta">
                By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time></p></div></div></div></div></div>

 
 -->
    </main>



    <?php

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
            autoplaySpeed: 2500,
        });
    });
    </script>
    <script src="./assets/js/back_to_top.js"></script>
    <script src="./assets/js/dark-theme.js"></script>
    <script src="./assets/js/skeleton_loading.js"></script>
</body>

</html>
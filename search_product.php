<?php
include ('includes/connect.php');
include ('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>


    </style>
</head>

<body>

    <!-- 
    <div class="overlay" data-overlay></div>

    <!--
    - MODAL
  -->
    <!-- 
    <div class="modal" data-modal>

        <div class="modal-close-overlay" data-modal-overlay></div>

        <div class="modal-content">

            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>



            <div class="newsletter">

                <form action="#">

                    <div class="newsletter-header">

                        <h3 class="newsletter-title">Subscribe Newsletter.</h3>

                        <p class="newsletter-desc">
                            Subscribe the <b>Dealhopp</b> to get latest products and discount update.
                        </p>

                    </div>

                    <input type="email" name="email" class="email-field" placeholder="Email Address" required>

                    <button type="submit" class="btn-newsletter">Subscribe</button>

                </form>

            </div>

        </div>

    </div> -->





    <!--
    - NOTIFICATION TOAST
  -->

    <div class="notification-toast" data-toast>

        <button class="toast-close-btn" data-toast-close>
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <div class="toast-banner">
            <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
        </div>

        <div class="toast-detail">

            <p class="toast-message">
                Someone in new just bought
            </p>

            <p class="toast-title">
                Rose Gold Earrings
            </p>

            <p class="toast-meta">
                <time datetime="PT2M">2 Minutes</time> ago
            </p>

        </div>

    </div>





    <!--
    - HEADER
  -->

    <?php include 'parts/nav.php'?>




    <!--
    - MAIN
  -->

    <main>



        <!--
      - CATEGORY
    -->

        <div class="category">

            <div class="container">

                <div class="category-item-container  has-scrollbar">

                    <a href="index.php" style="text-decoration:none;">
                        <div class="category-item" style="background-color: var(--white);">


                            <div class="category-content-box">

                                <div class="category-content-flex">
                                    <h3 class="category-item-title mb-0 mx-auto">All</h3>

                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
       get_Brands()
       ?>

                </div>

            </div>

        </div>







        <!--
      - PRODUCT
    -->

        <div class="product-container">

            <div class="container d-flex flex-row-reverse">


                <!--
          - SIDEBAR
        -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>
                    <div class="sidebar-top">


                        <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>
                    <h2 class="sidebar-title border-bottom mb-2">Category</h2>
                    <div class="sidebar-category">



                        <ul class="sidebar-menu-category-list">





                            <?php
                get_category()
               ?>

                        </ul>

                    </div>

                    <div class="product-showcase">

                        <h3 class="showcase-heading mb-2 d-flex align-items-center">
                            <div class="blob orange my-2"></div>Trending Now
                        </h3>

                        <div class="showcase-wrapper">

                            <div class="showcase-container">

                                <?php
            get_trending_products();
            ?>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="product-box">


                    <!--
            - PRODUCT GRID
          -->

                    <div class="product-main">


                        <div class="blobs-container mb-2 border-bottom d-flex align-items-center">
                            <div class="blob orange my-2"></div>
                            <h2 class="title my-auto">Live Loot Deals</h2>

                        </div>


                        <?php
          get_titles();
          ?>
                        <div class="product-grid">

                            <?php
               get_search_product();
              ?>


                        </div>

                    </div>







                </div>

            </div>

        </div>


    </main>
    <iframe src='https://inrdeals.com/embed/deals?user=ash534680258' width='100%' height='1140' frameborder='0'
        allowTransparency='true'> </iframe>


    <!--
    - FOOTER
  -->
    <?php
   
  include 'parts/footer.php';
  ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    var subID = 'ash534680258';
    (function(d, t) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src = (document.location.protocol == 'https:' ?
            'https://cdn.jsdelivr.net/gh/inrdeals/inrdeals-js@latest/' :
            'http://cdn.jsdelivr.net/gh/inrdeals/inrdeals-js@latest/') + 'inrdeals.js';
        document.body.appendChild(script);
    }());
    </script>


    <!--
    - custom js link
  -->

    <script src="./assets/js/script.js"></script>
    <!--
    - ionicon link
  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
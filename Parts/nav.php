<header>


    <div class="header-main" id="header-main">

        <div class="container d-flex h-100 justify-content-between">
            <div class="logodiv_mob"> <a href="/dealhopp/index.php" id="logo_mob" class="header-logo a_logo_box">
                    <div class="logo_img_mob" id="logo_img_mob"></div>
                </a></div>
            <div class="logodiv"> <a href="/dealhopp/index.php" id="logo" class="header-logo a_logo_box">
                    <div class="logo_img" id="logo_img"></div>
                </a></div>

            <div class="header-search-container">

            </div>

            <div class="header-user-actions">
                <div class="a_search_box">
                    <?php
                    if (isset($_GET['search'])) {

                        $search_value = $_GET['search'];
                    } else {
                        $search_value = '';
                    }
                    // disabled for temp resonons
                    echo '
   <form type="text">
      <input   type="text" value="' . $search_value . '" id="search" name="search" aria-lable="search" class="search search-field" placeholder="Enter your product name...">
      
      <button  type=""  id="search-btn" name="search-btn" id="search-btn" class="search-btn">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>  
    </form>';
                    ?>
                </div>

            </div>
            <div class="d-flex align-items-center" style="overflow: visible!important;">
                <button class="text-light my-auto mr-3 action-btn" data-mobile-menu-open-btn>
                    <i class="fa-solid fa-bars"></i>
                </button>
                <button class="text-light theme-change my-auto mr-3 action-btn" id="theme-change">



                </button>
                <?php

                if (!isset($_SESSION['username'])) {
                    echo '<button  onclick="openForm()" class="a_click a_tbn font-weight-bold text-light">Login <i class="fa fa-sign-in" aria-hidden="true"></i>
      </button>';
                } else {
                    echo '<p class="text-light text-capitalize mb-0 a_res w-100">Welcome, ' . $_SESSION['username'] . '</p>';
                }
                if (isset($_SESSION['username'])) {
                    echo '
    <a href="/dealhopp/user_area/profile.php" class="pl-2 pr-1">
      <button class="action-btn">
          
      <img src="' . $_SESSION['user_image'] . '" alt="" class="a_user_img"> 
      </button>
      </a>';
                } ?>

            </div>
        </div>

    </div>
    </div>


    <div class="mobile-bottom-navigation">

        <div class="container p-0 d-flex">
            <div class="a_search_box w-100 mr-auto">


                <input type="text" id="search" autocomplete=off name="search" aria-lable="search"
                    class="search search-field" placeholder="Enter your product name...">

                <button type="submit" id="search-btn-mob" value="search" name="search_data_product" class="search-btn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>


            </div>



        </div>
    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <i class="fa-solid fa-circle-xmark text-orange"></i>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="index.php" class="menu-title m-0">Loot Deals</a>
            </li>

            <li class="menu-category">
                <a href="stores.php" class="menu-title m-0">Stores</a>
            </li>

            <li class="menu-category">
                <a href="privacy_policy.php" class="menu-title">Privacy Policy</a>
            </li>

            <li class="menu-category">
                <a href="terms_of_use.php" class="menu-title">Terms Of Use</a>
            </li>

            <li class="menu-category">
                <a href="disclaimer.php" class="menu-title">Disclaimer</a>
            </li>

            <!-- <li class="menu-category">
      <a href="#" class="menu-title">Hot Offers</a>
    </li> -->

        </ul>

        <div class="menu-bottom">



            <!-- <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">

                        <i class="fa-brands   fa-instagram"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <i class="fa-brands  fa-instagram"></i>

                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>



            </ul> -->

        </div>

    </nav>




    <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>
</header>
<header>

    <!-- <div class="header-top">

  <div class="container">

    <ul class="header-social-container">

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-facebook"></ion-icon>
        </a>
      </li>

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-twitter"></ion-icon>
        </a>
      </li>

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-instagram"></ion-icon>
        </a>
      </li>

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a>
      </li>

    </ul>

    <div class="header-alert-news">
      <p>
        <b>Free Shipping</b>
        This Week Order Over - ₹55
      </p>
    </div>

    <div class="header-top-actions">

      <select name="currency">

        <option value="usd">USD &dollar;</option>
        <option value="eur">EUR &euro;</option>

      </select>

      <select name="language">

        <option value="en-US">English</option>
        <option value="es-ES">Espa&ntilde;ol</option>
        <option value="fr">Fran&ccedil;ais</option>

      </select>

    </div>

  </div>

</div> -->

    <div class="header-main" id="header-main">

        <div class="container d-flex h-100 justify-content-between">
            <div class="logodiv_mob"> <a href="../index.php" id="logo_mob" class="header-logo a_logo_box">
                    <div class="logo_img_mob" id="logo_img_mob"></div>
                </a></div>
            <div class="logodiv"> <a href="../index.php" id="logo" class="header-logo a_logo_box">
                    <div class="logo_img" id="logo_img"></div>
                </a></div>

            <div class="header-search-container">

            </div>

            <div class="header-user-actions">
                <!-- <span class="small text-orange">Made with <i class="fa fa-heart heart"></i> in INDIA</span> -->


                <!-- <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>
        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>
        <span class="count">0</span>
      </button>
       -->

            </div>
            <div class="d-flex align-items-center" style="overflow: visible!important;">

                <?php

        if (!isset($_SESSION['username'])) {
          echo '<a href="../user_area/login.php" class="a_tbn font-weight-bold text-light">Login <i class="fa fa-sign-in" aria-hidden="true"></i>
      </a>';
        } else {
          echo '<p class="text-light text-capitalize mb-0 a_res w-100">Welcome, ' . $_SESSION['username'] . '</p>';
        }
        if (isset($_SESSION['username'])) {
          echo '
    <a href="../user_area/profile.php" class="pl-2 pr-1">
      <button class="action-btn">
          
      <img src="' . $_SESSION['user_image'] . '" alt="" class="a_user_img"> 
      </button>
      </a>';
        } ?>

            </div>
        </div>

    </div>
    </div>
    <!-- <nav class="desktop-navigation-menu">

  <div class="container">

    <ul class="desktop-menu-category-list">

      <li class="menu-category">
        <a href="#" class="menu-title">Home</a>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Categories</a>

        <div class="dropdown-panel">

          <ul class="dropdown-panel-list">

            <li class="menu-title">
              <a href="#">Electronics</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Desktop</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Laptop</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Camera</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Tablet</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Headphone</a>
            </li>

            <li class="panel-list-item">
              <a href="#">
                <img src="./assets/images/electronics-banner-1.jpg" alt="headphone collection" width="250"
                  height="119">
              </a>
            </li>

          </ul>

          <ul class="dropdown-panel-list">

            <li class="menu-title">
              <a href="#">Men's</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Formal</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Casual</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Sports</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Jacket</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Sunglasses</a>
            </li>

            <li class="panel-list-item">
              <a href="#">
                <img src="./assets/images/mens-banner.jpg" alt="men's fashion" width="250" height="119">
              </a>
            </li>

          </ul>

          <ul class="dropdown-panel-list">

            <li class="menu-title">
              <a href="#">Women's</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Formal</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Casual</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Perfume</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Cosmetics</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Bags</a>
            </li>

            <li class="panel-list-item">
              <a href="#">
                <img src="./assets/images/womens-banner.jpg" alt="women's fashion" width="250" height="119">
              </a>
            </li>

          </ul>

          <ul class="dropdown-panel-list">

            <li class="menu-title">
              <a href="#">Electronics</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Smart Watch</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Smart TV</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Keyboard</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Mouse</a>
            </li>

            <li class="panel-list-item">
              <a href="#">Microphone</a>
            </li>

            <li class="panel-list-item">
              <a href="#">
                <img src="./assets/images/electronics-banner-2.jpg" alt="mouse collection" width="250" height="119">
              </a>
            </li>

          </ul>

        </div>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Men's</a>

        <ul class="dropdown-list">

          <li class="dropdown-item">
            <a href="#">Shirt</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Shorts & Jeans</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Safety Shoes</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Wallet</a>
          </li>

        </ul>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Women's</a>

        <ul class="dropdown-list">

          <li class="dropdown-item">
            <a href="#">Dress & Frock</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Earrings</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Necklace</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Makeup Kit</a>
          </li>

        </ul>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Jewelry</a>

        <ul class="dropdown-list">

          <li class="dropdown-item">
            <a href="#">Earrings</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Couple Rings</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Necklace</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Bracelets</a>
          </li>

        </ul>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Perfume</a>

        <ul class="dropdown-list">

          <li class="dropdown-item">
            <a href="#">Clothes Perfume</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Deodorant</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Flower Fragrance</a>
          </li>

          <li class="dropdown-item">
            <a href="#">Air Freshener</a>
          </li>

        </ul>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Blog</a>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Hot Offers</a>
      </li>

      <li class="menu-category">
     
        
      </li>
    </ul>

  </div>

</nav> -->


    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="#" class="menu-title">Home</a>
            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Men's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shirt</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shorts & Jeans</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Safety Shoes</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Wallet</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Women's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Dress & Frock</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Makeup Kit</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Jewelry</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Couple Rings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Bracelets</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Perfume</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Clothes Perfume</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Deodorant</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Flower Fragrance</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Air Freshener</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Blog</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Hot Offers</a>
            </li>

        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>

                    </ul>

                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">USD &dollar;</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">EUR &euro;</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

    <script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop >= 25 || document.documentElement.scrollTop >= 25) {

            document.getElementById("logo_img").style.cssText = `
    background:url(../assets/images/logo/1.png) no-repeat;
    width:90px;
    height:75px;
    background-position: center;
    background-size: contain;
`;
            document.getElementById("logo").style.cssText = `
border-radius:  0 0 11px 11px;


`;
            document.getElementById("logo_img_mob").style.cssText = `
    background:url(../assets/images/logo/1.png) no-repeat;
    width:45px;
    height:45px;
    background-position: center;
    background-size: contain;
`;
            document.getElementById("logo_mob").style.cssText = `
border-radius:  0 0 11px 11px;

`;


        } else {

            document.getElementById("logo_img").style.cssText = `
    background:url(../assets/images/logo/logo1.png) no-repeat;
    width:270px;
    background-position: center;
    background-size: contain;
`;
            document.getElementById("logo").style.cssText = `
border-radius:  0 0 11px 11px;

`;

            document.getElementById("logo_img_mob").style.cssText = `
    background:url(../assets/images/logo/logo1.png) no-repeat;
    width:170px;
   height: 45px;
    background-position: center;
    background-size: contain;
`;
            document.getElementById("logo_mob").style.cssText = `
border-radius:  0 0 11px 11px;

`;
        }
    }



    //on mobile,tablet etc,.
    </script>
    <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</header>
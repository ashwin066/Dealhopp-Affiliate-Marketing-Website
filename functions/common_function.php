<?php
//includeing connect.php
// include ('./includes/connect.php');
function get_back_to_top()
{
  if (isset($_SESSION['username'])) {
    $btn_value = 'openpost_box()';
  } else {
    $btn_value = 'openForm()';
  };
  echo '<div class="floating-btn d-flex flex-column">
<button onclick="' . $btn_value . '"><i class="mb-2 color-a flex-row-reverse d-flex back-to-top2 rounded-circle fa-solid fa-plus" aria-label="Add Deal or Offers"></i></button>
<button onclick="back_to_top_Function()"><i id="back-to-top" aria-label="Scroll to top" 
class="flex-row-reverse color-a back-to-top fa-solid fa-angles-up"></i></button>
</div>';
}
//open login or signup
function get_login_form()
{
  global $con;
  //index.php
  //Include Configuration File
  include("./google_config.php");

  $login_button = '';

  if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {

      $google_client->setAccessToken($token['access_token']);

      $_SESSION['access_token'] = $token['access_token'];

      $google_service = new Google_Service_Oauth2($google_client);

      $data = $google_service
        ->userinfo
        ->get();

      if (!empty($data['given_name'])) {
        $_SESSION['user_first_name'] = $data['given_name'];
      }

      if (!empty($data['family_name'])) {
        $_SESSION['user_last_name'] = $data['family_name'];
      }

      if (!empty($data['email'])) {
        $_SESSION['user_email_address'] = $data['email'];
      }

      if (!empty($data['gender'])) {
        $_SESSION['user_gender'] = $data['gender'];
      }

      if (!empty($data['picture'])) {
        $_SESSION['user_image'] = $data['picture'];
      }
    }
  }

  if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="google bg-white border d-flex align-items-center w-100 border-radius-18 mt-2 btn font-weight-bold"><img height="34" class="bg-light border p-1 mr-2 rounded-circle" src="./assets/images/icons/Google.png"> <p class="my-0 text-dark mx-auto">Login with Google</p>
        </a>';
  }

  echo "<div class='login_signup' id='a_login'>
  <div class='card noselect position-fixed d-flex flex-row a_filter'>
  <div class='card-header p-2 a_card_head'>
      <h4 class='text-white font-weight-bold'>&nbsp;LOGIN&nbsp;</h4>
  </div>
  <div class='card-body d-flex'>
  <button onclick='closeForm()' class='float-right position-absolute' style='right:10px; top:10px;' onclick='closeForm()'>
  <i class='fa-solid text-orange h5 fa-circle-xmark'></i>
  </button>
  <form action='/dealhopp/user_area/login.php?loading' method='post' class='form' role='form'>
          <div class='form-group'>
              <label class='title-2' for='username'>Username or Email</label>
              <input type='text' autocomplete=off class='form-control' name='username' placeholder='Username or Email'>
          </div>

          <div class='form-group mb-1'>
               <input type='password' autocomplete=off class='form-control' name='user_password' placeholder='Password' title='At least 6 characters with letters and numbers' required=''>
          </div>

      
         
          <div class='vl my-4 rounded d-sm-block d-md-none d-lg-none d-xl-none'>
        <span class='vl-innertext'>or</span>
      </div>
      <div class='d-sm-block d-md-none d-lg-none d-xl-none'>
       $login_button
        </div>
          <div class='form-group'>
          <input type='submit' name='user_login' value='LOGIN' class='btn a_btn2 text-white btn-lg mt-2 float-right'>
          </div>
          
          <span class='float-right mt-2 small text-muted'>Don't Have an account?&nbsp;&nbsp;
          <button type='button' onclick='openForm2()' class='text-orange float-right'>Register</button></span>
      </form>
      <div class='vl2 my-auto mx-4 rounded  d-none d-md-block'>
      <span class='vl2-innertext'>or</span>
    </div>
    <div class='d-none d-md-block'>
    <div class='d-flex h-100 justify-content-center flex-column'>
    $login_button
    </div>
    </div>
  </div>
</div></div>";
  if ($login_button == '') {
    $username = $_SESSION['user_first_name'];
    $userlastname = $_SESSION['user_last_name'];
    $user_email = $_SESSION['user_email_address'];

    $user_ip = getIPAddress();
    $select1_query = "select * from `user_data` where user_email='$user_email'";
    $result1 = mysqli_query($con, $select1_query);
    $row_count1 = mysqli_num_rows($result1);
    $row_data = mysqli_fetch_assoc($result1);

    if ($row_count1 > 0) {
      $user_image = $row_data['user_image'];
    } else {
      $user_image = '';
    }
    if ($row_count1 > 0) {
      $select_image_query = "select user_image from `user_data` where user_image='$user_image'";
      $result_image = mysqli_query($con, $select_image_query);
      $row_image_count = mysqli_num_rows($result_image);
      $row_data = mysqli_fetch_assoc($result_image);

      if ($row_image_count > 0) {

        $_SESSION['user_image'] = $row_data['user_image'];
      }
    } else {
      $_SESSION['user_image'] = $data['picture'];
      $google_img = $_SESSION['user_image'];
      $insert_query = "insert into `user_data` (username, user_email, user_ip, user_image) 
      values ('$username','$user_email','$user_ip','$google_img')";

      $sql_execute = mysqli_query($con, $insert_query);
    }

    $select_all_query = "select * from `user_data` where user_email='$user_email'";
    $result3 = mysqli_query($con, $select_all_query);
    $row_data = mysqli_fetch_assoc($result3);
    $user_type = $row_data['user_type'];
    $user_id = $row_data['user_id'];
    $_SESSION['username'] = "$username";
    $_SESSION['user_id'] = "$user_id";
    $_SESSION['user_type'] = "$user_type";
    setcookie('username', $username, time() + 60 * 60 * 24 * 365, "/");
    setcookie('user_id', $user_id, time() + 60 * 60 * 24 * 365, "/");
    setcookie('user_type', $user_type, time() + 60 * 60 * 24 * 365, "/");
    setcookie('user_image', $user_image, time() + 60 * 60 * 24 * 365, "/");
  }
}

function get_signup_form()
{
  global $con;
  //index.php
  //Include Configuration File
  include('./google_config.php');
  $login_button = '';
  if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {

      $google_client->setAccessToken($token['access_token']);

      $_SESSION['access_token'] = $token['access_token'];

      $google_service = new Google_Service_Oauth2($google_client);

      $data = $google_service
        ->userinfo
        ->get();

      if (!empty($data['given_name'])) {
        $_SESSION['user_first_name'] = $data['given_name'];
      }

      if (!empty($data['family_name'])) {
        $_SESSION['user_last_name'] = $data['family_name'];
      }

      if (!empty($data['email'])) {
        $_SESSION['user_email_address'] = $data['email'];
      }

      if (!empty($data['gender'])) {
        $_SESSION['user_gender'] = $data['gender'];
      }

      if (!empty($data['picture'])) {
        $_SESSION['user_image'] = $data['picture'];
      }
    }
  }

  if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="google bg-white border d-flex align-items-center w-100 border-radius-18 mt-2 btn font-weight-bold"><img height="34" class="bg-light border p-1 mr-2 rounded-circle" src="./assets/images/icons/Google.png"> <p class="my-0 text-dark mx-auto">Login with Google</p>
          </a>';
  }

  if ($login_button == '') {
    $username = $_SESSION['user_first_name'];
    $userlastname = $_SESSION['user_last_name'];
    $user_email = $_SESSION['user_email_address'];

    $user_ip = getIPAddress();
    $select1_query = "select * from `user_data` where user_email='$user_email'";
    $result1 = mysqli_query($con, $select1_query);
    $row_count1 = mysqli_num_rows($result1);
    $row_data = mysqli_fetch_assoc($result1);

    if ($row_count1 > 0) {
      $user_image = $row_data['user_image'];
    } else {
      $user_image = '';
    }
    if ($row_count1 > 0) {
      $select_image_query = "select user_image from `user_data` where user_image='$user_image'";
      $result_image = mysqli_query($con, $select_image_query);
      $row_image_count = mysqli_num_rows($result_image);
      $row_data = mysqli_fetch_assoc($result_image);

      if ($row_image_count > 0) {

        $_SESSION['user_image'] = $row_data['user_image'];
      }
    } else {
      $_SESSION['user_image'] = $data['picture'];
      $google_img = $_SESSION['user_image'];
      $insert_query = "insert into `user_data` (username, user_email, user_ip, user_image) 
        values ('$username','$user_email','$user_ip','$google_img')";

      $sql_execute = mysqli_query($con, $insert_query);
    }

    $select_all_query = "select * from `user_data` where user_email='$user_email'";
    $result3 = mysqli_query($con, $select_all_query);

    $row_data = mysqli_fetch_assoc($result3);
    $user_type = $row_data['user_type'];
    $user_id = $row_data['user_id'];
  }

  echo "<div class='login_signup' id='a_signup'>
<div class='card noselect a_login d-flex flex-row a_filter'>
        <div class='card-header p-2 a_card_head'>
            <h4 class='text-white font-weight-bold'>SIGNUP</h4>
        </div>
        <div class='card-body d-md-flex'>
        <button onclick='closeForm2()' class='float-right position-absolute' style='right:10px; top:10px;' onclick='closeForm()'>
        <i class='fa-solid text-orange h5 fa-circle-xmark'></i>
        </button>
            <form action='/dealhopp/user_area/registration.php?loading' class='form' role='form' method='post' autocomplete='off'>
                <div class='form-group'>
                    <label class='title-2' for='username'>User Name</label>
                    <input type='text' autocomplete=off class='form-control' name='username' placeholder='User Name' required=''>
                </div>
                <div class='form-group'>
                    <label class='title-2' for='user_email'>Email</label>
                    <input type='email' class='form-control' name='user_email' placeholder='Email@gmail.com' required=''>
                </div>
                <div class='form-group'>
                    <label class='title-2' for='user_mobile'>Mobile</label>
                    <input type='tel' class='form-control' name='user_mobile' placeholder='Mobile No.' required=''>
                </div>
                <div class='form-group'>
                    <label class='title-2' for='user_password'>Password</label>
                    <input type='password' class='form-control' name='user_password' placeholder='password' title='At least 6 characters with letters and numbers' required=''>
                </div>
                <div class='form-group'>
                    <label class='title-2' for='conf_user_password'>Verify</label>
                    <input type='password' class='form-control' name='conf_user_password' placeholder='password (again)' required=''>
                </div>
                <div class='vl my-4 rounded d-sm-block d-md-none d-lg-none d-xl-none'>
                <span class='vl-innertext'>or</span>
              </div>
              <div class='d-sm-block d-md-none mb-2 d-lg-none d-xl-none'>
              $login_button
                </div>
                <div class='form-group'>
                    <input type='submit' name='user_register' value='REGISTER' class='btn a_btn2 text-white btn-lg float-right'>
                </div><br>
                <span class='float-right mt-2 small text-muted'>Have an account?&nbsp;&nbsp;
          <button type='button' onclick='openForm()' class='text-orange float-right'>Login</button></span>
            </form>
            </form>
            <div class='vl2 my-auto mx-4 rounded d-none d-md-block'>
            <span class='vl2-innertext'>or</span>
          </div>
          <div class='d-none d-md-block'>
          <div class='d-flex h-100 justify-content-center flex-column'>
          $login_button
          </div>
          </div>
        </div>
    </div>
</div>";
}

function get_slide_notify()
{
  if (1 === 0) {
    echo '
  <div class="overlay" data-overlay></div>

  <!--
    - MODAL
  -->

  <div class="modal" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content a_filter">

      <button class="text-orange float-right position-absolute" style="right:10px; top:5px;" data-modal-close>
      <i class="fa-solid fa-circle-xmark"></i>
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

  </div>
   
';
  }
}
function get_Brands()
{
  global $con;
  $select_brands = "Select * from `brands`";
  $result_brands = mysqli_query($con, $select_brands);
  if (isset($_GET['category'])) {
    $category_i = $_GET['category'];
    $all_link = '?category=' . $category_i . '';
    $selected = 'style="background-color: var(--white); border:solid 2px #ff6600;"';
  } else {
    $all_link = 'index.php';
    $selected = 'style="background-color: var(--white); border:solid 2px #ff6600;"';
  }
  if (isset($_GET['brand'])) {
    $selected = '';
  }
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    $brand_logo = $row_data['brand_logo'];
    $brand_select = '';

    if (isset($_GET['category'])) {
      $category_i = $_GET['category'];
      $link = '?category=' . $category_i . '&brand=' . $brand_id . '';
    } else {
      $link = '?brand=' . $brand_id . '';
    }
    if (isset($_GET['brand'])) {
      $brand_select = $_GET['brand'];
      if ($brand_select != $brand_id) {
      } else {
        $brand_select = 'style="background-color: var(--white); border:solid 2px #ff6600;"';

        if (isset($_GET['category'])) {
          $link = '?category=' . $category_i . '';
        } else {
          $link = '?';
        }
      }
    }

    echo ' 
      <div class="form-check p-0 mr-1">
      <label class="mb-0 form-check-lable">
        <input type="checkbox" class="position-absolute product_check" style="display:none;" value="' . $brand_id . '" id="brand">
        <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>
 
        <div class="category-item" ' . $brand_select . '>
      <div class="category-img-box">
          <img src="admin/' . $brand_logo . '" alt="' . $brand_title . '" class="brand_logo_top">
        </div>
  
        <div class="category-content-box">
  
         <!-- <div class="category-content-flex">
            <h3 class="category-item-title mb-0 mx-auto">' . $brand_title . '</h3>
  
          </div>-->
        </div> 
      </div>
 
      
      
      
        </label>
    </div>
      
      ';
  }
}

function get_brands_cat_for_admin($is_category)
{
  global $con;
  $select_brands = "Select * from `brands`";
  $select_categories = "Select * from `category`";
  $result_brands = mysqli_query($con, $is_category ? $select_categories : $select_brands);
  if (isset($_GET['category'])) {
    $category_i = $_GET['category'];
    $all_link = '?category=' . $category_i . '';
    $selected = 'style="background-color: var(--white); border:solid 2px #ff6600;"';
  } else {
    $all_link = 'index.php';
    $selected = 'style="background-color: var(--white); border:solid 2px #ff6600;"';
  }
  if (isset($_GET['brand'])) {
    $selected = '';
  }
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $is_category ? $row_data['category_title'] : $row_data['brand_title'];
    $brand_id = $is_category ? $row_data['category_id'] : $row_data['brand_id'];
    $brand_logo =
      ltrim($is_category ? $row_data['category_logo'] : $row_data['brand_logo'], '/');



    echo '<tr>';
    echo '<td  class="m-3" style="max-width:400px;">' . $brand_id . '</td>';
    echo '<td class="m-3 text-truncate" style="max-width:500px;" > ' . $brand_title . ' </td>';
    echo '<td ><div class="form-check p-0 mr-1">
      <label class="mb-0 form-check-lable">
        
        <div class="category-item" >
      <div class="category-img-box contain">
          <img  style="width:95px; height:45px; object-fit:contain" class=" contain brand_logo_top" src=' . $brand_logo . ' alt="' . $brand_title . '"  >
        </div>
  
        <div class="category-content-box">
  
         <!-- <div class="category-content-flex">
            <h3 class="category-item-title mb-0 mx-auto">' . $brand_title . '</h3>
  
          </div>-->
        </div> 
      </div>
 
      
      
      
        </label>
    </div></td>';
    // echo '<td  class="m-3"><form action="" method="post"> <a   href="edit_brand.php?id=' . $brand_id . '">Edit</a>  
    //     <input type="hidden" value=' . $brand_id . '  name="id"  />
    //     <button type="submit"  >Delete</button></form></td>';
    echo '</tr>';
  }
}

function get_promo_banners()
{
  global $con;
  // Fetch Promo Banners from Database
  $select_promo_banners = "SELECT * FROM `promo_banners` ORDER BY `id` DESC";
  $result_promo_banners = mysqli_query($con, $select_promo_banners);

  if ($result_promo_banners) {
    while ($row = mysqli_fetch_assoc($result_promo_banners)) {
      // Display each banner in the table rows

      echo '<a href="' . $row['link'] . '" target="_blank">
                                    <div class="slider-item">
                                        <img src="admin/' . $row['image'] . '"
                                            alt="' . $row['title'] . '" class="banner-img">
                                            
                                    </div>
                                </a>';
    }
  }
}


function get_Brands_card()
{
  global $con;
  $select_brands = "Select * from `brands`";
  $result_brands = mysqli_query($con, $select_brands);

  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    $brand_logo = $row_data['brand_logo'];
    $brand_select = '';



    echo '   
   
      <div class=" col-sm-2 brand_card "> <span class="position-absolute text-center fixed-bottom bg-dealhopp text-light title rounded-bottom">' . $brand_title . '</span>
          <img src="admin/' . $brand_logo . '" alt="' . $brand_title . '"  >
         
        </div> 
      
      ';
  }
}




//includeing Category
function get_category()
{

  global $con, $category_title;
  $select_category = "Select * from `category` ";
  $result_category = mysqli_query($con, $select_category);

  if (isset($_GET['brand'])) {
    $brand_i = $_GET['brand'];
    $all_link = '?brand=' . $brand_i . '';
    $selected = 'style="border:solid 2px #ff6600; height:30px!important;"';
  } else {
    $all_link = 'index.php';
    $selected = 'style="height:30px!important; border:solid 2px #ff6600;"';
  }
  if (isset($_GET['category'])) {
    $selected = 'style="height:30px!important;"';
  }

  while ($row_data = mysqli_fetch_assoc($result_category)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    $category_logo = $row_data['category_logo'];

    $category_select = '';

    if (isset($_GET['brand'])) {
      $brand_i = $_GET['brand'];
      $link = '?category=' . $category_id . '&brand=' . $brand_i . '';
    } else {
      $link = '?category=' . $category_id . '';
    }

    if (isset($_GET['category'])) {
      $category_select = $_GET['category'];
      if ($category_select != $category_id) {
      } else {
        $category_select = 'style="background-color: var(--white); border:solid 2px #ff6600;"';

        if (isset($_GET['brand'])) {
          $link = '?brand=' . $brand_i . '';
        } else {
          $link = '?';
        }
      }
    }
    if (isset($_GET['category'])) {
      $category_select = $_GET['category'];
      if ($category_select != $category_id) {
      } else {
        $category_select = 'border:solid 2px #ff6600;';
      }
    }
    echo '
      <div class="form-check p-0">
      <label class="form-check-lable mb-0">
        <input type="checkbox" class="position-absolute product_check" value="' . $category_id . '" style="display:none;" id="category">
        <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

        <div class="category-item pr-4" style="height:30px!important; ' . $category_select . '">
        <div class="category-img-box">
            <img src="admin/' . $category_logo . '" alt="' . $category_title . '" class="a_category_img brand_logo_top">
            </div>
    
          <div class="category-content-box">
          <div class="category-content-flex">
          <h3 class="category-item-title mb-0 mx-auto text_wrap">' . $category_title . '</h3>
    
        </div>
          </div> 
        </div>
      </label>
    </div>

';
    //USE THIS IF U NEED SUB CATEGORIES ELSE IGNORE
    //    <ul class="sidebar-submenu-category-list" data-accordion>


    //   <li class="sidebar-submenu-category">
    //     <a href="#" class="sidebar-submenu-title">
    //       <p class="product-name">shorts & jeans</p>
    //       <data value="60" class="stock" title="Available Stock">60</data>
    //     </a>
    //   </li>
    //   <li class="sidebar-submenu-category">
    //     <a href="#" class="sidebar-submenu-title">
    //       <p class="product-name">jacket</p>
    //       <data value="50" class="stock" title="Available Stock">50</data>
    //     </a>
    //   </li>
    //   <li class="sidebar-submenu-category">
    //     <a href="#" class="sidebar-submenu-title">
    //       <p class="product-name">dress & frock</p>
    //       <data value="87" class="stock" title="Available Stock">87</data>
    //     </a>
    //   </li>
    // </ul>

  }
}

//includeing Category
function get_price_filter()
{
  echo '
      <div class="form-check p-0">
      <label class="form-check-lable mb-0">
        <input type="checkbox" class="position-absolute price product_check" value="`products`.`product_price` <= 500" style="display:none;" id="price">
        <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

        <div class="category-item pr-4" style="background-color: var(); height:30px!important; ">
        <div class="category-img-box">
          <span class="text-warning font-weight-bold">
          ₹</span>
            </div>
          <div class="category-content-box">
          <div class="category-content-flex">
          <h3 class="category-item-title mb-0 mx-auto text_wrap">Under ₹500</h3>
        </div>
          </div> 
        </div>
      </label>
    </div>

    <div class="form-check p-0">
    <label class="form-check-lable mb-0">
      <input type="checkbox" class="position-absolute price product_check" value="`products`.`product_price` <= 1000 && `products`.`product_price` >=500" style="display:none;" id="price">
      <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

      <div class="category-item pr-4" style="background-color: var(); height:30px!important; ">
      <div class="category-img-box">
        <span class="text-warning font-weight-bold">
        ₹</span>
          </div>
        <div class="category-content-box">
        <div class="category-content-flex">
        <h3 class="category-item-title mb-0 mx-auto text_wrap">₹500 to ₹1000</h3>
      </div>
        </div> 
      </div>
    </label>
  </div>

  <div class="form-check p-0">
  <label class="form-check-lable mb-0">
    <input type="checkbox" class="position-absolute price product_check" value="`products`.`product_price` <= 1000 && `products`.`product_price` >=2000" style="display:none;" id="price">
    <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

    <div class="category-item pr-4" style="background-color: var(); height:30px!important; ">
    <div class="category-img-box">
      <span class="text-warning font-weight-bold">
      ₹</span>
        </div>
      <div class="category-content-box">
      <div class="category-content-flex">
      <h3 class="category-item-title mb-0 mx-auto text_wrap">₹1000 to ₹2000</h3>
    </div>
      </div> 
    </div>
  </label>
</div>


<div class="form-check p-0">
<label class="form-check-lable mb-0">
  <input type="checkbox" class="position-absolute price product_check" value="`products`.`product_price` <= 2000 && `products`.`product_price` >=5000" style="display:none;" id="price">
  <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

  <div class="category-item pr-4" style="background-color: var(); height:30px!important; ">
  <div class="category-img-box">
    <span class="text-warning font-weight-bold">
    ₹</span>
      </div>
    <div class="category-content-box">
    <div class="category-content-flex">
    <h3 class="category-item-title mb-0 mx-auto text_wrap">₹2000 to ₹5000</h3>
  </div>
    </div> 
  </div>
</label>
</div>


<div class="form-check p-0">
<label class="form-check-lable mb-0">
  <input type="checkbox" class="position-absolute price product_check" value="`products`.`product_price` >= 5000" style="display:none;" id="price">
  <span class="checkmark"><i class="fa-solid fa-check text-white a_tick position-absolute"></i></span>

  <div class="category-item pr-4" style="background-color: var(); height:30px!important; ">
  <div class="category-img-box">
    <span class="text-warning font-weight-bold">
    ₹</span>
      </div>
    <div class="category-content-box">
    <div class="category-content-flex">
    <h3 class="category-item-title mb-0 mx-auto text_wrap">₹5000 and Above</h3>
  </div>
    </div> 
  </div>
</label>
</div>
';
}

//brand/category title
function get_titles()
{
  global $con;

  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      if (!isset($_GET['search_data_product'])) {

        echo '<div class="blobs-container mb-2 d-flex justify-content-center">

    <div class=" blob orange align-self-center mt-2 d-none d-sm-block"></div><h2 class="title align-self-center mt-2 text-uppercase font-weight-bold">Live Deals</h2>
    <div class="blob align-self-center orange mt-2 d-none d-sm-block"></div>
    <div class="ml-auto d-flex align-items-center">
    <button onclick="uncheckAll();toggleNav();" class="align-items-center bg-secondary border-radius-11 px-2 text-white " id="uncheck_show">
     <i class="fa-solid fa-filter-circle-xmark" style="line-height: 23px;"></i> <span class="ml-2 d-none d-sm-block">Clear Filter</span></button>
    
    <button onclick="toggleNav()" class="d-flex align-items-center px-2 ml-2 my-auto a_btn2 text-white mt-2 noselect">
    <i class="fa-solid small mr-1 fa-filter"></i> <span>Filter</span>
    <i class="ml-2 mt-1 fa-solid fa-angle-down" id="a_filter_down"></i>
    <i class="ml-2 mt-1 fa-solid fa-angle-up" id="a_filter_up" style="display:none;"></i>
   </button>
  </div></div>
 
 <div class="mx-auto  d-flex justify-content-center">
  <img src="./assets/images/icons/arrow.gif" alt="" class="mx-auto" id="loading" height="180" style="display:none; position:absolute; z-index: 20;">
</div>
  ';
      }
    }
  } else if (isset($_GET['category'], $_GET['brand'])) {

    $category_title = $_GET['category'];
    $brand_id = $_GET['brand'];
    $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.category_title=$category_title AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
    $result_product = mysqli_query($con, $select_product);
    $num_of_rows = mysqli_num_rows($result_product);
    if ($num_of_rows == 0) {
      echo '<h6 class="text-orange">No Products Available for this Category.</h6>';
    } else {
      $select_product = "Select * from `products` JOIN `category` join `brands` where brands.brand_id=$brand_id AND products.category_title=$category_title AND products.category_title=category.category_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);
      $row_data = mysqli_fetch_assoc($result_product);
      $category_title = $row_data['category_title'];
      $brand_id = $row_data['brand_title'];
      echo '<div class="d-flex a_aic align-items-center mt-2"><h2 class="title my-auto">Filter :&nbsp;&nbsp;</h2><a href="index.php" class="a_tbn"><button class="btn-primary a_btn2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> ' . $category_title . ', ' . $brand_id . '</button></a></div>
<hr>';
    }
  }
  if (!isset($_GET['category'], $_GET['brand'])) {
    if (isset($_GET['brand'])) {
      $brands_title = $_GET['brand'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.brand_title=$brands_title AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);
      $num_of_rows = mysqli_num_rows($result_product);

      if ($num_of_rows == 0) {
        $select_product = "Select * from `brands` where brands.brand_id=$brands_title";
        $result_product = mysqli_query($con, $select_product);
        $row_data = mysqli_fetch_assoc($result_product);
        $brands_title = $row_data['brand_title'];
        echo '
    <div class="d-flex a_aic align-items-center pb-2 mt-2 mb-2 border-bottom"><h2 class="my-auto title my-auto">Filter :&nbsp;&nbsp;</h2><a href="index.php" class="a_tbn"><button class="btn-primary a_btn2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> ' . $brands_title . '</button></a></div>
    <h6 class="text-orange">No Products Available for "' . $brands_title . '".</h6>';
      } else {

        $select_product = "Select * from `products` JOIN `brands` where products.brand_title=$brands_title AND products.brand_title=brands.brand_id ORDER BY date desc";
        $result_product = mysqli_query($con, $select_product);
        $row_data = mysqli_fetch_assoc($result_product);
        $brands_title = $row_data['brand_title'];
        echo '<div class="d-flex a_aic align-items-center pb-2 mb-2 mt-2 border-bottom"><h2 class="my-auto title my-auto">Filter :&nbsp;&nbsp;</h2><a href="index.php" class="a_tbn"><button class="btn-primary a_btn2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> ' . $brands_title . '</button></a></div>
 ';
      }
    }

    if (isset($_GET['category'])) {
      $category_title = $_GET['category'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.category_title=$category_title AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);
      $num_of_rows = mysqli_num_rows($result_product);
      if ($num_of_rows == 0) {
        echo '<h6 class="text-orange">No Products Available for this Store.</h6>';
      } else {
        $select_product = "Select * from `products` JOIN `brands` join `category` where products.category_title=$category_title AND products.category_title=category.category_id ORDER BY date desc";
        $result_product = mysqli_query($con, $select_product);
        $row_data = mysqli_fetch_assoc($result_product);
        $category_title = $row_data['category_title'];

        echo '<div class="d-flex a_aic align-items-center pb-2 mt-2 mb-2 w-100 border-bottom"><h2 class="my-auto title my-auto">Filter :&nbsp;&nbsp;</h2><a href="index.php" class="a_tbn"><button class="btn-primary a_btn2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> ' . $category_title . '</button></a></div>
 ';
      }
    }
    if (isset($_GET['search_data_product'])) {

      $search_data_value = $_GET['search_data'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_title like '%$search_data_value%' AND products.product_category=category.category_id AND products.product_brand=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);
      $num_of_rows = mysqli_num_rows($result_product);
      if ($num_of_rows == 0) {
        echo '
<div class="d-flex align-items-center justify-content-center">
  <h6 class="text-uppercase position-absolute a_no_result_title text-orange h4 text-center font-weight-bold">No Results Found For <br><span style="line-height:45px;" class="text-capitalize text-dark text_wrap4">"' . $search_data_value . '</span><span style="line-height:45px;" class="text-dark text_wrap">"</span><p class="a_small_text small text-capitalize text-secondary">(Try Different Keywords)</p></h6>

  <img src="assets/images/icons/no-result.svg" class="a_no_result">
</div>';
      } else {
        echo '<div class="d-flex a_aic align-items-center pb-2 mt-2 mb-2 w-100 border-bottom"><h2 class="my-auto title my-auto">Search :&nbsp;&nbsp;</h2><a href="index.php" class="a_tbn"><button class="btn-primary a_btn2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> ' . $search_data_value . '</button></a></div>
  ';
      }
    }
  }
}

//Including Product grid
function get_user_products()
{
  global $con;

  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      if (!isset($_GET['search_data_product'])) {
        $username = $_SESSION["user_id"];
        $select_product = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_category=category.category_id AND products.product_brand=brands.brand_id and products.posted_user_id=$username ORDER BY pinned DESC, DATE DESC";
        $result_product = mysqli_query($con, $select_product);

        $count = 0;
        $row_count = mysqli_num_rows($result_product);
        if ($row_count > 0) {
          echo '<div class="product-grid">';
          while ($row_data = mysqli_fetch_assoc($result_product)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $coupon = $row_data['coupon'];
            $is_coupon = $row_data['is_coupon'];
            $product_old_price = $row_data['product_old_price'];
            $product_price = $row_data['product_price'];
            $product_keywords = $row_data['product_keywords'];
            $product_category = $row_data['product_category'];
            $product_brand = $row_data['product_brand'];
            $product_img1 = $row_data['product_img1'];
            $product_img2 = $row_data['product_img2'];
            $product_img3 = $row_data['product_img3'];
            $product_link = $row_data['product_link'];
            $product_status = $row_data['status'];
            $time = $row_data['date'];
            $pinned = $row_data['pinned'];




            if ($product_old_price !== '0') {
              $num  = 0;
              $str = 0;
              if (
                $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
              ) {
                $myNumber1 = $product_old_price;
                $myNumber2 = $product_price;
                $multiply = $myNumber2 * 100;
                $answer = $multiply / $myNumber1;
                $finalanswer = 100 - $answer;
                $str = $finalanswer;
                $num = (int)$str;
              }

              if ($str < 0) {
                $percent_off = '';
                $deal_scale = 'style="display:none;"';
                $num = '';
              } else {
                $percent_off = '<div class="small text-orange a_dis_max mx-auto text-wrap showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
                $deal_scale = '';
              }
            }

            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            $category_logo = $row_data['category_logo'];
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            $brand_logo = $row_data['brand_logo'];
            // $select_brands="select * from `brands`";
            // $result_brands =mysqli_query($con,$select_brands);
            // $select_brands="select * from `brands` where brand_id=$product_id";
            // $result_brands =mysqli_query($con,$select_brands);
            // $row_data=mysqli_fetch_assoc($result_brands);
            // $product_id=$row_data['brand_title'];
            //  $brand_title=$row_data['brand_title'];
            //  $brand_id=$row_data['brand_id'];
            //  $brand_logo=$row_data['brand_logo'];


            $timeago = get_timeago(strtotime($time));
            if ("$product_status" == "expired") {
              $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
              $price_expired = '<del class="text-white price">₹' . $product_price . '.00</del>';
            } else {
              $deal_expired = '';
              $price_expired = '<span class="price">₹' . $product_price . '.00</span>';
            }
            if ("$pinned" == "1") {
              $pin_product = ' <div class="a_pinned" aria-label="Pinned Product">
        <i class="fa fa-thumb-tack text-danger" aria-hidden="true"></i>
        </div>';
            } else {
              $pin_product = '';
            }

            $approved = '';

            if ($product_status == "not_approved") {
              $approved = '<i class="fa-solid fa-hourglass-start"></i><span>&nbsp  Admin Approval pending</span>';
            } else if ($product_status == "disapprove") {
              $approved = '<i class="fa-solid fa-xmark"></i><span> &nbsp Post Disapproved</span>';
            } else if ($product_status == "approved" || $product_status == "true") {
              $approved = '<i class="fa-solid fa-check"></i>';
            }    else if ($product_status == "expired"  ) {
              $approved = '<i class="fa-solid fa-store-slash"  ></i><span> &nbsp Deal Expired</span>';
            }
            $output = '';

            if ($is_coupon != 1) {
              $output .= '
<div class="showcase">
        <div class="showcase-banner">
        <a href="../product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
        ' . $deal_expired . '
        <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
        </a> 
  <span class="a_no_result_title font-weight-bold showcase-badge">' . $approved . '</span>
        <!--<p class="showcase-badge">' . $num . '% OFF</p> -->
        <!--<p class="showcase-badge angle orange">' . $num . '% OFF</p>-->
      
        
        
        ' . $pin_product . '
        
        <div class="showcase-rating">
        <div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>
        <img class="flame" src="../assets/images/icons/flame.png" alt="">
        
        <div class="progress">
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo">
          <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
        
          <img class="ml-auto" src="../admin/' . $brand_logo . '" alt="">
          </div>
          
          <a href="product_details.php?product_id=' . $product_id . '">
        
            <a class="showcase-title text_wrap">' . $product_title . '</a>
            
          </a>
          <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
          <div class="price-box">
            
            <button class="btn a_btn">' . $price_expired . '<br>
            <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
            
        </div></a>
        </div>
        
         
        
        </div>
    ';
            } else {
              $output .= '
<div class="showcase">' . $approved . '
       <div class="showcase-banner ">
        <a id="add-dark-here" href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img  draggable="false" src="../admin' . $brand_logo . '" alt="Dealhopp product Image" height="160" class="p-2 product-img default">
        ' . $deal_expired . '
        <img draggable="false" src="../admin' . $brand_logo . '"  alt="Dealhopp product Image" height="160" class="p-2 product-img hover">
        </a> 
         
        
        ' . $pin_product . '
        
        <div class=" showcase-rating">
         ' . $percent_off . '
 
        <img class="flame" src="../assets/images/icons/flame.png" alt="">
        
        <div class="progress"  ' . $deal_scale . '>
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:100%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        <div class="showcase-content">
        <div class="a_store_logo">
          <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
        
          <img class="ml-auto" src="../admin/' . $brand_logo . '" alt="">
          </div>
          
          <a href="product_details.php?product_id=' . $product_id . '">
        
            <a class="showcase-title text_wrap">' . $product_title . '</a>
            
          </a>
          <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
            <div class="price-box ">
             <button class="btn  a_btn"  ><span class="hide_coupon" >' . $coupon . '</span><span>******</span><br>
             <span class="b_sc">&nbsp;View Coupon Code  <i class="fa fa-arrow-right"></i></span></button>
         </div></a>
        </div>
        
         
        
        </div>
    ';
            }

            echo $output;
            $count++;
            if ($count >= 13) {
              echo '<div class="showcase">
      <div class="showcase-banner p-0 a_ad">
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2256437645660334"
      crossorigin="anonymous"></script>
 <ins class="adsbygoogle"
      style="display:block"
      data-ad-format="fluid"
      data-ad-layout-key="+20+rl+2n-1d-69"
      data-ad-client="ca-pub-2256437645660334"
      data-ad-slot="3457975619"></ins>
 <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
 </script>
          </div>

      <div class="a_ad_title small">
      <span class="bg-orange w-100 text-center text-light">Advertisement</span>
          </div></div>';
              $count = 0;
            }
          }
          echo '</div>';
        } else {
          echo '<div class="w-100">
  <h6 class="text-center text-secondary">You Have not Posted any Deals or offers yet</h6>
  <div class="card a_btn2 text-white border-radius-18 my-3 mx-auto" style="width: 18rem;">
  <button onclick="openpost_box()" class="card-body w-100">
    <h5 class="card-title">Add Deal</h5>
    <p class="card-text">You can Post Best Deals and Offers Here.<br/><br/>The deals you post will be auto deleted in 3-4 weeks.</p>
    <a href="#" class="w-100 btn border-radius-18 btn-light border">Post <i class="fa-solid fa-plus"></i></a>
  </button>
  </div>
  </div>
 ';
        }
      }
    }
  }
}

//Including Product grid for public user
function get_public_user_products()
{
  global $con;

  if (isset($_GET['user'])) {
    $username = $_GET["user"];
    $select_query = "select * from `user_data` where username='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_id = $row_data['user_id'];
    $user_img = $row_data['user_image'];
    $user_type = $row_data['user_type'];

    $select_product = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_category=category.category_id AND  products.product_brand=brands.brand_id and products.posted_user_id=$user_id ORDER BY pinned DESC, DATE DESC";
    $result_product = mysqli_query($con, $select_product);

    $count = 0;
    $row_count = mysqli_num_rows($result_product);
    if ($row_count > 0) {
      echo '<div class="product-grid">';
      while ($row_data = mysqli_fetch_assoc($result_product)) {
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $coupon = $row_data['coupon'];
        $is_coupon = $row_data['is_coupon'];
        $product_old_price = $row_data['product_old_price'];
        $product_price = $row_data['product_price'];
        $product_keywords = $row_data['product_keywords'];
        $product_category = $row_data['product_category'];
        $product_brand = $row_data['product_brand'];
        $product_img1 = $row_data['product_img1'];
        $product_img2 = $row_data['product_img2'];
        $product_img3 = $row_data['product_img3'];
        $product_link = $row_data['product_link'];
        $product_status = $row_data['status'];
        $time = $row_data['date'];




        if ($product_old_price !== '0') {
          $num  = 0;
          if (
            $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
          ) {
            $myNumber1 = $product_old_price;
            $myNumber2 = $product_price;
            $multiply = $myNumber2 * 100;
            $answer = $multiply / $myNumber1;
            $finalanswer = 100 - $answer;
            $str = $finalanswer;
            $num = (int)$str;
          }

          if ($str < 0) {
            $percent_off = '';
            $deal_scale = 'style="display:none;"';
            $num = '';
          } else {
            $percent_off = '<div class="small text-orange a_dis_max mx-auto text-wrap showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
            $deal_scale = '';
          }
        }

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_logo = $row_data['category_logo'];
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        $brand_logo = $row_data['brand_logo'];
        // $select_brands="select * from `brands`";
        // $result_brands =mysqli_query($con,$select_brands);
        // $select_brands="select * from `brands` where brand_id=$product_id";
        // $result_brands =mysqli_query($con,$select_brands);
        // $row_data=mysqli_fetch_assoc($result_brands);
        // $product_id=$row_data['brand_title'];
        //  $brand_title=$row_data['brand_title'];
        //  $brand_id=$row_data['brand_id'];
        //  $brand_logo=$row_data['brand_logo'];


        $timeago = get_timeago(strtotime($time));
        if ("$product_status" == "expired") {
          $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
          $price_expired = '<del class="text-white price">₹' . $product_price . '.00</del>';
        } else {
          $deal_expired = '';
          $price_expired = '<span class="price">₹' . $product_price . '.00</span>';
        }
        if ("$pinned" == "1") {
          $pin_product = ' <div class="a_pinned" aria-label="Pinned Product">
        <i class="fa fa-thumb-tack text-danger" aria-hidden="true"></i>
        </div>';
        } else {
          $pin_product = '';
        }

        echo '
<div class="showcase">
        <div class="showcase-banner">
        <a href="../product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
        ' . $deal_expired . '
        <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
        </a> 
        <p class="a_no_result_title showcase-badge"><i class="fa-solid fa-heart"></i> 650</p>

 
        
        ' . $pin_product . '
        
        <div class="showcase-rating">
        <div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>
        <img class="flame" src="../assets/images/icons/flame.png" alt="">
        
        <div class="progress">
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo">
          <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
        
          <img class="ml-auto" src="../admin/' . $brand_logo . '" alt="">
          </div>
          
          <a href="product_details.php?product_id=' . $product_id . '">
        
            <a class="showcase-title text_wrap">' . $product_title . '</a>
            
          </a>
          <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
          <div class="price-box">
            
            <button class="btn a_btn">' . $price_expired . '<br>
            <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
            
        </div></a>
        </div>
        
         
        
        </div>
    ';
        $count++;
        if ($count >= 13) {
          echo '<div class="showcase">
      <div class="showcase-banner p-0 a_ad">
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2256437645660334"
      crossorigin="anonymous"></script>
 <ins class="adsbygoogle"
      style="display:block"
      data-ad-format="fluid"
      data-ad-layout-key="+20+rl+2n-1d-69"
      data-ad-client="ca-pub-2256437645660334"
      data-ad-slot="3457975619"></ins>
 <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
 </script>
          </div>

      <div class="a_ad_title small">
      <span class="bg-orange w-100 text-center text-light">Advertisement</span>
          </div></div>';
          $count = 0;
        }
      }
      echo '</div>';
    } else {
      echo '<div class="w-100">
  <h6 class="text-center text-capitalize text-secondary">' . $username . ' Have not Posted any Deals or offers yet</h6>
 
  </div>
 ';
    }
  }
}



function get_post_popup()
{
  global $con;
  echo '
    <div class="login_signup text-dark" id="post_popup">
    
         <div class="popup_bg showcase mx-2 position-relative p-4 border-radius-18">
         
         <button onclick="closepost_box()" class="float-right position-sticky" style="right:7px; top:7px;">
         <i class="fa-solid text-orange h5 fa-circle-xmark"></i>
         </button>
  <form action="/dealhopp/admin/insert_product.php" method="post">
  <div class="d-flex mb-2 align-items-center">
  <img src="/dealhopp/assets/images/logo/Logo1.png" height="40" class="mr-4">
  <h6 class="mt-3 text-center">Post Best Deals and Offers Here</h6>
  </div>
  <div class="form-group mb-2">
    <label for="product_title">Product Title</label>
    <input type="text" class="border-secondary a_category-item px-2" name="product_title" id="product_title" placeholder="Product Title">
    <input type="text" value="not_approved"  name="status" id="status" style="visibility:hidden; display:none;" >
  </div>

  <div class="form-row">
    <div class="form-group mb-2 col-md-6">
      <label class="text-danger font-weight-bold">Old Price</label>
      <input type="text" class="a_category-item px-2 border-danger" id="product_old_price" name="product_old_price"  placeholder="Old Price">
    </div>
    <div class="form-group mb-2 col-md-6">
      <label class="text-success font-weight-bold">New Price</label>
      <input type="text" class="a_category-item px-2 border-success" id="product_price" name="product_price" placeholder="New Price">
    </div>
  </div>

  <div class="form-group mb-1">
    <label for="description">Description</label>
    <textarea type="textarea" class="w-100 a_category-item px-2 border-secondary" id="product_description" name="product_description" placeholder="Description..."></textarea>
  </div>
  <div class="row">
 
<div class="form-group mb-2 col-md-6">
<label for="product_link " class="form-label"> Product
Link</label>
<input type="text" name="product_link"
id="product_link" class="border-secondary a_category-item px-2"
placeholder="Enter product link" autocomplete="off"
required="required">
</div>


 
    <div class="form-group mb-2 col-md-3">
      <label for="inputState">Select Category</label>
      <select id="category_title" name="product_category" class="w-100 a_category-item border-secondary">
      </div> ';

  $select_category = "Select * from `category` ";
  $result_category = mysqli_query($con, $select_category);
  while ($row_data = mysqli_fetch_assoc($result_category)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    $category_logo = $row_data['category_logo'];
    echo  "<option value=$category_id>$category_title</option>";
  }




  echo '
      </select>
    </div>
    <div class="form-group mb-2 col-md-3">
      <label for="inputState">Select Brand(Store)</label>
      <select id="brand_title" name="product_brand" class="w-100 a_category-item border-secondary">
      ';

  $select_brands = "Select * from `brands` ";
  $result_brands = mysqli_query($con, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    $brand_logo = $row_data['brand_logo'];
    echo "<option value=$brand_id>$brand_title</option>";
  }

  echo '     
      </select>
    </div>
    </div>

 
    
    <div class="form-row">

    <div class="form-group mb-2 col-md-6">
    <label for="product_img">Product Image 1</label>
    <input type="text" class="a_category-item px-2 border-secondary" id="product_img1" name="product_img1" placeholder="Paste Product Image Link Here..." required="required">
  </div>

  <div class="form-group mb-2 col-md-6">
    <label for="product_img">Product Image 2(Optional)</label>
    <input type="text" class="a_category-item px-2 border-secondary" id="product_img2" name="product_img2" placeholder="Paste Product Image Link Here...">
  </div>
 

 
    </div>
    <div class="form-group mb-2 col-3 p-0 ml-auto">
  <input type="submit" class="btn a_btn2 text-white" name="insert_product" value="Post"><i class="fa-solid fa-paper-plane-top"></i>
 </div>
</form>
</div>

</div>  
    ';
}
function get_trending_products()
{
  global $con;

  if (!isset($_GET['category'])) {
    $select_product = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
    $result_product = mysqli_query($con, $select_product);

    while ($row_data = mysqli_fetch_assoc($result_product)) {
      $product_id = $row_data['product_id'];
      $product_title = $row_data['product_title'];
      $product_description = $row_data['product_description'];
      $coupon = $row_data['coupon'];
      $is_coupon = $row_data['is_coupon'];
      $product_old_price = $row_data['product_old_price'];
      $product_price = $row_data['product_price'];
      $product_keywords = $row_data['product_keywords'];
      $product_category = $row_data['product_category'];
      $product_brand = $row_data['product_brand'];
      $product_img1 = $row_data['product_img1'];
      $product_img2 = $row_data['product_img2'];
      $product_img3 = $row_data['product_img3'];
      $product_link = $row_data['product_link'];
      $product_status = $row_data['status'];
      $time = $row_data['date'];

      $num  = 0;
      if (
        $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
      ) {
        $myNumber1 = $product_old_price;
        $myNumber2 = $product_price;
        $multiply = $myNumber2 * 100;
        $answer = $multiply / $myNumber1;
        $finalanswer = 100 - $answer;
        $str = $finalanswer;
        $num = (int)$str;
      }


      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      $category_logo = $row_data['category_logo'];
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      $brand_logo = $row_data['brand_logo'];
      // $select_brands="select * from `brands`";
      // $result_brands =mysqli_query($con,$select_brands);
      // $select_brands="select * from `brands` where brand_id=$product_id";
      // $result_brands =mysqli_query($con,$select_brands);
      // $row_data=mysqli_fetch_assoc($result_brands);
      // $product_id=$row_data['brand_title'];
      //  $brand_title=$row_data['brand_title'];
      //  $brand_id=$row_data['brand_id'];
      //  $brand_logo=$row_data['brand_logo'];


      if ($num > '74' && $product_status == "true") {
        echo '

<div class="showcase">

                  <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '" class="showcase-img-box">
                  <div style="width:90px; height:100px;" class="d-flex justify-content-around">
                    <img src=' . $product_img1 . ' alt=' . $product_title . ' width="auto" height="90px"
                      class="showcase-img">
                      <img class="flame a_p" src="assets/images/icons/flame.png">

                      </div>
                  </a>

                  <div class="showcase-content">

                    <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '">
                      <h4 class="showcase-title">' . $product_title . '</h4>
                    </a>

                    <div class="price-box d-flex justify-content-between">
                      
                      <p class="price">₹' . $product_price . '.00</p>    
                    </div>
                   <!-- <del class="red">₹' . $product_old_price . '.00</del>-->
                    <div class="showcase-rating">
                    <span>' . $brand_title . '</span>
                
                    </div>


                  </div>

                </div>';
      }
    }
  }
}

//Function definition
// PHP program to convert timestamp
// to time ago
function get_timeago($ptime)
{
  $estimate_time = time() - $ptime;

  if ($estimate_time < 1) {
    return 'less than 1 second ago';
  }

  $condition = array(
    12 * 30 * 24 * 60 * 60 => 'year',
    30 * 24 * 60 * 60 => 'month',
    24 * 60 * 60 => 'day',
    60 * 60 => 'hour',
    60 => 'minute',
    1 => 'second'
  );

  foreach ($condition as $secs => $str) {
    $d = $estimate_time / $secs;

    if ($d >= 1) {
      $r = round($d);
      return '<i class="fa fa-clock-o"></i> ' . $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
    }
  }
}

//Getting Unique Categories & brand
function get_unique_categories_brand()
{
  global $con, $category_title;

  if (isset($_GET['category'])) {

    if (isset($_GET['brand'])) {

      $category_title = $_GET['category'];
      $brands_title = $_GET['brand'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.brand_title=$brands_title and products.category_title=$category_title AND products.category_title=category.category_id and products.brand_title=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);

      while ($row_data = mysqli_fetch_assoc($result_product)) {
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $coupon = $row_data['coupon'];
        $is_coupon = $row_data['is_coupon'];
        $product_old_price = $row_data['product_old_price'];
        $product_price = $row_data['product_price'];
        $product_keywords = $row_data['product_keywords'];
        $product_category = $row_data['product_category'];
        $product_brand = $row_data['product_brand'];
        $product_img1 = $row_data['product_img1'];
        $product_img2 = $row_data['product_img2'];
        $product_img3 = $row_data['product_img3'];
        $product_link = $row_data['product_link'];
        $product_status = $row_data['status'];
        $time = $row_data['date'];

        $num  = 0;
        if (
          $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
        ) {
          $myNumber1 = $product_old_price;
          $myNumber2 = $product_price;
          $multiply = $myNumber2 * 100;
          $answer = $multiply / $myNumber1;
          $finalanswer = 100 - $answer;
          $str = $finalanswer;
          $num = (int)$str;
        }


        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_logo = $row_data['category_logo'];
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        $brand_logo = $row_data['brand_logo'];

        $timeago = get_timeago(strtotime($time));
        if ("$product_status" == "expired") {
          $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
        } else {
          $deal_expired = ' ';
        }
        echo '

    <div class="showcase">
    <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '">
    <div class="showcase-banner">
      
      <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
      ' . $deal_expired . '
      <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
    
      <!-- <p class="showcase-badge">15%</p> -->
      <p class="showcase-badge angle orange">' . $num . '% OFF</p>
    <div class="showcase-rating">
        <img class="flame" src="assets/images/icons/flame.png" alt="">
        
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
        ' . $num . '% OFF
        </div>     
            </div>
          </div>
        </div>
    </a>  
    <div class="showcase-content">
        <div class="a_store_logo">
          <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
    
          <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
          </div>
          
          <a href="product_details.php?product_id=' . $product_id . '">
    
            <a class="showcase-title text_wrap">' . $product_title . '</a>
            
          </a>
          <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_link . '&store=' . $brand_id . '" target="_blank">
          <div class="price-box">
            
            <button class="btn a_btn"><span class="price">₹' . $product_price . '.00</span><br>
            <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
            
        </div></a><span class="p-0 text-secondary float-right a_updated">' . $timeago . '</span>
        </div>
        </div>';
      }
    }
  }
}

//Getting Unique Categories
function get_unique_categories()
{
  global $con, $category_title;
  if (!isset($_GET['brand'])) {
    if (isset($_GET['category'])) {
      $category_title = $_GET['category'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.category_title=$category_title AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);

      while ($row_data = mysqli_fetch_assoc($result_product)) {
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $coupon = $row_data['coupon'];
        $is_coupon = $row_data['is_coupon'];
        $product_old_price = $row_data['product_old_price'];
        $product_price = $row_data['product_price'];
        $product_keywords = $row_data['product_keywords'];
        $product_category = $row_data['product_category'];
        $product_brand = $row_data['product_brand'];
        $product_img1 = $row_data['product_img1'];
        $product_img2 = $row_data['product_img2'];
        $product_img3 = $row_data['product_img3'];
        $product_link = $row_data['product_link'];
        $product_status = $row_data['status'];
        $time = $row_data['date'];

        $num  = 0;
        if (
          $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
        ) {
          $myNumber1 = $product_old_price;
          $myNumber2 = $product_price;
          $multiply = $myNumber2 * 100;
          $answer = $multiply / $myNumber1;
          $finalanswer = 100 - $answer;
          $str = $finalanswer;
          $num = (int)$str;
        }


        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_logo = $row_data['category_logo'];
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        $brand_logo = $row_data['brand_logo'];

        $timeago = get_timeago(strtotime($time));
        if ("$product_status" == "expired") {
          $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
        } else {
          $deal_expired = ' ';
        }
        echo '

      <div class="showcase">
      <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '">
      <div class="showcase-banner">
        
        <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
        ' . $deal_expired . '
        <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
      
        <!-- <p class="showcase-badge">15%</p> -->
        <p class="showcase-badge angle orange">' . $num . '% OFF</p>
      <div class="showcase-rating">
          <img class="flame" src="assets/images/icons/flame.png" alt="">
          
          <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
          ' . $num . '% OFF
          </div>     
              </div>
            </div>
          </div>
      </a>  
      <div class="showcase-content">
          <div class="a_store_logo">
            <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
      
            <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
            </div>
            
            <a href="product_details.php?product_id=' . $product_id . '">
      
              <a class="showcase-title text_wrap">' . $product_title . '</a>
              
            </a>
            <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_link . '&store=' . $brand_id . '" target="_blank">
            <div class="price-box">
              
              <button class="btn a_btn"><span class="price">₹' . $product_price . '.00</span><br>
              <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
              
          </div></a><span class="p-0 text-secondary float-right a_updated">' . $timeago . '</span>
          </div>
          </div>';
      }
    }
  }
}
//Getting Unique Brands
function get_unique_brands()
{
  global $con;
  if (!isset($_GET['category'])) {
    if (isset($_GET['brand'])) {
      $brands_title = $_GET['brand'];
      $select_product = "Select * from `products` JOIN `category` JOIN `brands` where products.brand_title=$brands_title AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
      $result_product = mysqli_query($con, $select_product);
      while ($row_data = mysqli_fetch_assoc($result_product)) {
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $coupon = $row_data['coupon'];
        $is_coupon = $row_data['is_coupon'];
        $product_old_price = $row_data['product_old_price'];
        $product_price = $row_data['product_price'];
        $product_keywords = $row_data['product_keywords'];
        $product_category = $row_data['product_category'];
        $product_brand = $row_data['product_brand'];
        $product_img1 = $row_data['product_img1'];
        $product_img2 = $row_data['product_img2'];
        $product_img3 = $row_data['product_img3'];
        $product_link = $row_data['product_link'];
        $product_status = $row_data['status'];
        $time = $row_data['date'];

        $num  = 0;
        if (
          $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
        ) {
          $myNumber1 = $product_old_price;
          $myNumber2 = $product_price;
          $multiply = $myNumber2 * 100;
          $answer = $multiply / $myNumber1;
          $finalanswer = 100 - $answer;
          $str = $finalanswer;
          $num = (int)$str;
        }

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_logo = $row_data['category_logo'];
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        $brand_logo = $row_data['brand_logo'];

        $timeago = get_timeago(strtotime($time));
        if ("$product_status" == "expired") {
          $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
        } else {
          $deal_expired = ' ';
        }

        echo '

    <div class="showcase">
    <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '">
    <div class="showcase-banner">
      
      <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
      ' . $deal_expired . '
      <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
    
      <!-- <p class="showcase-badge">15%</p> -->
      <p class="showcase-badge angle orange">' . $num . '% OFF</p>
    <div class="showcase-rating">
        <img class="flame" src="assets/images/icons/flame.png" alt="">
        
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
        ' . $num . '% OFF
        </div>     
            </div>
          </div>
        </div>
    </a>  
    <div class="showcase-content">
        <div class="a_store_logo">
          <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
    
          <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
          </div>
          
          <a href="product_details.php?product_id=' . $product_id . '">
    
            <a class="showcase-title text_wrap">' . $product_title . '</a>
            
          </a>
          <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_link . '&store=' . $brand_id . '" target="_blank">
          <div class="price-box">
            
            <button class="btn a_btn"><span class="price">₹' . $product_price . '.00</span><br>
            <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
            
        </div></a><span class="p-0 text-secondary float-right a_updated">' . $timeago . '</span>
        </div>
        </div>';
      }
    }
  }
}

//SEARCHING PRODUCTS
function get_search_product()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];

    $search_query = "Select * from `products` JOIN `category` JOIN `brands` WHERE  products.product_title like '%$search_data_value%' AND products.category_title=category.category_id AND products.brand_title=brands.brand_id ORDER BY date desc";
    $result_product = mysqli_query($con, $search_query);

    while ($row_data = mysqli_fetch_assoc($result_product)) {
      $product_id = $row_data['product_id'];
      $product_title = $row_data['product_title'];
      $product_description = $row_data['product_description'];
      $coupon = $row_data['coupon'];
      $is_coupon = $row_data['is_coupon'];
      $product_old_price = $row_data['product_old_price'];
      $product_price = $row_data['product_price'];
      $product_keywords = $row_data['product_keywords'];
      $product_category = $row_data['product_category'];
      $product_brand = $row_data['product_brand'];
      $product_img1 = $row_data['product_img1'];
      $product_img2 = $row_data['product_img2'];
      $product_img3 = $row_data['product_img3'];
      $product_link = $row_data['product_link'];
      $product_status = $row_data['status'];
      $time = $row_data['date'];



      $num  = 0;
      if (
        $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
      ) {
        $myNumber1 = $product_old_price;
        $myNumber2 = $product_price;
        $multiply = $myNumber2 * 100;
        $answer = $multiply / $myNumber1;
        $finalanswer = 100 - $answer;
        $str = $finalanswer;
        $num = (int)$str;
      }


      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      $category_logo = $row_data['category_logo'];
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      $brand_logo = $row_data['brand_logo'];

      $timeago = get_timeago(strtotime($time));
      if ("$product_status" == "expired") {
        $deal_expired = '<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
      } else {
        $deal_expired = ' ';
      }
      echo '

<div class="showcase">
<a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '">
<div class="showcase-banner">
  
  <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
  ' . $deal_expired . '
  <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">

  <!-- <p class="showcase-badge">15%</p> -->
  <p class="showcase-badge angle orange">' . $num . '% OFF</p>
<div class="showcase-rating">
    <img class="flame" src="assets/images/icons/flame.png" alt="">
    
    <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70"
    aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
    ' . $num . '% OFF
    </div>     
        </div>
      </div>
    </div>
</a>  
<div class="showcase-content">
    <div class="a_store_logo">
      <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>

      <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
      </div>
      
      <a href="product_details.php?product_id=' . $product_id . '">

        <a class="showcase-title text_wrap">' . $product_title . '</a>
        
      </a>
      <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_link . '&store=' . $brand_id . '" target="_blank">
      <div class="price-box">
        
        <button class="btn a_btn"><span class="price">₹' . $product_price . '.00</span><br>
        <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
        
    </div></a><span class="p-0 text-secondary float-right a_updated">' . $timeago . '</span>
    </div>
    </div>';
    }
  }
}
//View Product Details
function product_details()
{
  global $con;

  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_product = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_id=$product_id AND products.product_category=category.category_id AND products.product_brand=brands.brand_id ORDER BY date desc";
        $result_product = mysqli_query($con, $select_product);

        while ($row_data = mysqli_fetch_assoc($result_product)) {
          $product_id = $row_data['product_id'];
          $product_title = $row_data['product_title'];
          $product_description = $row_data['product_description'];
          $product_posted_user = $row_data['posted_user_id'];
          $coupon = $row_data['coupon'] ?? 'No Coupon Required';
          $is_coupon = $row_data['is_coupon'];
          $product_old_price = $row_data['product_old_price'];
          $product_price = $row_data['product_price'];
          $product_keywords = $row_data['product_keywords'];
          $product_category = $row_data['product_category'];
          $product_brand = $row_data['product_brand'];
          $product_img1 = $row_data['product_img1'];
          $product_img2 = $row_data['product_img2'];
          $product_img3 = $row_data['product_img3'];
          $product_link = $row_data['product_link'];
          $product_status = $row_data['status'];
          $time = $row_data['date'];


          $approved = '';

          if ($product_status == "not_approved") {
            $approved = '<span class="a_no_result_title font-weight-bold showcase-badge mb-2"><i class="fa-solid fa-hourglass-start" style="color: #ff0000;"></i><span class="text-danger  font-italic">&nbsp  Admin Approval pending.</span><p class="text-secondary mt-2 mb-0">Note: This deal has not yet been verified by Dealhopp.</p></span>';
          } else if ($product_status == "disapprove") {
            $approved = '<span class="a_no_result_title font-weight-bold showcase-badge mb-2"><i class="fa-solid fa-circle-xmark" style="color: #ff0000;"></i><span class="text-danger  font-italic"> &nbsp Post Disapproved</span></span>';
          } else if ($product_status == "approved" || $product_status == "true") {
            $approved = '<span class="a_no_result_title font-weight-bold showcase-badge mb-2"><i class="fa-solid fa-circle-check  " style="color: #28a745;"></i><span class="text-success  font-italic">&nbsp Dealhopp Verified</span></span>';
          }    
          $num  = 0;
          if (
            $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
          ) {
            $myNumber1 = $product_old_price;
            $myNumber2 = $product_price;
            $multiply = $myNumber2 * 100;
            $answer = $multiply / $myNumber1;
            $finalanswer = 100 - $answer;
            $str = $finalanswer;
            $num = (int)$str;


            if ($str < 0) {
              $percent_off = '';
              $deal_scale = '';
              $num = '';
            } else {
              $percent_off = '<p class="a_no_result_title a_showcase-badge">' . $num . '% OFF</p>';
              $deal_scale = '
       
       <div class="progress">
       <div class="progress-bar" role="progressbar" aria-valuenow="70"
       aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
       <!--' . $num . '% OFF-->
       </div>     
       </div>';
            }
          }
          if ($product_old_price == '0') {
            $percent_off = '';
            $deal_scale = '';
            $num = '';
          }
          $category_title = $row_data['category_title'];
          $category_id = $row_data['category_id'];
          $category_logo = $row_data['category_logo'];
          $brand_title = $row_data['brand_title'];
          $brand_id = $row_data['brand_id'];
          $brand_logo = $row_data['brand_logo'];

          $select_query = "select * from `user_data` where user_id='$product_posted_user'";
          $result = mysqli_query($con, $select_query);
          $row_count = mysqli_num_rows($result);
          $row_data = mysqli_fetch_assoc($result);
          $username = $row_data['username'];
          $user_img = $row_data['user_image'];
          $user_type = $row_data['user_type'];

          $timeago = get_timeago(strtotime($time));
          if ("$product_status" == "expired" || "$product_status" == "disapprove") {
            $deal_expired = '<img draggable="false" src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="" height="350" class="a_expired2 product-img">';
            $price_expired = '<del class="price">₹' . $product_price . '.00</del>';
          } else {
            $deal_expired = '';
            $price_expired = '<p class="price">₹' . $product_price . '.00</p>';
          }
          if ($user_type == "admin") {
            $verified = '<i class="fa-solid text-orange ml-1 fa-circle-check"></i>';
          } else {
            $verified = '';
          }


          $output = '';
          if ($is_coupon != 1) {
            $output = '<div class="product-featured a_filter ">
  <div class="showcase-wrapper has-scrollbar">
      <div class="showcase-container">
      ' . $percent_off . '
          <div class="showcase">

          
              <div id="myslideshow" class="col-lg-4 p-0 carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
              <li data-target="#myslideshow" data-slide-to="0" class="active"></li>
              <li data-target="#myslideshow" data-slide-to="1"></li>
             </ol>
              <div class="skeleton carousel-inner d-flex justify-content-center align-items-center">
              ' . $deal_expired . '
                <div class="a_box carousel-item active">
                   <img draggable="false" class="content showcase-img d-block w-100" src="' . $product_img1 . '" alt="First slide">
                </div>
                <div class="a_box carousel-item">
                  <img draggable="false" class="showcase-img d-block w-100" src="' . $product_img2 . '" alt="Second slide">
                </div>
               
              </div>
              <a class="carousel-control-prev" href="#myslideshow" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#myslideshow" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
              <div class="w-100 showcase-content">
              
              
              <div class="showcase-rating">
              <img class=" flame mt-auto mr-auto" src="assets/images/icons/flame.png" alt="">
              ' . $deal_scale . '
             
                </div>
                 <div class="">
                  <a href="load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
                      <h3 class="showcase-title text_wrap2 mb-3">' . $product_title . '</h3>
                  </a>
                  </div>
                  <div class="showcase-status">
                  <div class="wrapper a_store_logo2">
          
                   <img src="./admin' . $brand_logo . '"
                  alt="' . $product_title . '" >   

                  <p class="my-auto">
                  <a  class="text-orange a_tbn"><b>' . $category_title . '</b></a>
              </p>
                  </div>         
                  
                  ' . $approved . '

                  <div class="price-box">
                  ' . $price_expired . '

                      <del class="small my-auto">₹' . $product_old_price . '.00</del>
                  </div>          

                  <div class="d-flex">
                  <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
                  <button class="add-cart-btn">&nbsp;Buy Now&nbsp;<i class="fa fa-arrow-right"></i></button>
                  </a>

                  </div>
                  
                  <p class="showcase-desc text_wrap2">( You Can Buy this Product at <b>' . $brand_title . '</b>. )<br>
                     ' . $product_description . '
                  </p>

 
                      <!--<div class="showcase-status-bar"></div>-->
                  </div>

                  <div class="countdown-box d-flex align-items-center ">

                      <p class="countdown-desc mr-auto py-2 my-auto">
                          Hurry Up! Offer can end anytime.
                      </p>
                      <span class="small py-2 text-secondary">' . $timeago . '</span>
                  </div>

              </div>

          </div>
<div class="d-flex flex-wrap">
<div class="col-md-4 d-flex justify-content-between align-items-center border border-radius-11 m-0 py-1 px-2">


<div>
<div class="img-dd tgrid-cell">
  <img draggable="false" src="' . $user_img . '" alt="Grey" height="46" width="46">
 
</div>
<div class="tgrid-cell">
<div class="promouser ml-2">
<div class="d-flex">
<span class="text-secondary  font-italic">Posted By &nbsp;</span>   <span class="text-success  font-italic">
' . $username . '' . $verified . '</span>
</div>
</div>
</div>
</div>
 
</div>

<div class="col-md-8 p-0">

 
</div>
</div>
      </div>



  </div>

</div>';
          } else {
            $output = '
              <div class="product-featured a_filter ">
  <div class="showcase-wrapper has-scrollbar">
      <div class="showcase-container">
      
          <div class="showcase">

          
            
              <div class="w-100 showcase-content">
              
              
              
                 
                      <h3 class="showcase-title text_wrap2 mb-3">' . $brand_title . ' | ' . $product_title . '</h3>
                  

<div class="d-flex justify-content-center">
  <div class="coupon_card">
    <div class="main">
      <div class="co-img">
        <img src="./admin' . $brand_logo . '" alt="" />
      </div>
      <div class="vertical"></div>
      <div class="content1">
     <p class="text_wrap mb-1">' . $category_title . '</p> 
        <h1 class="text_wrap">' . $product_title . '</h1>
          <h2 class="text_wrap">' . $brand_title . '</h2>
      </div>
    </div>
    <div class="copy-button">
      <input id="copyvalue" type="text" readonly  ondrag="return false" value=' . $coupon . ' />
    <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank" >  <button onclick="copyIt()" class="copybtn">COPY</button></a>
    </div>
  </div>
</div>

 


                  
                  <div class="showcase-status mt-4">
                  

                 
                   
                  
                  <p class="showcase-desc text_wrap2">( You can apply this coupon at <b>' . $brand_title . '</b>. )<br>
                     ' . $product_description . '
                  </p>

                      <!--<div class="showcase-status-bar"></div>-->
                  </div>

                  <div class="countdown-box d-flex align-items-center ">

                      <p class="countdown-desc mr-auto py-2 my-auto">
                          Hurry Up! Offer can end anytime.
                      </p>
                      <span class="small py-2 text-secondary">' . $timeago . '</span>
                  </div>

              </div>

          </div>
<div class="d-flex flex-wrap">
<div class="col-md-4 d-flex justify-content-between align-items-center border border-radius-11 m-0 py-1 px-2">


<div>
<div class="img-dd tgrid-cell">
  <img draggable="false" src="' . $user_img . '" alt="Grey" height="46" width="46">
 
</div>
<div class="tgrid-cell">
<div class="promouser ml-2">
<div class="d-flex">
<span class="text-secondary font-italic">Posted By &nbsp;</span>  <span class="text-success  font-italic">
' . $username . '' . $verified . '</span>
</div>
</div>
</div>
</div>
 
</div>

<div class="col-md-8 p-0">

 
</div>
</div>
      </div>



  </div>

</div>
               
              ';
          }

          echo  $output;
        }
      }
    }
  }
}
function get_related_product()
{
  global $con;
  if (isset($_GET['product_id'])) {
    $product_i = $_GET['product_id'];
    if ($_GET['title'] == '') {
      $keyword = 'loot';
    } else {
      $keyword = $_GET['title'];
      $keyword = explode(" ", $keyword);
    }
    $search_query = "Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_title like '%$keyword[0]%' AND products.product_id != '$product_i' AND products.product_category=category.category_id AND products.product_brand=brands.brand_id ORDER BY date desc";
    $result_product = mysqli_query($con, $search_query);

    if (mysqli_num_rows($result_product) == 0) {
      echo "No similar products found.";
    } else {
      while ($row_data = mysqli_fetch_assoc($result_product)) {
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $coupon = $row_data['coupon'];
        $is_coupon = $row_data['is_coupon'];
        $product_old_price = $row_data['product_old_price'];
        $product_price = $row_data['product_price'];
        $product_keywords = $row_data['product_keywords'];
        $product_category = $row_data['product_category'];
        $product_brand = $row_data['product_brand'];
        $product_img1 = $row_data['product_img1'];
        $product_img2 = $row_data['product_img2'];
        $product_img3 = $row_data['product_img3'];
        $product_link = $row_data['product_link'];
        $product_status = $row_data['status'];
        $time = $row_data['date'];




        if ($product_old_price !== '0') {
          $num  = 0;
          $str = 0;
          if (
            $product_old_price != '' && $product_price != '' &&  $is_coupon != 1
          ) {
            $myNumber1 = $product_old_price;
            $myNumber2 = $product_price;
            $multiply = $myNumber2 * 100;
            $answer = $multiply / $myNumber1;
            $finalanswer = 100 - $answer;
            $str = $finalanswer;
            $num = (int)$str;
          }

          if ($str < 0) {
            $percent_off = '';
            $deal_scale = 'style="display:none;"';
            $num = '';
          } else {
            $percent_off = '<div class="small text-orange position-absolute m-2 text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
            $deal_scale = '';
          }
        }
        if ($product_old_price == '0') {
          $percent_off = '';
          $deal_scale = 'style="display:none;"';
          $num = '';
        }

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_logo = $row_data['category_logo'];
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        $brand_logo = $row_data['brand_logo'];

        $timeago = get_timeago(strtotime($time));
        if ($product_status == "true") {


          $output = '';
          if ($is_coupon != 1) {
            $output .= '
      
<div class="showcase-container position-relative">
' . $percent_off . '
<div class="showcase   d-flex flex-column">
<div class="d-flex bg-light p-2 showcase  w-100 flex-wrap justify-content-around">

<span class="p-0  text-secondary ml-auto a_updated text_wrap flex-nowrap" style="margin-top:0.5px;">' . $timeago . '</span>
<div style="width:100%;" >
  <a href="product_details.php?product_id=' . $product_id . '&title=' . $product_title . '&detail=' . $product_keywords . '" class="mt-1 showcase-img-box">
    <img src="' . $product_img1 . '" alt="" height="160" class="mx-auto showcase-img" style="margin-top: -26px;">
  </a></div>

  
  </div>
  <div class="showcase-content p-2">
  <div class="showcase-rating d-flex">
    <img class="flame" src="assets/images/icons/flame.png" alt="">
    
    <div class="progress pl-2" ' . $deal_scale . '>
    <div class="progress-bar" role="progressbar" aria-valuenow="70"
    aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
    
    </div>     
        </div>
      </div>
  <div class="a_store_logo">
  <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>

  <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
  </div>
    <a href= "product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '" >
      <h4 class="showcase-title">' . $product_title . '</h4>
    </a>
    <div class="price-box mt-1">
      <p class="price">₹' . $product_price . '.00</p>
      <del>₹' . $product_old_price . '.00</del>
    </div>

  </div>

</div>

</div>';
          } else {
            $percent_off = '<div class="small text-orange position-absolute m-2 text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">COUPON CODE</span></div>';
            $output .= '
 <div class="showcase-container position-relative">
' . $percent_off . '
<div class="showcase   d-flex flex-column">
<div class="d-flex bg-light showcase p-2  w-100 flex-wrap justify-content-around">

<span class="p-0 text-secondary ml-auto a_updated text_wrap flex-nowrap" style="margin-top:0.5px;">' . $timeago . '</span>
<div style="width:100%;">
  <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '" class="mt-1 showcase-img-box">
    <img src="admin/' . $brand_logo . '" alt="" height="160" class="mx-auto showcase-img" style="margin-top: -26px;  
    object-fit: contain;
     
    width: -webkit-fill-available;">
  </a></div>
  </div>
  <div class="showcase-content p-2 ">
  <div class="showcase-rating d-flex">
    <img class="flame" src="assets/images/icons/flame.png" alt="">
    
    <div class="progress pl-2" ' . $deal_scale . '>
    <div class="progress-bar" role="progressbar" aria-valuenow="70"
    aria-valuemin="0" aria-valuemax="100" style="width:100%">
    
    </div>     
        </div>
      </div>
  <div class="a_store_logo">
  <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>

  <img class="ml-auto" src="admin/' . $brand_logo . '" alt="">
  </div>
    <a href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '" >
      <h4 class="showcase-title">' . $product_title . '</h4>
    </a>
    <div class="price-box bg-dealhopp text-light rounded mt-1">
  <center class="mx-auto"><span class="hide_coupon text- ">' . $coupon . '</span><span  >*****</span></center>    
    </div>

  </div>

</div>

</div>';
          }

          echo $output;
        }
      }
    }
  }
}

// get ip address function
function getIPAddress()
{
  //whether ip is from the share internet
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy
  else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address $ip:
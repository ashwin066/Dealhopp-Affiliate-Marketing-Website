<?php

include('includes/connect.php');
include('functions/common_function.php');

if (isset($_POST['action'])) {

  $sql = "SELECT * FROM `products` 
        JOIN `category` ON `category`.`category_id` = `products`.`product_category`
        JOIN `brands` ON `brands`.`brand_id` = `products`.`product_brand`
        JOIN `user_data` ON `user_data`.`user_id` = `products`.`posted_user_id`
        WHERE (`products`.`status` = 'expired' OR `products`.`status` = 'true') 
        AND `products`.`product_brand` != ''";


  if (isset($_POST['brand'])) {
    $brand = implode("','", $_POST['brand']);

    $sql .= " AND `products`.`product_brand` IN('" . $brand . "') ";
  }

  if (isset($_POST['category'])) {
    $category = implode("','", $_POST['category']);
    $sql .= " AND `products`.`product_category` IN('" . $category . "')";
  }
  if (isset($_POST['price'])) {
    $price = implode("','", $_POST['price']);
    $sql .= " AND $price ";
  }
  if (isset($_POST['search'])) {
    $search =  $_POST['search'];
    $search = trim($search, " ");
    $sql .= "AND `products`.`product_title` like '%$search%'";

    if (strlen($search) > 0) {

      echo '<span class="h5 text-center w-100 text-capitalize text-orange" style="">Search <span class="h6 text-dark">"' . $search . '" <i class="fa-solid fa-magnifying-glass"></i></span></span>';
    }
  }
  $sql .= "ORDER BY pinned DESC, DATE DESC";

  $result = $con->query($sql);
  $output = '';

  echo '<div class="product-grid">';
  if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {

      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $coupon = $row['coupon'];
      $product_old_price = $row['product_old_price'];
      $product_price = $row['product_price'];
      $product_keywords = $row['product_keywords'];
      $product_category = $row['category_title'];
      $product_brand = $row['brand_title'];
      $product_img1 = $row['product_img1'];
      $product_img2 = $row['product_img2'];
      $product_img3 = $row['product_img3'];
      $product_link = $row['product_link'];
      $product_status = $row['status'];
      $time = $row['date'];
      $pinned = $row['pinned'];
      $product_posted_user = $row['username'];
      $user_type = $row['user_type'];
      $product_posted_user_img = $row['user_image'];
      $is_coupon = $row['is_coupon'];


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
          $percent_off = '<div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
          $deal_scale = '';
        }
      }
      if ($product_old_price == '0') {
        $percent_off = '';
        $deal_scale = 'style="display:none;"';
        $num = '';
      }
      $category_title = $row['category_title'];
      $category_id = $row['category_id'];
      $category_logo = $row['category_logo'];
      $brand_title = $row['brand_title'];
      $brand_id = $row['brand_id'];
      $brand_logo = $row['brand_logo'];
      $timeago = get_timeago(strtotime($time));

      if ("$product_status" == "expired") {
        $deal_expired = '<img draggable="false" src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="256" class="a_expired product-img">';
        $price_expired = '<del class="text-white price">₹' . $product_price . '.00</del>';
      } else {
        $deal_expired = '';
        $price_expired = '<span class="price">₹' . $product_price . '.00</span>';
      }
      if ("$pinned" == "1") {
        $pin_product = ' <div class="a_pinned " aria-label="Pinned Product">
        <i class="fa fa-thumb-tack text-danger" aria-hidden="true"></i>
        </div>';
      } else {
        $pin_product = '';
      }
      if ($user_type == "admin") {
        $verified = '<i class="fa-solid text-orange ml-1 fa-circle-check"></i>';
      } else {
        $verified = '';
      }
      if ($is_coupon != 1) {
        $output .= '
      <div class="showcase">
        <div class="showcase-banner">
        <a id="add-dark-here" href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img draggable="false" src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
        ' . $deal_expired . '
        <img draggable="false" src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
        </a> 
        <!--<p class="showcase-badge">' . $num . '% OFF</p> -->
        <!--<p class="showcase-badge angle orange">' . $num . '% OFF</p>-->
         

        
        
        ' . $pin_product . '
        
        <div class=" showcase-rating">
        

        ' . $percent_off . '

        <img class="flame" src="assets/images/icons/flame.png" alt="">
        
        <div class="progress"  ' . $deal_scale . '>
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:' . $num . '%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo justify--between">
        <div class="mb-2  ">
          <a href="#" class="showcase-category text_wrap ">' . $category_title . '</a>
        </div>
        
          <div class="ml-auto">
           <img draggable="false" class=" ml-auto" src="admin' . $brand_logo . '" alt="">
          
          </div>
          </div>
          <div class="mb-2  ">

          <a href="product_details.php?product_id=' . $product_id . '">
        
            <a class="showcase-title text_wrap ">' . $product_title . '</a>
            
          </a>
          </div>
          <a style="text-decoration:none;" href="load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
          <div class="price-box ">
             <button class="btn  a_btn">' . $price_expired . '<br>
            <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
         </div></a>
        </div>
        
        <div class="promoblock">
        <div class="tgrid">
        <div class="img-dd tgrid-cell  rounded-circle">
       <!-- <a class="" rel="nofollow" href="users/user_profile.php?user=' . $product_posted_user . '">
        <img draggable="false" src="' . $product_posted_user_img . '" height="38px" width="38px">
        
        
        </a>--><img draggable="false" src="' . $product_posted_user_img . '" height="38px" width="38px"></div>
        <div class="tgrid-cell ">
        <div class="promouser ml-2 mt-1">
        <!--<a rel="nofollow" href="users/' . $product_posted_user . '" class=" text-capitalize a_tbn text-orange">
        ' . $product_posted_user . '' . $verified . '</a>-->
        <span class="mb-0 a_posted_user">' . $product_posted_user . '' . $verified . '</span>
        </div>
        <div class="promotime  ml-2 mb-0">
        
        <span class="p-0 a_updated text_wrap">' . $timeago . '</span>
        
        </div>
        </div>
        </div>
        </div>
        
        </div>
        
        ';
      } else {
        $percent_off = '<div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">COUPON CODE</span></div>';
        $output .= '
             <div class="showcase">
        <div class="showcase-banner ">
        <a id="add-dark-here" href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img  draggable="false" src="admin' . $brand_logo . '" alt="Dealhopp product Image" height="160" class="p-2 product-img default">
        ' . $deal_expired . '
        <img draggable="false" src="admin' . $brand_logo . '"  alt="Dealhopp product Image" height="160" class="p-2 product-img hover">
        </a> 
         
        
        ' . $pin_product . '
        
        <div class=" showcase-rating">
         ' . $percent_off . '
 
        <img class="flame" src="assets/images/icons/flame.png" alt="">
        
        <div class="progress"  ' . $deal_scale . '>
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:100%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo justify--between">
        <div class="mb-2  ">
          <a href="#" class="showcase-category text_wrap ">' . $category_title . '</a>
        </div>
            <div class="ml-auto">
         
          <img draggable="false" class=" ml-auto" src="admin' . $brand_logo . '" alt="">
           
          </div>
          </div>
          <div class="mb-2  ">

          <a href="product_details.php?product_id=' . $product_id . '">
        
            <a class="showcase-title text_wrap ">' . $product_title . '</a>
            
          </a>
          </div>

 


          
          <a style="text-decoration:none;" href="product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
          <div class="price-box ">
             <button class="btn  a_btn"  ><span class="hide_coupon" >' . $coupon . '</span><span>******</span><br>
             <span class="b_sc">&nbsp;View Coupon Code  <i class="fa fa-arrow-right"></i></span></button>
         </div></a>
        </div>
        
        <div class="promoblock">
        <div class="tgrid">
        <div class="img-dd tgrid-cell  rounded-circle">
       <!-- <a class="" rel="nofollow" href="users/user_profile.php?user=' . $product_posted_user . '">
        <img draggable="false" src="' . $product_posted_user_img . '" height="38px" width="38px">
        
        
        </a>--><img draggable="false" src="' . $product_posted_user_img . '" height="38px" width="38px"></div>
        <div class="tgrid-cell ">
        <div class="promouser ml-2 mt-1">
        <!--<a rel="nofollow" href="users/' . $product_posted_user . '" class=" text-capitalize a_tbn text-orange">
        ' . $product_posted_user . '' . $verified . '</a>-->
        <span class="mb-0 a_posted_user">' . $product_posted_user . '' . $verified . '</span>
        </div>
        <div class="promotime  ml-2 mb-0">
        
        <span class="p-0 a_updated text_wrap">' . $timeago . '</span>
        
        </div>
        </div>
        </div>
        </div>
        
        </div>
           
           ';
      }
    }
  } else {

    $output = '</div><div class="d-flex align-items-center justify-content-center">
    <h6 class="text-uppercase position-absolute a_no_result_title text-orange h4 text-center font-weight-bold">Houston, No Results Found<br><span style="line-height:45px;" class="text-uppercase a_small_text a_noresult_text text_wrap4">For this filter</span>
    <p class="a_small_text small a_noresult_text_2 text-capitalize text-secondary">(Try Different Keyword/Store/Category)</p></h6>
  
    <img src="assets/images/icons/no-result.svg" class="a_no_result">
  </div>';
  }

  echo $output;
}
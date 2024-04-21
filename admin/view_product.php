<div class="product-main">
    <div class="product-grid">

        <?php
    //secure

    if (!isset($_SESSION["username"])) {
      header("location: ../user_area/login.php");
    }
    if ($_SESSION['user_type'] !== 'admin') {
      header("location: ../index.php");
    }
    //secure
    include('../includes/connect.php');
    $select_product = "SELECT * FROM `products` 
        JOIN `category` ON `category`.`category_id` = `products`.`product_category`
        JOIN `brands` ON `brands`.`brand_id` = `products`.`product_brand`
        JOIN `user_data` ON `user_data`.`user_id` = `products`.`posted_user_id` WHERE products.product_category=category.category_id AND  products.product_brand=brands.brand_id ORDER BY pinned DESC, DATE DESC";
    $result_product = mysqli_query($con, $select_product);




    if ($result_product) {
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
        $product_posted_user = $row_data['username'];
        $user_type = $row_data['user_type'];
        $product_posted_user_img = $row_data['user_image'];
        if ($user_type == "admin") {
          $verified = '<i class="fa-solid text-orange ml-1 fa-circle-check"></i>';
        } else {
          $verified = '';
        }
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
            $num = '';
          } else {
            $percent_off = '<div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">' . $num . '%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
          }
        }
        if ($product_old_price == '0') {
          $percent_off = '';
          $num = '';
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
          $deal_expired = '<img src="../assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
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
          $approved = '<span class="a_no_result_title font-weight-bold showcase-badge "><i class="fa-solid fa-hourglass-start"></i><span>&nbsp  Admin Approval pending</span></span>';
        } else if ($product_status == "disapprove") {
          $approved = '<span class="a_no_result_title font-weight-bold showcase-badge "><i class="fa-solid fa-xmark"></i><span> &nbsp Post Disapproved</span></span>';
        } else if ($product_status == "approved" || $product_status == "true") {
          $approved = '<span class="a_no_result_title font-weight-bold showcase-badge bg-success bg-gradient"><i class="fa-solid fa-check"></i><span> &nbsp Verified</span></span>';
        } else if ($product_status == "expired") {
          $approved = '<span class="a_no_result_title font-weight-bold showcase-badge "><i class="fa-solid fa-store-slash"  ></i><span> &nbsp Deal Expired</span></span>';
        }
        $output = '';
        if ($product_img2 == '' || $product_img2 == null) {
          if ($product_img1 != '' || $product_img1 != null)
            $product_img2 = $product_img1;
          else
            $product_img2 = './assets/images/icons/alt.png';
        }
        if ($product_img3 == '' || $product_img3 == null) {
          if ($product_img1 != '' || $product_img1 != null)
            $product_img3 = $product_img1;
          else
            $product_img3 = 'dealhopp./assets/images/icons/alt.png';
        }
        if ($is_coupon != 1) {

          $output .=    '<div class="showcase">
  <a href="../product_details.php?product_id=' . $product_id . '&title=' . $product_title . '&detail=' . $product_keywords . '">
  <div class="showcase-banner">
  <img src=' . $product_img1 . ' alt="Dealhopp product Image" height="160" class="product-img default">
  ' . $deal_expired . '
  <img src=' . $product_img2 . ' alt="Dealhopp product Image" height="160" class="product-img hover">
  </a> 
   ' . $approved . '

  <!--<p class="showcase-badge">' . $num . '% OFF</p> -->
  <!--<p class="showcase-badge angle orange">' . $num . '% OFF</p>-->

  
  
  ' . $pin_product . '
  
  <div class="showcase-rating">
  

  ' . $percent_off . '
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
  
        <img class="ml-auto" src=".' . $brand_logo . '" alt="">
        </div>
        
        <a href="product_details.php?product_id=' . $product_id . '">
  
          <a class="showcase-title text_wrap">' . $product_title . '</a>
          
        </a>
        <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
        <div class="price-box">
          
          <button class="btn a_btn" style="border-radius:8px;">

          ' . $price_expired . '
          <del class="small">₹' . $product_old_price . '.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
          
      </div></a>
      <div class="d-flex table-responsive align-items-center">
      <button class="a_btn mt-1 mb-1"><a class="a_tbn text-white" href="index.php?updateid=' . $product_id . '">Update&nbsp;<i class="fa-solid fa-pen-to-square"></i></a></button>
      <button class="a_btn mt-1 mb-1 mx-1"><a class="a_tbn text-white" href="index.php?delete_product=' . $product_id . '">Delete&nbsp;<i class="fa-solid fa-trash"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="expired.php?expireid=' . $product_id . '">Status&nbsp;<i class="fa-solid fa-check-double"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="index.php?pin_id=' . $product_id . '">&nbsp;&nbsp;&nbsp;Pin&nbsp;&nbsp;&nbsp;<br><i class="fa-solid fa-thumb-tack" aria-hidden="true"></i></a></button>

      </div>
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
        <a id="add-dark-here" href="../product_details.php?product_id=' . $product_id . '&detail=' . $product_keywords . '&title=' . $product_title . '">
        
        <img  draggable="false" src=".' . $brand_logo . '" alt="Dealhopp product Image" height="160" class="p-2 product-img default">
        ' . $deal_expired . '
        <img draggable="false" src=".' . $brand_logo . '"  alt="Dealhopp product Image" height="160" class="p-2 product-img hover">
        </a> 
         
        
        ' . $pin_product . '  ' . $approved . '
        
        <div class=" showcase-rating">
         ' . $percent_off . '
 
        <img class="flame" src="../assets/images/icons/flame.png" alt="">
        
        <div class="progress"  >
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:100%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo">
        <a href="#" class="showcase-category text_wrap">' . $category_title . '</a>
  
        <img class="ml-auto" src=".' . $brand_logo . '" alt="">
        </div>
        
        <a href="../product_details.php?product_id=' . $product_id . '">
  
          <a class="showcase-title text_wrap">' . $product_title . '</a>
          
        </a>
        <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect=' . $product_id . '&store=' . $brand_id . '" target="_blank">
        <div class="price-box">
          
          <button class="btn a_btn" style="border-radius:8px;">

        <span class="price">' . $coupon . '</span><span class="b_sc">&nbsp;View Coupon Code  <i class="fa fa-arrow-right"></i></span></button>
          
      </div></a>
      <div class="d-flex table-responsive align-items-center">
      <button class="a_btn mt-1 mb-1"><a class="a_tbn text-white" href="index.php?updateid=' . $product_id . '">Update&nbsp;<i class="fa-solid fa-pen-to-square"></i></a></button>
      <button class="a_btn mt-1 mb-1 mx-1"><a class="a_tbn text-white" href="index.php?delete_product=' . $product_id . '">Delete&nbsp;<i class="fa-solid fa-trash"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="expired.php?expireid=' . $product_id . '">Status&nbsp;<i class="fa-solid fa-check-double"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="index.php?pin_id=' . $product_id . '">&nbsp;&nbsp;&nbsp;Pin&nbsp;&nbsp;&nbsp;<br><i class="fa-solid fa-thumb-tack" aria-hidden="true"></i></a></button>

      </div>
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

        echo $output;
      }
    }







    // print_r($product_title);
    // echo "<br>";

    // $product_img1name=$product_img1['name'];
    // $product_img1error=$product_img1['error'];
    // $product_img1tmp=$product_img1['tmp_name'];
    // $product_img1ext=explode('.',$product_img1name);
    // $product_img1check=strtolower(end($product_img1ext));
    // $product_img1extstored = array('png', 'jpg', 'jpeg');
    // if(in_array ($product_img1check,$product_img1extstored )){
    //   $destinationfile ='upload/'.$product_img1name;
    //   move_uploaded_file($product_img1tmp,$destinationfile);


    //   $q="INSERT INTO `products` ( `Product_img1`)
    // VALUES ('$product_img1name ', '$destinationfile') ";
    // $query = mysqli_query ($con, $q );
    // }

    ?>

    </div>
</div>
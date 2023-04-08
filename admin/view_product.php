<div class="product-main">
<div class="product-grid">

    <?php
    //secure

    if(!isset ($_SESSION["username"]))
    {
    header ("location: ../user_area/login.php");
    }
    if($_SESSION['user_type']!=='admin'){
      header ("location: ../index.php");
    }
    //secure
include ('../includes/connect.php');
$select_product ="Select * from `products` JOIN `category` JOIN `brands` WHERE products.product_category=category.category_id AND products.product_brand=brands.brand_id ORDER BY pinned DESC, DATE DESC";
    $result_product =mysqli_query ($con,$select_product) ;




if($result_product){
while($row_data=mysqli_fetch_assoc($result_product)){
  $product_id=$row_data['product_id'];
      $product_title=$row_data['product_title'];
      $product_description=$row_data['product_description'];
      $product_old_price=$row_data['product_old_price'];
      $product_price=$row_data['product_price'];
      $product_keywords=$row_data['product_keywords'];
      $product_category=$row_data['product_category'];
      $product_brand=$row_data['product_brand'];
      $product_img1=$row_data['product_img1'];
      $product_img2=$row_data['product_img2'];
      $product_img3=$row_data['product_img3'];
      $product_link=$row_data['product_link'];
      $product_status=$row_data['status'];
      $time=$row_data['date'];
      $pinned=$row_data['pinned'];

      if($product_old_price!=='0'){
        $myNumber1 = $product_old_price;
        $myNumber2 = $product_price;
        $multiply = $myNumber2 * 100;
        $answer = $multiply / $myNumber1;
        $finalanswer= 100 - $answer;
        $str=$finalanswer;
        $num = (int)$str;
        
        if($str<0){
          $percent_off='';
          $num='';
        }else{
         $percent_off='<div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">'.$num.'%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
        }
        }
        if($product_old_price=='0'){
          $percent_off='';
          $num='';
        }

      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      $category_logo=$row_data['category_logo'];
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      $brand_logo=$row_data['brand_logo'];
      // $select_brands="select * from `brands`";
      // $result_brands =mysqli_query($con,$select_brands);
      // $select_brands="select * from `brands` where brand_id=$product_id";
      // $result_brands =mysqli_query($con,$select_brands);
      // $row_data=mysqli_fetch_assoc($result_brands);
      // $product_id=$row_data['brand_title'];
      //  $brand_title=$row_data['brand_title'];
      //  $brand_id=$row_data['brand_id'];
      //  $brand_logo=$row_data['brand_logo'];
    
      $timeago=get_timeago(strtotime($time));
      if("$product_status"=="expired"){
        $deal_expired='<img src="../assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
        $price_expired='<del class="text-white price">₹'.$product_price.'.00</del>';
      }
      else{
        $deal_expired='';
        $price_expired='<span class="price">₹'.$product_price.'.00</span>';
      }
      if("$pinned"=="1"){
        $pin_product=' <div class="a_pinned" aria-label="Pinned Product">
        <i class="fa fa-thumb-tack text-danger" aria-hidden="true"></i>
        </div>';
      }
      else{
        $pin_product='';
      }
    

  echo'<div class="showcase">
  <a href="../product_details.php?product_id='.$product_id.'&detail='.$product_keywords.'">
  <div class="showcase-banner">
  <img src='.$product_img1.' alt="Dealhopp product Image" height="160" class="product-img default">
  '.$deal_expired.'
  <img src='.$product_img2.' alt="Dealhopp product Image" height="160" class="product-img hover">
  </a> 
  <!--<p class="showcase-badge">'.$num.'% OFF</p> -->
  <!--<p class="showcase-badge angle orange">'.$num.'% OFF</p>-->

  
  
  '.$pin_product.'
  
  <div class="showcase-rating">
  

  '.$percent_off.'
      <img class="flame" src="../assets/images/icons/flame.png" alt="">
      
      <div class="progress">
        <div class="progress-bar text_wrap" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:'.$num.'%">
       
        </div>     
      
            </div> 
          </div>
        </div>
        
        <div class="showcase-content">
        <div class="a_store_logo">
        <a href="#" class="showcase-category text_wrap">'.$category_title.'</a>
  
        <img class="ml-auto" src=".'.$brand_logo.'" alt="">
        </div>
        
        <a href="product_details.php?product_id='.$product_id.'">
  
          <a class="showcase-title text_wrap">'.$product_title.'</a>
          
        </a>
        <a style="text-decoration:none;" href="../load-deal/redirect.php?redirect='.$product_id.'&store='.$brand_id.'" target="_blank">
        <div class="price-box">
          
          <button class="btn a_btn" style="border-radius:8px;">

          '.$price_expired.'
          <del class="small">₹'.$product_old_price.'.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
          
      </div></a>
      <div class="d-flex table-responsive align-items-center">
      <button class="a_btn mt-1 mb-1"><a class="a_tbn text-white" href="index.php?updateid='.$product_id.'">Update&nbsp;<i class="fa-solid fa-pen-to-square"></i></a></button>
      <button class="a_btn mt-1 mb-1 mx-1"><a class="a_tbn text-white" href="index.php?delete_product='.$product_id.'">Delete&nbsp;<i class="fa-solid fa-trash"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="expired.php?expireid='.$product_id.'">Status&nbsp;<i class="fa-solid fa-check-double"></i></a></button>
      <button class="a_btn mt-1 mb-1 mr-1"><a class="a_tbn text-white" href="index.php?pin_id='.$product_id.'">&nbsp;&nbsp;&nbsp;Pin&nbsp;&nbsp;&nbsp;<br><i class="fa-solid fa-thumb-tack" aria-hidden="true"></i></a></button>

      </div>
      </div>
    
      <div class="promoblock">
  <div class="tgrid">
  <div class="img-dd tgrid-cell">
  <a rel="nofollow" href="/users/17417">
  <img src="../user_area/user_img/preview (24).png" height="36px" width="36px">
  
  
  </a></div>
  <div class="tgrid-cell">
  <div class="promouser">
  <a rel="nofollow" href="/users/17417" class="a_tbn text-orange ml-2">Ashwin</a>
  </div>
  <div class="promotime">
  
  <span class="p-0 text-secondary float-right a_updated ml-2">'.$timeago.'</span>
  
  </div>
  </div>
  </div>
  </div>
      </div>

  
  ';


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
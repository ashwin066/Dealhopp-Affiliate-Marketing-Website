
<?php

include ('includes/connect.php');
include ('functions/common_function.php');

get_titles();

if(isset($_POST['action'])){

  $sql = "SELECT * FROM `products` JOIN `category` JOIN `brands`
    where `products`.`product_brand`!='' and `brands`.`brand_id`=`products`.`product_brand`
    and `category`.`category_id`=`products`.`product_category`
    ";

    if(isset($_POST['brand'])){
    $brand = implode("','", $_POST['brand']); 

    $sql .= " AND `products`.`product_brand` IN('".$brand."') ";
    

    } 
    
    if(isset($_POST['category'])){
    $category = implode("','", $_POST['category']);
    $sql .= " AND `products`.`product_category` IN('".$category."')";
  
    }
    $sql .="ORDER BY pinned DESC, DATE DESC";

    $result = $con->query($sql);
    $output='';

    echo '<div class="product-grid">';
if($result->num_rows>0){ 


    while($row=$result->fetch_assoc()){ 

      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_old_price=$row['product_old_price'];
      $product_price=$row['product_price'];
      $product_keywords=$row['product_keywords'];
      $product_category=$row['category_title'];
      $product_brand=$row['brand_title'];
      $product_img1=$row['product_img1'];
      $product_img2=$row['product_img2'];
      $product_img3=$row['product_img3'];
      $product_link=$row['product_link'];
      $product_status=$row['status'];
      $time=$row['date'];
      $pinned=$row['pinned'];

      $myNumber1 = $product_old_price;
      $myNumber2 = $product_price;
      $multiply = $myNumber2 * 100;
      $answer = $multiply / $myNumber1;
      $finalanswer= 100 - $answer;
      $str=$finalanswer;
      $num = (int)$str;
      if($str<0){
        $percent_off='';
      }else{
       $percent_off='<div class="small text-orange a_dis_max mx-auto text-wrap  showcase-badge2"><span class="font-weight-bold a_no_result_title">'.$num.'%&nbsp;</span><span class="small font-weight-bold">OFF</span></div>';
      }
    

      $category_title=$row['category_title'];
      $category_id=$row['category_id'];
      $category_logo=$row['category_logo'];
      $brand_title=$row['brand_title'];
      $brand_id=$row['brand_id'];
      $brand_logo=$row['brand_logo'];

      $timeago=get_timeago(strtotime($time));
     
      if("$product_status"=="expired"){
        $deal_expired='<img src="./assets/images/icons/DEAL_EXPIRED.png" alt="Dealhopp product Image" width="300" height="264" class="a_expired product-img">';
        $price_expired='<del class="text-white price">₹'.$product_price.'.00</del>';

      }
      else{
        $deal_expired='';
        $price_expired='<span class="price">₹'.$product_price.'.00</span>';

      }
      if("$pinned"=="1"){
        $pin_product=' <div class="a_pinned" aria-label="pinned product">
        <i class="fa fa-thumb-tack text-danger" aria-hidden="true"></i>
        </div>';
      }
      else{
        $pin_product='';
      }
    

      $output .= '<div class="showcase">
        <div class="showcase-banner">
        <a href="product_details.php?product_id='.$product_id.'&detail='.$product_keywords.'&title='.$product_title.'">
        
        <img src='.$product_img1.' alt="Dealhopp product Image" height="160" class="product-img default">
        '.$deal_expired.'
        <img src='.$product_img2.' alt="Dealhopp product Image" height="160" class="product-img hover">
        </a> 
        <!--<p class="showcase-badge">'.$num.'% OFF</p> -->
        <!--<p class="showcase-badge angle orange">'.$num.'% OFF</p>-->
      
        
        
        '.$pin_product.'
        
        <div class="showcase-rating">
        

        '.$percent_off.'

        <img class="flame" src="assets/images/icons/flame.png" alt="">
        
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
        
          <img class="ml-auto" src="admin/'.$brand_logo.'" alt="">
          </div>
          
          <a href="product_details.php?product_id='.$product_id.'">
        
            <a class="showcase-title text_wrap">'.$product_title.'</a>
            
          </a>
          <a style="text-decoration:none;" href="load-deal/redirect.php?redirect='.$product_id.'&store='.$brand_id.'" target="_blank">
          <div class="price-box">
            
            <button class="btn a_btn">'.$price_expired.'<br>
            <del class="small">₹'.$product_old_price.'.00</del><span class="b_sc">&nbsp;Buy Now  <i class="fa fa-arrow-right"></i></span></button>
            
        </div></a>
        </div>
        
        <div class="promoblock">
        <div class="tgrid">
        <div class="img-dd tgrid-cell">
        <a rel="nofollow" href="/users/17417"><img src="user_area/user_img/preview (24).png" alt="Grey">
        
        
        </a></div>
        <div class="tgrid-cell">
        <div class="promouser">
        <a rel="nofollow" href="/users/17417" class="a_tbn text-orange">Ashwin</a>
        </div>
        <div class="promotime">
        
        <span class="p-0 text-secondary float-right a_updated text_wrap">'.$timeago.'</span>
        
        </div>
        </div>
        </div>
        </div>
        
        </div>
        ';
}

}


else {      

    $output='</div><div class="d-flex align-items-center justify-content-center">
    <h6 class="text-uppercase position-absolute a_no_result_title text-orange h4 text-center font-weight-bold">Houston, No Results Found<br><span style="line-height:45px;" class="text-uppercase a_small_text text-dark text_wrap4">For this filter</span>
    <p class="a_small_text small text-capitalize text-secondary">(Try Different Store/Category)</p></h6>
  
    <img src="assets/images/icons/no-result.svg" class="a_no_result">
  </div>';
}

echo $output;
}
?>
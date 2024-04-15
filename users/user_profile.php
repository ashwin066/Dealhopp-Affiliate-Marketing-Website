<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>
<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Your Profile</title>
  <!-- Bootstrap CSS -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/profile_pic.css">
  <link rel="stylesheet" href="../assets/css/profile.css">
  <link rel="stylesheet" href="../assets/css/style-prefix.css">

</head>

<body>

  <?php
  get_back_to_top();
  get_slide_notify();
  ?>
  <?php include '../parts/nav.php' ?>
  <!--card-1-->

  <!--card-2-->
  <div class="container">
    <?php



    if (isset($_GET['user'])) {
      $username = $_GET['user'];
      $select_query = "select * from `user_data` where username='$username'";
      $result = mysqli_query($con, $select_query);
      $row_count = mysqli_num_rows($result);
      $row_data = mysqli_fetch_assoc($result);
      $user_id = $row_data['user_id'];
      $user_img = $row_data['user_image'];
      $user_type = $row_data['user_type'];
      if ($user_type == "admin") {
        $verified = '<i class="fa-solid text-orange ml-1 fa-circle-check"></i>';
      } else {
        $verified = '';
      }

      echo '  <div class="a_filter p-2">
    
    
     
     <div class="a_df pb-2" style="border-bottom:1px solid var(--sonic-silver); border-radius: 11px;">
     
      <div class="d-flex a_user_card a_df2 my-auto p-3 align-items-center">
      
 
      <div class="image-upload">
      <label for="file-input">
      <img  id="previewImg"  src="' . $user_img . '" alt="profile-pic" class="mr-3 profile">
      </label>
   </form>   
   </div>




      <div class="d-flex w-100 flex-column">
    <div class="d-flex">
    
     <h5 class="title-2 text-capitalize">' . $username . '' . $verified . '</h5>
   
</div>
<div class="d-flex">
 
</div>
<div class="d-flex mt-1">
<p class="text-left mt-1 small title-2 a_user_bio">You are a Smart Shopper</p>


</div>
 
      </div>
      </div>

      <div class="a_df2 px-3 pt-2 d-flex py-0 my-auto justify-content-center">
        <div class="grid-2">
          <button class="color-b mx-auto circule"><i class="fab fa-dribbble fa-2x"></i></button>
          <h3 class="mt-1 mb-0 title-2">12.3k</h3>
          <p class="followers my-0 title-2">Followers</p>
        </div>
        <div class="grid-2">
          <button class="color-c mx-auto circule"><i class="fab fa-behance fa-2x"></i></button>
          <h3 class="mt-1 mb-0 title-2">16k</h3>
          <p class="followers my-0 title-2">Followers</p>
        </div>
        <div class="grid-2">
          <button class="color-d mx-auto circule"><i class="fab fa-github-alt fa-2x"></i></button>
          <h3 class="mt-1 mb-0 title-2">17.8k</h3>
          <p class="followers my-0 title-2">Followers</p>
        </div>
      </div>
     
    </div>
    <div class="mb-2 d-flex justify-content-center"  style="border-bottom:1px solid var(--sonic-silver); border-radius: 11px;">

    <h2 class="title my-2 text-capitalize font-weight-bold">Posts by ' . $username . ' <i class="fa text-orange fa-border-all"></i></h2>
  
  </div>
<div class="mx-auto d-flex justify-content-center">
  <img src="./assets/images/icons/arrow.gif" alt="" class="mx-auto" id="loading" height="180" style="display:none; position:absolute; z-index: 20;">
</div>
';
    }

    ?>


    <?php
    get_public_user_products();
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" crossorigin="anonymous" defer></script>
    <script>
      $(document).ready(function() {
        $('.slider-for').slick({
          infinite: true,

        });
      });
    </script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/dark-theme.js"></script>
    <script src="../assets/js/back_to_top.js"></script>

</body>

</html>
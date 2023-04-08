<?php
//includeing connect.php
session_start();
include ('../includes/connect.php');
include ('../functions/common_function.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style-prefix.css">
    <link rel="stylesheet" href="../assets/css/animate_bg.css">

    <title>User Registration</title>
    <style>
    </style>
</head>
<body>

<?php include '../parts/nav.php'?>
<?php
if(isset($_GET['loading'])){
    echo'<div class="w-100">
    <img class="pt-4 mx-auto"  src="../assets/images/icons/arrow.gif" width="200">
    </div>';
}else if(isset($_SESSION['username'])){
    echo'<meta http-equiv="refresh" content="0; URL=../index.php" />';

}
else{
    global $con;
    //index.php
    
    //Include Configuration File
    include('../google_config.php');
    
    $login_button = '';
    
    
    if(isset($_GET["code"]))
    {
    
     $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    
    
     if(!isset($token['error']))
     {
     
      $google_client->setAccessToken($token['access_token']);
    
     
      $_SESSION['access_token'] = $token['access_token'];
    
    
      $google_service = new Google_Service_Oauth2($google_client);
    
     
      $data = $google_service->userinfo->get();
    
     
      if(!empty($data['given_name']))
      {
       $_SESSION['user_first_name'] = $data['given_name'];
      }
    
      if(!empty($data['family_name']))
      {
       $_SESSION['user_last_name'] = $data['family_name'];
      }
    
      if(!empty($data['email']))
      {
       $_SESSION['user_email_address'] = $data['email'];
      }
    
      if(!empty($data['gender']))
      {
       $_SESSION['user_gender'] = $data['gender'];
      }
    
      if(!empty($data['picture']))
      {
        $_SESSION['user_image'] = $data['picture'];
    
      }
     }
    }
    
    
    if(!isset($_SESSION['access_token']))
    {
    
     $login_button = '<a href="'.$google_client->createAuthUrl().'" class="google text-dark border d-flex align-items-center w-100 border-radius-18 mt-2 btn font-weight-bold"><img height="34" class="bg-light border p-1 mr-2 rounded-circle" src="../assets/images/icons/Google.png"> <p class="my-0 mx-auto">Login with Google</p>
            </a>';
    }
    
       if($login_button == '')
       {
        $username=$_SESSION['user_first_name'];
        $userlastname=$_SESSION['user_last_name'];
        $user_email=$_SESSION['user_email_address'];
     
        $user_ip=getIPAddress();
        $select1_query="select * from `user_data` where user_email='$user_email'";
        $result1=mysqli_query($con,$select1_query);
        $row_count1=mysqli_num_rows($result1);
        $row_data=mysqli_fetch_assoc($result1);
        
    if($row_count1>0){
      $user_image=$row_data['user_image'];
    
    }else{
      $user_image='';
    
    }
        if($row_count1>0){
          $select_image_query="select user_image from `user_data` where user_image='$user_image'";
          $result_image=mysqli_query($con,$select_image_query);
          $row_image_count=mysqli_num_rows($result_image);
          $row_data=mysqli_fetch_assoc($result_image);
      
          if($row_image_count>0){
           
            $_SESSION['user_image'] = $row_data['user_image'];
          }
            
              
         
        }else{
          $_SESSION['user_image'] = $data['picture'];
            $google_img=$_SESSION['user_image'];
          $insert_query="insert into `user_data` (username, user_email, user_ip, user_image) 
          values ('$username','$user_email','$user_ip','$google_img')";
          
    $sql_execute=mysqli_query($con,$insert_query);
     
        }
       
         $select_all_query="select * from `user_data` where user_email='$user_email'";
         $result3=mysqli_query($con,$select_all_query);
    
        $row_data=mysqli_fetch_assoc($result3);
        $user_type=$row_data['user_type'];
        $user_id=$row_data['user_id'];
        $_SESSION['username']="$username";
         $_SESSION['user_id']="$user_id";
        $_SESSION['user_type']="$user_type";
       }
    
echo'
<div class="context">
      
    </div>


<div class="area" >
            <ul class="circles m-0">
           
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <div class="container noselect">
    <div>
        <div class="col-md-12">
            <div class="row">
                <div class="mx-auto">
                <div class="card border-radius-18 a_login d-flex flex-row">
                        <div class="card-header p-2 a_card_head">
                            <h4 class="text-white font-weight-bold">SIGNUP</h4>
                        </div>
                        <div class="card-body d-flex">
                            <form class="form" role="form" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" autocomplete=off class="form-control" name="username" placeholder="User Name" required="" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="user_email">Email</label>
                                    <input type="email" class="form-control" name="user_email" placeholder="Email@gmail.com" required="">
                                </div>
                                <div class="form-group">
                                    <label for="user_mobile">Mobile</label>
                                    <input type="tel" class="form-control" name="user_mobile" placeholder="Mobile No." required="">
                                </div>
                                <div class="form-group">
                                    <label for="user_password">Password</label>
                                    <input type="password" class="form-control" name="user_password" placeholder="password" title="At least 6 characters with letters and numbers" required="">
                                </div>
                                <div class="form-group">
                                    <label for="conf_user_password">Verify</label>
                                    <input type="password" class="form-control" name="conf_user_password" placeholder="password (again)" required="">
                                </div>
                                <div class="vl my-4 rounded d-sm-block d-md-none d-lg-none d-xl-none">
                                <span class="vl-innertext">or</span>
                              </div>
                              <div class="d-sm-block d-md-none d-lg-none d-xl-none">
                              '.$login_button.'
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="user_register" value="REGISTER" class="btn a_btn2 text-white btn-lg float-right">
                                </div><br>
                                <span class="float-right mt-2 small text-muted">Have an account?&nbsp;&nbsp;<a href="./login.php"
                                class="text-orange float-right">Login</a></span>
                            </form>
                            </form>
                            <div class="vl2 my-auto mx-4 rounded  d-none d-md-block">
      <span class="vl2-innertext">or</span>
    </div>
    <div class="d-none d-md-block">
    <div class="d-flex h-100 justify-content-center flex-column">
    '.$login_button.'
    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    <div class="p-4 w-100"><img class="mx-auto" src="../assets/images/logo/logo-white.png" alt="" width="250"></div>
            </ul>
    </div >
</div>
<!--/container-->
                    
    ';}
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['user_register'])){
   $username=$_POST['username'];
   $user_email=$_POST['user_email'];
   $user_mobile=$_POST['user_mobile'];
   $user_password=$_POST['user_password'];
   $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
   $conf_user_password=$_POST['conf_user_password'];
   $user_ip=getIPAddress();


$select_query="select * from `user_data` where username='$username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
echo "<script>alert('Username or Email alredy exists')</script>";
echo "<script>window.open('../user_area/registration.php', '_self')</script>";

}
else if ($user_password!=$conf_user_password) { echo "<script> alert('Passwords do not match') </script>";
}
else{
// insert_query  
$insert_query="insert into `user_data` (username, user_email, user_mobile, user_password, user_ip) 
values ('$username','$user_email','$user_mobile', '$hash_password', '$user_ip')";

$sql_execute=mysqli_query($con,$insert_query);
if($sql_execute){

    echo "<script>
        window.open('./login.php', '_self');
      </script>";

}}}
?>
<?php
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/profile_pic.css">

  <link rel="stylesheet" href="../assets/css/profile.css">
  <link rel="stylesheet" href="../assets/css/style-prefix.css">
  <title>Your Profile</title>
</head>

<body>

<?php include '../parts/nav.php'?>

  <?php
 if(isset($_SESSION['username']))
 {
   $username=$_SESSION['username'];
   $select_query="select * from `user_data` where username='$username'";
   $result=mysqli_query($con,$select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);
   $user_image=$row_data['user_image'];
   $user_email=$row_data['user_email'];
   $user_mobile=$row_data['user_mobile'];
   $_SESSION['user_image']="$user_image";
   $_SESSION['user_email']="$user_email";
   $_SESSION['user_mobile']="$user_mobile";
  echo '
  <div class="container" style="margin-top: 80px;">
  <div class="d-flex">
  <ul>
<li class="mr-auto">  <a href="profile.php" class="a_tbn"><i class="fa-solid text-orange h3 m-0 fa-circle-arrow-left"></i></a></li>
     
       
      </ul>
     </div>
      
 
 
   <form method="post" enctype="multipart/form-data">
   <div class="profile-pic-div mx-auto">
   <img src="'.$_SESSION['user_image'].'" id="photo">
   <input type="file" id="file" name="user_image">
   <label for="file" id="uploadBtn" class="" style="opacity:30%;"><i class="fa fa-camera"></i></label>
   </div>
                               <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" disabled="disabled" class="form-control" name="username" placeholder="User Name" value="'.$_SESSION['username'].'">
                                </div>
                                <div class="form-group">
                                    <label for="user_email">Email</label>
                                    <input type="email" disabled="disabled" class="form-control" name="user_email" placeholder="Email@gmail.com" value="'.$_SESSION['user_email'].'" >
                                </div>
                                <div class="form-group">
                                    <label for="user_mobile">Mobile</label>
                                    <input type="tel" disabled="disabled" class="form-control" name="user_mobile" placeholder="Mobile No." value="'.$_SESSION['user_mobile'].'" >
                                </div>
                               
                                <div class="form-group">
                                    <input type="submit" name="save" value="Update" class="btn a_btn h4 btn-lg float-right">
                                </div>

   </form>   


     
 
        ';
        if(isset($_POST['save'])){
            global $con;
              $profile_pic=$_FILES['user_image'];
         
              //Select data from db
          
              $select_query="select * from `user_data` where username='$username'";
              $result=mysqli_query($con,$select_query);
              $row_count=mysqli_num_rows($result);
             
            
              $profile_pic_filename=$profile_pic['name']; 
               $profile_pic_fileerror=$profile_pic['error']; 
            
              $profile_pic_filetmp=$profile_pic['tmp_name'];
            
              $profile_pic_name_separate=explode('.',$profile_pic_filename);
            
              $profile_pic_extension=strtolower(end($profile_pic_name_separate));
            
              $extension = array('png', 'jpg', 'jpeg','webp','gif','jfif','svg');
              if(in_array ($profile_pic_extension,$extension)){
                $upload_logo ='/dealhopp/user_area/user_img/'.$profile_pic_filename.'';
                move_uploaded_file($profile_pic_filetmp,$upload_logo);
                
                $insert_query="update `user_data` set user_image='$upload_logo' where username='$username'";
                $result=mysqli_query($con,$insert_query);
                if($result){
                  echo '<meta http-equiv = "refresh" content = "0.2; url = ../index.php" />';
                }else{
                  die(mysqli_error($con));
                }
              } 
                  else{
                    echo '<meta http-equiv = "refresh" content = "0.2; url = login.php" />';
                   } }
                }




?>


  <script src="../assets/js/app.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <!-- <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
              var reader = new FileReader();

              reader.onload = function(){
                  $("#previewImg").attr("src", reader.result);
              }

              reader.readAsDataURL(file);
            }
        }
    </script> -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">

</body>

</html>
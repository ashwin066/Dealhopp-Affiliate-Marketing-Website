     <?php

        include('../includes/connect.php');

        //secure

        if (!isset($_SESSION["username"])) {
            header("location: ../user_area/login.php");
        }
        if ($_SESSION['user_type'] !== 'admin') {
            header("location: ../index.php");
        }

        //secure

        $product_id = $_GET['updateid'];
        $sql = "select * from `products` where product_id=$product_id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_old_price = $row['product_old_price'];
        $product_description = $row['product_description'];
        $product_img1 = $row['product_img1'];
        $product_img2 = $row['product_img2'];
        $product_img3 = $row['product_img3'];
        $product_link = $row['product_link'];
        $product_price = $row['product_price'];
        $product_keywords = $row['product_keywords'];
        $status = $row['status'];
        $is_coupon = $row['is_coupon'];
        $product_posted_user = $row['posted_user_id'];
        if (isset($_POST['content_type'])) {
            $is_coupon =  $_POST['content_type'];
        }
        if (isset($_POST['submit'])) {
            $Product_title = $_POST['product_title'];
            $Product_old_price = $_POST['product_old_price'];
            $Product_description = $_POST['product_description'];
            $product_img1 = $_POST['product_img1'];
            $product_img2 = $_POST['product_img2'];
            $product_img3 = $_POST['product_img3'];
            $product_link = $_POST['product_link'];
            $product_price = $_POST['product_price'];
            $product_keywords = $_POST['product_keywords'];

            $status = $_POST['status'];
            if ($is_coupon == null) {
                $is_coupon = 0;
            }


            // echo '<h1 class="text-light">Entered Productsrmation :</h1>';
            // echo $Product_title;
            // echo '<br>';
            //  echo '<br>';
            // echo $Product_old_price;
            // echo '<br>';
            //  echo '<br>';
            // echo $Product_description;
            // echo '<br>';
            //  echo '<br>';
            // print_r($Product_img1);
            // echo '<br>';
            //  echo '<br>';

            //   $Product_img1_filename=$Product_img1['name']; 
            //   // print_r($Product_img1_filename);
            //   // echo '<br>';
            //   $Product_img1_fileerror=$Product_img1['error']; 
            //   // print_r($Product_img1_fileerror);
            //   // echo '<br>';
            //   $Product_img1_filetmp=$Product_img1['tmp_name'];
            //   // print_r($Product_img1_filetmp);
            //   // echo '<br>';
            //   $Product_img1_name_separate=explode('.',$Product_img1_filename);
            //   // print_r($Product_img1_name_separate);
            //   // echo '<br>';
            //   $Product_img1_extension=strtolower(end($Product_img1_name_separate));
            //   // print_r($Product_img1_extension);
            //   $extension = array('png', 'jpg', 'jpeg','webp','gif','jfif');
            //   if(in_array ($Product_img1_extension,$extension)){
            //     $upload_image ='upload/'.$Product_img1_filename;
            //     move_uploaded_file($Product_img1_filetmp,$upload_image);

            $sql = "update `products` set status='$status',product_keywords='$product_keywords',product_id=$product_id,Product_title='$Product_title',Product_old_price='$Product_old_price',Product_description='$Product_description',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_link='$product_link',is_coupon = $is_coupon,product_price='$product_price' where product_id=$product_id ";
        }
        //  $sql="update `products` set id=$product_id,Product_title='$Product_title',Product_old_price='$Product_old_price',Product_description='$Product_description',Product_img1='$upload_image' where id=$product_id";
        //  $result=mysqli_query($con,$sql);
        //  if($result){
        //    echo "<p>Data Updated Successfully</p>";

        //  }
        //  else{
        //    die(mysqli_error($con));
        //  }

        //?products=added
        //   header("location:index3.php");
        // }
        ?>

     <div class="container card w-100 bg-light p-4">
         <h2 class="text-center">Update Product</h2>
         <form method="post" enctype='multipart/form-data'>
             <label for="product_title">This Deal/oupon was posted by user with id :
                 <?php echo $product_posted_user; ?></label><br>
             <div class="form-group"> <label for="product_title">This is a</label><br>
                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="content_type" id="is_product_selected" value="0"
                         <?php echo ($is_coupon != 1) ? 'checked' : '' ?> />
                     <label class="form-check-label" for="is_product_selected">Product</label>
                 </div>

                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="content_type" id="is_coupon_selected" value="1"
                         <?php echo ($is_coupon == 1) ? 'checked' : '' ?> />
                     <label class="form-check-label" for="is_coupon_selected">Coupon</label>
                 </div>
             </div>
             <div class="form-group">
                 <label for="product_title">Product Title</label>
                 <input type="text" class="form-control" name="product_title" id="product_title"
                     placeholder="Product Title" value="<?php echo $product_title; ?>">
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label class="text-danger">Old Price</label>
                     <input type="text" class="form-control" id="product_old_price" name="product_old_price"
                         placeholder="Old Price" value="<?php echo $product_old_price; ?>">
                 </div>
                 <div class="form-group col-md-6">
                     <label class="text-success">New Price</label>
                     <input type="text" class="form-control" id="product_price" name="product_price"
                         placeholder="New Price" value="<?php echo $product_price; ?>">
                 </div>
             </div>

             <div class="form-group">
                 <label for="description">Description</label>
                 <textarea type="textarea" class="form-control" id="product_description" name="product_description"
                     placeholder="Description..."><?php echo $product_description; ?></textarea>
             </div>

             <!--keywords -->
             <div class="form-group">
                 <label for="product_keywords " class="form-label"> Product
                     Keywords</label>
                 <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                     placeholder="Enter product keywords" autocomplete="on" required="required"
                     value="<?php echo $product_keywords; ?>">
             </div>

             <div class="form-group">
                 <label for="product_link " class="form-label "> Product
                     Link</label>
                 <input type="text" name="product_link" id="product_link" class="form-control"
                     placeholder="Enter product link" autocomplete="off" required="required"
                     value="<?php echo $product_link; ?>">
             </div>



             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="inputState">Select Category</label>
                     <select id="category_title" name="category_title" class="form-control">

                         <?php
                            $select_category = "Select * from `category` ";
                            $result_category = mysqli_query($con, $select_category);
                            while ($row_data = mysqli_fetch_assoc($result_category)) {
                                $category_title = $row_data['category_title'];
                                $category_id = $row_data['category_id'];
                                $category_logo = $row_data['category_logo'];
                                echo  "<option value='$category_id'>$category_title</option>";
                            }
                            ?>


                     </select>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="inputState">Select Brand(Store)</label>
                     <select id="brand_title" name="brand_title" class="form-control">
                         <?php
                            $select_brands = "Select * from `brands` ";
                            $result_brands = mysqli_query($con, $select_brands);
                            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                                $brand_title = $row_data['brand_title'];
                                $brand_id = $row_data['brand_id'];
                                $brand_logo = $row_data['brand_logo'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                            ?>
                     </select>
                 </div>
             </div>

             <div class="form-row">

                 <div class="form-group showcase-banner col-md-4">
                     <label for="product_img">Product Image 1</label>
                     <input type="text" class="form-control" id="product_img1" name="product_img1"
                         placeholder="Paste Product Image Link Here..." required="required"
                         value="<?php echo $product_img1; ?>">
                     <img src="<?php echo $product_img1; ?>" alt="" class="mt-1 border border-secondary rounded mx-auto"
                         height="100">
                 </div>

                 <div class="form-group showcase-banner col-md-4">
                     <label for="product_img">Product Image 2(Optional)</label>
                     <input type="text" class="form-control" id="product_img2" name="product_img2"
                         placeholder="Paste Product Image Link Here..." value="<?php echo $product_img2; ?>">
                     <img src="<?php echo $product_img2; ?>" alt="" class="mt-1 border border-secondary rounded mx-auto"
                         height="100">
                 </div>

                 <div class="form-group showcase-banner col-md-4">
                     <label for="product_img">Product Image 3(Optional)</label>
                     <input type="text" class="form-control" id="product_img3" name="product_img3"
                         placeholder="Paste Product Image Link Here..." value="<?php echo $product_img3; ?>">
                     <img src="<?php echo $product_img3; ?>" alt="" class="mt-1 border border-secondary rounded mx-auto"
                         height="100">
                 </div>



                 <div class="col-md-6">
                     <label for="status" class="form-label">status</label>

                     <select name="status" id="status">
                         <option value="expired" <?php if ($status === 'expired') echo 'selected'; ?>>expired</option>
                         <option value="true" <?php if ($status === 'true') echo 'selected'; ?>>true</option>
                         <option value="not_approved" <?php if ($status === 'not_approved') echo 'selected'; ?>>
                             not_approved</option>
                         <option value="approved" <?php if ($status === 'approved') echo 'selected'; ?>>approved
                         </option>
                         <option value="disapprove" <?php if ($status === 'disapprove') echo 'selected'; ?>>
                             disapprove
                         </option>
                     </select>


                 </div>



                 <div class="col-12">
                     <br><button type="submit" name="submit" class="btn a_btn">Update</button>



                     <?php
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            echo '<p class="text-success">&nbsp;Data was inserted successfully</p>';
                        } else {
                            die(mysqli_error($con));
                        }
                        ?>





                 </div>
         </form>
     </div>
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
$product_posted_at = $row['date'];
$product_posted_user = $row['posted_user_id'];
$coupon = $row['coupon'];


if (isset($_POST['content_type'])) {
    $is_coupon = $_POST['content_type'];
    //js below
}
 $stmt=null;
if (isset($_POST['submit'])) {
    // Retrieve form data
    $product_title = $_POST['product_title'];
    $product_old_price = floatval($_POST['product_old_price']); // Convert to float
    $product_description = $_POST['product_description'];
    $product_img1 = $_POST['product_img1'];
    $product_img2 = $_POST['product_img2'];
    $product_img3 = $_POST['product_img3'];
    $product_link = $_POST['product_link'];
    $product_price = floatval($_POST['product_price']); // Convert to float
    $product_keywords = $_POST['product_keywords'];
    $coupon = $_POST['coupon'];
    $status = $_POST['status'];





    // Prepare the SQL update statement using prepared statements
    $sql1 = "UPDATE `products` SET 
                coupon=?, 
                status=?, 
                product_keywords=?,
                Product_title=?,
                Product_old_price=?,
                Product_description=?,
                product_img1=?,
                product_img2=?,
                product_img3=?,
                product_link=?,
                is_coupon=?,
                product_price=? 
            WHERE product_id=?";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql1);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssdssssssdi", $coupon, $status, $product_keywords, $product_title, $product_old_price, $product_description, $product_img1, $product_img2, $product_img3, $product_link, $is_coupon, $product_price, $product_id);

}
?>

<div class="container card w-100 bg-light p-4">
    <h2 class="text-center">Update Product</h2>
    <form method="post" enctype='multipart/form-data'>

        <label for="product_title">This Deal was posted by user with id :
            <?php echo $product_posted_user; ?></label><br> <label for="product_title">Posted at
            :
            <?php echo $product_posted_at; ?></label><br><br>
        <div class="form-group">
            <label for="product_title">This is a</label><br>
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
            <label for="product_title">Product/Coupon Title</label>
            <input type="text" class="border-secondary a_category-item px-2" name="product_title" id="product_title"
                placeholder="Enter the title here..." value="<?php echo $product_title; ?>">
        </div>

        <div class="row product_input_field">
            <div class="form-group col-md-6">
                <label class="text-danger">Old Price</label>
                <input type="text" class="a_category-item px-2 border-danger" id="product_old_price"
                    name="product_old_price" placeholder="Enter old price (MRP)"
                    value="<?php echo $product_old_price; ?>">
            </div>
            <div class="form-group col-md-6">
                <label class="text-success">New Price</label>
                <input type="text" class="a_category-item px-2 border-success" id="product_price" name="product_price"
                    placeholder="Enter new price (Offer price)" value="<?php echo $product_price; ?>">
            </div>
        </div>

        <div class="form-row coupon_input_field_field <?php echo ($is_coupon == 1) ? '' : 'd-none'; ?>">
            <div class="form-group col-md-6">
                <label class="text-success">Coupon</label>
                <input type="text" class="a_category-item px-2 border-success" id="coupon" name="coupon"
                    placeholder="Enter Coupon Here" value="<?php echo $coupon; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="textarea" class="w-100 a_category-item px-2 border-secondary" id="product_description"
                name="product_description"
                placeholder="Enter the description here..."><?php echo $product_description; ?></textarea>
        </div>

        <div class="row">
            <!--keywords -->
            <div class="form-group col-md-6">
                <label for="product_keywords" class="form-label "> Product/Coupon Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords"
                    class="border-secondary a_category-item px-2"
                    placeholder="Enter keywords ( Example: Mobile, Smartphone,etc. )" autocomplete="on"
                    value="<?php echo $product_keywords; ?>">
            </div>

            <div class="form-group col-md-6 product_input_field">
                <label for="product_link " class="form-label"> Product Link</label>
                <input type="text" name="product_link" id="product_link" class="border-secondary a_category-item px-2"
                    placeholder="Enter product link here..." autocomplete="off" value="<?php echo $product_link; ?>">
            </div>
        </div>

        <div class="form-row  mt-3 mb-2">
            <div class="form-group col-md-3">
                <label for="inputState">Select Category</label>
                <select id="category_title" name="product_category" class="a_category-item px-2 border-secondary">
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
            <div class="form-group col-md-3">
                <label for="inputState">Select Brand(Store)</label>
                <select id="product_brand" name="product_brand" class="a_category-item px-2 border-secondary">
                    <?php
                    $select_brands = "Select * from `brands` ";
                    $result_brands = mysqli_query($con, $select_brands);
                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        $brand_logo = $row_data['brand_logo'];
                        $brand_url = $row_data['brand_url'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="status" class="form-label">Status</label>

                <select name="status" id="status" class="a_category-item px-2 border-secondary">
                    <option value="expired" <?php if ($status === 'expired') echo 'selected'; ?>>expired</option>
                    <option value="not_approved" <?php if ($status === 'not_approved') echo 'selected'; ?>>
                        not_approved</option>
                    <option value="true" <?php if ($status === 'true') echo 'selected'; ?>>approved
                    </option>
                    <option value="disapprove" <?php if ($status === 'disapprove') echo 'selected'; ?>>
                        disapprove
                    </option>
                </select>


            </div>
        </div>

        <div class="form-row product_images_input product_input_field">
            <div class="form-group col-md-4">
                <label for="product_img">Product Image 1</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img1" name="product_img1"
                    placeholder="Paste Product Image Link Here..." value="<?php echo $product_img1; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="product_img">Product Image 2(Optional)</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img2" name="product_img2"
                    placeholder="Paste Product Image Link Here..." value="<?php echo $product_img2; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="product_img">Product Image 3(Optional)</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img3" name="product_img3"
                    placeholder="Paste Product Image Link Here..." value="<?php echo $product_img3; ?>">
            </div>
        </div>

        <div class="col-12">
            <br><button type="submit" name="submit" class="btn a_btn">Update</button>
            <?php
            // Check if price and old price are valid
            // Validate MRP and price
            if (isset($_POST['submit']))  if ((int)$is_coupon !=  1) {
                if ($product_old_price <= 0 || $product_price <= 0 || $product_price >= $product_old_price) {
            ?><script>
            alert('Invalid MRP or price. Please provide valid values. ❌');
            </script><?php
                                exit; // Stop further execution
                            }
                        }

                        // Validate URLs
                        if (isset($_POST['submit']))  if ((int)$is_coupon !=  1) {

                            if (
                                !filter_var($product_img1, FILTER_VALIDATE_URL) && $product_img1 != '' ||
                                !filter_var($product_img2, FILTER_VALIDATE_URL) && $product_img2 != '' ||
                                !filter_var($product_img3, FILTER_VALIDATE_URL) && $product_img3 != '' ||
                                !filter_var($product_link, FILTER_VALIDATE_URL) && $product_link != ''
                            ) {

                                ?><script>
            alert('Invalid URL format. Please provide valid URLs. ❌');
            </script><?php
                                exit; // Stop further execution
                            }
                        }

                        // Validate other fields if needed
                        if (isset($_POST['submit']))
                             mysqli_stmt_execute($stmt);

                        if (isset($_POST['submit']))
                            if (mysqli_stmt_affected_rows($stmt) > 0) {
                                ?><script>
            alert('Data was inserted successfully ✅');
            </script><?php
                            } else {
                            ?><script>
            alert('Something went wrong! ❌');
            </script><?php
                            }
                            ?>

        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Initial state
    if ($('input[name="content_type"]:checked').val() == 1) {
        $('.coupon_input_field_field').removeClass('d-none');
        $('.product_input_field').addClass('d-none');
    } else {
        $('.coupon_input_field_field').addClass('d-none');
        $('.product_input_field').removeClass('d-none');
    }

    // Change event handler
    $('input[name="content_type"]').change(function() {
        if ($(this).val() == 1) {
            $('.coupon_input_field_field').removeClass('d-none');
            $('.product_input_field').addClass('d-none');
        } else {
            $('.coupon_input_field_field').addClass('d-none');
            $('.product_input_field').removeClass('d-none');
        }
    });
});
</script>
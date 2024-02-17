<?php
//secure

// if(!isset ($_SESSION["username"]))
// {
// header ("location: ../user_area/login.php");
// }
// if($_SESSION['user_type']!=='admin'){
//   header ("location: ../index.php");
// }
//secure
//session_start();
$is_coupon = 0;
if (isset($_POST['content_type'])) {
    $is_coupon = $_POST['content_type'];
    //js below
}
?>

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

<?php



if (isset($_POST['insert_product'])) {
    global $con;
    include '../includes/connect.php';

    $product_img3 = '';
    $product_posted_user = '';
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $coupon = $_POST['coupon'];
    $product_old_price = $_POST['product_old_price'];
    $product_price = $_POST['product_price'];
    //if empty
    if (isset($_POST['product_keywords'])) {
        $product_keywords = $_POST['product_keywords'];
    } else {
        $product_keywords = '';
    }
    if (isset($_POST['product_img2'])) {
        $product_img2 = $_POST['product_img2'];
    } else {
        $product_img2 = '';
    }
    if (isset($_POST['product_img3'])) {
        $product_img3 = $_POST['product_img3'];
    } else {
        $product_img3 = '';
    }
    //if empty
    $category_title = $_POST['product_category'];
    $brand_title = $_POST['product_brand'];
    $product_img1 = $_POST['product_img1'];

    $product_link = $_POST['product_link'];
    if ($is_coupon == 1) {
        $brand_url = "SELECT `brand_url` FROM `brands` WHERE brand_id = '$brand_title'";
        $result1 = mysqli_query($con, $brand_url);
        $row = mysqli_fetch_array($result1);
        $product_link = $row[0];
    }


    $product_posted_user = $_COOKIE["user_id"];
    $product_status = 'true';

    //Select data from db
    $select_query = "Select * from `products` where product_title = '$product_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>
alert('Category already exists')
</script>";
    } else {
        $insert_query = "insert into `products` (product_title, product_description,coupon,
product_keywords, product_category, product_brand, product_img1, product_img2, product_img3,product_old_price,
product_price,product_link, date, status,posted_user_id,is_coupon) values
('$product_title','$product_description','$coupon','$product_keywords','$category_title','$brand_title','$product_img1','$product_img2','$product_img3','$product_old_price','$product_price','$product_link',NOW(),'$product_status','
$product_posted_user','$is_coupon')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>
alert('Posted successfully')
</script>";
            echo "<script>
window.open('./index.php?view_product', '_self')
</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<div class="container a_category-item w-100 bg-light p-4 mb-5">
    <h2 class="text-center">Add Product</h2>
    <form method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="product_title">This is a</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="content_type" id="is_product_selected" value="0"
                    checked />
                <label class="form-check-label" for="is_product_selected">Product</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="content_type" id="is_coupon_selected" value="1" />
                <label class="form-check-label" for="is_coupon_selected">Coupon</label>
            </div>
        </div>

        <div class="form-group">
            <label for="product_title">Product/Coupon Title</label>
            <input type="text" class="border-secondary a_category-item px-2" name="product_title" id="product_title"
                placeholder="Enter the title here...">
        </div>

        <div class="row product_input_field">
            <div class="form-group col-md-6">
                <label class="text-danger">Old Price</label>
                <input type="text" class="a_category-item px-2 border-danger" id="product_old_price"
                    name="product_old_price" placeholder="Enter old price (MRP)">
            </div>
            <div class="form-group col-md-6">
                <label class="text-success">New Price</label>
                <input type="text" class="a_category-item px-2 border-success" id="product_price" name="product_price"
                    placeholder="Enter new price (Offer price)">
            </div>
        </div>

        <div class="form-row coupon_input_field_field d-none">
            <div class="form-group col-md-6">
                <label class="text-success">Coupon</label>
                <input type="text" class="a_category-item px-2 border-success" id="coupon" name="coupon"
                    placeholder="Enter Coupon Here">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="textarea" class="w-100 a_category-item px-2 border-secondary" id="product_description"
                name="product_description" placeholder="Enter the description here..."></textarea>
        </div>

        <div class="row">
            <!--keywords -->
            <div class="form-group col-md-6">
                <label for="product_keywords" class="form-label "> Product/Coupon Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords"
                    class="border-secondary a_category-item px-2"
                    placeholder="Enter keywords ( Example: Mobile, Smartphone,etc. )" autocomplete="on">
            </div>

            <div class="form-group col-md-6 product_input_field">
                <label for="product_link " class="form-label"> Product Link</label>
                <input type="text" name="product_link" id="product_link" class="border-secondary a_category-item px-2"
                    placeholder="Enter product link here..." autocomplete="off">
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
                <select id="brand_title" class="a_category-item px-2 border-secondary">
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
        </div>

        <div class="form-row product_images_input">
            <div class="form-group col-md-4">
                <label for="product_img">Product Image 1</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img1" name="product_img1"
                    placeholder="Paste Product Image Link Here...">
            </div>

            <div class="form-group col-md-4">
                <label for="product_img">Product Image 2(Optional)</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img2" name="product_img2"
                    placeholder="Paste Product Image Link Here...">
            </div>

            <div class="form-group col-md-4">
                <label for="product_img">Product Image 3(Optional)</label>
                <input type="text" class="a_category-item px-2 border-secondary" id="product_img3" name="product_img3"
                    placeholder="Paste Product Image Link Here...">
            </div>
        </div>
        <div class="form-group  mt-3 ">
            <input type="submit" class="btn a_btn" name="insert_product" value="Post">
        </div>
    </form>
</div>

<script>
var isProductSelected = document.getElementById('is_product_selected');
var isCouponSelected = document.getElementById('is_coupon_selected');
var priceInput = document.getElementsByClassName('product_input_field')[0];
var couponInput = document.getElementsByClassName('coupon_input_field_field')[0];
var priceInput1 = document.getElementsByClassName('product_input_field')[1];
var priceInput2 = document.getElementsByClassName('product_images_input')[0];

isProductSelected.addEventListener('click', function() {
    priceInput.classList.remove('d-none');
    couponInput.classList.add('d-none');
    priceInput1.classList.remove('d-none');
    priceInput2.classList.remove('d-none');



});

isCouponSelected.addEventListener('click', function() {
    priceInput.classList.add('d-none');
    couponInput.classList.remove('d-none');
    priceInput1.classList.add('d-none');
    priceInput2.classList.add('d-none');
});
</script>
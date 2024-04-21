<?php
include('../includes/connect.php');
//secure
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../user_area/login.php");
}
if ($_SESSION['user_type'] !== 'admin') {
    header("location: ../index.php");
}
//secure
$product_id = $_GET['expireid'];
$sql = "select * from `products` where product_id=$product_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$product_id = $row['product_id'];

$status = $row['status'];



if (isset($_POST['submit'])) {

    $status = $_POST['status'];

    $sql = "update `products` set status='$status' where product_id=$product_id";
    echo "<script>window.open('./index.php?view_product', '_self')</script>";
}

if ($status != "expired") {
    $stval = "expired";
} else {
    $stval = "true";
}

?>

<link rel="stylesheet" href="../assets/css/style-prefix.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<br><br>
<div class="container-fluid" style="background-color: #f9f9f9; padding: 20px;">
    <div class="  container card w-50 bg-light p-4"
        style="border: 2px solid #d3d3d3; border-radius: 10px; padding: 20px;">
        <form class="row" method="post">
            <div class="col-12 mb-3">
                <label for="status" class="     form-label" style=" font-size: 24px; font-weight:bold; ">

                    Status of Product with ID - <?php echo $product_id ?></label>

                <select name="status" id="status" class="w-100"
                    style="font-size: 24px;  padding: 8px 18px; border-radius: 10px; border: 3px solid #ff6600; background-color: #fff; color: #333;">
                    <option value="expired" <?php if ($status === 'expired') echo 'selected'; ?>>Expired</option>
                    <option value="not_approved" <?php if ($status === 'not_approved') echo 'selected'; ?>>Not Approved
                    </option>
                    <option value="true" <?php if ($status === 'true') echo 'selected'; ?>>Approved</option>
                    <option value="disapprove" <?php if ($status === 'disapprove') echo 'selected'; ?>>Disapprove
                    </option>
                </select>







            </div>
            <div class="col-12 d-flex">
                <br><button type="submit" name="submit" class="a_btn mt-1 mb-1 mr-1"
                    style="font-size: 20px; padding: 10px 20px; border-radius: 10px;">Update</button>
                <button class=" a_btn  mt-1 ml-1 mb-1"
                    style="font-size: 20px; padding: 10px 20px; border-radius: 10px;"><a href="index.php?view_product"
                        class="a_tbn" style="text-decoration: none; color: #fff;">Go
                        back</a></button>
            </div>

        </form>
    </div>
</div>



<div class="container-fluid" style="background-color: #f9f9f9; padding: 20px;">
    <div class="  container card w-50 bg-light p-4"
        style="border: 2px solid #d3d3d3; border-radius: 10px; padding: 20px;">
        <p><strong>There are four different status types:</strong></p>
        <ul>
            <li><strong>Expired:</strong> This status indicates that deal/offer has reached its expiration date or
                validity period.<br>[The deal/offer will have an Expired Stamp on it]</li>
            <li><strong>Not Approved:</strong> This status indicates that deal/offer has not yet been approved or
                authorized.<br>[deal/offer yet to be approved by admin and will be hidden until approval]</li>
            <li><strong>Approved:</strong> This status indicates that deal/offer has been approved or authorized.
                <br>(In
                this context, "true" represents "Approved")
            </li>
            <li><strong>Disapprove:</strong> This status indicates that deal/offer has been rejected or
                disapproved.<br>[deal/offer will be hidden]
            </li>
        </ul>

    </div>
</div><?php
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo '<p class="text-center text-success">&nbsp;Data was inserted successfully</p>';
        } else {
            die(mysqli_error($con));
        }
        ?>
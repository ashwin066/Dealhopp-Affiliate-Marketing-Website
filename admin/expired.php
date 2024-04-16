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

<br><br>
<div class="container-fluid">
    <br>
    <form class="row" method="post">
        <div class="col-12">
            <label for="status" class="form-label">Status:</label>

            <select name=" status" id="status">
                <option value="expired" <?php if ($status === 'expired') echo 'selected'; ?>>Expired</option>
                <option value="not_approved" <?php if ($status === 'not_approved') echo 'selected'; ?>>
                    Not Approved</option>
                <option value="true" <?php if ($status === 'true') echo 'selected'; ?>>Approved
                </option>
                <option value="disapprove" <?php if ($status === 'disapprove') echo 'selected'; ?>>
                    Disapprove
                </option>

            </select>

        </div>
        <br>
        <div class="col-12">
            <br><button type="submit" name="submit" class="btn btn-success">Update</button>
            <button class="btn btn-success"><a href="index.php?view_product" class="a_tbn">Go back</a></button>







        </div>
    </form>
</div>

<?php
$result = mysqli_query($con, $sql);
if ($result) {
  echo '<p class="text-success">&nbsp;Data was inserted successfully</p>';
} else {
  die(mysqli_error($con));
}
?>
<?php
include('../includes/connect.php');

// Secure the Page
if (!isset($_SESSION["username"])) {
    header("location: ../user_area/login.php");
    exit();
}
if ($_SESSION['user_type'] !== 'admin') {
    header("location: ../index.php");
    exit();
}


// Check if the banner id is provided in the URL
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare a delete query to remove the banner with the provided id
    $delete_query = "DELETE FROM promo_banners WHERE id = $id";

    // Execute the delete query
    if (mysqli_query($con, $delete_query)) {
        // Banner deleted successfully

        echo "<script>alert('Banner deleted successfully.')</script>";
        echo "<script>window.open('./index.php?edit_banners','_self')</script>";
    } else {
        // Error occurred while deleting the banner
        echo "<script>alert('Error deleting banner')</script>";
    }
} else {
    // If the banner id is not provided in the URL, display an error message

    //echo "<script>alert('Banner id not provided.')</script>";
}
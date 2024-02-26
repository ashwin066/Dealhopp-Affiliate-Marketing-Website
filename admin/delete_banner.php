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
 
    // Check if the confirmation is received from the user
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
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
        // If confirmation is not received, ask for confirmation
        echo "<script>
        if(window.confirm('Are you sure you want to delete this banner?')) {
            var form = document.createElement('form');
            form.method = 'post';
            var idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = '" . $_POST['id'] . "';
            form.appendChild(idInput);
            var confirmInput = document.createElement('input');
            confirmInput.type = 'hidden';
            confirmInput.name = 'confirm';
            confirmInput.value = 'yes';
            form.appendChild(confirmInput);
            document.body.appendChild(form);
            form.submit();
        } else {
            window.history.back();
        }
      </script>";
    }
} else {
    // If the banner id is not provided in the URL, display an error message
     // echo "<script>alert('Banner not deleted.')</script>";
}
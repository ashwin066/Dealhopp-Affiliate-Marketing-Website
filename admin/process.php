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

// Insert or Edit Banner Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Process form submission for inserting or editing banner
        $link = mysqli_real_escape_string($con, $_POST['link']);
        $title = mysqli_real_escape_string($con, $_POST['title']);

        // Check if image file is selected
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK || isset($_POST['banner_id'])) {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['image'];
                $image_name = mysqli_real_escape_string($con, $image['name']);
                $image_tmp = $image['tmp_name'];
                $image_path = 'promo_banners/' . $image_name;
                if (move_uploaded_file($image_tmp, $image_path)) {
                } else {
                    // Error uploading image
                    echo "Error uploading image.";
                    return;
                }
            } else {
                $image_path =
                    mysqli_real_escape_string($con, $_POST['img_path']);
            }
            // Move uploaded image to uploads folder

            // Upload successful, proceed with database insertion or update
            if (isset($_POST['banner_id'])) {
                // Update existing banner
                $banner_id = $_POST['banner_id'];
                $update_query = "UPDATE promo_banners SET link='$link', title='$title', image='$image_path' WHERE id=$banner_id";

                $result_query
                    = mysqli_query($con, $update_query);
                if ($result_query) {
                    echo "<script>alert('Updated successfully')</script>";
                    echo "<script>window.open('./index.php?edit_banners','_self')</script>";
                }
            } else {
                // Insert new banner
                $insert_query = "INSERT INTO promo_banners (link, title, image) VALUES ('$link', '$title', '$image_path')";

                $result_query
                    = mysqli_query($con, $insert_query);
                if ($result_query) {
                    echo "<script>alert('Inserted successfully')</script>";
                    echo "<script>window.open('./index.php?edit_banners','_self')</script>";
                }
            }
        } else {
            // No image selected
            echo "No image selected.";
        }
    }
}

// Fetch Promo Banners from Database
$select_promo_banners = "SELECT * FROM `promo_banners`";
$result_promo_banners = mysqli_query($con, $select_promo_banners);

if ($result_promo_banners) {
    while ($row = mysqli_fetch_assoc($result_promo_banners)) {
        // Display each banner in the table rows
        echo '<tr>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['link'] . '</td>';
        echo '<td><img src="' . $row['image'] . '" alt="Banner Image" class="img-fluid img-thumbnail"   ></td>';
        echo '<td><form action="" method="post"> <a   href="edit_banner.php?id=' . $row['id'] . '">Edit</a>  
        <input type="hidden" value=' . $row['id'] . '  name="id"  />
        <button type="submit"  >Delete</button></form></td>';
        echo '</tr>';
    }
}
<?php
include('../includes/connect.php');

// Secure the Page
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../user_area/login.php");
}
if ($_SESSION['user_type'] !== 'admin') {
    header("location: ../index.php");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch Banner Details from Database and populate the form for editing
    $select_banner = "SELECT * FROM `promo_banners` WHERE id = $id";
    $result_banner = mysqli_query($con, $select_banner);

    if ($result_banner) {
        $banner = mysqli_fetch_assoc($result_banner);
        // Populate form fields with banner details for editing
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Banner</title>
    <!-- Include CSS/Bootstrap if needed -->
    <link rel="stylesheet" href="../assets/css/style-prefix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1>Edit Banner</h1>
        <!-- Form for Editing Banner -->
        <form class="mb-3" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="banner_id" value="<?php echo isset($banner['id']) ? $banner['id'] : null; ?>">


            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="<?php echo isset($banner['title']) ? $banner['title'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link" id="link" class="form-control"
                    value="<?php echo isset($banner['link']) ? $banner['link'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file mb-3">
                <?php if (isset($banner['image'])) : ?>
                <img src="<?php echo $banner['image']; ?>" alt="Current Image" height="50">
                <input type="hidden" name="img_path"
                    value="<?php echo isset($banner['image']) ? $banner['image'] : null; ?>">

                <?php endif; ?>
            </div>
            <button type="submit" name="submit" class="btn btn-dark ">Submit</button>

        </form>
        <!-- Table for Listing Banners -->
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include('process.php'); ?>
            </tbody>
            <?php include('delete_banner.php'); ?>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo Banners</title>
    <!-- Include CSS/Bootstrap if needed -->

</head>

<body>

    <div class="container">
        <h1>Promo Banners</h1>
        <!-- Form for Inserting and Editing -->
        <!-- Form for Inserting and Editing -->
        <form class="mb-3" action="" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="banner_id" value="<?php echo isset($banner['id']) ? $banner['id'] : null; ?>"> -->
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
                <?php endif; ?>
            </div>
            <button type="submit" name="submit" class=" btn btn-dark">Submit</button>
        </form>



        <!-- Table for Listing Banners -->
        <table class="table table-striped">
            <thead class="thead-dark">
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo Banners</title>
    <!-- Include CSS/Bootstrap if needed -->

</head>

<body>

    <div class="container ">
        <div class="card w-100 bg-light p-4 mb-4">
            <h4 class="text-center text-secondary">Insert Promo Banner</h4>
            <!-- Form for Inserting and Editing -->
            <!-- Form for Inserting and Editing -->
            <form class="" action="" method="post" enctype="multipart/form-data">
                <!-- <input type="hidden" name="banner_id" value="<?php echo isset($banner['id']) ? $banner['id'] : null; ?>"> -->
                <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Banner title"
                        value="<?php echo isset($banner['title']) ? $banner['title'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="link" id="link" class="form-control" placeholder="Enter Banner Link"
                        value="<?php echo isset($banner['link']) ? $banner['link'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Banner Image:</label>
                    <input type="file" name="image" id="image" class="form-control-file mb-3">
                    <?php if (isset($banner['image'])) : ?>
                    <img src="<?php echo $banner['image']; ?>" alt="Current Image" height="50">
                    <?php endif; ?>
                </div>
                <input type="submit" name="submit" class="mx-auto btn  a_btn" />
            </form>

        </div>

        <!-- Table for Listing Banners -->
        <table class="table table-striped table-responsive   ">
            <thead class="thead-dark ">
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
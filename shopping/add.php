<?php
require 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $p_name = mysqli_real_escape_string($conn, $_POST['pName']);
    $p_price = mysqli_real_escape_string($conn, $_POST['pPrice']);
    
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES['pImage']['name']);
    
    // Check if file was uploaded without errors
    if (move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO product (product_name, product_price, product_image) VALUES ('$p_name', '$p_price', '$target_file')";
        
        if (mysqli_query($conn, $sql)) {
            $msg = "Product added to the database successfully!";
        } else {
            $msg = "Failed to add the product!";
        }
    } else {
        $msg = "Failed to upload the image!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Information</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add this script to handle the custom file input label
        $(document).ready(function(){
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
    </script>
</head>
<body class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light mt-5 rounded">
            <div class="text-center p-2">
                <h2>Add Product Information</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="pName" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pPrice" class="form-control" placeholder="Product Price" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center"><?= $msg; ?></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3 p-4 bg-light rounded">
            <a href="index.php" class="btn btn-warning btn-block btn-lg">Go to Product Page</a>
        </div>
    </div>
</div>
</body>
</html>

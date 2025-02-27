<?php 
include "includes/head.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $product_id, PDO::PARAM_INT);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_detail = $_POST['product_detail'];
    $product_image = $_FILES['product_image']['name'];

    if ($product_image) {
        $target_dir = "resources/uploads/";
        $target_file = $target_dir . basename($product_image);
        
        // Delete the previous image
        if ($product && file_exists('resources/uploads/' . $product['product_image'])) {
            unlink('resources/uploads/' . $product['product_image']);
        }

        move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
    } else {
        $target_file = $product['product_image'];
    }

    $sql = "UPDATE products SET product_name = :product_name, product_price = :product_price, product_detail = :product_detail, product_image = :product_image WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $query->bindParam(':product_price', $product_price, PDO::PARAM_STR);
    $query->bindParam(':product_detail', $product_detail, PDO::PARAM_STR);
    $query->bindParam(':product_image', $product_image, PDO::PARAM_STR);
    $query->bindParam(':id', $product_id, PDO::PARAM_INT);
    $query->execute();

    if ($query) {
        showSuccessToast("Product updated successfully", "productList.php");
    } else {
        showErrorToast("productList.php");
    }
}
?>
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Edit product</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit product</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Asset Form -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <form class="forms-sample" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="container mt-5">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h1 class="d-flex justify-content-center mt-4">EDIT PRODUCT</h1>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo $product['product_name']; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_price">Product Price</label>
                                    <input type="text" name="product_price" class="form-control" id="product_price" value="<?php echo $product['product_price']; ?>" required>
                                </div>
                            </div>
                            <div class="from-row">
                                <div class="form-group col-md-12">
                                    <label for="product_detail">Product Detail</label>
                                    <textarea name="product_detail" class="form-control" id="product_detail" rows="4" required><?php echo $product['product_detail']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-9">
                                    <label class=" col-form-label">Image Upload</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="<?php echo $product['product_image'] ? 'resources/uploads/' . $product['product_image'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image'; ?>" alt="" style="width: 100%; height: 100%;" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-secondary  btn-file">
                                                <span class="fileupload-new "><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" name="product_image" class="btn-secondary" id="product_image" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn submitbtn btn-block btn-md mt-4">
                                Update Product
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "includes/foot.php"; ?>
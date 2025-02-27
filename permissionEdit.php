<?php include "includes/head.php"; 

if (isset($_GET['permission_id'])) {
    $permission_id = $_GET['permission_id'];
    $sql = "SELECT * FROM permissions WHERE permission_id = :permission_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':permission_id', $permission_id, PDO::PARAM_INT);
    $query->execute();
    $permission = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $permission_name = $_POST['permission_name'];
    $permission_id = $_POST['permission_id'];
    $sql = "UPDATE permissions SET permission_name = :permission_name WHERE permission_id = :permission_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':permission_name', $permission_name, PDO::PARAM_STR);
    $query->bindParam(':permission_id', $permission_id, PDO::PARAM_INT);
    $query->execute();

    if ($query) {
        showSuccessToast("Permission updated successfully", "permissionList.php");
    } else {
        showErrorToast("permissionList.php");
    }
}

?>
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Edit permission</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit permission</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Asset Form -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <form class="forms-sample" method="post" onsubmit="return validateForm()">
                <div class="container mt-5">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h1 class="d-flex justify-content-center mt-4">EDIT PERMISSION</h1>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="permission_name">Permission Name</label>
                                    <input type="text" name="permission_name" class="form-control" id="permission_name" value="<?php echo htmlspecialchars($permission['permission_name']); ?>" required>
                                    <input type="hidden" name="permission_id" value="<?php echo htmlspecialchars($permission['permission_id']); ?>">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn submitbtn btn-block btn-md mt-4">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "includes/foot.php"; ?>
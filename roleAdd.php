<?php include "includes/head.php"; 

if (isset($_POST['submit'])) {
    $role_name = $_POST['role_name'];
    $permissions = $_POST['permissions'] ?? [];

    // Insert role
    $sql = "INSERT INTO roles (role_name) VALUES (:role_name)";
    $query = $conn->prepare($sql);
    $query->bindParam(':role_name', $role_name, PDO::PARAM_STR);
    $query->execute();
    $role_id = $conn->lastInsertId();

    // Insert permissions for the role
    foreach ($permissions as $permission_id) {
        $sql = "INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)";
        $query = $conn->prepare($sql);
        $query->bindParam(':role_id', $role_id, PDO::PARAM_STR);
        $query->bindParam(':permission_id', $permission_id, PDO::PARAM_STR);
        $query->execute();
    }

    showSuccessToast("Role added successfully", "roleList.php");
}


?>
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Add role</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add role</li>
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
                            <h1 class="d-flex justify-content-center mt-4">ADD ROLE</h1>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="role_name">Role Name</label>
                                    <input type="text" name="role_name" class="form-control" id="role_name" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="permissions">Permissions</label>
                                    <?php
                                    $sql = "SELECT * FROM permissions";
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    $permissions = $query->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($permissions as $permission) {
                                        echo "<div class='form-check checkbox checkbox-custom checkbox-circle'>";
                                        echo "<input class='form-check-input' type='checkbox' name='permissions[]' value='{$permission['permission_id']}' id='permission_{$permission['permission_id']}'>";
                                        echo "<label class='form-check-label' for='permission_{$permission['permission_id']}'>{$permission['permission_name']}</label>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn submitbtn btn-block btn-md mt-3">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "includes/foot.php"; ?>
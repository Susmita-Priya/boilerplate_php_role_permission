<?php include "includes/head.php"; 

$role_id = $_GET['role_id'] ?? null;

if ($role_id) {
    // Fetch role details
    $sql = "SELECT * FROM roles WHERE role_id = :role_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $query->execute();
    $role = $query->fetch(PDO::FETCH_ASSOC);

    // Fetch role permissions
    $sql = "SELECT permission_id FROM role_permissions WHERE role_id = :role_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $query->execute();
    $role_permissions = $query->fetchAll(PDO::FETCH_COLUMN, 0);
}

if (isset($_POST['submit'])) {
    $role_name = $_POST['role_name'];
    $permissions = $_POST['permissions'] ?? [];

    // Update role
    $sql = "UPDATE roles SET role_name = :role_name WHERE role_id = :role_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':role_name', $role_name, PDO::PARAM_STR);
    $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $query->execute();

    // Delete existing permissions
    $sql = "DELETE FROM role_permissions WHERE role_id = :role_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $query->execute();

    // Insert new permissions for the role
    foreach ($permissions as $permission_id) {
        $sql = "INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)";
        $query = $conn->prepare($sql);
        $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        $query->bindParam(':permission_id', $permission_id, PDO::PARAM_INT);
        $query->execute();
    }

    showSuccessToast("Role updated successfully", "roleList.php");
}
?>
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Edit role</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit role</li>
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
                            <h1 class="d-flex justify-content-center mt-4">EDIT ROLE</h1>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="role_name">Role Name</label>
                                    <input type="text" name="role_name" class="form-control" id="role_name" value="<?php echo htmlspecialchars($role['role_name']); ?>" required>
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
                                        $checked = in_array($permission['permission_id'], $role_permissions) ? 'checked' : '';
                                        echo "<div class='form-check checkbox checkbox-custom checkbox-circle'>";
                                        echo "<input class='form-check-input' type='checkbox' name='permissions[]' value='{$permission['permission_id']}' id='permission_{$permission['permission_id']}' $checked>";
                                        echo "<label class='form-check-label' for='permission_{$permission['permission_id']}'>{$permission['permission_name']}</label>";
                                        echo "</div>";
                                    }
                                    ?>
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
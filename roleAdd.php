<?php include "includes/head.php"; 

if (isset($_POST['submit'])) {
    $role_name = $_POST['role_name'];
    $permissions = $_POST['permissions'] ?? [];

    // Insert role
    $sql = "INSERT INTO roles (role_name) VALUES (:role_name)";
    $query = $pdo->prepare($sql);
    $query->bindParam(':role_name', $role_name, PDO::PARAM_STR);
    $query->execute();
    $role_id = $pdo->lastInsertId();

    // Insert permissions for the role
    foreach ($permissions as $permission_id) {
        $sql = "INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)";
        $query = $pdo->prepare($sql);
        $query->bindParam(':role_id', $role_id, PDO::PARAM_STR);
        $query->bindParam(':permission_id', $permission_id, PDO::PARAM_STR);
        $query->execute();
    }

    echo "<script>alert('Role added successfully');</script>";
    echo "<script>window.location.href = 'roleList.php'</script>";
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
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" class="form-control" id="role_id" required>
                                        <?php
                                        $role_sql = "SELECT * FROM roles";
                                        $role_query = $conn->prepare($role_sql);
                                        $role_query->execute();
                                        $roles = $role_query->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($roles as $role) {
                                            echo "<option value='$role->role_id'>$role->role_name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <button type="submit" name="submit" class="btn waves-effect waves-light btn-sm submitbtn">
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
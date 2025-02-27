<?php include "includes/head.php"; 

if (isset($_POST['submit'])) {
  $first_name = $_POST['firstName'];
  $last_name = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $role_id = $_POST['role_id'];
  $password = $_POST['password']; 
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (firstName, lastName, email, phone, password, role_id) VALUES (:firstName, :lastName, :email, :phone, :password, :role_id)";
  $query = $conn->prepare($sql);
  $query->bindParam(':firstName', $first_name, PDO::PARAM_STR);
  $query->bindParam(':lastName', $last_name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':phone', $phone, PDO::PARAM_STR);
  $query->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
  $query->execute();

  if ($query) {
    showSuccessToast("User added successfully", "userList.php");
} else {
    showErrorToast("userList.php");
}
}

?>
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Add user</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add user</li>
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
                            <h1 class="d-flex justify-content-center mt-4">ADD USER</h1>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                            
                                <div class="form-group col-md-6">
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

                            

                            <button type="submit" name="submit" class="btn submitbtn btn-block btn-md mt-4">
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
<?php
session_start();
error_reporting(0);
include "config/db.php";
include "includes/toast.php";

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role_id = 2; // Assuming 2 is the default role for new users

    // Check if the email already exists
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo "<script>alert('Email already exists');</script>";
        echo "<script>window.location.href = 'registration.php'</script>";
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO users (firstName, lastName, email, phone, password, role_id) VALUES (:firstName, :lastName, :email, :phone, :password, :role_id)";
        $query = $conn->prepare($sql);
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);

        if ($query->execute()) {
            echo "<script>alert('Registration successful');</script>";
            echo "<script>window.location.href = 'login.php'</script>";
        } else {
            echo "<script>alert('Registration failed');</script>";
            echo "<script>window.location.href = 'registration.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="resources/admin_dashboard/assets/images/favicon.ico">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- App css -->
    <link href="resources/admin_dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="resources/admin_dashboard/assets/js/modernizr.min.js"></script>

    <style>
        .submitbtn {
            background-color: rgb(100, 197, 177);
            color: white;
        }
    </style>
</head>

<body style="background-color:rgb(100,197,177)">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-logo-box">
                                    <h2 class="text-uppercase text-center">
                                        <p style="color: rgb(100, 197, 177);"> DEMO </p>
                                    </h2>
                                    <h5 class="text-uppercase font-bold m-b-5 m-t-50">Register</h5>
                                    <p class="m-b-0">Create a new account</p>
                                </div>
                                <div class="account-content">
                                    <form class="forms-sample" method="post">

                                        <div class="form-group m-b-20 row">
                                            <div class="col-6">
                                                <label for="firstName">First Name<span style="color: red;">*</span></label>
                                                <input class="form-control" name="firstName" type="text" id="firstName" required="" placeholder="First Name">
                                            </div>
                                       
                                            <div class="col-6">
                                                <label for="lastName">Last Name<span style="color: red;">*</span></label>
                                                <input class="form-control" name="lastName" type="text" id="lastName" required="" placeholder="Last Name">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20 row">
                                            <div class="col-6">
                                                <label for="email">Email address<span style="color: red;">*</span></label>
                                                <input class="form-control" name="email" type="email" id="email" required="" placeholder="abc@gmail.com">
                                            </div>
                                       
                                            <div class="col-6">
                                                <label for="phone">Phone<span style="color: red;">*</span></label>
                                                <input class="form-control" name="phone" type="text" id="phone" required="" placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="password">Password<span style="color: red;">*</span></label>
                                                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block submitbtn waves-effect waves-light" type="submit" name="submit">Register</button>
                                            </div>
                                        </div>

                                        <div class="form-group row m-t-30 m-b-0 text-center">
                                            <div class="col-12">Already have an account?
                                                <a href="login.php" class="text-primary"> <u>Sign In</u></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>
                    <!-- end wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <!-- jQuery  -->
    <script src="resources/admin_dashboard/assets/js/jquery.min.js"></script>
    <script src="resources/admin_dashboard/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
    <script src="resources/admin_dashboard/assets/js/bootstrap.min.js"></script>
    <script src="resources/admin_dashboard/assets/js/metisMenu.min.js"></script>
    <script src="resources/admin_dashboard/assets/js/waves.js"></script>
    <script src="resources/admin_dashboard/assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="resources/admin_dashboard/assets/js/jquery.core.js"></script>
    <script src="resources/admin_dashboard/assets/js/jquery.app.js"></script>

</body>

</html>

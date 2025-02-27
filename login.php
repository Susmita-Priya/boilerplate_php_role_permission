<?php
session_start();
error_reporting(0);
include "config/db.php";
include "includes/toast.php";


if (isset($_POST['submit']))  {
    // echo "<pre>";
    // print_r($_POST); // Check form data
    // echo "</pre>";
    // exit(); // Stop execution to check output

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    // Check if a user with the provided email exists
    if ($query->rowCount() > 0) {
        $result = $query->fetch(PDO::FETCH_OBJ);

        // Verify the entered password with the hashed password
        if (password_verify($password, $result->password)) {

            // Set session variables
            $_SESSION['id'] = $result->id;
            $_SESSION['email'] = $result->email;
            $_SESSION['name'] = $result->firstName . " " . $result->lastName;

            // Redirect to the dashboard
            header("Location: index.php");
            // showSuccessToast("Login successful", "index.php");
        } else {
            echo "<script>alert('Invalid password');</script>";
            echo "<script>window.location.href = 'login.php'</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
        echo "<script>window.location.href = 'login.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
        <title>Login</title>
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
    <!-- <body style=" background-image: url('{{ asset('image/bg-building.jpg') }}'); background-size: cover; background-repeat: no-repeat;"> -->

    <!-- HOME -->
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
                                    <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                    <p class="m-b-0">Login to your Account</p>
                                </div>
                                <div class="account-content">
                                <form class="forms-sample" method="post" onsubmit="return validateForm()">

                                        <div class="form-group m-b-20 row">
                                            <div class="col-12">
                                                <label for="emailaddress">Email address<span style="color: red;">*</span></label>
                                                <input class="form-control" name="email" type="email"
                                                    id="emailaddress" required="" placeholder="abc@gmail.com">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <a href="page-recoverpw.html"
                                                    class="text-muted pull-right">
                                                    <!-- <small>Forgot your password?</small> -->
                                                </a>
                                                <label for="password">Password<span style="color: red;">*</span></label>
                                                <input class="form-control" name="password" type="password"
                                                    required="" id="password" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">

                                                <!-- <div class="checkbox checkbox-success">
                                                    <input id="remember" type="checkbox" checked="">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>  -->

                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button
                                                     class="btn btn-md btn-block submitbtn waves-effect waves-light"
                                                    type="submit" name="submit">Sign In</button>
                                            </div>
                                        </div>

                                        <div class="form-group row m-t-30 m-b-0 text-center">
                                            <div class="col-12">New here?
                                                <a href="registration.php"
                                                    class="text-primary"> <u>Create an account</u></a>
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
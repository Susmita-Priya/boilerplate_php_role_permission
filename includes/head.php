<?php include("includes/auth.php"); 
check_login();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <!-- {{-- <link rel="icon" href="resources/image/bytecarelogo-sm.png" type="image/png"> --}} -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- custom css -->
    <link rel="stylesheet" href="resources/css/style.css">

    <!-- Select2 css -->
    <link href="resources/admin_dashboard/assets/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="resources/admin_dashboard/assets/images/favicon.ico" type="image/x-icon">

    <!-- Multistep registration -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Multistep registration css-->
    <link rel="stylesheet" href="resources/admin_dashboard/assets/css/multistep.css" type="text/css">

    <!-- C3 charts css -->
    <link href="resources/admin_dashboard/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="resources/admin_dashboard/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="resources/admin_dashboard/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- App css -->
    <link href="resources/admin_dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="resources/admin_dashboard/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="resources/admin_dashboard/assets/js/modernizr.min.js"></script>

    <!-- Toastr css -->
    <link href="resources/admin_dashboard/plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Jquery filer css -->
     <link href="resources/admin_dashboard/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="resources/admin_dashboard/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

    <!-- Bootstrap fileupload css -->
    <link href="resources/admin_dashboard/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />


</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <?php include("includes/toster.php"); ?>

        <?php include("includes/topbar.php"); ?>

        <?php include("includes/sidebar.php"); ?>

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">

                    <!-- Dynamic content will be loaded here -->
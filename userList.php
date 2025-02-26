<?php include "includes/head.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Users</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashborad</a></li>
                <li class="breadcrumb-item active">Users list</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-b-15 m-t-0">Users List</h4>
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-right m-b-20">
                    <?php if (check_permission('user_add')) { ?>
                        <button type="button" class="btn waves-effect waves-light greenbtn"
                            onclick="window.location.href='userAdd.php'">
                            <i class="mdi mdi-plus m-r-5"></i> Add user
                        </button>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap"
                cellspacing="0" width="100%" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th class="text-center" style="width: 20%;">View</th>
                        <th class="text-center" style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT u.*, r.role_name FROM users u JOIN roles r ON u.role_id = r.role_id ORDER BY u.id DESC";
                    $query = $conn->prepare($sql); 
                    $query->execute();
                    $users = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($users as $user) { ?>
                            <tr>
                                <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($user->firstName); ?></td>
                                <td><?php echo htmlentities($user->lastName); ?></td>
                                <td><?php echo htmlentities($user->email); ?></td>
                                <td><?php echo htmlentities($user->phone); ?></td>
                                <td><?php echo htmlentities($user->role_name); ?></td>
                                <!-- View User -->
                                <td>
                                    <div class="text-center">
                                        <a href="#" class="rounded btn btn-info btn-sm" data-toggle="modal" data-target="#viewUser<?php echo ($user->id); ?>" title="View"><i class="mdi mdi-eye"></i></a>
                                    </div>

                                    <div class="modal fade" id="viewUser<?php echo ($user->id); ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">View User</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>First Name:</strong> <?php echo htmlentities($user->firstName); ?></p>
                                                    <p><strong>Last Name:</strong> <?php echo htmlentities($user->lastName); ?></p>
                                                    <p><strong>Email:</strong> <?php echo htmlentities($user->email); ?></p>
                                                    <p><strong>Phone:</strong> <?php echo htmlentities($user->phone); ?></p>
                                                    <p><strong>Role:</strong> <?php echo htmlentities($user->role_name); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <div class="btn-group dropdown">
                                   
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                   
                                     <?php if (check_permission('user_edit')) { ?>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item"
                                        href="userEdit.php?id=<?php echo $user->id; ?>"><i
                                            class="mdi mdi-pencil m-r-10 text-muted font-18 vertical-middle"></i>Edit
                                        User
                                    </a>
                                    <?php } ?>

                                    <?php if (check_permission('user_delete')) { ?>
                                    <a class="dropdown-item" href="userDelete.php?id=<?php echo $user->id; ?>"
                                        onclick="return confirm('Are you sure?')"><i
                                            class="mdi mdi-delete m-r-10 text-muted font-18 vertical-middle"></i>
                                        Delete User
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<?php include "includes/foot.php"; ?>
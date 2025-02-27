<?php include "includes/head.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Permissions</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="index.php">Dashborad</a></li>
                <li class="breadcrumb-item active">Permissions list</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-b-15 m-t-0">Permissions List</h4>
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-right m-b-20">
                   
                        <button type="button" class="btn waves-effect waves-light greenbtn"
                            onclick="window.location.href='permissionAdd.php'">
                            <i class="mdi mdi-plus m-r-5"></i> Add permission
                        </button> 
                        <?php if (check_permission('permission_add')) { ?>
                        <?php } ?> 
                    </div>
                </div>
            </div>

            <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap"
                cellspacing="0" width="100%" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Permission Name</th>
                        <th>Permission No</th>
                        <th class="text-center" style="width: 20%;">View</th>
                        <th class="text-center" style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM permissions ORDER BY permission_id DESC";
                    $query = $conn->prepare($sql); 
                    $query->execute();
                    $permissions = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($permissions as $permission) { ?>
                            <tr>
                                <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($permission->permission_name); ?></td>
                                <td><?php echo htmlentities($permission->permission_id); ?></td>
                                <!-- View Permission -->
                                <td>
                                    <div class="text-center">
                                        <a href="#" class="rounded btn btn-info btn-sm" data-toggle="modal" data-target="#viewUser<?php echo ($permission->permission_id); ?>" title="View"><i class="mdi mdi-eye"></i></a>
                                    </div>

                                    <div class="modal fade" id="viewUser<?php echo ($permission->permission_id); ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">View Permission</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <p><strong>Permission Name:</strong> <?php echo htmlentities($permission->permission_name); ?></p>
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
                                   
                                     
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item"
                                        href="permissionEdit.php?permission_id=<?php echo $permission->permission_id; ?>"><i
                                            class="mdi mdi-pencil m-r-10 text-muted font-18 vertical-middle"></i>Edit
                                        Permission
                                    </a><?php if (check_permission('permission_edit')) { ?>
                                    <?php } ?>

                                    
                                    <a class="dropdown-item" href="permissionDelete.php?permission_id=<?php echo $permission->permission_id; ?>"
                                        onclick="return confirm('Are you sure?')"><i
                                            class="mdi mdi-delete m-r-10 text-muted font-18 vertical-middle"></i>
                                        Delete Permission
                                    </a><?php if (check_permission('permission_delete')) { ?>
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
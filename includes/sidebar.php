<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <!-- @if (Auth::check())
                    @php
                        $role_id = Auth::user()->role_id;
                    @endphp -->

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="index.php">
                            <i class="fi-air-play"></i>
                            <span class="badge badge-success pull-right">2</span>  
                            <span>
                                Dashboard </span>
                        </a>
                    </li>



                   <!-- product -->
                    <!-- @can('product-list') -->
                        <li>
                            <a href="javascript: void(0);"><i class="fa fa-product-hunt"></i> <span> Products </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="nav-second-level " aria-expanded="false">
                            <!-- @can('product-list') -->
                                <!-- <li><a href="{{ route('products.index') }}">Product List</a></li> -->
                            <!-- @endcan -->
                        </ul>
                    </li>
                    <!-- @endcan -->

                    <!-- Access Management -->
                    <!-- @can('role-permission-list') -->
                        <li>
                            <a href="javascript: void(0);"><i class="mdi mdi-lock-open"></i> <span> Access </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level " aria-expanded="false">
                                <!-- @can('user-list') -->
                                    <li><a href="userList.php">User Management</a></li>
                                <!-- @endcan
                                @can('role-list') -->
                                    <li><a href="roleList.php">Role Management</a></li>
                                <!-- @endcan -->
                                    <li><a href="permissionList.php">Permission Management</a></li>
                            </ul>
                        </li>

                    <!-- @endcan
                    @endif -->
                </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

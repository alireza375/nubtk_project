<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>




                <li class="menu-title mt-2">Menu</li>


                <li>
                    <a href="#teacher" data-bs-toggle="collapse">
                        <!-- <i class="mdi mdi-cart-outline"></i> -->
                        <i class="fa-sharp fa-solid fa-person-chalkboard"></i>
                        <span> Teachers Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="teacher">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.teacher') }}">All Teachers</a>
                            </li>
                            <li>
                                <a href="{{ route('add.teacher') }}">Add Teacher </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#course" data-bs-toggle="collapse">
                        <!-- <i class="mdi mdi-cart-outline"></i> -->
                        <i class="fa-sharp fa-solid fa-person-chalkboard"></i>
                        <span> Courses Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="course">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.course') }}">All Course</a>
                            </li>
                            <li>
                                <a href="{{ route('add.course') }}">Add Course </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#assigncourse" data-bs-toggle="collapse">
                        <!-- <i class="mdi mdi-cart-outline"></i> -->
                        <i class="fa-sharp fa-solid fa-person-chalkboard"></i>
                        <span> Assign Course </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="assigncourse">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('assign.course') }}">Assign Course</a>
                            </li>
                            <li>
                                <a href="{{ route('show.assign.course') }}">Show Assigned Course</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="#attendance" data-bs-toggle="collapse">
                        <i class="fa-sharp fa-solid fa-person-chalkboard"></i>
                        <span> Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="attendance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('take.attendence.admin') }}">Take attendance</a>
                            </li>
                            <li>
                                <a href="{{ route('show.attendence.admin') }}">Show attendance</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
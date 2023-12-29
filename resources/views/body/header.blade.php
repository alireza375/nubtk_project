<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            @php
            $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);

            @endphp

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
							
                    <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{ $adminData->name }} <i class="mdi mdi-chevron-down"></i>
                       
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
			  
                    <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>My Account </span>
                    </a>
                 

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>



        </ul>

        <!-- LOGO -->
        <div class="logo-box">

            <div class="logo logo-light text-center">
                <!-- <span class="logo-sm">
                     <img src="https://nubtkhulna.ac.bd/assets/images/icon.png" alt="" height="35"> 
                </span> -->
                <span class="logo-lg">
                   <img src="https://nubtkhulna.ac.bd/assets/images/logo.png" alt="" height="35">
                </span>
            </div>
        </div>
        
    </div>
</div>
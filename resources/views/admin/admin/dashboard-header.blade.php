<nav class="navbar navbar-expand navbar-light Lyceex-nav topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-nav  ">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </a>
        </li>
    </ul>


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">


{{--
    <div class="topbar-divider d-none d-sm-block"></div>
--}}

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-white small">{{Auth::guard('superadmin')->user()->name}}</span>
        @if(isset(Auth::guard('superadmin')->user()->image))

            <img class="img-profile rounded-circle" src="{{Auth::guard('superadmin')->user()->image}}">
        @else
        <img class="img-profile rounded-circle" src="{{asset('admin/img/user.png')}}">

        @endif
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <!-- Sidebar Toggle (Topbar) -->
        <!-- <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
        </a>-->
        <a class="dropdown-item" href="{{__setLink('admin/edit-profile')}}">
        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Edit Profile
        </a>
        <a class="dropdown-item" href="{{__setLink('admin/change-password')}}">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
        </a> 
        <!-- <div class="dropdown-divider"></div> -->
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
    </li>

</ul>

</nav>
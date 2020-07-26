<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{asset('images/logo.png')}}" alt="" width="100px">
        </div>
        <div class="sidebar-brand-text mx-3">{{Auth::guard('school')->user()->name }}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Dashboard
    </div> -->

    <li class="nav-item {{Request::segment(2)=='dashboard'?'active':''}} {{Request::segment(2)=='teacher'?'active':''}}">
        <a class="nav-link " href="{{route('school.dashboard')}}">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Teacher</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='level'?'active':''}}">
        <a class="nav-link }" href="{{route('school.level')}}">
        <i class="fas fa-layer-group"></i>
        <span>Level</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='class'?'active':''}}">
        <a class="nav-link " href="{{route('school.class')}}">
        <i class="fas fa-users"></i>
        <span>Class</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='section'?'active':''}}">
        <a class="nav-link " href="{{route('school.section')}}">
        <i class="fas fa-layer-group"></i>
        <span>Section</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='subject'?'active':''}}">
        <a class="nav-link " href="{{route('school.subject')}}">
        <i class="far fa-closed-captioning"></i>
        <span>Subject</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='student'?'active':''}}">
        <a class="nav-link " href="{{route('school.student')}}">
        <i class="fas fa-user-friends"></i>
        <span>Student</span></a>
    </li>
  

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
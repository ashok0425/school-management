<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ __setLink('admin/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{asset('images/logo.png')}}" alt="" width="200px"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::segment(2)=='dashboard'?'active':''}}">
        <a class="nav-link" href="{{__setLink('admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Dashboard
    </div> -->

    <li class="nav-item {{Request::segment(2)=='school'?'active':''}}">
        <a class="nav-link" href="{{__setLink('admin/school')}}">
        <i class="fas fa-school"></i>
        <span>Schools</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{__setLink('admin/page')}}">
        <i class="fas fa-pager"></i>
        <span>Pages</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='advertisement'?'active':''}}">
        <a class="nav-link" href="{{__setLink('admin/advertisement')}}">
        <i class="fas fa-ad"></i>
        <span>Advertisement</span></a>
    </li>
   

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
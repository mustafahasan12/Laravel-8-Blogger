
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ZenBLog</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item ">
    <a class="nav-link" href="{{ route('index') }}">
        <span>Website</span>
    </a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.categories.list') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Categories</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.blog.list') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Blog</span></a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.role.list') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Role</span></a>
</li>


<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.user.list') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>User</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.user.list') }}"  data-toggle="collapse" data-target="#setting"
        aria-expanded="true" aria-controls="setting">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Setting</span>
    </a>
    <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.detail') }}"> Details </a>
            <a class="collapse-item" href="{{ route('admin.aboutus') }}"> Aboutus </a>
            <a class="collapse-item" href="{{ route('admin.contactus') }}"> Contactus </a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('Logout') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Logout</span></a>
</li>


</ul>
<!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
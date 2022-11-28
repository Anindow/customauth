 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets\img\356-3565024_tvs-logo-png-vector-free-download-logo-of-tvs-motor-company.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Project Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets\img\Laravel_Logging.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth

            <a href="#" class="d-block">{{Auth::user()->name}}</a>
            @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt" ></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                  <i class="nav-icon fa fa-briefcase" ></i>
                  <p>
                    Category
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{ route('brands.index') }}" class="nav-link">
                    <i class=" nav-icon fab fa-bitcoin" ></i>
                    <p>
                        Brand
                    </p>
                </a>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

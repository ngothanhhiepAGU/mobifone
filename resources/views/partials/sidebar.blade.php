<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">MOBIFONE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User Info -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Ngô Thanh Hiệp</a>
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
        <!-- Dropdown Menu -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Tính Năng Thêm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- Liên kết đến Quản lý SIM -->
            <li class="nav-item">
              <a href="{{ route('admin.sims.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý SIM</p>
              </a>
            </li>
            <!-- Liên kết đến Gối cước và dịch vụ -->
            <li class="nav-item">
              <a href="{{ route('admin.goi-cuocs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gói cước</p>
              </a>
            </li>
            <!-- Liên kết đến Hỗ trợ khách hàng -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Hỗ trợ khách hàng
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Ưu đãi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Vấn đáp</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Phản ánh</p>
                  </a>
                </li>
              </ul>
            </li>
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Quản lý bài đăng</p>
            </a>
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Quản lý tin tuyển dụng</p>
            </a>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

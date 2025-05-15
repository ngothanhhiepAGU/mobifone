<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{ asset('images/logo.png') }}" 
      alt="MOBIFONE Logo" 
      class="brand-image elevation-3" 
      style="opacity: .8" 
      onerror="this.onerror=null; this.src='https://via.placeholder.com/40?text=Logo';">
    <span class="brand-text font-weight-light">MOBIFONE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User Info -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User Image" class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name ?? 'Ngô Thanh Hiệp' }}</a>
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
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
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
            <!-- Liên kết đến Số điện thoại và người dùng -->
            <li class="nav-item">
              <a href="{{ route('admin.so_dien_thoai.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Người sở hữu</p>
              </a>
            </li>
            <!-- Liên kết đến Gói cước và dịch vụ -->
            <li class="nav-item">
              <a href="{{ route('admin.goi-cuocs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gói cước</p>
              </a>
            </li>
            <!-- Liên kết đến Tin tức -->
            <li class="nav-item">
              <a href="{{ route('admin.tintuc.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tin tức</p>
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
                    <p>Ưu đãi (Chưa có)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Vấn đáp (Chưa có)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Phản ánh (Chưa có)</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Liên kết đến Quản lý bài đăng -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý bài đăng (Chưa có)</p>
              </a>
            </li>
            <!-- Liên kết đến Quản lý tin tuyển dụng -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý tin tuyển dụng (Chưa có)</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Nút đăng xuất -->
        <li class="nav-item">
          <form action="{{ route('admin.logout') }}" method="POST" class="d-flex">
            @csrf
            <button type="submit" class="nav-link w-100 text-left" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?');">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="d-inline">Đăng xuất</p>
            </button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
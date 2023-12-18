<div class="sidebar">
    <!-- SidebarSearch Form -->
    <!--<div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>-->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class 
          with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Donasi Buku
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-check-square"></i>
            <p>
              Approve Buku
            </p>
          </a>
        </li>

        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Donasi Buku
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/donasibuku" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Donasi Buku Anda</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/cari-buku" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cari Buku Donasi</p>
              </a>
            </li>
          </ul>
        </li> -->
        
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Jual Beli Buku
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/jual-buku" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jual Buku Anda</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/beli-buku" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Beli Buku</p>
              </a>
            </li>
          </ul>
        </li> -->

        <!-- master data -->
        <li class="nav-item">
          <a href="{{ route('user') }}" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Add Users
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
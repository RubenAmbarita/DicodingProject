<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        @endauth
        @guest
          Belum Login  
        @endguest
      </div>
    </div>

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

        @auth
        <li class="nav-item">
          <a href="/category" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Kategori
            </p>
          </a>
        </li>
        <li class="nav-item">
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
        </li>
        @endauth
        
        <li class="nav-item">
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
        </li>
        @auth
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link bg-danger"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <p>Logout</p>
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        @endauth

        @guest
        <li class="nav-item">
          <a href="/login" class="nav-link bg-info">
            <p>
              Login
            </p>
          </a>
        </li>
        @endguest
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
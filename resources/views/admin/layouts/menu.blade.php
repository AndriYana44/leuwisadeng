<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; height: 100%;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="height: 200px; display: flex; flex-direction: column; justify-content: center; align-items: center; line-height: 60px">
      <img src="{{ asset('img/logo-kab-bogor.png') }}" alt="AdminLTE Logo" style="width: 100px; height: 70px">
      <p style="font-size: 16px; font-weight: normal" class="brand-text">Kecamatan Leuwisadeng</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header"><small>MENU</small></li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin" class="nav-link">
              <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/kategori" class="nav-link">
              <i class="nav-icon fas fa-fw fa-list-ol"></i>
              <p>Kategori Posting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/posting" class="nav-link">
              <i class="nav-icon fas fa-fw fa-newspaper"></i>
              <p>Posting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/desa" class="nav-link">
              <i class="nav-icon fas fa-fw fa-table"></i>
              <p>Desa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/agenda" class="nav-link">
              <i class="nav-icon fas fa-fw fa-calendar-check"></i>
              <p>Agenda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/album" class="nav-link">
              <i class="nav-icon fas fa-fw fa-images"></i>
              <p>Album</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/foto" class="nav-link">
              <i class="nav-icon fas fa-fw fa-image"></i>
              <p>Foto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/halaman" class="nav-link">
              <i class="nav-icon fas fa-fw fa-copy"></i>
              <p>Halaman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('') }}/admin/menu" class="nav-link">
              <i class="nav-icon fas fa-fw fa-list"></i>
              <p>Menu Manager</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
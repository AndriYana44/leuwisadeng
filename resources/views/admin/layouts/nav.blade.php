<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown-user">
          <a class="nav-link dropdown-toggle" href="#">
            <img src="{{ asset('img/user.png') }}" alt="user" width="30">
          </a>
          <div class="dropdown-wrapper shadow rounded">
            <div class="dropdown-image">
              <img src="{{ asset('img/user.png') }}" alt="user" width="80">
            </div>
            <div class="link-wrapper">
              <a class="dropdown-link" href="#"><i class="fa fa-user"></i>&nbsp; Profile</a>
              <a class="dropdown-link" href="#"><i class="fa fa-cog"></i>&nbsp; Pengaturan</a>
              <a class="dropdown-link" href="#"><i class="fa fa-arrow-right"></i>&nbsp; Logout</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
</nav>
<!-- /.navbar -->
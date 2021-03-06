<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/')}}backEnd/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Storage::url(Auth::user()->image) }}" class="" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
          @if(Auth::user()->user_type == 'super_admin')
          <li class="nav-item {{ (Route::is('user.manage')||Route::is('user.create'))?'menu-open':'' }}">
            <a href="#" class="nav-link bg-info">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('user.manage') }}" class="nav-link {{ Route::is('user.manage')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('user.create') }}" class="nav-link {{ Route::is('user.create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
           <li class="nav-item {{ (Route::is('logo.manage')||Route::is('logo.create'))?'menu-open':'' }}">
            <a href="#" class="nav-link bg-info">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Logo Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('logo.manage') }}" class="nav-link {{ Route::is('logo.manage')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('logo.create') }}" class="nav-link {{ Route::is('logo.create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Logo</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item {{ (Route::is('slider.manage')||Route::is('slider.create'))?'menu-open':'' }}">
            <a href="#" class="nav-link bg-info">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                slider Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('slider.manage') }}" class="nav-link {{ Route::is('slider.manage')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('slider.create') }}" class="nav-link {{ Route::is('slider.create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add slider</p>
                </a>
              </li>

            </ul>
          </li>
                <li class="nav-item {{ (Route::is('aboutSection.manage')||Route::is('aboutSection.create'))?'menu-open':'' }}">
                    <a href="#" class="nav-link bg-info">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            AboutSection Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('aboutSection.manage') }}" class="nav-link {{ Route::is('aboutSection.manage')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage aboutSection</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('aboutSection.create') }}" class="nav-link {{ Route::is('aboutSection.create')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add aboutSection</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ (Route::is('recentWorksCategory.manage')||Route::is('recentWorks.manage'))?'menu-open':'' }}">
                    <a href="#" class="nav-link bg-info">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Recent Works Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('recentWorksCategory.manage') }}" class="nav-link {{ Route::is('recentWorksCategory.manage')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RecentWorks Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('recentWorks.manage') }}" class="nav-link {{ Route::is('recentWorks.manage')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recent Works Manage</p>
                            </a>
                        </li>

                    </ul>
                </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

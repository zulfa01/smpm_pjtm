<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('img/icons') }}/logo.jpg" alt="laravel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-bold" style="font-size: 10px;">SMP MUHAMMADIYAH PUJOTOMO</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <i class="fas fa-user-circle" style="font-size: 30px;"></i> <!-- Reduced size -->
      </div>
      <div class="info text-center" style="flex-grow: 1; text-align: center;">
        <a href="#" class="d-block" style="font-size: 14px;">{{ auth()->user()->name }}</a> <!-- Adjust font size as needed -->
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">KELOLA DATA</li>
        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.artikel.index') }}" class="nav-link {{ Request::segment(2) == 'artikel' ? 'active' : '' }}">
            <i class="nav-icon far fa-image"></i>
            <p>
              Artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.kategori-artikel.index') }}" class="nav-link {{ Request::segment(2) == 'kategori-artikel' ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
              Kategori Artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pengumuman.index') }}" class="nav-link {{ Request::segment(2) == 'pengumuman' ? 'active' : '' }}">
            <i class="nav-icon fas fa-info"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.agenda.index') }}" class="nav-link {{ Request::segment(2) == 'agenda' ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Agenda
            </p>
          </a>
        </li>

        <!-- Menu Data Guru -->
        <li class="nav-item">
          <a href="{{ route('admin.data_guru.index') }}" class="nav-link {{ Request::segment(2) == 'data_guru' ? 'active' : '' }}">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Data Guru
            </p>
          </a>
        </li>

        <!-- Menu Galeri -->
        <li class="nav-item">
          <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ Request::segment(2) == 'galeri' ? 'active' : '' }}">
            <i class="nav-icon far fa-image"></i>
            <p>
              Galeri
            </p>
          </a>
        </li>

        <!-- Menu message -->
        <li class="nav-item">
          <a href="{{ route('admin.messages.index') }}" class="nav-link {{ Request::segment(2) == 'messages' ? 'active' : '' }}">
              <i class="nav-icon fas fa-comments"></i>
              <p>Pesan</p>
          </a>
      </li>
      

        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a href="{{ route('admin.profile.index') }}" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-id-card"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.change-password.index') }}" class="nav-link {{ Request::is('admin/change-password') ? 'active' : '' }}">
            <i class="nav-icon fas fa-unlock"></i>
            <p>
              Ubah Password
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa text-success"></i>{{Auth::user()->nomor_induk}}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Utama</li>
        <li>
          <a href="/jadwalMHS">
            <i class="fa fa-dashboard"></i> <span>Jadwal Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="/matkul">
            <i class="fa fa-files-o"></i>
            <span>Daftar Mata Kuliah</span>
            <span class="pull-right-container">
          </a>
        </li>
        <li>
          <a href="/buatMatkul">
            <i class="fa fa-edit"></i> <span>Buat Mata Kuliah Baru</span>
            <span class="pull-right-container">
              <i class="fa pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
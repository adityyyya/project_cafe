<!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <div>
    
</div>
   <div class="image">
   <img src="<?php echo base_url('assets/')?>/images/logo111.png" class="center" alt="center" width="100" height"100">
</div>
<ul class="navbar-nav">
    
    </ul>


    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">WAROENG MODUS</a>
        </div>
      </div>


      <!-- Sidebar Menu -->

          

        
 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('Admin') ?>" class="nav-link <?php if($menu_dashboard == 'active') { echo "active"; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <div>
          <hr class="sidebar-divider my-1">
</div>
<hr>
          
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($menu_menu == 'active') { echo "active"; } ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="">
                <a href="<?php echo site_url('Jenis_menu') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Menu</p>
                </a>
              </li>
              <li class="">
                <a href="<?php echo site_url('Menu') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              </ul>
              <li class="nav-item">
            <a href="#" class="nav-link <?php if($menu_penjualan == 'active') { echo "active"; } ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Penjualan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="">
                <a href="<?php echo site_url('Pemesanan') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li> <li class="">
                <a href="<?php echo site_url('Laporan') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          <div>
          <hr>
          </div>
          <li class="nav-item">
            <a href="<?php echo site_url('Login/proses_logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-reply-all"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
            
            <!-- #Menu -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
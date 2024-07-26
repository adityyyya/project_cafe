

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-4 col-4">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jlh_blm; ?></h3>

              <p>Pesanan Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('pemesanan') ?>" class="small-box-footer">Lihat Di Sini <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-4">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $jlh_menu; ?></h3>

              <p>Jumlah Menu</p>
            </div>
            <div class="icon">
              <i class="fas fa-copy"></i>
            </div>
            <a href="<?php echo site_url('menu') ?>" class="small-box-footer">Lihat Di Sini <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-4">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jlh_total_pemesanan; ?></h3>

              <p>JUMLAH PENJUALAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>

            
            <a href="<?php echo site_url('Pemesanan') ?>" class="small-box-footer">Lihat Di Sini <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url('hawai/')?>/img/1.jpg" alt="First slide" height="1000">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('hawai/')?>/img/2.jpg" alt="Second slide" height="1000">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('hawai/')?>/img/1.jpg" alt="Third slide" height="1000">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

                <!-- Testimonial -->
               
                <!-- End of Testimonial -->
            </div>
        </div>
    </div>
</section>
          
         
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  

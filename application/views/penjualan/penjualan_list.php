    

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Menu</a></li>
              <li class="breadcrumb-item active">Jenis Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-copy mr-1"></i>
                  Pemesanan
                </h3>
                <div class="card-tools">
                <a href="<?php echo site_url('Pemesanan/tambah_pemesanan_otomatis') ?>" class="btn btn-primary">
    <i class="fas fa-plus mr-1"></i> <span>Tambah</span>
</a>
                </div>
              </div><!-- /.card-header -->
                  <div class="card-body">
                  <table class="table table-bordered">
                     <tr> 
                        <th class="text-center">No. Nota</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Kasir </th>
                        <th class="text-center">Status Lunas </th>
                        <th class="text-center">Aksi </th>
                        <?php 
    $nomor_nota = 1; // Inisialisasi variabel nomor nota
    foreach($data_pemesanan as $row) { ?>
    <tr>
        <td class="text-center"><?php echo $nomor_nota++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y H:i:s', strtotime($row->tgl_beli)); ?></td>
                        <td class="text-center"><?php echo $row->username; ?></td>
                        <td class="text-center">
                          <?php if($row->status_lunas == 'T'){ ?>
                            <span class="badge badge-danger">Tidak</span>
                          <?php } else { ?>
                            <span class="badge badge-success">Lunas</span>
                          <?php } ?>
                        </td>
                       
                       
                        <td class="text-center">
    <?php if ($row->status_lunas == 'Y') { ?>
        <a href="<?php echo site_url('Pemesanan/cetak/'.$row->id_pemesanan) ?>" target="_blank" class="btn btn-sm btn-primary"> 
            <i class="fas fa-print mr-1"></i> <span>Cetak</span>
        </a>
    <?php } ?>
    <a href="<?php echo site_url('Detailpemesanan/tampil/'.$row->id_pemesanan) ?>" class="btn btn-sm btn-info"> 
        <i class="fas fa-list mr-1"></i> <span>Detail Pesanan</span>
    </a>
    <?php if ($row->status_lunas != 'Y') { ?>
        <a href="<?php echo site_url('Pemesanan/hapus_pemesanan/'. $row->id_pemesanan) ?>" class="btn btn-sm btn-danger"> 
            <i class="fas fa-trash mr-1"></i> <span>Hapus</span>
        </a>
    <?php } ?>
</td>
                     </tr>
                     <?php } ?>

                  </table>
                  </div>
               </div>
            </div>
      </div>
   </div>
</section>
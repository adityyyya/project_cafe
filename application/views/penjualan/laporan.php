

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
   
<section class="content-wrapper">
   <div class="container-fluid">
      <div class="block-header">
            <h2>Laporan Penjualan</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2></h2>
                           </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('jenis_menu/tambah_jenismenu') ?>" class="btn btn-primary"> 
                              <i class="fas fa-plus mr-1"></i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table">
                     <tr> 
                        <th>No</th>
                        <th>Nomor Meja </th>
                        <th>Tanggal beli </th>
                        <th>ID Kasir </th>
                     </tr>
                     <?php foreach($data_pemesanan as $row) { ?>
                     <tr>
                        <td><?php echo $row->id_pemesanan; ?></td>
                        <td><?php echo $row->no_meja; ?></td>
                        <td><?php echo $row->tgl_beli; ?></td>
                        <td><?php echo $row->id_kasir; ?></td>
                       
                       
                        <td>
                        <a href="<?php echo site_url('Detailpemesanan/tampil/'.$row->id_pemesanan) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons"></i> <span>Detail Pesanan</span></a>
                        <a href="<?php echo site_url('Menu/ubah_menu/'. $row->id_pemesanan) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons"></i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Pemesanan/hapus_pemesanan/'. $row->id_pemesanan) ?>" class="btn btn-sm btn-danger"> 
                              <i class="material-icons"></i> <span>Hapus</span></a>
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
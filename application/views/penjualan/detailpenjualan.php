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
              <li class="breadcrumb-item"><a href="#">Data Penjualan</a></li>
              <li class="breadcrumb-item active">Detail Penjualan</li>
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
                  Detail Pemesanan
                </h3>
                <div class="card-tools">
                  
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered zero-configuration">
                    <tr>
                        <td width="20%">No. Nota</td>
                        <td><?= $data_pemesanan->id_pemesanan; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo date('d-m-Y H:i:s',strtotime($data_pemesanan->tgl_beli)); ?></td>
                    </tr>
                    <tr>
                        <td>Penerima</td>
                        <td><?php echo $data_pemesanan->username; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Menu</td>
                        <td><?php echo $data_pemesanan->jlh_menu; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Items</td>
                        <td><?php echo $data_pemesanan->jlh_item; ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><b>Rp. <?php echo number_format($data_pemesanan->total ?? 0, 0, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td>Lunas</td>
                        <td>
                            <?php if($data_pemesanan->status_lunas == 'Y') { ?>
                                <span class="badge badge-success">Lunas</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">Belum</span>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
              </div>
              <div class="card-body">
                <table class="table table-hover table-bordered">
                   <tr> 
                      <th class="text-center">Nama Menu</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Qty</th>
                      <th class="text-center">Sub Total</th>
                      <?php if($data_pemesanan->status_lunas == 'T') { ?>
                        <th class="text-center">Aksi</th>
                      <?php } ?>
                   </tr>
                   <?php foreach($data_detailpemesanan as $row) { ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row->nama_menu; ?></td>
                        <td style="text-align: center;"><?php echo number_format($row->harga ?? 0, 0, ',', '.'); ?></td>
                        <td style="text-align: center;"><?php echo $row->jumlah; ?></td>
                        <td style="text-align: center;"><?php echo number_format($row->subtotal ?? 0, 0, ',', '.'); ?></td>
                        <?php if($data_pemesanan->status_lunas == 'T') { ?>
                        <td class="text-center" style="text-align: center;">
                            <a href="<?php echo site_url('Detailpemesanan/hapus_detailpesanan/'. $row->id_pemesanan . '/' . $row->id_menu) ?>" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash mr-1"></i> <span>Hapus</span>
                            </a>
                        </td>
                        <?php } ?>
                    </tr>
                   <?php } ?>
                   <?php if($data_pemesanan->status_lunas == 'T') { ?>
                    <tr>
                    <form action="<?= site_url('Detailpemesanan/proses_tambah_item'); ?>" method="post">
                        <td colspan="2">
                            <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan; ?>" >
                            <select class="form-control show-tick" name="id_menu" id="id_menu">
                            <?php foreach($data_menu as $menu){ ?>
                              <option value='<?php echo $menu->id_menu ?>'>
                                  <?php echo $menu->nama_menu ?>
                              </option>
                            <?php } ?>
                            </select>
                        </td>
                        <td>
            <input type="text" class="form-control" name="harga" placeholder="Harga" id="harga" readonly>
        </td>
                        <td>
                            <input type="text" class="form-control" name="jumlah" placeholder="Qty">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary btn-shadow btn-lg" type="submit" name="submit">Simpan</button>
                        </td>
                    </form>
                    </tr>
                   <?php } ?>
                </table>
              </div>
              <div class="card-footer">
                <a href="<?php echo site_url('Pemesanan') ?>" class="btn btn-sm btn-danger"> 
                  <i class="fas fa-arrow-left mr-1"></i> <span>Kembali</span></a>
                <?php if($data_pemesanan->status_lunas == 'T') { ?>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-credit-card mr-1"></i> Pembayaran
                  </button>
                <?php } ?>
              </div>
           </div>
        </div>
     </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= site_url('Pemesanan/set_lunas/'.$data_pemesanan->id_pemesanan) ?>">
      <div class="modal-body">
          <label>Tunai</label>
          <input type="text" name="tunai" class="form-control" autocomplete="off">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Lunas">
      </div>
    </div>
    </form>
  </div>
</div>
</body>

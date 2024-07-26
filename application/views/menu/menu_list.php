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
                  Menu
                </h3>
                <div class="card-tools filter-container">
                  <!-- Dropdown Filter -->
                  <form method="get" action="<?php echo site_url('Menu/filter_menu'); ?>" class="form-inline">
                    <div class="form-group">
                      <label for="id_jenis" class="mr-2">Filter Jenis:</label>
                      <select name="id_jenis" id="id_jenis" class="form-control" onchange="filterMenu()">
                        <option value="">-- Semua Jenis --</option>
                        <?php foreach ($data_jenismenu as $jenis_menu) { ?>
                            <option value='<?php echo $jenis_menu->id_jenis; ?>' <?php echo ($jenis_menu->id_jenis == $id_jenis) ? "selected" : ""; ?>>
                                <?php echo $jenis_menu->nama_jenis; ?>
                            </option>
                        <?php } ?>
                      </select>
                    </div>
                  </form>
                  <a href="<?php echo site_url('Menu/tambah_menu') ?>" class="btn btn-primary ml-2"> 
                    <i class="fas fa-plus mr-1"></i> <span>Tambah</span>
                  </a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                   <tr> 
                      <th class="text-center">No</th>
                      <th class="text-center">Foto</th>
                      <th class="text-center">Nama Menu</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Jenis</th>
                      <!-- <th class="text-center">Status Habis</th> -->
                      <th class="text-center">Aksi</th>
                   </tr>
                   <?php $no=1; foreach($data_menu as $row) { ?>
                   <tr>
                     <td class="text-center"><?php echo $no++; ?></td>
                     <td class="text-center">
                       <?php if ($row->foto != NULL || $row->foto != "") { ?>
                           <img src="<?php echo base_url('uploads/fotomenu/'.$row->foto); ?>" style="height: 90px;border: 1px solid black;" />
                        <?php } ?>
                     </td>
                     <td class="text-center"><?php echo $row->nama_menu; ?></td>
                     <td class="text-center"><?php echo $row->harga; ?></td>
                     <td class="text-center"><?php echo $row->nama_jenis ? $row->nama_jenis : 'Tidak Diketahui'; ?></td>
                     <td class="text-center">
                        <a href="<?php echo site_url('Menu/ubah_menu/'. $row->id_menu) ?>" class="btn btn-sm btn-warning"> 
                           <i class="fas fa-edit mr-1"></i> <span>Ubah</span>
                        </a>
                        <a href="<?php echo site_url('Menu/hapus_Menu/'. $row->id_menu) ?>" class="btn btn-sm btn-danger"> 
                           <i class="fas fa-trash mr-1"></i> <span>Hapus</span>
                        </a>
                     </td>
                   </tr>
                   <?php } ?>
                </table>

                <div class="modal fade" id="modal-tambahmenu">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-footer justify-content-between">
                        <div class="col-md-12 text-center">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <span class="subheading">Tambah</span>
                          <h2>Menu</h2>
                        </div>
                      </div>
                      <form method="post" action="<?= site_url('Menu/proses_tambah_menu'); ?>" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <input type="hidden" class="form-control" name="id_menu" placeholder="ID Menu">
                          </div>
                          <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu">
                          </div>
                          <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="harga" placeholder="Harga">
                          </div>
                          <div class="col-md-12 form-group">
                            <select class="form-control show-tick" name="id_jenis" id="id_jenis">
                              <?php foreach($data_jenismenu as $jenis_menu){ ?>
                                <option value='<?php echo $jenis_menu->id_jenis ?>' <?php if($jenis_menu->id_jenis == $id_jenis) { echo "selected"; } ?>>
                                  <?php echo $jenis_menu->nama_jenis ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-12 form-group">
                            <input type="file" name="foto">
                          </div>
                          <div class="modal-footer justify-content-between">
                            <div class="col-md-12 text-center">
                              <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
function filterMenu() {
    var id_jenis = document.getElementById('id_jenis').value;
    window.location.href = '<?php echo site_url('Menu/filter_menu'); ?>?id_jenis=' + id_jenis;
}
</script>
<!-- Additional CSS for better alignment -->
<style>
.filter-container {
    display: flex;
    align-items: center;
}
.filter-container .form-group {
    margin-right: 10px;
}
</style>
</body>

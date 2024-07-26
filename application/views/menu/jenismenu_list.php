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
                  Jenis Menu
                </h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambahjenis">
                      <i class="fas fa-plus mr-1"></i>Tambah
                      </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                  <tr> 
                     <th>No</th>
                     <th>Nama Jenis </th>
                     <th>Aksi </th>
                  </tr>
                  <?php $no=1; foreach($data_jenismenu as $row) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $row->nama_jenis; ?></td>
                     <td>
                        <a href="<?php echo site_url('Jenis_menu/ubah_jenismenu/'. $row->id_jenis) ?>" class="btn btn-sm btn-warning"> 
                           <i class="fas fa-edit mr-1"></i> <span>Ubah</span></a>
                        <a href="<?php echo site_url('Jenis_menu/hapus_jenismenu/'. $row->id_jenis) ?>" class="btn btn-sm btn-danger"> 
                           <i class="fas fa-trash mr-1"></i> <span>Hapus</span></a>
                     </td>
                  </tr>
                  <?php } ?>
               </table>
   
  <div class="modal fade" id="modal-tambahjenis" tabindex="-1" aria-labelledby="modalTambahJenisLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahJenisLabel">Tambah Jenis Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= site_url('Jenis_menu/proses_tambah_jenismenu') ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="nama_jenis" placeholder="Jenis Menu" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Message Modal -->
<!-- Message Modal -->
<div class="modal fade" id="modal-message" tabindex="-1" aria-labelledby="modalMessageLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMessageLabel">Pesan</h5>
        <!-- Use type="button" for the close button -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if ($this->session->flashdata('message')): ?>
          <p><?php echo $this->session->flashdata('message'); ?></p>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <!-- Use type="button" for the OK button -->
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Include this script in your view -->
<script>
  $(document).ready(function() {
    <?php if ($this->session->flashdata('message')): ?>
      $('#modal-message').modal('show');
    <?php endif; ?>
  });
</script>


              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (required for Bootstrap’s JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
                <h2 class="card-title">
                  LAPORAN PENJUALAN <br/>
                  WAROENG MODUS
                </h2>
              </div><!-- /.card-header -->
                  <div class="card-body">
                  <table class="table table-bordered">
                     <tr> 
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Jan</th>
                        <th class="text-center">Feb</th>
                        <th class="text-center">Mar</th>
                        <th class="text-center">Apr</th>
                        <th class="text-center">Mei</th>
                        <th class="text-center">Jun</th>
                        <th class="text-center">Jul</th>
                        <th class="text-center">Agt</th>
                        <th class="text-center">Sep</th>
                        <th class="text-center">Okt</th>
                        <th class="text-center">Nop</th>
                        <th class="text-center">Des</th>
                     </tr>
                     <?php foreach($data_laporan_penjualan as $row) { ?>
                     <tr>
                        <td class="text-center"><?php echo $row->tahun; ?></td>
                        <td class="text-right"><?php echo number_format($row->jan,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->feb,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->mar,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->apr,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->mei,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->jun,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->jul,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->ags,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->sep,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->okt,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->nop,2,',','.'); ?></td>
                        <td class="text-right"><?php echo number_format($row->des,2,',','.'); ?></td>
                     </tr>
                     <?php } ?>

                  </table>
                  </div>
               </div>
            </div>
      </div>
   </div>
</section>


<script type="text/javascript">
    window.print();
</script>
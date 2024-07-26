
<section  class="bg-fixed bg-white section-padding overlay content-wrapper" style="background-image: url(img/reservation-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-content bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Tambah
                        </span>
                        <h2>
                            Menu
                        </h2>
                    </div>
                    <form method="post"  action="<?= site_url('Menu/proses_tambah_menu'); ?>" enctype="multipart/form-data">
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
    <option value="">-- Pilih Jenis Menu --</option>
    <?php foreach($data_jenismenu as $jenis_menu) { ?>
        <option value='<?php echo $jenis_menu->id_jenis ?>' <?php if($jenis_menu->id_jenis == $id_jenis) { echo "selected"; } ?>>
            <?php echo $jenis_menu->nama_jenis ?>
        </option>
    <?php } ?>
</select>

                            </div>
                            <div class="col-md-12 form-group">
                                <input type="file" name="foto">
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>
    


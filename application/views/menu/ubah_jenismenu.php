

<section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay content-wrapper" style="background-image: url(img/reservation-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-content bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Ubah
                        </span>
                        <h2>
                            Jenis Menu
			
                        </h2>
                    </div>
                    <form method="post"  action="<?= site_url('Jenis_menu/proses_ubah_jenismenu'); ?>">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="id_jenis" value="<?= $id_jenis; ?>">
                                <input type="text" class="form-control" name="nama_jenis" placeholder="Jenis Menu" value="<?= $nama_jenis; ?>">
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
    


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
                            Menu
			
                        </h2>
                    </div>
                    <form method="post"  action="<?= site_url('Menu/proses_ubah_menu'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <input type="hidden" name="id_menu" value="<?= $id_menu; ?>">
                            <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" value="<?= $nama_menu; ?>">
                            </div>
							<div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?= $harga; ?>" >
                            </div>
                            <div class="col-md-12 form-group">  
                            <select class="form-control show-tick" name="id_jenis" id="id_jenis">
                                        <?php
                                        foreach($data_jenis as $jenis_menu){ ?>
                                            <option value='<?php echo $jenis_menu->id_jenis ?>' <?php if($jenis_menu->id_jenis == $id_jenis) { echo "selected"; } ?>>
                                                <?php echo $jenis_menu ->nama_jenis ?>
                                            </option>
                                        <?php } ?>
                             </select>
                             </div>
                            <?php if($foto == NULL || $foto == "") { ?>
                                <div class="col-md-12 form-group">
                                    <input type="file" name="foto">
                                </div>
                            <?php } else { ?>
                                <div class="col-md-12 form-group">
                                    <img src="<?php echo base_url('uploads/fotomenu/'.$foto); ?>" style="height: 90px;border: 1px solid black;" /> <br/>
                                    <a class="resetfoto" href="<?php echo site_url('Menu/resetfoto/'.$id_menu.''); ?>" ><i class="fas fa-times mr-1"></i> Reset Foto</a>
                                </div>
                            <?php } ?>
                          
               
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
    


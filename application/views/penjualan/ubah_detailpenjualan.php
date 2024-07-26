

<section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay content-wrappers" style="background-image: url(img/reservation-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-content bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <span class="subheading">
                           Ubah
                        </span>
                        <h2>
                           Pemesanan
			
                        </h2>
                    </div>
                    <form method="post"  action="proses_tambah_menu.php">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" class="form-control" name="id_menu" placeholder="ID Menu">
                            </div>
                            <div class="col-md-12 form-group">  
                            <select class="form-control show-tick" name="id_menu" id="id_menu">
                            <?php
                                foreach($data_menu as $menu){ ?>
                                <option value='<?php echo $menu->id_menu ?>' <?php if($menu->id_menu == $id_menu) { echo "selected"; } ?>>
                                    <?php echo $menu ->nama_menu ?>
                                </option>
                             <?php } ?>
                             </select>
                             </div>
                            
							<div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="harga" placeholder="Qty">
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
    


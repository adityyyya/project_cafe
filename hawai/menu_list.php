
<?php

$koneksi = mysqli_connect('localhost','root','','hawai');

//pengecekan koneksi database
if(mysqli_connect_errno()){
    echo "koneksi database gagal : " . mysqli_connect_error();
}

?>

<!--cek apakah sudah login -->
<?php
session_start();

if(!$_SESSION['username']){
	header('location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<!--
    Resto by GetTemplates.co
    URL: https://gettemplates.co
    
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hawai</title>
    <meta name="description" content="Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>
<body data-spy="scroll" data-target="#navbar" class="static-layout">
    <div id="side-nav" class="sidenav">
    <a href="javascript:void(0)" id="side-nav-close">&times;</a>
    
    <div class="sidenav-content">
        <p>
            Kuncen WB1, Wirobrajan 10010, DIY
        </p>
        <p>
            <span class="fs-16 primary-color">(+68) 120034509</span>
        </p>
        <p>info@yourdomain.com</p>
    </div>
</div>  <div id="side-search" class="sidenav">
    <a href="javascript:void(0)" id="side-search-close">&times;</a>
    <div class="sidenav-content">
        <form action="">

            <div class="input-group md-form form-sm form-2 pl-0">
              <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="input-group-text red lighten-3" id="basic-text1">
                    <i class="fas fa-search text-grey" aria-hidden="true"></i>
                </button>
              </div>
            </div>

        </form>
    </div>
    
    
</div>  
    <div id="canvas-overlay"></div>
    <div class="boxed-page">
        <nav id="navbar-header" class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand navbar-brand-center d-flex align-items-center p-0 only-mobile" href="/">
            <img src="img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-between">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="menu_list.php" id="navbarDropdown" 
						role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="lnr lnr-menu"></span>
                    </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="proses_logout.php">Logout</a>
                          
                        </div>
                </li>


            <div class="d-flex flex-lg-row flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="hawai.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="list_pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat_list.php">Riwayat</a>
                    </li>
                   

                </div>



            </ul>
            <a class="navbar-brand navbar-brand-center d-flex align-items-center only-desktop" href="#">
                <img width='1000%' src="img/hawai1.jpg" alt="">
            </a>
            <ul class="navbar-nav d-flex justify-content-between">
                <div class="d-flex flex-lg-row flex-column">
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="komentar_saran_list.php">Saran / Komentar</a>
                    </li>

                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="menu_list.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Jenis Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="menu_list.php">Dessert</a>
                          <a class="dropdown-item" href="menu_list.php">Halal FOOD</a>
                          <a class="dropdown-item" href="menu_list.php">Non Halal FOOD</a>
                          <a class="dropdown-item" href="menu_list.php">Moktail</a>
                          <a class="dropdown-item" href="menu_list.php">Snack</a>
                        </div>
                    </li>
                </div>
                <li class="nav-item">
                    <a id="side-search-open" class="nav-link" href="#">
                        <span class="lnr lnr-magnifier"></span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>  
<hr>
    
  <!-- Menu Section -->
<section id="gtco-menu" class="section-padding">
    <div class="container">
        <div class="section-content">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Specialties
                        </span>
                        <h2>
                            Our Menu Hawai 
                        </h2>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 menu-wrap">
                    <div class="heading-menu">
                        <h3 class="text-center mb-5">Deseret & Snack</h3>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/choco.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Chocolate Caramel</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">25 K</h4>
                                </div>
                            </div>
                            <p>Deseret</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/waffle.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Waffle Choco Ribe</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">17 K</h4>
                                </div>
                            </div>
                            <p>Deseret</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/crispy.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Crispy Pokpok</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">20 K</h4>
                                </div>
                            </div>
                            <p>Snack</p>
                        </div>
                    </div>
					
					<div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/nachos.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Nachos Cheese</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">25 K</h4>
                                </div>
                            </div>
                            <p>Snack</p>
                        </div>
						
                    </div>
                </div>

                <div class="col-lg-4 menu-wrap">
                    <div class="heading-menu">
                        <h3 class="text-center mb-5">Halal & Non Halal Food </h3>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/nasi.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Nasi Goreng Hawai Beach</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">35 K</h4>
                                </div>
                            </div>
                            <p>Halal</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/mie.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Mie Goreng Hawai Beach</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">30 K</h4>
                                </div>
                            </div>
                            <p>Halal</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/babitaliwang.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Babi Taliwang</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">50 K</h4>
                                </div>
                            </div>
                            <p>Non Halal</p>
                        </div>
                    </div>
					 <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/pork.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Pork Belly SS</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">50 K</h4>
                                </div>
                            </div>
                            <p>Non Halal</p>
                        </div>
                    </div>
					
					
					
					
                </div>

                <div class="col-lg-4 menu-wrap">
                    <div class="heading-menu">
                        <h3 class="text-center mb-5">Moktail & Cocktail</h3>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/lemon.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Lemon Squash Hawai</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">20 K</h4>
                                </div>
                            </div>
                            <p>Moktail</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/bery.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Strawbery Mozito</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">30 K</h4>
                                </div>
                            </div>
                            <p>Moktail</p>
                        </div>
                    </div>
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/peach.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Hawai Peach</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">35 K</h4>
                                </div>
                            </div>
                            <p>Cocktail</p>
                        </div>
                    </div>
					 <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="img/berycold.jpg" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>Berrycold</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">30 K</h4>
                                </div>
                            </div>
                            <p>Cocktail</p>
                        </div>
                    </div>
					
					
					
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of menu Section -->        
 <div class="card-tools" align= "center">
                <a class="btn btn-primary" href="tambah_menu_form.php"><i class="fas fa-plus mr-1"></i>Tambah Menu </a>
                </div>
				
				<br>
				<br>
    <hr>
    <footer class="mastfoot pb-5 bg-white section-padding pb-0">
    <div class="inner container">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="footer-widget px-lg-6 px-0">
                    <h4>Open Hours</h4>
                    <ul class="list-unstyled open-hours">
                        <li class="d-flex justify-content-between"><span>Monday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex justify-content-between"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex justify-content-between"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex justify-content-between"><span>Thursday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex justify-content-between"><span>Friday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex justify-content-between"><span>Saturday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex justify-content-between"><span>Sunday</span><span> Closed</span></li>
                      </ul>
                </div>
                
            </div>

        
            <div class="col-md-12 d-flex align-items-center">
                <p class="mx-auto text-center mb-0">Copyright 2022. All Right Reserved. Design by kelompok 5 </a></p>
            </div>
            
        </div>
    </div>
</footer>   </div>
</div>
    <!-- External JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js "></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script src="vendor/stellar/jquery.stellar.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Main JS -->
    <script src="js/app.min.js "></script>
</body>
</html>
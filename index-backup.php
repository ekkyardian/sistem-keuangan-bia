<?php
ob_start();
require_once('config/+koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Keuangan | PT. BIA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- DataTables
		============================================ -->
        <link rel="stylesheet" href="assets/dataTables/datatables.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="assets/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>                            
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-chat"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Chat</h2>
                                    </div>
                                    <div class="search-people">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" placeholder="Search People" />
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="assets/img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Last seen 3 hours ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="assets/img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Last seen 2 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="assets/img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="assets/img/post/2.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#home">Beranda</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="?page=quick_info">Quick Info</a></li>
                                        <li><a href="?page=profile">Profile</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Transaksi</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="?page=kas">Kas</a></li>
                                        <li><a href="?page=bank_mandiri">Bank Mandiri</a></li>
                                        <li><a href="?page=bank_bni">Bank BNI</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Laporan</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="?page=laporan_keseluruhan">Laporan Keseluruhan</a></li>
                                        <li><a href="?page=laporan_per_kategori"></a>Laporan Per Kategori</li>
                                        <li><a href="?page=neraca">Neraca</a></li>
                                        <li><a href="?page=laba_rugi">Laba Rugi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#home"><i class="notika-icon notika-house"></i> Beranda</a>
                        </li>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-edit"></i> Transaksi</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-bar-chart"></i> Laporan</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="?page=quick_info">Quick Info</a>
                                </li>
                                <li><a href="?page=profile">Profile</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="?page=kas">Kas</a>
                                </li>
                                <li><a href="?page=bank_mandiri">Bank Mandiri</a>
                                </li>
                                <li><a href="?page=bank_bni">Bank BNI</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="?page=laporan_keseluruhan">Laporan Keseluruhan</a>
                                </li>
                                <li><a href="?page=laporan_per_kategori">Laporan Per Kategori</a>
                                </li>
                                <li><a href="?page=neraca">Neraca</a>
                                </li>
                                <li><a href="?page=laba_rugi">Laba Rugi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Content area -->
    <?php
    if(@$_GET['page']=='quick_info' || @$_GET['page']=='') {
        include "views/admin/beranda.php";
    } else if(@$_GET['page']=='profile') {
        include "views/admin/profile.php";
    } else if(@$_GET['page']=='kas') {
        include "views/admin/kas.php";
    } else if(@$_GET['page']=='bank_mandiri') {
        include "views/admin/bank_mandiri.php";
    } else if(@$_GET['page']=='bank_bni') {
        include "views/admin/bank_bni.php";
    } else if(@$_GET['page']=='laporan_keseluruhan') {
        include "views/admin/laporan_keseluruhan.php";
    } else if(@$_GET['page']=='laporan_per_kategori') {
        include "views/admin/laporan_per_kategori.php";
    } else if(@$_GET['page']=='neraca') {
        include "views/admin/neraca.php";
    } else if(@$_GET['page']=='laba_rugi') {
        include "views/admin/laba_rugi.php";
    }
    ?>
    <!-- End Content area -->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/dataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="assets/js/counterup/waypoints.min.js"></script>
    <script src="assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="assets/js/flot/jquery.flot.js"></script>
    <script src="assets/js/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/flot/curvedLines.js"></script>
    <script src="assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="assets/js/knob/jquery.knob.js"></script>
    <script src="assets/js/knob/jquery.appear.js"></script>
    <script src="assets/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="assets/js/wave/waves.min.js"></script>
    <script src="assets/js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="assets/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="assets/js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="assets/js/chat/moment.min.js"></script>
    <script src="assets/js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="assets/js/main.js"></script>
    <!-- DataTables
		============================================ -->
        <script src="assets/dataTables/datatables.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#datatables').DataTable();
            } );
        </script>
</body>

</html>
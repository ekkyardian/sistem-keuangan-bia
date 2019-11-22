<?php
include "../../models/admin/m_beranda.php";

$beranda = new Beranda($connection);

$bulan = date('m');
$tahun = date('Y');
?>

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: rgba(51,204,51,0.6)">
                    <div class="website-traffic-ctn">
                        <h2>Rp<span class="counter">
                                <?php
                                $saldo_kas = $beranda->ambil_saldo($bulan, $tahun, 'Kas');
                                $kas = $saldo_kas->fetch_object();
                                echo number_format($kas->jumlah_saldo, 0, ",", ",");
                                ?>
                            </span></h2>
                        <p>Saldo tersedia di <strong>Kas</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: rgba(0,102,255,0.51)">
                    <div class="website-traffic-ctn">
                        <h2>Rp<span class="counter">
                                <?php
                                $saldo_mandiri = $beranda->ambil_saldo($bulan, $tahun, 'Bank Mandiri');
                                $mandiri = $saldo_mandiri->fetch_object();
                                echo number_format($mandiri->jumlah_saldo, 0, ",", ",");
                                ?>
                            </span></h2>
                        <p>Saldo tersedia di <strong>Bank Mandiri</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: rgba(255,51,0,0.51)">
                    <div class="website-traffic-ctn">
                        <h2>Rp<span class="counter">
                                <?php
                                $saldo_bni = $beranda->ambil_saldo($bulan, $tahun, 'Bank BNI');
                                $bni = $saldo_bni->fetch_object();
                                echo number_format($bni->jumlah_saldo, 0, ",", ",");
                                ?>
                            </span></h2>
                        <p>Saldo tersedia di <strong>Bank BNI</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: rgba(0,0,0,0.19)">
                    <div class="website-traffic-ctn">
                        <h2>Rp<span class="counter">
                                <?php
                                $total_saldo = $kas->jumlah_saldo + $mandiri->jumlah_saldo + $bni->jumlah_saldo;
                                echo number_format($total_saldo, 0, ",", ",");
                                ?>
                            </span></h2>
                        <p><strong>Total seluruh saldo</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Status area-->
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="sale-statistic-inner notika-shadow mg-tb-30" style="background-color: rgba(0,0,0,0.05)">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                        </div>
                    </div>
                    <div align="center">
                        <table>
                            <tr>
                                <!--                                <td><img src="../../assets/img/logo-bia.png" width="280px"></td>-->
                                <td><img src="../../assets/img/si-logo.png" width="280px"></td>
                            </tr>
                        </table>
                        <br />
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="past-day-statis" align="center">
                        <img src="../../assets/img/avatar.png" width="100px">
                        <br/><br/>
                        <table class="table table-sc-ex">
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><?php echo $_SESSION['hak_akses']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
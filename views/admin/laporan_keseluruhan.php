<?php
include "models/admin/m_kas.php";
include "models/admin/m_bulan.php";

$kas = new Kas($connection);

// model bulan
$mBulan = new M_bulan($connection);

// set id bulan
$setIdBulan = function($id) {
    if($id <= 9) {
        $id = "0".$id;
    }

    return $id;
};

if(isset($_GET['cetak'])) {
    $getUri = $kas->get_uri();

    $periode_bulan = $getUri['periode_bulan'];
    $periode_tahun = $getUri['periode_tahun'];

    $act = "views/admin/lap_keseluruhan.php";
    $link = "periode_bulan=".$periode_bulan."&periode_tahun=".$periode_tahun."&page=kas&page=laporan_keseluruhan&cetak=&req=cetak";
?>

    <script>window.open('<?=$act.'?'.$link;?>', '_blank');</script>

    <?php
} elseif(isset($_GET['pdf'])) {
    $getUri = $kas->get_uri();

    $periode_bulan = $getUri['periode_bulan'];
    $periode_tahun = $getUri['periode_tahun'];

    $act = "report/cetak_lap_pendahuluan.php";
    $link = "periode_bulan=".$periode_bulan."&periode_tahun=".$periode_tahun."&page=kas&page=laporan_keseluruhan&cetak=&req=pdf";

?>
    <script>window.open('<?=$act.'?'.$link;?>', '_blank');</script>

    <?php

} else {
    $link = "";
    $act = "";
}
?>

<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-mail"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Laporan Keseluruhan:</h2>
<!--                                    <p>Silakan pilih periode bulan dan tahun laporan</p>-->
                                    <!-- Pilih Periode area Start-->
                                    <form name="kas_show_by" method="get" class="form-custom">
                                        <select name="periode_bulan" id="periode_bulan" class="form-control form-control-custom">
                                            <option value="">Bulan...</option>
                                            <?php
                                            $result = $mBulan->get_bulan();
                                            while ($data = $result->fetch_object()) {
                                                $bulan = $setIdBulan($data->bulan);
                                                $nama_bulan = ucfirst($data->nama_bulan);

                                                if(isset($_GET['periode_bulan']) && $_GET['periode_bulan'] == $bulan) {
                                                    $selected = "selected";
                                                } else { $selected = ""; }

                                                echo '<option value="'.$bulan.'" '.$selected.'>'.$nama_bulan.'</option>';
                                            }
                                            ?>
                                        </select> &nbsp;

                                        <select name="periode_tahun" id="periode_tahun" class="form-control form-control-custom">
                                            <option value="">Tahun...</option>
                                            <?php
                                            for($y = date("Y"); $y >= (date("Y") - 4); $y--) {

                                                if(isset($_GET['periode_tahun']) && $_GET['periode_tahun'] == $y) {
                                                    $selected = "selected";
                                                } else { $selected = ""; }

                                                echo '<option value="'.$y.'" '.$selected.'>'.$y.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="page" value="kas">
                                        &nbsp;
                                        <input type="hidden" name="page" value="laporan_keseluruhan">
                                        <button type="submit" name="cetak" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</button>
                                        &nbsp;
                                        <button type="submit" name="pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Download PDF</button>

                                    </form>
                                    <!-- Pilih Periode area End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
<!--<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Data Transaksi <font color=#33cc33>Kas</font></h2>
                    </div>
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Data Table area End-->
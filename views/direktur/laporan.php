<?php
include "../../models/admin/m_kas.php";
include "../../models/admin/M_bulan.php";

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
    $sumber_dana = $_GET['sumber_dana'];

    $act = "../admin/laporan_cetak.php";
    $link = "periode_bulan=".$periode_bulan."&periode_tahun=".$periode_tahun."&page=kas&page=laporan&cetak=&req=cetak&sumber=".$sumber_dana;
    ?>

    <script>window.open('<?=$act.'?'.$link;?>', '_blank');</script>

    <?php
} elseif(isset($_GET['pdf'])) {
    $getUri = $kas->get_uri();

    $periode_bulan = $getUri['periode_bulan'];
    $periode_tahun = $getUri['periode_tahun'];
    $sumber_dana = $_GET['sumber_dana'];

    $act = "../admin/laporan_pdf.php";
    $link = "periode_bulan=".$periode_bulan."&periode_tahun=".$periode_tahun."&page=kas&page=laporan&cetak=&req=pdf&sumber=".$sumber_dana;

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
                                    <i class="notika-icon notika-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <br />
                                    <p><h4>Laporan Keuangan</h4></p>
                                    <br />
                                    <!--                                    <p>Silakan pilih periode bulan dan tahun laporan</p>-->
                                    <!-- Pilih Periode area Start-->
                                    <form name="kas_show_by" method="get" class="form-custom">
                                        <table class="table table-sc-ex">
                                            <tr>
                                                <td>Periode Bulan</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="periode_bulan" id="periode_bulan" class="form-control form-control-custom" required>
                                                        <option value="">Pilih...</option>
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
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Periode Tahun</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="periode_tahun" id="periode_tahun" class="form-control form-control-custom" required>
                                                        <option value="">Pilih...</option>
                                                        <?php
                                                        for($y = date("Y"); $y >= (date("Y") - 4); $y--) {

                                                            if(isset($_GET['periode_tahun']) && $_GET['periode_tahun'] == $y) {
                                                                $selected = "selected";
                                                            } else { $selected = ""; }

                                                            echo '<option value="'.$y.'" '.$selected.'>'.$y.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sumber Dana</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="sumber_dana" id="sumber_dana" class="form-control form-control-custom" required>
                                                        <option value="">Pilih...</option>
                                                        <option value="Kas">Kas</option>
                                                        <option value="Bank Mandiri">Bank Mandiri</option>
                                                        <option value="Bank BNI">Bank BNI</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button type="submit" name="cetak" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</button>
                                                    &nbsp;
                                                    <button type="submit" name="pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Download PDF</button>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type="hidden" name="page" value="kas">
                                        <input type="hidden" name="page" value="laporan">
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
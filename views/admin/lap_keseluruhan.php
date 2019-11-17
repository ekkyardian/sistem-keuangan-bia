<?php

if($_GET['req']=='cetak') {
    require_once('../../config/+koneksi.php');
    require_once('../../models/database.php');
    include "../../models/admin/m_lap_keseluruhan.php";
} elseif($_GET['req']=='pdf') {
    require_once('../config/+koneksi.php');
    require_once('../models/database.php');
    include "../models/admin/m_lap_keseluruhan.php";
}

$connection = new Database($host, $user, $pass, $database);
$laporankeseluruhan = new LaporanKeseluruhan($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style type="text/css">
        .table {
            font-family: "Times New Roman";
            font-size: 12px;
            border-collapse: collapse;
        }

        .table td, th {
            border: 1px #B2B2B2 solid;
            height: 25px;
        }

        .style_no {
            width: 30px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_voucher {
            width: 115px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_tanggal {
            width: 90px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_desc {
            width: 400px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_debit_kredit {
            width: 100px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_saldo {
            width: 120px;
            background-color: #B2B2B2;
            text-align: center;
        }

        .style_content_center {
            text-align: center;
        }

        .style_content_left {
            text-align: left;
        }

        .style_content_right {
            text-align: right;
        }
    </style>
</head>
<body>
    <table class="table">
        <thead>
            <tr align="center">
                <td colspan="2">Logo</td>
                <td colspan="5">
                    <h2>PT BINA INFRA ANTARNUSA</h2>
                    <p>LAPORAN KEUANGAN KAS</p>
                    <p>BULAN ... TAHUN ...</p>
                </td>
            </tr>
            <?php
            $bulan = $_GET['periode_bulan'];
            $tahun = $_GET['periode_tahun'];
            if(isset($_POST['go'])) {
                $bulan  = $_POST['bulan'];
                $tahun  = $_POST['tahun'];
            }
            ?>
            <tr>
                <th class="style_no">No</th>
                <th class="style_voucher">Voucher</th>
                <th class="style_tanggal">Tanggal</th>
                <th class="style_desc">Deskripsi</th>
                <th class="style_debit_kredit">Debit</th>
                <th class="style_debit_kredit">Kredit</th>
                <th class="style_saldo">Saldo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" align="right">Mutasi saldo bulan ... :</td>
                <td></td>
            </tr>
            <?php
            $no = 1;
            $saldo = 0;
            $debit = 0;
            $kredit = 0;
            $balance = 0;
            $tampil = $laporankeseluruhan->tampil_kas($bulan, $tahun);
            while($data = $tampil->fetch_object()) {
            ?>
            <tr>
                <td class="style_content_center"><?php echo $no++; ?></td>
                <td class="style_content_center"><?php echo $data->no_voucher; ?></td>
                <td class="style_content_center"><?php echo $data->tanggal; ?></td>
                <td class="style_content_left"><?php echo $data->deskripsi; ?></td>
                <td class="style_content_right">
                    <?php
                    if($data->jenis == "Debit") {
                        echo number_format($data->jumlah, 0, ",", ".");
                        $saldo += $data->jumlah;
                        $debit += $data->jumlah;
                    } else {
                        echo "";
                    }
                    ?>
                </td>
                <td class="style_content_right">
                    <?php
                    if($data->jenis == "Kredit") {
                        echo number_format($data->jumlah, 0, ",", ".");
                        $saldo -= $data->jumlah;
                        $kredit += $data->jumlah;
                    } else {
                        echo "";
                    }
                    ?>
                </td>
                <td class="style_content_right"><?php echo number_format($saldo, 0, ",", "."); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <td class="style_content_right" colspan="4">Total: &nbsp;</td>
            <td class="style_content_right"><?php echo number_format($debit, 0, ",", "."); ?></td>
            <td class="style_content_right"><?php echo number_format($kredit, 0, ",", "."); ?></td>
            <td class="style_content_right"><?php $balance = $debit - $kredit; echo number_format($balance, 0, ",", "."); ?></td>
        </tr>
            </tfoot>
    </table>
    <?php
    ?>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>
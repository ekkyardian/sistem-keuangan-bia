<?php

if ($_GET['req'] == 'cetak') {
    require_once('../../config/+koneksi.php');
    require_once('../../models/database.php');
    include "../../models/direktur/m_lap_keseluruhan.php";
} elseif ($_GET['req'] == 'pdf') {
    require_once('../../config/+koneksi.php');
    require_once('../../models/database.php');
    include "../../models/direktur/m_lap_keseluruhan.php";
}

$connection = new Database($host, $user, $pass, $database);
$laporankeseluruhan = new LaporanKeseluruhan($connection);

if ($_GET['periode_bulan'] == 1) {
    $nama_bulan = "JANUARI";
    $bulan_sebelumnya = "DESEMBER";
    $bulan_saldo = 12;
    $tahun_saldo = $_GET['periode_tahun'] - 1;
} elseif ($_GET['periode_bulan'] == 2) {
    $nama_bulan = "FEBRUARI";
    $bulan_sebelumnya = "JANUARI";
    $bulan_saldo = 1;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 3) {
    $nama_bulan = "MARET";
    $bulan_sebelumnya = "FEBRUARI";
    $bulan_saldo = 2;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 4) {
    $nama_bulan = "APRIL";
    $bulan_sebelumnya = "MARET";
    $bulan_saldo = 3;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 5) {
    $nama_bulan = "MEI";
    $bulan_sebelumnya = "APRIL";
    $bulan_saldo = 4;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 6) {
    $nama_bulan = "JUNI";
    $bulan_sebelumnya = "MEI";
    $bulan_saldo = 5;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 7) {
    $nama_bulan = "JULI";
    $bulan_sebelumnya = "JUNI";
    $bulan_saldo = 6;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 8) {
    $nama_bulan = "AGUSTUS";
    $bulan_sebelumnya = "JULI";
    $bulan_saldo = 7;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 9) {
    $nama_bulan = "SEPTEMBER";
    $bulan_sebelumnya = "AGUSTUS";
    $bulan_saldo = 8;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 10) {
    $nama_bulan = "OKTOBER";
    $bulan_sebelumnya = "SEPTEMBER";
    $bulan_saldo = 9;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 11) {
    $nama_bulan = "NOVEMBER";
    $bulan_sebelumnya = "OKTOBER";
    $bulan_saldo = 10;
    $tahun_saldo = $_GET['periode_tahun'];
} elseif ($_GET['periode_bulan'] == 12) {
    $nama_bulan = "DESEMBER";
    $bulan_sebelumnya = "NOVEMBER";
    $bulan_saldo = 11;
    $tahun_saldo = $_GET['periode_tahun'];
} else {
    $nama_bulan = "ERROR";
    $bulan_sebelumnya = "ERROR";
    $bulan_saldo = "ERROR";
    $tahun_saldo = "ERROR";
    $tahun_saldo = "ERROR";
}
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
            font-size: 13px;
            border-collapse: collapse;
        }

        .style_table {
            border: 1px solid black;
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
            width: 80px;
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
            width: 100px;
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

        .style_hidden {
            text-align: center;
            color: white;
        }

        .kop1 {
            font-size: 25px;
            text-align: center;
            margin-bottom: -10px;
            font-weight: bold;
        }

        .kop2 {
            font-size: 18px;
            text-align: center;
            margin-bottom: -10px;
        }

        .kop3 {
            font-size: 18px;
            text-align: center;
        }

        .logo_b {
            font-family: Arial;
            font-size: 60px;
            color: black;
        }

        .logo_ia {
            font-family: Arial;
            font-size: 60px;
            color: #d13939;
        }
    </style>
</head>
<body>
<table class="table">
    <thead>
    <tr align="center">
        <td colspan="2"><font class="logo_b"><strong>B</strong></font>
            <font class="logo_ia"><strong>IA</strong></font></td>
        <td colspan="5" class="style_content_center">
            <p class="kop1">PT BINA INFRA ANTARNUSA</p>
            <p class="kop2">LAPORAN KEUANGAN KAS</p>
            <p class="kop3">BULAN <?php echo $nama_bulan; ?> TAHUN <?php echo $tahun_saldo; ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="7" class="style_hidden">.</td>
    </tr>
    <tr class="style_table">
        <th class="style_no style_table">No</th>
        <th class="style_voucher style_table">Voucher</th>
        <th class="style_tanggal style_table">Tanggal</th>
        <th class="style_desc style_table">Deskripsi</th>
        <th class="style_debit_kredit style_table">Debit (Rp)</th>
        <th class="style_debit_kredit style_table">Kredit (Rp)</th>
        <th class="style_saldo style_table">Saldo (Rp)</th>
    </tr>
    </thead>
    <tbody>
    <tr class="style_table">
        <td colspan="6" align="right"><strong>Mutasi Saldo Bulan <?php echo ucwords(strtolower($bulan_sebelumnya)); ?>
                Tahun <?php echo $_GET['periode_tahun']; ?>:</strong>
        </td>
        <td class="style_content_right style_table">
            <strong>
            <?php
            $data_saldo = $laporankeseluruhan->tampil_saldo($bulan_saldo, $tahun_saldo);
            $data_s = $data_saldo->fetch_object();
            echo number_format($data_s->jumlah_saldo, 0, ",", ".");
            ?>
            </strong>
        </td>
    </tr>
    <?php
    $no = 1;
    $saldo = $data_s->jumlah_saldo;
    $debit = 0;
    $kredit = 0;
    $balance = 0;
    $tampil = $laporankeseluruhan->tampil_kas($bulan_saldo, $tahun_saldo);
    while ($data = $tampil->fetch_object()) {
        ?>
        <tr class="style_table">
            <td class="style_content_center style_table"><?php echo $no++; ?></td>
            <td class="style_content_center style_table"><?php echo $data->no_voucher; ?></td>
            <td class="style_content_center style_table"><?php echo $data->tanggal; ?></td>
            <td class="style_content_left style_table"><?php echo $data->deskripsi; ?></td>
            <td class="style_content_right style_table">
                <?php
                if ($data->jenis == "Debit") {
                    echo number_format($data->jumlah, 0, ",", ".");
                    $saldo += $data->jumlah;
                    $debit += $data->jumlah;
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td class="style_content_right style_table">
                <?php
                if ($data->jenis == "Kredit") {
                    echo number_format($data->jumlah, 0, ",", ".");
                    $saldo -= $data->jumlah;
                    $kredit += $data->jumlah;
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td class="style_content_right style_table"><?php echo number_format($saldo, 0, ",", "."); ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr class="style_table">
        <td class="style_content_right style_table" colspan="4"><strong>Total: &nbsp;</strong></td>
        <td class="style_content_right style_table"><strong><?php echo number_format($debit, 0, ",", "."); ?></strong></td>
        <td class="style_content_right style_table"><strong><?php echo number_format($kredit, 0, ",", "."); ?></strong></td>
        <td class="style_content_right style_table"><strong><?php $balance = $debit - $kredit;
                echo number_format($balance, 0, ",", "."); ?></strong></td>
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
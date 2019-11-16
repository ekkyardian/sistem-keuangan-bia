<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/admin/m_lap_keseluruhan.php";
$connection = new Database($host, $user, $pass, $database);
$laporankeseluruhan = new LaporanKeseluruhan($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="3px">
        <thead>
            <tr align="center">
                <td colspan="2">Logo</td>
                <td colspan="5">
                    <h2>PT BINA INFRA ANTARNUSA</h2>
                    <p>LAPORAN KEUANGAN KAS</p>
                    <p>BULAN ... TAHUN ...</p>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <input type="text" name="bulan" id="bulan" value="12">
                    <input type="text" name="tahun" id="tahun" value="2020">
                    <button type="submit" class="btn btn-success" name="go">Go</button>
                    <?php
                    $bulan = 11;
                    $tahun = 2019;
                    if(isset($_POST['go'])) {
                        $bulan  = $_POST['bulan'];
                        $tahun  = $_POST['tahun'];
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>No</th>
                <th>Voucher</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
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
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->no_voucher; ?></td>
                <td><?php echo $data->tanggal; ?></td>
                <td><?php echo $data->deskripsi; ?></td>
                <td>
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
                <td>
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
                <td><?php echo number_format($saldo, 0, ",", "."); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <td colspan="4" align="right">Total: &nbsp;</td>
            <td><?php echo number_format($debit, 0, ",", "."); ?></td>
            <td><?php echo number_format($kredit, 0, ",", "."); ?></td>
            <td><?php $balance = $debit - $kredit; echo number_format($balance, 0, ",", "."); ?></td>
        </tfoot>
    </table>
    <?php
    ?>
</body>
</html>
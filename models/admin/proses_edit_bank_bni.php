<?php
require_once('../../config/+koneksi.php');
require_once('../database.php');
include "m_bank_bni.php";
$connection = new Database($host, $user, $pass, $database);
$bankbni = new BankBni($connection);

$id_transaksi       = $_POST['id_transaksi'];
$no_voucher         = $connection->conn->real_escape_string($_POST['no_voucher']);
$tanggal            = $connection->conn->real_escape_string($_POST['tanggal']);
$deskripsi          = $connection->conn->real_escape_string($_POST['deskripsi']);
$jenis              = $connection->conn->real_escape_string($_POST['jenis']);
$jumlah             = $connection->conn->real_escape_string($_POST['jumlah']);
$lokasi_dana        = $connection->conn->real_escape_string($_POST['lokasi_dana']);

$pict = $_FILES['kwitansi_pendukung']['name'];
$extensi = explode(".", $_FILES['kwitansi_pendukung']['name']);
$kwitansi_pendukung = "Kwitansi-".round(microtime(true)).".".end($extensi);
$sumber = $_FILES['kwitansi_pendukung']['tmp_name'];

if($pict == '') {
    $bankbni->edit("UPDATE tb_transaksi SET no_voucher='$no_voucher', tanggal='$tanggal', deskripsi='$deskripsi', jenis='$jenis', jumlah='$jumlah', lokasi_dana='$lokasi_dana' WHERE id_transaksi='$id_transaksi'");
    echo "<script>window.location='?page=bank_bni';</script>";
} else {
    $kwitansi_awal = $bankbni->tampil($id_transaksi)->fetch_object()->kwitansi_pendukung;
    unlink("../../assets/img/kwitansi/".$kwitansi_awal);
    
    $upload = move_uploaded_file($sumber, "../../assets/img/kwitansi/".$kwitansi_pendukung);
    if($upload) {
        $bankbni->edit("UPDATE tb_transaksi SET no_voucher='$no_voucher', tanggal='$tanggal', deskripsi='$deskripsi', jenis='$jenis', jumlah='$jumlah', lokasi_dana='$lokasi_dana', kwitansi_pendukung='$kwitansi_pendukung' WHERE id_transaksi='$id_transaksi'");
    echo "<script>window.location='?page=bank_bni';</script>";
    } else {
        echo "<script>alert('Gagal mengunggah gambar :(')</script>";
    }
}
?>
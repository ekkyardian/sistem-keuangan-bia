<?php
class BankBni {
    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_transaksi";
        if($id == null) {
            $sql .= " WHERE lokasi_dana = 'Bank BNI'  ORDER BY tanggal asc";
        } else if($id != null) {
            $sql .= " WHERE id_transaksi = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($no_voucher, $tanggal, $deskripsi, $jenis, $jumlah, $lokasi_dana, $id_kategori, $kwitansi_pendukung) {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO tb_transaksi VALUES ('','$no_voucher','$tanggal','$deskripsi','$jenis','$jumlah','$lokasi_dana','$id_kategori','$kwitansi_pendukung')") or die ($db->error);
    }

    public function edit($sql) {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }

    public function hapus($id) {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_transaksi WHERE id_transaksi='$id'") or die ($db->error);
    }

    function __destruct() {
        $db = $this->mysqli->conn;
        $db->close();
    }

/*    public function cek_saldo() {
        $db = $this->mysqli->conn;
        $db->query("SELECT periode_bulan, periode_tahun FROM tb_saldo");
    }
*/
}
?>
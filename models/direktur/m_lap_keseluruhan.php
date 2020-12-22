<?php
class LaporanKeseluruhan {
    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function tampil_kas($bulan, $tahun) {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_transaksi WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun' AND lokasi_dana = 'Kas' ORDER BY tanggal asc";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tampil_saldo($bulan_saldo, $tahun_saldo) {
        $db = $this->mysqli->conn;
        $sql = "SELECT jumlah_saldo FROM tb_saldo WHERE periode_bulan='$bulan_saldo' AND periode_tahun='$tahun_saldo'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function ambil_bulan() {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_transaksi WHERE month(tanggal)=11 AND lokasi_dana = 'Kas' ORDER BY tanggal asc";
        $query = $db->query($sql) or die ($db->error);
        return $query;
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
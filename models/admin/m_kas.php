<?php
class Kas {
    private $mysqli;

    // variabel periodeBulan;
    private $periodeBulan;
    // variabel periodeTahun;
    private $periodeTahun;

    function __construct($conn) {
        $this->mysqli = $conn;

        // set variabel periodeBulan
        $this->periodeBulan = '';
        // set variabel periodeTahun
        $this->periodeTahun = '';
    }

    public function tampil($id = null) {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_transaksi";
        if($id == null) {
            $sql .= " WHERE lokasi_dana = 'Kas' ";

            // by tahun
            $tahun = $this->periodeTahun;
            if(!empty($tahun)) {
                $sql .= " AND YEAR(tanggal) = '".$tahun."' ";
            }

            // by bulan
            $bulan = $this->periodeBulan;
            if(!empty($bulan)) {
                $sql .= " AND MONTH(tanggal) = '".$bulan."' ";
            }

        } else if($id != null) {

            $sql .= " WHERE id_transaksi = $id ";
        }

        // order by
        $sql .= " ORDER BY tanggal asc ";

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

    public function get_uri()
    {
        $periode_bulan = $_GET['periode_bulan'];
        $periode_tahun = $_GET['periode_tahun'];

        $this->periodeBulan = $periode_bulan;
        $this->periodeTahun = $periode_tahun;
    }

    /*function __destruct() {
        $db = $this->mysqli->conn;
        $db->close();
    }*/
}
?>
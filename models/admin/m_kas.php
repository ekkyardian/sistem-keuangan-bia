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

    public function update_saldo($periode_bulan, $periode_tahun, $lokasi_dana) {
        $db = $this->mysqli->conn;

        $jumlah_saldo = $db->query("SELECT tanggal, sum(if(jenis='Debit', jumlah, -jumlah)) AS jumlah FROM `tb_transaksi` WHERE year(tanggal)='$periode_tahun' AND month(tanggal)='$periode_bulan'")->fetch_object()->jumlah;

        if($periode_bulan == 1) {
            $saldo_lalu_b = 12;
            $saldo_lalu_t = $periode_tahun - 1;
        } else {
            $saldo_lalu_b = $periode_bulan - 1;
            $saldo_lalu_t = $periode_tahun - 0;
        }
        $saldo_lalu = $db->query("SELECT jumlah_saldo FROM tb_saldo WHERE periode_bulan='$saldo_lalu_b' AND periode_tahun='$saldo_lalu_t'")->fetch_object()->jumlah_saldo;

        $x = $saldo_lalu + $jumlah_saldo;

        $query = $db->query("SELECT * FROM tb_saldo WHERE periode_bulan='$periode_bulan' AND periode_tahun='$periode_tahun'");

        $cek = $query->fetch_object();
        if(count($cek) > 0) {
            $db->query("UPDATE tb_saldo SET jumlah_saldo=$x WHERE periode_bulan='$periode_bulan' AND periode_tahun='$periode_tahun'");
        } else {
            $db->query("INSERT INTO tb_saldo VALUES ('','$periode_bulan','$periode_tahun','$lokasi_dana',$x)") or die ($db->error);
        }
        
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

        $data =  array('periode_bulan' => $periode_bulan, 'periode_tahun' => $periode_tahun);

        return $data;
    }

    /*function __destruct() {
        $db = $this->mysqli->conn;
        $db->close();
    }*/
}
?>
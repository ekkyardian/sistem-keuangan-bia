<?php
class BankMandiri {
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
            $sql .= " WHERE lokasi_dana = 'Bank Mandiri'";

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
            $sql .= " WHERE id_transaksi = '$id' ";
        }

        // order by
        $sql .= " ORDER BY tanggal asc ";

        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($no_voucher, $tanggal, $deskripsi, $jenis, $jumlah, $lokasi_dana, $kwitansi_pendukung) {
        // Ambil tahun aktif dari kalender PC
        $thn = date('Y');

        // Koneksi
        $db = $this->mysqli->conn;

        // Cek nilai tertinggi id_transaksi + ambil datanya
        $sql = "SELECT MAX(id_transaksi) AS maxID FROM tb_transaksi WHERE id_transaksi LIKE '%$thn'";
        $query = $db->query($sql);
        $data = mysqli_fetch_array($query);
        $id_transaksi = $data['maxID'];

        // uraikan nilai yang diambil dari id_transaksi + lakukan penjumlahan +1
        $no_urut = (int) substr($id_transaksi, 0, 4);
        $no_urut++;

        // Tampung kriteria nilai id_transaksi baru
        $char = "/TRS/".$thn;
        $new_id = sprintf("%04s", $no_urut) . $char;

        // Proses simpan data ke database
        $db->query("INSERT INTO tb_transaksi VALUES ('$new_id','$no_voucher','$tanggal','$deskripsi','$jenis','$jumlah','$lokasi_dana','$kwitansi_pendukung')") or die ($db->error);
    }

    public function update_saldo($periode_bulan, $periode_tahun, $lokasi_dana) {
        $thn = date('Y');
        $db = $this->mysqli->conn;

        // Cek nilai tertinggi id_transaksi + ambil datanya
        $sql = "SELECT MAX(id_saldo) AS maxID FROM tb_saldo WHERE id_saldo LIKE '%$thn'";
        $query = $db->query($sql);
        $data = mysqli_fetch_array($query);
        $id_saldo = $data['maxID'];

        // uraikan nilai yang diambil dari id_transaksi + lakukan penjumlahan +1
        $no_urut = (int) substr($id_saldo, 0, 2);
        $no_urut++;

        // Tampung kriteria nilai id_transaksi baru
        $char = "/SLD/".$thn;
        $new_id = sprintf("%02s", $no_urut) . $char;

        //Menhitung jumlah saldo pada periode terpilih
        $jumlah_saldo = $db->query("SELECT tanggal, sum(if(jenis='Debit', jumlah, -jumlah)) AS jumlah FROM `tb_transaksi` WHERE year(tanggal)='$periode_tahun' AND month(tanggal)='$periode_bulan' AND lokasi_dana='$lokasi_dana'")->fetch_object()->jumlah;

        //Menambahkan saldo pada periode sebelumnya ke periode terpilih
        if ($periode_bulan == '01') {
            $saldo_lalu_b = 12;
            $saldo_lalu_t = $periode_tahun - 1;
        } else if($periode_bulan == '02') {
            $saldo_lalu_b = '01';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '03') {
            $saldo_lalu_b = '02';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '04') {
            $saldo_lalu_b = '03';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '05') {
            $saldo_lalu_b = '04';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '06') {
            $saldo_lalu_b = '05';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '07') {
            $saldo_lalu_b = '06';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '08') {
            $saldo_lalu_b = '07';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '09') {
            $saldo_lalu_b = '08';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '10') {
            $saldo_lalu_b = '09';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '11') {
            $saldo_lalu_b = '10';
            $saldo_lalu_t = $periode_tahun - 0;
        } else if($periode_bulan == '12') {
            $saldo_lalu_b = '11';
            $saldo_lalu_t = $periode_tahun - 0;
        }

        $saldo_lalu = $db->query("SELECT jumlah_saldo FROM tb_saldo WHERE periode_bulan='$saldo_lalu_b' AND periode_tahun='$saldo_lalu_t' AND lokasi_dana='$lokasi_dana'")->fetch_object()->jumlah_saldo;

        $x = $saldo_lalu + $jumlah_saldo;

        //Mengecek apakah saldo periode terpilih sudah ada atau belum
        $query = $db->query("SELECT * FROM tb_saldo WHERE periode_bulan='$periode_bulan' AND periode_tahun='$periode_tahun' AND lokasi_dana='$lokasi_dana'");

        $cek = $query->fetch_object();
        if(count($cek) > 0) {
            $db->query("UPDATE tb_saldo SET jumlah_saldo=$x WHERE periode_bulan='$periode_bulan' AND periode_tahun='$periode_tahun' AND lokasi_dana='$lokasi_dana'");
        } else {
            $db->query("INSERT INTO tb_saldo VALUES ('$new_id','$periode_bulan','$periode_tahun','$lokasi_dana',$x)") or die ($db->error);
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
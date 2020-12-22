<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 22/11/2019
 * Time: 14:23
 */

class Beranda {
    private  $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function ambil_saldo($bulan, $tahun, $sumber) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_saldo WHERE periode_bulan='$bulan' AND periode_tahun='$tahun' AND lokasi_dana='$sumber'";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }
}
?>
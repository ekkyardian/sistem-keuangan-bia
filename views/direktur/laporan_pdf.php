<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../assets/mpdf/mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>

<?php
include "laporan_cetak.php";
?>

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
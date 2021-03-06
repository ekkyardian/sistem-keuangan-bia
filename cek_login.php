<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/11/2019
 * Time: 20:39
 */

session_start();
require_once("config/+koneksi.php");
require_once("models/database.php");
include "models/m_login.php";

$connection = new Database($host, $user, $pass, $database);
$login = new Login($connection);

$username = $_POST['username'];
$password = $_POST['password'];

$ambil_data = $login->ambil_data($username, $password);
$cek = mysqli_num_rows($ambil_data);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($ambil_data);

    if ($data['hak_akses']=='admin') {
        $_SESSION['username']=$username;
        $_SESSION['hak_akses']='admin';
        header("location:views/admin/index.php");
    } else if ($data['hak_akses']=='direktur') {
        $_SESSION['username']=$username;
        $_SESSION['hak_akses']='direktur';
        header("location: views/direktur/index.php");
    } else {
        header("location: index.php?akses=gagal");
    }
} else {
    header("location: index.php?akses=gagal");
}
?>
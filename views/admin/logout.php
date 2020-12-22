<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 19/11/2019
 * Time: 14:10
 */

session_start();
session_destroy();
header("location: ../../index.php?akses=logout");

?>
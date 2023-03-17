<?php
$connect = new MySQLi('localhost', 'root', '', 'quanlyquanao');
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
mysqli_set_charset($connect, 'UTF8');
ob_start();
?>
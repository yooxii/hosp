<?php
$servername = "localhost";
$sqlname = "root";
$sqlpwd = "mysql0708";
$dbname = "hospital";
error_reporting(0);
$conn = new mysqli($servername, $sqlname, $sqlpwd, $dbname, 3306);
if ($conn->connect_error) {
	echo "alert('链接失败:" . $conn->connect_error . "')";
	exit;
}
// 设置编码，防止中文乱码
mysqli_set_charset($conn, "utf8");

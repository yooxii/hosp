<?php
include('mysqlserver.php'); //链接数据库

// 设置编码，防止中文乱码
mysqli_set_charset($conn, "utf8");

$t = rand(25, 30);
$h = rand(30, 40);

$sql = "UPDATE `ward_monitoring` SET `温度`='" . $t . "',`湿度`='" . $h . "' WHERE 1";

mysqli_query($conn, $sql);

$conn->close();

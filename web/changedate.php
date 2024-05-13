<?php
include('mysqlserver.php'); //链接数据库

// 设置编码，防止中文乱码
mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM `ward_monitoring` WHERE 1";

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
error_log("row:" . $row . "\n", 3, "../error.log");
while ($row--) {
    $t = rand(25, 30);
    $h = rand(30, 40);
    $sql = "UPDATE `ward_monitoring` SET `温度`='" . $t . "',`湿度`='" . $h . "' WHERE `No` = " . $row + 1;
    error_log($sql . "\n", 3, "../error.log");
    mysqli_query($conn, $sql);
}


$conn->close();

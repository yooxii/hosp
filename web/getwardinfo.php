<?php

header("Content-type:text/html;charset=utf-8");
include('mysqlserver.php'); //链接数据库

$sql = "SELECT * FROM `ward_monitoring` WHERE 1";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

echo "<div>温湿度检测</div>
    <div>病房 | 001</div>
    <div class='info-box'>
        <div>温度检测: <strong>" . $row[0] . "°C</strong></div>
        <div>湿度检测: <strong>" . $row[1] . "%RH</strong></div>
    </div>";

$conn->close();

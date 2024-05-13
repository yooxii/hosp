<?php

header("Content-type:text/html;charset=utf-8");
include('mysqlserver.php'); //链接数据库

$sql = "SELECT * FROM `ward_monitoring` WHERE 1";
$result = mysqli_query($conn, $sql);

echo "<div>温湿度检测</div>";

while ($row = mysqli_fetch_array($result)) {
    echo "
    <div class='info-box'>
    <div>" . $row['病房房号'] . "号病房</div>
        <div>温度检测: <strong>" . $row['温度'] . "°C</strong></div>
        <div>湿度检测: <strong>" . $row['湿度'] . "%RH</strong></div>
    </div>";
};
$conn->close();

<?php

include('mysqlserver.php');

//处理POST数据
$data = $_POST['q'];

error_log($data . "\n", 3, "log.txt");

// 按逗号分割字符串
$pieces = explode(",", $data);

//判断$pices有多少个元素
$len = count($pieces);
if ($len <= 16) {
    exit;
}

if ($pieces[16] == 1) {
    error_log("1\n", 3, "log.txt");
    if ($pieces[17] == 5 && $pieces[18] == 0 && $pieces[19] == 1 && $pieces[20] == 5) {
        $sql = "INSERT INTO `alarm_information` (`报警信息编号`, `病房号`, `报警类型`, `警报时间`, `警报等级`) VALUES (NULL, '1', '4', CURRENT_TIMESTAMP, '1');";

        $result = mysqli_query($conn, $sql);

        echo "<script>alert('有人呼叫');</script>";
        error_log("有人呼叫\n", 3, "log.txt");
    }
}
if ($pieces[16] == 2) {
    $humi = $pieces[18];
    $temp = $pieces[19];
    $anl = $pieces[20] << 8 | $pieces[21];
}

$conn->close();

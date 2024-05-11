<?php
header("Content-type:text/html;charset=utf-8");
include('mysqlserver.php'); //链接数据库

echo "<div style='width: fit-content;'>报警信息列表</div>
    <form action=''>
        <input type='text' placeholder='请输入报警信息编号' style='width: fit-content;padding: 5px;'>
        <input type='submit' value='查询' style='width: fit-content; padding: 5px;'>
    </form>

    <table border='1px'>";

$sql = "SELECT * FROM `alarm_information` ORDER BY `alarm_information`.`报警信息编号` DESC";

$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr>
    <th>报警信息编号</th>
    <th>病房号</th>
    <th>报警类型</th>
    <th>报警时间</th>
    <th>警报等级</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['报警信息编号'] . "</td>";
    echo "<td>" . $row['病房号'] . "</td>";
    if ($row['报警类型'] == 1) {
        echo "<td>烟雾报警</td>";
    } else if ($row['报警类型'] == 2) {
        echo "<td>火光报警</td>";
    } else if ($row['报警类型'] == 3) {
        echo "<td>离开报警</td>";
    } else if ($row['报警类型'] == 4) {
        echo "<td>呼叫报警</td>";
    }
    echo "<td>" . $row['警报时间'] . "</td>";
    echo "<td>" . $row['警报等级'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();

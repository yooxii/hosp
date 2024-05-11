<?php

echo "<div style='width: fit-content;'>用户信息列表</div>
    <form action=''>
        <input type='text' placeholder='请输入用户名' style='width: fit-content;padding: 5px;'>
        <input type='submit' value='查询' style='width: fit-content; padding: 5px;'>
    </form>

    <table border='1px'>";

include('mysqlserver.php'); //链接数据库

$sql = "SELECT * FROM `users` ORDER BY `users`.`No` ASC";

$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr>
    <th>No.</th>
    <th>用户名</th>
    <th>性别</th>
    <th>联系电话</th>
    <th>权限等级</th>
    <th>创建时间</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['No'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['tel'] . "</td>";
    echo "<td>" . $row['level'] . "</td>";
    echo "<td>" . $row['created_time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();

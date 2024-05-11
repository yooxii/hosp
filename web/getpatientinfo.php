<?php

echo "<div style='width: fit-content;'>病人信息列表</div>
    <form action=''>
        <input type='text' placeholder='请输入病人姓名' style='width: fit-content;padding: 5px;'>
        <input type='submit' value='查询' style='width: fit-content; padding: 5px;'>
    </form>

    <table border='1px'>";

include('mysqlserver.php'); //链接数据库

$sql = "SELECT * FROM `patient` ORDER BY `patient`.`id` ASC";

$result = mysqli_query($conn, $sql);

echo "<style>
    td {
        max-width: 150px;
        padding: 1px 5px 1px 5px;
        text-align: left;
    }
    .ctrl {
        text-decoration: none;
        color: white;
        border: 1px solid black;
        background-color: darkslategray;
    }
</style>
<table border='1'>
<tr>
    <th>id</th>
    <th>姓名</th>
    <th>性别</th>
    <th>年龄</th>
    <th>住址</th>
    <th>电话</th>
    <th>病床</th>
    <th>病因</th>
    <th>用药信息</th>
    <th>录入时间</th>
    <th>操作</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['姓名'] . "</td>";
    echo "<td>" . $row['性别'] . "</td>";
    echo "<td>" . $row['年龄'] . "</td>";
    echo "<td>" . $row['住址'] . "</td>";
    echo "<td>" . $row['电话'] . "</td>";
    echo "<td>" . $row['病床'] . "</td>";
    echo "<td>" . $row['病因'] . "</td>";
    echo "<td>" . $row['用药信息'] . "</td>";
    echo "<td>" . $row['录入时间'] . "</td>";
    echo "<td><a class='ctrl' href='editpatientinfo.php?id=" . $row['id'] . "'>编辑</a> <a class='ctrl' href='deletepatientinfo.php?id=" . $row['id'] . "'>删除</a></td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();

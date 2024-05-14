<style>
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: #f8f8f8;
        font-family: Arial, sans-serif;
    }

    th {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        text-align: left;
    }

    td {
        padding: 10px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .ctrl {
        padding: 5px;
        margin: 5px;
        text-decoration: none;
        color: black;
        background-color: #4CAF50;
        color: white;
    }

    .ctrl:hover {
        background-color: #45a049;
    }
</style>
<div style='width: fit-content;'>用户信息列表</div>
<form action=''>
    <input type='text' placeholder='请输入用户名' style='width: fit-content;padding: 5px;'>
    <input type='submit' value='查询' style='width: fit-content; padding: 5px;'>
</form>

<table border='1px'>
    <tr>
        <th>No.</th>
        <th>用户名</th>
        <th>性别</th>
        <th>联系电话</th>
        <th>权限等级</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php
    include('mysqlserver.php'); //链接数据库

    $sql = "SELECT * FROM `users` ORDER BY `users`.`No` ASC";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['No'] . "</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['tel'] . "</td>";
        echo "<td>" . $row['level'] . "</td>";
        echo "<td>" . $row['created_time'] . "</td>";
        echo "<td><a class='ctrl' href='edituserinfo.php?id=" . $row['No'] . "'>编辑</a> <a class='ctrl' href='deleteuserinfo.php?id=" . $row['No'] . "'>删除</a></td>";
        echo "</tr>";
    }

    $conn->close();
    ?>
</table>
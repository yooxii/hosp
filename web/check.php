<?php

header("Content-type:text/html;charset=utf-8");
include('mysqlserver.php'); //链接数据库
$name1 = $_POST["username"];
$pwd1 = $_POST["password"];
if ($name1 == "" || $pwd1 == "") {
	echo "<script>alert('请输入用户名或密码');history.back()</script>";
	exit;
}
$sql = "select * from administrator where id='$name1' and password='$pwd1'";
$result = $conn->query($sql);
$row = mysqli_num_rows($result);
if ($row == 1) {
	echo "<script>alert('欢迎登陆," . $name1 . "');</script>";
	echo "<script>location.href='../index.php'</script>";
} else {


	echo "<script language=javascript>alert('登录失败');history.back()</script>";
}

?>
<html>

<head>
	<meta charset="utf-8" />
	<title>login</title>
</head>

</html>
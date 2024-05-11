<?php

header("Content-type:text/html;charset=utf-8");
include('mysqlserver.php'); //链接数据库
$name1 = $_POST["username"];
$pwd1 = $_POST["password"];
if ($name1 == "" || $pwd1 == "") {
	echo "<script>alert('请输入用户名或密码');history.back()</script>";
	exit;
}
// 获取由用户名和密码共同组成的密文
$result = $conn->query("select AES_ENCRYPT('" . $pwd1 . "','" . $name1 . "');");
$pwd2 = mysqli_fetch_array($result);

// 查询数据库中是否存在该用户，如果存在且密文正确，通过验证
$sql = "select * from users where id='$name1' and pwd='$pwd2[0]'";
$result = $conn->query($sql);
$row = mysqli_num_rows($result);
if ($row == 1) {
	echo "<script>alert('欢迎登陆," . $name1 . "');</script>";
	echo "<script>location.href='main.html'</script>";
} else {
	echo "<script language=javascript>alert('登录失败');history.back()</script>";
}
$conn->close();

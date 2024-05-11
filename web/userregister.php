<body>
    <?php
    include('mysqlserver.php'); //链接数据库

    // 定义变量并默认设置为空值
    $username = $password = $password2 = $gender = $tel = $usertype = "";
    $usernameErr = $passwordErr = $password2Err = $genderErr = $telErr = $usertypeErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "用户名 ";
        } else {
            $username = test_input($_POST["username"]);
            // 检查用户名是否包含字母和空格
            if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                $usernameErr = "只允许字母和空格 ";
            }
        }
        if (empty($_POST["password"])) {
            $passwordErr = "密码 ";
        } else {
            $password = test_input($_POST["password"]);
        }
        if (empty($_POST["password2"])) {
            $password2Err = "确认密码 ";
        } else {
            $password2 = test_input($_POST["password2"]);
        }
        if (empty($_POST["usertype"]) || $_POST["usertype"] == 0) {
            $usertypeErr = "用户权限类型 ";
        } else {
            $usertype = test_input($_POST["usertype"]);
        }
        if (empty($_POST["gender"])) {
            $genderErr = "性别 ";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        $tel = test_input($_POST["tel"]);
    }
    function test_input($data)
    {
        $data = trim($data); //去除用户输入数据中不必要的字符 (多余的空格、制表符、换行)
        $data = stripslashes($data); //删除用户输入数据中的反斜杠 (\)
        $data = htmlspecialchars($data); //特殊字符转义
        return $data;
    }
    ?>

    <div style='width: fit-content; margin: auto;'>
        <div style='width: 100%; margin: auto;text-align: center; border: 1px solid #000;background-color: rgb(122, 228, 228);font-size:large;'>用户注册</div>
        <form id='regform' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' target="reg_iframe" method='post'>
            <table border='1px'>
                <tr>
                    <td>*用户名</td>
                    <td><input type='text' name='username' placeholder='请输入用户名' style='width: fit-content;padding: 5px;'></td>
                </tr>
                <tr>
                    <td>*密码</td>
                    <td><input type='password' name='password' placeholder='请输入密码' style='width: fit-content;padding: 5px;'></td>
                </tr>
                <tr>
                    <td>*确认密码</td>
                    <td><input type='password' name='password2' placeholder='请再次输入密码' style='width: fit-content;padding: 5px;'></td>
                </tr>
                <tr>
                    <td>*性别</td>
                    <td>
                        <select name='gender' style='width: 100%; padding: 5px;'>
                            <option value='0'>请选择性别</option>
                            <option value='男'>男</option>
                            <option value='女'>女</option>
                        </select>
                    </td>
                </tr>
                <td>联系电话</td>
                <td><input type='text' name='tel' placeholder='请输入联系电话' style='width: fit-content;padding: 5px;'></td>
                <tr>
                    <td>*用户权限</td>
                    <td>
                        <select name='usertype' style='width: 100%; padding: 5px;'>
                            <option value='0'>请选择用户权限</option>
                            <option value='common'>普通用户</option>
                            <option value='admin'>管理员</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align: center;'>
                        <input type='submit' onclick=" regtest()" value='注册' style='width: fit-content; padding: 5px;'>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if ($username && $password && $password2 && $gender && $usertype && !$usernameErr && !$passwordErr && !$password2Err && !$genderErr && !$usertypeErr) {
        $sql = "INSERT INTO `users` (`No`, `id`, `pwd`, `gender`, `tel`, `level`, `created_time`) VALUES (NULL, '$username', AES_ENCRYPT('$password','$username'), '$gender', '$tel', '$usertype', CURRENT_TIMESTAMP)";
        $result = $conn->query($sql);
        if ($result) {
            echo "<div style='color:green;'>注册成功</div>";
        } else {
            echo "<div style='color:red;'>注册失败</div>";
        }
    }
    if ($usernameErr || $passwordErr || $password2Err || $genderErr || $telErr || $usertypeErr) {
        echo "<div style='color:red;'>请填写" . $usernameErr . $passwordErr . $password2Err . $genderErr . $telErr . $usertypeErr . "</div>";
    }
    ?>

</body>
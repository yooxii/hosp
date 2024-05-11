<?php

include('mysqlserver.php'); //链接数据库

// 定义变量并设置为空值
$name = $gender = $age = $address = $tel = $sickbed = $pathogenesis = $medicationinfo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $sickbed = $_POST['sickbed'];
    $pathogenesis = $_POST['pathogenesis'];
    $medicationinfo = $_POST['medicationinfo'];

    if ($name && $gender && $age && $address && $tel && $sickbed && $pathogenesis && $medicationinfo && $flag == 1) {
        echo $name . $gender . $age . $address . $tel . $sickbed . $pathogenesis . $medicationinfo;
        $sql = "INSERT INTO `patient` (`姓名`, `性别`, `年龄`, `住址`, `电话`, `病床`, `病因`, `用药信息`) VALUES ('$name', '$gender', '$age', '$address', '$tel', '$sickbed', '$pathogenesis', '$medicationinfo')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('病人信息录入成功');</script>";
        } else {
            echo "<script>alert('病人信息录入失败');</script>";
        }
    } else {
    }
    echo "<script>alert('请填写完整信息');</script>";
}
?>

<style>
    form {
        width: fit-content;
        margin: auto;
    }

    table {
        width: fit-content;
        margin: auto;
    }

    td {
        width: fit-content;
        padding: 1px;
        text-align: left;
    }

    .bigtext {
        width: 100%;
        height: 50px;
        padding: 5px 5px 5px 5px;
    }

    .smalltext {
        width: 100%;
        padding: 5px 5px 5px 5px;
    }

    textarea {
        width: 100%;
        height: 50px;
        padding: 5px 5px 5px 5px;
    }
</style>
<div style='width: fit-content; margin: auto;'>
    <div style='width: 100%; margin: auto;text-align: center; border: 1px solid #000;background-color: rgb(122, 228, 228);font-size:large;'>病人信息录入</div>
    <form id='regform' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' target="reg_iframe" method='post'>
        <table border='1px'>
            <tr>
                <td>姓名</td>
                <td><input type='text' name='name' placeholder='请输入用户名' class="smalltext"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <select name='gender' style='width: 100%; padding: 5px;'>
                        <option value='0'>请选择性别</option>
                        <option value='男'>男</option>
                        <option value='女'>女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type='text' name='age' placeholder='请输入年龄' class="smalltext"></td>
            </tr>
            <tr>
                <td>住址</td>
                <td><textarea class="bigtext" name='address' placeholder='请输入住址'></textarea>
                </td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type='text' name='tel' placeholder='请输入联系电话' class="smalltext"></td>
            </tr>
            <tr>
                <td>病床</td>
                <td><textarea name='sickbed' placeholder='请输入病床' class="bigtext"></textarea>
                </td>
            </tr>
            <tr>
                <td>病因</td>
                <td><textarea name='pathogenesis' placeholder='请输入病因'></textarea>
                </td>
            </tr>
            <tr>
                <td>用药信息</td>
                <td><textarea name='medicationinfo' placeholder='请输入用药信息'></textarea>
                </td>
            </tr>
            <tr>
                <td colspan='2' style='text-align: center;'>
                    <input type='submit' value='登记' style='width: fit-content; padding: 5px;'>
                </td>
            </tr>
        </table>
    </form>
</div>
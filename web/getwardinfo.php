<!-- 病房信息 -->

<!-- 横向排列 -->
<style>
    .outer-div {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
        background-color: #f8f9fa;
        /* 更淡的灰色 */
    }

    .outer-div {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
        background-color: #f8f9fa;
        /* 更淡的灰色 */
    }

    .info-box {
        border: 1px solid #ced4da;
        /* 更淡的灰色 */
        padding: 20px;
        margin: 10px;
        background-color: #ffffff;
        /* 白色 */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: calc(33% - 20px);
        box-sizing: border-box;
    }

    .info-box-small {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .bar {
        width: 100%;
        margin: 5px;
        text-align: center;
        border: 1px solid #ced4da;
        /* 更淡的灰色 */
        background-color: #e9ecef;
        /* 更淡的灰色 */
        font-size: large;
    }

    .index {
        display: flex;
        justify-content: space-around;
        padding: 2px;
        background-color: #f8f9fa;
        /* 更淡的灰色 */
    }

    .info-box-small {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .bar {
        width: 100%;
        margin: 5px;
        text-align: center;
        border: 1px solid #ced4da;
        /* 更淡的灰色 */
        background-color: #e9ecef;
        /* 更淡的灰色 */
        font-size: large;
    }

    .index {
        display: flex;
        justify-content: space-around;
        padding: 2px;
        background-color: #f8f9fa;
        /* 更淡的灰色 */
    }
</style>
<div class="outer-div">

    <div class="bar">病房信息</div>
    <?php

    header("Content-type:text/html;charset=utf-8");
    include('mysqlserver.php'); //链接数据库

    $sql = "SELECT * FROM `ward_monitoring` WHERE 1";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "
    <div class='info-box'>
        <div class='index'>" . $row['病房房号'] . "号病房</div>
        <div class='info-box-small'>
            <div>温度: <strong>" . $row['温度'] . "°C</strong></div>
            <div>湿度: <strong>" . $row['湿度'] . "%RH</strong></div>
            <div>火灾警报: " . $row['烟雾'] . "</div>
        </div>
        <hr style='border: none; border-top: 1px solid #ccc; margin: 20px 0;'>
        <div class='info-box-small'>
            <div>在床情况:</div>
            <div>" . onBed($row['在床情况']) . "</div>
        </div>
    </div>";
    };

    function onBed($tmp): string
    {
        $tmp = json_decode($tmp, true);
        $str = "";
        foreach ($tmp as $key => $value) {
            if ($value == 1)
                $str .= "<strong>" . $key . "</strong>" . "号床离开<br>";
        }
        return $str;
    }

    // 每5秒更新一次数据
    function reflush()
    {
        echo '<meta http-equiv="refresh" content="5">';
    }

    $conn->close();
    ?>
</div>
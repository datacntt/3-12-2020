<?php
session_start();
if ($_SESSION['username'] == "" || $_SESSION['role'] == 2) {
    header('Location: capnhattailieu.php ');
}

?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main">
        <div class="tieudetdm">Cập nhật tài liệu</div>
        <form id='formcn' method='post' name='formcapnhat' action=''>
            <table>
                <tr>
                    <td>Tên tài liệu</td>
                    <td><input type='text' name='tentl1' value='<?php echo $_GET['tentl']; ?>' style='    width: 269px; height: 30px; border-radius: 5px;background:white;'></td>
                </tr>
                <tr>
                    <td>Người đăng</td>
                    <td><select name='username1' style='width: 270px; height: 30px; border-radius: 5px;background:white;'>
                            <?php
                            selectusername1($_GET['username']);
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Danh mục</td>
                    <td><select name='dmtl1' style='width: 270px; height: 30px; border-radius: 5px;background:white;'>
                            <?php
                            selectdanhmuc1($_GET['iddm']);
                            ?>
                        </select></td>
                </tr>
            </table>
            <input type='submit' name='capnhat' value='Cập nhật' style='width:90px;height:30px;border-radius:5px;
		margin-left: 82px; background: #3889ec; border: 2px solid #8eb2de; margin-top: 20px; float: left; cursor: pointer;'>
            <input type='submit' name='huy' value='Huy' style='width:90px;height:30px;border-radius:5px;margin-left: 10px; 
		background: #3889ec;margin-top: 20px; border: 2px solid #8eb2de; float: left; cursor: pointer;'>
        </form>
    </div>
    <br>
    <?php
        if (isset($_POST['capnhat'])) {
            capnhattailieu($_GET['idtl'], $_POST['tentl1'], $_POST['dmtl1'], $_POST['username1']);
            header("Location: quantri.php");
        }
        if (isset($_POST['huy'])) {
            header("Location: index.php");
        }
    ?>
    <?php include "footer.php" ?>

    <style>
        .main {
            width: 100%;
            background-image: url('images/bgqt.jpg');
            background-size: cover;
        }
    </style>
</body>

</html>
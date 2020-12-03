<?php
session_start();
if ($_SESSION['username'] == "" || $_SESSION['role'] == 2) {
    header('Location:capnhattailieu.php ');
}
?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main" style="background: url('images/bgqt.jpg') no-repeat; background-size:1400px 900px;">
        <div class="tieudetdm">Cập nhật người dùng</div>
        <form id='formcn' method='post' name='formcapnhat' action=''>
            <table>
                <tr>
                    <td>Username</td>
                    <td><?php echo $_GET['username']; ?></td>
                </tr>
                <tr>
                    <td>Tên người dùng</td>
                    <td><input type='text' name='ten' value='<?php echo $_GET['ten']; ?>' style='width:190px;height:25px;border-radius:5px; background:white;'></td>
                </tr>
                <tr>
                    <td>Email người dùng</td>
                    <td><input type='text' name='email' value='<?php echo $_GET['email']; ?>' style='width:190px;height:23px;border-radius:5px;background:white;'></td>
                </tr>
                <tr>
                    <td>Phân quyền</td>
                    <td><select name='role' style='width:192px;height:26px;border-radius:5px;background:white;' <?php if ($_GET['role'] == 1) {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>>
                            <?php
                            selectquyen($_GET['role']);
                            ?>
                        </select></td>
                </tr>
            </table>
            <input type='submit' name='capnhat' value='Cập nhật' style='width:90px;height:30px;border-radius:5px;margin-left: 57px; background: #3889ec;margin-top: 20px; float: left; cursor: pointer;border: 2px solid #8eb2de;'>
            <input type='submit' name='huy' value='Hủy' style='width:90px;height:30px;border-radius:5px;margin-left: 10px; background: #3889ec; margin-top: 20px; cursor: pointer;border: 2px solid #8eb2de;'>
        </form>
    </div>
    <br>

    <?php
    if (isset($_POST['capnhat'])) {
        capnhatnguoidung($_GET['username'], $_POST['ten'], $_POST['email'], $_POST['role']);
        header("Location: quantriuser.php");
    }
    if (isset($_POST['huy'])) {
        header("Location: quantriuser.php");
    }
    ?>

    <?php include "footer.php" ?>

</body>

</html>
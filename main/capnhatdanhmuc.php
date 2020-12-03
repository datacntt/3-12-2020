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
        Cập nhật tài liệu
        <form method='post' name='formcapnhat' action=''>
            <table>
                <tr>
                    <td>Tên danh mục</td>
                    <td><input type='text' name='ten' value='<?php echo $_GET['tendm']; ?>' style='width:150px'></td>
                </tr>
                <tr>
                    <td>Đường dẫn hình</td>
                    <td><input type='text' name='email' value='<?php echo $_GET['email']; ?>' style='width:150px'></td>
                </tr>
            </table>
            <input type='submit' name='capnhat' value='Cập nhật'>
        </form>
    </div>
    <br>
    <?php
    if (isset($_POST['capnhat'])) {
        capnhatnguoidung($_GET['username'], $_POST['ten'], $_POST['email'], $_POST['role']);
        header("Location: quantridanhmuc.php");
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
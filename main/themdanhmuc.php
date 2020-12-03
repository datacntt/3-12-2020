<?php
session_start();
if ($_SESSION['username'] == "" || $_SESSION['role'] == 2) {
  header('Location: themdanhmuc.php ');
}
?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main">
        <div class="tieudetdm">Thêm danh mục</div>
        <form method='post' name='formcapnhat' enctype="multipart/form-data">
            <table id="themdm">
                <tr>
                    <td>Tên danh mục</td>
                    <td><input type='text' name='tendm' value='' style='width: 280px; height: 25px; border-radius: 5px; background-color:white;'></td>
                </tr>
                <tr>
                    <td>Đường dẫn hình</td>
                    <td><input type='file' name='path' style='width: 270px; height: 20px; border-radius: 5px; background-color:white;'></td>
                </tr>
            </table>
            <input id='nuttdm' type='submit' name='them' value='Thêm'>
        </form>
    </div>
    <br>

    <?php
    if (isset($_POST['them'])) {
        if ($_POST['tendm'] == "" || $_FILES['path']['name'] == "") {
            echo "<script>alert('Bạn chưa điền đầy đủ thông tin')</script>";
        } else {
            $tendm = $_POST['tendm'];
            $name1 = $_FILES['path']['tmp_name'];
            $name = $_FILES['path']['name'];
            $extension = substr($name, strpos($name, '.') + 1);
            // kiem tra xem co dung la file hinh anh hay khong
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG" || $extension == "JPEG" || $extension == "PNG") {
                $location = "images/";
                if (move_uploaded_file($name1, $location . $name)) {
                    $conn = ketnoi();
                    $sql = "insert into danhmuc(tendm,path) values('$tendm','$location$name')";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    echo "<script>alert('Thêm danh mục thành công')</script>";
                } else {
                    echo "<script>alert('Thêm danh mục thất bại')</script>";
                }
            } else {
                echo "<script>alert('Chỉ hỗ trợ file jpg hoặc jpeg hoặc png')</script>";
            }
        }
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
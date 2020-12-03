<?php
session_start();

if ($_SESSION['username'] == "") {
    header("Location: index.php");
}

?>


<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main">
        <form class="form-upload" method="POST" enctype="multipart/form-data" action="upload.php">
            <h2 class="form-signin-heading">Upload Tài Liệu</h2>
            <div class="formthongtin">
                <table>
                    <tr>
                        <th style='border:none;'>Tên tài liệu</th>
                        <td><input type='text' name='tentl' style='  width: 275px; height: 36px; border-radius: 5px; background: white;'></td>
                    </tr>
                    <tr>
                        <th style='border:none;'>Danh mục</th>
                        <td><select name='danhmuc' style='  width: 275px; height: 36px; border-radius: 5px; background: white;'><?php
                                                                                                                                selectdanhmuc();
                                                                                                                                ?></select></td>
                    </tr>
                    <tr>
                        <th style='border:none;'>InputFile</th>
                        <td><input type='file' name='path' style='  width: 275px; height: 36px; border-radius: 5px; background: white;'></td>
                    </tr>
                </table>
            </div>
            <input id="up" class="btn btn-lg btn-primary btn-block" type="submit" name="upload" value='Upload' style='background-color:#3889ec; margin-left: 206px; margin-top: 20px;height: 27px;width: 74px;    border: 2px solid #8eb2de;'>
            <input id="huy" type="submit" name="back" value='Back' style='background-color:#3889ec; margin-left: 10px; margin-top: 20px;height: 27px;width: 74px;    border: 2px solid #8eb2de;'>
        </form>
    </div>
    <style>
        .main {
            width: 100%;
            background-image: url('images/cc.jpg');
            background-size: cover;
        }
    </style>
    <br>

    <?php
    if (isset($_POST['upload'])) {
        if ($_POST['tentl'] == "") {
            echo "<script>alert('Bạn chưa điền tên tài liệu')</script>";
        } else if ($_FILES['path']['name']    == "") {
            echo "<script>alert('Bạn chưa chọn đường dẫn tài liệu')</script>";
        } else {

            // gioi han file upload khong qua 10MB
            $max_size = 80000000;
            //include 'csdl.php';

            // lay thong tin file upload
            $username = $_SESSION['username'];
            $tentl = $_POST['tentl'];
            $iddm = $_POST['danhmuc'];
            $name1 = $_FILES['path']['tmp_name'];
            $name = $_FILES['path']['name'];
            $size = $_FILES['path']['size'];
            $type = $_FILES['path']['type'];

            // lay duoi file
            $extension = substr($name, strpos($name, '.') + 1);
            // kiem tra xem co dung la file hinh anh hay khong
            if (($extension == "doc" || $extension == "docx" || $extension == "pptx" || $extension == "ppt" || $extension == "pdf") && $size <= $max_size) {
                // if(($extension == "doc" || $extension == "pdf") && $extension == $size<=$max_size){
                $location = "uploads/";

                if (move_uploaded_file($name1, $location . $name)) {

                    // dua thong tin file vao csdl
                    $conn = ketnoi();
                    $query = "INSERT INTO tailieu (username, iddm, tentl, path) VALUES ('$username', '$iddm', '$tentl', '$location$name')";
                    $result = mysqli_query($conn, $query);
                    echo "<script>alert('Upload Thành công')</script>";
                    //header("Location: index.php");

                } else {
                    echo "<script>alert('Upload Thất bại')</script>";
                }
            } else {
                echo "<script>alert('Chỉ hỗ trợ dung lượng không quá 10MB')</script>";
            }
        }
    }
    if (isset($_POST['back']))
        header("Location: index.php");
    ?>
    <?php include "footer.php" ?>

</body>

</html>
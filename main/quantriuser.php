<?php
session_start();
if ($_SESSION['username']=="" || $_SESSION['role']==2){
    header('Location: ..\logout\logout.php ');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <title>Kho tài liệu trực tuyến - Quản trị người dùng</title>
    <link href="images/icon.png" rel="shortcut icon">
    <link type="text/css" href="style.css" rel="stylesheet">
    <link type="text/css" href="demo.css" rel="stylesheet">
    <style>
        #menu ul.aaa li {
            line-height: 41px;
        }
        .main{
            width: 100%;
            background-image: url('images/bgqt.jpg');
            background-size: cover;
        }
        h4{
            color: red;
            font-size: 25px;
            margin-top: 30px;
        }
    </style>
    <script src="js\jssor.slider.min.js" type="text/javascript"></script>
</head>

<body style="background-color:white; margin-top:10px;">

    <?php include 'header.php' ?>

    <div class="main">
        <!--<ẩn hiện menu>-->


        <h4>Quản trị người dùng</h4>

        <a title='Click để hiện menu!' href="#menu2" id="toggle"><span></span></a>

        <div id="menu2">
            <ul>
                <li><a style="font-size:16px;" href="quantri.php">Quản trị tài liệu</a></li>
                <li><a style="font-size:16px;" href="quantriuser.php">Quản trị người dùng</a></li>
                <li><a style="font-size:16px;" href="quantridanhmuc.php">Quản trị danh mục</a></li>
            </ul>
        </div>

        <script type="text/javascript">
            var theToggle = document.getElementById('toggle');

            // hasClass
            function hasClass(elem, className) {
                return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
            }
            // addClass
            function addClass(elem, className) {
                if (!hasClass(elem, className)) {
                    elem.className += ' ' + className;
                }
            }
            // removeClass
            function removeClass(elem, className) {
                var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
                if (hasClass(elem, className)) {
                    while (newClass.indexOf(' ' + className + ' ') >= 0) {
                        newClass = newClass.replace(' ' + className + ' ', ' ');
                    }
                    elem.className = newClass.replace(/^\s+|\s+$/g, '');
                }
            }
            // toggleClass
            function toggleClass(elem, className) {
                var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, " ") + ' ';
                if (hasClass(elem, className)) {
                    while (newClass.indexOf(" " + className + " ") >= 0) {
                        newClass = newClass.replace(" " + className + " ", " ");
                    }
                    elem.className = newClass.replace(/^\s+|\s+$/g, '');
                } else {
                    elem.className += ' ' + className;
                }
            }

            theToggle.onclick = function() {
                toggleClass(this, 'on');
                return false;
            }
        </script>


        <div class='data'>
            <table id="gtquantri">
                <tr>
                    <th>Username</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Phân quyền</th>
                    <th></th>
                </tr>
                <?php
                quantriuser();
                ?>
            </table>
        </div>
    </div>
    <br>

    <?php include "footer.php" ?>

</body>
<script>
    function xoauser() {
        return confirm('Bạn sẽ xóa các thông tin liên quan đến người dùng này?');
    }
</script>

</html>
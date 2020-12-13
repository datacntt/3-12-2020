<?php
session_start();
if ($_SESSION['username'] == "" || $_SESSION['role'] == 2) {
    header('Location:../login/login.php ');
}
?>
<?php
if (isset($_POST['themdm'])) {
    header('Location: themdanhmuc.php');
}
?>

<?php include "head.php" ?>

<body style="background-color:white; margin-top:10px;">

    <?php include 'header.php' ?>

    <div class="main">
        <!--<ẩn hiện menu>-->


        <h4>Quản trị danh mục</h4>

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
                    <th>Tên danh mục</th>
                    <th>Hình đại diện</th>
                    <th></th>
                </tr>
                <?php
                quantridanhmuc();
                ?>
            </table>
            <form method='post'><input id='themdm' type='submit' name='themdm' value='Thêm danh mục'></form>
        </div>
    </div>
    <br>

    <link type="text/css" href="demo.css" rel="stylesheet">
    <style>
        #menu ul.aaa li {
            line-height: 41px;
        }

        .main {
            width: 100%;
            background-image: url('images/bgqt.jpg');
            background-size: cover;
        }

        h4 {
            color: red;
            font-size: 25px;
            margin-top: 30px;
        }
    </style>

    <?php include "footer.php" ?>

    <script>
        function xoadanhmuc() {
            return confirm('Bạn sẽ xóa các thông tin liên quan đến danh mục này?');
        }
    </script>

</body>

</html>
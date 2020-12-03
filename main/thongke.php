<?php
session_start();
if ($_SESSION['username']=="" || $_SESSION['role']==2){
    header('Location: ..\logout\logout.php ');
}

?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main" style='background: url(anh/cc.png); background-size: cover;'>

        <table id='formthongke'>
            <form name="thongke" method="post">
                <tr>
                    <td>
                        Thống kê theo:
                    </td>
                    <td style="width:300px;">
                        <select name='mucthongke' class='select'>
                            <option value="1">Danh mục</option>
                            <option value="2">Số lượt download</option>
                            <option value="3">Số lượt xem</option>
                            <option value="4">Mức độ đánh giá</option>
                    </td>
                    </select>
                <tr>
                    <td>
                        Sắp xếp theo:
                    </td>
                    <td>
                        <select name='sapxep' class='select'>
                            <option value="asc">Tăng dần</option>
                            <option value="desc">Giảm dần</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type="submit" name='btnthongke' value='Thống kê' style='background-color:#3889ec; margin-left: 16px; 
		margin-top: 20px; height: 29px; width: 81px; cursor: pointer;  border: 2px solid #8eb2de;'>
                    </td>
                </tr>
            </form>
        </table>
        <?php
        if (isset($_POST['btnthongke'])) {
            $sx = $_POST['sapxep'];
            if ($_POST['mucthongke'] == '1') {
                thongkedanhmuc($sx);
            }
            if ($_POST['mucthongke'] == '2') {
                thongkesoluotdownload($sx);
            }
            if ($_POST['mucthongke'] == '3') {
                thongkesoluotxem($sx);
            }
            if ($_POST['mucthongke'] == '4') {
                thongkemucdodanhgia($sx);
            }
        }
        ?>
    </div>
    <br>

    <?php include "footer.php" ?>

</body>

</html>
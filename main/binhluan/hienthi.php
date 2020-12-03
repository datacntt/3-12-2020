<?php
session_start();
include "..\csdl.php";
$idtl = $_REQUEST['idtl'];
?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main">
        <div class='tailieu'>
            <?php
            selecttailieu($_REQUEST['idtl']);
            ?>
        </div>
        <div class='binhluan'>
            <?php
            include 'binhluan.php';
            ?>
        </div>
    </div>
    <br>

    <?php include "footer.php" ?>

</body>

</html>
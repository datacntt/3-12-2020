<?php
session_start();
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
            <div class="danhgia">
                <?php
                include "danhgia/danhgia.php";
                ?>
            </div>
        </div>
        <div class="tailieulienquan">
            <?php
            tailieulienquan();
            ?>
        </div>

        <?php
       include 'binhluan.php';
        ?>

    </div>
    <br>

    <?php include "footer.php" ?>

</body>

</html>
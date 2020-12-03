<?php
session_start();
?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="content1">
        <div class="main1">
            <?php
            danhmuc();
            ?>
        </div>
        <div class="danhmuckhac">
            <?php
            danhmuckhac($_GET['iddm']);
            ?>
        </div>
    </div>
    <br>
    
    <?php include "footer.php" ?>
    
</body>

</html>
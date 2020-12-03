<?php
session_start();
if (!isset($_SESSION['username'])){
    $_SESSION['username'] = "";
}
if (!isset($_SESSION['role'])){
    $_SESSION['role'] = "2";
}
?>

<?php include "head.php" ?>

<body>

    <?php include 'header.php' ?>

    <div class="main" style='overflow:hidden; background: url(images/slider3.jpg) ;'>
        <?php
        echo "<div class='tlm_tlnb' style='display:block;'>";
        tailieumoi();
        echo "</div>";
        tailieunoibat();
        ?>
    </div>
    </div>
    <br>

    <?php include "footer.php" ?>

</body>

</html>
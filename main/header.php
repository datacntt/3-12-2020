<!-- Header Area wrapper Starts -->
<header id="header-wrap">
    <?php include 'csdl.php' ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <img src="images/logo_share.png" with="150" height="50" alt="" class="navbar-brand">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="" class="navbar-brand"></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            TRANG CHỦ
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            DANH MỤC <i class="lni-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <?php
                            //include "csdl.php";
                            menudanhmuc();
                            ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="upload.php" onclick="<?php if ($_SESSION['username'] == "") {
                                                                            echo "alert('Bạn chưa đăng nhập hệ thống')";
                                                                        } ?>">
                            UPLOAD TÀI LIỆU</a>
                    </li>


                    <?php if ($_SESSION['role'] == "1") {
                        echo "<li class='nav-item'><a class='nav-link' href='thongke.php'>Thống kê</a></li>";
                    }
                    ?>
                    

                    <?php
                   
                        if ($_SESSION['role'] == "1") {
                            echo "<li class='nav-item' ><a class='nav-link' href='quantri.php'>Quản trị</a></li>";
                        } 
                    
                    ?>
                    <li class="nav-item">

                        <?php
                        if ($_SESSION['username'] == "") {
                            echo "<a href='./login_register/login.php' class='nav-link'>Đăng nhập</a>";
                        } else {
                            echo "<a href='logout.php' class='nav-link'>Đăng xuất</a>";
                        }
                        ?>

                    </li>
                    <li class="nav-item">
                        <?php
                        if ($_SESSION['username'] != "") {
                            echo "<span style='color: red;'> Xin chào," . $_SESSION['username'] . "!</span>";
                        } ?>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            <li>
                <a class="active" href="index.html">TRANG CHỦ</a>
            </li>
            <li>
                <a href="about.html">GIỚI THIỆU</a>
            </li>
            <li>
                <a href="#">DANH MỤC</a>
                <ul class="dropdown">
                    <?php
                    //include "csdl.php";
                    menudanhmuc();
                    ?>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="upload.php" onclick="<?php if ($_SESSION['username'] == "") {
                                                                    echo "alert('Bạn chưa đăng nhập hệ thống')";
                                                                } ?>">
                    UPLOAD TÀI LIỆU</a>
            </li>
            <li>
                <a href="portfolio.html">THỐNG KÊ</a>
            </li>

            <li>
                <a href="contact.html">QUẢN TRỊ</a>
            </li>

            <li>
                <a href="contact.html">ĐĂNG NHẬP</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

    </nav>
    <!-- Navbar End -->

    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="contents text-center">
                        <h2 class="head-title wow fadeInUp">KHO TÀI LIỆU TRỰC TUYẾN</h2>
                        <p class="fadeInUp  wow" data-wow-delay="0.2s">Chia sẻ kiếm thức đến với mọi người</p>
                        <form method="get" action="timkiem.php">
                            <div class="subscribe">
                                <input class="form-control" placeholder="Tài liệu bạn muốn....." required="" type="text" name="s" id="s">
                                <button class="btn btn-common" type="submit">TÌM KIẾM</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

</header>
<!-- Header Area wrapper End -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/main.js"></script>
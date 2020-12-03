<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['role'] = "";
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../images/icon.png" rel="shortcut icon">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>ĐĂNG NHẬP</title>
	<script>
		function Clear() {
			document.getElementById("loginemail").value = "";
			document.getElementById("loginPassword").value = "";
			document.getElementById("name").value = "";
			return false;
		}
	</script>
</head>
<?php

require_once("..\db.php");
// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["submit_dn"])) {
	// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = md5($_POST["loginPassword"]);
	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $_POST['loginPassword'] == "") {
		$chuoi = "<script>";
		$chuoi = $chuoi . "alert('email hoặc password bạn không được để trống!')" . "</script>";
		echo "$chuoi";
	} else {
		$sql = "select * from users where username = '$username' and password = '$password' ";
		$query = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows == 0) {
			$chuoi = "<script>";
			$chuoi = $chuoi . "alert('tên đăng nhập hoặc mật khẩu không đúng !')" . "</script>";
			echo "$chuoi";
		} else {
			//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
			$_SESSION['username'] = $username;
			while ($a = mysqli_fetch_array($query)) {
				$_SESSION['role'] = $a[4];
			}
			// Thực thi hành động sau khi lưu thông tin vào session
			// Ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			header('Location: ..\index.php ');
		}
	}
}

?>

<body onload="return Clear();">
	<div class="container">
		<section id="formHolder">
			<div class="row">
				<!-- Brand Box -->
				<div class="col-sm-6 brand">
					<img class="logo" src="..\images\logo_share.png">
					<div class="heading">
						<h2>KHO TÀI LIỆU</h2>
						<p>Cung cấp nhiều tài liệu hay</p>
					</div>
					<div class="success-msg">
						<p>Chúc mừng! Bạn đã có tài khoản</p>
						<a href="login.php" class="profile">ĐĂNG NHẬP NGAY</a>
					</div>
				</div>
				<!-- Form Box -->
				<div class="col-sm-6 form">

					<!-- Login Form -->
					<div class="login form-peice switched">
						<form class="login-form" action="#" method="post">
							<div class="form-group">
								<label for="name">Tài Khoản</label>
								<input type="text" name="username" id="name" class="name">
								<span class="error"></span>
							</div>

							<div class="form-group">
								<label for="loginPassword">Mật Khẩu</label>
								<input type="password" name="loginPassword" id="loginPassword" required>
							</div>

							<div class="CTA">
								<input type="submit" value="Đăng Nhập" name="submit_dn">
								<a href="#" class="switch">Nhấp để Đăng Kí</a>
							</div>
						</form>
					</div><!-- End Login Form -->
					<!-- Signup Form -->
					<div class="signup form-peice">
						<form class="signup-form" action="dangki.php" method="post">

							<div class="form-group">
								<label for="name">Tài Khoản</label>
								<input type="text" name="username" id="name" class="name">
								<span class="error"></span>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="emailAdress" id="email" class="email">
								<span class="error"></span>
							</div>

							<div class="form-group">
								<label for="phone">Số Điện Thoại</label>
								<input type="text" name="phone" id="phone">
							</div>

							<div class="form-group">
								<label for="password">Mật Khẩu</label>
								<input type="password" name="password" id="password" class="pass">
								<span class="error"></span>
							</div>

							<div class="form-group">
								<label for="passwordCon">Nhập lại Mật Khẩu</label>
								<input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
								<span class="error"></span>
							</div>

							<div class="CTA">
								<input type="submit" value="Đăng Kí" id="submit" name="submit_dk">
								<a href="#" class="switch">Bạn đã có Tài Khoản</a>
							</div>
						</form>
					</div><!-- End Signup Form -->
				</div>
			</div>

		</section>
		<script>
			/*global $, document, window, setTimeout, navigator, console, location*/
			$(document).ready(function() {

				'use strict';

				var usernameError = true,
					emailError = true,
					passwordError = true,
					passConfirm = true;

				// Detect browser for css purpose
				if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
					$('.form form label').addClass('fontSwitch');
				}

				// Label effect
				$('input').focus(function() {

					$(this).siblings('label').addClass('active');
				});

				// Form validation
				$('input').blur(function() {

					// User Name
					if ($(this).hasClass('name')) {
						if ($(this).val().length === 0) {
							$(this).siblings('span.error').text('Hãy nhập tên Tài Khoản!!!').fadeIn().parent('.form-group').addClass('hasError');
							usernameError = true;
						} else if ($(this).val().length > 1 && $(this).val().length <= 4) {
							$(this).siblings('span.error').text('Tài Khoản phải hơn 4 kí tự!!!').fadeIn().parent('.form-group').addClass('hasError');
							usernameError = true;
						} else {
							$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
							usernameError = false;
						}
					}
					// Email
					if ($(this).hasClass('email')) {
						if ($(this).val().length == '') {
							$(this).siblings('span.error').text('Hãy nhập Email!!!').fadeIn().parent('.form-group').addClass('hasError');
							emailError = true;
						} else {
							$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
							emailError = false;
						}
					}

					// PassWord
					if ($(this).hasClass('pass')) {
						if ($(this).val().length < 8) {
							$(this).siblings('span.error').text('Mật khẩu phải hơn 8 kí tự!!!').fadeIn().parent('.form-group').addClass('hasError');
							passwordError = true;
						} else {
							$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
							passwordError = false;
						}
					}
					// PassWord confirmation
					if ($('.pass').val() !== $('.passConfirm').val()) {
						$('.passConfirm').siblings('.error').text('Nhập lại mật khẩu không đúng!!!').fadeIn().parent('.form-group').addClass('hasError');
						passConfirm = false;
					} else {
						$('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
						passConfirm = false;
					}

					// label effect
					if ($(this).val().length > 0) {
						$(this).siblings('label').addClass('active');
					} else {
						$(this).siblings('label').removeClass('active');
					}
				});


				// form switch
				$('a.switch').click(function(e) {
					$(this).toggleClass('active');
					e.preventDefault();

					if ($('a.switch').hasClass('active')) {
						$(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
					} else {
						$(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
					}
				});


				// Form submit
				$('form.signup-form').submit(function(event) {
					event.preventDefault();

					if (usernameError == true || emailError == true || passwordError == true || passConfirm == true) {
						$('.name, .email, .pass, .passConfirm').blur();
					} else {
						$('.signup, .login').addClass('switched');

						setTimeout(function() {
							$('.signup, .login').hide();
						}, 700);
						setTimeout(function() {
							$('.brand').addClass('active');
						}, 300);
						setTimeout(function() {
							$('.heading').addClass('active');
						}, 600);
						setTimeout(function() {
							$('.success-msg p').addClass('active');
						}, 900);
						setTimeout(function() {
							$('.success-msg a').addClass('active');
						}, 1050);
						setTimeout(function() {
							$('.form').hide();
						}, 700);
					}
				});

				// Reload page
				$('a.profile').on('click', function() {
					location.reload(true);
				});


			});
		</script>



	</div>
</body>
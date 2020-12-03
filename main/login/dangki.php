<?php
session_start();
require_once("..\db.php");
if (isset($_POST["submit_dk"])) {
	//lấy thông tin từ các form bằng phương thức POST
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$passwordnl = md5($_POST["passwordCon"]);
	$sdt = $_POST["phone"];
	$email = $_POST["emailAdress"];
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	$passwordn1 = strip_tags($passwordnl);
	$passwordn1 = addslashes($passwordn1);
	$sdt = strip_tags($sdt);
	$sdt = addslashes($sdt);
	$email = strip_tags($email);
	$email = addslashes($email);
	//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
	if ($username == "" || $_POST["password"] == "" || $_POST["passwordCon"] == "" || $sdt == "" || $email == "") {
		$chuoi = "<script>";
		$chuoi = $chuoi . "alert('bạn vui lòng nhập đầy đủ thông tin')" . "</script>";
		echo "$chuoi";
	} else {
		// Kiểm tra tài khoản đã tồn tại chưa
		$sql = "select * from users where username='$username'";
		$kt = mysqli_query($conn, $sql);

		if (mysqli_num_rows($kt)  > 0) {

			$chuoi = "<script>";
			$chuoi = $chuoi . "alert('Tài khoản đã tồn tại')" . "</script>";
			echo "$chuoi";
		} else {
			//thực hiện việc lưu trữ dữ liệu vào db
			if ($password == $passwordnl) {
				$sql = "INSERT INTO users(
	    					username,
	    					password,
						    email,
							role,
							sdt
	    					) VALUES (
	    					'$username',
	    					'$password',
	    					'$email',
							2,
							'$sdt'
	    					)";
				// thực thi câu $sql với biến conn lấy từ file db.php
				mysqli_query($conn, $sql);
				$chuoi = "<script>";
				$chuoi = $chuoi . "alert('chúc mừng bạn đã đăng ký thành công')" . "</script>";
                echo "$chuoi";
                header('Location: login.php ');
			} else {
				$chuoi = "<script>";
				$chuoi = $chuoi . "alert('Mật khẩu không trùng nhau')" . "</script>";
				echo "$chuoi";
			}
		}
	}
}

?>
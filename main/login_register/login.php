<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['role'] = "";
?>

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
<?php
require_once("..\db.php");
if (isset($_POST["submit_dk"])) {
  //lấy thông tin từ các form bằng phương thức POST
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  //$passwordnl = md5($_POST["passnl"]);
  //$name = $_POST["name"];
  $email = $_POST["emailAdress"];
  $username = strip_tags($username);
  $username = addslashes($username);
  $password = strip_tags($password);
  $password = addslashes($password);
  //$passwordn1 = strip_tags($passwordnl);
  //$passwordn1 = addslashes($passwordn1);
  //$name = strip_tags($name);
  // $name = addslashes($name);
  $email = strip_tags($email);
  $email = addslashes($email);
  //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
  if ($username == "" || $_POST["password"] == "" || $email == "") {
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

      $sql = "INSERT INTO users(
	    					username,
	    					password,
						    email,
							  role
	    					) VALUES (
	    					'$username',
	    					'$password',
	    					'$email',
							  2
	    					)";
      // thực thi câu $sql với biến conn lấy từ file connection.php
      mysqli_query($conn, $sql);
      $chuoi = "<script>";
      $chuoi = $chuoi . "alert('chúc mừng bạn đã đăng ký thành công')" . "</script>";
      echo "$chuoi";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Đăng Nhập và Đăng Kí</title>
  <link href="../images/icon.png" rel="shortcut icon">
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
          <h2 class="title">ĐĂNG NHẬP</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="loginPassword" />
          </div>
          <input type="submit" value="ĐĂNG NHẬP" class="btn solid" name="submit_dn" />
          <p class="social-text">Hoặc Đăng Nhập</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="emailAdress" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" class="btn" value="Sign up" name="submit_dk" />
          <p class="social-text">Hoặc Đăng Nhập</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3> Đăng Ký </h3>
          <p>
            Bạn đã có tài khoảng chưa ? nếu chưa thì hãy đăng ký ngay bên dưới để trải nghiệm website thất tốt !
          </p>
          <button class="btn transparent" id="sign-up-btn">
            ĐĂNG KÝ
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Đăng Nhập</h3>
          <p>
            Bạn đã có tài khoảng rồi hãy đăng nhập ngay bên dưới !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            ĐĂNG NHẬP
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>
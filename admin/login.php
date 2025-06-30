<?php
  session_start();
if (isset($_SESSION["dn"])) {
    header("Location: dashboard.php");
    exit();
}

$email = "emc@gmail.com";
$pass  = "123456";

if (isset($_POST['btn_dn'])) {
  $user = $_POST["email"];
  $mk   = $_POST["pass"];
  if ($user == $email && $mk == $pass) {
    $_SESSION["dn"] = 1;
    $_SESSION["success"] = true; // Đánh dấu là đăng nhập thành công
    header("Location: login.php"); // Reload lại chính trang login để tránh echo script sớm
    exit();
  } else {
    echo '<script>alert("Đăng nhập thất bại. Sai tài khoản mật khẩu")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <link rel="stylesheet" href="../assets/css/login.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  
  <title>EMC - Sign up</title>

</head>
<body>
  <div class="container">
    <div class="left-panel">
  <div class="branding">
    <img src="../assets/images/logo.png" alt="EMC Group Logo" class="logo" />
    <h2>Chào mừng bạn!</h2>
    <p>Đăng ký để sử dụng đầy đủ tính năng của hệ thống EMC.<br>
      Kết nối – Quản lý – Phát triển.</p>
  </div>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-youtube"></i></a>
    <a href="#"><i class="fab fa-tiktok"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
  </div>
</div>

    <div class="right-panel">
      <h2>Sign in</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label>Email</label>
          <input name="email" type="email" placeholder="VD: email@domain.com" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input name="pass" type="password" placeholder="Enter password" required>
        </div>
        <div class="terms">
          <input type="checkbox" required>
          <label>Tôi đồng ý với <a href="#" style="color:#fff;text-decoration:underline;">Điều khoản dịch vụ</a></label>
        </div>
        <div class="btn">
          <button type="submit" name="btn_dn">Sign in</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


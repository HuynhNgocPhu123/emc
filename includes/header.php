<!-- Bootstrap CSS -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/header.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top py-3 custom-navbar">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="assets/images/logo.png" alt="Logo Công Ty" height="50">
    </a>

    <!-- Toggle (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu giữa -->
    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?about">Về chúng tôi</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?service">Lĩnh vực hoạt động</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?news">Tin tức & Sự kiện</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?contact">Liên hệ</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    const currentUrl = window.location.href;

    navLinks.forEach(link => {
      // So sánh toàn bộ URL (có cả query string)
      if (currentUrl === link.href) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  });
</script>

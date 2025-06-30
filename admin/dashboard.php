<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
// Nếu có thao tác cụ thể (news hoặc logout), redirect tới đó:
if (isset($_REQUEST["news"])) {
    header('Location:newsadmin.php');
} else if (isset($_REQUEST["logout"])) {
    header('Location:logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EMC Dashboard</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      color: #111827;
    }
    aside {
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      height: 100vh;
      background: linear-gradient(135deg, #0f172a, #1e3a8a);
      color: white;
      padding: 20px;
      box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
    }
    .profile {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }
    .profile img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 12px;
      border: 2px solid white;
    }
    .profile .name {
      font-weight: bold;
      font-size: 16px;
    }
    aside nav a {
      display: block;
      color: white;
      text-decoration: none;
      margin: 10px 0;
      font-weight: 500;
      transition: 0.3s;
    }
    aside nav a:hover, aside nav a.active {
      background: rgba(255,255,255,0.2);
      padding: 8px 12px;
      border-radius: 8px;
    }
    .main {
      margin-left: 260px;
      padding: 30px;
    }
    .topbar {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .cards {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }
    .card {
      flex: 1;
      min-width: 200px;
      background: white;
      border-radius: 10px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .card i {
      font-size: 28px;
      margin-bottom: 10px;
      color: #fff;
      padding: 12px;
      border-radius: 50%;
    }
    .card:nth-child(1) i { background: #3f51b5; }
    .card:nth-child(2) i { background: #00bcd4; }
    .card:nth-child(3) i { background: #4caf50; }
    .card:nth-child(4) i { background: #ff9800; }
    .card-title {
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
    }
    .card-value {
      font-size: 24px;
      font-weight: bold;
      color: #111827;
    }
    .charts {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 24px;
    }
    .chart-box {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.05);
    }
    .chart-box h3 {
      font-size: 16px;
      margin-bottom: 10px;
      color: #111827;
    }
    canvas {
      max-height: 240px;
    }
  </style>
</head>
<body>
  <aside>
    <div class="profile">
      <img src="../assets/images/logo.png" alt="User">
      <div class="name">Admin</div>
    </div>
    <nav>
      <a href="dashboard.php" class="active"><i class="fas fa-chart-line"></i> Dashboard</a>
      <a href="newsadmin.php" class="<?= basename($_SERVER['PHP_SELF']) === 'newsadmin.php' ? 'active' : '' ?>">
        <i class="fas fa-file-alt"></i> Tin tức</a>
      <a href="contactadmin.php"><i class="fas fa-eye"></i> Xem liên hệ</a>
      <a href="partneradmin.php"><i class="fas fa-handshake"></i> Đối tác</a>
      <a href="dashboard.php?logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </nav>
  </aside>

  <div class="main">
    <div class="topbar">Trang tổng quan</div>
    <div class="cards">
      <div class="card">
        <i class="fas fa-globe"></i>
        <div class="card-title">Tổng lượt xem trang</div>
        <div class="card-value">152,345</div>
      </div>
      <div class="card">
        <i class="fas fa-newspaper"></i>
        <div class="card-title">Tổng bài viết</div>
        <div class="card-value">268</div>
      </div>
      <div class="card">
        <i class="fas fa-eye"></i>
        <div class="card-title">Lượt xem bài viết</div>
        <div class="card-value">823,421</div>
      </div>
      <div class="card">
        <i class="fas fa-bolt"></i>
        <div class="card-title">Tổng lượt click</div>
        <div class="card-value">97,890</div>
      </div>
    </div>

    <div class="charts">
      <div class="chart-box">
        <h3>Lượt xem theo tháng</h3>
        <canvas id="viewChart"></canvas>
      </div>
      <div class="chart-box">
        <h3>Thống kê nội dung</h3>
        <canvas id="statChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    new Chart(document.getElementById('viewChart'), {
      type: 'line',
      data: {
        labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
        datasets: [{
          label: 'Lượt xem',
          data: [12000, 15000, 18000, 22000, 21000, 25000, 27000, 29000, 30000, 28000, 26000, 31000],
          borderColor: '#3b82f6',
          fill: true,
          backgroundColor: 'rgba(59,130,246,0.1)',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    new Chart(document.getElementById('statChart'), {
      type: 'bar',
      data: {
        labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
        datasets: [
          { label: 'Lượt xem', data: [12700, 14000, 13000, 17000], backgroundColor: '#3b82f6' },
          { label: 'Click', data: [3000, 3500, 4000, 3800], backgroundColor: '#10b981' },
          { label: 'Bài viết', data: [12, 16, 10, 18], backgroundColor: '#f59e0b' }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' }
        },
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>

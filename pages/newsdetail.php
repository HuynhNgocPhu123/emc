<?php
    include_once("controller/getnews.php");
    $p = new getnews();

    if (isset($_REQUEST["detailid"])) {
        $ma = $_REQUEST["detailid"];
        $con = $p->getnewsbyid($ma);
        $hotnews = $p->gethotnews();
        $topViews = $p->getviewnews();
        $data = $p->getallnews1();
        if ($con){
            $r = $con->fetch_assoc();
            $tieude = $r['tieude'];
            $noidung = $r['noidung'];
            $hinhanh = $r['hinhanh'];
            $ngaydang = $r['ngaydang'];
            $tacgia = $r['tacgia'];
            $luotxem = $r['luotxem'];
            $tendanhmuc = $r['ten_danhmuc'];
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo isset($tieude) ? $tieude : "Chi tiết tin tức"; ?></title>
  <style>
    :root {
  --main-color: #1a1a1a;
  --gray: #7d8a99;
  --bg: #f9f9fb;
  --white: #ffffff;
  --blue: #0056d2;
  --radius: 14px;
  --shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
  --transition: all 0.3s ease;
}

body {
  font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: var(--bg);
  color: var(--main-color);
  line-height: 1.6;
}

.layout {
  display: flex;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 40px auto;
  gap: 32px;
  padding: 0 20px;
}

.main {
  flex: 1 1 65%;
  background: var(--white);
  padding: 36px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  transition: var(--transition);
}

.news-title {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 24px;
  color: var(--main-color);
}

.news-meta span {
  font-size: 0.95rem;
  color: var(--gray);
  margin-right: 20px;
}

.news-image img {
  border-radius: var(--radius);
  margin-bottom: 24px;
  width: 100%;
  max-height: 420px;
  object-fit: cover;
}

.news-content {
  font-size: 1.1rem;
  color: #444;
  text-align: justify;
}

.back-link {
  display: inline-block;
  margin-top: 40px;
  color: var(--blue);
  font-weight: 500;
  text-decoration: none;
  transition: var(--transition);
}
.back-link:hover {
  text-decoration: underline;
}

.sidebar {
  flex: 1 1 30%;
  display: flex;
  flex-direction: column;
  gap: 32px;
}

.sidebar-section {
  background: var(--white);
  padding: 24px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}

.sidebar h3 {
  font-size: 1.2rem;
  margin-bottom: 20px;
  border-bottom: 2px solid #eee;
  padding-bottom: 8px;
}

.news-item {
  display: flex;
  gap: 16px;
  margin-bottom: 20px;
  padding-bottom: 12px;
  border-bottom: 1px dashed #ddd;
  transition: var(--transition);
}
.news-item:hover {
  transform: translateY(-2px);
}

.news-item img {
  width: 90px;
  height: 70px;
  object-fit: cover;
  border-radius: 8px;
}

.news-item-content a {
  color: var(--main-color);
  font-weight: 600;
  font-size: 0.95rem;
  text-decoration: none;
}
.news-item-content a:hover {
  color: var(--blue);
}

.news-item-content p {
  font-size: 0.85rem;
  color: var(--gray);
}

@media (max-width: 992px) {
  .layout {
    flex-direction: column;
    padding: 0 16px;
  }
}
.news-item {
  display: flex;
  gap: 16px;
  margin-bottom: 20px;
  padding-bottom: 12px;
  border-bottom: 1px dashed #ddd;
  border-radius: 8px;
  transition: all 0.3s ease;
  background-color: #fff;
}

.news-item:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
  border-color: var(--blue);
  background-color: #f9faff;
}
.related-post {
  width: 30%;
  background: #fff;
  padding: 16px;
  border-radius: 10px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.related-post:hover {
  transform: translateY(-5px) scale(1.015);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
  background-color: #f0f5ff;
}
.related-post a h4 {
  transition: color 0.3s ease, transform 0.3s ease;
  color: var(--main-color);
}

.related-post a:hover h4 {
  color: var(--blue);
  transform: translateX(4px);
}

  </style>
</head>
<body>
  <br>
<?php if (isset($tieude)) : ?>
  <div class="layout">
    <!-- CHI TIẾT BÀI VIẾT -->
    <div class="main">
      <h1 class="news-title"><?php echo $tieude; ?></h1>
      <div class="news-meta">
        <span>Tác giả: <?php echo $tacgia; ?></span>
        <span>Ngày đăng: <?php echo date("d/m/Y", strtotime($ngaydang)); ?></span>
        <span>Danh mục: <?php echo $tendanhmuc; ?></span>
        <span>Lượt xem: <?php echo $luotxem; ?></span>
      </div>
      <div class="news-image">
        <img src="assets/images/<?php echo $hinhanh; ?>" alt="Ảnh bài viết" />
      </div>
      <div class="news-content">
        <?php echo nl2br($noidung); ?>
      </div>
      <?php if ($data): ?>
  <div style="margin-top: 60px;">
    <h3 style="font-size: 1.4rem; margin-bottom: 20px;">📌 Bài viết liên quan</h3>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
      <?php 
        $count = 0;
        while ($rel = $data->fetch_assoc()) :
          if ($rel['id_tintuc'] == $ma) continue; // bỏ qua bài hiện tại
          if ($rel['ten_danhmuc'] != $tendanhmuc) continue; // chỉ chọn cùng danh mục
          if ($count >= 3) break; // chỉ hiển thị tối đa 3 bài
          $count++;
      ?>
      <div class="related-post" style="width: 30%; background: #fff; padding: 16px; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.05);">
        <a href="index.php?news&detailid=<?php echo $rel['id_tintuc']; ?>" style="text-decoration: none; color: #000;">
          <img src="assets/images/<?php echo $rel['hinhanh']; ?>" alt="" style="width:100%; height:160px; object-fit:cover; border-radius:8px; margin-bottom: 10px;">
          <h4 style="font-size: 1rem; margin-bottom: 8px;"><?php echo $rel['tieude']; ?></h4>
          <p style="font-size: 0.85rem; color: #666;">
            <?php 
                $mota = isset($rel['mota']) ? $rel['mota'] : $rel['noidung'];
                echo mb_substr(strip_tags($mota), 0, 80) . '...'; 
            ?>
          </p>
        </a>
      </div>
      <?php endwhile; ?>
      <?php if ($count == 0): ?>
        <p>Không có bài viết liên quan.</p>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>

      <a href="index.php?news=1" class="back-link">← Quay lại danh sách tin</a>
    </div>

    <!-- SIDEBAR: TIN NỔI BẬT + TIN XEM NHIỀU -->
    <div class="sidebar">
      <!-- TIN NỔI BẬT -->
      <div class="sidebar-section">
        <h3>Tin nổi bật</h3>
        <?php if ($hotnews): ?>
          <?php while ($hot = $hotnews->fetch_assoc()): ?>
            <div class="news-item">
              <img src="assets/images/<?php echo $hot['hinhanh']; ?>" alt="Hot News">
              <div class="news-item-content">
                <a href="index.php?news&detailid=<?php echo $hot['id_tintuc']; ?>">
                  <?php echo $hot['tieude']; ?>
                </a>
                <p><?php echo mb_substr(strip_tags($hot['tomtat']), 0, 70) . '...'; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>Không có tin nổi bật.</p>
        <?php endif; ?>
      </div>

      <!-- TIN XEM NHIỀU -->
      <div class="sidebar-section">
        <h3>Tin xem nhiều</h3>
        <?php if ($topViews): ?>
          <?php while ($view = $topViews->fetch_assoc()): ?>
            <div class="news-item">
              <img src="assets/images/<?php echo $view['hinhanh']; ?>" alt="Top View">
              <div class="news-item-content">
                <a href="index.php?news&detailid=<?php echo $view['id_tintuc']; ?>">
                  <?php echo $view['tieude']; ?>
                </a>
                <p><?php echo mb_substr(strip_tags($view['tomtat']), 0, 60) . '...'; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>Không có dữ liệu.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <p style="text-align:center; color:#999; margin-top:100px;">Không tìm thấy bài viết.</p>
<?php endif; ?>
</body>
</html>


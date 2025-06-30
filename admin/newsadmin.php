<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}

include_once(__DIR__ . '/../controller/getnews.php');
$p = new getnews();

$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$data = $p->getallnews($limit, $offset);
$total = $p->totalNews();
$totalPages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quản lý tin tức</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/css/newadmin.css">
  
</head>
<body>
 <div class="toolbar">
    
    
  </div>
  <h1>Quản lý bài viết</h1>

<div class="cards">
  <div class="card card1">
    <h3>Tổng bài viết</h3>
    <p><?= $total ?></p>
  </div>
  <div class="card card2">
    <h3>Tổng lượt xem</h3>
    <p>12,540</p>
  </div>
  <div class="card card3">
    <h3>Tổng tác giả</h3>
    <p>5</p>
  </div>
  <div class="card card4">
    <h3>Danh mục phổ biến</h3>
    <p>Thông tin công ty</p>
  </div>
</div>


<div class="toolbar">
    <a href="dashboard.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Quay lại</a>
    <a href="insertnews.php" class="btn btn-add"><i class="fas fa-plus"></i> Thêm bài viết</a>
  </div>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Tiêu đề</th>
      <th>Hình ảnh</th>
      <th>Ngày đăng</th>
      <th>Tác giả</th>
      <th>Lượt xem</th>
      <th>Danh mục</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($data && $data == true): ?>
      <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id_tintuc'] ?></td>
          <td><?= htmlspecialchars($row['tieude']) ?></td>
          <td><img src="../assets/images/<?= htmlspecialchars($row['hinhanh']) ?>"></td>
          <td><?= $row['ngaydang'] ?></td>
          <td><?= htmlspecialchars($row['tacgia']) ?></td>
          <td><?= $row['luotxem'] ?></td>
          <td><?= htmlspecialchars($row['ten_danhmuc']) ?></td>
          <td>
            <a href="updatenews.php?id=<?= $row['id_tintuc'] ?>" class="btn-edit"><i class="fas fa-edit"></i> Sửa</a>
            <a href="newsadmin.php?delete&id=<?= $row['id_tintuc'] ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xoá bài viết này?');"><i class="fas fa-trash"></i> Xoá</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="8" style="text-align:center; color: gray;">Không có dữ liệu</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<div class="pagination">
  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
  <?php endfor; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
<?php
  if(isset($_REQUEST["delete"])){
    $ma = $_REQUEST["id"];
    $con = $p-> deletenewsform($ma);
    if($con){
      echo " <script> alert('Xóa thành công') </script>";
      echo " <script> window.location.href='newsadmin.php' </script> ";
    }else{
      echo " <script> alert('Xóa thất bại') </script>  ";
    }
  }

?>
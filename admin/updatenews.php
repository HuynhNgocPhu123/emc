<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
include_once(__DIR__ . '/../controller/getnews.php');
$p = new getnews();

// Lấy bài viết theo ID
$ma = $_REQUEST["id"];
$con = $p->getnewsbyid($ma);

if ($con && $con->num_rows > 0) {
    $r = $con->fetch_assoc();
    $tieudeold = $r["tieude"];
    $tomtatold = $r["tomtat"];
    $noidungold = $r["noidung"];
    $hinhanhold = $r["hinhanh"];
    $ngaydangold = $r['ngaydang'];
    $tacgiaold = $r['tacgia'];
    $danhmuc = $r['id_danhmuc'];
} else {
    echo "<script>alert('Không tìm thấy bài viết'); window.location.href='newsadmin.php';</script>";
    exit;
}

// Xử lý khi nhấn nút cập nhật
if (isset($_REQUEST["btnUpdateNews"])) {
    $tieude = $_POST['tieude'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $ngaydang = $_POST['ngaydang'];
    $tacgia = $_POST['tacgia'];
    $id_danhmuc = $_POST['id_danhmuc'];
    $hinhanh = $hinhanhold; // Mặc định giữ ảnh cũ

    // Kiểm tra nếu có ảnh mới
    if (!empty($_FILES["hinhanh"]["name"])) {
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $hinhanh_name = $_FILES["hinhanh"]["name"];
        $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
        $hinhanh_ext = strtolower(pathinfo($hinhanh_name, PATHINFO_EXTENSION));

        if (in_array($hinhanh_ext, $allowed_exts)) {
            $hinhanh_final = time() . "_" . uniqid() . "." . $hinhanh_ext;
            $upload_path = "../assets/images/" . $hinhanh_final;

            if (move_uploaded_file($hinhanh_tmp, $upload_path)) {
                // Cập nhật tên ảnh mới
                $hinhanh = $hinhanh_final;

                // Xoá ảnh cũ (tuỳ chọn)
                $old_path = "../assets/images/" . $hinhanhold;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            } else {
                echo "<script>alert('Không thể lưu ảnh mới');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Định dạng ảnh không hợp lệ');</script>";
            exit;
        }
    }

    // Cập nhật dữ liệu
    $con1 = $p->updateNewsFromForm($ma, $tieude, $tomtat, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc);
    
    if ($con1 === true) {
        echo "<script>alert('Cập nhật bài viết thành công'); window.location.href='newsadmin.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa Bài Viết</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-slate-50 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <h1 class="text-xl font-semibold text-sky-700"> Sửa bài viết</h1>
      <a href="newsadmin.php" class="text-sky-600 hover:text-sky-800 font-medium transition">
        ← Quay lại danh sách
      </a>
    </div>
  </header>

  <!-- Nội dung chính -->
  <main class="py-12 px-4 md:px-0 bg-gradient-to-b from-white to-slate-100 min-h-screen">
  <section class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl p-10">
    <h2 class="text-3xl font-bold text-sky-700 mb-8 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" /></svg>
      Cập nhật Bài Viết
    </h2>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
      <input type="hidden" name="id" value="<?= $ma ?>">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề</label>
          <input type="text" name="tieude" value="<?= $tieudeold ?>" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500 transition" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Tác giả</label>
          <input type="text" name="tacgia" value="<?= $tacgiaold ?>" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Ngày đăng</label>
          <input type="date_time_set" name="ngaydang" value="<?= $ngaydangold ?>" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Danh mục</label>
          <select name="id_danhmuc" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500" required>
            <option value="">-- Chọn danh mục --</option>
            <option value="1" <?= ($danhmuc == 1) ? "selected" : "" ?>>THÔNG CÁO BÁO CHÍ</option>
            <option value="2" <?= ($danhmuc == 2) ? "selected" : "" ?>>TIN TỨC CÔNG TY</option>
          </select>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700 mb-2">Hình ảnh hiện tại</label>
          <div class="flex items-center gap-4">
            <img src="../assets/images/<?= $hinhanhold ?>" alt="Hình ảnh" class="w-48 h-auto rounded-xl shadow">
            <div class="flex-1">
              <input type="file" name="hinhanh" accept="image/*" class="block w-full p-3 rounded-2xl border border-gray-300 bg-white focus:ring-2 focus:ring-sky-500">
              <small class="text-gray-500 italic">Không chọn ảnh mới nếu muốn giữ ảnh cũ.</small>
            </div>
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tóm tắt</label>
        <textarea name="tomtat" rows="2" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500" required><?= htmlspecialchars($tomtatold) ?></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nội dung</label>
        <textarea name="noidung" rows="6" class="w-full p-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-500" required><?= htmlspecialchars($noidungold) ?></textarea>
      </div>

      <div class="flex justify-end pt-6">
        <button type="submit" name="btnUpdateNews" class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg transition duration-200">
          💾 Cập nhật bài viết
        </button>
      </div>
    </form>
  </section>
</main>

  <!-- Footer -->
  <footer class="text-center py-6 text-sm text-gray-400">
    © 2025 I LIKE CMS. All rights reserved.
  </footer>

</body>
</html>

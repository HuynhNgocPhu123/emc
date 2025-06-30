<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    header('Location:login.php');
    exit();
}
    include_once(__DIR__ . '/../controller/getnews.php');
$p = new getnews();

if (isset($_POST["btnAddNews"])) {
    $tieude = $_POST["tieude"];
    $tacgia = $_POST["tacgia"];
    $ngaydang = $_POST["ngaydang"];
    $id_danhmuc = $_POST["id_danhmuc"];
    $tomtat = $_POST["tomtat"];
    $noidung = $_POST["noidung"];
    // --------- Xử lý hình ảnh ---------
    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $hinhanh_name = $_FILES["hinhanh"]["name"];
    $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
    $hinhanh_ext = strtolower(pathinfo($hinhanh_name, PATHINFO_EXTENSION));

    if (in_array($hinhanh_ext, $allowed_exts)) {
        // Tạo tên file mới để tránh trùng
        $hinhanh_final = time() . "_" . uniqid() . "." . $hinhanh_ext;
        
        // Đường dẫn thực tế để lưu file
        $upload_folder = "../assets/images/";
        $upload_path = $upload_folder . $hinhanh_final;

        // Di chuyển ảnh vào thư mục
        if (move_uploaded_file($hinhanh_tmp, $upload_path)) {
            // Upload thành công → gọi hàm lưu DB
            $result = $p->getinsertnews($tieude, $tomtat, $noidung, $hinhanh_final, $ngaydang, $tacgia, $id_danhmuc);
            
            if ($result) {
                echo '<script>alert("Thêm thành công"); window.location.href="newsadmin.php";</script>';
            } else {
                echo '<script>alert("Thêm thất bại khi lưu vào cơ sở dữ liệu.");</script>';
            }
        } else {
            echo '<script>alert("Không thể lưu ảnh lên máy chủ. Hãy kiểm tra quyền thư mục.");</script>';
        }
    } else {
        echo '<script>alert("Định dạng ảnh không hợp lệ. Vui lòng chọn ảnh JPG, PNG, GIF hoặc WebP.");</script>';
    }

}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm Bài Viết</title>
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
      <h1 class="text-xl font-semibold text-sky-700">📚 Quản lý bài viết</h1>
      <a href="newsadmin.php" class="text-sky-600 hover:text-sky-800 font-medium transition">
        ← Quay lại danh sách
      </a>
    </div>
  </header>

  <!-- Nội dung chính -->
  <main class="py-10 px-4 md:px-0">
    <section class="max-w-4xl mx-auto bg-white shadow-xl rounded-3xl p-8">
      <h2 class="text-2xl font-bold text-sky-700 mb-6">📝 Thêm Bài Viết Mới</h2>

      <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block mb-1 font-medium">Tiêu đề</label>
            <input type="text" name="tieude" class="w-full p-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-400" required>
          </div>
          <div>
            <label class="block mb-1 font-medium">Tác giả</label>
            <input type="text" name="tacgia" class="w-full p-3 rounded-2xl border border-gray-300" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Ngày đăng</label>
            <input type="date" name="ngaydang" class="w-full p-3 rounded-2xl border border-gray-300" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Danh mục</label>
            <select name="id_danhmuc" class="w-full p-3 rounded-2xl border border-gray-300" required>
              <option value="">-- Chọn danh mục --</option>
              <option value="1">THÔNG CÁO BÁO CHÍ</option>
              <option value="2">TIN TỨC CÔNG TY</option>
            </select>
          </div>

          <div class="md:col-span-2">
            <label class="block mb-1 font-medium">Hình ảnh</label>
            <input type="file" name="hinhanh" accept="image/*" class="w-full p-3 rounded-2xl border border-gray-300 bg-white" required>
          </div>
        </div>

        <div>
          <label class="block mb-1 font-medium">Tóm tắt</label>
          <textarea name="tomtat" rows="2" class="w-full p-3 rounded-2xl border border-gray-300" required></textarea>
        </div>

        <div>
          <label class="block mb-1 font-medium">Nội dung</label>
          <textarea name="noidung" rows="6" class="w-full p-3 rounded-2xl border border-gray-300" required></textarea>
        </div>

        <div class="flex justify-end pt-4">
          <button type="submit" name="btnAddNews" class="bg-sky-600 text-white px-6 py-3 rounded-2xl font-semibold shadow hover:bg-sky-700 transition">
            Đăng bài
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

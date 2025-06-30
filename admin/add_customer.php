<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    // Bao gồm controller để xử lý
    include_once(__DIR__ . '/../controller/getcustomer.php');
    $p = new getCustomer();

    // Kiểm tra xem có id khách hàng nào được gửi đến để sửa không
    if (isset($_GET['id'])) {
        $ma = $_GET['id']; // Lấy id khách hàng từ URL
        // Gọi phương thức lấy thông tin khách hàng từ DB
        $result = $p->getCustomerById($ma);
        
        // Kiểm tra xem có dữ liệu khách hàng không
        if ($result) {
            // Lấy thông tin khách hàng để điền vào form
            $tenKH = $result['tenKH'];
            $sdt = $result['sdt'];
            $email = $result['email'];
            $diachi = $result['diachi'];
            $avt = $result['avt']; // Ảnh đại diện
        } else {
            echo '<script>alert("Khách hàng không tồn tại."); window.location.href="customeradmin.php";</script>';
            exit;
        }
    } else {
        echo '<script>alert("Không tìm thấy thông tin khách hàng."); window.location.href="customeradmin.php";</script>';
        exit;
    }

    // Xử lý form submit sửa khách hàng
    if (isset($_POST["btnUpdateCustomer"])) {
        $tenKH = $_POST["tenKH"];
        $sdt = $_POST["sdt"];
        $email = $_POST["email"];
        $diachi = $_POST["diachi"];
        
        // --------- Xử lý hình ảnh ---------
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $avt_name = $_FILES["avt"]["name"];
        $avt_tmp = $_FILES["avt"]["tmp_name"];
        $avt_ext = strtolower(pathinfo($avt_name, PATHINFO_EXTENSION));

        if (in_array($avt_ext, $allowed_exts)) {
            // Tạo tên file mới để tránh trùng
            $avt_final = time() . "_" . uniqid() . "." . $avt_ext;
            
            // Đường dẫn thực tế để lưu file
            $upload_folder = "../assets/images/";
            $upload_path = $upload_folder . $avt_final;

            // Di chuyển ảnh vào thư mục
            if (move_uploaded_file($avt_tmp, $upload_path)) {
                // Upload thành công → gọi hàm sửa khách hàng trong controller
                $result = $p->getupdateKH($ma, $avt_final, $tenKH, $sdt, $email, $diachi);
                
                if ($result) {
                    echo '<script>alert("Sửa khách hàng thành công"); window.location.href="customeradmin.php";</script>';
                } else {
                    echo '<script>alert("Sửa khách hàng thất bại khi lưu vào cơ sở dữ liệu.");</script>';
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
  <title>Sửa Khách Hàng</title>
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
      <h1 class="text-xl font-semibold text-sky-700">👥 Quản lý khách hàng</h1>
      <a href="customeradmin.php" class="text-sky-600 hover:text-sky-800 font-medium transition">
        ← Quay lại danh sách khách hàng
      </a>
    </div>
  </header>

  <!-- Nội dung chính -->
  <main class="py-10 px-4 md:px-0">
    <section class="max-w-4xl mx-auto bg-white shadow-xl rounded-3xl p-8">
      <h2 class="text-2xl font-bold text-sky-700 mb-6">📝 Sửa Thông Tin Khách Hàng</h2>

      <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block mb-1 font-medium">Tên khách hàng</label>
            <input type="text" name="tenKH" class="w-full p-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-sky-400" value="<?php echo $tenKH; ?>" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Số điện thoại</label>
            <input type="text" name="sdt" class="w-full p-3 rounded-2xl border border-gray-300" value="<?php echo $sdt; ?>" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full p-3 rounded-2xl border border-gray-300" value="<?php echo $email; ?>" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Địa chỉ</label>
            <input type="text" name="diachi" class="w-full p-3 rounded-2xl border border-gray-300" value="<?php echo $diachi; ?>" required>
          </div>

          <div class="md:col-span-2">
            <label class="block mb-1 font-medium">Ảnh đại diện</label>
            <input type="file" name="avt" accept="image/*" class="w-full p-3 rounded-2xl border border-gray-300 bg-white">
            <!-- Hiển thị ảnh hiện tại -->
            <img src="../assets/images/<?php echo $avt; ?>" alt="Ảnh đại diện" class="mt-4 w-32 h-32 object-cover rounded-full">
          </div>
        </div>

        <div class="flex justify-end pt-4">
          <button type="submit" name="btnUpdateCustomer" class="bg-sky-600 text-white px-6 py-3 rounded-2xl font-semibold shadow hover:bg-sky-700 transition">
            Cập nhật khách hàng
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

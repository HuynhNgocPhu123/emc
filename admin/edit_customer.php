<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getcustomer.php');
    $p = new getCustomer();

    // Lấy mã khách hàng từ URL
    $ma = $_GET['id'] ?? 0;
    
    // Lấy thông tin khách hàng theo mã
    $con = $p->getKHbyID($ma);
    if ($con) {
        $r = $con->fetch_assoc();
        $avtcu = $r["avt"];
        $tenKHcu = $r["tenKH"];
        $sdtcu = $r["sdt"];
        $emailcu = $r["email"];
        $diachicu = $r["diachi"];
    } else {
        echo '<script>alert("❌ Không tìm thấy khách hàng!"); window.location.href = "customeradmin.php";</script>';
        exit;
    }

    $thongbao = '';
    if (isset($_POST['submit'])) {
        $tenKH = $_POST['tenKH'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $avt = $avtcu; // Mặc định giữ ảnh cũ

        if (isset($_FILES['avt']) && $_FILES['avt']['error'] === 0) {
            $upload_dir = "../assets/images/";
            $filename = time() . "_" . basename($_FILES['avt']['name']);
            $target_file = $upload_dir . $filename;
            if (move_uploaded_file($_FILES['avt']['tmp_name'], $target_file)) {
                $avt = $filename;
            }
        }

        $result = $p->getupdateKH($ma, $avt, $tenKH, $sdt, $email, $diachi);

        if ($result) {
            echo '<script>
                alert("✅ Cập nhật thành công!");
                window.location.href = "customeradmin.php";
            </script>';
            exit;
        } else {
            $thongbao = '❌ Cập nhật thất bại.';
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sửa Khách Hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
       * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            color: #333;
        }
        header {
            background: rgb(240, 245, 249);
            color: #111827;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }
        a {
            text-decoration: none;
        }
        .btn-back {
            background: rgba(0, 51, 255, 0.59);
            color: rgb(255, 255, 255);
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: background 0.2s;
            
        }
        .btn-back:hover {
            background: rgba(96, 96, 96, 0.15);
            color: rgb(65, 65, 65);
        }
        section {
            padding: 24px;
            max-width: 600px;
            margin: auto;
        }
        .form-box {
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
        }
        .form-box h3 {
            margin-top: 0;
            margin-bottom: 16px;
            font-size: 1.3rem;
            color: #3b82f6;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 14px;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="email"], input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input[type="text"]:hover, input[type="email"]:hover, input[type="file"]:hover {
            border-color: #3b82f6;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="file"]:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        button[type="reset"] {
            background-color: #e5e7eb;
            color: #111827;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="reset"]:hover {
            background-color: #d1d5db;
        }
        .btn-submit {
            background-color: #10b981;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-submit:hover {
            background-color: #059669;
        }
        .message {
            margin-top: 16px;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 0.95rem;
        }
        .message.success {
            background: #d1fae5;
            color: #065f46;
        }
        .message.error {
            background: #fee2e2;
            color: #991b1b;
        }
        .btn i {
            margin-right: 6px;
        }
    </style>
</head>

<body>

<header>
    <h2><i class="fas fa-user-edit"></i> Sửa Khách Hàng</h2>
    <a href="customeradmin.php" class="btn-back"><i class="fas fa-arrow-left"></i> Quay lại danh sách</a>
</header>

<section>
    <div class="form-box">
        <h3><i class="fas fa-pen-to-square"></i> Cập nhật thông tin khách hàng</h3>

        <form method="POST" enctype="multipart/form-data">
            <label>Ảnh đại diện hiện tại:</label>
            <img src="../assets/images/<?= $avtcu ?>" style="max-height:60px; display:block; margin-bottom:12px;">

            <label for="avt">Chọn ảnh đại diện mới (nếu thay đổi):</label>
            <input type="file" name="avt" accept="image/*">

            <label for="tenKH">Tên khách hàng:</label>
            <input type="text" name="tenKH" value="<?= $tenKHcu ?>" required>

            <label for="sdt">Số điện thoại:</label>
            <input type="text" name="sdt" value="<?= $sdtcu ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $emailcu ?>" required>

            <label for="diachi">Địa chỉ:</label>
            <input type="text" name="diachi" value="<?= $diachicu ?>" required>

            <div class="form-actions">
                <button type="reset"><i class="fas fa-rotate-left"></i> Nhập lại</button>
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
            </div>
        </form>

        <?php if ($thongbao): ?>
            <div class="message <?= strpos($thongbao, '✅') !== false ? 'success' : 'error' ?>">
                <?= $thongbao ?>
            </div>
        <?php endif; ?>
    </div>
</section>

</body>
</html>

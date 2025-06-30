<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
include_once(__DIR__ . '/../controller/getpartner.php');

// Xử lý khi submit form
$thongbao = '';
if (isset($_POST['submit'])) {
    $tendoitac = $_POST['tendoitac'];
    $website = $_POST['website'];

    // Xử lý ảnh logo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $upload_dir = "../assets/images/";
        $filename = time() . "_" . basename($_FILES['logo']['name']);
        $target_file = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            // Gọi controller
            $p = new getViewPartner();
            $result = $p->getinsertpartner($filename, $tendoitac, $website);

            if ($result) {
                $thongbao = '✅ Thêm đối tác thành công!'   ;
               
            } else {
                $thongbao = '<script>alert("❌ Lỗi khi thêm vào CSDL.")</script> '   ;
            }
        } else {
            $thongbao = "❌ Lỗi khi upload ảnh.";
        }
    } else {
        $thongbao = "❌ Vui lòng chọn logo.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thêm đối tác</title>
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
            background:rgb(240, 245, 249);
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
            color:rgb(255, 255, 255);
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: background 0.2s;
            
        }
        .btn-back:hover {
            background: rgba(96, 96, 96, 0.15);
            color:rgb(65, 65, 65);
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
        input[type="text"], input[type="url"], input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input[type="text"]:hover, input[type="url"]:hover, input[type="file"]:hover {
            border-color: #3b82f6;
        }
        input[type="text"]:focus, input[type="url"]:focus, input[type="file"]:focus {
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
    <h2><i class="fas fa-handshake"></i> Thêm đối tác</h2>
    <a href="partneradmin.php" class="btn-back"><i class="fas fa-arrow-left"></i> Quay lại danh sách</a>
</header>

<section>
    <div class="form-box">
        <h3><i class="fas fa-plus-circle"></i> Nhập thông tin đối tác mới</h3>

        <form method="POST" enctype="multipart/form-data">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" accept="image/*" required>

            <label for="tendoitac">Tên đối tác:</label>
            <input type="text" name="tendoitac" required>

            <label for="website">Website:</label>
            <input type="url" name="website" required>

            <div class="form-actions">
                <button type="reset"><i class="fas fa-rotate-left"></i> Nhập lại</button>
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-plus"></i> Thêm đối tác
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

<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getcontact.php');
    $p = new getviewcontact();

 
    $ma = $_GET['id'] ?? 0;

    // Kiểm tra xem id có tồn tại không
    if ($ma) {
        $con = $p->getupdateTT($ma); // Gọi hàm update trạng thái liên hệ từ controller

        if ($con) {
            echo '<script>alert("✅ Cập nhật trạng thái thành công!"); window.location.href = "contactadmin.php";</script>';
            exit;
        } else {
            echo '<script>alert("❌ Cập nhật trạng thái thất bại!"); window.location.href = "contactadmin.php";</script>';
            exit;
        }
    } else {
        echo '<script>alert("❌ Không tìm thấy liên hệ!"); window.location.href = "contactadmin.php";</script>';
        exit;
    }
?>

<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getcontact.php');
    $p = new getviewcontact();
    $ma = $_GET["id"];
    if($ma){
        $con = $p->getxoaLH($ma);
        if($con){
            echo ' <script>alert("Xóa thành công")</script>';
            echo ' <script>window.location.href="contactadmin.php"</script>';
        }else{
            echo '<script>alert("Xóa thất bại")</script>';
        }
    }else{
        echo 'Không tồn tại mã';
    }

?>
<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getcustomer.php');
    $p = new getCustomer();
    $ma = $_REQUEST["id"];
    if($ma){
        $con = $p ->getdeleteKH($ma);
        if($con){
            echo ' <script>alert("Xóa thành công")</script> ';
            echo ' <script>window.location.href="customeradmin.php"</script>';
        }else{
            echo 'Thêm thất bại';
        }
    }


?>
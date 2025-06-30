<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getpartner.php');
    $p = new getViewPartner();
    $ma = $_REQUEST["id"];
    if($ma){
        $con = $p ->getdeletepartner($ma);
        if($con){
            echo ' <script>alert("Xóa thành công")</script> ';
            echo ' <script>window.location.href="partneradmin.php"</script>';
        }else{
            echo 'Thêm thất bại';
        }
    }


?>
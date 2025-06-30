<?php
    include_once(__DIR__ . '/../model/customer.php');
    class getCustomer{
        public function getKH($start, $limit) {
            $p = new viewCustomer; 
            $result = $p->selectKH($start, $limit);
            if ($result) {
                return $result;
            } else {
                echo "Lỗi lấy danh sách KH";
                return false;
            }
        }
        // lấy khách hàng theo ID
        public function getKHbyID($ma) {
            $p = new viewCustomer; 
            $result = $p->selectKHbyID($ma);
            if ($result) {
                return $result;
            } else {
                echo "Lỗi lấy danh sách KH";
                return false;
            }
        }
        public function getthemKH($avt, $tenKH, $sdt, $email, $diachi){
            $p = new viewCustomer; 
            $result = $p->themKH($avt, $tenKH, $sdt, $email, $diachi);

            if($result){
                // Nếu thêm khách hàng thành công, trả về kết quả
                return $result;
            } else {
                // Nếu có lỗi trong quá trình thêm khách hàng
                echo "Lỗi thêm KH"; // In thông báo lỗi ra màn hình
                return false; // Trả về false nếu có lỗi
            }
        }
        //sửa khách hàng 
        public function getupdateKH($ma,$avt, $tenKH, $sdt, $email, $diachi){
            $p = new viewCustomer(); 
            $result = $p->suaKH($ma,$avt, $tenKH, $sdt, $email, $diachi);
            if($result){
                return $result;
            }else{
                echo 'Lỗi sửa KH';
                return false;
            }
        }
        //xóa khách hàng
        public function getdeleteKH($ma){
            $p = new viewCustomer(); 
            $con = $p->xoaKH($ma);
            if($con){
                return $con;
            }else{
                echo 'Lỗi Xóa';
                return false;
            }
        }
    }

?>

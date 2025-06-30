<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class viewCustomer{
        public function selectKH($start, $limit) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang ORDER BY id_khachhang DESC LIMIT $start, $limit";
                $result = $con->query($sql);
                return $result;
            } else {
                echo "Lỗi kết nối CSDL";
                return false;
            }
        }
        // lấy khách hàng theo ID:
        public function selectKHbyID($ma) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang where id_khachhang=$ma ORDER BY id_khachhang";
                $result = $con->query($sql);
                return $result;
            } else {
                echo "Lỗi kết nối CSDL";
                return false;
            }
        }
        // thêm khách hàng
        public function themKH($avt, $tenKH, $sdt, $email, $diachi) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $avt = mysqli_real_escape_string($con, $avt);
                $tenKH = mysqli_real_escape_string($con, $tenKH);
                $sdt = mysqli_real_escape_string($con, $sdt);
                $email = mysqli_real_escape_string($con, $email);
                $diachi = mysqli_real_escape_string($con, $diachi);

                $sql = "INSERT INTO khachhang (avt, tenKH, sdt, email, diachi)
                        VALUES ('$avt', '$tenKH', '$sdt', '$email', '$diachi')";
                        
                $kq = mysqli_query($con, $sql);
                mysqli_close($con);
                return $kq;
            } else {
                return false;
            }
        }
        //sửa thông tin khách hàng
        public function suaKH($ma,$avt, $tenKH, $sdt, $email, $diachi) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="UPDATE khachhang
                SET avt = '$avt', tenKH ='$tenKH', sdt='$sdt', email='$email', diachi ='$diachi'
                WHERE id_khachhang = $ma ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo 'Lỗi kết nối cSDL';
                return false;
            }
        }
        // xóa khách hàng
        public function xoaKH($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE FROM khachhang where id_khachhang =$ma";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
    }



?>
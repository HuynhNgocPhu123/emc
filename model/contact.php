<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class ViewContact{
        public function viewallcontact(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str= "SELECT * FROM lienhe";
                $tbl = $con -> query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo "Loi truy van";
                    return false;
                }
            }else{
                echo " <script> alert('ket noi CSDL that bai') </script> ";
                return false;
            }
        }
        public function viewbyid_lienhe($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "SELECT * from lienhe where id_lienhe = $ma";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Looi  truy van';
                    return false;
                }
            }else{
                echo 'Looi KET NOI CSDL';
                return false;
            }
        }
        // cập nhật trang tin tức
        public function updateTT($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="UPDATE lienhe set trangthaixuly = 1 where id_lienhe =$ma";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Loi  truy van';
                    return false;
                }
            }else{
                echo 'Loi KET NOI CSDL';
                return false;
            }
        }
        // xóa liên hệ:
        public function xoaLH($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE from lienhe where id_lienhe =$ma";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Loi  truy van';
                    return false;
                }
            }else{
                echo 'Loi Ket noi CSDL';
                return false;
            }
        }

        // thêm liên hệ
        public function themLH($tenKH,$emailKH,$sdt,$noidung,$ngaytao,$trangthai){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="INSERT INTO lienhe(tenKH, emailKH, sdt, noidung, ngaytao, trangthaixuly)
                       VALUES ('$tenKH', '$emailKH', '$sdt', '$noidung', CURDATE(), 0)";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Lỗi truy vấn';
                    return false;
                }
            }else{
                echo 'Loi Ket noi CSDL';
                return false;
            }
        }
    }    
?>
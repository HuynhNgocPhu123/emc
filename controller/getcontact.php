<?php
    include_once(__DIR__ . '/../model/contact.php');
    class getviewcontact{
        public function getallcontact(){
            $p = new ViewContact();
            $con = $p-> viewallcontact();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi lieen he ";
                return false;
            }
        }


    // Laays thoong tin 1 lien he
        public function get1contact(){
            $p = new ViewContact();
            $con = $p-> viewbyid_lienhe($ma);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi lieen he ";
                return false;
            }
        }
        // cập nhật trạng thái liên hệ
        public function getupdateTT($ma){
            $p = new ViewContact();
            $con = $p->updateTT($ma);
            if($con){
                return $con;
            }else{
                echo 'Lỗi';
                return false;
            }
        }
        // Xóa liên hệ
        public function getxoaLH($ma){
            $p = new ViewContact();
            $con = $p->xoaLH($ma);
            if($con){
                return $con;
            }else{
                echo 'Lỗi xóa';
                return false;
            }
        }
    }
?>
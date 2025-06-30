<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class viewPartner{
        public function selectpartnerbyid($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "SELECT * FROM doitac where id_doitac =$ma";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        public function selectpartner($start, $limit){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "SELECT * FROM doitac LIMIT $start, $limit";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        public function insertpartner($logo,$tendoitac,$website){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "INSERT into doitac(logo,tendoitac,website)
                Values('$logo','$tendoitac','$website')";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        public function deletepartner($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE FROM doitac where id_doitac =$ma";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        public function updatepartner($ma,$logo,$tendoitac,$website){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="UPDATE doitac
                SET logo = '$logo', tendoitac ='$tendoitac', website ='$website'
                WHERE id_doitac = $ma ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }

    }
?>
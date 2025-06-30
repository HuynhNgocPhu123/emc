<?php
    include_once(__DIR__ . '/../model/partner.php');
    class getViewPartner{
         public function getpartnerbyid($ma){
            $p = new viewPartner();
            $con = $p->selectpartnerbyid($ma);
            if($con){
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi đối tác";
                return false;
            }
        }
       public function getallpartner($start, $limit){
            $p = new viewPartner();
            $con = $p->selectpartner($start, $limit);
            if($con){
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "Lỗi đối tác";
                return false;
            }
        }
        public function getinsertpartner($logo,$tendoitac,$website){
            $p = new viewPartner();
            $con = $p->insertpartner($logo,$tendoitac,$website);
            if($con){
                return $con;
            }else{
                echo 'Lỗi thêm';
                return false;
            }
        }
        public function getdeletepartner($ma){
            $p = new viewPartner();
            $con = $p->deletepartner($ma);
            if($con){
                return $con;
            }else{
                echo 'Lỗi thêm';
                return false;
            }
        }
        public function getupdatepartner($ma,$logo,$tendoitac,$website){
            $p = new viewPartner();
            $con = $p->updatepartner($ma,$logo,$tendoitac,$website);
            if($con){
                return $con;
            }else{
                echo 'Lỗi cập';
                return false;
            }
        }
    }


?>
<?php
    class clsketnoi{
        public function moketnoi(){
            $con = mysqli_connect("localhost", "root", "", "emc1");
            $con->set_charset("utf8");
            return $con;
        }
    }


?>
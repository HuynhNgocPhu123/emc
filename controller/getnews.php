<?php
    include_once(__DIR__ . '/../model/news.php');
    class getnews{
        public function getallnews1(){
            $p = new ViewNews();
            $con = $p -> selectnews1();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        public function getallnews($limit, $offset){
            $p = new ViewNews();
            $con = $p -> selectnews($limit, $offset);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        public function totalNews(){
            $p = new ViewNews();
            return $p->countNews();
        }

// danh sách tin nổi bật
        public function gethotnews(){
            $p = new ViewNews();
            $con = $p -> selecthotnews();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }

        // danh sách tin tức nhiều view
        public function getviewnews(){
            $p = new ViewNews();
            $con = $p -> selectviewnews();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        public function getallnewsbyname($limit, $offset, $name){
            $p = new ViewNews();
            $con = $p -> selectnewsbyname($limit, $offset, $name);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }

        // lọc theo danh mục sản phẩm
        public function getallnewsbyiddanhmuc($ma,$limit, $offset){
            $p = new ViewNews();
            $con = $p -> selectnewsbyiddanhmuc($ma,$limit, $offset);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        // chi tiết sản phẩm
        public function getnewsbyid($ma){
            $p = new ViewNews();
            $con = $p->selectnewsbyid($ma);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        // hàm thêm tin tức
        public function getinsertnews($tieude, $tomtat, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc){
            $p = new ViewNews();
            $con = $p->insertnews($tieude, $tomtat, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc);
            if($con){
                return $con;
            }else{
                echo 'Lỗi thêm';
                return false;
            }
        }
        //cập nhập tin tức
        public function updateNewsFromForm($ma, $tieude, $tomtat, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc) {
            $model = new ViewNews();
            $result = $model->updatetnews($ma, $tieude, $tomtat, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc);
            
            if ($result) {
                return true;
            } else {
                // Nếu cần log hoặc xử lý lỗi, có thể mở rộng ở đây
                return false;
            }
        }
        // xóa bài viết
        public function deletenewsform($ma) {
            $model = new ViewNews();
            $result = $model->deletenew($ma);
            
            if ($result) {
                return true;
            } else {
                // Nếu cần log hoặc xử lý lỗi, có thể mở rộng ở đây
                return false;
            }
        }
        // tăng lượt xem
        public function getincrease($ma) {
            $model = new ViewNews();
            $result = $model->increase($ma);
            
            if ($result) {
                return true;
            } else {
                // Nếu cần log hoặc xử lý lỗi, có thể mở rộng ở đây
                return false;
            }
        }

    }
?>
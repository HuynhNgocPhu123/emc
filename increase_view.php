<?php 
include_once("controller/getnews.php");
$p = new getnews();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['detailid'])) {
        $id = intval($_POST['detailid']);
        $success = $p->getincrease($id);

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Tăng thành công']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Không thể cập nhật view (có thể query lỗi)']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Thiếu detailid']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Sai phương thức (POST expected)']);
}
?>
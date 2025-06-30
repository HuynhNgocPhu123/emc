<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getcustomer.php');
    include_once(__DIR__ . '/../model/ketnoi.php');

    // Thiết lập phân trang
    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $start = ($page - 1) * $limit;

    // Gọi controller
    $p = new getCustomer();
    $con = $p->getKH($start, $limit);

    // Đếm tổng số bản ghi
    $connect = new clsketnoi();
    $conn = $connect->moketnoi();
    $totalQuery = $conn->query("SELECT COUNT(*) AS total FROM khachhang");
    $totalRow = $totalQuery->fetch_assoc();
    $totalRecords = $totalRow['total'];
    $totalPages = ceil($totalRecords / $limit);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
    background-color: #f9fafb;
    margin: 0;
    color: #333;
}

/* Header */
header {
    background:rgb(240, 245, 249);
    color:rgb(0, 0, 0);
    padding: 16px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e5e7eb;
    position: sticky;
    top: 0;
    z-index: 10;
}

header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

/* Nút quay lại */
.btn-back {
    background: rgba(0, 51, 255, 0.59);
    color:rgb(255, 255, 255);
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 500;
    transition: background 0.2s;
    text-decoration: none;
}

.btn-back:hover {
    background: rgba(96, 96, 96, 0.15);
    color:rgb(65, 65, 65);
}

/* Khu vực nội dung chính */
section {
    padding: 24px;
    max-width: 1200px;
    margin: auto;
}

/* Nút thêm đối tác */
a {
    text-decoration: none;        
}
.btn-add {
            background: linear-gradient(to right, #00b09b, #96c93d);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .btn-add:hover {
            transform: translateY(-2px);
        }

/* Bảng dữ liệu */
.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

th, td {
    padding: 14px 16px;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
    font-size: 0.95rem;
}

th {
    background: #f9fafb;
    color: #374151;
    font-weight: 600;
}

td img {
    max-height: 40px;
    border-radius: 6px;
    object-fit: cover;
}

tr:last-child td {
    border-bottom: none;
}

/* Nút thao tác */
.btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.9rem;
    display: inline-block;
    margin: 0 2px;
    transition: all 0.2s;
    text-decoration: none;
}

.edit {
    background-color: #10b981;
    color: #fff;
}

.edit:hover {
    background-color: #059669;
}

.delete {
    background-color: #ef4444;
    color: #fff;
}

.delete:hover {
    background-color: #dc2626;
}

/* Phân trang */
.pagination {
    margin-top: 20px;
    text-align: center;
}

.pagination a {
    display: inline-block;
    margin: 0 4px;
    padding: 8px 12px;
    background: #f3f4f6;
    color: #111827;
    border-radius: 6px;
    font-weight: 500;
    transition: background 0.2s;
    text-decoration: none;
}

.pagination a.active {
    background: #3b82f6;
    color: #fff;
}

.pagination a:hover {
    background: #e5e7eb;
}

/* Responsive */
@media (max-width: 768px) {
    th, td {
        padding: 12px;
        font-size: 0.9rem;
    }

    .btn-add {
        display: block;
        text-align: center;
        width: 100%;
    }
}

    </style>
</head>

<body>

<header>
    <h2><i class="fas fa-users"></i> Quản lý khách hàng</h2>
    <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Quay lại</a>
</header>

<section>
    <a href="add_customer.php" class="btn-add"><i class="fas fa-plus"></i> Thêm khách hàng</a>

    <?php if ($con && $con->num_rows > 0): ?>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Tên KH</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $con->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_khachhang'] ?></td>
                    <td><img src="../assets/images/<?= $row['avt'] ?>" alt="avatar"></td>
                    <td><?= $row['tenKH'] ?></td>
                    <td><?= $row['sdt'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['diachi'] ?></td>
                    <td>
                        <a href="edit_customer.php?id=<?= $row['id_khachhang'] ?>" class="btn edit"><i class="fas fa-pen"></i> Sửa</a>
                        <a href="delete_customer.php?id=<?= $row['id_khachhang'] ?>" class="btn delete" onclick="return confirm('Bạn có chắc muốn xóa khách hàng này?')"><i class="fas fa-trash"></i> Xóa</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>Không có dữ liệu khách hàng.</p>
    <?php endif; ?>

    <!-- PHÂN TRANG -->
    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

</section>

</body>
</html>

<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getpartner.php');
    include_once(__DIR__ . '/../model/ketnoi.php');

    // Thiết lập phân trang
    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $start = ($page - 1) * $limit;

    // Gọi controller
    $p = new getViewPartner();
    $con = $p->getallpartner($start, $limit);

    // Đếm tổng số bản ghi
    $connect = new clsketnoi();
    $conn = $connect->moketnoi();
    $totalQuery = $conn->query("SELECT COUNT(*) AS total FROM doitac");
    $totalRow = $totalQuery->fetch_assoc();
    $totalRecords = $totalRow['total'];
    $totalPages = ceil($totalRecords / $limit);

    if(isset($_REQUEST["delete"])){
        include_once(__DIR__ . '/../admin/deletepartner.php');
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Quản lý đối tác</title>
    <style>
        /* Reset & base */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            color: #333;
        }
        a {
            text-decoration: none;
        }

        /* Header */
        header {
        background:rgb(240, 245, 249);
        color:rgb(0, 0, 0);
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        header h2 {
            font-size: 1.8rem;
            margin: 0;
        }
        .btn-back {
            background: rgba(0, 51, 255, 0.59);
            color:rgb(255, 255, 255);
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .btn-back:hover {
            background: rgba(96, 96, 96, 0.15);
            color:rgb(65, 65, 65);
        }

        /* Section */
        section {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
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

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            background-color: transparent;
        }
        th, td {
            padding: 14px 18px;
            background: #fff;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 1rem;
        }
        th {
            background:rgb(226, 226, 226);
            font-weight: 600;
            color: #555;
            position: sticky;
            top: 0;
            z-index: 2;
        }
        td img {
            max-height: 50px;
            border-radius: 6px;
            object-fit: contain;
        }

        /* Action buttons */
        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: 500;
            display: inline-block;
            margin: 0 4px;
            transition: all 0.2s;
        }
        .edit {
            background-color: #007bff;
            color: #fff;
        }
        .edit:hover {
            background-color: #0056b3;
        }
        .delete {
            background-color: #e53935;
            color: #fff;
        }
        .delete:hover {
            background-color: #b71c1c;
        }

        /* Pagination */
        .pagination {
            margin-top: 30px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            margin: 0 6px;
            padding: 8px 14px;
            background: #e0e0e0;
            color: #333;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .pagination a.active {
            background: #0066ff;
            color: #fff;
        }
        .pagination a:hover {
            background: #b0bec5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            th, td {
                padding: 10px;
                font-size: 0.95rem;
            }
            .btn-add {
                display: block;
                text-align: center;
                width: 100%;
            }
        }
        @media (max-width: 500px) {
            .btn {
                padding: 6px 10px;
                font-size: 0.85rem;
            }
            header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
        .btn i {
            margin-right: 6px;
        }
    </style>
</head>

<body>


<header>
    <h2><i class="fas fa-handshake"></i> Quản lý đối tác</h2>
    <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Quay lại</a>
</header>


<section>
    <a href="insertpartner.php" class="btn-add"><i class="fas fa-plus"></i> Thêm đối tác</a>

    <?php if ($con && $con ==true): ?>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Tên đối tác</th>
                    <th>Website</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $con->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_doitac'] ?></td>
                    <td><img src="../assets/images/<?= $row['logo'] ?>" alt="logo"></td>
                    <td><?= $row['tendoitac'] ?></td>
                    <td>
                        <a href="<?= $row['website'] ?>" target="_blank" style="color: #0066ff;">
                            <?= $row['website'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="updatepartner.php?id=<?= $row['id_doitac'] ?>" class="btn edit">
                            <i class="fas fa-pen"></i> Sửa
                        </a>
                        <a href="partneradmin.php?delete&id=<?= $row['id_doitac'] ?>" class="btn delete" onclick="return confirm('Bạn có chắc muốn xóa không?')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>Không có dữ liệu đối tác.</p>
    <?php endif; ?>

    <!-- Pagination -->
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

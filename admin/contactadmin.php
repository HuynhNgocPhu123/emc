<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
include_once(__DIR__ . '/../controller/getcontact.php');
$p = new getviewcontact();
$con = $p->getallcontact();

$tong = $daduyet = $chuaduyet = 0;
$data = $data_done = $data_pending = [];

if ($con && $con->num_rows > 0) {
    while ($row = $con->fetch_assoc()) {
        $data[] = $row;
        $tong++;
        if ($row['trangthaixuly'] == 1) {
            $daduyet++;
            $data_done[] = $row;
        } else {
            $chuaduyet++;
            $data_pending[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý liên hệ | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body,header { font-family: 'Inter', sans-serif;background-color: #f1f5f9; /* light slate/blue-gray */ }
        .hidden { display: none; }
    
    </style>
</head>
<body class="text-gray-800 leading-relaxed">
    <!-- Header -->
    <header class=" shadow-sm sticky top-0 z-50 p-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
            <i data-lucide="inbox" class="w-8 h-8 text-indigo-500"></i>
            Quản lý liên hệ khách hàng
        </h1>
        <a href="dashboard.php" class="bg-indigo-500/90 hover:bg-indigo-600 text-white px-5 py-2 rounded-md shadow transition-transform transform hover:scale-105">
            ← Quay lại
        </a>
    </header>

    <!-- 4 Card -->
    <section class="p-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card Tổng liên hệ -->
        <div class="flex flex-col justify-between rounded-xl p-6 bg-indigo-50 border border-indigo-200 shadow transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="flex items-center gap-4 mb-3">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600">
                    <i data-lucide="inbox" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-slate-600 text-sm mb-1">Tổng liên hệ</p>
                    <p class="text-5xl font-extrabold text-indigo-700 leading-tight"><?= $tong ?></p>
                    <p class="text-slate-400 text-xs mt-2">Tổng số liên hệ đã ghi nhận</p>
                </div>
            </div>
        </div>

        <!-- Đã xử lý -->
        <div class="flex flex-col justify-between rounded-xl p-6 bg-green-50 border border-green-200 shadow transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="flex items-center gap-4 mb-3">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-slate-600 text-sm mb-1">Đã xử lý</p>
                    <p class="text-5xl font-extrabold text-green-700 leading-tight"><?= $daduyet ?></p>
                    <p class="text-slate-400 text-xs mt-2">Số liên hệ đã xử lý thành công</p>
                </div>
            </div>
        </div>

        <!-- Chưa xử lý -->
        <div class="flex flex-col justify-between rounded-xl p-6 bg-red-50 border border-red-200 shadow transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="flex items-center gap-4 mb-3">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600">
                    <i data-lucide="alert-circle" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-slate-600 text-sm mb-1">Chưa xử lý</p>
                    <p class="text-5xl font-extrabold text-red-700 leading-tight"><?= $chuaduyet ?></p>
                    <p class="text-slate-400 text-xs mt-2">Số liên hệ đang chờ xử lý</p>
                </div>
            </div>
        </div>

        <!-- Xu hướng -->
        <div class="flex flex-col justify-between rounded-xl p-6 bg-purple-50 border border-purple-200 shadow transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="flex justify-between items-center mb-3">
                <p class="text-slate-600 text-sm font-medium">Xu hướng liên hệ</p>
            </div>
            <div class="flex-1 flex items-center justify-center">
                <div class="w-full" style="height: 100px;">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs center -->
   <div class="p-8 flex justify-center">
    <div class="flex space-x-4">
        <button onclick="showTable('all')" class="tab-btn bg-indigo-500 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-600 flex items-center gap-2">
            <i data-lucide="inbox" class="w-5 h-5"></i> Toàn bộ liên hệ
        </button>
        <button onclick="showTable('done')" class="tab-btn bg-green-500 text-white px-4 py-2 rounded-md shadow hover:bg-green-600 flex items-center gap-2">
            <i data-lucide="check-circle" class="w-5 h-5"></i> Đã xử lý
        </button>
        <button onclick="showTable('pending')" class="tab-btn bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 flex items-center gap-2">
            <i data-lucide="alert-circle" class="w-5 h-5"></i> Chưa xử lý
        </button>
    </div>
</div>


    <!-- Tables -->
    <div class="p-8">
        <!-- Table all -->
        <div id="table-all" class="table-view hidden">
            <?php renderTable($data, 'all'); ?>
        </div>
        <!-- Table done -->
        <div id="table-done" class="table-view hidden">
            <?php renderTable($data_done, 'done'); ?>
        </div>
        <!-- Table pending -->
        <div id="table-pending" class="table-view hidden">
            <?php renderTable($data_pending, 'pending'); ?>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        lucide.createIcons();

        const ctx = document.getElementById('trendChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [{
                    label: 'Liên hệ',
                    data: [3,5,8,4,6,7,9],
                    backgroundColor: 'rgba(168,85,247,0.7)',
                    borderRadius: 6,
                    barThickness: 12
                }]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#475569', font: { size: 12 } } },
                    y: { beginAtZero: true, grid: { color: '#e2e8f0' }, ticks: { color: '#475569', font: { size: 12 } } }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        function showTable(type) {
            document.querySelectorAll('.table-view').forEach(el => el.classList.add('hidden'));
            document.getElementById('table-' + type).classList.remove('hidden');
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('ring', 'ring-offset-2'));
            event.target.classList.add('ring', 'ring-offset-2');
        }
    </script>

</body>
</html>

<?php
function renderTable($rows, $type) {
    echo '<div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow mt-4">';
    echo '<table class="min-w-full divide-y divide-slate-200 text-sm">';
    echo '<thead class="bg-slate-50">
        <tr>
            <th class="px-4 py-3 text-center">ID</th>
            <th class="px-4 py-3 text-left">Tên KH</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-left">SĐT</th>
            <th class="px-4 py-3 text-left">Nội dung</th>
            <th class="px-4 py-3 text-center">Ngày tạo</th>
            <th class="px-4 py-3 text-center">Trạng thái</th>
            <th class="px-4 py-3 text-center">Hành động</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">';

    if (empty($rows)) {
        echo '<tr><td colspan="8" class="p-6 text-center text-slate-500">Không có dữ liệu.</td></tr>';
    } else {
        foreach ($rows as $row) {
            echo '<tr class="hover:bg-slate-50 transition">
                <td class="px-4 py-3 text-center">'. $row['id_lienhe'] .'</td>
                <td class="px-4 py-3 text-left">'. htmlspecialchars($row['tenKH']) .'</td>
                <td class="px-4 py-3 text-left">'. htmlspecialchars($row['emailKH']) .'</td>
                <td class="px-4 py-3 text-left">'. htmlspecialchars($row['sdt']) .'</td>
                <td class="px-4 py-3 text-left">'. nl2br(htmlspecialchars($row['noidung'])) .'</td>
                <td class="px-4 py-3 text-center">'. $row['ngaytao'] .'</td>
                <td class="px-4 py-3 text-center">'. ($row['trangthaixuly'] == 1 ? '<span class="text-green-600">Đã xử lý</span>' : '<span class="text-red-600">Chưa xử lý</span>') .'</td>
                <td class="px-4 py-3 text-center">';

            if ($type === 'pending') {
                echo '<a href="updatecontact.php?id='. $row['id_lienhe'] .'" class="inline-flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Xử lý
                      </a>';
            } else {
                echo '<form action="delete_lienhe.php?id=' . $row['id_lienhe'] . '" method="POST" onsubmit="return confirm(\'Bạn có chắc muốn xoá liên hệ này?\');" class="inline-flex">
                        <input type="hidden" name="id" value="' . $row['id_lienhe'] . '">
                        <button type="submit" class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                            <i data-lucide="trash-2" class="w-4 h-4"></i> Xóa
                        </button>
                    </form>';

            }
            echo '</td></tr>';
        }
    }

    echo '</tbody></table></div>';
}
?>

<?php 
// Contoh data pesanan
$order_history = [
    [
        'order_id' => '001',
        'username' => 'user1',
        'item_name' => 'Isi Ulang 19L',
        'quantity' => 2,
        'price' => 7000,
        'payment_status' => 'Lunas',
        'order_status' => 'Menunggu Konfirmasi',
        'total_price' => 14000,
        'date_time' => '2024-05-27 14:00'
    ],
    [
        'order_id' => '002',
        'username' => 'user2',
        'item_name' => 'Aqua 19L',
        'quantity' => 1,
        'price' => 25000,
        'payment_status' => 'Belum Lunas',
        'order_status' => 'Diproses',
        'total_price' => 25000,
        'date_time' => '2024-05-26 15:30'
    ],
    [
        'order_id' => '003',
        'username' => 'user3',
        'item_name' => 'Le Minerale 15L',
        'quantity' => 3,
        'price' => 20000,
        'payment_status' => 'Lunas',
        'order_status' => 'Diantar',
        'total_price' => 60000,
        'date_time' => '2024-05-25 16:45'
    ],
    [
        'order_id' => '004',
        'username' => 'user4',
        'item_name' => 'Cleo 19L',
        'quantity' => 1,
        'price' => 18000,
        'payment_status' => 'Lunas',
        'order_status' => 'Selesai',
        'total_price' => 18000,
        'date_time' => '2024-05-24 10:00'
    ],
    [
        'order_id' => '005',
        'username' => 'user5',
        'item_name' => 'Vit 19L',
        'quantity' => 2,
        'price' => 16000,
        'payment_status' => 'Belum Lunas',
        'order_status' => 'Dibatalkan',
        'total_price' => 32000,
        'date_time' => '2024-05-23 12:30'
    ]
];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pesanan - NabWater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Riwayat Pesanan
        </div>
        <div class="card-body">
            <?php if (count($order_history) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Username</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>Jumlah Item</th>
                                <th>Status Pembayaran</th>
                                <th>Status Pesanan</th>
                                <th>Total Harga</th>
                                <th>Tanggal dan Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_history as $order): ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['username']; ?></td>
                                    <td><?php echo $order['item_name']; ?></td>
                                    <td>Rp <?php echo number_format($order['price'], 0, ',', '.'); ?></td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td><?php echo $order['payment_status']; ?></td>
                                    <td>
                                        <?php 
                                        $status_class = '';
                                        switch ($order['order_status']) {
                                            case 'Menunggu Konfirmasi':
                                                $status_class = 'badge bg-warning text-dark';
                                                break;
                                            case 'Diproses':
                                                $status_class = 'badge bg-info text-dark';
                                                break;
                                            case 'Diantar':
                                                $status_class = 'badge bg-primary';
                                                break;
                                            case 'Selesai':
                                                $status_class = 'badge bg-success';
                                                break;
                                            case 'Dibatalkan':
                                                $status_class = 'badge bg-danger';
                                                break;
                                        }
                                        ?>
                                        <span class="<?php echo $status_class; ?>"><?php echo $order['order_status']; ?></span>
                                    </td>
                                    <td>Rp <?php echo number_format($order['total_price'], 0, ',', '.'); ?></td>
                                    <td><?php echo $order['date_time']; ?></td>
                                    <td>
                                        <a href="detail_pesanan.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>Tidak ada riwayat pesanan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

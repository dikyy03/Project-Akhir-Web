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

// Mendapatkan order_id dari URL
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';

// Mencari pesanan berdasarkan order_id
$order = null;
foreach ($order_history as $o) {
    if ($o['order_id'] == $order_id) {
        $order = $o;
        break;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pesanan - NabWater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .receipt {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #f7f7f7;
            font-family: 'Courier New', Courier, monospace;
        }
        .receipt-header, .receipt-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-footer {
            border-top: 1px dashed #000;
            padding-top: 10px;
        }
        .receipt-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .receipt-info {
            margin-bottom: 10px;
        }
        .receipt-info span {
            display: block;
        }
        .receipt-item {
            border-bottom: 1px dashed #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .receipt-item:last-child {
            border-bottom: none;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="receipt">
        <div class="receipt-header">
            <div class="receipt-title">NabWater</div>
            <div>Detail Pesanan</div>
        </div>
        <?php if ($order): ?>
            <div class="receipt-info">
                <span><strong>ID Pesanan:</strong> <?php echo $order['order_id']; ?></span>
                <span><strong>Username:</strong> <?php echo $order['username']; ?></span>
                <span><strong>Tanggal & Waktu:</strong> <?php echo $order['date_time']; ?></span>
            </div>
            <div class="receipt-item">
                <span><strong>Nama Item:</strong> <?php echo $order['item_name']; ?></span>
                <span><strong>Harga:</strong> Rp <?php echo number_format($order['price'], 0, ',', '.'); ?></span>
                <span><strong>Jumlah Item:</strong> <?php echo $order['quantity']; ?></span>
                <span><strong>Status Pembayaran:</strong> <?php echo $order['payment_status']; ?></span>
                <span><strong>Status Pesanan:</strong> <?php echo $order['order_status']; ?></span>
                <span class="text-right"><strong>Total Harga:</strong> Rp <?php echo number_format($order['total_price'], 0, ',', '.'); ?></span>
            </div>
            <div class="receipt-footer">
                <p>Terima kasih telah berbelanja di NabWater!</p>
                <a href="info_pesanan.php" class="btn btn-primary">Kembali ke Riwayat Pesanan</a>
            </div>
        <?php else: ?>
            <p>Pesanan tidak ditemukan.</p>
            <a href="info_pesanan.php" class="btn btn-primary">Kembali ke Riwayat Pesanan</a>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

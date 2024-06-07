<?php
// Contoh data riwayat pesanan (dari info_pesanan.php)
$order_history = [
    [
        'id' => 1,
        'name' => 'Isi Ulang 19L',
        'price' => 'Rp 7.000',
        'quantity' => 2,
        'date' => '2024-06-01',
        'image' => 'img/galonisiulang.jpg',
        'description' => 'Air isi ulang RO kapasitas 19 liter.',
        'order_status' => 'Selesai', // Status pesanan
        'payment_status' => 'Lunas'  // Status pembayaran
    ],
    [
        'id' => 2,
        'name' => 'Aqua 19L',
        'price' => 'Rp 25.000',
        'quantity' => 1,
        'date' => '2024-06-03',
        'image' => 'img/aqua.jpg',
        'description' => 'Air mineral Aqua dengan kapasitas 19 liter.',
        'order_status' => 'Dalam Proses',
        'payment_status' => 'Belum Dibayar'
    ],
    [
        'id' => 3,
        'name' => 'Le Minerale 15L',
        'price' => 'Rp 20.000',
        'quantity' => 3,
        'date' => '2024-06-05',
        'image' => 'img/leminerale.jpg',
        'description' => 'Air mineral Le Minerale kapasitas 15 liter.',
        'order_status' => 'Dibatalkan',
        'payment_status' => 'Dibatalkan'
    ]
];

// Mendapatkan ID dari URL
$order_id = isset($_GET['id']) ? $_GET['id'] : 1;

// Mencari pesanan berdasarkan ID
$order = null;
foreach ($order_history as $item) {
    if ($item['id'] == $order_id) {
        $order = $item;
        break;
    }
}

// Jika pesanan tidak ditemukan, arahkan kembali ke info_pesanan.php
if ($order === null) {
    header('Location: info_pesanan.php');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .detail-item img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 10px;
        }
        .card-body {
            background-color: #343a40; 
            color: white; 
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .card-header {
            background-color: white;
            color: black; 
        }
    </style>
</head>
<body>

<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            Detail Pesanan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 detail-item">
                    <img src="<?php echo $order['image']; ?>" alt="<?php echo $order['name']; ?>">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title"><?php echo $order['name']; ?></h5>
                    <p class="card-text">Harga: <?php echo $order['price']; ?></p>
                    <p class="card-text">Jumlah: <?php echo $order['quantity']; ?></p>
                    <p class="card-text">Tanggal: <?php echo $order['date']; ?></p>
                    <p class="card-text">Status Pesanan: <?php echo $order['order_status']; ?></p>
                    <p class="card-text">Status Pembayaran: <?php echo $order['payment_status']; ?></p>
                    <p class="card-text">Deskripsi: <?php echo $order['description']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

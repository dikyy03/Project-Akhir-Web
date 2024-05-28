<?php 
// Daftar menu (contoh)
$menu_items = [
    [
        'name' => 'Isi Ulang 19L',
        'price' => 'Rp 3.000',
        'image' => 'asset/img/galonisiulang.png'
    ],
    [
        'name' => 'Isi Ulang 15L',
        'price' => 'Rp 5.000',
        'image' => 'asset/img/galonisiulang.png'
    ],
    [
        'name' => 'Aqua 19L',
        'price' => 'Rp 10.000',
        'image' => 'asset/img/aqua.jpeg'
    ],
    [
        'name' => 'Le Minerale 15L',
        'price' => 'Rp 5.000',
        'image' => 'asset/img/leminerale.jpg'
    ]
];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nab Water</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .menu-item {
            margin-bottom: 30px;
        }
        .menu-item img {
            width: 100%;
            height: 250px;
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
        .text-white {
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            Pemesanan
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($menu_items as $item): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 menu-item">
                        <div class="card mt-3">
                            <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                <p class="card-text"><?php echo $item['price']; ?></p>
                                <a href="pesan.php?item=<?php echo urlencode($item['name']); ?>" class="btn btn-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();


if (isset($_SESSION['user_id'])) {

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nab Water</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section class="container forms">
        <div class="form login" id="login-form">
            <div class="form-content">
                <header>Masuk</header>
                <form method="POST" action="proses_masuk.php">
                    <div class="field input-field">
                        <input type="text" name="email_or_username" placeholder="Email/Username" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password">
                    </div>
                    <div class="field button-field">
                        <button type="submit">Masuk</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Belum punya akun? <a href="." class="link signup-link" id="signup-link">Daftar disini</a></span>
                </div>
            </div>
        </div>

        <div class="form signup" id="signup-form">
            <div class="form-content">
                <header>Daftar</header>
                <form action="daftar.php" method="POST">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Masukkan Username" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Masukkan Email" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="text" name="no_telepon" placeholder="Masukkan No Telepon" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Buat Password" class="password">
                    </div>
                    <div class="field button-field">
                        <button type="submit">Daftar</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Sudah punya akun? <a href="." class="link login-link">Masuk disini</a></span>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>

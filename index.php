<?php 

    require_once "access.php";

    $users->read();

    // cek gpost ada gak isinya
    if($_POST){
        // cek top up harus ada
        if($_POST['saldo'] > 0){
            $users->update($_POST['saldo']);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulsa | Top-up</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="app">
        <div class="sidebar">
            <h1><i>Admin</i></h1>
            <ul>
                <li><a class="active" href="index.php">Top Up</a></li>
                <li><a href="pulsa.php">Transaksi</a></li>
                <li><a href="riwayat.php">Riwayat</a></li>
            </ul>
        </div>
        <div class="root">
            <div class="nav">
                <h2>
                    <i class="fa-solid fa-wallet" style="color: #256d85;margin-right: 10px;"></i>
                    <?= $users->rupiah($users->saldo); ?>
                </h2>
                <h3>
                    <?= $users->nama; ?>
                    <i class="fa-solid fa-user" style="color: #fff;margin-left: 10px;padding: 10px;background-color: #256d85;border-radius: 20px;"></i>
                </h3>
            </div>
            <div class="main">
                <div class="box">
                    <h2>Top Up</h2>
                    <br>
                    <form method="POST" action="index.php">
                        <input type="number" placeholder="Masukan Jumlah Uang" name="saldo">
                        <button>Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
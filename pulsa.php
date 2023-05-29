<?php 

    require_once "access.php";

    $users->read();

    // cek gpost ada gak isinya
    if($_POST){
        // cek top up harus ada
        if($_POST['nominal'] > 0){
            // update saldo
            $users->transaksi($_POST['no_kartu'], $_POST['provider'], $_POST['nominal']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulsa | Transaksi</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="app">
        <div class="sidebar">
            <h1><i>Admin</i></h1>
            <ul>
                <li><a href="index.php">Top Up</a></li>
                <li><a class="active" href="pulsa.php">Transaksi</a></li>
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
                    <h2>Pulsa</h2>
                    <br>
                    <form method="POST">
                        <input type="text" placeholder="Masukan Nomer HP" name="no_kartu">
                        <input type="number" placeholder="Masukan Jumlah Pulsa" name="nominal">
                        <br>
                        <label for="xl">XL</label>
                        <input type="radio" id="xl" value="xl" name="provider">
                        <label for="tri">3</label>
                        <input type="radio" id="tri" value="tri" name="provider">
                        <label for="m3">m3</label>
                        <input type="radio" id="m3" value="m3" name="provider">
                        <label for="tel">Telkomsel</label>
                        <input type="radio" id="tel" value="tel" name="provider">
                        <button>Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
<?php
include "fungsi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .card.greyed-out {
        background-color: gray;
    }
    </style>
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to MakassarHotels</h2>
            <p>Find the perfect room for your stay, book now, and enjoy a memorable experience!</p>
            <a href="#mains" class="btn-hero">Explore Rooms</a>
            </div>
    </section>

    <h1 style="text-align: center;">Daftar Kamar</h1>
    <!-- menampilkan data kamar -->
    <div class="room-stats" style="text-align: center; margin-bottom: 20px;">
        <p>Total Kamar: <?= count($_SESSION['kamar']); ?> </p>
        <p>Kamar Yang sudah di booking: <?= countAvailable() ?></p>
        <p>Kamar Kosong: <?= countNotAvailable() ?></p>
        <form method="POST">

            <button name="reset"> Reset </button>
        </form>
    </div>
    <div class="container" id="mains">
    <?php foreach ($_SESSION['kamar'] as $item) : ?>
    <div class="card <?= $item['status'] ? '' : 'greyed-out' ?>">
        <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>">
        <div class="card-content">
            <h3><?= $item['nama'] ?></h3>
            <p><?= $item['deskripsi'] ?></p>
            <p>Rp. <?= $item['harga'] ?></p>
            <form method="POST">
                <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                <input type="hidden" name="nama[]" value="<?= $item['nama'] ?>">
              
                <button class="btn-pesan" type="submit" name="pesan" <?= $item['status'] ? '' : 'disabled'; ?>>
                    Pesan Kamar 
                </button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
    </div>
    <footer>
  <div class="footer-content">
    <div class="footer-text">
      <h3>About Us</h3>
      <p>Hotels MaaaaKaaassaaarrrRRRrrrr!</p>
      <p>&copy; 2025 Hotel. All rights reserved.</p>
    </div>
    <div class="footer-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.664694332708!2d119.40185560944784!3d-5.157541352087754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d4363e11805%3A0x12c787d64976dbed!2sGammara%20Hotel%20Makassar!5e0!3m2!1sid!2sid!4v1736564106457!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</footer>
</body>

</html>


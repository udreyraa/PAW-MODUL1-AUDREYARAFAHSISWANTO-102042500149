<?php
$katalog = [
    [
        "nama" => "Kalung Emas Liontin",
        "kategori" => "Kalung",
        "harga" => 1850000,
        "stok" => 3
    ],
    [
        "nama" => "Cincin Kucing Lucu",
        "kategori" => "Cincin",
        "harga" => 2400000,
        "stok" => 2
    ],
    [
        "nama" => "Gelang Chain",
        "kategori" => "Gelang",
        "harga" => 450000,
        "stok" => 8
    ],
    [
        "nama" => "Anting Loop Mutiara",
        "kategori" => "Anting",
        "harga" => 320000,
        "stok" => 12
    ],
    [
        "nama" => "Bros Hijab Lily",
        "kategori" => "Bros",
        "harga" => 150000,
        "stok" => 0
    ],
    [
        "nama" => "Jepit Rambut Curl",
        "kategori" => "Aksesoris Rambut",
        "harga" => 85000,
        "stok" => 0
    ]
];

$jumlah_item = count($katalog);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Jewelry & Accessories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="app-layout">
        <aside class="sidebar-panel">
            <div class="top-content">
                <div class="brand-header">
                    <span class="store-badge">Official Store</span>
                    <h1>Cia Store</h1>
                    <span class="sub-brand">Jewelry & Fine Accessories</span>
                </div>

                <div class="hero-box">
                    <h2>Koleksi Perhiasan</h2>
                    <p>Eksplorasi ragam aksesoris elegan untuk menyempurnakan penampilan harianmu.</p>
                </div>

                <div class="info-card">
                    <span class="info-title">Penawaran Spesial</span>
                    <p class="info-desc">Diskon 10% otomatis untuk setiap produk dengan harga di atas Rp 1.000.000.</p>
                </div>

                <div class="stat-card">
                    <span class="stat-label">Total Jenis Barang</span>
                    <span class="stat-value"><?php echo $jumlah_item; ?> Item</span>
                </div>
            </div>
        </aside>

        <!-- KONTEN UTAMA / PANEL KANAN -->
        <main class="content-panel">
            <div class="section-title">
                <div>
                    <h3>Katalog Produk Cia Store</h3>
                    <p class="section-sub">Daftar koleksi perhiasan dan aksesoris eksklusif terbaru</p>
                </div>
            </div>

            <div class="catalog-grid">
                <?php foreach ($katalog as $row): ?>
                    <?php 
                        $is_promo = false;
                        $harga_bayar = $row['harga'];

                        if ($row['harga'] >= 1000000) {
                            $is_promo = true;
                            $harga_bayar = $row['harga'] - ($row['harga'] * 0.1);
                        }
                    ?>

                    <div class="product-item">
                        <div class="card-header">
                            <span class="cat-badge"><?php echo $row['kategori']; ?></span>
                            <?php if ($is_promo): ?>
                                <span class="promo-badge">DISKON 10%</span>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <h4 class="product-name"><?php echo $row['nama']; ?></h4>
                            <div class="price-box">
                                <?php if ($is_promo): ?>
                                    <span class="old-price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                                <?php endif; ?>
                                <span class="main-price">Rp <?php echo number_format($harga_bayar, 0, ',', '.'); ?></span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="stock-status">
                                <span class="stock-text">Stok: <?php echo $row['stok']; ?></span>
                                <?php if ($row['stok'] > 0): ?>
                                    <span class="status-pill status-available">Tersedia</span>
                                <?php else: ?>
                                    <span class="status-pill status-empty">Habis</span>
                                <?php endif; ?>
                            </div>

                            <?php if ($row['stok'] > 0): ?>
                                <button class="action-btn">Beli</button>
                            <?php else: ?>
                                <button class="action-btn" disabled>Habis</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

</body>
</html>
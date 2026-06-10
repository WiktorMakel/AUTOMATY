<?php
session_start();

$products = [
    ["name" => "Filtr oleju", "price" => 129.99, "img" => "img1.jpg"],
    ["name" => "Zestaw sprzęgła", "price" => 1299.99, "img" => "img2.jpg"],
    ["name" => "Elektrozawór", "price" => 459.99, "img" => "img3.jpg"],
    ["name" => "Uszczelka miski", "price" => 89.99, "img" => "img4.jpg"],
    ["name" => "Olej ATF", "price" => 199.99, "img" => "img5.jpg"],
    ["name" => "Konwerter momentu", "price" => 899.99, "img" => "img6.jpg"],
    ["name" => "Czujnik skrzyni", "price" => 249.99, "img" => "img7.jpg"],
    ["name" => "Miska olejowa", "price" => 159.99, "img" => "img8.jpg"],
];

?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css?v=999">
<title>Części</title>
</head>

<body>
<header class="navbar">
    <div class="logo">
        ⚙ <strong>AutoTrans Pro</strong>
    </div>

    <nav>
        <a href="index.php">Strona Główna</a>
        <a href="czesci.php" class="active">Części</a>
        <a href="naprawa.php">Naprawa</a>
        <a href="skrzynie.php">Skrzynie</a>
        <a href="#">Kontakt</a>
    </nav>

    <div class="cart">
        🛒 Koszyk (0)
    </div>
</header>

<section class="page-header">
    <h1>Części Zamienne</h1>
    <p>Szeroki wybór oryginalnych i zamiennikowych części do automatycznych skrzyń biegów</p>
</section>

<section class="shop-bar">

    <input type="text" placeholder="Szukaj części po nazwie, marce lub kompatybilności...">

    <select>
        <option>Wszystkie</option>
        <option>OEM</option>
        <option>Genuine</option>
        <option>Bosch</option>
    </select>

</section>

<section class="products">

    <p class="count">Znaleziono 8 produktów</p>

    <div class="grid">

        <?php foreach($products as $p): ?>

        <div class="product-card">

            <div class="img"></div>

            <h3><?= $p["name"] ?></h3>

            <p class="price"><?= $p["price"] ?> zł</p>

            <button>Dodaj do koszyka</button>

        </div>

        <?php endforeach; ?>

    </div>

</section>

</body>
</html>
<?php
    // Memanggil file function.php
    require 'function.php';

    // Memanggil function database pada file function.php
    $foods = database();

    // Membuat variabel config untuk menampung path atau folder db.json
    $config = "../config/db-food.json";
    // Membuat variabel data json untuk menampilkan isi file yang ada di data json
    $dataJson = file_get_contents($config);
    // Mengubah string json menjadi array atau object php
    $foods = json_decode($dataJson, true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
    <link rel="stylesheet" href="../css/style.css">

    <meta name='viewport' content='widhth-device-widhth, initial-scale=1'>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <header>
        <a href="#" class="logo">Food App</a>
        <nav class="navbar">
            <a href="../index.php" >Home</a>
            <a href="detail-food.php" class="active">Food</a>
            <a href="hitung-calories.php" >Calories Calculator</a>
            <a href="bmi.php" >BMI Calculator</a>
            <a href="add-food.php" >Add Food</a>
        </nav>
    </header>


    <main id="main">

    <?php for($i = 0; $i < count($foods); $i++) : ?>
        <div class="food">
            <img src="../img/<?= $foods[$i]["gambar"]; ?>" alt="image">

            <div class="food-info">
                <h3><?= $foods[$i]["nama"]; ?></h3>
                <span class="red"><?= $foods[$i]["calories"]; ?></span>
            </div>

            <div class="date">
                <h4><?= $foods[$i]["foodType"]; ?></h4>
            </div>

            <div class="overview">
                <h1 class="">Overview</h1>
                <?= $foods[$i]["desc"]; ?>
            </div>
        </div>
    <?php endfor; ?>

        
    </main>

    <!-- Footer -->
    <div class="footer">
        <h2>Food App</h2>
        <p class="comment">Let's connect with each other through the platforms below.</p>
        <div class="social">
            <a href="https://web.facebook.com/profile.php?id=100027903549702"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/wisnu_sapt/"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.link/y6tk70"><i class="fab fa-whatsapp"></i></a>
        </div>
 
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <p><a href="">Wisnu Saputra</a>. © 2022</p>
    </div>
    <script src="script.js"></script>
</body>
</html>
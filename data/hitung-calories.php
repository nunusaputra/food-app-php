<?php
    // Memanggil file function.php
    require 'function.php';
    // Memanggil function database pada file function.php
    $totalCalories = database();
    // Membuat variabel config untuk menampung path atau folder db.json
    $config = "../config/db-food.json";
    // Membuat variabel data json untuk menampilkan isi file yang ada di data json
    $dataJson = file_get_contents($config);
    // Mengubah string json menjadi array atau object php
    $foods = json_decode($dataJson, true);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.index.css">
  </head>
  <body>
    
  <header class="header">
        <h1>Food App</h1>

        <nav class="navbar">
            <a href="../index.php">Home</a>
            <a href="detail-food.php" style="--i:2;">Food</a>
            <a href="hitung-calories.php" class="active" style="--i:3;">Calories Calculator</a>
            <a href="bmi.php" style="--i:4;">BMI Calculator</a>
            <a href="add-food.php" style="--i:5;">Add Food</a>
        </nav>
    </header>

    <section class="home">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>Check Your <span>Calories</span></h2>
                        <p>Enter your weight and height below to check your BMI result</p>
                    <form action="data-calories.php" method="post">
                        <div class="mb-3 col-sm-8">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="nama" class="form-control" id="nama" name="nama">
                        </div>
                       <!--  -->
                        <!-- Membuat form input untuk nama bandara asal -->
                        <div class="mb-3">
                            <label for="food-1" class="col-sm-2 col-form-label">Food 1</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" name="food-1" require>
                                    <?php for($i = 0; $i < count($foods); $i++) : ?>
                                        <option value="<?= $foods[$i]["calories"] ?>"><?= $foods[$i]["nama"] ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                       <!--  -->
                       <div class="mb-3">
                            <label for="food-2" class="col-sm-2 col-form-label">Food 2</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" name="food-2">
                                    <?php foreach ($foods as $food) : ?>
                                        <option value="<?= $food["calories"] ?>"><?= $food["nama"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--  -->
                        <div class="mb-3">
                            <label for="food-3" class="col-sm-2 col-form-label">Food 3</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="food-3">
                                    <?php foreach ($foods as $food) : ?>
                                        <option value="<?= $food["calories"] ?>"><?= $food["nama"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Calculate BMI</button>
                    </form>
                    </div>
                </div>
            </div>

            <div class="home-img">
                <img src="../img/geprek.png" alt="">
            </div>  
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
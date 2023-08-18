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
            <a href="hitung-calories.php" style="--i:3;">Calories Calculator</a>
            <a href="bmi.php" class="active" style="--i:4;">BMI Calculator</a>
            <a href="add-food.php" style="--i:5;">Add Food</a>
        </nav>
    </header>

    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Check Your <span>BMI</span></h2>
                    <p>Enter your weight and height below to check your BMI result</p>
                <form action="data-bmi.php" method="post">
                    <div class="mb-3 col-sm-8">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="nama" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3 col-sm-8">
                        <label for="tinggi-badan" class="form-label">Tinggi Badan</label>
                        <input type="number" class="form-control" id="tinggi-badan" name="tinggi-badan">
                    </div>
                    <div class="mb-3 col-sm-8">
                        <label class="form-label" for="berat-badan">Berat Badan</label>
                        <input type="number" class="form-control" id="berat-badan" name="berat-badan">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Calculate BMI</button>
                </form>
                </div>
            </div>
        </div>

        <div class="home-img">
                <img src="../img/olahraga2.png" alt="">
        </div>  
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
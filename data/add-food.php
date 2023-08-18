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
            <a href="bmi.php" style="--i:4;">BMI Calculator</a>
            <a href="add-food.php" class="active" style="--i:5;">Add Food</a>
        </nav>
  </header>

  <section class="home">
    <div class="container mt-3">
      <div class="row">
          <div class="col-md-6">
              <h2>Food <span>Calories</span></h2>
              <form method="post" action="data-food.php" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">Food Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="mb-3">
                    <label for="food-type" class="form-label fw-bold">Food Type</label>
                    <input type="text" class="form-control" id="email" name="food-type" required>
                  </div>
                  <div class="mb-3">
                    <label for="calories" class="form-label fw-bold">Calories</label>
                    <input type="number" class="form-control" id="calories" name="calories" required>
                  </div>
                  <div class="mb-3">
                      <label for="desc" class="form-label fw-bold">Description</label>
                      <textarea class="form-control" placeholder="Leave a description here" name="desc" id="desc" style="height: 100px"></textarea>
                  </div>
                  <div class="input-group mb-3">
                      <input type="file" class="form-control" id="gambar" name="gambar">
                  </div>
                  <button type="submit" class="btn btn-success" name="submit">Add Food</button>          
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
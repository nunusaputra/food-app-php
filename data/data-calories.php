<?php

    // Memanggil file function.php
    require 'function.php';
    
    // Membuat fungsi database 
    $config = "../config/db-calories.json";
    // Membuat sebuah array kosong untuk menyimpan data yang di inputkan oleh user
    $totalCalories = [];
    // Membuat variabel data json untuk menampilkan isi file yang ada di data json
    $dataJson = file_get_contents($config);
    // Mengubah string json menjadi array atau object php
    $totalCalories = json_decode($dataJson, true);
    
    // Menampung seluruh hasil inputan user
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $tanggal = date("l, d-m-y");
        $food1 = $_POST["food-1"];
        $food2 = $_POST["food-2"];
        $food3 = $_POST["food-3"];
        $sumCalories = sumCalories($food1, $food2, $food3);
        $status = statusCalories($sumCalories);
        
        // Menampung seluruh inputan user kedalam array sementara
        $newCalories = [
            "nama" => $nama,
            "tanggal" => $tanggal,
            "food1" => $food1,
            "food2" => $food2,
            "food3" => $food3,
            "sumCalories" => $sumCalories,
            "status" => $status,
        ];
        
        // Memasukan array baru kedalam array rute penerbangan
        array_push($totalCalories, $newCalories);
        // Melakukan fungsi sort untuk mengurutkan data secara ascending dari yang terkecil hingga terbesar
        array_multisort($totalCalories, SORT_ASC);
        // Mengubah data menjadi json
        $dataJson = json_encode($totalCalories, JSON_PRETTY_PRINT);
        // Menulis data json kedalam file
        file_put_contents($config, $dataJson);
    }
        
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
      <div class="container mt-3">
          <div class="row">
              <div class="col-md-10">
                  <h2>Data Calories</h2>
                  <a href="hitung-calories.php" class="btn btn-primary">&laquo; Hitung Calories</a>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Date</th>
                          <th scope="col">Calories 1</th>
                          <th scope="col">Calories 2</th>
                          <th scope="col">Calories 3</th>
                          <th scope="col">Total Calories</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <?php if(count($totalCalories) === 0 ) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger fw-bold" role="alert">
                                        Tidak ada data yang tersimpan! <br> <a href="hitung-calories.php" class="alert-link fw-normal">&laquo; Back to Calories Calculator</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                          <?php for($i = 0; $i < count($totalCalories); $i++) : ?>
                              <tr>
                                <th scope="row"><?=  $i + 1 ?></th>
                                <td><?= $totalCalories[$i]["nama"]; ?></td>
                                <td><?= $totalCalories[$i]["tanggal"]; ?></td>
                                <td><?= $totalCalories[$i]["food1"]; ?></td>
                                <td><?= $totalCalories[$i]["food2"]; ?></td>
                                <td><?= $totalCalories[$i]["food3"]; ?></td>
                                <td><?= $totalCalories[$i]["sumCalories"]; ?></td>
                                <td><?= $totalCalories[$i]["status"]; ?></td>
                                
                              </tr>
                              <tr>      
                          <?php endfor; ?>
                      </tbody>
                    </table>
              </div>
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
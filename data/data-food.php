<?php

    // Memanggil file function.php
    require 'function.php';

    // Memanggil function database pada file function.php
    $foods = database();

    // Membuat fungsi database 
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
  </head>
  <body>
    
      <div class="container mt-3">
          <div class="row">
              <div class="col-md-8">
                  <h2>Data Food Calories</h2>
                  <a href="add-food.php" class="btn btn-primary">&laquo; Add Food Calories</a>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Food</th>
                          <th scope="col">Food Type</th>
                          <th scope="col">Calories</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <?php if(count($foods) === 0 ) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger fw-bold" role="alert">
                                        Tidak ada data yang tersimpan! <br> <a href="add-food.php" class="alert-link fw-normal">&laquo; Back to Food Calories Form</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                          <?php for($i = 0; $i < count($foods); $i++) : ?>
                              <tr>
                                <th scope="row"><?=  $i + 1 ?></th>
                                <td><?= $foods[$i]["nama"]; ?></td>
                                <td><?= $foods[$i]["foodType"]; ?></td>
                                <td><?= $foods[$i]["calories"]; ?></td>
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
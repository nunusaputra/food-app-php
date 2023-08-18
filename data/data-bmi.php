<?php

    // Memanggil file function.php
    require 'function.php';

    // Membuat fungsi database 
    $config = "../config/db.json";
    // Membuat sebuah array kosong untuk menyimpan data yang di inputkan oleh user
    $bmi = [];

    // Membuat variabel data json untuk menampilkan isi file yang ada di data json
    $dataJson = file_get_contents($config);
    // Mengubah string json menjadi array atau object php
    $bmi = json_decode($dataJson, true);

    // Menampung seluruh hasil inputan user
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $tanggal = date("l, d-m-y");
        $tinggiBadan = $_POST["tinggi-badan"];
        $beratBadan = $_POST["berat-badan"];
        $totalBMI = totalBMI($beratBadan, $tinggiBadan);
        $status = status($totalBMI);

        // Menampung seluruh inputan user kedalam array sementara
        $newBmi = [
            "nama" => $nama,
            "tanggal" => $tanggal,
            "tinggiBadan" => $tinggiBadan,
            "beratBadan" => $beratBadan,
            "totalBMI" => $totalBMI,
            "status" => $status,
        ];

        // Memasukan array baru kedalam array rute penerbangan
        array_push($bmi, $newBmi);
        // Melakukan fungsi sort untuk mengurutkan data secara ascending dari yang terkecil hingga terbesar
        array_multisort($bmi, SORT_ASC);
        // Mengubah data menjadi json
        $dataJson = json_encode($bmi, JSON_PRETTY_PRINT);
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
              <div class="col-md-8">
                  <h2>Data BMI</h2>
                  <a href="bmi.php" class="btn btn-primary">&laquo; Hitung BMI</a>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Date</th>
                          <th scope="col">Height</th>
                          <th scope="col">Weight</th>
                          <th scope="col">BMI Result</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <?php if(count($bmi) === 0 ) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger fw-bold" role="alert">
                                        Tidak ada data yang tersimpan! <br> <a href="bmi.php" class="alert-link fw-normal">&laquo; Back to BMI Calculator</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                          <?php for($i = 0; $i < count($bmi); $i++) : ?>
                              <tr>
                                <th scope="row"><?=  $i + 1 ?></th>
                                <td><?= $bmi[$i]["nama"]; ?></td>
                                <td><?= $bmi[$i]["tanggal"]; ?></td>
                                <td><?= $bmi[$i]["tinggiBadan"]; ?></td>
                                <td><?= $bmi[$i]["beratBadan"]; ?></td>
                                <td><?= $bmi[$i]["totalBMI"]; ?></td>
                                <td><?= $bmi[$i]["status"]; ?></td>
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
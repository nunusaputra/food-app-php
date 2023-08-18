<?php
    // Membuat fungsi database 
    function database() {
        // Membuat variabel config untuk menampung path atau folder db.json
        $config = "../config/db-food.json";
        // Membuat sebuah array kosong untuk menyimpan data yang di inputkan oleh user
        $foods = [];

        // Membuat variabel data json untuk menampilkan isi file yang ada di data json
        $dataJson = file_get_contents($config);
         // Mengubah string json menjadi array atau object php
        $foods = json_decode($dataJson, true);

        // Menampung seluruh hasil inputan user
        if (isset($_POST["submit"])) {
            $namaFood = $_POST["nama"];
            $foodType = $_POST["food-type"];
            $calories = $_POST["calories"];
            $desc = $_POST["desc"];
            $gambar = upload();

            if (!$gambar) {
                return false;
            }

            // Menampung seluruh inputan user kedalam array sementara
            $newFoods = [
                "nama" => $namaFood,
                "foodType" => $foodType,
                "calories" => $calories,
                "desc" => $desc,
                "gambar" => $gambar,
            ];

            // Memasukan array baru kedalam array rute penerbangan
            array_push($foods, $newFoods);
            // Melakukan fungsi sort untuk mengurutkan data secara ascending dari yang terkecil hingga terbesar
            array_multisort($foods, SORT_ASC);
            // Mengubah data menjadi json
            $dataJson = json_encode($foods, JSON_PRETTY_PRINT);
            // Menulis data json kedalam file
            file_put_contents($config, $dataJson);
        }
    }

    function upload() {
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if( $error === 4) {
            echo "<script>
                    alert('Masukan gambar terlebih dahulu!');
                    document.location.href = 'add-food.php';
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if( !in_array($ekstensigambar, $ekstensigambarvalid)) {
            echo "<script>
                    alert('Yang anda upload bukan gambar!');
                    document.location.href = 'add-food.php';
                </script>";
        }

        // cek jika ukurannya terlalu besar
        if( $ukuranfile > 1000000 ) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                    document.location.href = 'add-food.php';
                </script>";
        }

        // gambar siap diupload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        move_uploaded_file( $tmpname, '../img/' . $namafilebaru);

        return $namafilebaru;
    }

    // Membuat sebuah fungsi untuk menjumlahkan kalori dari beberapa makanan
    function sumCalories($food1, $food2, $food3) {
        // memanggil variabel food1, food2, food3 
        global $food1, $food2, $food3;

        // menjumlahkan variabel food1 - food3 yang diterima dari paramater dan dimasukan kedalam variabel total
        $total = $food1 + $food2 + $food3;

        // mengembalikan nilai total
        return $total;
    }

    // Membuat fungsi status calories
    function statusCalories($sumCalories) {
        // Memanggil variabel sumCalories
        global $sumCalories;

        // Melakukan pengkondisian terhadap nilai yang diterima dari parameter sumCalories
        if ($sumCalories >= 2400) {
            $status = "<a href='#' class='btn btn-danger badge rounded-pill'>Over Calories</a>";
        } else if ($sumCalories < 2400) {
            $status = "<a href='#' class='btn btn-success badge rounded-pill'>Normal Calories</a>";
        } else {
            $status = "<a href='#' class='btn btn-secondary badge rounded-pill'>Unknow Calories</a>";
        }

        // Mengembalikan nilai status
        return $status;
    }

    // Membuat fungsi totalBMI untuk menghitung berat badan ideal
    function totalBMI($beratBadan, $tinggiBadan) {
        // Memanggil variabel berat badan dan tinggi badan
        global $beratBadan, $tinggiBadan;
        // Melakukan perhitungan berdasarkan rumus yang sudah ditentukan, kemudian memasukan kedalam variabel result
        $result = ($beratBadan / (($tinggiBadan*$tinggiBadan)/10000));
        // Melakukan format terhadap hasil perhitungan agar hasil yang diterima sesuai dengan kondisi yang diinginkan
        $formatResult = sprintf("%.2f", $result);

        // Mengembalikan nilai format result
        return $formatResult;
    }

    // Membuat fungsi status 
    function status($totalBMI) {
        // Memanggil variabel total BMI
        global $totalBMI;

        // Melakukan Pengkondisian berdasarkan nilai dari parameter yang diterima
        if ($totalBMI < 18.5) {
            $status = "<a href='#' class='btn btn-secondary badge rounded-pill'>Underweight</a>";
        } else if ($totalBMI >= 18.5 && $totalBMI <= 24.9) {
            $status = "<a href='#' class='btn btn-success badge rounded-pill'>Normal Weight</a>";
        } else if ($totalBMI >= 25 && $totalBMI <= 29.9) {
            $status = "<a href='#' class='btn btn-warning badge rounded-pill'>Over Weight</a>";
        } else {
            $status = "<a href='#' class='btn btn-danger badge rounded-pill'>Obesity</a>";
        }

        // mengembalikan nilai status
        return $status;

    }


?>
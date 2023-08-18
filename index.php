<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Group-logo.svg" type="image/x-icon">
    <title>Food App</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style.index.css">
</head>
<body>
    
    <header class="header">
        <h1>Food App</h1>

        <nav class="navbar">
            <a href="index.php" style="--i:1;" class="active">Home</a>
            <a href="./data/detail-food.php" style="--i:2;">Food</a>
            <a href="./data/hitung-calories.php" style="--i:3;">Calories Calculator</a>
            <a href="./data/bmi.php" style="--i:4;">BMI Calculator</a>
            <a href="./data/add-food.php" style="--i:5;">Add Food</a>
        </nav>
    </header>

    <section class="home">
        <div class="home-content">
            <h3>Health Is The Best<span> For You</span></h3>
            <h1><span>FOOD</span> CALORIES APP</h1>
            <h3>And We Provide <span class="multiple-text"></span></h3>
            <p>The "Food Calories" application is a tool designed to assist users in calculating and monitoring their daily calorie intake based on the food they consume.</p>
            
            <div class="social-media">
                <a href="https://web.facebook.com/profile.php?id=100027903549702" style="--i:7;"><i class='bx bxl-facebook'></i></a>
                <a href="https://www.instagram.com/wisnu_sapt/?hl=id" style="--i:8;"><i class='bx bxl-instagram-alt' ></i></a>
                <a href="https://github.com/nunusaputra" style="--i:9;"><i class='bx bxl-github' ></i></a>
                <a href="https://www.linkedin.com/in/wisnu-saputra-a61068247/" style="--i:10;"><i class='bx bxl-linkedin' ></i></a>
            </div>
            <a href="./data/detail-food.php" class="btn-see">Food List</a>
            <a href="./data/bmi.php" class="btn-download">BMI Calculator</a>
        </div>

        <div class="home-img">
            <img src="./img/salad2.png" alt="">
        </div>  
    </section>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="./script/index.js"></script>
</body>
</html>
<?php
require './config/meta__info.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_INFO['title'];?></title>
    <meta name="title" content="<?php echo $_INFO['title']; ?>">
    <meta name="description" content="<?php echo $_INFO['meta description']; ?>">
    <meta name="keywords" content="<?php echo $_INFO['meta tags']; ?>">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" href="./vendor/swiperjs/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <?php

    if (file_exists(dirname(__FILE__) . "./components/header.php")) {
        include_once dirname(__FILE__) . "./components/header.php";
    }
    if (file_exists(dirname(__FILE__) . "./components/slider.php")) {
        include_once dirname(__FILE__) . "./components/slider.php";
    }

    ?>
    
    <script src="./vendor/fontawesome/font-awesome.js"></script>
    <script src="./vendor/swiperjs/swiper-bundle.min.js"></script>
    <script src="./assets/js/slider.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./vendor/bootstrap/js/popper.min.js"></script>
</body>
</html>
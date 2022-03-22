<!DOCTYPE html>
<!--Code by Divinector (www.divinectorweb.com)-->
<html lang="en">

<head>
    <title>Home</title>
    <link rel="icon" href="https://kalam.ump.edu.my/pluginfile.php/1/theme_boost_campus/favicon/1638680463/favicon%20%281%29%20%281%29%20%281%29.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(15, 1fr);
            grid-template-rows: repeat(8, 5vw);
            grid-gap: 15px;
        }

        .gallery__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery__item--0 {
            margin-top: 15px;
            grid-column-start: 1;
            grid-column-end: 15;
            grid-row-start: 1;
            grid-row-end: 1;
        }

        .gallery__item--1 {
            grid-column-start: 1;
            grid-column-end: 7;
            grid-row-start: 2;
            grid-row-end: 5;
        }

        .gallery__item--2 {
            grid-column-start: 7;
            grid-column-end: 15;
            grid-row-start: 2;
            grid-row-end: 5;
        }

        .gallery__item--3 {
            grid-column-start: 1;
            grid-column-end: 5;
            grid-row-start: 5;
            grid-row-end: 8;
        }

        .gallery__item--4 {
            grid-column-start: 5;
            grid-column-end: 10;
            grid-row-start: 5;
            grid-row-end: 8;
        }

        .gallery__item--5 {
            grid-column-start: 10;
            grid-column-end: 15;
            grid-row-start: 5;
            grid-row-end: 8;
        }
    </style>

</head>

<body>
    <div class="staffloginbackground" style="height: 110vh;">
        <?php
        session_start();
        include 'includes/header.php';
        ?>

        <div class="container">
            <div class="gallery">
                <div class="gallery__item gallery__item--0">
                    <h1 class="text-center">SELECT COURIER:</h1>
                </div>
                <div class="gallery__item gallery__item--1">
                    <a href="UMP_TrackingPL.php"><img src="assets/poslaju.png" alt="poslaju" class="gallery__img"></a>
                </div>
                <div class="gallery__item gallery__item--2">
                    <a href="UMP_Tracking.php"><img src="assets/jnt.png" alt="jnt" class="gallery__img"></a>
                </div>
                <div class="gallery__item gallery__item--3">
                    <a href="ump_TrackingDHL.php"><img src="assets/dhl.png" alt="dhl" class="gallery__img"></a>
                </div>
                <div class="gallery__item gallery__item--4">
                    <a href="UMP_TrackingS.php"><img src="assets/shopee.png" alt="shopee" class="gallery__img"></a>
                </div>
                <div class="gallery__item gallery__item--5">
                    <a href="UMP_TrackingCT.php"><img src="assets/citylink.png" alt="citylink" class="gallery__img"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
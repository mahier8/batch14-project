<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐤 School Portal 🐤</title>
    <script src="https://kit.fontawesome.com/9cb80c9d72.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/styles/style.css">
    <script src="https://kit.fontawesome.com/9cb80c9d72.js" crossorigin="anonymous"></script>
    <?= $style;?>
</head>
<body>
    <!-- navbar, the blue banner on every page with 100% width-->
    <nav>
        <div id="bannerBackground">
            <img id="duckLogo" src="./public/images/duckLogo.jpg" alt="duckLogo" title="hamburger, the portal logo">
            <div>Hamburger's Portal</div>
        </div>
    </nav>

    <div id="mainContainer">
        <?php include("./view/login.php");?>
        <?= $content; ?>
    </div>
    <footer>
        <div id="leftFooterDiv">Copyright © 2021 LeHamburger</div>
        <div>IS Biz Tower 2 #1101, 23 Seonyu-ro 49-gil, Yeongdeungpo-gu, Seoul, South Korea</div>
    </footer>
<script src="./public/js/main.js"></script>
<script src="./public/js/userProfile.js"></script>
<script src="./public/js/userView.js"></script>
</body>
</html>
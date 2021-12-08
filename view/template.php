<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Portal</title>
    <script src="https://kit.fontawesome.com/9cb80c9d72.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/styles/style.css">
    <?= $style ?>
</head>
<body>
    <!-- add the navbar, banner -->
    <div id="banner">
        <img id="duckLogo" src="../public/images/duckLogo.png" alt="duckLogo" title="hamburger, the portal logo">
    </div>

    <div id="mainContainer">
        <!--  add the sidebar, mahier's login -->
        
        <?= $content; ?>
    </div>

     <!-- add the footer, footer -->
     <div id="footer">

     </div>
</body>
</html>

<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/landing.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>
<div id="landingBackgroundImage">
    <div id="landingBanner">
        <img id="duckLogo" src="../public/images/duckLogo.png" alt="duckLogo" title="hamburger, the portal logo">
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
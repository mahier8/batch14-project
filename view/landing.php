
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/landing.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>
<div>
    
</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
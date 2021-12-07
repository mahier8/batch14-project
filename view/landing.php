<?php ob_start();?>

<div>Whatever landing page</div>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>
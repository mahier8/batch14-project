<?php $title = "Error!"; ?>
<?php ob_start();?>
    <div>Sorry an Error occured</div>
    <div>Message : <?= $msg;?></div>
    <div>Please contact an administrator for further informations</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
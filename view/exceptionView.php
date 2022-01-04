<?php $title = "Exception!"; ?>
<?php ob_start();?>
    <div class="exception">
        <div>Sorry an exception occured</div>
        <div>Message : <?= $msg;?></div>
        <div>Code : <?= $code;?></div>
        <div>File : <?= $file;?></div>
        <div>Line : <?= $line;?> </div>
    </div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?> 

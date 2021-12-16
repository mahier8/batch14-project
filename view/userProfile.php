<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php $style = ob_get_clean();?>



<?php ob_start();?>
<div id="wrapper">
    <h1><?= $user['firstName'] . " " . $user['lastName'];?></h1>
    <div id="profilePic">
        <?php 
    
        echo '<img src="./private/profilePics/'.($user['imagePath']) . '?<=rand(1,32000)?>">';

        ?>
    </div>

<!-- Try this code:
https://stackoverflow.com/questions/16526363/php-force-refresh-image -->


    <form action="index.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="fileToUpload">
        <input type="hidden" name="action" value="uploadImg">
        <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
        <input type="submit" value="Upload Image" name="submit">
    </form>


    <div id = "dob">
        Date of Birth: <?= htmlspecialchars($user['dob']);?>
    </div>
    <div id = "email">
        Email Address: <?= htmlspecialchars($user['email']);?>
    </div>
    <div id = "address">
        Address: <?= htmlspecialchars($user['address']);?>
    </div>
    <div id = "phone">
        Phone Number: <?= htmlspecialchars($user['phoneNumber']);?>
    </div>
    <div id = "emergency">
        Emergency Contact: <?= htmlspecialchars($user['emergency']);?>
    </div>
    <div id = "courses">
        Courses:
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
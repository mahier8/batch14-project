
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>
<div id="wrapper">
    <h1>
        <?= $user['firstName'] . " " . $user['lastName'];?>
    </h1>
    <div id="profilePic">
        <?php 
        echo '<img src="'. $user['imagePath'] . '">';
        ?>
    </div>
    <!-- <form action="./view/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form> -->

    <div id = "id">
        User ID: <?= htmlspecialchars($user['id']);?>
    </div>
    <div id = "password">
        Password: <?= htmlspecialchars($user['password']);?>
    </div>
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
        Courses: <?= htmlspecialchars($user['courses']);?>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
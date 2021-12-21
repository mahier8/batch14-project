
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php $style = ob_get_clean();
 ob_start();

 ?>
<div id="wrapper">

    <div id="profileImg">

    <img src="./private/profilePics/<?php echo ($_SESSION['imagePath']) ; ?>">
    </div>

    <form action="index.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="fileToUpload">
        <input type="hidden" name="action" value="uploadImg">
        <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <div id="profileInfor">
      
        <div id = "id">
        
        <?php if(!isset($_SESSION['userName'])):
            header("Location:index.php");
            
        ?>
            
      
        <?php else:?>
        <div id = "dob">
               
        Date of Birth: <?= htmlspecialchars($_SESSION['dob']);?>
        </div>
        <div id = "email">
            Email Address: <?= htmlspecialchars($_SESSION['email']);?>
        </div>
        <div id = "address">
            Address: <?= htmlspecialchars($_SESSION['address']);?>
        </div>
        <div id = "phone">
            Phone Number: <?= htmlspecialchars($_SESSION['phoneNumber']);?>
        </div>
        <div id = "emergency">
            Emergency Contact: <?= htmlspecialchars($_SESSION['emergency']);?>
        </div>
        <div id = "courses">
            Courses:
        </div>
   
    <?php endif; ?>
    <h3>Change Password</h3>
        <div id="inputDiv">
            <input type="password" name="oldpassword" placeholder="old Password">
            <br>
            <br>
            <input type="password" name="newPassword" placeholder="New Password">
            <br>
            <br>
            <input type="password" name="rePassword" placeholder="confirm Password">
            <br>
            <br>
        </div>
        <input type="submit" value="Change Password" class="button">
    </div>
</div>


<?php $content = ob_get_clean();?>
<?php require("template.php");?>
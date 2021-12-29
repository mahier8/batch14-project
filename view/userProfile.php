
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php 
    $style = ob_get_clean();
    ob_start();
?>

<?php ob_start();?>
<div id="wrapper">
    <h1><?= ucfirst($userProf['firstName']) . " " . ucfirst($userProf['lastName']);?></h1>
    <div id="profileImg">
        <?php 
        echo '<img src="./private/profilePics/'. $userProf['imagePath'] . '">' ?>
    </div>
    

    <form action="index.php" id="upload" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" class="btn" name="image" id="fileToUpload">
        <input type="hidden" name="action" value="uploadImage">
        <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
        <input type="submit" class="blueStyle btn" value="Upload Image" name="submit">
    </form>

    <div id="profileInfor">

        <div id = "courses">
            Courses:
        </div>
            <div id = "dob">
            Date of Birth: <?= htmlspecialchars($userProf['dob']);?>
        </div>
        <div id = "email">
            Email Address: <?= htmlspecialchars($userProf['email']);?>
        </div>
        <div id = "address">
            Address: <?= htmlspecialchars($userProf['address']);?>
        </div>
        <div id = "phone">
            Phone Number: <?= htmlspecialchars($userProf['phoneNumber']);?>
        </div>
        <div id = "emergency">
            Emergency Contact: <?= htmlspecialchars($userProf['emergency']);?>
        </div>
        <div id = "courses">
            Courses:
        </div>

      
    <div id="form">
      
       <div id='inputNone'>
            <p id="error"></p>
            <form action="index.php" method="POST" id="form">
        
                <input type="hidden"  name="action" value="updatePassword">
                <!-- <input type="hidden"  name="updatePassword"> -->
                <input type="hidden" name="userId" value="<?= $_SESSION['userId']; ?>">
            
                <input type="password" id="oldPassword" name="oldPassword" placeholder="Curent Password&emsp;&emsp;&emsp;&emsp;&emsp;&#xf06e">
                <br>
                <br>
                <input type="password" id="newPassword" name="newPassword" placeholder="New Password&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#xf06e">
                <br>
                <br>
                <input type="password" id="rePassword" name="rePassword" placeholder="Password Comfirmation&emsp;&emsp;&#xf06e">
                <br>
                <br>
                <button type="submit" id="submitButton" name="submit">Submit</button>

            </form>
        
        </div>
      
        <button id='changeButton'>Change Password</button>
    </div>

</div>
<script src="./public/js/userProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>

<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php 
    $style = ob_get_clean();
    ob_start();
?>

   
     
        <?php if(!isset($_SESSION['userName'])):
            header("Location:index.php");
        ?>
            
        <?php else:?>
<div id="wrapper">

    <div id="profileInfor">
  
        <div id="profileImg">
            <img src="./private/profilePics/<?php echo ($_SESSION['imagePath']) ; ?>">
            <input type="file" >
        </div>

        <!-- <form action="index.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="image" id="fileToUpload">
            <input type="hidden" name="action" value="uploadImg">
            <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
            <input type="submit" value="Upload Image" name="submit">
        </form> -->

  
        <p>Date of Birth :  <?= htmlspecialchars($_SESSION['dob']);?></p>
        <p> Email Address :  <?= htmlspecialchars($_SESSION['email']);?></p>
        <p>Address :  <?= htmlspecialchars($_SESSION['address']);?></p>
        <p> Phone Number :  <?= htmlspecialchars($_SESSION['phoneNumber']);?></p>
        <p> Emergency Contact :  <?= htmlspecialchars($_SESSION['emergency']);?></p>
        <p>  Courses:</p>
    </div>      
   
        <?php endif; ?>
      
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
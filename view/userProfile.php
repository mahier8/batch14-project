
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
       <p class="success"></p>
        <div id="inputNone">
       
            <input type="hidden" name="oldpassword" value="<?= $_SESSION['userId']; ?>"  id="hidden">
            <input type="hidden" name="oldpassword" value="<?= $_SESSION['dbPassword']; ?>"id="dbPassword">
            <br>
            <br>
            <p id='error'></p>
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
      
        <div id="btn">
            <button  class="changePass">Change Password</button>
            <button  id="button">Submit</button>
        </div>
    </div>

</div>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
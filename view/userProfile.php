
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php 
    $style = ob_get_clean();
    ob_start();
?>

<?php ob_start();?>
    <div id="wrapper">
        
        <div id="profileImg">
            <h1><?= ucfirst($userProf['firstName']) . " " . ucfirst($userProf['lastName']);?></h1>
                <?php 
                echo '<img src="./private/profilePics/'. $userProf['imagePath'] . '">' ?>
            
            <div id="profileInfo">
                <div>
                    <div class="centerText">
                        <p class="blueStyle">Username</p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['userName']);?></p>  
                    </div>
                    <div class="centerText">
                        <p class="blueStyle">Courses </p>
                        <p class="profDetail">Insert Courses here</p>  
                    </div>
                    <div class="centerText">
                        <p class="blueStyle">Date of Birth </p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['dob']);?></p>
                    </div>
                    <div class="centerText">
                        <p class="blueStyle">Email Address </p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['email']);?></p>
                    </div>
                </div>
                <div>
                    <div class="centerText">
                        <p class="blueStyle">Address </p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['address']);?></p>
                    </div>
                    <div class="centerText">
                        <p class="blueStyle">Phone Number </p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['phoneNumber']);?></p>
                    </div>
                    <div class="centerText">
                        <p class="blueStyle">Emergency Contact </p>
                        <p class="profDetail"><?= htmlspecialchars($userProf['emergency']);?></p>
                    </div>

                </div>


            </div>
        </div>
 
        
        <div id="uploadForm">

            <form action="index.php" id="upload" method="post" enctype="multipart/form-data">
                Change Profile Picture
                <input type="file" class="btn" name="image" id="fileToUpload">
                <input type="hidden" name="action" value="uploadImage">
                <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
                <input type="submit" class="greenStyle btn" value="Upload Image" name="submit">
            </form>
        
        
            <div id='inputNone'>
                <p id="error"></p>
                <form action="index.php" method="POST" id="form">
            
                    <input type="hidden"  name="action" value="updatePassword">

                    <input type="hidden" name="userId" value="<?= $_SESSION['userId']; ?>">
                
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Current Password&emsp;&emsp;&emsp;&emsp;&emsp;&#xf06e">
                    <br>
                    <br>
                    <input type="password" id="newPassword" name="newPassword" placeholder="New Password&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#xf06e">
                    <br>
                    <br>
                    <input type="password" id="rePassword" name="rePassword" placeholder="Password Confirmation&emsp;&emsp;&#xf06e">
                    <br>
                    <br>
                    <div id="changeButtons">
                        <button class="greenStyle btn" type="submit" id="submitButton" name="submit">Submit</button>
                        <button class="greenStyle btn" type="button" id="subHide" name="hide">Hide</button>
                    </div>
                </form>
            
            </div>
            <div class="centerDiv">
            <button class="blueStyle btn" id='changeButton'>Change Password</button>
            </div>
        </div>

    </div>
<script src="./public/js/userProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
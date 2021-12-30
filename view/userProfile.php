
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/userProfile.css">
<?php 
    $style = ob_get_clean();
    ob_start();
?>

<?php ob_start();?>
    <div id="wrapper">
        <div>
            <div id="profileImg" class="profBorder">
                <div id="profileTitle" class="blueStyle centerText"><h2>User Profile</h2></div> 
                    <h1><?= ucfirst($userProf['firstName']) . " " . ucfirst($userProf['lastName']);?></h1>
                        <?php 
                        echo '<img src="./private/profilePics/'. $userProf['imagePath'] . '">' ?>

                   
                        
                        <table>
                            <tr >
                                <td class="strong">Username</td>
                                <td class=""><?= htmlspecialchars($userProf['userName']);?></td>  
                            </tr>
                            <tr >
                                <td class="strong">Courses </td>
                                <td >Insert Courses here</td>  
                            </tr>
                            <tr >
                                <td class="strong">Date of Birth </td>
                                <td ><?= htmlspecialchars($userProf['dob']);?></td>
                            </tr>
                            <tr >
                                <td class="strong">Email Address </td>
                                <td ><?= htmlspecialchars($userProf['email']);?></td>
                            </tr>
                        
                            <tr >
                                <td class="strong">Address </td>
                                <td ><?= htmlspecialchars($userProf['address']);?></td>
                            </tr>
                            <tr >
                                <td class="strong">Phone Number </td>
                                <td ><?= htmlspecialchars($userProf['phoneNumber']);?></td>
                            </tr>
                            <tr >
                                <td class="strong">Emergency Contact </td>
                                <td ><?= htmlspecialchars($userProf['emergency']);?>
                            </tr>

                        </table>

                    



                   


                <div>
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
                    

                    
                        <div>
                            <form action="index.php" id="upload" method="post" enctype="multipart/form-data">
                                Change Profile Picture
                                <input type="file" class="btn" name="image" id="fileToUpload">
                                <input type="hidden" name="action" value="uploadImage">
                                <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
                                <input type="submit" class="greenStyle btn" value="Upload Image" name="submit">
                            </form>
                        </div>
                </div> 
            
            </div>
    
        </div>
    
    </div>
<script src="./public/js/userProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>


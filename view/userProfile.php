
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

                    



                   
            </div>
    
        </div>
    
    </div>




<script src="./public/js/userProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>


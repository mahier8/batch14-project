<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/user.css">
<?php $style = ob_get_clean();?>

<?php ob_start();?>

    <div id="mainContent">
        <?php 
            $userName = isset($user['userName']) ? $user['userName'] : "";
            $firstName = isset($user['firstName']) ? $user['firstName'] : "";
            $lastName = isset($user['lastName']) ? $user['lastName'] : "";
            $password = $POST['password'] = isset($user['password']) ? $user['password'] : "";
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = isset($user['role']) ? $user['role'] : "";
            $email = isset($user['email']) ? $user['email'] : "";
            $phoneNumber = isset($user['phoneNumber']) ? $user['phoneNumber'] : "";
            $dob = isset($user['dob']) ? $user['dob'] : "";
            $address = isset($user['address']) ? $user['address'] : "";
            $emergency = isset($user['emergency']) ?  $user['emergency'] : "";
        ?>
        
        <?php if(isset($_GET['edit'])):?>
            <h1 id="editUser">Edit User</h1>
        <?php else: ?>
            <h1 id="addUser">Add User</h1>
        <?php endif;?>
        
        <form id="addEditUserForm" method="POST" action="index.php" class="createUser">
            <?php if(isset($user)):?>
                <input type="hidden" name="userId" value="<?=$user['id']?>">
            <?php endif;?>
            <input type="hidden" name="action" value="addEditUser">
            <span class="input"></span>
            <input type="text" name="userName" placeholder="Username*" value="<?=$userName;?>" title="Format: XxXx (e.g. ACican)" autofocus autocomplete="off" required >
            <span class="input"></span>
            <input type="text" name="firstName" placeholder="First Name*" value="<?=$firstName;?>" title="Format: XxXx (e.g. Alex)" autocomplete="off" required >
            <span class="input"></span>
            <input type="text" name="lastName" placeholder="Last Name*" value="<?=$lastName;?>" title="Format: XxXx (e.g. Cican)" autocomplete="off" required >
            
            <?php if(!isset($user)):?>
                <!-- generates hashed password -->
                <span id="passwordMeter"></span>
                <input id="passwordInput" type="password" name="password" placeholder="Password*" title="Password min 8 characters. At least one UPPERCASE and one lowercase letter" >
                <span class="input suggestedPwd">suggested</span>
                <input type="text" name="suggestedPwd" id="suggestedPwd">
                <div id="button">
                    <button type="button" class="btn1" onclick="genPassword()">Generate</button>
                    <button type="button" class="btn2" onclick="copyPassword()">Copy</button>
                </div>
            
            <?php endif;?>
            
            <div>
                <br>
                <label for="admin">
                    Admin :
                    <input type="radio" name="role" id="admin" value="0" <?php if($role == 0 OR !$role) {echo "checked";}?> > 
                </label>
                <label for="teacher">
                    | Teacher : 
                    <input type="radio" name="role" id="teacher" value="1" <?php if($role == 1) {echo "checked";}?> >
                </label>
                <label for="student">
                    | Student:
                    <input type="radio" name="role" id="student" value="2" checked <?php if($role == 2) {echo "checked";}?> >
                </label>
            </div>

            <span class="input"></span>
            <input type="tel" name="phoneNumber" placeholder="Phone Number" value="<?=$phoneNumber;?>" >
            <span class="input">Dob</span>
            <input id="datefield" type="date" name="dob" placeholder="DOB" min='1975-01-01' value="<?=$dob;?>" required >
            <span class="input"></span>
            <input type="email" name="email" placeholder="Email" value="<?=$email;?>" >
            <span class="input"></span>
            <input type="text" name="address" placeholder="Address" value="<?=$address;?>" >
            <span class="input"></span>
            <textarea name="emergency" id="emergency" cols="30" rows="10" placeholder="Emergency Contact & Relation"><?=$emergency;?></textarea>
            <button type="submit" id="submit" form="addEditUserForm">Submit</button>
        </form>

    </div>

<script src="./public/js/addEditUserForm.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
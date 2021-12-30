    
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
        
            <div class="centerDiv">
                <button class="blueStyle btn" id='changeButton'>Change Password</button>
            </div>
    </div> 
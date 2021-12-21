<div id="sideBar">
    <?php if(!isset($_SESSION['userId'])):?>
       
        <div id="loggedOut">
            <form id="loginForm" action="index.php" method="POST">
                <input type="hidden" name="action" value="login">
                <h3>LOGIN</h3>
                <input type="text" name="username" placeholder="username">
            
                <input type="password" name="password" placeholder="password">
               
                <button type="submit" class="login">Login</button>
                <div id="checkBox">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Remember me</label>
                </div>    
            </form>
            <div id="infoSection">
                <div>Privacy Policy</div>
                <div>53, Seonggyeoldaehak-ro, Manan-gu, Anyang-si,<br> Gyeonggi-do, Republic of Korea (14097)</div>
                <div>Tel : +82-31-467-8114</div>
            </div>
        </div>
    <?php else: ?>
        <div id="loggedIn">
            <div id="profileName">
                <img id="profilePic" src="./public/images/duckLogo.jpg" alt="">
                <div>Hello <?php echo $_SESSION['userName']; ?></div>
            </div>
            <div id="profileRole"><?php echo $_SESSION['userRoleDesc']; ?></div>
            <div id="loggedInMenu">
                <div id="loggedInMenuLinks">
                    <!-- this is where  -->
                    <a href="index.php?action=userProfile"><div class="loggedInItems"><i class="fas fa-user-circle loginPageIcons"></i>My profile</div></a>
                    <a href="index.php?action=courseList"><div class="loggedInItems"><i class="fas fa-book-open loginPageIcons"></i>My courses</div></a>
                    <?php if($_SESSION['userRole'] == 0): ?> 
                        <a href="index.php?action=userView"><div class="loggedInItems"><i class="fas fa-users-cog loginPageIcons"></i>Manage Users</div></a>
                    <?php endif; ?>
                </div>
                
                <div>
                    <form id="logoutForm" action="index.php" method=POST>
                        <input type="hidden" name="action" value="logout">
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div> 
        </div>
    <?php endif;?>
</div>
<div id="sideBar">
    <?php if(!isset($_SESSION['userId'])):?>
        <div id="loggedOut">
            <form id="loginForm" action="index.php" method="POST">
                <input type="hidden" name="action" value="login">
                <h3>Sign In</h3>
                <input type="text" name="username" placeholder="username">
            
                <input type="password" name="password" placeholder="password">
               
                <button type="submit" class="blueStyle btn">Login</button>
                <div id="checkBox">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Remember me</label>
                </div>    
            </form>
            <div id="infoSection">
                <p>Unspecified English Academy</p>
                <p>53, Seonggyeoldaehak-ro, Manan-gu, </p>
                <p>Anyang-si, Gyeonggi-do
                <p>Republic of Korea (14097)</p>
                <p>Tel : +82-31-467-8114</p>
            </div>
        </div>
    <?php else: ?>
        <div id="loggedIn">
            <div id="profileName">
                <img id="profilePic" src="./public/images/duckLogo.jpg" alt="">
                <p>Hello <?php echo $_SESSION['userName']; ?></p>
            </div>
            <div id="profileRole"><p><?php echo $_SESSION['userRoleDesc']; ?> Account</p></div>
            <div id="loggedInMenu">
                <div id="loggedInMenuLinks">
                    <a href="index.php?action=userProfile"><div class="loggedInItems"><i class="fas fa-user-circle loginPageIcons"></i>My profile</div></a>
                    <a href="index.php?action=courseList"><div class="loggedInItems"><i class="fas fa-book-open loginPageIcons"></i>My courses</div></a>
                    <?php if($_SESSION['userRole'] == 0): ?> 
                        <a href="index.php?action=userView"><div class="loggedInItems"><i class="fas fa-users-cog loginPageIcons"></i>Manage Users</div></a>
                    <?php endif; ?>
                </div>
                
                <div>
                    <form id="logoutForm" action="index.php" method=POST>
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="blueStyle btn">Logout</button>
                    </form>
                </div>
            </div> 
        </div>
    <?php endif;?>
</div>
<div id="sideBar">
    <?php if(!isset($_SESSION['userId'])):?>
       
        <div id="loggedOut">
            <div id="loginContainer">
                <form id="loginForm" action="index.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <h3>Sign In</h3>
                    <input type="text" name="username" placeholder="username">
                
                    <input type="password" name="password" placeholder="password">
                    
                    <button type="submit" class="blueStyle blueStyleHover btn">Login</button>
                    <div id="checkBox">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox">Remember me</label>
                    </div>    
                </form>
            </div>
            <div id="infoSection">
                <p>Unspecified English Academy</p>
                <p>IS Biz Tower 2 #1101, </p>
                <p>23 Seonyu-ro 49-gil,
                <p>Yeongdeungpo-gu, Seoul,</p>
                <p>South Korea</p>
                <p>Tel : +82-10-1000-1000</p>   
            </div>
        </div>
    <?php else: ?>
        <div id="loggedIn">
            <div id="profileName">
            <?php echo '<img id="profilePic" src="./private/profilePics/'. $_SESSION['imagePath'] . '">' ?>
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
                        <button type="submit" class="blueStyle blueStyleHover btn">Logout</button>
                    </form>
                </div>
            </div> 
        </div>
    <?php endif;?>
</div>
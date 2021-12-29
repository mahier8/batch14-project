<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/user.css">
<?php $style = ob_get_clean();?>

<?php ob_start(); ?>
<div id="mainContent">
    <div class="section">
      
        <div class="contentHead">
            <form method="POST" action="index.php" class="filter" onsubmit="return false">
                <input type="hidden" name="action" value='filterUsers'>
                <input type="search" name="filter" placeholder="Enter a User Name" size="60px" id="check" >
            </form>

            <form action="index.php" method="POST" class="newuser">
                <input type="hidden" name="action" value='addUser'>
                <button class="blueStyle btn" type="submit" name="addNewUser" ><i class="fas fa-user-plus"></i>Add New User</button>
            </form>
    </div>

    <div>
        <table>
            <thead class="blueStyle"> 
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th colspan="2">Action</th>
                 
                </tr>
            </thead>
            <tbody id="tableb">
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ; ?></td>
                        <td><?= htmlspecialchars($user['firstName']) ;?></td>
                        <td><?= htmlspecialchars($user['lastName']); ?></td>
                        <td><?= htmlspecialchars($user['userName']); ?></td>
                        <td><?php 
                        if (htmlspecialchars($user['role']) == 0) {
                            echo 'admin';
                        } elseif (htmlspecialchars($user['role']) == 1){
                            echo 'teacher';
                        } else {
                            echo 'student';
                        };
                        ; ?></td>
                        <td><?= htmlspecialchars($user['phoneNumber']); ?></td>
                        <td><a href="index.php?action=userEdit&edit=<?= $user['id'];?>"><i class="fas fa-edit"></i>Edit</a></td>   
                        <td><a href="index.php?action=userDel&delete=<?= $user['id'];?>"><i class="fas fa-trash-alt"></i>Delete</a> </td>
                    
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script src="./public/js/userView.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");?>

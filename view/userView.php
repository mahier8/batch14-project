<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/user.css">
<?php $style = ob_get_clean();?>

<?php ob_start(); ?>
<div id="mainContent">
    <div class="section">
        <div class="contentHead">
            <form method="POST" action="index.php" class="filter">
                <input type="hidden" name="action" value='filterUsers'>
                <input type="text" name="filter" placeholder="filter" size="30px" >
            </form>

            <form  action="index.php" method="POST" class="newuser">
                <input type="hidden" name="action" value='addUser'>
                <button type="submit" name="addNewUser" ><i class="fas fa-user-plus"></i>Add New User</button>
            </form>
        </div>
    </div>

    <div class="contentBody">
        <table>
            <thead>
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
            <tbody>
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ; ?></td>
                        <td><?= htmlspecialchars($user['firstName']) ;?></td>
                        <td><?= htmlspecialchars($user['lastName']); ?></td>
                        <td><?= htmlspecialchars($user['userName']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td><?= htmlspecialchars($user['phoneNumber']); ?></td>
                        <td><a href="index.php?action=userEdit&edit=<?= $user['id'];?>"><i class="fas fa-edit"></i>Edit</a></td>   
                        <td><a href="index.php?action=userDel&delete=<?= $user['id'];?>"><i class="fas fa-trash-alt"></i>Delete</a> </td>
                    
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");?>

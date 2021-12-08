<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/user.css">
<?php $style = ob_get_clean();?>
<?php ob_start(); ?>

<div id="mainContent">
   

    <div class="section">
        <div class="contentHead">
                <form class="filter">
                    <input type="input" name="filter" placeholder="filter">
                </form>

                <form class="">
                    <button type="submit" name="addNewUser">Add New User</button>
                </form>
        </div>
           
            

    </div>

    <div class="contentBody">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>UserName</th>
                    <th>Role</th>
                    <th>PhoneNumber</th>
                    <th colspan="2">Action</th>
                 
                </tr>
            </thead>
            <tbody>
              
                <tr>
                    <td>id</td>
                    <td>james</td>
                    <td>robble</td>
                    <td>robus</td>
                    <td>admin</td>
                    <td>010234567</td>
                    <td colspan="2"><a href="">Button1</a> <a href="">Button2</a> </td>
                   
                </tr>
                <tr>
                    <td>id</td>
                    <td>james</td>
                    <td>robble</td>
                    <td>robus</td>
                    <td>admin</td>
                    <td>010234567</td>
                    <td colspan="2"><a href=""><i class="fas fa-edit"></i>button1</a><a href="">Button2</a> </td>
                   
                </tr>
            </tbody>
        </table>

    </div>

</div>

    <footer>

    </footer>
 
  

</div>

<script src=""></script>

    <?php $content = ob_get_clean(); ?>
    <?php require("template.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
  
   

     $db = new PDO('mysql:host=localhost;dbname=school;charset=utf8', 'root', '');

    //  if(isset($_POST['submit'])){
    //    $fname = $_POST['fname'];
    //   $lname = $_POST['lname'];
    //   $uname = $_POST['username'];
    //   $pass= $_POST['pass'];
    //   $role= $_POST['role'];
    //   $dob= $_POST['dob'];
    //   $email= $_POST['email'];
    //   $addr= $_POST['addr'];
    //   $image= $_POST['image'];
 

        // $password = password_hash($pass, PASSWORD_DEFAULT);

        // $req = $db->prepare("INSERT INTO user(firstName, lastName, userName, password, role, dob, email,address,imagePath ) VALUES(?,?,?,?,?,?,?,?,?)");
        // $req->bindParam(1, $fname ,PDO::PARAM_STR);
        // $req->bindParam(2, $lname  ,PDO::PARAM_STR);
        // $req->bindParam(3, $uname  ,PDO::PARAM_STR);
        // $req->bindParam(4, $password  ,PDO::PARAM_STR);
        // $req->bindParam(5, $role  ,PDO::PARAM_INT);
        // $req->bindParam(6, $dob  ,PDO::PARAM_STR);
        // $req->bindParam(7, $email  ,PDO::PARAM_STR);
        // $req->bindParam(8, $addr  ,PDO::PARAM_STR);
        // $req->bindParam(9, $image  ,PDO::PARAM_STR);
        // $req->execute();
       
     //}


?>
<form action="form.php" method="GET">
        <input type="text" name="fname">
        <br>
        <input type="text" name="lname">
        <br>
        <input type="text" name="username" placeholder="uname">
        <br>
        <input type="password" name="pass" placeholder="pass">
        <br>
        <input type="number" name="role" placeholder="role">
        <br>
        <input type="date" name="dob">
        <br>
        <input type="email" name="email">
        <br>
        <input type="text" name="addr" placeholder="addr">
        <br>
        <input type="text" name="image" placeholder="image">
        <br>
      
        <input type="submit" name="submit" value="submit">
</form>

</body>
</html>
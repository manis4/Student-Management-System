<?php
session_start();
if(isset($_SESSION['sessUserId'])){
    header('Location:admin/admindash.php');
}

include('dbcon.php');
if(isset($_POST['login']))
{
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=:username AND password=:password");
    $criteria = [
        'username'=> $_POST['name'],
        'password'=> $_POST['pass']
    ];
    $stmt->execute($criteria);
    $row=$stmt->fetch();
    if(isset($row['username']))
    { 
        $_SESSION['sessUserId'] = $row['id'];
        header('Location:admin/admindash.php'); 
    }
    else{
        echo 'Wrong Credentials. Please try again later';    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Php Admin</title>
</head>
<body>
<h1 align="center">Admin Login</h1>
<form action="login.php" method="post">
<table align="center">
<tr>
<td>Username:
<td><input type="text" name="name" required></td>
</tr>
<tr>
<td>Password:
<td><input type="password" name="pass" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
</tr>
</table>
</form>
    
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['sessUserId'])){
        header('Location:../login.php');
    }

?>
<?php
include('header.php');
include('titlehead.php');
include('../dbcon.php');
$sid=$_GET['sid'];
$sql="SELECT * FROM student where id='$sid'";
$run=$pdo->query($sql);
$result=$run->fetch()
?>
<form method="post" action="updatedata.php" enctype="multipart/form-data">
<table align="center" border="1" style="width:60%;margin-top:40px;">
<tr>
<th>Roll No:</th>
<td><input type="text" name="rollno" value=<?php echo $result['rollno'];?> required></td>
</tr>
<tr>
<th>Full Name:</th>
<td><input type="text" name="fname" value=<?php echo $result['name'];?>required></td>
</tr>
<tr>
<th>City:</th>
<td><input type="text" name="city" value=<?php echo $result['address'];?>></td>
</tr>
<tr>
<th>Parents Contact Number:</th>
<td><input type="text" name="pcon" value=<?php echo $result['pcont'];?> required></td>
</tr>
<tr>
<th>Standard:</th>
<td><input type="text" name="std" value=<?php echo $result['standard'];?> required></td>
</tr>
<tr>
<th>Image:</th>
<td><input type="file" name="simg" required></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="hidden" name="sid" value="<?php echo $result['id'];?>" />
<input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>
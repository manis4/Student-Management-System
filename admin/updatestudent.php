<?php
    session_start();
    if(!isset($_SESSION['sessUserId'])){
        header('Location:../login.php');
    }

?>
<?php
include('header.php');
include('titlehead.php');
?>
<table align="center">
<form action="updatestudent.php" method="POST">
<tr>
<th>Enter Standard:</th>
<td><input type="number" name="standard" placeholder="Enter standard!" required>
</td>
<th>Enter Student Name:</th>
<td><input type="text" name="stuname" placeholder="Enter Student Name!" required>
</td>
<td colspan="2"><input type="submit" name="submit" value="Search"></td>
</tr>
</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px">
<tr style="background-color:yellow;color:blue;">
<th>No</th>
<th>Image</th>
<th>Name</th>
<th>RollNo</th>
<th>Edit</th>
</tr>
<?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $standard=$_POST['standard'];
    $name=$_POST['stuname'];
    $sql="SELECT * FROM student WHERE standard='$standard' AND name like '%$name%'";
    $run=$pdo->query($sql);
    if($run->rowCount()<1)
    {
        echo"<tr><td colspan='5' align='center'>No records Found</td></tr>";
    }
    else{
        $count=0;
              while($result=$run->fetch())
        {
            $count++;
            ?>
            <tr  align="center">
<td><?php echo$count;?></td>
<td><img src="../dataimg/<?php echo $result['image'];?>"style="max-width:150px;"/></td>
<th><?php echo $result['name'];?></td>
<td><?php echo $result['rollno'];?></td>
<td><a href="updateform.php?sid=<?php echo $result['id'];?>">Edit</a></td>
</tr>
            <?php
        }
    }
}


?>
</table>

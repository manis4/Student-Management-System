<?php
    session_start();
    if(!isset($_SESSION['sessUserId'])){
        header('Location:../login.php');
    }
    include('../dbcon.php');

    if(isset($_POST['submit']))
    {
        // echo '<pre>'; print_r($_POST); print_r($_FILES); die();
        $rolno=$_POST['rollno'];
        $name=$_POST['fname'];
        $city=$_POST['city'];
        $pcon=$_POST['pcon'];
        $std=$_POST['std'];
        $img=$_FILES['simg']['name'];
        $temp=$_FILES['simg']['tmp_name'];
        move_uploaded_file($temp,"../dataimg/$img");
        $qry="INSERT INTO student(rollno, name, address, pcont, standard, image) VALUES('$rolno','$name','$city','$pcon','$std','$img')";
        $run=$pdo->query($qry);
        if($run==true)
        {
            ?>
            <script>alert('Data inserted Successfully');</script>
            <?php
        }  
    }
    include('header.php');
    include('titlehead.php');
?>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
<table align="center" border="1" style="width:60%;margin-top:40px;">
<tr>
<th>Roll No:</th>
<td><input type="text" name="rollno" placeholder="Enter Rollno" required></td>
</tr>
<tr>
<th>Full Name:</th>
<td><input type="text" name="fname" placeholder="Enter  name!" required></td>
</tr>
<tr>
<th>City:</th>
<td><input type="text" name="city" placeholder="Enter City" required></td>
</tr>
<tr>
<th>Parents Contact Number:</th>
<td><input type="text" name="pcon" placeholder="Enter Parents Contact no!" required></td>
</tr>
<tr>
<th>Standard:</th>
<td><input type="text" name="std" placeholder="Enter Standard" required></td>
</tr>
<tr>
<th>Image:</th>
<td><input type="file" name="simg" placeholder="Select your image!" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>
</body>
</html>
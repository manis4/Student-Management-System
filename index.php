

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
   
</head>
<body>
<div class="admin">
<h3 align="right"><a href="login.php"target="blank">Admin Login</a></h3>
</div>
<div class="table1">
<h1 align="center">Student Management System</h1>
</div>
<form method="post" action="index.php"style="margin-top:40px">
<table style="width:30%;" align="center" border="1">
<tr>
<td colspan="2" align="center"><b>Student Information</td></b>
</tr>
<tr>
   <td align="left"> Choose Standard:</td>
    <td>
       <select name="std" required>
         <option value="1">1st</option>
         <option value="2">2nd</option>
         <option value="3">3rd</option>
         <option value="4">4th</option>
         <option value="5">5th</option>
         <option value="6">6th</option>
         <option value="7">7th</option>
         <option value="8">8th</option>
         <option value="9">9th</option>
         <option value="10">10th</option>
       </select>
    </td>
</tr>
  <tr>
   <td align="left">Enter Roll no:</td>
   <td><input type ="text" name="rollno" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" value="Show information">
      </td>
      </tr>
      </table>
      </form>
      </div>
      <div class="head">
      <b><h2 align="center" style="margin-top:60px">Details Of Student:</h2></b>
      </div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  include('dbcon.php');
  $std=$_POST['std'];
  $rol=$_POST['rollno'];
  $sql="SELECT * FROM student WHERE rollno='$rol' AND standard='$std'";
  $run=$pdo->query($sql);
  if($run->rowCount()>0)
  {
         $data=$run->fetch();
          ?>
      <table border="1" style="width:40%;" align="center">
      <tr>
      <th colspan="3">Student Details</th>
      </tr>
      <tr>
      <td rowspan="5"><img src="dataimg/<?php echo $data['image'];?>"style="max-height:150px; max-width:120px;padding-left:40px;"/></td>
     <th>Roll No: </th>
     <td>
     <?php echo $data['rollno'];?></td>
    </tr>
      <tr>
     <th>Name: </th>
     <td>
     <?php echo $data['name'];?></td>
      </tr>
      <tr>
     <th>Standard: </th>
     <td>
     <?php echo $data['standard'];?></td>
      </tr>
      <tr>
     <th>Parent's Contact No: </th>
     <td>
     <?php echo $data['pcont'];?></td>
      </tr>
      <tr>
     <th>Address: </th>
     <td>
     <?php echo $data['address'];?></td>
      </tr>
      </table>
      <?php
  }

  else{
      echo "No records Found";
  }
}
?>
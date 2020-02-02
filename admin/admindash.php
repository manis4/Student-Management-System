<?php
    session_start();
    if(!isset($_SESSION['sessUserId'])){
        header('Location:../login.php');
    }

?>
<?php
include('header.php');
?>
<div class="admintitle">
<a href="logout.php"style="float:right;margin-right:30px; margin-top:12px;color:white; font-size:27px;">Logout</a>
<h1>Welcome to Admin Dashboard</h1>

</div>
<div class="dashboard">
    <table  style="width:30%" align="center">
        <tr>
            <td>1.</td>
            <td><a href="addstudent.php">Insert Student Details</a></td>
</tr>
<tr>
            <td>2.</td>
            <td><a href="updatestudent.php">Update Student Details</a></td>
</tr>
<tr>
            <td>3.</td>
            <td><a href="deletestudent.php">Delete Student Details</a></td>
</tr>
</table>
</div>
</body>
</html>
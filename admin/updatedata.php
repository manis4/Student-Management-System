<?php 
include('../dbcon.php');
$rolno=$_POST['rollno'];
        $name=$_POST['fname'];
        $city=$_POST['city'];
        $pcon=$_POST['pcon'];
        $std=$_POST['std'];
        $img=$_FILES['simg']['name'];
        $temp=$_FILES['simg']['tmp_name'];
        $id=$_POST['sid'];
        move_uploaded_file($temp,"../dataimg/$img");
        $qry="UPDATE `student` SET `rollno`='$rolno',`name`='$name',`address`='$city',`pcont`='$pcon',`standard`='$std',`image`='$img' WHERE id=$id;";
        $run=$pdo->query($qry);
        if($run==true)
        {
            ?>
            <script>alert('Data updated  Successfully'); 
            window.open('updateform.php?sid=<?php echo $id;?>','_self');
            </script>
            <?php
        }
?>
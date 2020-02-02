<?php
include('../dbcon.php');
        $id=$_REQUEST['sid'];
        $qry= "DELETE FROM student WHERE id='$id';";
        $run=$pdo->query($qry);
        if($run==true)
        {
            ?>
            <script>alert('Data deleted Successfully'); 
            window.open('deletestudent.php?sid=<?php echo $id;?>','_self');
            </script>
            <?php
        }
?>
?>
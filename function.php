<?php
function showdetails($std,$rol)
{
    include('dbcon.php');
    $sql="SELECT * FROM student WHERE rollno='$rol' AND standard='$std'";
    $run=$pdo->query($sql);
    if($run->rowCount()>1)
    {
           $data=$run->fetch();
           echo $data;
            ?>
        <table>
        <tr>
        <th colspan="3">Student Details</th>
        </tr>
        <tr>
        <td rowspan="5"><img src="dataimg/<?php echo $result['image'];?>"/></td>
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

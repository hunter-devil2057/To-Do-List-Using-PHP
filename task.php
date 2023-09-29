<?php include('header.php');?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
<a href="create.php">Create New</a>
<?php
session_start();
       $conn=new mysqli('localhost', 'root', '','todolist');
       $sql="SELECT * FROM task WHERE user_id=".$_SESSION['user_id'];

       $result=$conn->query($sql);
       $list="<table class='table'>
       <tr>
            <th>S.No.</th>
            <th>Task Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>User ID</th>
            <th>Action</th>
       </tr>";
       $data="";
       $s=1;
       while ($row=$result->fetch_assoc())
       {
            $data=$data. "<tr><td>".$s."</td><td>".$row['task_name']."</td><td>".$row['start_date']."</td><td>".$row['end_date']."</td><td>".$row['user_id']."</td><td><a href='delete.php?id=".$row['task_id']."' class='btn btn-danger'>Delete</a><a href='edit.php?id=".$row['task_id']."' class='btn btn-success'> Edit</a></td></tr>";
            $s++;
       }
       echo $list.$data.'</table>';
?>

<?php include('footer.php')?>
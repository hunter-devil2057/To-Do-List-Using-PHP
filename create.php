<?php include('header.php');?>

<?php
    $conn=new mysqli('localhost', 'root', '','todolist');
    // here, the name of the database is indicated as 'todolist'
    if($conn->connect_error)
    {
        echo "Connection Failed...";
    }
    else
    {
        echo "Connection Successful...";
    }

    // Local Host/myProject/create.php\
    // Inserting Values into the Query
    if(isset($_POST['btnSave'])){
        $taskname = $_POST['txtTaskName'];
    $startdate= $_POST['txtStartDate'];
    $enddate = $_POST['txtEndDate'];
    $userid = $_POST['txtUser'];
    }
    $sql="INSERT INTO task(task_name, start_date, end_date, user_id, progress, submitted_date)
    VALUES ('feasibility_study', '2023-09-21', '2023-09-25', 1, '20%', '2023-09-21')";


    // Execute query and return true or false
    $ret=$conn->query($sql);
    if($ret)
    {
        echo "Value Inserted Successfully...";
    }
    else
    {
        echo "Value Inserting Failed";
    }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
<form method="post" action="create.php">
    Task name<input type="text" name="txtTaskName" class="form-control">
    Start Date<input type="text" name="txtStartDate" class="form-control">
    End Date<input type="text" name="txtEndDate" class="form-control">
    User ID<input type="text" name="txtUser" class="form-control">
    <input type="submit" name="btnsave" value="Save" class="btn btn-primary">
</form>

<?php include('footer.php')?>
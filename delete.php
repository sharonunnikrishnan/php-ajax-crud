<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<?php
    include "db.php";
?>

<h1>Delete Employee</h1>

<?php 

    $id=$_GET['id'];    
    $sql = "select * from employee where id=$id";
    $result = mysqli_query($conn,$sql);
    

    if(isset($_POST['delete']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $sql = "delete from employee where id=$id";
        if(mysqli_query($conn,$sql))
        {
            header('Location: ./index.php');
        }
    }
?>
<h1>Edit</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form method="post" action="">
            <?php foreach($result as $res) ?>
   
                <br><br>
                User Name
                <input type="text" name="username" class="form-control" value="<?= $res['username'] ?>">
                Password
                <input type="password" name="password" class="form-control">
                Gender <br>
                F<input type="checkbox" name="gender" value="F" <?php if($res['gender']=='F'){ echo 'checked'; } ?>> 
                M<input type="checkbox" name="gender" value="M" <?php if($res['gender']=='M'){ echo 'checked'; } ?>>
                <br>Image
                <input type="file" name="image" class="form-control"><br>
                <input type="submit" value="Delete" name="delete" class="btn btn-primary">
            <?php ?>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
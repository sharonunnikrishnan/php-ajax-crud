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
    session_start();
    include "db.php";
    if($_SESSION['USERNAME']=='')
    {
        header('Location: ../');
        exit;
    }
    unset($_SESSION['USERNAME']);
?>

<h1>Employee Details</h1>

<?php

    $qry = "select * from employee";
    $result = mysqli_query($conn,$qry); 
?>
<a href="./create.php" class="btn btn-primary" >Create</a>
<table class="table">
    <tr>
        <th>Sl.No</th><th>User Name</th><th>Gender</th><th>Image</th><th></th><th></th><th></th>
    </tr>
    <?php foreach($result as $res){ ?>
    <tr>
        <td><?=$res['id'] ?></td>
        <td><?=$res['username'] ?></td>
        <td><?=$res['gender'] ?></td>
        <td><?=$res['image'] ?></td> 
        <td><a href="./edit.php?id=<?=$res['id'] ?>">Edit</a></td>
        <td><a href="./delete.php?id=<?=$res['id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
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

<?php include "db.php" ?>


<?php 

    $id=$_GET['id'];    
    $sql = "select * from employee where id=$id";
    $result = mysqli_query($conn,$sql);
    

    if(isset($_POST['create']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }

        $sql = "update employee set username='$username', gender='$gender', image='$target_file' where id=$id";
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
            <form method="post" action="" enctype="multipart/form-data">
            <?php foreach($result as $res) ?>
   
                <br><br>
                User Name
                <input type="text" name="username" class="form-control" value="<?= $res['username'] ?>">
                Gender <br>
                F<input type="radio" name="gender" value="F" <?php if($res['gender']=='F'){ echo 'checked'; } ?>> 
                M<input type="radio" name="gender" value="M" <?php if($res['gender']=='M'){ echo 'checked'; } ?>>
                <br>Image
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                <?php $img = $res['image'] ?>
                <img src=<?= $img ?>><br>
                <input type="submit" value="Update" name="create" class="btn btn-primary">
            <?php ?>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
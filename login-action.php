<?php include "db.php" ?>
<?php
//action="./page.php"

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash="";

    $qry = "select password from employee where username='$username'";
    $psw = mysqli_query($conn,$qry);
    foreach($psw as $res)
    {
        $hash =  $res['password'];
    }

    if(password_verify($password, $hash))
    {
        $_SESSION['USERNAME'] = $username;
        // header('Location: page.php/');
        echo json_encode(['code'=>1,'msg'=>'Success']);
        exit;
    }
    else
    {
        echo json_encode(['code'=>0,'msg'=>'Sorry']);
        exit;
    }
    


?>
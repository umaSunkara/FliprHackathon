<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('connect.php');

    @session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Exchanges</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
        header 
        {
            display: flex;
            position: fixed;
            width:100%;
            align-items:center;
        height:60px;
        justify-content:center;
        /* //top:0; */
        }
    footer{
        display:flex;
        position:fixed;
        bottom:0;
        width:100%;
        align-items:center;
        height:50px;
        justify-content:center;
    }</style>
    
</head>

<body class="bg-info">

<header class="bg-dark text-light">
    <div>Flipr-One stop solution for Stock Analysis.</div>
</header>
<div class="container-fluid m-0">
        <h2 class="text-center">User Register</h2>
    <div class="row d-flex align-items-center justify-content-center">
            <div class="col-xl-6 lg-12">
            <form action="" class="form-outline" method="post">
        <label for="uname">User Name:</label>
        <input type="text" name="uname" id="uname" class="form-control" required>
        <label for="pwd">User Password:</label>
        <input type="password" name="pwd" id="pwd" class="form-control" required>
        <br>

        <div class="text-center mt-4 p-2">
                        <input type="submit" value="Login" class="bg-dark px-3 border-0" name="ulogin" id="ulogin">
                    </div>
        Don't have an Account? <a href="index.php" class="">Register</a>
    </form>
</div>
</div>
    </div>
<footer class="bg-dark text-light"><div>&copy; All Rights Reserved.</div></footer>
</body>
</html>
<?php 
global $con;
if(isset($_POST['ulogin']))
{
    $u_name=$_POST['uname'];
    $pwd=$_POST['pwd'];
    //echo "<script>alert('User Does not exists.')</script>";
    $select_q="select * from users where name='$u_name'";
    $res_s=mysqli_query($con,$select_q);
    $num=mysqli_num_rows($res_s);
    if($num==0)
    {
        echo "<script>alert('User Does not exists.')</script>";
    }
    else 
    {
        $row=mysqli_fetch_assoc($res_s);
        if($pwd==$row['password'])
        {
            $_SESSION['name']=$u_name;
            echo "<script>alert('Login Successful.')</script>";
            echo "<script>window.open('main.html')</script>";
        }
        else 
        {
            echo "<script>alert('Invalid Login.')</script>";
        }
    }
}
?>
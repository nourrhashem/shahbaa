<?php

session_start();

include ("connection.php");



if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $Type = $_POST['userType'];

    $selectUser = "select * from $Type where username='$username' AND password='$password'";

    $query = mysqli_query($con, $selectUser);
    $checkUser = mysqli_num_rows($query);

    if($checkUser == 1){
        $_SESSION['username'] = $username;

        echo "<script>window.open('../home.php?u_id=" . $userId . "', '_self')</script>";

    }else{
        echo "<script>alert('Username or password is incorrect')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }

}

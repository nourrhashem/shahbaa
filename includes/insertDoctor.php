<?php
include ("connection.php");

if (isset($_POST['signup'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $specialization = $_POST['Specialization'];
    $gender = $_POST['gender'];
    

    if($gender == 'male'){    
        $profilePic = 'users/userMale.jpg';
    }elseif ($gender == 'female') {
        $profilePic = 'users/userFemale.jpg';
    }

    $rand = rand(1000000000,9999999999);

    $coverPic = 'cover/Professor.jpg';

    $insert = "INSERT INTO doctor (
        firstName,
        lastName,
        username,
        password,
        specialization,
        gender,
        Image,
        cover,
        isDoctor 
      )
    VALUES (
        '$fName',
        '$lName',
        '$username',
        '$password',
        '$specialization',
        '$gender',
        '$profilePic',
        '$coverPic',
        1
      )";

    $query = mysqli_query($con, $insert);
      
    if ($query) {
        echo "<script>alert('Welcome Doctor!!');</script>";
        echo "<script>window.open('../adminPanel.php','_self');</script>";
    } else {
        echo "<script>alert('something get wrong');</script>";
        die('Invalid query: ' . mysqli_error($con));
        echo "<script>window.open('../signupDoctor.php','_self');</script>";
    }


}

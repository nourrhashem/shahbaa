<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
}

include 'connection.php';

$user = $_SESSION['username'];
if ($user == 'admin') {
} else {
    $getUser = "select * from user where username='$user'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);


    if ($row) {

        $userId = $row['ID'];
        $userFname = $row['firstName'];
        $userLname = $row['lastName'];
        $username = $row['username'];
        $userEmail = $row['email'];
        $userPassword = $row['password'];
        $userSpecialization = $row['specialization'];
        $userStudyYear = $row['studyYear'];
        $userDateOfBirth = $row['dateOfBirth'];
        $userGender = $row['gender'];
        $userMiddleName = $row['middleName'];
        $userMotherName = $row['motherName'];
        $userImage = $row['Image'];
        $userCover = $row['cover'];
        $isDoctor = 0;

    } else {
        $getUser = "select * from doctor where username='$user'";
        $runUser = mysqli_query($con, $getUser);
        $row = mysqli_fetch_array($runUser);

        $userId = $row['Id'];
        $userFname = $row['firstName'];
        $userLname = $row['lastName'];
        $username = $row['username'];
        $userPassword = $row['password'];
        $userSpecialization = $row['specialization'];
        $userGender = $row['gender'];
        $userImage = $row['Image'];
        $userCover = $row['cover'];
        $isDoctor = $row['isDoctor'];

    }
}


?>
<?php
include ("connection.php");

if (isset($_POST['signup'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $mName = $_POST['middleName'];
    $moName = $_POST['motherName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $specialization = $_POST['Specialization'];
    $gender = $_POST['gender'];
    $studyYear = $_POST['studyYear'];
    $DateOfBirth = $_POST['DateOfBirth'];


    
        //test what is the specialization
        if($specialization == "Engineering"){
            $sp = 1;
        }elseif($specialization == "Dintest"){
            $sp = 2;
        }elseif($specialization == "Bussiness"){
            $sp = 3;
        }


        //get the year of signup
        $year = date("y");
        $firstStep = $sp.$year;
        $checkId = "SELECT ID FROM user WHERE ID LIKE '$firstStep%' ;";

        $runId = mysqli_query($con, $checkId);
        $countId = mysqli_num_rows($runId)+1;
        
            $count = sprintf("%03d", $countId);
            $rand = $firstStep.$count;
        
        
        

    $checkEmail = "SELECT email FROM user WHERE email = '$email'";
    $runEmail = mysqli_query($con, $checkEmail);

    $checkRunEmail = mysqli_num_rows($runEmail);

    if ($checkRunEmail == 1) {
        echo "<script>alert('Email already taken, Please try using another email');</script>";
        echo "<script>window.open('signup.php,'_self');</script>";
        exit();
    }  


    if($gender == 'male'){    
        $profilePic = 'users/userMale.jpg';
    }elseif ($gender == 'female') {
        $profilePic = 'users/userFemale.jpg';
    }
    if($gender == 'male'){    
        $gender = 0;
    }elseif ($gender == 'female') {
        $gender = 1;
    }

   if($specialization == 'Engineering'){    
        $coverPic = 'cover/engineering.jpg';
    }elseif ($specialization == 'Dintest') {
        $coverPic = 'cover/Dentist.jpg';
    }elseif ($specialization == 'Bussiness') {
        $coverPic = 'cover/Bussiness.jpg';
    }

/*     
    
            '$lName',
        '$username',
        '$email',
        '$password',
        '$specialization',
        '$studyYear',
        '$DateOfBirth',
        '$gender',
        '$mName',
        '$moName',
        '$profilePic',
        'bla'
    */

    $insert = "INSERT INTO user (
        ID,
        firstName,
        lastName,
        username,
        email,
        password,
        specialization,
        studyYear,
        dateOfBirth,
        gender,
        middleName,
        motherName,
        Image,
        cover 
        )
    VALUES (
        $rand,
        '$fName',
        '$lName',
        '$username',
        '$email',
        '$password',
        '$specialization',
        '$studyYear',
        '$DateOfBirth',
        '$gender',
        '$mName',
        '$moName',
        '$profilePic',
        '$coverPic'
        );"
                ;

    $query = mysqli_query($con, $insert);

    if ($query) {
        echo "<script>alert('Welcome Home!!');</script>";
        echo "<script>window.open('../adminPanel.php','_self');</script>";
    } else {
        echo "<script>alert('something get wrong');</script>";
        
        die('Invalid query: ' . mysqli_error($con));    
        echo "<script>window.open('../signup.php,'_self');</script>";
    }


};

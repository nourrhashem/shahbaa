<?php
    include 'connection.php';

    if (isset($_POST['update'])) {
        $imageName = $_FILES['usernewImage']['name'];
        $imagetmpName = $_FILES['usernewImage']['tmp_name'];
        $imageSize = $_FILES['usernewImage']['size'];
        $allowedExt = array('jpg','png','JPG');
        $explode = explode('.', $imageName);
        $ext = end($explode);
        if($imageName != ''){

            if (in_array($ext, $allowedExt)) {
                
                if ($imageSize < 200000000) {
                    $imageNameChange = md5(rand()) . '.' . $ext;
                    $path = "users/" . $imageNameChange;
                    move_uploaded_file($imagetmpName, $path);
                    $update = "UPDATE user SET Image = '$path' WHERE users.ID = $userId";
                    $run = mysqli_query($con, $update);
                    if ($run) {
                        echo '<script>alert("Your Profile Picture Updated Successfully");</script>';
                        echo '<script>window.open("../profile.php?u_id='.$userId.'" , "_self")</script>';
                    }else{
                        echo '<script>alert("you have error");</script>';
                    }
                } else {
                    echo '<script>alert("Too big file");</script>';
                }
                

            }else{
                echo '<script>alert("Invalid file type");</script>';
            }

        }else{
            echo '<script>alert("Please Upload Picture");</script>';
        }

    }
<?php 

include 'connection.php';

    if (isset($_POST['newPost'])) {


        $content = htmlentities($_POST['content']);

        $date= date("Y/m/d H:i:s");

        $targetFolder =  'posts/doctor(' . $userFname .') '. $content . '.pdf' ;

        $ok=1;

        $file_type = $_FILES['upload_PDF']['type'];


        if ($file_type == "application/pdf") {

                $test = move_uploaded_file($_FILES['upload_PDF']['tmp_name'], $targetFolder);
            if($test)
            {

               $insertPost = "INSERT INTO post (publisher, content, PDF, date)
                VALUES (
                    $userId,
                    '$content',
                    '$targetFolder',
                    '$date'
                );";
                $queryPost = mysqli_query($con, $insertPost);
                if ($queryPost) {
                    echo "<script>alert('All Done!!');</script>";
                } else {
                    echo "<script>alert('something get wrong');</script>";
                }

            echo "<script>alert('the file ". basename( $_FILES['upload_PDF']['name']) . " is uploaded');</script>";

            }

            else {

            echo "<script>alert('Problem uploading file');</script>";

            }

        }

        elseif ($file_type == "") {
            
            $insertPost = "INSERT INTO post (publisher, content, date)
            VALUES (
                $userId,
                '$content',
                '$date'
            );";
            $queryPost = mysqli_query($con, $insertPost);
        
            if ($queryPost) {
                echo "<script>alert('All Done with post!!');</script>";
            } else {
                echo "<script>alert('something get wrong post');</script>";
            }
        }
        else {

        echo "<script>alert('You may only upload PDFs');</script>";

        }
    }
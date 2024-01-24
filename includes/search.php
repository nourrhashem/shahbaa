<?php
    include 'connection.php';
    ?>
<div class="row">
    <?php
    function  SearchUsers(){
        global $con;

        if(isset($_GET['SearchUserBtn'])){
            $searchQuery = $_GET['searchUser'];
            $getUser = "SELECT * FROM user WHERE firstName LIKE '%$searchQuery%' OR lastName LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
        }
        else{
            $getUser = "SELECT * FROM user";
        }
        
        $run = mysqli_query($con, $getUser);

        while ($row = mysqli_fetch_array($run)) {
            
            $userID = $row['ID'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $username = $row['username'];
            $userImage = $row['Image'];

            echo'  
                <div class=" d-flex justify-content-center align-items-center doctor-card" id="findPeople">
                        
                    <div class="col-auto">
                        <a href="userProfile.php?u_id='.$userID.'">
                            <img src="'.$userImage.'" alt="user" width="100px" height="100px"  title="'.$username.'"
                        </a>
                    </div>
            
                    <div class="col-auto">
                        <a href="userProfile.php?u_id='.$userID.'" class="username">
                            <strong><h2>'.$firstName .'<br>'. $lastName.'</h2></strong>
                        </a>
                    </div>
                
                </div>';
        }

    }?>
</div>

<div class="row">
    <?php
    function  adminSearchUsers(){
        global $con;

        if(isset($_GET['SearchUserBtn'])){
            $searchQuery = $_GET['searchUser'];
            $getUser = "SELECT * FROM user WHERE firstName LIKE '%$searchQuery%' OR lastName LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
        }
        else{
            $getUser = "SELECT * FROM user";
        }
        
        $run = mysqli_query($con, $getUser);

        while ($row = mysqli_fetch_array($run)) {
            
            $userID = $row['ID'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $username = $row['username'];
            $userImage = $row['Image'];

            echo'  
                <div class=" d-flex justify-content-center align-items-center doctor-card" id="findPeople">
                        
                    <div class="col-auto">
                        <a href="userEdit.php?u_id='.$userID.'">
                            <img src="'.$userImage.'" alt="user" width="100px" height="100px"  title="'.$username.'"
                        </a>
                    </div>
            
                    <div class="col-auto">
                        <a href="userEdit.php?u_id='.$userID.'" class="username">
                            <strong><h2>'.$firstName .'<br>'. $lastName.'</h2></strong>
                        </a>
                    </div>
                
                </div>';
        }

    }?>
</div>


<div class="row">
    <?php
    function  SearchDoctors(){
        global $con;

        if(isset($_GET['SearchDoctorBtn'])){
            $searchQuery = $_GET['searchDoctor'];
            $getUser = "SELECT * FROM doctor WHERE firstName LIKE '%$searchQuery%' OR lastName LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
        }
        else{
            $getUser = "SELECT * FROM doctor";
        }
        
        $run = mysqli_query($con, $getUser);

        while ($row = mysqli_fetch_array($run)) {
            
            $userID = $row['Id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $username = $row['username'];
            $userImage = $row['Image'];

            echo'  
                         <div class=" d-flex justify-content-center align-items-center doctor-card" id="findPeople">
                        
                             <div class="col-auto">
                                 <a href="doctorProfile.php?u_id='.$userID.'">
                                     <img src="'.$userImage.'" alt="user" width="100px" height="100px"  title="'.$username.'"/>
                                 </a>
                             </div>
                        
                             <div class="col-auto">
                                 <a href="doctorProfile.php?u_id='.$userID.'" class="username">
                                     <strong><h2>Dr. '.$firstName .'<br>'. $lastName.'</h2></strong>
                                 </a>
                             </div>
                         </div>';
                        }
                    }
                    ?>
</div>

<div class="row">
    <?php
    function  adminSearchDoctors(){
        global $con;

        if(isset($_GET['SearchDoctorBtn'])){
            $searchQuery = $_GET['searchDoctor'];
            $getUser = "SELECT * FROM doctor WHERE firstName LIKE '%$searchQuery%' OR lastName LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
        }
        else{
            $getUser = "SELECT * FROM doctor";
        }
        
        $run = mysqli_query($con, $getUser);

        while ($row = mysqli_fetch_array($run)) {
            
            $userID = $row['Id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $username = $row['username'];
            $userImage = $row['Image'];

            echo'  
                         <div class=" d-flex justify-content-center align-items-center doctor-card" id="findPeople">
                        
                             <div class="col-auto">
                                 <a href="doctorProfile.php?u_id='.$userID.'">
                                     <img src="'.$userImage.'" alt="user" width="100px" height="100px"  title="'.$username.'"/>
                                 </a>
                             </div>
                        
                             <div class="col-auto">
                                 <a href="doctorProfile.php?u_id='.$userID.'" class="username">
                                     <strong><h2>Dr. '.$firstName .'<br>'. $lastName.'</h2></strong>
                                 </a>
                             </div>
                         </div>';
                        }
                    }
                    ?>
</div>
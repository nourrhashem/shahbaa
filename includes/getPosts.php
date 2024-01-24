<?php

include 'connection.php';

function getPost(){
    global $con;
    $perPage = 10;
    
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }   
    
    $startFrom = ($page-1) * $perPage;

    $getPosts = "SELECT * FROM post ORDER BY 1 DESC LIMIT $startFrom, $perPage";

    $run = mysqli_query($con, $getPosts);
        
    while ($rowPosts = mysqli_fetch_array($run)) {
        $postId = $rowPosts['postId'];
        $Publisher = $rowPosts['publisher'];
        $content = substr($rowPosts['content'], 0 ,255);
        $PDF = $rowPosts['PDF'];
        $postDate = $rowPosts['date'];

        $userPublisher = "SELECT * FROM doctor WHERE ID='$Publisher'";
        $runKnowUser = mysqli_query($con, $userPublisher);
        $rowUser = mysqli_fetch_array($runKnowUser);

        $userNamePublisher = 'Dr. ' . $rowUser['firstName'] . ' ' . $rowUser['lastName'];
        $userImgPublisher = $rowUser['Image'];

        if ($content == '' && strlen($PDF) >= 1) {
            echo '
            <div id="posts" class="col-md-5 col-sm-12 post">
             
                <h3 class="doctor-name"><a href="doctorProfile.php?u_id=' . $Publisher . '">' . $userNamePublisher . '</a></h3>
                
                    <div class="row">
                            <div class="col-auto">
                                <p>        
                                    <img src="' . $userImgPublisher . '" alt="profile" class="PostPublisher">    
                                </p>
                            </div>

                            <div class="col post-details">
                                    <h4><small>updated on: <strong>' . $postDate . '</strong></small></h4>
                                <!-- <p>' . $content . '</p> -->
                            </div>
                    </div>

                    <div class="col">
                        <a name="download" id="download" class="btn" href="' . $PDF . '" role="button"><i class="fa fa-download" aria-hidden="true"></i> download</a>
                    </div>
            </div>
       ';
   }elseif ($content != '' && strlen($PDF) > 1) {
       echo '
       <div id="posts" class="col-md-5 col-sm-12 post">
         <h3 class="doctor-name"><a href="doctorProfile.php?u_id=' . $Publisher . '">' . $userNamePublisher . '</a></h3>
           <div class="row">

               <div class="col-auto">
                   <p>        
                      <img src="' . $userImgPublisher . '" alt="profile" class="PostPublisher">    
                   </p>
               </div>
               
               <div class="col post-details">
                    <h4><small>updated on: <strong>' . $postDate . '</strong></small></h4>
                    <p>name:' . $content . '</p>
               </div>

           </div>
           <div class="col">
               <a name="download" id="download" class="btn " href="' . $PDF . '" role="button"><i class="fa fa-download" aria-hidden="true"></i> download</a>
           </div>
       </div>    
      
       ';
   }else {
       echo '
       <div id="posts" class="col-md-5 col-sm-12 post">
         <h3 class="doctor-name"><a href="doctorProfile.php?u_id=' . $Publisher . '">' . $userNamePublisher . '</a></h3>
           <div class="row">

               <div class="col-auto">
                   <p>        
                      <img src="' . $userImgPublisher . '" alt="profile" class="PostPublisher">    
                   </p>
               </div>
               
               <div class="col post-details">
                    <h4><small>updated on: <strong>' . $postDate . '</strong></small></h4>
                    <p>name:' . $content . '</p>
               </div>

           </div>
          <!-- <div class="col">
               <a name="download" id="download" class="btn " href="' . $PDF . '" role="button"><i class="fa fa-download" aria-hidden="true"></i> download</a>
           </div> -->
       </div>
       ';
    }
    }
}
?>
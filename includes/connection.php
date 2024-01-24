<?php

    $con = mysqli_connect("localhost","root","");

    if(!$con){
    echo "<script>alert('you're noob!!');</script>";}

    mysqli_select_db($con,"socialnetwork");

?>
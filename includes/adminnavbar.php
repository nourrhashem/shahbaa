<?php
    include ('./init.php');

    session_start();
    include $search;
    ?>


<nav class="navbar navbar-expand-sm">
    <a class="navbar-brand ml-5" href="home.php">Al-shahbaa</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbar"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="bi bi-list"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse mr-4" id="navbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li>
                <a class="nav-link username-nav" href="#">admin</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <!-- <i class="fas fa-home fa-lg  "></i> -->
                    Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminDoctorSearch.php">
                    <!-- <i class="fas fa-chalkboard-teacher fa-lg  "></i> -->
                    Professors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signupDoctor.php">
                    <!-- <i class="fas fa-chalkboard-teacher fa-lg  "></i> -->
                    Add Professors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminSearchUser.php">
                    <!-- <i class="fas fa-user-tie fa-lg  "></i> -->
                    Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">
                    <!-- <i class="fas fa-user-tie fa-lg  "></i> -->
                    Add Student</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 search-bar" type="text" placeholder="Search ...." name="searchUser">
            <button class="btn search-btn my-2 my-sm-0" type="submit" name="SearchUserBtn"><i class="fa fa-search"
                    aria-hidden="true"></i></button>
        </form>
        <li class="nav-item dropdown d-flex align-item-center">
            <a class="nav-link dropdown-toggle" href="users.php" id="usersDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog fa-lg  "></i></a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="includes/logout.php">logout</a>
            </div>
        </li>
    </div>
</nav>
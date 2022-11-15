<?php
$user = $_SESSION['user'];
?>

<div class="nav_profile">
    <div class="nav_profile_show">
        <img class="img-md" src="./public/img/upload/<?php PrintDisplay::printShow($user, 'avatar') ?>" alt="Profile image">
        <p class="profi-name"><?php PrintDisplay::printShow($user, 'name') ?></p>
    </div>
    <div class="dropdown-menu">
        <div class="cotrol-user">
            <a href="User" class="dropdown-item">
                <i class="fa-solid fa-user"></i> My Profile</a>
            <?php
            if ($user['role'] == 1) {
            ?>
                <a style="color:black;" href="DashBoard" class="dropdown-item"><i class="fa-solid fa-house"></i>DashBoard</a>
            <?php
            }
            ?>
            <a style="color:red;" href="Logout" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Sign Out</a>
        </div>
    </div>
</div>
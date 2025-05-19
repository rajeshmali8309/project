<?php
// fetch login userData
include 'login_user_data.php';
?>
<div class="sidebar">
    <div class="index-logo">
        <img src="image\logo.svg" alt="No logo">
    </div>
    <div class="page-links">
        <a href="index.php" id="home"><i class="fa-solid fa-house"></i> Home</a>
        <a href="" id="explore"><i class="fa-solid fa-magnifying-glass"></i> Explore</a>
        <a href="notifications.php" id="notification"><i class="fa-regular fa-bell"></i> Notifications</a>
        <a href="" id="messages"><i class="fa-regular fa-envelope"></i> Messages</a>
        <a href="" style="padding-left: 8px;" id="grok"><img src="image/grok.png" alt="" width="30"> Grok</a>
        <a href="" id="communities"><i class="fa-solid fa-people-group"></i> Communities</a>
        <a href="profile.php" id="profile"><i class="fa-regular fa-user"></i> Profile</a>
        <a style="padding-left: 8px; cursor:pointer;"><img src="image/more.png" alt="" width="27"> More</a>
        <button class="post-btn">Post</button>
    </div>
    <div class="user-profile">
        <div class="avatar">
            <?php if(empty($userDAta['profile_picture'])){
                echo $_SESSION['firstchr'];
            }else{
                ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" class="dp" alt="No-dp" width="100%" height="100%"> <?php
            }?></div>
        <div>
            <div style="color:black; font-size: 18px;"><strong><?php echo $userDAta['name']?></strong></div>
            <div style="color: rgb(95, 94, 94);; font-size: 15px;">@<?php if(isset($_SESSION['userid'])){ echo $_SESSION['userid']; }?></div>
        </div>
        <span style=""><a><i class="fa-solid fa-ellipsis"></i></a></span>
    </div>

    <div class="logout-section">
        <a href="#">Add an existing account</a>
        <a onclick="return confirm('Log out of X?');" href="logout.php">Log out @<?php if(isset($_SESSION['userid'])){ echo $_SESSION['userid']; }?></a>
    </div>
</div>
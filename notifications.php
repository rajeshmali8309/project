<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
    <?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Notifications / X</title>
    <style>
        .rightbar{
            margin-right: 58px;
            right: -17px;
        }
        .post {
            width: 648px;
        }
    </style>
</head>
<body>
    <div class="pagecontainer">
        <?php
        // include file of left-sidebar 
        include 'layout/left-sidebar.php';
        ?>

        <div class="center-main">
            <?php
            // include file of notification center part
            include 'layout/notification_center.php';
            ?>

            <div class="notifications-btn">
                <a href="notifications.php" class="ntf-active" style="color: black;">All</a>
                <a href="verified.php">Verified</a>
                <a href="mentions.php">Mentions</a>
            </div>

            <div class="center-content" style="padding: 140px 0px;">
                <div class="post">
                    <div class="like-notification">
                        <div><img src="image/like.jpg" alt="" width="20" style="margin-top: 7px; margin-right: 7px;"></div>
                        <div class="like-profile-img"><img src="image/dp.jpg" alt="" width="35"></div>
                        <!-- <div class="like-profile">K</div> -->
                    </div>
                    <p><span style="color:black;font-weight: bold; margin-left: 37px;">Ravi Mali </span>liked your reply</p>
                </div>
            </div>
        </div>
        
        <div class="rightbar">
            <?php 
              include 'layout/right_footer.php'; 
            ?>
        </div>
    </div>
    <?php include 'layout/post_model.php'; ?>
</body>
<script>
    $(".trending-section").css({"margin-top":"64px"});
    $(document).ready(function () {
        $("#notification").addClass("sidebar-activepage");
    });
</script>
</html>
<?php 
}else{
    header("location:signup.php");
}
?>
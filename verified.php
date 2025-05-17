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
                <a href="notifications.php">All</a>
                <a href="verified.php" class="ntf-active" style="color: black;">Verified</a>
                <a href="mentions.php">Mentions</a>
            </div>

            <div class="center-content" style="padding: 140px 0px;">
                <div class="mention-center">
                    <p>
                        <img src="image/varify.png" alt="">
                    </p>
                </div>
                 
                <div class="mention-center">
                    <p>Nothing to see here — &nbspyet</p>
                    <section>Likes, mentions, reposts, and a whole lot more &nbsp— when it comes from a verified account, you’ll &nbsp find it here. <a href="" style="color: black;font-weight: 500; text-decoration: underline;">Learn more</a></section>
                </div>
            </div>
        </div>
        
        <?php
            // include file of notification center part
            include 'layout/notification_footer_right.php';
        ?>
    </div>
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
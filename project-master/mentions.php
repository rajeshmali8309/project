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
                <a href="verified.php">Verified</a>
                <a href="mentions.php" class="ntf-active" style="color: black;">Mentions</a>
            </div>

            <div class="center-content" style="padding: 140px 0px;">
                <div class="mention-center">
                    <p>Nothing to see here — &nbspyet</p>
                    <span>When someone mentions you, you’ll find it here.</span>
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
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

            <div class="center-content" id="notifications_data" style="padding: 140px 0px;">
                <!-- show notifications -->
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
        // show notification data using function
        function showNotifications(){
            var usernotification = "n";
            $.ajax({
                url: "controller.php",
                type: 'post',
                data: {
                    "other_notifications_show": usernotification
                },
                success: function(response) {
                    $("#notifications_data").html(response);
                }
            });
        }

        showNotifications();
    });
</script>
</html>
<?php 
}else{
    header("location:signup.php");
}
?>
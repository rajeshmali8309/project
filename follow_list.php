<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
<?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Home / X</title>
    <style>
        .rightbar{
            margin-right: 28px;
            margin-top: -20px;
            right: 19px;
        }
        .profile-center-header{
            margin-left: 45px;
            width: 48.2%;
        }
        #search {
            width: 97%;
        }
        .post{
            width: 626px;
        }
    </style>
</head>
<body>
    <?php 
     
    ?>
    <div class="pagecontainer">
    <?php
        include 'login_user_data.php';

        // include file of left-sidebar
        include 'layout/left-sidebar.php';
        ?>
        <?php
        if(isset($_REQUEST['followers'])){
            $Username = $_REQUEST['followers']; 
            ?> 
            <input type="hidden" class="pagedata" value="followers">
            <?php
        }

        if(isset($_REQUEST['following'])){
            $Username = $_REQUEST['following'];
            ?> 
            <input type="hidden" class="pagedata" value="following">
            <?php
        }

        // find user information
        $userInfo_query = "SELECT * FROM `twitter_users` WHERE username = '$Username'";
        $user_result = mysqli_query($conn,$userInfo_query);
        $user_data = mysqli_fetch_assoc($user_result);

        ?>
        <div class="center-main" style="margin: 0 497px 0 280px;">
            <div class="center-header">
                <div class="who-user-info">
                <input type="hidden" class="user-name-value" value="<?php echo $user_data['id'];?>">
                <p><?php echo $user_data['name'];?></p>
                <a>@<?php echo $Username;?></a>
            </div>
                <div class="followers-list"><span id="followers-active">Followers</span></div>
                <div class="following-list"><span id="following-active"> Followings</span></div>
                <?php
                    include 'layout/search_bar.php'; 
                ?>
            </div>

            <!-- following user details -->
            <div class="center-content" style="padding-top: 56px;">
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
    function userFollowing(value){
        var username = $(".user-name-value").val();
        if(value === 'following'){
            $("#followers-active").removeClass('following-list-active');
            $("#following-active").addClass('following-list-active');
            $.ajax({
                url: "controller.php",
                type: 'post',
                data: {
                    "following_users": value,
                    "userid":username
                },
                success : function(response){
                    $(".center-content").html(response);
                }
            });
        }

        if(value === 'followers'){
            $("#followers-active").addClass('following-list-active');
            $("#following-active").removeClass('following-list-active');
            $.ajax({
                url: "controller.php",
                type: 'post',
                data: {
                    "followers_users": value,
                    "userid":username
                },
                success : function(response){
                    $(".center-content").html(response);
                }
            });
        }
    }

    let pageval = $(".pagedata").val();
    userFollowing(pageval);

    // Click on following
    $(document).on('click', '.following-list', function () {
       userFollowing('following');
    });

    // Click on followers
    $(document).on('click', '.followers-list', function () {
       userFollowing('followers');
    });
</script>
</html>
<?php }else{
    header("location:profile.php");
}
?>
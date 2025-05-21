<?php 
session_start();
if(isset($_SESSION["userid"]) && isset($_REQUEST['username'])){ 
    if($_SESSION['userid'] === $_REQUEST['username']){
        header("location:profile.php");
    }
    ?>
<html lang="en">
<head>
    <?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Profile/ X</title>
    <style>
        .user-profile-info h3 {
            color: black;
            margin-top: 5px;
        }
        .text-pink{
            color: rgb(231, 14, 50);
        }
        .post-reactions a{
            text-decoration: none;
        }
        .post {
            width: 663px;
        }
        .rightbar{
            margin-right: 28px;
            right: -17px;
        }
        .profile-center-header{
            margin-left: 45px;
            width: 48.2%;
        }

        #search {
            width: 99%;
        }

        .other-user-links-active{
            border-bottom: 4px solid rgb(34, 154, 252);
            border-radius: 2px;
            text-decoration: none;
            color: rgb(7, 7, 7) !important;
            cursor: pointer;
        }

        .first_char {
            padding: 7px 28px;
        }

        #profile-dp-show {
            padding: 6px 9px;
            height: 112px;
        }

        .other-follow-btn {
            margin-left: 400px;
            padding: 3px 14px;
        }
    </style>
</head>
<body>
    <div class="pagecontainer" id="show-user-profile">
        <?php
        include 'dbconnection.php';
        // include file of left-sidebar 
        include 'layout/left-sidebar.php';

        // fetch other user Data
        $OtherUsername = $_REQUEST['username'];
        $find_user_info_query = "SELECT * FROM `twitter_users` WHERE username = '$OtherUsername'";
        $result = mysqli_query($conn,$find_user_info_query);
        $userDAta = mysqli_fetch_assoc($result);
        $User_name = $userDAta['name'];
        $Userfirstchar = $User_name[0];

        // Other user following followers count
        $userId = $userDAta['id']; //Other user Id
        //following Count
        $Count_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE following = $userId";
        $followingCount = mysqli_query($conn, $Count_query);
        $following = mysqli_fetch_assoc($followingCount);

        //followers Count
        $followrs_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE followers = $userId";
        $followersCount = mysqli_query($conn, $followrs_query);
        $followers = mysqli_fetch_assoc($followersCount);

        //total post count
        $post_query = "SELECT COUNT(*) AS total FROM twitter_posts WHERE user_id = $userId";
        $PostCount = mysqli_query($conn, $post_query);
        $postResult = mysqli_fetch_assoc($PostCount);
        ?>

        <div class="center-main" style="margin: 0 497px 0 280px;">
            <div class="profile-center-header">
                <div class="profile-head"><span id=""><?php echo $userDAta['name'];?> <br> <span class="profile-post-all-count"><?php echo $postResult['total']?> posts</span></span></div>

                <div class="search-box" style="margin-left: 670px;">
                    <input type="text" placeholder="🔍︎ Search" id="search">
                </div>
            </div>

            <div class="center-content" style="padding-top: 56px;">
                <div class="user-profile-show">
                    <div class="profile-cover-picture">
                        <?php
                        if(!empty($userDAta['cover_picture'])){ ?>
                            <img src="profile_banner/<?php echo $userDAta['cover_picture'];?>" alt="No backgroung Cover" width="100%" height="100%">
                            <?php }
                            ?>
                    </div>
                </div>
            
                <div class="post" id="profile-dp-show">
                    <!-- <span class="first_char">R</span> -->
                    <?php if(empty($userDAta['profile_picture'])){ ?>
                        <span class="first_char"><?php echo $Userfirstchar?></span>
                    <?php }else{
                        ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" id="profile-dp-show" alt="no file"><?php
                    }?>
                    <button class="other-follow-btn"><span>Follow</span></button>
                    <div class="user-profile-info">
                        <h3><?php echo $userDAta['name'];?></h3>
                        <input id="other-userid" type="hidden" value="<?php echo $userDAta['id'];?>">
                        <p>@<?php echo $userDAta['username'];?></p>
                        <p><i class="fa-solid fa-calendar-days"></i> <?php echo "Joined " . date("F Y", strtotime($userDAta['join_date'])); ?></p>
                        <p><?php echo $userDAta['bio'];?></p>
                        <p class="show-profile-followers">
                            <a style="color: black;" href="follow_list.php?following=<?php echo $userDAta['username']?>"><span class="following-show"><b><?php echo $following['total'];?></b></span><span> Following</span></a>
                            <a style="color: black;" href="follow_list.php?followers=<?php echo $userDAta['username']?>"><span class="followers-show"style="margin-left: 10px;"><b><?php echo $followers['total'];?></b></span><span> Follower</span></a>
                        </p>
                    </div>
                </div>

                <div class="other-profile-links-btn">
                    <a id="other-posts" class="other-user-links-active">Posts</a>
                    <a id="other-media">Media</a>
                </div>
                <!-- show post data -->
                <div class="post" id="show-other-Userdata" style="padding: 0"></div>
                <!-- End show post data -->
            </div>
        </div>

        <div class="rightbar">
            <?php 
              include 'layout/right_footer.php';
            ?>
        </div>
    </div>

    <?php include 'layout/post_model.php'; ?>
    <?php include 'layout/add_comment_model.php'; ?>
</body>
<script>
    $(document).ready(function () {
        // start other profile page fetch Data using ajax
        function otherProfileData(getId) {
            $("#other-posts,#other-media").removeClass("other-user-links-active");
            if(!getId== ''){
                var user_id = $("#other-userid").val();
                $("#"+getId).addClass("other-user-links-active");
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "other_Profile_page": getId,
                        "other_user_id":user_id
                    },
                    success : function(response){
                        $("#show-other-Userdata").html(response);
                    }
                });
            }
        }

        otherProfileData("other-posts");

        $(document).on("click", "#other-posts", function(){
            otherProfileData("other-posts");
        });

        $(document).on("click", "#other-media", function(){
            otherProfileData("other-media");
        });
    });
</script>
</html>
<?php }else{
    header("location:profile.php");
}
?>
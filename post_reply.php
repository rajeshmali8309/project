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
            margin-right: 85px;
            right: -17px;
        }
        .post {
            width: 648px;
        }

        .user-post-details {
            margin-left: 75px;
            margin-top: 30px;
        }

        .post-reactions a {
            margin-left: 30px;
            text-decoration: none;
        }
        .commentshow-reactions a{
            text-decoration: none;
        }

        .post-information span{
            padding: 12px 15px 12px 20px;
        }

        .text-pink{
            color: rgb(231, 14, 50);
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
            <div class="center-header" style="width: 41.3%; border-bottom: none;">
                <div id="Notifications">
                    <span style="font-size: 22px; color: black;">Post</span>
                </div>

                <?php
                    include 'layout/search_bar.php'; 
                ?>
            </div>

            <?php
             if(isset($_REQUEST['post_id'])){
                $post_ID = $_REQUEST['post_id'];
             }

             $post_details_query = "SELECT 
                        p.id AS post_id,
                        p.user_id,
                        p.post_file,
                        p.description,
                        p.created_at,
                        u.username,
                        u.name,
                        u.join_date,
                        u.profile_picture,
                        u.cover_picture
                    FROM 
                        twitter_posts AS p
                    JOIN 
                        twitter_users AS u ON p.user_id = u.id
                    WHERE 
                        p.id = $post_ID
                    ";

                $result = mysqli_query($conn, $post_details_query);

                while ($post = $result->fetch_assoc()) {
                    $user_name = $post['name'];
                    $fstChar = $user_name[0];

                    date_default_timezone_set("Asia/Kolkata");
                    $postTime = new DateTime($post['created_at']);
                    $currentTime = new DateTime();

                    $interval = $currentTime->diff($postTime);
                    $years = $interval->y;
                    $months = $interval->m;
                    $weeks = floor($interval->d / 7);
                    $days = $interval->d % 7;
                    $hours = $interval->h;
                    $minutes = $interval->i;

                    if ($years > 0) {
                        $output = $years . ' Y';
                    } elseif ($months > 0) {
                        $output = $months . 'M';
                    } elseif ($weeks > 0) {
                        $output = $weeks . 'W';
                    } elseif ($days > 0) {
                        $output = $days . 'd';
                    } elseif ($hours > 0) {
                        $output = $hours . 'h';
                    } elseif ($minutes > 0) {
                        $output = $minutes . 'm';
                    } else {
                        $output = ' Just now';
                    }

                    //like Count 
                    $post_Id = $post['post_id'];
                    $Count_query = "
                        SELECT COUNT(*) AS total 
                        FROM twitters_post_likes 
                        WHERE post_id = $post_Id AND likeable_type = 'post'
                    ";
                    $LikeCount = mysqli_query($conn, $Count_query);
                    $likeData = mysqli_fetch_assoc($LikeCount);

                    //comment Count 
                    $cmt_Count_query = "SELECT COUNT(*) AS total FROM twitter_post_comments WHERE post_id = $post_Id";
                    $cmtCount = mysqli_query($conn, $cmt_Count_query);
                    $commentData = mysqli_fetch_assoc($cmtCount);

                    // check login user liked post
                    $useridd = $_SESSION['login_user_id'];
                    $query_liked_user = "SELECT * FROM twitters_post_likes WHERE user_id = '$useridd' AND post_id = '$post_Id'";
                    $userLiked_query = mysqli_query($conn, $query_liked_user);

                    ?> 
                    <div class="center-content" id="notifications_data" style="padding: 68px 0px;">
                        <div class="user-post-details">
                            <input type="hidden" class="send_opponent_id" value="<?php echo $post['user_id'];?>">
                            <input type="hidden" id="send-post-id" value="<?php echo $_REQUEST['post_id']; ?>">
                            <input type="hidden" value="openPost" class="forpostOpen">
                            <div class="post-information">
                                <?php if (empty($post['profile_picture'])) { ?>
                                    <a style="text-decoration: none; color:black;"
                                        href="other_user_profile.php?username=<?php echo $post['username']; ?>">
                                        <span>
                                            <?php echo $fstChar; ?> 
                                        </span>
                                </a>
                                <?php } else {
                                ?> 
                                <a style="text-decoration: none; color:black;"
                                    href="other_user_profile.php?username=<?php echo $post['username']; ?>">
                                    <img src="profile_pic/<?php echo $post['profile_picture']; ?>" alt="no file">
                                </a><?php
                                } ?>
                                <p>
                                    <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>">
                                        <b style="color:black;">&nbsp<?php echo $post['name'] ?> </b>
                                    </a>
                                    <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>">
                                        @<?php echo $post['username'] ?>
                                    </a>
                                    <b class="user-post-time"><?php echo $output; ?></b>
                                    <?php
                                    if($post['user_id'] === $_SESSION['login_user_id']){ ?>
                                        <div style="display: inline; margin: auto;" class="delete-post-reply" data-id-post="<?= $post['post_id']; ?>">
                                            <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                        </div>
                                    <?php }
                                    ?>
                                </p>
                            </div>


                            <div class="post-information">
                                <div>
                                    <p class="post-discription"><?php echo $post['description']; ?></p>
                                </div>
                            </div>

                            <?php
                            $myfile = $post['post_file'];
                            if (!empty($myfile)) {
                                $ext = explode(".", $myfile);
                                if (strtolower(end($ext)) == "mp4") {
                            ?>
                                    <div class="post-img">
                                        <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                            <source src="posts/<?php echo $post['post_file']; ?>" type="video/mp4">
                                        </video>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="post-img">
                                        <img src="posts/<?php echo $post['post_file']; ?>" alt="No post file" width="97%" height="450px">
                                    </div>
                                <?php
                                } ?>

                            <?php
                             }
                            ?>

                            <div class="post-reactions">
                                <a class="like-post" data-post-id="<?= $post['post_id']; ?>">
                                    <i class="<?php if (mysqli_num_rows($userLiked_query) > 0) {
                                                    echo "fa-solid text-pink fa-heart";
                                                } else {
                                                    echo "fa-regular fa-heart";
                                                } ?>">
                                            <span class="like-count">
                                                <?php if (!empty($likeData['total'])) {
                                                    echo $likeData['total'];
                                                } else {
                                                    echo "";
                                                } ?>
                                            </span>
                                    </i>
                                </a>

                                <a class="comment-post" data-post-id="<?= $post['post_id']; ?>">
                                    <i class="fa-regular fa-comment">
                                        <span class="comment-count">
                                            <?php if (!empty($commentData['total'])) {
                                                echo $commentData['total'];
                                            } else {
                                                echo "";
                                            } ?>
                                        </span>
                                    </i>
                                </a>
                            </div>
                        </div>
                    <?php

                    $comment_query = "SELECT 
                    c.id AS comment_id,
                    c.user_id,
                    c.post_id,
                    c.comments,
                    c.created_at,
                    u.name,
                    u.username,
                    u.profile_picture
                    FROM twitter_post_comments AS c
                    JOIN twitter_users AS u ON c.user_id = u.id
                    WHERE c.post_id = $post_ID ORDER BY c.created_at DESC"; 

                    $comment_result = mysqli_query($conn, $comment_query);

                    while ($data = $comment_result->fetch_assoc()) {
                        $U_name = $data['name'];
                        $name_fstChar = $U_name[0];

                        date_default_timezone_set("Asia/Kolkata");
                        $commentTime = new DateTime($data['created_at']);
                        $currenttime = new DateTime();

                        $interval = $currenttime->diff($commentTime);
                        $years = $interval->y;
                        $months = $interval->m;
                        $weeks = floor($interval->d / 7);
                        $days = $interval->d % 7;
                        $hours = $interval->h;
                        $minutes = $interval->i;

                        if ($years > 0) {
                            $commenttime = $years . ' Y';
                        } elseif ($months > 0) {
                            $commenttime = $months . 'M';
                        } elseif ($weeks > 0) {
                            $commenttime = $weeks . 'W';
                        } elseif ($days > 0) {
                            $commenttime = $days . 'd';
                        } elseif ($hours > 0) {
                            $commenttime = $hours . 'h';
                        } elseif ($minutes > 0) {
                            $commenttime = $minutes . 'm';
                        } else {
                            $commenttime = ' Just now';
                        }
                        

                        //like Count 
                        $post_Id = $data['comment_id'];
                        $useridd = $_SESSION['login_user_id'];
                        $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE liked_id = $post_Id
                        AND likeable_type = 'comment'";

                        $LikeCount = mysqli_query($conn, $Count_query);
                        $likeData = mysqli_fetch_assoc($LikeCount);

                        //comment reply Count 
                        $reply_Count_query = "SELECT COUNT(*) AS total FROM twitter_post_comments_reply WHERE comment_id = $data[comment_id] AND present_reply_id IS NULL";
                        $reply_count = mysqli_query($conn, $reply_Count_query);
                        $replydata = mysqli_fetch_assoc($reply_count);

                        // check login user liked post
                        $query_liked_user = "SELECT * FROM twitters_post_likes WHERE user_id = '$useridd' AND liked_id = '$post_Id'
                        AND likeable_type = 'comment'";
                        $userLiked_query = mysqli_query($conn, $query_liked_user);

                        ?>
                        <div class="user-post-details" style="margin-left: 120px;">
                            <div class="comment-information">
                                <?php
                                if(empty($data['profile_picture'])){ ?> 
                                    <span><?php echo $name_fstChar; ?></span>
                                <?php } else { ?>
                                    <img src="profile_pic/<?php echo $data['profile_picture']; ?>" alt="no file"> 
                                <?php }
                                ?>
                                                                                                                           
                                <p>
                                    <b style="color:black;"><?php echo $data['name'] ?></b>
                                    @<?php echo $data['username'] ?> 
                                    <b class="user-post-time">
                                        <?php echo $commenttime;?>
                                    </b>
                                    <?php
                                    if($post['user_id'] === $_SESSION['login_user_id']){ ?>
                                        <div style="display: inline; margin: auto; margin-left: -50px;" class="delete-post-comment" data-id-comment="<?= $data['comment_id']; ?>">
                                            <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                        </div>
                                    <?php }
                                    elseif($data['user_id'] === $_SESSION['login_user_id']) { ?>
                                        <div style="display: inline; margin: auto; margin-left: -50px;" class="delete-post-comment" data-id-comment="<?= $data['comment_id']; ?>">
                                            <i style="color: red; margin-left: 110px;" class="fa-solid fa-trash-can"></i>
                                        </div>
                                    <?php }
                                    ?>
                                </p>
                            </div>
 
                            <div class="post-information">
                                <a href="reply.php?reply=<?php echo $data['comment_id']; ?>">
                                    <div>
                                        <p class="comment-show-discription"><?php echo $data['comments'] ?></p>
                                    </div>
                                </a>
                            </div>

                            <div class="commentshow-reactions">
                                <a class="like-comment" data-comment-id="<?= $data['comment_id']; ?>">
                                    <i class="<?php if (mysqli_num_rows($userLiked_query) > 0){
                                        echo "fa-solid text-pink fa-heart";
                                    } else {
                                        echo "fa-regular fa-heart";
                                    } ?>">
                                        <span class="comment-like-count">
                                            <?php if (!empty($likeData['total'])) {
                                                echo $likeData['total'];
                                            } else {
                                                echo "";
                                            } ?>
                                        </span>
                                    </i>
                                </a>

                                <a class="reply-post" data-comment-id="<?= $data['comment_id']; ?>">
                                    <i class="fa-regular fa-comment"> 
                                        <span class="reply-count">
                                            <?php 
                                                if (!empty($replydata['total'])) {
                                                        echo $replydata['total'];
                                                } else {
                                                    echo "";
                                                } 
                                            ?>
                                        </span>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
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
    <?php include 'layout/reply_model.php'; ?>

    <script>
        // delete post
        $(document).on('click', '.delete-post-reply', function (){
            var Post_ID = $(this).data('id-post');
            if (window.confirm("Are you sure you want to delete this post?")) {
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "post_delete_id": Post_ID,
                    },
                    success: function (response) {
                        var deleteresult = JSON.parse(response);
                        if (deleteresult.status == 'success') {
                            setTimeout(function () {
                                window.location.href="profile.php";
                            }, 1000);
                        }
                    }
                });
            }
        });

        // delete Comment
        $(document).on('click', '.delete-post-comment', function (){
            var Comment_id = $(this).data('id-comment');
            var post_id = $("#send-post-id").val();
            if (window.confirm("Are you sure you want to delete this Commment?")) {
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "comment_delete_id": Comment_id,
                    },
                    success: function (response) {
                        var deleteresult = JSON.parse(response);
                        if (deleteresult.status == 'success') {
                            setTimeout(function () {
                                window.location.href = "post_reply.php?post_id=" + post_id;
                            }, 1000);
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
<?php 
}else{
    header("location:signup.php");
}
?>
<?php

use Dom\Notation;

include 'dbconnection.php';
session_start();

// insert operation on ajax request
if (isset($_REQUEST['newuserinsert'])) {
    $Username = trim(isset($_POST['username']) ? $_POST['username'] : "");
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Password = trim(isset($_POST['password']) ? $_POST['password'] : "");
    $Dob = isset($_POST['dob']) ? $_POST['dob'] : "";
    $Join_date = date("Y/m/d");

    $new_user_insert_query = "INSERT INTO `twitter_users`(`username`, `name`, `email`, `password`, `dob`, `join_date`) VALUES ('$Username','$Name','$Email','$Password','$Dob','$Join_date')";
    $new_user_insert_result = mysqli_query($conn, $new_user_insert_query);
    if ($new_user_insert_result) {
        $_SESSION["userid"] = $Username;
        header("location:index.php");
    }
}


// check email allready taken...
if (isset($_REQUEST['mailexits'])) {
    $Emaildata = trim(isset($_POST['email']) ? $_POST['email'] : "");

    $emailcheck = "SELECT * FROM twitter_users WHERE email = '$Emaildata'";
    $resultemail = mysqli_query($conn, $emailcheck);
    if ($resultemail->num_rows > 0) {
        echo json_encode([
            'status' => 'failed'
        ]);
    } else {
        echo json_encode([
            'status' => 'success'
        ]);
    }
}

//check edit email allready taken...
if (isset($_REQUEST['edit_mail_exits'])) {
    $find_user_info = $_SESSION['userid'];
    $findusername = "SELECT * FROM `twitter_users` WHERE username = '$find_user_info'";
    $result = mysqli_query($conn, $findusername);
    $userDAta = mysqli_fetch_assoc($result);
    $currentEmail = $userDAta['email'];
    $editEmail = trim(isset($_POST['edit_email']) ? $_POST['edit_email'] : "");

    $check = "SELECT * FROM twitter_users WHERE email = '$editEmail' AND email != '$currentEmail'";
    $resultemail = mysqli_query($conn, $check);
    if ($resultemail && $resultemail->num_rows > 0) {
        echo json_encode(['status' => 'failed']);
    } else {
        echo json_encode(['status' => 'success']);
    }
}

//check username allready taken...
if (isset($_REQUEST['usernameexits'])) {
    $usernamedata = trim(isset($_POST['username']) ? $_POST['username'] : "");

    $usercheck = "SELECT * FROM twitter_users WHERE username = '$usernamedata'";
    $resultuser = mysqli_query($conn, $usercheck);
    if ($resultuser->num_rows > 0) {
        echo json_encode([
            'status' => 'failed'
        ]);
    } else {
        echo json_encode([
            'status' => 'success'
        ]);
    }
}

//check edit username allready taken...
if (isset($_REQUEST['edit_username_exits'])) {
    $usernamedata = trim($_POST['username'] ?? "");
    $currentUsername = $_SESSION['userid'];

    $usercheck = "SELECT * FROM twitter_users WHERE username = '$usernamedata' AND username != '$currentUsername'";

    $resultuser = mysqli_query($conn, $usercheck);

    if ($resultuser && $resultuser->num_rows > 0) {
        echo json_encode(['status' => 'failed']);
    } else {
        echo json_encode(['status' => 'success']);
    }
}

// remove profile picture and update
if (isset($_REQUEST['remove_profile_bannner'])) {
    $remove_banner_user = trim(isset($_SESSION['login_user_id']) ? $_SESSION['login_user_id'] : "");

    $user_query = "SELECT * FROM twitter_users WHERE id = $remove_banner_user";
    $user_details = mysqli_query($conn, $user_query);
    $userinfo = mysqli_fetch_assoc($user_details);
    if($userinfo){ ?>
            <span class="icon" onclick="document.getElementById('banner-upload').click();">+</span>
            <span class="fileerror"></span>
            <input type="file" name="profile_banner" accept="image/*" id="banner-upload">
            <input type="hidden" id="form-discard" value="1">
     <?php }
        
    // if ($remove_result) {
    //     echo json_encode([
    //         'status' => 'success'
    //     ]);
    // } else {
    //     echo json_encode([
    //         'status' => 'failed'
    //     ]);
    // }
}

// user post delete
if (isset($_REQUEST['post_delete_id'])) {
    $Post_delete_id = trim(isset($_POST['post_delete_id']) ? $_POST['post_delete_id'] : "");

    $Post_delete_query = "DELETE FROM `twitter_posts` WHERE id = '$Post_delete_id'";
    $deleteResult = mysqli_query($conn, $Post_delete_query);
    if ($deleteResult) {
        echo json_encode([
            'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'failed'
        ]);
    }
}

// user comment delete
if (isset($_REQUEST['comment_delete_id'])) {
    $Post_delete_id = trim(isset($_POST['comment_delete_id']) ? $_POST['comment_delete_id'] : "");

    $Post_delete_query = "DELETE FROM `twitter_post_comments` WHERE id = '$Post_delete_id'";
    $deleteResult = mysqli_query($conn, $Post_delete_query);
    if ($deleteResult) {
        echo json_encode([
            'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'failed'
        ]);
    }
}

// user comment reply delete
if (isset($_REQUEST['comment_reply_delete_id'])) {
    $reply_ID = trim(isset($_POST['comment_reply_delete_id']) ? $_POST['comment_reply_delete_id'] : "");
    $reply_delete_query = "DELETE FROM `twitter_post_comments_reply` WHERE id = '$reply_ID'";
    $deleteResult = mysqli_query($conn, $reply_delete_query);
    if ($deleteResult) {
        echo json_encode([
            'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'failed'
        ]);
    }
}

// user comment reply delete
if (isset($_REQUEST['reply_delete_id'])) {
    $reply_ID = trim(isset($_POST['reply_delete_id']) ? $_POST['reply_delete_id'] : "");
    $reply_delete_query = "DELETE FROM `twitter_post_comments_reply` WHERE id = '$reply_ID'";
    $deleteResult = mysqli_query($conn, $reply_delete_query);
    if ($deleteResult) {
        echo json_encode([
            'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'failed'
        ]);
    }
}

// login operation on ajax request
if (isset($_REQUEST['loginuser'])) {
    $loginData = trim(isset($_POST['userid']) ? $_POST['userid'] : "");
    $password = trim(isset($_POST['userpass']) ? $_POST['userpass'] : "");

    // find username using user email
    $findusername = "SELECT * FROM `twitter_users` WHERE email = '$loginData';";
    $result = mysqli_query($conn, $findusername);
    $userDAta = mysqli_fetch_assoc($result);
    if ($userDAta) {
        $username = $userDAta['username'];
    } else {
        $username = $loginData;
    }

    // Check if loginData is email or username
    $login_query = "SELECT * FROM twitter_users WHERE (email = '$loginData' OR username = '$loginData') AND password = '$password'";
    $login_result = mysqli_query($conn, $login_query);

    if ($login_result && mysqli_num_rows($login_result) > 0) {
        $user = mysqli_fetch_assoc($login_result);
        $_SESSION["userid"] = $username;
        echo json_encode([
            'status' => 'success',
        ]);
    } else {
        echo json_encode([
            'status' => 'failed',
        ]);
    }
}

// Foryou Data
if (isset($_REQUEST['foryou_data'])) {
?>
    <div class="post">
        <?php
        include 'layout/postform.php';
        ?>
    </div>
    <?php

    //fetch all users all posts randomaly
    $for_you_query = "SELECT 
                    u.id AS user_id,
                    u.id,
                    u.name,
                    u.username,
                    u.profile_picture,
                    p.id AS post_id,
                    p.post_file,
                    p.description,
                    p.created_at
                FROM twitter_posts p
                JOIN twitter_users u ON p.user_id = u.id
                ORDER BY p.created_at DESC";

    $result = mysqli_query($conn, $for_you_query);

    if ($result->num_rows > 0) {
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
            $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $post_Id";
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
            <div class="post">
                <div class="post-information">
                    <?php if (empty($post['profile_picture'])) { ?>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>"><span><?php echo $fstChar; ?></span></a>
                    <?php } else {
                    ?> <a style="text-decoration: none; color:black;"
                            href="other_user_profile.php?username=<?php echo $post['username']; ?>">
                            <img src="profile_pic/<?php echo $post['profile_picture']; ?>" alt="no file">
                        </a><?php
                        } ?>
                    <p>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>"><b style="color:black;"><?php echo $post['name'] ?> </b></a>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>">@<?php echo $post['username'] ?></a>
                        <b class="user-post-time"><?php echo $output; ?></b>
                        <?php
                        if($post['id'] === $_SESSION['login_user_id']){ ?>
                            <div style="display: inline; margin: auto;" class="delete-post-reply" data-id-post="<?= $post['post_id']; ?>">
                                <i style="color: red;" class="fa-solid fa-trash-can"></i>
                            </div>
                        <?php }
                        ?>
                    </p>
                </div>

                <div class="post-information">
                    <div>
                        <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                            <p style="cursor: pointer;" class="post-discription">
                                <?php echo $post['description']; ?>
                            </p>
                        </a>
                    </div>
                </div>

                <?php
                $myfile = $post['post_file'];
                if (!empty($myfile)) {
                    $ext = explode(".", $myfile);
                    if (strtolower(end($ext)) == "mp4") {
                ?>
                <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                    <div class="post-img" style="cursor: pointer;">
                        <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                            <source src="posts/<?php echo $post['post_file']; ?>" type="video/mp4">
                        </video>
                    </div>
                </a>
                    <?php
                    } else {
                    ?>
                    <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                        <div class="post-img">
                            <img src="posts/<?php echo $post['post_file']; ?>" alt="No post file" width="100%" height="500px">
                        </div>
                    </a>
                    <?php
                    } ?>
                <?php }
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
                        <i class="fa-regular fa-comment"> <span class="comment-count">
                                <?php if (!empty($commentData['total'])) {
                                    echo $commentData['total'];
                                } else {
                                    echo "";
                                } ?></span>
                        </i>
                    </a>
                </div>
            </div>
    <?php
        }
    }
}

// Following Data
if (isset($_REQUEST['following_data'])) {
    ?>
    <div class="post">
        <?php
        include 'layout/postform.php';
        ?>
    </div>
    <?php

    $login_UserId = $_SESSION['login_user_id'];
    //fetch user Post for profile page
    //fetch all users all posts randomaly
    $query_following = "SELECT 
                        u.id AS user_id,
                        u.name,
                        u.username,
                        u.profile_picture,
                        p.id AS post_id,
                        p.post_file,
                        p.description,
                        p.created_at
                    FROM twitter_followers tf
                    JOIN twitter_users u ON tf.followers = u.id
                    JOIN twitter_posts p ON p.user_id = u.id
                    WHERE tf.following = $login_UserId
                    ORDER BY RAND()";

    $result = mysqli_query($conn, $query_following);

    if ($result->num_rows > 0) {
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
            $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $post_Id";
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
            <div class="post">
                <div class="post-information">
                    <?php if (empty($post['profile_picture'])) { ?>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>"><span><?php echo $fstChar; ?></span></a>
                    <?php } else {
                    ?> <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>"><img src="profile_pic/<?php echo $post['profile_picture']; ?>" alt="no file"></a><?php
                                                                                                                                                                                                                            } ?>
                    <p>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>"><b style="color:black;"><?php echo $post['name'] ?> </b></a>
                        <a style="text-decoration: none; color:black;" href="other_user_profile.php?username=<?php echo $post['username']; ?>">@<?php echo $post['username'] ?></a>
                        <b class="user-post-time"><?php echo $output; ?></b>
                    </p>
                </div>

                <div class="post-information">
                    <div>
                        <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                            <p class="post-discription"><?php echo $post['description']; ?></p>
                        </a>
                    </div>
                </div>

                <?php
                $myfile = $post['post_file'];
                if (!empty($myfile)) {
                    $ext = explode(".", $myfile);
                    if (strtolower(end($ext)) == "mp4") {
                ?>
                        <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                            <div class="post-img">
                                <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                    <source src="posts/<?php echo $post['post_file']; ?>" type="video/mp4">
                                </video>
                            </div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="post_reply.php?post_id=<?php echo $post["post_id"]; ?>" style="text-decoration: none;">
                            <div class="post-img">
                                <img src="posts/<?php echo $post['post_file']; ?>" alt="No post file" width="100%" height="500px">
                            </div>
                        </a>
                    <?php
                    } ?>
                <?php }
                ?>

                <div class="post-reactions">
                    <a class="like-post" data-post-id="<?= $post['post_id']; ?>">
                        <i class="<?php if (mysqli_num_rows($userLiked_query) > 0) {
                                        echo "fa-solid text-pink fa-heart";
                                    } else {
                                        echo "fa-regular fa-heart";
                                    } ?>"> <span class="like-count">
                                <?php if (!empty($likeData['total'])) {
                                    echo $likeData['total'];
                                } else {
                                    echo "";
                                } ?></span>
                        </i>
                    </a>

                    <a class="comment-post" data-post-id="<?= $post['post_id']; ?>">
                        <i class="fa-regular fa-comment"> <span class="comment-count">
                                <?php if (!empty($commentData['total'])) {
                                    echo $commentData['total'];
                                } else {
                                    echo "";
                                } ?></span>
                        </i>
                    </a>
                </div>
            </div>
            <?php
        }
    }
}

//user follow unfollow...
if (isset($_REQUEST['follow_opponent_id'])) {
    $opponent_id = isset($_POST['follow_opponent_id']) ? $_POST['follow_opponent_id'] : "";
    $userId = $_SESSION['login_user_id'];

    // Check if already Follow
    $check_follow_query = "SELECT * FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'";
    $check = mysqli_query($conn, $check_follow_query);

    if (mysqli_num_rows($check) > 0) {
        // if following to unfollow
        $delete_follow_query = "DELETE FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'";
        mysqli_query($conn, $delete_follow_query);
        $delete_notification = "DELETE FROM `twitter_notifications` WHERE user_id = '$opponent_id' AND sender_id = '$userId' AND type = 'follow'";
            $delete_notification_result = mysqli_query($conn, $delete_notification);
        $follow = false;
    } else {
        // following if not follow
        $followinsert_query = "INSERT INTO `twitter_followers`(`followers`, `following`) VALUES ('$opponent_id','$userId')";
        $follow_insert_result = mysqli_query($conn, $followinsert_query);
        if ($follow_insert_result) {

            $insert_notification = "INSERT INTO twitter_notifications(user_id, sender_id, type, message)
                VALUES ('$opponent_id', '$userId', 'follow', '@$_SESSION[userid] Started to following you.')";
                mysqli_query($conn, $insert_notification);

            $follow = true;
        }
    }

    //following Count 
    $Count_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE following = $userId";
    $followingCount = mysqli_query($conn, $Count_query);
    $following = mysqli_fetch_assoc($followingCount);

    //followers Count 
    $followrs_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE followers = $userId";
    $followersCount = mysqli_query($conn, $followrs_query);
    $followers = mysqli_fetch_assoc($followersCount);

    echo json_encode([
        'following_count' => $following['total'],
        'followers_count' => $followers['total'],
        'following' => $follow
    ]);
}

if (isset($_REQUEST['follow_opponent_user_id'])) {
    $opponent_id = isset($_POST['follow_opponent_user_id']) ? $_POST['follow_opponent_user_id'] : "";
    $userId = $_SESSION['login_user_id'];

    // Check if already followed
    $isFollowing = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'")) > 0;

    if ($isFollowing) {
        // Unfollow
        mysqli_query($conn, "DELETE FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'");
    } else {
        // Follow
        mysqli_query($conn, "INSERT INTO twitter_followers(followers, following) VALUES ('$opponent_id','$userId')");
    }

    // Recheck relationship status
    $iFollow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'")) > 0;
    $theyFollow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$userId' AND following = '$opponent_id'")) > 0;

    $status = "Follow";
    if ($iFollow && $theyFollow) {
        $status = "Following"; // Mutual or you're already following
    } elseif ($iFollow) {
        $status = "Following";
    } elseif ($theyFollow) {
        $status = "Follow Back";
    }

    // Counts
    $following = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitter_followers WHERE following = $userId"));
    $followers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitter_followers WHERE followers = $userId"));

    echo json_encode([
        'following_count' => $following['total'],
        'followers_count' => $followers['total'],
        'status' => $status
    ]);
}


// profile all pages fetch Dynamic Data using ajax request
if (isset($_REQUEST['Profilepage'])) {
    $page = isset($_REQUEST['Profilepage']) ? $_REQUEST['Profilepage'] : "";
    // fetch login userData
    include 'login_user_data.php';

    if ($page === 'Posts') {
        //fetch user Post for profile page
        $post_fetch_user = "SELECT * FROM `twitter_posts` WHERE `user_id` = $userDAta[id] ORDER BY `id` DESC";
        $result = mysqli_query($conn, $post_fetch_user);

        if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
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
                $post_Id = $post['id'];
                $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $post_Id";
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
                <div class="user-post-details">
                    <div class="post-information">
                        <?php if (empty($userDAta['profile_picture'])) { ?>
                            <span><?php echo $_SESSION['firstchr'] ?></span>
                        <?php } else {
                        ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                                                                                                        } ?>
                        <p><b style="color:black;"><?php echo $userDAta['name'] ?> </b> @<?php echo $_SESSION['userid'] ?> <b class="user-post-time"><?php echo $output; ?></b></p>
                        <button type="button" class="post-delete" data-post-id="<?= $post['id']; ?>">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </div>

                    <div class="post-information">
                        <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none;">
                            <div>
                                <p class="post-discription"><?php echo $post['description']; ?></p>
                            </div>
                        </a>
                    </div>

                    <?php
                    $myfile = $post['post_file'];
                    if (!empty($myfile)) {
                        $ext = explode(".", $myfile);
                        if (strtolower(end($ext)) == "mp4") {
                    ?>
                    <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none; color: black;">
                        <div class="post-img">
                            <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                <source src="posts/<?php echo $post['post_file']; ?>" type="video/mp4">
                            </video>
                        </div>
                    </a>
                        <?php
                        } else {
                        ?>
                            <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none;">
                                <div class="post-img">
                                    <img src="posts/<?php echo $post['post_file']; ?>" alt="No post file" width="97%" height="450px">
                                </div>
                            </a>
                        <?php
                        } ?>
                    <?php }
                    ?>

                    <div class="post-reactions">
                        <a class="like-post" data-post-id="<?= $post['id']; ?>">
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
                                    } ?></span>
                            </i>
                        </a>

                        <a class="comment-post" data-post-id="<?= $post['id']; ?>">
                            <i class="fa-regular fa-comment"> <span class="comment-count">
                                    <?php if (!empty($commentData['total'])) {
                                        echo $commentData['total'];
                                    } else {
                                        echo "";
                                    } ?></span>
                            </i>
                        </a>
                    </div>


                    <div class="profile-post-popup">
                        <p><span class="close-post-dlt"><i class="fa-solid fa-xmark"></i></span></p>
                        <a class="delete-post-btn" data-post-id="<?= $post['id']; ?>" style="color:red; cursor:pointer;">
                            <img src="image/delete_icon.png" width="15"> Delete
                        </a>
                    </div>
                </div>
        <?php
            }
        }
    }

    // for highlight
    if ($page === 'Highlights') {
        ?>
        <div class="highlight-show-Data">
            <h3>No any highlight on your profile</h3>
        </div>
    <?php
    }

    // for highlight
    if ($page === 'Replies') {
        ?>
        <div class="highlight-show-Data">
            <h3>No any Replies on your profile</h3>
        </div>
    <?php
    }

    // for Articles
    if ($page === 'Articles') {
    ?>
        <div class="highlight-show-Data">
            <h3>No any Articles on your profile</h3>
        </div>
    <?php
    }

    // for Likes
    if ($page === 'Likes') {
    ?>
        <div class="highlight-show-Data">
            <h3>You don’t have any likes yet</h3>
            <p>Tap the heart on any post to show it some love. When you do, it’ll show up here.</p>
        </div>
        <?php
    }

    // for Media
    if ($page === 'Media') {
        $media_query = "SELECT * FROM twitter_posts WHERE user_id = $userDAta[id] AND post_file != '' ORDER BY id DESC";
        $media_result = mysqli_query($conn, $media_query);

        if (mysqli_num_rows($media_result) > 0) {
        ?>
            <div>
                <?php
                while ($media_post = $media_result->fetch_assoc()) {
                    $myfile = $media_post['post_file'];
                    if (!empty($myfile)) {
                        $ext = explode(".", $myfile);
                        if (strtolower(end($ext)) == "mp4") {
                        } else {
                ?> <img src="posts/<?php echo $media_post['post_file'] ?>" width="32.7%"> 
                <?php
                    }
                }
            }
            ?>
            </div>
    <?php
        }
    }
}


// user profile Update operation on ajax request
if (isset($_REQUEST['user_update'])) {
    $userID = trim(isset($_POST['userid']) ? $_POST['userid'] : "");
    $Name = trim(isset($_POST['name']) ? $_POST['name'] : "");
    $Username = trim(isset($_POST['username']) ? $_POST['username'] : "");
    $Email = trim(isset($_POST['email']) ? $_POST['email'] : "");
    $Dob = isset($_POST['dob']) ? $_POST['dob'] : "";
    $Bio = trim(isset($_POST['bio']) ? $_POST['bio'] : "");
    $profile_pic = '';
    $profile_banner = '';

    // update for profile pic
    if (empty($_FILES['profile_pic']['name'])) {
        $profile_pic = isset($_POST['profile_picture']) ? $_POST['profile_picture'] : "";
    } else {
        // old profile_picture unlink after select new profile_picture
        $imgquery = "SELECT profile_picture FROM `twitter_users` WHERE `id`=$userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if ($imgrow) {
            $imagePath = $imgrow['profile_picture']; // find profile_picture from database 
            $imageFullPath = 'profile_pic/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_pic folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_pic/';
        if (!is_dir($targetDir)) {
            $targetDir = mkdir($targetDir, 0777, true);
        }
        $profile_pic = time() . '.' . pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $profile_pic;
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile);
    }


    // update for profile banner
    if (empty($_FILES['profile_banner']['name'])) {
        $profile_banner = isset($_POST['profile_cover']) ? $_POST['profile_cover'] : "";
    } else {
        // old profile_banner unlink after select new profile_banner
        $imgquery = "SELECT cover_picture FROM `twitter_users` WHERE `id` = $userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if ($imgrow) {
            $imagePath = $imgrow['cover_picture']; // find profile_picture from database 
            $imageFullPath = 'profile_banner/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_banner folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_banner/';
        if (!is_dir($targetDir)) {
            $targetDir = mkdir($targetDir, 0777, true);
        }
        $profile_banner = time() . '.' . pathinfo($_FILES["profile_banner"]["name"], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $profile_banner;
        move_uploaded_file($_FILES["profile_banner"]["tmp_name"], $targetFile);
    }

    $sql = "UPDATE `twitter_users` SET `username`='$Username',`name`='$Name',`email`='$Email',`dob`='$Dob',
       `bio`='$Bio',`profile_picture`='$profile_pic',`cover_picture`='$profile_banner' WHERE `id`=$userID";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION["userid"] = $Username;
        echo "update successfull";
    } else {
        echo "update failed";
    }
}

if (isset($_REQUEST['users_show_limits'])) {
    ?>
    <div class="might-like">
        <h3>You might like</h3>
        <!-- you might like show 3 user using limit -->
        <?php
        $useridd = $_SESSION['login_user_id'];
        $limit = trim(isset($_POST['users_show_limits']) ? $_POST['users_show_limits'] : "");
        $offset = 0;
        if ($limit == 3) {
            $all_users = "SELECT * FROM twitter_users WHERE id != '$useridd'
              AND id NOT IN ( SELECT followers FROM twitter_followers WHERE following = '$useridd')
               LIMIT $offset,$limit";
        } else {
            $all_users = "SELECT * FROM twitter_users WHERE id != '$useridd'
                AND id NOT IN ( SELECT followers FROM twitter_followers WHERE following = '$useridd')";
        }

        $users_result = mysqli_query($conn, $all_users);
        while ($userinfo = $users_result->fetch_assoc()) {
            $user_name = $userinfo['name'];
            $userfirstchar = $user_name[0];
        ?>
            <div class="users-might">
                <?php
                if (empty($userinfo['profile_picture'])) {
                ?> <div class="profile-avatar">
                        <span>
                            <a href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>">
                                <?php echo $userfirstchar; ?>
                            </a>
                        </span>
                    </div> <?php
                } else {
                    ?> <div>
                            <a href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>">
                                <img src="profile_pic/<?php echo $userinfo['profile_picture']; ?>" width="50">
                            </a>
                        </div> <?php
                        }
                            ?>
                <div style="margin-left: 10px;">
                    <div style="color:black; font-size: 18px;"><strong><a href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>"><?php echo $userinfo['name'] ?></a></strong></div>
                    <div style="color: rgb(95, 94, 94);; font-size: 15px;"><a href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>">@<?php echo $userinfo['username'] ?></a></div>
                </div>
                <div class="might-follow-users">
                    <a class="user-follow-following follow-btn" data-post-id="<?= $userinfo['id']; ?>">Follow</a>
                </div>
            </div>
        <?php }
        ?>
        <div>
            <?php
            if ($limit == 3) { ?>
                <a class="show-more-user-btn">Show more</a> 
                <?php
                } else { ?>
                <a class="show-less-user-btn">Show less</a> 
                <?php
                }
                ?>
        </div>
    </div>
<?php
}

// profile page record fetch
if (isset($_REQUEST['profile_page_record'])) {
    // include file of left-sidebar 
    include 'layout/left-sidebar.php';
?>
    <div class="center-main" style="margin: 0 497px 0 280px;">
        <div class="profile-center-header">
            <div class="profile-head"><span id=""><?php echo $userDAta['name'] ?> <br> <span class="profile-post-all-count"><?php echo $totalPosts; ?> posts</span></span></div>

            <?php
            include 'layout/search_bar.php';
            ?>
        </div>

        <div class="center-content" style="padding-top: 56px;">
            <div class="user-profile-show">
                <div class="profile-cover-picture">
                    <?php
                    if (!empty($userDAta['cover_picture'])) { ?>
                        <img src="profile_banner/<?php echo $userDAta['cover_picture']; ?>" alt="No backgroung Cover" width="100%" height="100%">
                    <?php }
                    ?>
                </div>
            </div>
            <?php
            // fetch login userData
            include 'login_user_data.php';

            $userId = $_SESSION['login_user_id']; // logged-in user ID
            //following Count 
            $Count_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE following = $userId";
            $followingCount = mysqli_query($conn, $Count_query);
            $following = mysqli_fetch_assoc($followingCount);

            //followers Count 
            $followrs_query = "SELECT COUNT(*) AS total FROM twitter_followers WHERE followers = $userId";
            $followersCount = mysqli_query($conn, $followrs_query);
            $followers = mysqli_fetch_assoc($followersCount);

            ?>
            <div class="post" id="profile-dp-show">
                <?php if (empty($userDAta['profile_picture'])) { ?>
                    <span class="first_char"><?php echo $_SESSION['firstchr'] ?></span>
                <?php } else {
                ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" id="profile-dp-show" alt="no file"><?php
                } ?>
                <button id="edit-profile-btn">Edit profile</button>
                <div class="user-profile-info">
                    <h3><?php echo $userDAta['name'] ?></h3>
                    <p>@<?php echo $userDAta['username']; ?></p>
                    <p><i class="fa-solid fa-calendar-days"></i> <?php echo "Joined " . date("F Y", strtotime($userDAta['join_date'])); ?></p>
                    <p><?php echo $userDAta['bio']; ?></p>
                    <p class="show-profile-followers">
                        <a style="color: black;" href="follow_list.php?following=<?php echo $userDAta['username'] ?>"><span class="following-show"><b><?php echo $following['total']; ?></b></span><span> Following</span></a>
                        <a style="color: black;" href="follow_list.php?followers=<?php echo $userDAta['username'] ?>"><span class="followers-show"><b><?php echo $followers['total']; ?></b></span><span> Follower</span></a>
                    </p>
                </div>
            </div>
            <!-- following/followers user show -->
            <?php
            $followingUsersQuery = "SELECT u.id, u.name, u.username, u.profile_picture
                                        FROM twitter_followers tf
                                        JOIN twitter_users u ON tf.followers = u.id
                                        WHERE tf.following = $userId";

            $result = mysqli_query($conn, $followingUsersQuery);
            ?>
            <div class="profile-links-btn">
                <a id="Posts" class="profile-links-active">Posts</a>
                <a id="Replies">Replies</a>
                <a id="Highlights">Highlights</a>
                <a id="Articles">Articles</a>
                <a id="Media">Media</a>
                <a id="Likes">Likes</a>
            </div>

            <!-- show post data -->
            <div class="post" id="showPostData" style="padding: 0"></div>
            <!-- End show post data -->
        </div>
    </div>

    <div class="rightbar">
        <div class="might-like">
            <h3>You might like</h3>
            <!-- you might like show 3 user using limit -->
            <?php
            $offset = 0;
            $Limit = 3;
            $useridd = $_SESSION['login_user_id'];

            $all_users = "SELECT * FROM twitter_users WHERE id != '$useridd'
              AND id NOT IN ( SELECT followers FROM twitter_followers WHERE following = '$useridd')
              LIMIT $offset,$Limit";

            $users_result = mysqli_query($conn, $all_users);
            while ($userinfo = $users_result->fetch_assoc()) {
                $user_name = $userinfo['name'];
                $userfirstchar = $user_name[0];
            ?>
                <div class="users-might">
                    <?php
                    if (empty($userinfo['profile_picture'])) {
                    ?> <div class="profile-avatar">
                            <span><?php echo $userfirstchar; ?></span>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div><a href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>" style="text-decoration: none;">
                                <img src="profile_pic/<?php echo $userinfo['profile_picture']; ?>" width="50"></a>
                        </div> <?php
                            }
                            ?>
                    <div style="margin-left: 10px;">
                        <div style="color:black; font-size: 18px;">
                            <strong>
                                <a style="text-decoration: none; color: black;" href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>">
                                    <?php echo $userinfo['name'] ?>
                                </a>
                            </strong>
                        </div>
                        <div style="color: rgb(95, 94, 94);; font-size: 15px;">
                            <a style="text-decoration: none; color: black;" href="other_user_profile.php?username=<?php echo $userinfo['username'] ?>">
                                @<?php echo $userinfo['username'] ?>
                            </a>
                        </div>
                    </div>
                    <div class="might-follow-users">
                        <a class="user-follow-following follow-btn" data-post-id="<?= $userinfo['id']; ?>">Follow</a>
                    </div>
                </div>
            <?php }
            ?>
            <div>
                <a class="show-more-user-btn">Show more</a>
            </div>
        </div>
    </div>

    <div id="edit-profile-modal" class="edit-modal-overlay">
        <div class="edit-profile-modal-content">
            <form id="edit-user-data" enctype="multipart/form-data" method="post">
                <div class="edit-header">
                    <p id="show-msg"></p>
                    <h2>Edit profile</h2>
                    <button type="submit" class="edit-save-btn">Save</button>
                    <a class="close-edit-form">Close</a>
                </div>

                <!-- for user profile_banner -->
                    <?php
                    if (empty($userDAta['cover_picture'])) { ?>
                        <div class="banner">
                            <span class="icon" onclick="document.getElementById('banner-upload').click();">+</span>
                            <span class="fileerror"></span>
                            <input type="file" name="profile_banner" accept="image/*" id="banner-upload">
                        </div>
                    <?php } else { ?>
                        <div class="banner">
                            <img src="profile_banner/<?php echo $userDAta['cover_picture']; ?>" alt="No banner" width="100%" height="100%">
                            <i class="icon" style="color: black;" onclick="document.getElementById('banner-upload').click();">+</i>
                            <span class="remove-banner">Remove</span>
                            <span class="fileerror"></span>
                            <input type="file" name="profile_banner" accept="image/*" id="banner-upload">
                            <input type="hidden" name="profile_cover" class="file_banner" value="<?php echo $userDAta['cover_picture']; ?>">
                        </div>
                    <?php }
                // for user profile_picture
                if (empty($userDAta['profile_picture'])) { ?>
                    <div class="profile-pic">
                        <span class="icon"><?php echo $_SESSION['firstchr']; ?></span>
                        <i class="icon" style="color: black;" onclick="document.getElementById('profile-upload').click();">+</i>
                        <input type="file" name="profile_pic" accept="image/*" id="profile-upload">
                    </div>
                    <span class="profileerror"></span>
                <?php } else { ?>
                    <div id="dp-pic" class="profile-pic">
                        <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" class="icon" alt="No-dp" width="80">
                        <i class="icon" style="color: black;" onclick="document.getElementById('profile-upload').click();">+</i>
                        <input type="file" name="profile_pic" accept="image/*" id="profile-upload">
                        <input type="hidden" name="profile_picture" value="<?php echo $userDAta['profile_picture']; ?>">
                    </div>
                    <span class="profileerror"></span>
                <?php }
                ?>
                <!-- <span>choose a valid file</span> -->

                <div class="form-group">
                    <label>Name: <span class="edit-userName"></span></label>
                    <input type="hidden" name="userid" value="<?php echo $userDAta['id'] ?>">
                    <input type="text" id="countName" class="Name" name="name" maxlength="20" oninput="NameCharCount()" value="<?php echo $userDAta['name'] ?>">
                    <span style="margin-left: 88%;" id="namecount"></span>
                </div>

                <div class="form-group">
                    <label>Username: <span class="edit-userUsername"></span></label>
                    <input type="hidden" id="edit-valid-username" value="success">
                    <input type="text" id="countUsername" maxlength="15" class="Username" name="username" oninput="UsernameCharCount()" value="<?php echo $userDAta['username'] ?>">
                    <span style="margin-left: 88%;" id="usernamecount"></span>
                </div>

                <div class="form-group">
                    <label>Email: <span class="edit-userEmail"></span></label>
                    <input type="hidden" id="edit-valid-mail" value="success">
                    <input type="text" class="Email" name="email" value="<?php echo $userDAta['email'] ?>">
                </div>

                <div class="form-group">
                    <label>DOB: <span class="edit-userDOB"></span></label>
                    <input type="date" class="DOB" name="dob" value="<?php echo $userDAta['dob'] ?>">
                </div>

                <div class="form-group">
                    <label>Bio</label>
                    <textarea id="bio" name="bio" maxlength="160" rows="3" oninput="updateCharCount()"><?php echo $userDAta['bio'] ?></textarea>
                    <div class="char-count" id="charCount"></div>
                </div>
            </form>
        </div>
    </div>
    <?php
}

// Post insert operation on ajax request
if (isset($_REQUEST['user_post_insert'])) {
    $user_id = trim(isset($_POST['user_id']) ? $_POST['user_id'] : "");
    $Description = trim(isset($_POST['index_heppening_input']) ? $_POST['index_heppening_input'] : "");
    $PostFile = '';

    // for post file
    if (!empty($_FILES['post_file']['name'])) {
        $targetDir = 'posts/';
        $PostFile = time() . '.' . pathinfo($_FILES["post_file"]["name"], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $PostFile;
        move_uploaded_file($_FILES["post_file"]["tmp_name"], $targetFile);
    }

    $sql = "INSERT INTO `twitter_posts`(`user_id`, `post_file`, `description`) VALUES ('$user_id','$PostFile','$Description')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Post SuccessFully...!";
    } else {
        echo "Post Failed...!";
    }
}

// Post insert operation on ajax request
if (isset($_REQUEST['left_post_insert'])) {
    $user_id = trim(isset($_POST['user_id']) ? $_POST['user_id'] : "");
    $Description = trim(isset($_POST['post_description']) ? $_POST['post_description'] : "");
    $PostFile = '';

    // for post file
    if (!empty($_FILES['post_file']['name'])) {
        $targetDir = 'posts/';
        $PostFile = time() . '.' . pathinfo($_FILES["post_file"]["name"], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $PostFile;
        move_uploaded_file($_FILES["post_file"]["tmp_name"], $targetFile);
    }

    $sql = "INSERT INTO `twitter_posts`(`user_id`, `post_file`, `description`) VALUES ('$user_id','$PostFile','$Description')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Post SuccessFully...!";
    } else {
        echo "Post Failed...!";
    }
}

// like insert & Count operation on ajax request
if (isset($_REQUEST['post_like_insert'])) {
    $userId = $_SESSION['login_user_id'];
    $postId = $_POST['post_id'];
    $current_user_name = $_SESSION['userid'];

    // find postid to userid
    $find_userQuery = "SELECT * FROM twitter_posts WHERE id = '$postId'";
    $userResult = mysqli_query($conn, $find_userQuery);
    $postUser = mysqli_fetch_assoc($userResult);
    $UserID = $postUser['user_id'];

    // Check if already like
    $check_query = "SELECT * FROM twitters_post_likes WHERE user_id = '$userId' AND post_id = '$postId' AND likeable_type = 'post'";
    $check = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check) > 0) {
        // if liked to unlike
        $delete_like_query = "DELETE FROM twitters_post_likes WHERE user_id = '$userId' AND post_id = '$postId'";
        $runResult = mysqli_query($conn, $delete_like_query);
        if($runResult){
            $delete_notification = "DELETE FROM `twitter_notifications` WHERE post_id = '$postId' AND type = 'like'";
            $delete_notification_result = mysqli_query($conn, $delete_notification);
            $liked = false;
        }
    } else {
        // insert like if not liked
        $like_insert_query = "INSERT INTO twitters_post_likes (`user_id`, `post_id`, `likeable_type`) VALUES ('$userId','$postId','post')";
        $like_insert_result = mysqli_query($conn, $like_insert_query);
        if ($like_insert_result) {
            if ($UserID === $userId) {
                $liked = true;
            } else {
                $insert_notification = "INSERT INTO twitter_notifications(user_id, sender_id, post_id, type, message)
                VALUES ('$UserID', '$userId', '$postId', 'like', '@$current_user_name liked your post.')";
                $notification = mysqli_query($conn, $insert_notification);
                $liked = true;
            }
        }
    }

    //like Count 
    $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $postId";
    $LikeCount = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($LikeCount);

    echo json_encode([
        'like_count' => $data['total'],
        'liked' => $liked
    ]);
}

// comment like insert & Count operation on ajax request
if (isset($_REQUEST['comment_like_insert'])) {
    $userId = $_SESSION['login_user_id'];
    $commentID = $_POST['comment_id'];
    $current_user_name = $_SESSION['userid'];

    // find comment id to userid
    $find_userQuery = "SELECT * FROM twitter_post_comments WHERE id = '$commentID'";
    $userResult = mysqli_query($conn, $find_userQuery);
    $postUser = mysqli_fetch_assoc($userResult);
    $UserID = $postUser['user_id'];

    // Check if already like
    $check_query = "SELECT * FROM twitters_post_likes WHERE user_id = '$userId' AND liked_id = '$commentID' AND likeable_type = 'comment'";
    $check = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check) > 0) {
        // if liked to unlike
        $delete_like_query = "DELETE FROM twitters_post_likes WHERE user_id = '$userId' AND liked_id = '$commentID' AND likeable_type = 'comment'";
        $runResult = mysqli_query($conn, $delete_like_query);
        if($runResult){
            $delete_notification = "DELETE FROM `twitter_notifications` WHERE post_id = '$commentID' AND type = 'like'";
            $delete_notification_result = mysqli_query($conn, $delete_notification);
            $liked = false;
        }
    } else {
        // insert like if not liked
        $like_insert_query = "INSERT INTO twitters_post_likes (`user_id`, `liked_id`, `likeable_type`) VALUES ('$userId','$commentID','comment')";
        $like_insert_result = mysqli_query($conn, $like_insert_query);
        if ($like_insert_result) {
            if ($UserID === $userId) {
                $liked = true;
            } else {
                $insert_notification = "INSERT INTO twitter_notifications(user_id, sender_id, post_id, type, message)
                VALUES ('$UserID', '$userId', '$commentID', 'like', '@$current_user_name liked your comment.')";
                $notification = mysqli_query($conn, $insert_notification);
                $liked = true;
            }
        }
    }

    // Like count
    $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE liked_id = $commentID AND likeable_type = 'comment'";
    $LikeCount = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($LikeCount);

    echo json_encode([
        'like_count' => $data['total'],
        'liked' => $liked
    ]);
}

// comment like insert & Count operation on ajax request
if (isset($_REQUEST['reply_like_insert'])) {
    $userId = $_SESSION['login_user_id'];
    $commentID = $_POST['reply_id'];
    $current_user_name = $_SESSION['userid'];

    // find comment id to userid
    $find_userQuery = "SELECT * FROM twitter_post_comments_reply WHERE id = '$commentID'";
    $userResult = mysqli_query($conn, $find_userQuery);
    $postUser = mysqli_fetch_assoc($userResult);
    $UserID = $postUser['user_id'];

    // Check if already like
    $check_query = "SELECT * FROM twitters_post_likes WHERE user_id = '$userId' AND liked_id = '$commentID' AND likeable_type = 'reply'";
    $check = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check) > 0) {
        // if liked to unlike
        $delete_like_query = "DELETE FROM twitters_post_likes WHERE user_id = '$userId' AND liked_id = '$commentID' AND likeable_type = 'reply'";
        $runResult = mysqli_query($conn, $delete_like_query);
        if($runResult){
            $delete_notification = "DELETE FROM `twitter_notifications` WHERE post_id = '$commentID' AND type = 'like'";
            $delete_notification_result = mysqli_query($conn, $delete_notification);
            $liked = false;
        }
    } else {
        // insert like if not liked
        $like_insert_query = "INSERT INTO twitters_post_likes (`user_id`, `liked_id`, `likeable_type`) VALUES ('$userId','$commentID','reply')";
        $like_insert_result = mysqli_query($conn, $like_insert_query);
        if ($like_insert_result) {
            if ($UserID === $userId) {
                $liked = true;
            } else {
                $insert_notification = "INSERT INTO twitter_notifications(user_id, sender_id, post_id, type, message)
                VALUES ('$UserID', '$userId', '$commentID', 'like', '@$current_user_name liked your reply.')";
                $notification = mysqli_query($conn, $insert_notification);
                $liked = true;
            }
        }
    }

    // Like count
    $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE liked_id = $commentID
     AND likeable_type = 'reply'";
    $LikeCount = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($LikeCount);

    echo json_encode([
        'reply_like_count' => $data['total'],
        'liked' => $liked
    ]);
}

// comment insert & Count operation on ajax request
if (isset($_REQUEST['post_comment_insert'])) {
    $Comment = trim(isset($_POST['comment_value']) ? $_POST['comment_value'] : "");
    $userId = $_SESSION['login_user_id'];
    $postId = $_POST['post_id'];

    // insert comment
    $comment_insert_query = "INSERT INTO twitter_post_comments (`user_id`, `post_id`, `comments`)
     VALUES ('$userId','$postId','$Comment')";
    $comment_insert_result = mysqli_query($conn, $comment_insert_query);
    if ($comment_insert_result) {
        $comment = true;
    }

    //comments Count 
    $Count_query = "SELECT COUNT(*) AS total FROM twitter_post_comments WHERE post_id = $postId";
    $comments_count = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($comments_count);

    echo json_encode([
        'comment_count' => $data['total'],
    ]);
}

// reply insert & Count operation on ajax request
if (isset($_REQUEST['post_reply_insert'])) {
    $reply_value = trim(isset($_POST['reply_value']) ? $_POST['reply_value'] : "");
    $userId = $_SESSION['login_user_id'];
    $commentID = $_POST['comment_id'];
    $PostID = $_POST['post_id'];

    // insert comment
    $reply_insert_query = "INSERT INTO twitter_post_comments_reply (`user_id`, `post_id`, `comment_id`, `comment_reply`)
     VALUES ('$userId','$PostID','$commentID', '$reply_value')";
    $reply_insert_result = mysqli_query($conn, $reply_insert_query);
    if ($reply_insert_result) {
        $reply = true;
    }

    //reply Count 
    $Count_query = "SELECT COUNT(*) AS total FROM twitter_post_comments_reply WHERE comment_id = $commentID
     AND present_reply_id IS NULL";
    $reply_count = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($reply_count);

    echo json_encode([
        'reply_count' => $data['total'],
    ]);
}

//   reply insert and count reply on comment reply 
if (isset($_REQUEST['comment_reply_insert'])) {
    $reply_value = trim(isset($_POST['reply_value']) ? $_POST['reply_value'] : "");
    $userId = $_SESSION['login_user_id'];
    $commentID = $_POST['comment_id'];
    $PostID = $_POST['post_id'];
    $reply_id = $_POST['reply_id'];

    // insert reply
    $reply_insert_query = "INSERT INTO twitter_post_comments_reply (`user_id`, `post_id`, `comment_id`,
     `comment_reply`, `present_reply_id`) VALUES ('$userId','$PostID','$commentID', '$reply_value', '$reply_id')";
    $reply_insert_result = mysqli_query($conn, $reply_insert_query);
    if ($reply_insert_result) {
        $reply = true;
    }

    //reply Count 
    $Count_query = "SELECT COUNT(*) AS total FROM twitter_post_comments_reply WHERE comment_id = $commentID
     AND present_reply_id = '$reply_id' ";
    $reply_count = mysqli_query($conn, $Count_query);
    $data = mysqli_fetch_assoc($reply_count);

    echo json_encode([
        'reply_count' => $data['total'],
    ]);
}


// Other user profile all pages working on ajax request
if (isset($_REQUEST['other_Profile_page'])) {
    $page = isset($_REQUEST['other_Profile_page']) ? $_REQUEST['other_Profile_page'] : "";
    $Other_UserId = isset($_REQUEST['other_user_id']) ? $_REQUEST['other_user_id'] : "";

    // fetch other userData
    $finduser_query = "SELECT * FROM `twitter_users` WHERE id = '$Other_UserId'";
    $userinfo = mysqli_query($conn, $finduser_query);
    $userDAta = mysqli_fetch_assoc($userinfo);
    $name = $userDAta['name'];
    $firstchar = $name[0];

    if ($page === 'other-posts') {
        //fetch user Post for profile page
        $post_fetch_user = "SELECT * FROM `twitter_posts` WHERE `user_id` = $Other_UserId ORDER BY `id` DESC";
        $result = mysqli_query($conn, $post_fetch_user);

        if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
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
                $post_Id = $post['id'];
                $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $post_Id";
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
                <div class="user-post-details">
                    <div class="post-information">
                        <?php if (empty($userDAta['profile_picture'])) { ?>
                            <span><?php echo $firstchar; ?></span>
                        <?php } else {
                        ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                                                                                                        } ?>
                        <p><b style="color:black;"><?php echo $userDAta['name'] ?> </b> @<?php echo $userDAta['username'] ?> <b class="user-post-time"><?php echo $output; ?></b></p>
                    </div>

                    <div class="post-information">
                        <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none;">
                            <div>
                                <p class="post-discription"><?php echo $post['description']; ?></p>
                            </div>
                        </a>                        
                    </div>

                    <?php
                    $myfile = $post['post_file'];
                    if (!empty($myfile)) {
                        $ext = explode(".", $myfile);
                        if (strtolower(end($ext)) == "mp4") {
                    ?>
                    <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none;">
                        <div class="post-img">
                            <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                <source src="posts/<?php echo $post['post_file']; ?>" type="video/mp4">
                            </video>
                        </div>
                    </a>
                            
                        <?php
                        } else {
                        ?>
                        <a href="post_reply.php?post_id=<?php echo $post["id"]; ?>" style="text-decoration: none;">
                            <div class="post-img">
                                <img src="posts/<?php echo $post['post_file']; ?>" alt="No post file" width="97%" height="450px">
                            </div>
                        </a>                            
                        <?php
                        } ?>

                    <?php }
                    ?>

                    <div class="post-reactions">
                        <a class="like-post" data-post-id="<?= $post['id']; ?>">
                            <i class="<?php if (mysqli_num_rows($userLiked_query) > 0) {
                                            echo "fa-solid text-pink fa-heart";
                                        } else {
                                            echo "fa-regular fa-heart";
                                        } ?>">
                                <span class="like-count">
                                    <?php
                                    if (!empty($likeData['total'])) {
                                        echo $likeData['total'];
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </span>
                            </i>
                        </a>

                        <a class="comment-post" data-post-id="<?= $post['id']; ?>">
                            <i class="fa-regular fa-comment"> <span class="comment-count">
                                    <?php if (!empty($commentData['total'])) {
                                        echo $commentData['total'];
                                    } else {
                                        echo "";
                                    } ?></span>
                            </i>
                        </a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="highlight-show-Data">
                <h3>No any post on your profile</h3>
            </div>
        <?php
        }
    }

    // for Media
    if ($page === 'other-media') {
        $media_query = "SELECT * FROM twitter_posts WHERE user_id = $Other_UserId AND post_file != '' ORDER BY id DESC";
        $media_result = mysqli_query($conn, $media_query);

        if ($media_result->num_rows > 0) {
        ?>
            <div>
                <?php
                while ($media_post = $media_result->fetch_assoc()) {
                    $myfile = $media_post['post_file'];
                    if (!empty($myfile)) {
                        $ext = explode(".", $myfile);
                        if (strtolower(end($ext)) == "mp4") {
                        } else {
                ?> <img src="posts/<?php echo $media_post['post_file'] ?>" width="32.7%"> 
                <?php
                        }
                    }
                }
                ?>
            </div>
            <?php
        }
    }
}

// any user show following list
if (isset($_REQUEST['following_users'])) {
    $userID = isset($_POST['userid']) ? $_POST['userid'] : "";
    $loginUserid = $_SESSION['login_user_id'];

    // find following users data
    $followingUsersQuery = "SELECT u.id, u.name, u.username, u.profile_picture
                                    FROM twitter_followers tf
                                    JOIN twitter_users u ON tf.followers = u.id
                                    WHERE tf.following = $userID";

    $following_result = mysqli_query($conn, $followingUsersQuery);
    include 'layout/followers_info.php';
}


// any user show following list
if (isset($_REQUEST['followers_users'])) {
    $userID = isset($_POST['userid']) ? $_POST['userid'] : "";
    $loginUserid = $_SESSION['login_user_id'];

    // find following users data
    $followingUsersQuery = "SELECT u.id, u.name, u.username, u.profile_picture
                                    FROM twitter_followers tf
                                    JOIN twitter_users u ON tf.following = u.id
                                    WHERE tf.followers = $userID";

    $following_result = mysqli_query($conn, $followingUsersQuery);
    include 'layout/followers_info.php';
}

if (isset($_REQUEST['follow_other_profile_id'])) {
    $opponent_id = isset($_POST['follow_other_profile_id']) ? $_POST['follow_other_profile_id'] : "";
    $userId = $_SESSION['login_user_id'];

    // Check if already followed
    $isFollowing = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'")) > 0;

    if ($isFollowing) {
        // Unfollow
        mysqli_query($conn, "DELETE FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'");
        $delete_notification = "DELETE FROM `twitter_notifications` WHERE user_id = '$opponent_id' AND sender_id = '$userId' AND type = 'follow'";
            $delete_notification_result = mysqli_query($conn, $delete_notification);
    } else {
        // Follow
        mysqli_query($conn, "INSERT INTO twitter_followers(followers, following) VALUES ('$opponent_id','$userId')");

        $insert_notification = "INSERT INTO twitter_notifications(user_id, sender_id, type, message)
        VALUES ('$opponent_id', '$userId', 'follow', '@$_SESSION[userid] Started to following you.')";
        $notification = mysqli_query($conn, $insert_notification);
    }

    // Recheck relationship status
    $iFollow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$opponent_id' AND following = '$userId'")) > 0;
    $theyFollow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM twitter_followers WHERE followers = '$userId' AND following = '$opponent_id'")) > 0;

    $status = "Follow";
    if ($iFollow && $theyFollow) {
        $status = "Following"; // Mutual or you're already following
    } elseif ($iFollow) {
        $status = "Following";
    } elseif ($theyFollow) {
        $status = "Follow Back";
    }

    // Counts
    $following = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitter_followers WHERE following = $opponent_id"));
    $followers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitter_followers WHERE followers = $opponent_id"));

    echo json_encode([
        'following_count' => $following['total'],
        'followers_count' => $followers['total'],
        'status' => $status
    ]);
}

// search
if (isset($_REQUEST['search_input_data'])) {
    $search_data = trim(isset($_POST['search_input_data']) ? $_POST['search_input_data'] : "");
    if ($search_data !== "") {
        $search_query = "SELECT id, name, username, profile_picture FROM twitter_users WHERE name LIKE '%$search_data%' OR username LIKE '%$search_data%'";
        $result = mysqli_query($conn, $search_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $firstchar = $name[0];
            ?>
                <a href="other_user_profile.php?username=<?php echo $row['username']; ?>" style="text-decoration: none; cursor: pointer;">
                    <div class="search-user">
                        <?php
                        if (!empty($row['profile_picture'])) { ?>
                            <img src="profile_pic/<?php echo $row['profile_picture']; ?>" alt="DP">
                        <?php } else { ?>
                            <span class="search-firstchar"><?php echo $firstchar; ?></span>
                        <?php }
                        ?>
                        <div class="user-info">
                            <span><?php echo $row['name']; ?></span>
                            <span>@<?php echo $row['username']; ?></span>
                        </div>
                    </div>
                </a>
            <?php
            }
        } else {
            // Data not found message
            ?>
            <div style="text-align:center;">
                <span>Data not found</span>
            </div>
        <?php
        }
    }
}


// show notifications data  
if (isset($_REQUEST['other_notifications_show'])) {
    $login_user_id = $_SESSION['login_user_id'];

    // notification update is ready
    $isread = "SELECT * FROM `twitter_notifications` WHERE user_id = '$login_user_id'";
    $update_result = mysqli_query($conn, $isread);
    while ($row = mysqli_fetch_assoc($update_result)) {
         $is_read_value = $row['is_read'];
         if($is_read_value === '0'){
            $update_query = "UPDATE `twitter_notifications` SET `is_read`='1' WHERE user_id = '$login_user_id'";
            mysqli_query($conn,$update_query);
         }
    }

    
    $notification_query = "SELECT tn.*, tu.name, tu.username, tu.profile_picture
                            FROM twitter_notifications tn
                            JOIN twitter_users tu ON tn.sender_id = tu.id
                            WHERE tn.user_id = '$login_user_id'
                            ORDER BY tn.created_at DESC";

    $userResult = mysqli_query($conn, $notification_query);

    if (mysqli_num_rows($userResult) > 0) {
        while ($row = mysqli_fetch_assoc($userResult)) {
            $name = $row['name'];
            $firstchar = $name[0];

            date_default_timezone_set("Asia/Kolkata");
            $postTime = new DateTime($row['created_at']);
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
        ?>
            <div class="post">
                <div class="like-notification">
                    <?php
                    if ($row['type'] == "like") { ?>
                        <div><img src="image/like.jpg" alt="" width="20" style="margin-top: 7px; margin-right: 7px;"></div>
                    <?php }
                    ?>
                    <?php
                    if (empty($row['profile_picture'])) { ?>
                        <div class="like-profile"><?php echo $firstchar; ?>
                        </div>
                        <span><?php echo $row['name']; ?></span>
                            <span> .<?php echo $output; ?></span>
                           <span class="delete-notification-icon" data-notification-id="<?= $row['id']; ?>">
                                <i class="fa-solid fa-trash" style="color: red;"></i>
                           </span>
                    <?php } else { ?>
                        <div class="like-profile-img">
                            <img src="profile_pic/<?php echo $row['profile_picture']; ?>" alt="" width="35">
                            <span style="font-weight: 700; font-size: 16px;"><?php echo $row['name']; ?></span>
                            <span> .<?php echo $output; ?></span>
                        </div>
                        <span class="delete-notification-icon" data-notification-id="<?= $row['id']; ?>">
                            <i class="fa-solid fa-trash" style="color: red;"></i>
                        </span>
                    <?php }
                    ?>
                </div>
                <p style="margin-left: 60px;"><?php echo $row['message'] ?></p>
                <!-- <a href="">
                    <div>
                        <img src="posts/" alt="">
                    </div>
                </a> -->
            </div>
<?php   }
    }else{ ?>
        <p class="no-notification">No Notifications</p>
    <?php }
}

if (isset($_REQUEST['is_read_notification'])) {
    $login_user_id = $_SESSION['login_user_id'];
    
    $isread_query = "SELECT COUNT(*) as unread_count FROM twitter_notifications 
                     WHERE user_id = '$login_user_id' AND is_read = 0";
    
    $result = mysqli_query($conn, $isread_query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['unread_count'];
        echo json_encode(['unread_count' => $count]);
    }
}

if (isset($_REQUEST['notification_delete'])) {
    $notification_id = $_REQUEST['notification_delete'];
    
    $notification_delete_query = "DELETE FROM `twitter_notifications` WHERE id = '$notification_id'";
    $deleteResult = mysqli_query($conn, $notification_delete_query);
    if($deleteResult){
        $status = "success";
    }else{
        $status = "failed";
    }

    echo json_encode([
        'status' => $status
    ]);
}
?>
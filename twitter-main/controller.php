<?php
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


// check email exits...
if(isset($_REQUEST['mailexits'])){
    $Emaildata = trim(isset($_POST['email']) ? $_POST['email'] : "");

    $emailcheck = "SELECT * FROM twitter_users WHERE email = '$Emaildata'";
    $resultemail = mysqli_query($conn,$emailcheck);
    if($resultemail->num_rows>0){
        echo json_encode([
            'status'=>'failed'
        ]);
    }else{
        echo json_encode([
            'status'=>'success'
        ]);
    }
}

// check username exits...
if(isset($_REQUEST['usernameexits'])){
    $usernamedata = trim(isset($_POST['username']) ? $_POST['username'] : "");

    $usercheck = "SELECT * FROM twitter_users WHERE username = '$usernamedata'";
    $resultuser = mysqli_query($conn,$usercheck);
    if($resultuser->num_rows>0){
        echo json_encode([
            'status'=>'failed'
        ]);
    }else{
        echo json_encode([
            'status'=>'success'
        ]);
    }
}

// login operation on ajax request
if (isset($_REQUEST['loginuser'])) {
    $loginData = trim(isset($_POST['userid']) ? $_POST['userid'] : "");
    $password = trim(isset($_POST['userpass']) ? $_POST['userpass'] : "");

    // find username using user email
    $findusername = "SELECT * FROM `twitter_users` WHERE email = '$loginData';";
    $result = mysqli_query($conn,$findusername);
    $userDAta = mysqli_fetch_assoc($result);
    if($userDAta){
        $username = $userDAta['username'];
    }else{
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

// Following Data
if (isset($_REQUEST['following_data'])) {
    ?>
        <div class="post">
            <div class="input-post">
                <?php
                    include 'login_user_data.php';
                    if(empty($userDAta['profile_picture'])){
                    ?><div class="profile-dp"><span><?php echo $_SESSION['firstchr']?></span></div><?php
                    }else{
                    ?><img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                    }
                ?>
                <div class="happening-input">
                    <input type="text" id="post_input" name="input_post" value="" placeholder="Whats's happening?">
                </div>
            </div>

            <div class="post-options">
                <label for="image"><span class="image"><img src="image/gallery.png" width="20"></span></label>
                <input type="file" name="image" accept="image/*" id="image">
                <span class="extra-input"><img src="image/gif.png" width="25"></span>
                <span class="extra-input"><img src="image/grok.png" width="25"></span>
                <span class="extra-input"><img src="image/polling.png" width="20"></span>
                <span class="extra-input"><img src="image/emoji.png" width="20"></span>
                <span class="extra-input"><img src="image/schedule.png" width="20"></span>
                <span class="extra-input"><img src="image/location.png" width="20"></span>
                <button>Post</button>
            </div>
        </div>

        <div class="post">Following Data show </div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
    <?php
}

// Foryou Data
if (isset($_REQUEST['foryou_data'])) {
    ?>
        <div class="post">
            <div class="input-post">
                    <?php
                     include 'login_user_data.php';
                     if(empty($userDAta['profile_picture'])){
                        ?><div class="profile-dp"><span><?php echo $_SESSION['firstchr']?></span></div><?php
                     }else{
                        ?><img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                     }
                    ?>
                <div class="happening-input">
                    <input type="text" id="post_input" name="input_post" value="" placeholder="Whats's happening?">
                </div>
            </div>

            <div class="post-options">
                <label for="image"><span class="image"><img src="image/gallery.png" width="20"></span></label>
                <input type="file" name="image" accept="image/*" id="image">
                <span class="extra-input"><img src="image/gif.png" width="25"></span>
                <span class="extra-input"><img src="image/grok.png" width="25"></span>
                <span class="extra-input"><img src="image/polling.png" width="20"></span>
                <span class="extra-input"><img src="image/emoji.png" width="20"></span>
                <span class="extra-input"><img src="image/schedule.png" width="20"></span>
                <span class="extra-input"><img src="image/location.png" width="20"></span>
                <button>Post</button>
            </div>
        </div>

        <div class="post">For you Data show </div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
        <div class="post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eos voluptate inventore quod tenetur sit quia quibusdam. Nobis, dolorem libero, aut ea non commodi similique quaerat aperiam architecto culpa dignissimos?</div>
    <?php
}

// profile all pages fetch Dynamic Data using ajax request
if (isset($_REQUEST['Profilepage'])) {
    $page = isset($_REQUEST['Profilepage']) ? $_REQUEST['Profilepage'] : "";
    // fetch login userData
    include 'login_user_data.php';

    if($page === 'Posts' || $page === 'Replies'){
        //fetch user Post for profile page
        $post_fetch_user = "SELECT * FROM `twitter_posts` WHERE `user_id` = $userDAta[id] ORDER BY `id` DESC";
        $result = mysqli_query($conn, $post_fetch_user);

        if ($result->num_rows > 0) {
            while($post = $result->fetch_assoc()) {
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
                }
                
                elseif ($months > 0) {
                    $output = $months . 'M';
                }

                elseif ($weeks > 0) {
                    $output = $weeks . 'W';
                }

                elseif ($days > 0) {
                    $output = $days . 'd';
                }

                elseif ($hours > 0) {
                    $output = $hours . 'h';
                }

                elseif ($minutes > 0) {
                    $output = $minutes . 'm';
                }else{
                $output = ' Just now';
                }

                
                //like Count 
                $post_Id = $post['id'];
                $Count_query = "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $post_Id";
                $LikeCount = mysqli_query($conn, $Count_query);
                $likeData = mysqli_fetch_assoc($LikeCount);

                // check login user liked post
                $useridd = $_SESSION['login_user_id'];
                $query_liked_user = "SELECT * FROM twitters_post_likes WHERE user_id = '$useridd' AND post_id = '$post_Id'";
                $userLiked_query = mysqli_query($conn, $query_liked_user);

                ?>
                <div class="user-post-details">
                    <div class="post-information">
                        <?php if(empty($userDAta['profile_picture'])){ ?>
                            <span><?php echo $_SESSION['firstchr']?></span>
                        <?php }else{
                            ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                        }?>
                        <p><b style="color:black;"><?php echo $userDAta['name']?> </b> @<?php echo $_SESSION['userid']?> <b class="user-post-time"><?php echo $output; ?></b></p>
                         <button type="button" class="post-delete" data-post-id="<?= $post['id']; ?>">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </div>

                    <div class="post-information">
                        <div>
                            <p class="post-discription"><?php echo $post['description']; ?></p>
                        </div>
                    </div>

                    <?php 
                    if(!empty($post['post_file'])){ ?>
                        <div class="post-img">
                            <img src="posts/<?php echo $post['post_file'];?>" alt="No post file" width="97%" height="450px">
                        </div>
                        <!-- <div class="post-img">
                            <video width="100%" height="600px" type="video/mp4" alt="No post file" controls>
                                <source src="posts/ echo $post['post_file'];?>" type="video/mp4">
                            </video>
                        </div> -->
                    <?php }
                    ?>

                    <div class="post-reactions">
                        <a class="like-post" data-post-id="<?= $post['id']; ?>">
                            <i class="<?php if(mysqli_num_rows($userLiked_query) > 0){ echo "fa-solid text-pink fa-heart"; }else{ echo "fa-regular fa-heart"; } ?>"> <span class="like-count"><?php if(!empty($likeData['total'])){ echo $likeData['total']; }else{ echo ""; }?></span></i>
                        </a>

                        <a class="comment-post"><i class="fa-regular fa-comment"> <span></span></i></a>
                    </div>


                    <div class="profile-post-popup">
                        <p><span class="close-post-dlt"><i class="fa-solid fa-xmark"></i></span></p>
                        <a class="delete-post-btn" data-post-id="<?= $post['id']; ?>" style="color:red;">
                            <img src="image/delete_icon.png" width="15"> Delete
                        </a>
                    </div>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="highlight-show-Data">
                <h3>No any post on your profile</h3>
            </div>
            <?php
        }
    }

    // for highlight
    if($page === 'Highlights'){
        ?>
        <div class="highlight-show-Data">
            <h3>No any highlight on your profile</h3>
        </div>
        <?php
    }

    // for Articles
    if($page === 'Articles'){
        ?>
        <div class="highlight-show-Data">
            <h3>No any Articles on your profile</h3>
        </div>
        <?php
    }

    // for Likes
    if($page === 'Likes'){
        ?>
        <div class="highlight-show-Data">
            <h3>You don’t have any likes yet</h3>
            <p>Tap the heart on any post to show it some love. When you do, it’ll show up here.</p>
        </div>
        <?php
    }

    // for Media
    if($page === 'Media'){
        $media_query = "SELECT * FROM twitter_posts WHERE user_id = $userDAta[id] AND post_file != '' ORDER BY id DESC";
        $media_result = mysqli_query($conn, $media_query);      

        if ($media_result->num_rows > 0) {
            ?>
            <div>
                <?php
                while ($media_post = $media_result->fetch_assoc()){
                    ?> <img src="posts/<?php echo $media_post['post_file'] ?>" width="32.7%"> <?php
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
    if(empty($_FILES['profile_pic']['name'])){
        $profile_pic = isset($_POST['profile_picture']) ? $_POST['profile_picture'] : "";
    }else{
        // old profile_picture unlink after select new profile_picture
        $imgquery = "SELECT profile_picture FROM `twitter_users` WHERE `id`=$userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if($imgrow){
            $imagePath = $imgrow['profile_picture'];// find profile_picture from database 
            $imageFullPath = 'profile_pic/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_pic folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_pic/';
        if(!is_dir($targetDir))
        {
            $targetDir = mkdir($targetDir, 0777, true);
        }    
        $profile_pic = time() . '.' . pathinfo($_FILES["profile_pic"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$profile_pic;
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$targetFile);
    }


    // update for profile banner
    if(empty($_FILES['profile_banner']['name'])){
        $profile_banner = isset($_POST['profile_cover']) ? $_POST['profile_cover'] : "";
    }else{
        // old profile_banner unlink after select new profile_banner
        $imgquery = "SELECT cover_picture FROM `twitter_users` WHERE `id` = $userID";
        $result = mysqli_query($conn, $imgquery);
        $imgrow = mysqli_fetch_assoc($result);
        if($imgrow){
            $imagePath = $imgrow['cover_picture'];// find profile_picture from database 
            $imageFullPath = 'profile_banner/' . $imagePath;

            if (file_exists($imageFullPath)) { // unlink image from profile_banner folder
                unlink($imageFullPath);
            }
        } // end unlink

        $targetDir = 'profile_banner/';
        if(!is_dir($targetDir))
        {
            $targetDir = mkdir($targetDir, 0777, true);
        }    
        $profile_banner = time() . '.' . pathinfo($_FILES["profile_banner"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$profile_banner;
        move_uploaded_file($_FILES["profile_banner"]["tmp_name"],$targetFile);
    }

    $sql = "UPDATE `twitter_users` SET `username`='$Username',`name`='$Name',`email`='$Email',`dob`='$Dob',
       `bio`='$Bio',`profile_picture`='$profile_pic',`cover_picture`='$profile_banner' WHERE `id`=$userID";
    
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["userid"] = $Username;
        echo "update successfull";
    }else{
        echo "update failed";
    }
}

// profile page record fetch
if (isset($_REQUEST['profile_page_record'])){    
    // include file of left-sidebar 
    include 'layout/left-sidebar.php';
    ?>
    <div class="center-main" style="margin: 0 497px 0 280px;">
        <div class="profile-center-header">
            <div class="profile-head"><span id=""><?php echo $userDAta['name']?> <br> <span class="profile-post-all-count"><?php echo $totalPosts;?> posts</span></span></div>

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
            <?php
             // fetch login userData
            include 'login_user_data.php';
            ?>
            <div class="post" id="profile-dp-show">
                <?php if(empty($userDAta['profile_picture'])){ ?>
                    <span><?php echo $_SESSION['firstchr']?></span>
                <?php }else{
                    ?> <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" id="profile-dp-show" alt="no file"><?php
                }?>
                    <button id="edit-profile-btn">Edit profile</button>
                    <div class="user-profile-info">
                    <h3><?php echo $userDAta['name']?></h3>
                    <p>@<?php echo $userDAta['username'];?></p>
                    <p><i class="fa-solid fa-calendar-days"></i> <?php echo "Joined " . date("F Y", strtotime($userDAta['join_date'])); ?></p>
                    <p><?php echo $userDAta['bio'];?></p>
                    <p><b>3</b> Following&nbsp&nbsp <b>1</b> Followers</p>
                    </div>
            </div>
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
            <div class="users-might">
                <!-- <div><img src="image/dp.jpg" width="50"></div> -->
                <div class="profile-avatar"><span>R</span></div>
                <div style="margin-left: 10px;">
                    <div style="color:black; font-size: 18px;"><strong>Ravi Mali</strong></div>
                    <div style="color: rgb(95, 94, 94);; font-size: 15px;">@Ravikumar8979</div>
                </div>
                <div class="might-follow-users">
                    <a href="">Follow</a>
                </div>
            </div>            
        </div>

        <?php
            // include file of right-footer 
            include 'layout/footer.php';
        ?>
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
                if(empty($userDAta['cover_picture'])){ ?>
                    <div class="banner" onclick="document.getElementById('banner-upload').click();">
                        <span class="icon">+</span>
                        <input type="file" name="profile_banner" accept="image/*" id="banner-upload">
                    </div>
                <?php }else{?>
                    <div class="banner" onclick="document.getElementById('banner-upload').click();">
                        <img src="profile_banner/<?php echo $userDAta['cover_picture']; ?>" alt="No banner" width="100%" height="100%">
                        <i class="icon" style="color: black;">+</i>
                        <input type="file" name="profile_banner" accept="image/*" id="banner-upload">
                        <input type="hidden" name="profile_cover" value="<?php echo $userDAta['cover_picture']; ?>">
                    </div>
                <?php }

                // for user profile_picture
                if(empty($userDAta['profile_picture'])){ ?>
                    <div class="profile-pic" onclick="document.getElementById('profile-upload').click();">
                        <span class="icon"><?php echo $_SESSION['firstchr']; ?></span>
                        <i class="icon" style="color: black;">+</i>
                        <input type="file" name="profile_pic" accept="image/*" id="profile-upload">
                    </div>
                <?php }else{?>
                    <div id="dp-pic" class="profile-pic" onclick="document.getElementById('profile-upload').click();">
                        <img src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" class="icon" alt="No-dp" width="80">
                        <i class="icon" style="color: black;">+</i>
                        <input type="file" name="profile_pic" accept="image/*" id="profile-upload">
                        <input type="hidden" name="profile_picture" value="<?php echo $userDAta['profile_picture']; ?>">
                    </div>
                <?php }
                ?>

                <div class="form-group">
                    <label>Name: </label>
                    <input type="hidden" name="userid" value="<?php echo $userDAta['id']?>">
                    <input type="text" name="name" value="<?php echo $userDAta['name']?>">
                </div>

                <div class="form-group">
                    <label>Username: </label>
                    <input type="text" name="username" value="<?php echo $userDAta['username']?>">
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="text" name="email" value="<?php echo $userDAta['email']?>">
                </div>

                <div class="form-group">
                    <label>DOB: </label>
                    <input type="date" name="dob" value="<?php echo $userDAta['dob']?>">
                </div>

                <div class="form-group">
                    <label>Bio</label>
                    <textarea id="bio" name="bio" maxlength="160" rows="3" oninput="updateCharCount()"><?php echo $userDAta['bio']?></textarea>
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
    $Description = trim(isset($_POST['post_description']) ? $_POST['post_description'] : "");
    $PostFile = '';

    // for post file
    if(!empty($_FILES['post_file']['name'])){
        $targetDir = 'posts/';
        $PostFile = time() . '.' . pathinfo($_FILES["post_file"]["name"],PATHINFO_EXTENSION);
        $targetFile = $targetDir .$PostFile;
        move_uploaded_file($_FILES["post_file"]["tmp_name"],$targetFile);
    }

    $sql = "INSERT INTO `twitter_posts`(`user_id`, `post_file`, `description`) VALUES ('$user_id','$PostFile','$Description')";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "Post SuccessFully...!";
    }else{ 
        echo "Post Failed...!";
    }
}

// like insert & Count operation on ajax request
if (isset($_REQUEST['post_like_insert'])){
    $userId = $_SESSION['login_user_id'];
    $postId = $_POST['post_id'];
    
    // Check if already like
    $check_query = "SELECT * FROM twitters_post_likes WHERE user_id = '$userId' AND post_id = '$postId'";
    $check = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check) > 0){
        // if liked to unlike
        $delete_like_query = "DELETE FROM twitters_post_likes WHERE user_id = '$userId' AND post_id = '$postId'";
        mysqli_query($conn,$delete_like_query);
        $liked = false;
    } else {
        // insert like if not liked
        $like_insert_query = "INSERT INTO twitters_post_likes (`user_id`, `post_id`, `likeable_type`) VALUES ('$userId','$postId','post')";
        $like_insert_result = mysqli_query($conn,$like_insert_query);
        if($like_insert_query){
            $liked = true;
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
?>
<div class="might-like">
    <h3>You might like</h3>
    <!-- you might like show 3 user using limit -->
    <?php
    $useridd = $_SESSION['login_user_id'];

    $all_users = "SELECT * FROM twitter_users WHERE id != '$useridd'
    AND id NOT IN ( SELECT followers FROM twitter_followers WHERE following = '$useridd')";

    $users_result = mysqli_query($conn, $all_users);
        while($userinfo = $users_result->fetch_assoc()) {
                $user_name = $userinfo['name'];
                $userfirstchar = $user_name[0];
            ?>
            <div class="users-might">
                <?php
                if(empty($userinfo['profile_picture'])){
                    ?> <div class="profile-avatar"><span><a href="other_user_profile.php?username=<?php echo $userinfo['username'];?>"><?php echo $userfirstchar; ?></a></span></div> <?php
                }else{
                    ?> <div><a href="other_user_profile.php?username=<?php echo $userinfo['username'];?>"><img src="profile_pic/<?php echo $userinfo['profile_picture']; ?>" width="50"></a></div> <?php
                }
                ?>
                <div style="margin-left: 10px;">
                    <div style="color:black; font-size: 18px;"><strong><a style="text-decoration: none; color: black;" href="other_user_profile.php?username=<?php echo $userinfo['username']?>"><?php echo $userinfo['name']?></a></strong></div>
                    <div style="color: rgb(95, 94, 94);; font-size: 15px;"><a style="text-decoration: none;color: black;" href="other_user_profile.php?username=<?php echo $userinfo['username']?>">@<?php echo $userinfo['username']?></a></div>
                </div>
                <div class="might-follow-users">
                    <a class="user-follow-following follow-btn" data-post-id="<?= $userinfo['id']; ?>">Follow</a>
                </div>
            </div>
        <?php }
    ?>
</div>
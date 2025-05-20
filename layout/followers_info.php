<?php
    while($user = mysqli_fetch_assoc($following_result)){
        $firstChar = strtoupper(substr($user['name'], 0, 1)); 
        if($user['id'] === $loginUserid){ ?>
            <div class="user-item">
                <?php 
                    if(!empty($user['profile_picture'])){ ?>
                    <a href="profile.php" style="color: black; text-decoration: none;"><img src="profile_pic/<?php echo $user['profile_picture'];?>" class="user-dp-img" alt="User DP"></a>
                <?php } else { ?>
                    <a href="profile.php" style="color: black; text-decoration: none;"><span class="user-dp"><?php echo $firstChar;?></span></a>
                <?php }
                ?>
                <div class="user-info">
                    <div class="user-name"><a href="profile.php" style="color: black; text-decoration: none;"><?php echo $user['name'];?></a></div>
                    <div class="user-username"><a href="profile.php" style="color: black; text-decoration: none;">@<?php echo $user['username'];?></a></div>
                </div>
            </div>
        <?php
        } else { ?>
        <div class="user-item">
            <?php 
                if(!empty($user['profile_picture'])){ ?>
                <a href="other_user_profile.php?username=<?php echo $user['username'];?>" style="color: black; text-decoration: none;"><img src="profile_pic/<?php echo $user['profile_picture'];?>" class="user-dp-img" alt="User DP"></a>
            <?php } else { ?>
                <a href="other_user_profile.php?username=<?php echo $user['username'];?>" style="color: black; text-decoration: none;"><span class="user-dp"><?php echo $firstChar;?></span></a>
            <?php }
            ?>
            <div class="user-info">
                <div class="user-name"><a href="other_user_profile.php?username=<?php echo $user['username'];?>" style="color: black; text-decoration: none;"><?php echo $user['name'];?></a></div>
                <div class="user-username"><a href="other_user_profile.php?username=<?php echo $user['username'];?>" style="color: black; text-decoration: none;">@<?php echo $user['username'];?></a></div>
            </div>
            <button class="follow-btn-list">Follow</button>
        </div>
        <?php } 
    }
?>
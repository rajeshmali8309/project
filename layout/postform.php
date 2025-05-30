<form class="left-post-form" enctype="multipart/form-data" method="post">
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
            <input type="text" name="index_heppening_input" class="left-post-discription" maxlength="240" id="index-post_description" oninput="postdecCount()" placeholder="What's happening?">
            <input type="hidden" name="user_id" value="<?php echo $userDAta['id']; ?>">
        </div>
        <div id="charcount"></div>
    </div>

    <div class="post-options">
        <label for="image"><span class="image"><img src="image/gallery.png" width="20"></span></label>
        <input type="file" class="left-post-file" name="post_file" accept="image/*,video/*" id="image" style="display: none;">
        <span class="extra-input"><img src="image/gif.png" width="25"></span>
        <span class="extra-input"><img src="image/grok.png" width="25"></span>
        <span class="extra-input"><img src="image/polling.png" width="20"></span>
        <span class="extra-input"><img src="image/emoji.png" width="20"></span>
        <span class="extra-input"><img src="image/schedule.png" width="20"></span>
        <span class="extra-input"><img src="image/location.png" width="20"></span>
        <button id="left-post-btn" type="submit" class="disabled">Post</button>
        <p class="errorPost"></p>
        <h4 class="success-msg"></h3>
    </div>
</form>
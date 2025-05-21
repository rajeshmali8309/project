<div id="post-modal-overlay" class="comment-modal-overlay">
    <div class="post-modal-box">
        <span class="close-post-modal">&times;</span>
        <form class="popup-post-form" enctype="multipart/form-data" method="post">
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
                    <input type="text" class="popup-post-discription" maxlength="240" id="popup_post_description" name="post_description" oninput="postCharCount()" placeholder="What's happening?">
                    <input type="hidden" name="user_id" value="<?php echo $userDAta['id']; ?>"> 
                </div>
                <div id="leftcharCountpost"></div>
            </div>

            <div class="post-options">
                <label for="left-post-img"><span class="image"><img src="image/gallery.png" width="20"></span></label>
                <input type="file" class="popup-post-file" name="post_file" accept="image/*,video/*" id="left-post-img" style="display: none;">
                <span class="extra-input"><img src="image/gif.png" width="25"></span>
                <span class="extra-input"><img src="image/grok.png" width="25"></span>
                <span class="extra-input"><img src="image/polling.png" width="20"></span>
                <span class="extra-input"><img src="image/emoji.png" width="20"></span>
                <span class="extra-input"><img src="image/schedule.png" width="20"></span>
                <span class="extra-input"><img src="image/location.png" width="20"></span>
                <button id="left-post-btn" type="submit" class="disabled">Post</button>
                <p class="errorpost"></p>
                <h4 class="post-success-msg"></h3>
            </div>
        </form>
    </div>
</div>
<div id="post-reply-modal-overlay" class="reply-modal-overlay">
    <div class="reply-modal-box">
        <span class="close-reply-modal">&times;</span>
        <form class="reply-post-form" id="reply-form" enctype="multipart/form-data" method="post">
            <div class="input-post">
                <?php
                    include 'login_user_data.php';
                    if(empty($userDAta['profile_picture'])){
                    ?><div class="profile-dp"><span><?php echo $_SESSION['firstchr']?></span></div><?php
                    }else{
                    ?><img style="width: 52px;" src="profile_pic/<?php echo $userDAta['profile_picture']; ?>" alt="no file"><?php
                    }
                ?>
                <div class="happening-input">
                    <p class="reply-username"><?php echo $userDAta['name'];?> 
                        <span style="font-weight: 400;">@<?php echo $userDAta['username'];?>. <?php echo date("F Y", strtotime($userDAta['join_date'])); ?></span>
                    </p>
                </div>
            </div>
            <p id="reply-error"></p>
            <div class="reply-input">
                <input type="text" class="post-reply" maxlength="100" id="post_reply" name="reply_msg" oninput="replyCharCount()" placeholder="Add Reply">
                <span style="margin: 8px;" id="Countreply-length">0/160</span>
                <input type="hidden" name="user_id" value="<?php echo $userDAta['id']; ?>">
                <input type="hidden" id="reply-post-id" value=""> 
                <input type="hidden" id="post-id-val" value=""> 
                <input type="hidden" id="reply_id_value" value="">
            </div>

            <div class="post-options">
                <button id="left-reply-btn" type="submit">Reply</button>
                <p id="errorreplyPost"></p>
                <h4 class="replysuccess-msg"></h3>
            </div>
        </form>
    </div>
</div>
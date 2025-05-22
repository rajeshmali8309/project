<div id="post-comment-modal-overlay" class="comment-modal-overlay">
    <div class="comment-modal-box">
        <span class="close-comment-modal">&times;</span>
        <form class="comment-post-form" id="cmt-form" enctype="multipart/form-data" method="post">
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
                    <p class="cmt-username"><?php echo $userDAta['name'];?> 
                        <span style="font-weight: 400;">@<?php echo $userDAta['username'];?>. <?php echo date("F Y", strtotime($userDAta['join_date'])); ?></span>
                    </p>
                </div>
            </div>
            <p id="comment-error"></p>
            <div class="comment-input">
                <input type="text" class="post-comment" maxlength="100" id="post_comment" name="comment_msg" oninput="commentCharCount()" placeholder="Add Comment">
                <span style="margin: 8px;" id="Countcomment-length">0/160</span>
                <input type="hidden" name="user_id" value="?php echo $userDAta['id']; ?>">
                <input type="hidden" id="comment-post-id"> 
            </div>

            <div class="post-options">
                <button id="left-comment-btn" type="submit">Post</button>
                <p id="errorPost"></p>
                <h4 class="success-msg"></h3>
            </div>
        </form>
    </div>
</div>
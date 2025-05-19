<div class="post-reactions">
     <a href="#" class="like-post" data-post-id="<?= $post['id']; ?>">
     <i class="fa-heart <?= userLiked($conn, $_SESSION['userid'], $post['id']) ? 'fa-solid text-pink' : 'fa-regular'; ?>"></i>
    <span class="like-count"><?= getLikeCount($conn, $post['id']); ?></span>
    </a>
</div>


<?php
function getLikeCount($conn, $postId) {
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $postId");
    $data = mysqli_fetch_assoc($q);
    return $data['total'];
}

function userLiked($conn, $userId, $postId) {
    $q = mysqli_query($conn, "SELECT 1 FROM twitters_post_likes WHERE user_id = $userId AND post_id = $postId");
    return mysqli_num_rows($q) > 0;
}
?>

<script>
    $(document).on('click', '.like-post', function(e){
    e.preventDefault();
    let postId = $(this).data('post-id'); // kis post ko like kiya
    let likeBtn = $(this);

    $.ajax({
        url: 'ajax/like_post.php',
        method: 'POST',
        data: { post_id: postId },
        success: function(res){
            let response = JSON.parse(res); // response JSON me aayega

            // Like count update karo
            likeBtn.find('.like-count').text(response.like_count);

            // Icon change karo
            let icon = likeBtn.find('i');
            if(response.liked){
                icon.removeClass('fa-regular').addClass('fa-solid text-pink');
            }else{
                icon.removeClass('fa-solid text-pink').addClass('fa-regular');
            }
        }
    });
});
</script>


<?php
session_start();
include '../config.php';

$userId = $_SESSION['userid'];
$postId = $_POST['post_id'];

// Check agar already like hai
$check = mysqli_query($conn, "SELECT * FROM twitters_post_likes WHERE user_id = $userId AND post_id = $postId");

if(mysqli_num_rows($check) > 0){
    // Already like hai, to unlike karo
    mysqli_query($conn, "DELETE FROM twitters_post_likes WHERE user_id = $userId AND post_id = $postId");
    $liked = false;
} else {
    // Like nahi hai, to insert karo
    mysqli_query($conn, "INSERT INTO twitters_post_likes (user_id, post_id) VALUES ($userId, $postId)");
    $liked = true;
}

// Count get karo
$q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM twitters_post_likes WHERE post_id = $postId");
$data = mysqli_fetch_assoc($q);

// JSON format me bhejo response
echo json_encode([
    'like_count' => $data['total'],
    'liked' => $liked
]);
?>
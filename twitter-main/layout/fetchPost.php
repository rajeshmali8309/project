<?php
include('db.php');


session_start();
if (!isset($_SESSION['user_id'])) {
    die("Please log in first.");
}

$user_id = $_SESSION['user_id'];  // logged-in user ID

// Fetch user posts
$sql = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($post = $result->fetch_assoc()) {
        // Post content
        echo "<div class='post'>";
        echo "<p>" . $post['content'] . "</p>";
        
        // Get likes count for this post
        $post_id = $post['id'];
        $likes_sql = "SELECT COUNT(*) AS likes_count FROM likes WHERE post_id = $post_id";
        $likes_result = $conn->query($likes_sql);
        $likes_data = $likes_result->fetch_assoc();
        echo "<p>Likes: " . $likes_data['likes_count'] . "</p>";

        // Get comments count for this post
        $comments_sql = "SELECT COUNT(*) AS comments_count FROM comments WHERE post_id = $post_id";
        $comments_result = $conn->query($comments_sql);
        $comments_data = $comments_result->fetch_assoc();
        echo "<p>Comments: " . $comments_data['comments_count'] . "</p>";

        echo "</div>";
    }
} else {
    echo "No posts found.";
}

$conn->close();
?>

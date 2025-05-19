<?php
1.CREATE TABLE twitter_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    dob DATETIME,
    join_date DATE,
    profile_picture VARCHAR(255),
    cover_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

2.CREATE TABLE twitter_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_file VARCHAR(255),
    description VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE
);

3.CREATE TABLE twitters_post_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    post_likes INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE
);

4.CREATE TABLE twitter_post_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    comments VARCHAR(1000),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES twitter_posts(id) ON DELETE CASCADE
);

5.CREATE TABLE twitter_post_comment_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT,
    user_id INT,
    comment_likes INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (comment_id) REFERENCES twitter_post_comments(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE
);

6.CREATE TABLE twitter_post_comments_reply (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT,
    user_id INT,
    comment_reply VARCHAR(1000),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (comment_id) REFERENCES twitter_post_comments(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE
);

7.CREATE TABLE twitter_followers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    followers INT,
    following INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (followers) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (following) REFERENCES twitter_users(id) ON DELETE CASCADE
);

8.CREATE TABLE twitter_notification (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    like_id INT,
    follow_id INT,
    comment_id INT,
    type ENUM('like', 'follow', 'comment'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES twitter_users(id) ON DELETE CASCADE,
    FOREIGN KEY (like_id) REFERENCES twitters_post_likes(id) ON DELETE SET NULL,
    FOREIGN KEY (follow_id) REFERENCES twitter_followers(id) ON DELETE SET NULL,
    FOREIGN KEY (comment_id) REFERENCES twitter_post_comments(id) ON DELETE SET NULL
);
?>
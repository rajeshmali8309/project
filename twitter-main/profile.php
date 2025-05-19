<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
    <?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Profile/ X</title>
    <style>
        .form-group{
            margin-bottom: 0px;
        }
        .form-group label{
            margin-bottom: -7px;
        }
        .form-group input{
            height: 30px;
        }

        .text-pink{
            color: rgb(231, 14, 50);
        }
        .post-reactions a{
            text-decoration: none;
        }

    </style>
</head>
<body>
    <!-- user profile data show using ajax request -->
    <?php 
    function userLiked($conn, $userId, $postId) {
            $userLiked_query = mysqli_query($conn, "SELECT * FROM twitters_post_likes WHERE user_id = $userId AND post_id = $postId");
            return mysqli_num_rows($userLiked_query) > 0;
        }
    ?>
    <div class="pagecontainer" id="show-user-profile">
    </div>

    <?php include 'layout/post_model.php';
    ?>
</body>
<script>
    
    function profilepage(){
        var profilepage = "userprofile";
        $.ajax({
            url: "controller.php",
            type: "POST",
            data: {
                "profile_page_record": profilepage
                },
            success : function(response){
                $("#show-user-profile").html(response);
                $("#profile").addClass("sidebar-activepage");
                $("#Posts").trigger("click");
            }
        });
    }

    profilepage();

    $(document).ready(function () {
        // start profile page fetch Data using ajax

        function profilepageData(getId) {
            $("#Posts,#Replies,#Highlights,#Articles,#Media,#Likes").removeClass("profile-links-active");
            if(!getId== ''){
                $("#"+getId).addClass("profile-links-active");
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "Profilepage": getId
                    },
                    success : function(response){
                        $("#showPostData").html(response);
                    }
                });
            }
        }

        var profilepageVal = "Posts"
        profilepageData(profilepageVal);

        $(document).on("click", "#Posts", function(){
            profilepageData("Posts");
        });

        $(document).on("click", "#Replies", function(){
            profilepageData("Replies");
        });

        $(document).on("click", "#Highlights", function(){
            profilepageData("Highlights");
        });

        $(document).on("click", "#Articles", function(){
            profilepageData("Articles");
        });

        $(document).on("click", "#Media", function(){
            profilepageData("Media");
        });

        $(document).on("click", "#Likes", function(){
            profilepageData("Likes");
        });
    });

    function updateCharCount() {
        const bio = document.getElementById('bio');
        const count = document.getElementById('charCount');
        count.textContent = `${bio.value.length} / 160`;
    }
</script>
</html>
<?php }else{
    header("location:signup.php");
}
?>
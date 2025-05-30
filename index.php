<?php 
session_start();
if(isset($_SESSION["userid"])){ ?>
<html lang="en">
<head>
<?php
    // include file of head section items 
    include 'layout/header.php';
    ?>
    <title>Home / X</title>
    <style>
        .rightbar{
            margin-right: 58px;
            right: -17px;
        }
        .profile-center-header{
            margin-left: 45px;
            width: 48.2%;
        }
        .post {
            width: 632px;
        }
        .post-options button {
            margin-left: 118px;
        }

        .text-pink{
            color: rgb(231, 14, 50);
        }
        .post-reactions a{
            text-decoration: none;
        }
        .post-reactions {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="pagecontainer">
    <?php
        include 'login_user_data.php';
        // include file of left-sidebar 
        include 'layout/left-sidebar.php';
        ?>

        <div class="center-main" style="margin: 0 497px 0 280px;">
            <div class="center-header">
                <div id="for-you"><span id="for_active" class="foryou-following-active"> For you </span></div>

                <div id="Following"><span id="following"> Following </span></div>

                <?php
                include 'layout/search_bar.php'; 
                ?>
                
            </div>

            <div class="center-content" style="padding-top: 56px;">
                <!-- show foryou/following Data using ajax request -->
            </div>
        </div>

        <div class="rightbar">
            <?php 
              include 'layout/right_footer.php'; 
              include 'layout/footer.php';
            ?>
        </div>
    </div>
    <?php include 'layout/post_model.php'; ?>
    <?php include 'layout/add_comment_model.php'; ?>
</body>
<script>
    $(document).ready(function () {
        $("#home").addClass("sidebar-activepage");

        //ajax request for following Data default show
        $("#following").removeClass("foryou-following-active");
        $("#for_active").addClass("foryou-following-active");
        var for_you = "foryou";
        $.ajax({
            url: "controller.php",
            type: 'post',
            data: {
                "foryou_data": for_you
            },
            success : function(response){
                $(".center-content").html(response);
            }
        });

        $(document).on('click', '.delete-post-reply', function (){
            var Post_ID = $(this).data('id-post');
            if (window.confirm("Are you sure you want to delete this post?")) {
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "post_delete_id": Post_ID,
                    },
                    success: function (response) {
                        var deleteresult = JSON.parse(response);
                        if (deleteresult.status == 'success') {
                            setTimeout(function () {
                                $("#for-you").trigger("click");
                            }, 1000);
                        }
                    }
                });
            }
        });
    });
</script>
</html>
<?php }else{
    header("location:signup.php");
}
?>
$(document).ready(function () {
    //open signup form
    $('.create-account').click(function (e) {
        $(".signup-new")[0].reset();
        $('.signin-form').fadeOut();
        $("#errorName").text("");
        $("#errorEmail").text("");
        $("#errorPassword").text("");
        $("#errorUsername").text("");
        $("#errorDOB").text("");
        e.preventDefault();
        $('.signup-form').fadeIn();
        $('.overlay').fadeIn();
        $('body').css('overflow', 'hidden');
    });

    $('.close-form').click(function () {
        $('.signup-form').fadeOut();
        $('.overlay').fadeOut();
        $('body').css('overflow', 'auto');
    });

    // open signin form 
    $('.sign-in-account').click(function (e) {
        $(".login-form")[0].reset();
        e.preventDefault();
        $('.signin-form').fadeIn();
        $('.overlay').fadeIn(); // show overlay
        $('body').css('overflow', 'hidden');
    });

    $('.close-signin').click(function () {
        $('.signin-form').fadeOut();
        $('.overlay').fadeOut(); // hide overlay
        $('body').css('overflow', 'auto');
    });

    // Prevent clicks on background when popup is open form
    $('.signup-form, .signin-form').on('click', function (e) {
        e.stopPropagation();
    });

    //signin page to signup page
    $("#signup-click").click(function () {
        $('.signin-form').fadeOut();
        $('body').css('overflow', 'auto');
        $('.signup-form').fadeIn();
        $('.overlay').fadeIn();
        $('body').css('overflow', 'hidden');
    });

    // sign up form validation
    // on blur
    $("input").blur(function () {
        var nameRgxpattern = /^[A-Za-z ]{3,20}$/;
        var usernamergxpattern = /^[a-z0-9_.]{5,15}$/;
        var emailRgxpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
        var passRgxpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;

        let inputID = $(this).attr("id");
        if ($(this).val() === '') {
            $("#error" + inputID).text(inputID + " field is Require");
            $("#error" + inputID).css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
        } else {
            $("#error" + inputID).text("");
            // Regex for Name
            if ($("#Name").attr("id") === inputID) {
                var nameVal = $(this).val().trim();
                if (nameRgxpattern.test(nameVal)) {
                    $("#errorName").text("");
                } else {
                    $("#errorName").text("minimum 3 and maximum 20 characters allow");
                    $("#errorName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                }
            }

            // Regex for Username
            if ($("#Username").attr("id") === inputID) {
                var usernameVal = $(this).val().trim();
                if (usernamergxpattern.test(usernameVal)) {
                    //check username exits
                    var usercheck = "action"
                    $.ajax({
                        url: "controller.php",
                        type: 'post',
                        data: {
                            "username": usernameVal,
                            "usernameexits": usercheck
                        },
                        success: function (response) {
                            var userexitsdata = JSON.parse(response);
                            if (userexitsdata.status == 'failed') {
                                $("#validuserinput").val("failed");
                                $("#errorUsername").text("username has already been taken.");
                            } else {
                                $("#validuserinput").val("success");
                                $("#errorUsername").text("");
                            }
                        }
                    });
                } else {
                    $("#errorUsername").text("(!invalid username)allow only a-z,0-9,_,.(5-15)");
                    $("#errorUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                }
            }

            // Regex for Email
            if ($("#Email").attr("id") === inputID) {
                var emailVal = $(this).val().trim();
                if (emailRgxpattern.test(emailVal)) {
                    $("#errorEmail").text("");
                    //check email exits
                    var emailcheck = "action"
                    $.ajax({
                        url: "controller.php",
                        type: 'post',
                        data: {
                            "email": emailVal,
                            "mailexits": emailcheck
                        },
                        success: function (response) {
                            var data = JSON.parse(response)
                            if (data.status == 'failed') {
                                $("#validmailinput").val("failed");
                                $("#errorEmail").text("Email has already been taken.");
                            } else {
                                $("#errorEmail").text("");
                                $("#validmailinput").val("success");
                            }
                        }
                    });
                } else {
                    $("#errorEmail").text("Invalid email...!");
                }
            }

            // Regex for Password
            if ($("#Password").attr("id") === inputID) {
                var passwordVal = $(this).val().trim();
                if (passRgxpattern.test(passwordVal)) {
                    $("#errorPassword").text("");
                } else {
                    $("#errorPassword").text("Invalid password..(8/15)");
                    $("#errorPassword").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                }
            }
        }
    });

    //remove validation on focus 
    $("input").focus(function () {
        let focusID = $(this).attr("id");
        $("#error" + focusID).text("");
    });


    // validation on submit
    $(".signup-new").submit(function (event) {
        var namepattern = /^[A-Za-z ]{3,20}$/;
        var usernamepattern = /^[a-z0-9_.]{5,15}$/;
        var emailpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
        var passpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
        var isValid = true;
        if ($("#Name").val() === '') {
            $("#errorName").text("Name field is Require");
            $("#errorName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            // Regex for Name on submit
            nameValue = $("#Name").val();
            if (namepattern.test(nameValue)) {
                $("#errorName").text("");
            } else {
                $("#errorName").text("minimum 3 and maximum 20 characters allow");
                $("#errorName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                isValid = false;
            }
        }

        if ($("#Username").val() === '') {
            $("#errorUsername").text("Username field is Require");
            $("#errorUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            // Regex for Name on submit
            userValue = $("#Username").val();
            if (usernamepattern.test(userValue)) {
                //check username exits
                var usernamecheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "username": userValue,
                        "usernameexits": usernamecheck
                    },
                    success: function (response) {
                        var userdata = JSON.parse(response);
                        if (userdata.status == 'failed') {
                            $("#validuserinput").val("failed");
                            $("#errorUsername").text("username has already been taken.");
                        } else {
                            $("#validuserinput").val("success");
                            $("#errorUsername").text("");
                        }
                    }
                });
            } else {
                $("#errorUsername").text("(!invalid username)allow only a-z,0-9,_,.(5-15)");
                $("#errorUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                isValid = false;
            }
        }

        if ($("#Password").val() === '') {
            $("#errorPassword").text("Password field is Require");
            $("#errorPassword").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            passValue = $("#Password").val();
            if (passpattern.test(passValue)) {
                $("#errorPassword").text("");
            } else {
                $("#errorPassword").text("Invalid password..(8/15)");
                $("#errorPassword").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                isValid = false;
            }
        }

        if ($("#Email").val() === '') {
            $("#errorEmail").text("Email field is Require");
            isValid = false;
        } else {
            emailValue = $("#Email").val();
            if (emailpattern.test(emailValue)) {
                //check email exits
                var emailcheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "email": emailValue,
                        "mailexits": emailcheck
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.status == 'failed') {
                            $("#validmailinput").val("failed");
                            $("#errorEmail").text("Email has already been taken.");
                        } else {
                            $("#validmailinput").val("success");
                            $("#errorEmail").text("");
                        }
                    }
                });
            } else {
                $("#errorEmail").text("Invalid email...!");
                isValid = false;
            }
        }

        if ($("#DOB").val() === '') {
            $("#errorDOB").text("DOB field is Require");
            $("#errorDOB").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        }

        if ($("#validmailinput").val() === 'failed') {
            isValid = false;
        }

        if ($("#validuserinput").val() === 'failed') {
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    // login form validation on focus & blur
    $("#loginid").blur(function () {
        if ($(this).val() === '') {
            $("#error-id").text("Please Enter email or username");
        }
    });
    $("#loginid").focus(function () {
        if ($(this).val() === '') {
            $("#error-id").text("");
        }
        $("#invalid-user").text("");
    });
    $("#loginpassword").blur(function () {
        if ($(this).val() === '') {
            $("#error-pass").text("Please Enter password");
        }
    });
    $("#loginpassword").focus(function () {
        if ($(this).val() === '') {
            $("#error-pass").text("");
        }
        $("#invalid-user").text("");
    });

    // login request
    $(".login-form").submit(function (e) {
        e.preventDefault();
        var validloginData = true;
        if ($("#loginid").val() === '') {
            $("#error-id").text("Please Enter email or username");
            $("#error-id").css({ "color": "red" });
            validloginData = false;
        }

        if ($("#loginpassword").val() === '') {
            $("#error-pass").text("Please Enter password");
            $("#error-pass").css({ "color": "red" });
            validloginData = false;
        }

        if (validloginData) {
            //Ajax request for login
            var logincheck = "action"
            var log_id = $("#loginid").val();
            var log_pass = $("#loginpassword").val();
            $.ajax({
                url: "controller.php",
                type: 'post',
                data: {
                    "userid": log_id,
                    "userpass": log_pass,
                    "loginuser": logincheck
                },
                success: function (response) {
                    var loginresult = JSON.parse(response);
                    if (loginresult.status == 'failed') {
                        $("#validlogin").val("failed");
                        $("#invalid-user").text("Invalid username/email or password!");
                    } else {
                        $("#validlogin").val("success");
                        $("#invalid-user").text("");
                        window.location.href = "index.php";
                    }
                }
            });
        }
    });

    $(document).on("click", ".user-profile", function () {
        $(".logout-section").fadeToggle();
    });

    $(".post_input").focus(function () {
        $(this).css({
            "outline": "none",
        });
    });

    //ajax request for following Data
    $("#Following").click(function () {
        $("#for_active").removeClass("foryou-following-active");
        $("#following").addClass("foryou-following-active");
        var Following = "following";
        $.ajax({
            url: "controller.php",
            type: 'post',
            data: {
                "following_data": Following
            },
            success: function (response) {
                $(".center-content").html(response);
            }
        });
    });

    //ajax request for following Data
    $("#for-you").click(function () {
        $("#following").removeClass("foryou-following-active");
        $("#for_active").addClass("foryou-following-active");
        var for_you = "foryou";
        $.ajax({
            url: "controller.php",
            type: 'post',
            data: {
                "foryou_data": for_you
            },
            success: function (response) {
                $(".center-content").html(response);
            }
        });
    });

    // login user post delete operation using ajax  request
    let post_delete_id = null;

    // delete post event
    $(document).on("click", ".post-delete", function () {
        $(".profile-post-popup").fadeIn();
        post_delete_id = $(this).data("post-id");
    });

    $(document).on("click", ".close-post-dlt", function () {
        $(".profile-post-popup").fadeOut();
    });

    // Delete post click (pass post ID)
    $(document).on("click", ".delete-post-btn", function (e) {
        if (window.confirm("Are you sure?")) {
            e.preventDefault();
            $.ajax({
                url: "controller.php",
                type: 'post',
                data: {
                    "post_delete_id": post_delete_id,
                },
                success: function (response) {
                    var deleteresult = JSON.parse(response);
                    if (deleteresult.status == 'success') {
                        setTimeout(function () {
                            $(".delete-post-btn").text("Post Delete successfully");
                            $(".delete-post-btn").css({ "color": "rgb(12, 136, 12) !important;" })
                        }, 150);
                        setTimeout(function () {
                            $(".delete-post-btn").text("");
                            $(".profile-post-popup").fadeOut("slow");
                            profilepage();
                        }, 1000);
                    } else {
                        setTimeout(function () {
                            $(".delete-post-btn").text("Post Delete failed");
                        }, 150);
                    }
                }
            });
        }
    });



    // edit profile form open close
    $(document).on("click", "#edit-profile-btn", function () {
        $("#edit-user-data")[0].reset();
        $("#edit-profile-modal").fadeIn();

        // validation on edit user form
        $("input").blur(function () {
            var namepattern = /^[A-Za-z ]{3,20}$/;
            var usernamepattern = /^[a-z0-9_.]{5,15}$/;
            var emailpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
            var value = $(this).val().trim();

            var inputID = $(this).attr("class");
            if ($(this).val() === '') {
                $(".edit-user" + inputID).text(inputID + " field is Require");
                $(".edit-user" + inputID).css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            } else {
                // Regex for Name
                if ($("#countName").attr("class") === inputID) {
                    if (namepattern.test(value)) {
                        $(".edit-userName").text("");
                    } else {
                        $(".edit-userName").text("minimum 3 and maximum 20 characters allow");
                        $(".edit-userName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                    }
                    $("#countName").focus(function () {
                        $(".edit-userName").text("");
                    });
                }

                if (inputID === "Username") {
                    if (usernamepattern.test(value)) {
                        $(".edit-userUsername").text("");
                        //check edit username exits
                        var usernamecheck = "action"
                        $.ajax({
                            url: "controller.php",
                            type: 'post',
                            data: {
                                "username": value,
                                "edit_username_exits": usernamecheck
                            },
                            success: function (response) {
                                var userdata = JSON.parse(response);
                                if (userdata.status == 'failed') {
                                    $("#edit-valid-username").val("failed");
                                    $(".edit-userUsername").text("username has already been taken.");
                                    $(".edit-userUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                                } else {
                                    $("#edit-valid-username").val("success");
                                    $(".edit-userUsername").text("");
                                }
                            }
                        });
                    } else {
                        $(".edit-userUsername").text("only a-z, 0-9, underscore, dot | 5-15 chars allowed");
                        $(".edit-userUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                    }
                    $("#countUsername").focus(function () {
                        $(".edit-userUsername").text("");
                    });
                }

                if (inputID === "Email") {
                    if (emailpattern.test(value)) {
                        $(".edit-userEmail").text("");
                        //check Edit email exits
                        var emailcheck = "action"
                        $.ajax({
                            url: "controller.php",
                            type: 'post',
                            data: {
                                "edit_email": value,
                                "edit_mail_exits": emailcheck
                            },
                            success: function (response) {
                                var data = JSON.parse(response);
                                if (data.status == 'failed') {
                                    $("#edit-valid-mail").val("failed");
                                    $(".edit-userEmail").text("Email has already been taken.");
                                    $(".edit-userEmail").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                                } else {
                                    $("#edit-valid-mail").val("success");
                                    $(".edit-userEmail").text("");
                                }
                            }
                        });
                    } else {
                        $(".edit-userEmail").text("Invalid email format (e.g. name@example.com)");
                        $(".edit-userEmail").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                    }

                    $(".Email").focus(function () {
                        $(".edit-userEmail").text("");
                    });
                }
            }
        });

        $("input").focus(function () {
            var inputID = $(this).attr("class");
            if ($(this).val() === '') {
                $(".edit-user" + inputID).text("");
            }
        });

        $(document).on("change", ".file_banner", function(){
            $(".fileerror").text("");
        });
    });

    $(document).on("click", ".close-edit-form", function () {
        $("#edit-user-data")[0].reset();
        $("#edit-profile-modal").fadeOut();
    });

    // start Insert Data using ajax request
    $(document).on("submit", "#edit-user-data", function (event) {
        event.preventDefault();
        var namepattern = /^[A-Za-z ]{3,20}$/;
        var usernamepattern = /^[a-z0-9_.]{5,15}$/;
        var emailpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
        let filePatter = /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i;
        var isValid = true;

        if ($(".Name").val() === '') {
            $(".edit-userName").text("Name is Require");
            $(".edit-userName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            // Regex for Name on submit
            nameValue = $(".Name").val();
            if (namepattern.test(nameValue)) {
                $(".edit-userName").text("");
            } else {
                $(".edit-userName").text("minimum 3 and maximum 20 characters allow");
                $(".edit-userName").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                isValid = false;
            }
        }

        if ($("#countUsername").val() === '') {
            $(".edit-userUsername").text("Username is Require");
            $(".edit-userUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            // Regex for Name on submit
            userValue = $("#countUsername").val();
            if (usernamepattern.test(userValue)) {
                //check edit username exits on submit
                var usernamecheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "username": userValue,
                        "edit_username_exits": usernamecheck
                    },
                    success: function (response) {
                        var userdata = JSON.parse(response);
                        if (userdata.status == 'failed') {
                            $("#edit-valid-username").val("failed");
                            $(".edit-userUsername").text("username has already been taken.");
                            $(".edit-userUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                        } else {
                            $("#edit-valid-username").val("success");
                            $(".edit-userUsername").text("");
                        }
                    }
                });
            } else {
                $(".edit-userUsername").text("only a-z, 0-9, underscore, dot | 5-15 chars allowed");
                $(".edit-userUsername").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                isValid = false;
            }
        }

        if ($(".Email").val() === '') {
            $(".edit-userEmail").text("Email is Require");
            isValid = false;
        } else {
            emailValue = $(".Email").val();
            if (emailpattern.test(emailValue)) {
                //check Edit email exits on submit
                var emailcheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "edit_email": emailValue,
                        "edit_mail_exits": emailcheck
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.status == 'failed') {
                            $("#edit-valid-mail").val("failed");
                            $(".edit-userEmail").text("Email has already been taken.");
                            $(".edit-userEmail").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
                        } else {
                            $("#edit-valid-mail").val("success");
                            $(".edit-userEmail").text("");
                        }
                    }
                });
            } else {
                $(".edit-userEmail").text("Invalid email format (e.g. name@example.com)");
                isValid = false;
            }
        }

        if ($(".file_banner").val() != '') {
            thisValue = $(".file_banner").val();
            if (filePatter.test(thisValue)) {
                $(".fileerror").text("");
            }else{
                isValid = false;
                $(".fileerror").text("please choose a valid file...!");
            }
        }

        if ($(".DOB").val() === '') {
            $(".edit-userDOB").text("DOB is Require");
            $(".edit-userDOB").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        }

        if ($("#edit-valid-mail").val() === 'failed') {
            isValid = false;
        }

        if ($("#edit-valid-username").val() === 'failed') {
            isValid = false;
        }

        if (isValid) {
            userDataUpdate();
        }
    });

    function userDataUpdate() {
        var form = $('#edit-user-data')[0];
        var formData = new FormData(form);
        formData.append('user_update', 'formData');
        $.ajax({
            url: "controller.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (insertreturn) {
                $('#edit-profile-modal').fadeOut();
                profilepage();
            }
        });
    }

    // Open post-btn model 
    $(document).on("click", ".post-btn", function () {
        $(".popup-post-form")[0].reset();
        $(".left-post-discription").text("");
        $("#post-modal-overlay").fadeIn(300);
    });

    $(document).on("click", ".close-post-modal", function () {
        $(".popup-post-form")[0].reset();
        $("#leftcharCountpost").text("");
        $("#post-modal-overlay").fadeOut(300);
    });

    $(".popup-post-discription").focus(function(){
            $(".errorpost").text("");
    });

    $(".popup-post-file").change(function(){
            $(".errorpost").text("");
    })

    // Post validation & Post Insert...
    $(document).on("submit", ".popup-post-form", function (event) {
        event.preventDefault();
        var isValid = true;

        if ($(".popup-post-discription").val() === '' && $(".popup-post-file").val() === '') {
            $(".errorpost").text("Your Post is Empty...!");
            $(".errorPost").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            $(".errorpost").text("");
        }

        if (isValid) {
            var form = $('.popup-post-form')[0];
            var formData = new FormData(form);
            formData.append('user_post_insert', 'formData');
            $.ajax({
                url: "controller.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (insertpost) {
                    event.preventDefault();
                    setTimeout(function () {
                        $('.post-success-msg').html(insertpost);
                    }, 300);

                    setTimeout(function () {
                        $('.post-success-msg').html("");
                        $(".popup-post-form")[0].reset();
                        $("#leftcharCountpost").text("");
                        $("#post-modal-overlay").fadeOut(300);
                        profilepage();
                    }, 1500);
                }
            });
        }
    });

    // Post validation & Post Insert...
    $(document).on("submit", ".left-post-form", function (event) {
        event.preventDefault();
        var isValid = true;

        if ($(".left-post-discription").val() === '' && $(".left-post-file").val() === '') {
            $(".errorPost").text("Your Post is Empty...!");
            $(".errorPost").css({ "color": "red", "fontSize": "12px", "font-weight": "500" });
            isValid = false;
        } else {
            $(".errorPost").text("");
        }

        if (isValid) {
            var form = $('.left-post-form')[0];
            var formData = new FormData(form);
            formData.append('user_post_insert', 'formData');
            $.ajax({
                url: "controller.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (insertpost) {
                    event.preventDefault();
                    setTimeout(function () {
                        $('.success-msg').html(insertpost);
                    }, 300);

                    setTimeout(function () {
                        $('.success-msg').html("");
                        $(".left-post-form")[0].reset();
                        $("#charcount").text("");
                        profilepage();
                    }, 1500);
                }
            });
        }
    });

    $(document).on('click', '.like-post', function (e) {
        e.preventDefault();
        let postId = $(this).data('post-id'); // post id
        let likeBtn = $(this); // like button

        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "post_like_insert": postId,
                "post_id": postId
            },
            success: function (result) {
                let response = JSON.parse(result);

                // Like count update
                if (response.like_count == 0) {
                    likeBtn.find('.like-count').text("");
                } else {
                    likeBtn.find('.like-count').text(response.like_count);
                }

                // Icon change like/unlike
                let icon = likeBtn.find('i');
                if (response.liked) {
                    icon.removeClass('fa-regular fa-heart').addClass('fa-solid text-pink fa-heart');
                } else {
                    icon.removeClass('fa-solid text-pink fa-heart').addClass('fa-regular fa-heart');
                }
                $(".text-pink").css({ "color": "rgb(231, 14, 50);" });
            }
        });
    });


    // Open Comment model 
    $(document).on('click', '.comment-post', function (e) {
        e.preventDefault();
        $("#cmt-form")[0].reset();
        $("#Countcomment-length").text("");
        $(".left-post-discription").text("");
        $("#post-comment-modal-overlay").fadeIn(300);
        var post_id = $(this).data('post-id');
        $("#comment-post-id").val(post_id);
    });

    $("#post_comment").focus(function(){
        $("#comment-error").text("");
    });

    $(document).on('click', '#left-comment-btn', function (e) {
        $("#Countcomment-length").text("");
        e.preventDefault();
        var post_Id = $("#comment-post-id").val();
        var comment_val = $("#post_comment").val();
        var comment_btn = $('.comment-post[data-post-id="' + post_Id + '"]');

        if(comment_val === ''){
            $("#comment-error").text("your Comment is empty...!");
        }else{
            $("#comment-error").text("");
            $.ajax({
                url: 'controller.php',
                method: 'POST',
                data: {
                    "post_comment_insert": post_Id,
                    "post_id": post_Id,
                    "comment_value": comment_val
                },
                success: function (cmtresult) {
                    let response = JSON.parse(cmtresult);

                    // comment count update
                    if (response.comment_count == 0) {
                        comment_btn.find('.comment-count').text("");
                    } else {
                        comment_btn.find('.comment-count').text(response.comment_count);
                    }
                    $("#post-comment-modal-overlay").fadeOut(300);
                }
            });
        }
    });

    $(document).on("click", ".close-comment-modal", function () {
        $("#cmt-form")[0].reset();
        $("#charCountpost").text("");
        $("#post-comment-modal-overlay").fadeOut(300);   
    });

    // show more user
    $(document).on("click", ".show-more-user-btn", function () {
        var limit = 0;
        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "users_show_limits": limit,
            },
            success: function (result) {
                $(".rightbar").html(result);
            }
        });
    });

    // show less user
    $(document).on("click", ".show-less-user-btn", function () {
        var limit = 3;
        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "users_show_limits": limit,
            },
            success: function (result) {
                $(".rightbar").html(result);
            }
        });
    });

    let follow_btn = "";
    // user follow
    $(document).on("click", ".user-follow-following", function () {
        var might_user_id = $(this).data('post-id');
        var showfollow = $(".show-profile-followers");// for count following/ followers only on profile
        follow_btn = $(this);

        // If already following, show confirm before unfollowing
        if (follow_btn.hasClass("following")) {
            if (!confirm("Are you sure you want to unfollow?")) {
                return;
            }
        }

        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "follow_opponent_id": might_user_id,
            },
            success: function (followResult) {
                let response = JSON.parse(followResult);

                // Update counts
                showfollow.find('.following-show').text(response.following_count || "0");
                showfollow.find('.followers-show').text(response.followers_count || "0");
                
                if (response.following) {
                    follow_btn.addClass("following").text("Following");
                } else {
                    follow_btn.removeClass("following").text("Follow");
                }
            }
        });
    });

    // for following/followers list 
    let follow_list_btn = "";
    // user follow
    $(document).on("click", ".follow-btn-list", function () {
        var user_id_follow = $(this).data('user-id');
        follow_list_btn = $(this);

        // Confirm unfollow
        if (follow_list_btn.hasClass("following-show-userfolowers")) {
            if (!confirm("Are you sure you want to unfollow?")) {
                return;
            }
        }

        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "follow_opponent_user_id": user_id_follow,
            },
            success: function (followResult) {
                let response = JSON.parse(followResult);

                // Update button label and class
                follow_list_btn.removeClass("follow-back following-show-userfolowers").text("Follow");
                if (response.status === "Following") {
                    follow_list_btn.addClass("following-show-userfolowers").text("Following");
                } else if (response.status === "Follow Back") {
                    follow_list_btn.addClass("follow-back").text("Follow Back");
                }
            }
        });
    });

    $(document).on("mouseenter", ".follow-btn-list.following-show-userfolowers", function () {
        $(this).addClass("hovering").text("Unfollow");
    });

    $(document).on("mouseleave", ".follow-btn-list.following-show-userfolowers", function () {
        $(this).removeClass("hovering").text("Following");
    });

    // Show following/followers modal dynamically
    $(document).on('click', '.following-show', function () {
        $('.overlay-bg').fadeIn();
        $('.user-list-popup').fadeIn();
    });

    // Close modal dynamically
    $(document).on('click', '.close-user-follow', function () {
        $('.overlay-bg').fadeOut();
        $('.user-list-popup').fadeOut();
    });

    // Hover effect to show "Unfollow" when already following
    $(document).on("mouseenter", ".user-follow-following.following", function () {
        $(this).text("Unfollow");
    });
    $(document).on("mouseleave", ".user-follow-following.following", function () {
        $(this).text("Following");
    });

    // show following/followers/followers for other user profile
    let other_follow_button = "";
    // user follow
    $(document).on("click", ".other-profile-follow-btn", function () {
        var user_id_follow = $(this).data('user-id');
        other_follow_button = $(this);

        // Confirm unfollow
        if (other_follow_button.hasClass("other-user_follow-btn")) {
            if (!confirm("Are you sure you want to unfollow?")) {
                return;
            }
        }

        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "follow_other_profile_id": user_id_follow,
            },
            success: function (followResult) {
                let response = JSON.parse(followResult);

                // Update counts (optional)
                $(".other-followers-show").text(response.followers_count);
                $(".other-following-show").text(response.following_count);
                
                // console.log("follower " +response.followers_coun);
                // console.log("following " +response.following_count);

                // Update button label and class
                other_follow_button.removeClass("follow_back other-user_follow-btn").text("Follow");
                if (response.status === "Following") {
                    other_follow_button.addClass("other-user_follow-btn").text("Following");
                } else if (response.status === "Follow Back") {
                    other_follow_button.addClass("follow-back").text("Follow Back");
                }
            }
        });
    });

    $(document).on("mouseenter", ".other-profile-follow-btn.other-user_follow-btn", function () {
        $(this).addClass("hovering-other").text("Unfollow");
    });

    $(document).on("mouseleave", ".other-profile-follow-btn.other-user_follow-btn", function () {
        $(this).removeClass("hovering-other").text("Following");
    });

    // search userdata jquery
   $(document).on('focus', '#search', function () {
        $('#search-popup').fadeIn();
    });

    $(document).on('blur', '#search', function () {
        setTimeout(function () {
            $('#search-popup').fadeOut();
        }, 200);
    });

    // search on keyup    
    $(document).on('keyup', '#search', function () {
        let searchVal = $(this).val().trim();

        if (searchVal === '') {
            $('#search-popup').html('<div id="search-message">Try searching for people</div>');
        } else {
            searchUsers(searchVal); // call function for search value 
        }
    });

    // ajax request for search ...
    function searchUsers(searchData) {
        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                "search_input_data": searchData,
            },
            success: function (result) {
                $("#search-popup").html(result);
            }
        });
    }
});

function postCharCount() {
    var posttext = document.getElementById('popup_post_description');
    var count = document.getElementById('leftcharCountpost');
    count.textContent = `${posttext.value.length} / 240`;
}

function postdecCount() {
    var posttext = document.getElementById('index-post_description');
    var count = document.getElementById('charcount');
    count.textContent = `${posttext.value.length} / 240`;
}

function commentCharCount() {
    var posttext = document.getElementById('post_comment');
    var count = document.getElementById('Countcomment-length');
    count.textContent = `${posttext.value.length} / 100`;
}

// show other user profile
function otherUserProfile(otherUserId){
    window.location.href="other_user_profile.php?username="+otherUserId;
}

function notificationCount() {
    value = "is_read_notification";
    $.ajax({
        url: 'controller.php',
        method: 'POST',
        data: {
            "is_read_notification": value,
        },
        dataType: 'json',
        success: function (result) {
            if (result.unread_count !== '0') {
                $(".show-notificatio-count").css({"display":"block"});
                $(".show-notificatio-count").html('<i class="fa-solid fa-circle"> ' +result.unread_count +'</i>');
            } else {
                $(".show-notificatio-count").css({"display":"none"});
            }
        }
    });
}
setInterval(notificationCount, 200);


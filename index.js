$(document).on('scroll', function() {
    var scrollTop = $(document).scrollTop();

    $('#home-banner').css({
       transform: 'translate(0, ' + scrollTop/3.5 + 'px)',
    });
});

$('#srchLink').on('click', function() {
    $('.srch').toggleClass('enlarge');
});

if($(window).width() > 576) {
    $("#banner-overlay").height(470);
    $('#wholePostCont').addClass('ml-5');
    $('#adminCont').addClass('mt-5');
    $('#wholePostCont').addClass('p-5');
    $('#wholePostCont').removeClass('ml-1');
    $('#wholePostCont').removeClass('mr-1');
    $('#loginsignupbtn').addClass('mr-5');
    $('#loginsignupbtn').removeClass('mr-4');
    $('.adminBtn').addClass('pl-5');
    $('.adminBtn').removeClass('pl-4');
    $("#copyright-footer").addClass('pl-5');
    $("#ad").addClass('ml-3');
} else {
    $("#banner-overlay").height($("#home-banner").height());
    $('#wholePostCont').removeClass('ml-5');
    $('#adminCont').removeClass('mt-5');
    $('#wholePostCont').removeClass('p-5');
    $('#wholePostCont').addClass('ml-1');
    $('#wholePostCont').addClass('mr-1');
    $('#loginsignupbtn').removeClass('mr-5');
    $('#loginsignupbtn').addClass('mr-4');
    $('.adminBtn').removeClass('pl-5');
    $("#copyright-footer").addClass('pl-5');
    $("#copyright-footer").removeClass('pl-5');
    $("#ad").removeClass('ml-3');
}

$(window).on('resize', function() {
    
    if($(window).width() > 576) {
        $("#banner-overlay").height(470);
        $('#wholePostCont').addClass('ml-5');
        $('#adminCont').addClass('mt-5');
        $('#wholePostCont').addClass('p-5');
        $('#wholePostCont').removeClass('ml-1');
        $('#wholePostCont').removeClass('mr-1');
        $('#loginsignupbtn').addClass('mr-5');
        $('#loginsignupbtn').removeClass('mr-4');
        $('.adminBtn').addClass('pl-5');
        $('.adminBtn').removeClass('pl-4');
        $("#copyright-footer").addClass('pl-5');
        $("#ad").addClass('ml-3');
    } else {
        $("#banner-overlay").height($("#home-banner").height());
        $('#wholePostCont').removeClass('ml-5');
        $('#adminCont').removeClass('mt-5');
        $('#wholePostCont').removeClass('p-5');
        $('#wholePostCont').addClass('ml-1');
        $('#wholePostCont').addClass('mr-1');
        $('#loginsignupbtn').removeClass('mr-5');
        $('#loginsignupbtn').addClass('mr-4');
        $('.adminBtn').removeClass('pl-5');
        $('.adminBtn').addClass('pl-4');
        $("#copyright-footer").removeClass('pl-5');
        $("#ad").removeClass('ml-3');
    }
});

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

$('#toggleLogin').click(function() {
    if($('#loginActive').val() == "1") {
        $('#loginActive').val("0");
        $('#loginModalTitle').html('Sign Up');
        $('#loginsignupbtn').html('Sign Up');
        $('#txt').html('Already have an account?')
        $('#toggleLogin').html('Login');
        if($(".usernameDiv").hasClass('hidden-xs-up')) {
            $('.usernameDiv').removeClass('hidden-xs-up');
        }
    } else {
        $('#loginActive').val("1");
        $('#loginModalTitle').html('Login');
        $('#loginsignupbtn').html('Login');
        $('#txt').html("Don't have an account?")
        $('#toggleLogin').html('Sign Up');
        if(!$(".usernameDiv").hasClass('hidden-xs-up')) {
            $('.usernameDiv').addClass('hidden-xs-up');
        }
    }
});

$('#loginsignupbtn').click(function() {
    $.ajax({
        type: "POST",
        url: "action.php?action=loginSignup",
        data: "username=" + $('#username').val() + "&email=" + $('#email').val() + "&password=" + $('#password').val() + "&loginActive=" + $('#loginActive').val(),
        success: function(result) {
            if(result == "1") {
                if($('#loginActive').val() == "0") {
                    $.ajax({
                        type: "POST",
                        url: "action.php?action=sendmail",
                        data: "username=" + $('#username').val() + "&email=" + $('#email').val(),
                        success: function(result) {
                            if(result == "1") {
                                $('#loginAlert').html("Please verify account first. Email has been sent!");
                                $('#loginAlert').show();
                            } else {
                                $('#loginAlert').html(result);
                                $('#loginAlert').show();
                            }
                        }
                     }) 
                } else {
                    window.location.assign("front.php");
                }
            } else if(result == "2") {
                $('#loginAlert').html("Please verify account first. Email has been sent!");
                $('#loginAlert').show();
            } else {
                $('#loginAlert').html(result);
                $('#loginAlert').show();
            }
        }
    })
});

$('.toggleLike').click(function() {
                
    var id = $(this).attr('data-postId');

    $.ajax({
        type: "POST",
        url: "action.php?action=toggleLike",
        data: "postId=" + id,
        success: function(result) {

            if(result == "1") {
                
                $("a[data-postId='" + id + "']").html("<i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i>");
                

            } else if(result == "2") {
                
                $("a[data-postId='" + id + "']").html("<i class='icon love ion-android-favorite pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #E54449;'></i>");

            }

        }
    })

});

$("#commentBtn").click(function() {
    if($("#comment").val()) {
        $.ajax({
            type: "POST",
            url: "action.php?action=postCommentpostComment",
            data: "comment=" + $("#comment").val() + "&postid=" + $("#postIdCmmnt").val(),
            success: function(result) {
                if(result == 1)
                    alert("Comment posted!");
                else 
                    alert("There was some error!");
            }
        })
    } else {
        alert("Please fill the comment feild!");
    }
});

$(".scrollTop").on('click', function(event) {
    if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function(){
            window.location.hash = hash;
        });
    }
});

$(window).on('scroll', function() {
    if($(window).scrollTop() > 5) {
        $('.scrollTop').css('transform', 'scale(1, 1)');
    } else {
        $('.scrollTop').css('transform', 'scale(0, 0)');
    }
});
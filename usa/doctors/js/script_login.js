$(".login-form").hide();
$(".login").css("background", "none");

$(".login").click(function() {
    $(".signup-form").hide();
    $(".login-form").show();
    $(".signup").css("background", "none");
    $(".login").css("background", "#fff");
});

$(".signup").click(function() {
    $(".signup-form").show();
    $(".login-form").hide();
    $(".login").css("background", "none");
    $(".signup").css("background", "#fff");
});

$(".btn").click(function() {
    $(".input").val("");
});

//radio button control
$('.opt').hide();
$("#cycle").hide();
$("#secteur").hide();
$(document).ready(function() {


    $("#r1").click(function() {

        $('#cycle').show();
        $('#secteur').hide();
        $(function() {
            $('#cycle').change(function() {
                $('.opt').hide();
                $('.' + $(this).val()).show();
            });
        });
    });

    $("#rd2").click(function() {
        $("#cycle").hide();
        $('.opt').hide();
        $("#secteur").show();
    });



});
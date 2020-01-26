$(function () {
    $('.info_btn').mouseover(function () {
        console.log("#");
            $(this).next("span").css("display", "block");
    });

    $('.info_btn').mouseout(function () {
        console.log("#");
        $(this).next("span").css("display", "none");
    });
});
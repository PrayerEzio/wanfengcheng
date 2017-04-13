/**
 * Created by Prayer on 2017/3/4 0004.
 */
$(function () {
    $(".weixin1").hover(function () {
        $(".wx1").toggle();
    });
});

$(function () {
    $('.banner').unslider({
        dots: true,
        keys: true,
    });
});
$(function () {
    $(".showcase2").hover(function () {
        $(this).children('.sc-e').toggle();
    });
});
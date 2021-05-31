// popup滑鼠移過動畫，點選關閉視窗-----------------
$('.popup .card-close i').mouseenter(function () {
    {
        $(this).addClass('animate__animated animate__rubberBand').addClass('time-075s').addClass('infinite').click(function () {
            $('.bg-black').fadeOut();
            
        })
    }
}).mouseleave(function () {
    {
        $(this).removeClass('animate__animated animate__rubberBand');
    }
})

// 解決：大小照片同時出現會有一條線，做2套
if ($(window).width() < 700) {
    $('.bg_b img').hide();
    $('.bg_s img').show();
}else{
    $('.bg_s img').hide();
    $('.bg_b img').show();
}

$(window).resize(function () {
    if ($(window).width() < 700) {
        $('.bg_b img').hide();
        $('.bg_s img').show();
    }
    else{
        $('.bg_s img').hide();
        $('.bg_b img').show();
    }

})



//郵票動畫---------------------------------------
$('.stamp_country').addClass('animate__animated animate__fadeInBottomLeft')

$('.bg_country').addClass('animate__animated animate__fadeIn').addClass('time-2s')





// 郵戳動畫--------------------------------------
$('.stamp').addClass('animate__animated animate__fadeInBottomLeft')
// 商品hover--------------------------------------
$('.map .cup').mouseenter(function () { { $(this).css('transform', 'scale(1.2)') } }).mouseleave(function () { { $(this).css('transform', 'scale(1)') } })

// $('.map .beer-wrap').mouseenter(function () { { $(this).css('transform', 'scale(1.2)') } }).mouseleave(function () { { $(this).css('transform', 'scale(1)') } })

// $('.map .know-more').mouseenter(function () {
//     {
//         $('.map .cup-name, .map .beer-name').css('opacity','1')}}).mouseleave(function () {{$('.map .cup-name, .map .beer-name').css('opacity','0')}}).
//                 $('.map .cup-name, .map .beer-name').css('opacity','1').mouseleave(function () {{$('.map .cup-name, .map .beer-name').css('opacity','0')}})

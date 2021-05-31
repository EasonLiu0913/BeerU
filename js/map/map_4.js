// 預設關閉
$('.country_name').hide()
// 設置hover地區讓郵票動，出現國家名
// ------------------------------------------
// 美國:從區域～郵票選項

$('.us_path').mouseenter(function () {
    // 區域填滿綠色
    $(this).css('fill', '#B676D1')
    // 底下郵票選項會動(+1)
    $('.us .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.us .countries .country').eq(0).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.us .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.us .countries .country').eq(0).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})

// 美國:從郵票選項～區域
$('.us .countries .country').eq(0).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家)
    $('.us_path').css('fill', '#B676D1')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.us_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})
// ------------------------------------------
// 英國:從區域～郵票選項
$('.uk_path').mouseenter(function () {
    // 郵票自動移到對應國家
    slick = 0;

    if ($(window).width() < 700) {
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    }
    else {
        $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
    }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(0).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(0).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})

// 英國:從郵票選項～區域
$('.eu .countries .country').eq(0).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家)
    $('.uk_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.uk_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})
// ------------------------------------------
// 法國:從區域～郵票選項
$('.fc_path').mouseenter(function () {
        // 郵票自動移到對應國家
        slick = 1;

        if ($(window).width() < 700) {
            $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
        }
        else {
            $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
        }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(1).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(1).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})

// 法國:從郵票選項～區域
$('.eu .countries .country').eq(1).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.fc_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.fc_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})
// ------------------------------------------
// 比利時:從區域～郵票選項
$('.bl_path').mouseenter(function () {
        // 郵票自動移到對應國家
        slick = 1;

        if ($(window).width() < 700) {
            $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
        }
        else {
            $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
        }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(2).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(2).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(2).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(2).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
})

// 比利時:從郵票選項～區域
$('.eu .countries .country').eq(2).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.bl_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.bl_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
})
// ------------------------------------------
// 挪威:從區域～郵票選項
$('.nw_path').mouseenter(function () {
    // 郵票自動移到對應國家
    slick = 2;

    if ($(window).width() < 700) {
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    }
    else {
        $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
    }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(3).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(3).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(3).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(3).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
})

// 挪威:從郵票選項～區域
$('.eu .countries .country').eq(3).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.nw_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.nw_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
})
// ------------------------------------------
// 丹麥:從區域～郵票選項
$('.dm_path').mouseenter(function () {
    // 郵票自動移到對應國家
    slick = 3;

    if ($(window).width() < 700) {
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    }
    else {
        $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
    }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(4).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(4).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(4).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(4).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(4).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(4).hide()
})

// 丹麥:從郵票選項～區域
$('.eu .countries .country').eq(4).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.dm_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(4).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.dm_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(4).hide()
})
// ------------------------------------------
// 德國:從區域～郵票選項
$('.gm_path').mouseenter(function () {
    // 郵票自動移到對應國家
    slick = 4;

    if ($(window).width() < 700) {
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    }
    else {
        $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
    }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(5).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(5).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(5).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(5).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(5).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(5).hide()
})

// 德國:從郵票選項～區域
$('.eu .countries .country').eq(5).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.gm_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(5).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.gm_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(5).hide()
})
// ------------------------------------------
// 瑞典:從區域～郵票選項
$('.sw_path').mouseenter(function () {
    // 郵票自動移到對應國家
    slick = 5;

    if ($(window).width() < 700) {
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    }
    else {
        $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
    }

    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(6).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(6).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(6).hide()


}).mouseleave(function () {

    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(6).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(6).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(6).hide()
})

// 瑞典:從郵票選項～區域
$('.eu .countries .country').eq(6).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.sw_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(6).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.sw_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(6).hide()
})
// ------------------------------------------
// 義大利:從區域～郵票選項
$('.it_path').mouseenter(function () {
        // 郵票自動移到對應國家
        slick = 6;

        if ($(window).width() < 700) {
            $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
        }
        else {
            $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
        }
    // 區域填滿綠色
    $(this).css('fill', '#44B9AC')
    // 底下郵票選項會動(+1)
    $('.eu .countries .country').eq(7).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.eu .countries .country').eq(7).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(7).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.eu .countries .country').eq(7).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.eu .countries .country').eq(7).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(7).hide()
})

// 義大利:從郵票選項～區域
$('.eu .countries .country').eq(7).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.it_path').css('fill', '#44B9AC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(7).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.it_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(7).hide()
})
// ------------------------------------------
// 日本:從區域～郵票選項
$('.jp_path').mouseenter(function () {
            // 郵票自動移到對應國家
            // slick = 0;

            // if ($(window).width() < 700) {
            //     $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
            // }
            // else {
            //     $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
            // }
    // 區域填滿綠色
    $(this).css('fill', '#FFB6DC')
    // 底下郵票選項會動(+1)
    $('.as .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.as .countries .country').eq(0).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.as .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.as .countries .country').eq(0).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})

// 日本:從郵票選項～區域
$('.as .countries .country').eq(0).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家)
    $('.jp_path').css('fill', '#FFB6DC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.jp_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})
// ------------------------------------------
// 俄國:從區域～郵票選項
$('.rs_path').mouseenter(function () {
            // 郵票自動移到對應國家
            // slick = 0;

            // if ($(window).width() < 700) {
            //     $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
            // }
            // else {
            //     $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
            // }
    // 區域填滿綠色
    $(this).css('fill', '#FFB6DC')
    // 底下郵票選項會動(+1)
    $('.as .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.as .countries .country').eq(1).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.as .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.as .countries .country').eq(1).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})

// 俄國:從郵票選項～區域
$('.as .countries .country').eq(1).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.rs_path').css('fill', '#FFB6DC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.rs_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})
// ------------------------------------------
// 新加坡:從區域～郵票選項
$('.sp_path').mouseenter(function () {
            // 郵票自動移到對應國家
            // slick = 0;

            // if ($(window).width() < 700) {
            //     $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
            // }
            // else {
            //     $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
            // }
    // 區域填滿綠色
    $(this).css('fill', '#FFB6DC')
    // 底下郵票選項會動(+1)
    $('.as .countries .country').eq(2).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.as .countries .country').eq(2).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.as .countries .country').eq(2).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.as .countries .country').eq(2).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
})

// 新加坡:從郵票選項～區域
$('.as .countries .country').eq(2).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.sp_path').css('fill', '#FFB6DC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.sp_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(2).hide()
})
// ------------------------------------------
// 越南:從區域～郵票選項
$('.vm_path').mouseenter(function () {
            // 郵票自動移到對應國家
            slick = 0;

            if ($(window).width() < 700) {
                $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
            }
            else {
                $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
            }
    // 區域填滿綠色
    $(this).css('fill', '#FFB6DC')
    // 底下郵票選項會動(+1)
    $('.as .countries .country').eq(3).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.as .countries .country').eq(3).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.as .countries .country').eq(3).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.as .countries .country').eq(3).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
})

// 越南:從郵票選項～區域
$('.as .countries .country').eq(3).mouseenter(function () {
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.vm_path').css('fill', '#FFB6DC')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.vm_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(3).hide()
})
// ------------------------------------------
// 澳洲:從區域～郵票選項
$('.au_path').mouseenter(function () {//(換國家) 
    // 區域填滿綠色
    $(this).css('fill', '#EB963C')
    // 底下郵票選項會動(+1)
    $('.au .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.au .countries .country').eq(0).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.au .countries .country').eq(0).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.au .countries .country').eq(0).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})

// 澳洲:從郵票選項～區域
$('.au .countries .country').eq(0).mouseenter(function () {//(換州) 
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家)
    $('.au_path').css('fill', '#EB963C')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.au_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(0).hide()
})
// ------------------------------------------
// 紐西蘭:從區域～郵票選項
$('.nz_path').mouseenter(function () {//(換國家) 
    // 區域填滿綠色
    $(this).css('fill', '#EB963C')
    // 底下郵票選項會動(+1)
    $('.au .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡入(+1)
    $('.au .countries .country').eq(1).children().first().fadeIn(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 區域半透明
    $(this).css('fill', '#b293627e')
    // 底下郵票選項不動(+1)
    $('.au .countries .country').eq(1).toggleClass('animate__animated animate__pulse').toggleClass('infinite')
    // 國家名淡出(+1)
    $('.au .countries .country').eq(1).children().first().fadeOut(200)
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})

// 紐西蘭:從郵票選項～區域
$('.au .countries .country').eq(1).mouseenter(function () {//(換州) 
    // 國家名淡入
    $(this).eq(0).children().first().fadeIn(200)
    // 區域填滿綠色(換國家) 
    $('.nz_path').css('fill', '#EB963C')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
}).mouseleave(function () {
    // 國家名淡出   
    $(this).eq(0).children().first().fadeOut(200)
    // 區域半透明(換國家) 
    $('.nz_path').css('fill', '#b293627e')
    // 個別deco動畫(+1)
    // $(this).parent().next().children().eq(1).hide()
})
// ------------------------------------------

// $('path').mouseenter.css('fill', 'var(--blue)').mouseleave.css('fill', '#b293627e')
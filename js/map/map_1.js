if ($(window).width() >= 700) {
    $('.parts').hide()
    $('.pipi_plane_big').show()
}
else{
    $('.parts').show().addClass('d-flex')
    $('.pipi_plane_big').hide()
}


$(window).resize(function () {
    if ($(window).width() >= 700) {
        $('.parts').hide()
        $('.pipi_plane_big').show()
    }
    else{
        $('.parts').show().addClass('d-flex')
        $('.pipi_plane_big').hide()
    }
})
// 手機版-4大洲-滑鼠移到時有動畫，州移位----------------------------

// 桌機版要寫2套
// 桌機版時要回復原位:width

// ---------------------------------------------------------

// 動畫
// 各州名稱heartbeat---------------------------------------

// $('.title_us, .title_eu, .title_as, .title_au').toggleClass('animate__animated animate__pulse').toggleClass('infinite').toggleClass('shadow_gold')

// 各州hover時會變綠色--------------------------------------
$('.world>svg>a:nth-of-type(1)>path, .world>svg>a:nth-of-type(2)>path, .world>svg>a:nth-of-type(3)>path, .world>svg>a:nth-of-type(4)>path').mouseenter(function () {
    $(this).css('fill', 'var(--blue)')
}).mouseleave(function () {
    $(this).css('fill', '#b293627e');
})

$('.title_us').mouseenter(function () {
    $('.world>svg>a:nth-of-type(1)>path').css('fill', 'var(--blue)')
}).mouseleave(function () {
    $('.world>svg>a:nth-of-type(1)>path').css('fill', '#b293627e');
})
$('.title_eu').mouseenter(function () {
    $('.world>svg>a:nth-of-type(2)>path').css('fill', 'var(--blue)')
}).mouseleave(function () {
    $('.world>svg>a:nth-of-type(2)>path').css('fill', '#b293627e');
})
$('.title_as').mouseenter(function () {
    $('.world>svg>a:nth-of-type(3)>path').css('fill', 'var(--blue)')
}).mouseleave(function () {
    $('.world>svg>a:nth-of-type(3)>path').css('fill', '#b293627e');
})
$('.title_au').mouseenter(function () {
    $('.world>svg>a:nth-of-type(4)>path').css('fill', 'var(--blue)')
}).mouseleave(function () {
    $('.world>svg>a:nth-of-type(4)>path').css('fill', '#b293627e');
})

$('.world>svg>a:nth-of-type(5)>path').mouseenter(function () {
    $(this).css('fill', '#b293627e')
}).mouseleave(function () {
    $(this).css('fill', '#b293627e');
})

// 動畫:大飛機飛進來晃晃
$('.pipi_plane_big img').toggleClass('animate__animated animate__backInLeft')
setTimeout(function () {
    $('.pipi_plane_big img').toggleClass('animate__animated animate__backInLeft').toggleClass('animate__animated animate__pulse').toggleClass('infinite')
}, 1000);


// ---------------------------------------------------------
// if ($(window).width() < 700) {
    $('.part').eq(0).mouseenter(function () {
        $(this).addClass('animate__animated animate__fadeOutUp').addClass('infinite');
        $('.map .world').css('transform', 'translateX(30%)');
        $('.title_us').addClass('animate__animated animate__heartBeat').addClass('infinite').addClass('shadow_gold');
        $('.world>svg>a:nth-of-type(1)>path').css('fill', 'var(--blue)')
    }).mouseleave(function () {
        {
            $(this).removeClass('animate__animated animate__fadeOutUp').removeClass('infinite');
            $('.title_us').removeClass('animate__animated animate__heartBeat').removeClass('infinite').removeClass('shadow_gold');
            $('.world>svg>a:nth-of-type(1)>path').css('fill', '#b293627e');
            // $('.map .world').css('transform', 'translateX(0%)')
        }
    })

    $('.part').eq(1).mouseenter(function () {
        $(this).addClass('animate__animated animate__fadeOutUp').addClass('infinite');
        $('.map .world').css('transform', 'translateX(0%)');
        $('.title_eu').addClass('animate__animated animate__heartBeat').addClass('infinite').addClass('shadow_gold');
        $('.world>svg>a:nth-of-type(2)>path').css('fill', 'var(--blue)');
    }).mouseleave(function () {
        {
            $(this).removeClass('animate__animated animate__fadeOutUp').removeClass('infinite');
            $('.title_eu').removeClass('animate__animated animate__heartBeat').removeClass('infinite').removeClass('shadow_gold');
            $('.world>svg>a:nth-of-type(2)>path').css('fill', '#b293627e');
            // $('.map .world').css('transform', 'translateX(0%)')
        }
    })

    $('.part').eq(2).mouseenter(function () {
        $(this).addClass('animate__animated animate__fadeOutUp').addClass('infinite');
        $('.map .world').css('transform', 'translateX(-25%)');
        $('.title_as').addClass('animate__animated animate__heartBeat').addClass('infinite').addClass('shadow_gold');
        $('.world>svg>a:nth-of-type(3)>path').css('fill', 'var(--blue)');
    }).mouseleave(function () {
        {
            $(this).removeClass('animate__animated animate__fadeOutUp').removeClass('infinite');
            $('.title_as').removeClass('animate__animated animate__heartBeat').removeClass('infinite').removeClass('shadow_gold');
            $('.world>svg>a:nth-of-type(3)>path').css('fill', '#b293627e');
            // $('.map .world').css('transform', 'translateX(0%)')
        }
    })
    $('.part').eq(3).mouseenter(function () {
        $(this).addClass('animate__animated animate__fadeOutUp').addClass('infinite');
        $('.map .world').css('transform', 'translateX(-35%) translateY(-20%)');
        $('.title_au').addClass('animate__animated animate__heartBeat').addClass('infinite').addClass('shadow_gold');
        $('.world>svg>a:nth-of-type(4)>path').css('fill', 'var(--blue)');
    }).mouseleave(function () {
        {
            $(this).removeClass('animate__animated animate__fadeOutUp').removeClass('infinite');
            $('.title_au').removeClass('animate__animated animate__heartBeat').removeClass('infinite').removeClass('shadow_gold');
            $('.world>svg>a:nth-of-type(4)>path').css('fill', '#b293627e');
            // $('.map .world').css('transform', 'translateX(0%)')
        }
    })
// }
// else {
    // $('.map .world').css('transform', 'translateX(0%)')
// }
// 桌機版時要回復原位:resize
$(window).resize(function () {
    if ($(window).width() < 700) {
        $('.part').eq(0).mouseenter(function () {
            $(this).addClass('animate__animated animate__fadeOutUp');
            $('.map .world').css('transform', 'translateX(30%)');
        }).mouseleave(function () {
            {
                $(this).removeClass('animate__animated animate__fadeOutUp');
                $('.map .world').css('transform', 'translateX(0%)')
            }
        })

        $('.part').eq(1).mouseenter(function () {

            $(this).addClass('animate__animated animate__fadeOutUp');
            $('.map .world').css('transform', 'translateX(0%)');
        }).mouseleave(function () {
            {
                $(this).removeClass('animate__animated animate__fadeOutUp');
            }
        })
        $('.part').eq(2).mouseenter(function () {
            $(this).addClass('animate__animated animate__fadeOutUp');
            $('.map .world').css('transform', 'translateX(-25%)');
        }).mouseleave(function () {
            {
                $(this).removeClass('animate__animated animate__fadeOutUp');
                $('.map .world').css('transform', 'translateX(0%)')
            }
        })
        $('.part').eq(3).mouseenter(function () {
            $(this).addClass('animate__animated animate__fadeOutUp');
            $('.map .world').css('transform', 'translateX(-35%) translateY(-20%)');
        }).mouseleave(function () {
            {
                $(this).removeClass('animate__animated animate__fadeOutUp');
                $('.map .world').css('transform', 'translate(0%)')
            }
        })
    }
    else {
        $('.map .world').css('transform', 'translateX(0%)')
    }
})

// 設定在world頁面時...
let wd = $('.world').css('display')
if (wd!='none'){
// 選項固定在下方(手機版寬度)
if ($(window).width() < 700) {
    let wh = $(window).height()
    let nh = $('.beeru-nav-bar').height()
    let fh = $('.beer-warning').height()
    let ph = $('.parts').height()
    $('.parts').removeClass('display-none').css('bottom', fh + 40 + 'px').removeClass('top625');
    $('.phone-option').removeClass('display-none')
}
else {
    $('.parts').addClass('display-none');
    $('.phone-option').addClass('display-none')
}
$(window).resize(function () {
    if ($(window).width() < 700) {
        let wh = $(window).height()
        let nh = $('.beeru-nav-bar').height()
        let fh = $('.beer-warning').height()
        let ph = $('.parts').height()
        $('.parts').removeClass('display-none').addClass('display-flex').css('bottom', fh + 40 + 'px').removeClass('top625');
        $('.phone-option').removeClass('display-none')
    }
    else {
        $('.parts').addClass('display-none');
        $('.phone-option').addClass('display-none');
    }
})
}

// 選項固定在下方(手機版寬度之下高度有變化時)
let fh = $('.beer-warning').height()
if ($(window).height() > 815) {
    $('.parts').css('bottom', 'unset').addClass('top625');
}
else {
    $('.parts').css('bottom', fh + 40 + 'px').removeClass('top625');
}
$(window).resize(function () {
    let fh = $('.beer-warning').height()
    if ($(window).height() > 815) {

        $('.parts').css('bottom', 'unset').addClass('top625');
    }

    else {
        $('.parts').css('bottom', fh + 40 + 'px').removeClass('top625');
    }
})

//當捲軸移動到某個高度時， 選項固定在地圖底部
if ($(window).scrollTop() > 20) {
    $('.parts').css('bottom', 'unset').addClass('top_145').css('position', 'absolute');
}
else {
    $('.parts').css('bottom', fh + 40 + 'px').removeClass('top_145').css('position', 'fixed');
}

$(window).scroll(function () {
    console.log($(window).scrollTop())
    if ($(window).scrollTop() > 20) {
        $('.parts').css('bottom', 'unset').addClass('top_145').css('position', 'absolute');
    }
    else {
        $('.parts').css('bottom', fh + 40 + 'px').removeClass('top_145').css('position', 'fixed');
    }
})

// -------------------------------------------









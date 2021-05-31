$('.us, .eu, .as, .au').hide()
// $('.world_titles').hide()
// 桌機版
// 點選飛到:美洲

$('.world>svg>a:nth-of-type(1)>path, .title_us, .part:nth-of-type(1)').click(function () {
    // console.log("us");
    $('.parts').addClass('d-none')
    $('.pipi_plane_big img').toggleClass('animate__animated animate__pulse')
        .removeClass('infinite')
        .toggleClass('pipi_plane_to_us')
    $('.world').delay(500).fadeOut(500)
    $('.phone-option').fadeOut(500)
    $('.world-eachs').delay(1000).fadeIn(500)
    $('.us').show()
    setTimeout(function () {
        $('.balloon').show();
    }, 3000);
    $('.pipi_plane').toggleClass('animate__animated animate__pulse').toggleClass('infinite');
    // 國旗飛下來
    setTimeout(function () {
        $('.flag').show()
            .toggleClass('animate__animated animate__bounceInDown');
    }, 500);
    
})

// 點選飛到:歐洲
$('.world>svg>a:nth-of-type(2)>path, .title_eu, .part:nth-of-type(2)').click(function () {
    $('.parts').addClass('d-none')
    $('.pipi_plane_big img').toggleClass('animate__animated animate__pulse')
        .removeClass('infinite')
        .toggleClass('pipi_plane_to_eu')
    $('.world').delay(500).fadeOut(500)
    $('.phone-option').fadeOut(500)
    $('.world-eachs').delay(1000).fadeIn(500)
    $('.us, .as, .au').hide()
    $('.eu').show()
    setTimeout(function () {
        $('.balloon').show();
    }, 3000);
    $('.pipi_plane').toggleClass('animate__animated animate__pulse').toggleClass('infinite');
    // 國旗飛下來
    let timeLag = 100;
    $('.eu_flags .flag').each(function(){
        let $that = $(this);
        console.log('first $that', $that);
        timeLag +=200;
        setTimeout(function () {
            console.log('2nd $that', $that);
            $that.show().toggleClass('animate__animated animate__bounceInDown');
            
        }, 200+timeLag);
    })
    $('.eu .arrow-left, .eu .arrow-right').toggleClass('animate__animated animate__pulse').toggleClass('infinite')
})
// 點選飛到:亞洲
$('.world>svg>a:nth-of-type(3)>path, .title_as, .part:nth-of-type(3)').click(function () {
    $('.parts').addClass('d-none')
    $('.pipi_plane_big img').toggleClass('animate__animated animate__pulse')
        .removeClass('infinite')
        .toggleClass('pipi_plane_to_eu')
    $('.world').delay(500).fadeOut(500)
    $('.phone-option').fadeOut(500)
    $('.world-eachs').delay(1000).fadeIn(500)
    // $('.us, .eu, .au').hide()
    $('.as').show()
    setTimeout(function () {
        $('.balloon').show();
    }, 3000);
    $('.pipi_plane').toggleClass('animate__animated animate__pulse').toggleClass('infinite');
    // 國旗飛下來
    let timeLag = 100;
    $('.as_flags .flag').each(function(){
        let $that = $(this);
        console.log('first $that', $that);
        timeLag +=200;
        setTimeout(function () {
            console.log('2nd $that', $that);
            $that.show().toggleClass('animate__animated animate__bounceInDown');
            
        }, 200+timeLag);
    })
    $('.as .arrow-left, .eu .arrow-right').toggleClass('animate__animated animate__pulse').toggleClass('infinite')
})
// 點選飛到:大洋洲
$('.world>svg>a:nth-of-type(4)>path, .title_au, .part:nth-of-type(4)').click(function () {
    $('.parts').addClass('d-none')
    $('.pipi_plane_big img').toggleClass('animate__animated animate__pulse')
        .removeClass('infinite')
        .toggleClass('pipi_plane_to_au')
    $('.world').delay(500).fadeOut(500)
    $('.phone-option').fadeOut(500)
    $('.world-eachs').delay(1000).fadeIn(500)
    // $('.us, .eu, .au').hide()
    $('.au').show()
    setTimeout(function () {
        $('.balloon').show();
    }, 3000);
    $('.pipi_plane').toggleClass('animate__animated animate__pulse').toggleClass('infinite');
    // 國旗飛下來
    let timeLag = 100;
    $('.au_flags .flag').each(function(){
        let $that = $(this);
        console.log('first $that', $that);
        timeLag +=250;
        setTimeout(function () {
            console.log('2nd $that', $that);
            $that.show().toggleClass('animate__animated animate__bounceInDown');
            
        }, 500+timeLag);
    })


    // setTimeout(function () {
    //     $('.flag').show()
    //         .toggleClass('animate__animated animate__bounceInDown');
    // }, 1000);
    $('.as .arrow-left, .eu .arrow-right').toggleClass('animate__animated animate__pulse').toggleClass('infinite')

})



// --------------------------------------------------------------------
// 輪播牆-美洲

// 輪播牆-歐洲
slick = 0

// 左箭頭
$('.eu .arrow-right').click(function () {
    slick += 1
    if (slick > 6) {
        slick = 0;
    }
    $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
})

// 右箭頭
$('.eu .arrow-left').click(function () {
    slick -= 1
    if (slick < 0) {
        slick = 0;
    }
    $('.eu .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
})


if ($(window).width() < 700) {
    $('.eu .arrow-right').click(function () {
        slick += 1
        if (slick > 6) {
            slick = 0;
        }
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    })
    
    // 右箭頭
    $('.eu .arrow-left').click(function () {
        slick -= 1
        if (slick < 0) {
            slick = 0;
        }
        $('.eu .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    })
}

// 輪播牆-亞洲
slick = 0

// 左箭頭
$('.as .arrow-right').click(function () {
    slick += 1
    if (slick > 2) {
        slick = 0;
    }
    $('.as .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
})

// 右箭頭
$('.as .arrow-left').click(function () {
    slick -= 1
    if (slick < 0) {
        slick = 0;
    }
    $('.as .manycountry').css('left', slick * -140 + 'px').css('transition', '.3s');
})

if ($(window).width() < 700) {
    $('.as .arrow-right').click(function () {
        slick += 1
        if (slick > 2) {
            slick = 0;
        }
        $('.as .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    })
    
    // 右箭頭
    $('.as .arrow-left').click(function () {
        slick -= 1
        if (slick < 0) {
            slick = 0;
        }
        $('.as .manycountry').css('left', slick * -105 + 'px').css('transition', '.3s');
    })
}

// 氣球天使到處飄移--------------------------------
function Fireworm() {
    this.element = $('.balloon');
}

// 設定初始位置：x軸和y軸
Fireworm.prototype.show = function () {
    this.element.css({
        // "top": this.pointY + "px",
        // "left": this.pointX + "px"

        "top": 300 + "px",
        "left": 200 + "px"
    })
    $('body').append(this.element);
    return this;
};

// 設置x軸randomInt(最大值400)+固定300
// 設置y軸randomInt(最大值200)+固定200
Fireworm.prototype.newPoint = function () {
    this.pointX = randomInt(400) + 300;
    this.pointY = randomInt(200) + 200;
    return this;
};

// 設定速度.speedRun = (randomInt(最大10) + 至少固定1) * 1000;(加起來最大11秒)
Fireworm.prototype.speed = function () {
    this.speedRun = (randomInt(10) + 1) * 1000;
    return this;
};

Fireworm.prototype.fly = function () {
    let self = this;
    this.element.animate({
        "top": this.pointY,
        "left": this.pointX
    }, this.speedRun, function () {
        self.speed().newPoint().fly();
    })
};

// 亂數產生器（固定）
function randomInt(max) {
    return Math.floor(Math.random() * max);
};

//動畫幀數 
$(function () {
    // total隻數
    let totle = 30;
    let fireworm = [];
    for (let i = 0; i < totle; i++) {
        fireworm[i] = new Fireworm();
        fireworm[i].newPoint().show().speed().newPoint().fly()
    }
})
// -------------------------------------------------------
// deco









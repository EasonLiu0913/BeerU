const setDoorTime = 'DoorInTime';//給localstorage一個key值
var DoorInTime = localStorage.getItem(setDoorTime);//取出 localstorage值

    function doorIn() {
    
        if (!DoorInTime || DoorInTime < new Date().getTime()) {
            var expireTime = new Date().getTime() + 60*60*1000;//過期時間、1小時
            localStorage.setItem('DoorInTime', expireTime); //在條件下設定localstorage的value
           
        } 
    }
   
    ///計時器
    var timmer = setInterval(function () {

        var DoorInTime = localStorage.getItem('DoorInTime') * 1;

        ///時間之後清除localStorage
        if (new Date().getTime() > DoorInTime) {
        
            localStorage.clear()
        }

    }, 1000)


$(document).ready(function () {

    // Landingpage一開始進門畫面//
    let scrollNow = $(window).scrollTop();

    if (scrollNow == 0 && (!localStorage.getItem('DoorInTime')  || +localStorage.getItem('DoorInTime')  < new Date().getTime())) {

        // 門以外的東西都消失
        $('.header').addClass('nav-headerOut');
        $('.beeru-nav-bar').addClass('OUT');
        $('#LandingPage').addClass('IN');
        $('#content-wrap').addClass('OUT');
        $('footer').addClass('OUT')

        $('#NO').click(function(){
            $('.pop-up-1').css('height','100%').fadeIn(150);
            $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>').css('background-color', 'var(--red)')
            $('.pop-up-1 .pop-up-text').text('未滿18歲請勿進入');
            $('button.ok').on('click', function() {

                $('.pop-up-1').fadeOut(150);

            })


        })


        // 按了Yes之後
        $('#YES').click(function () {
            
            doorIn();//放入開門計時器
            ////////////////////// 首頁效果///////////////////

            if ($(window).width() >= 992) {
                $('.LandingPage .pip_push').addClass('pipi-flyIn');

                setTimeout(() => {
                    $('.door_outside').addClass('DOOR-OPEN');

                }, 1500);

            }

            if ($(window).width() < 992) {
                $('.LandingPage .pip_push').addClass('pipi-flyIn-RWD');
                setTimeout(() => {
                    $('.door_outside').addClass('DOOR-OPEN-RWD');

                }, 1500);
            }


            $('.doorSign_warp').css('opacity', '0');
            $('.button_warp').css('opacity', '0');



            setTimeout(() => {
                $('.door_outside').css('opacity', '0');
            }, 3000);


            setTimeout(() => {

                $(".LandingPage_warp").addClass('Door-ZoomOut')
                $(".colum").css('opacity', '0')



            }, 3200);


            setTimeout(() => {
                $('#content-wrap').removeClass('OUT');
                $('.header').removeClass('nav-headerOut');
                $('.beeru-nav-bar').removeClass('OUT');
                $('#LandingPage').removeClass('IN');
                $('footer').removeClass('OUT')
                $('#LandingPage').fadeOut();

                $('#content-wrap').fadeIn();
                $('#beeru-nav-bar').fadeIn();


            }, 4500)


            setTimeout(() => {

                $('.pip_pick').addClass('pipi-flyout')


            }, 7000)


        });




        if ($(window).width() >= 992) {


            setTimeout(() => {
                $('.woman01-img').css('opacity', '1').css('transition', '0.8s');

            }, 8000)

            setTimeout(() => {
                $('.woman02-img').css('opacity', '1').css('transition', '0.8s');

            }, 8500)

            setTimeout(() => {
                $('.woman03-img').css('opacity', '1').css('transition', '0.8s');

            }, 9000)
            setTimeout(() => {
                $('.woman04-img').css('opacity', '1').css('transition', '0.8s');

            }, 9500)

            // 說話的女人們
            setTimeout(() => {


                $('.woman01').on({

                    mouseenter: function () {
                        $('.talk01').css('transform', 'scale(1) translate(-80px, -80px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman01-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk01').css('transform', 'scale(0.5)  translate(-80px, -80px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman01-img').removeClass('WomanMove')
                        
                    }

                })

                $('.woman02').on({

                    mouseenter: function () {
                        $('.talk02').css('transform', 'scale(1) translate(50px, -60px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman02-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk02').css('transform', 'scale(0.5) translate(50px, -60px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman02-img').removeClass('WomanMove')

                    }

                })

                $('.woman03').on({

                    mouseenter: function () {
                        $('.talk03').css('transform', 'scale(1) translate(50px, -80px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman03-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk03').css('transform', 'scale(0.5) translate(50px, -80px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman03-img').removeClass('WomanMove')

                        

                    }

                })

                $('.woman04').on({

                    mouseenter: function () {
                        $('.talk04').css('transform', 'scale(1) translate(30px, -60px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman04-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk04').css('transform', 'scale(0.5) translate(30px, -60px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman04-img').removeClass('WomanMove')

                    }

                })

            }, 9500);



        }

        if ($(window).width() < 992) {
            setTimeout(() => {
                $('.RWD-button').css('opacity', '1').css('transition', '0.8s');

            }, 9000)
        }



    }

    //若沒開門
    else {

        $('#LandingPage').addClass('OUT');
        $('#content-wrap').css('display', 'block').css('opacity', '1');


        setTimeout(() => {

            $('.pip_pick').addClass('pipi-flyout')

        }, 3000)

        //網頁效果
        if ($(window).width() >= 992) {
            setTimeout(() => {
                $('.woman01-img').css('opacity', '1').css('transition', '0.8s');

            }, 1800)

            setTimeout(() => {
                $('.woman02-img').css('opacity', '1').css('transition', '0.8s');

            }, 2300)

            setTimeout(() => {
                $('.woman03-img').css('opacity', '1').css('transition', '0.8s');

            }, 2800)
            setTimeout(() => {
                $('.woman04-img').css('opacity', '1').css('transition', '0.8s');

            }, 3300)



            // 說話的女人們
            setTimeout(() => {


                $('.woman01').on({

                    mouseenter: function () {
                        $('.talk01').css('transform', 'scale(1) translate(-80px, -80px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman01-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk01').css('transform', 'scale(0.5)  translate(-80px, -80px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman01-img').removeClass('WomanMove')
                        
                    }

                })

                $('.woman02').on({

                    mouseenter: function () {
                        $('.talk02').css('transform', 'scale(1) translate(50px, -60px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman02-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk02').css('transform', 'scale(0.5) translate(50px, -60px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman02-img').removeClass('WomanMove')

                    }

                })

                $('.woman03').on({

                    mouseenter: function () {
                        $('.talk03').css('transform', 'scale(1) translate(50px, -80px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman03-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk03').css('transform', 'scale(0.5) translate(50px, -80px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman03-img').removeClass('WomanMove')

                        

                    }

                })

                $('.woman04').on({

                    mouseenter: function () {
                        $('.talk04').css('transform', 'scale(1) translate(30px, -60px)').css('opacity', '1').css('transition', '0.5s')
                        $('.woman04-img').addClass('WomanMove')
                    },
                    mouseleave: function () {
                        $('.talk04').css('transform', 'scale(0.5) translate(30px, -60px)').css('opacity', '0').css('transition', '0.5s')
                        $('.woman04-img').removeClass('WomanMove')

                    }

                })

            }, 3300);

        }


        //    首頁RWD按鈕出現
        if ($(window).width() < 992) {
            setTimeout(() => {
                $('.RWD-button').css('opacity', '1').css('transition', '0.8s');

            }, 1500)

        }



    }

    ////////精釀小學堂效果////////////

    $(window).scroll(function () {


        let scrollNow = $(window).scrollTop();
        console.log('scrollTop', scrollNow);


        if ($(window).width() >= 992) {
            if (scrollNow >= 175) {

                $('.Brew-school').addClass('BeerU-fadeIN')

            }

            if (scrollNow >= 300) {
                $('.brew-beer-img').css('transform', 'translateX(0px)').css('transition', '2s');
                $('.bussiness-beer-img').css('transform', 'translateX(0px)').css('transition', '2s');
            }
            else {
                $('.brew-beer-img').css('transform', 'translateX(-200px)').css('transition', '2s');
                $('.bussiness-beer-img').css('transform', 'translateX(200px)').css('transition', '2s');

            }



        }

        if ($(window).width() < 992) {

            if (scrollNow >= 141) {

                $('.Brew-school').css('opacity', '1').css('transition', '0.8s')

            }
        }


    });


    if ($(window).width() >= 992) {

        $('.brew-beer-left').on({

            mouseenter: function () {

                $('.brew-beer-img').css('opacity', '1').css('transition', '0.3s');

            },

            mouseleave: function () {

                $('.brew-beer-img').css('opacity', '0.6').css('transition', '0.8s');
            }


        })


        $('.bussiness-beer-right').on({

            mouseenter: function () {

                $('.bussiness-beer-img').css('opacity', '1').css('transition', '0.3s');

            },

            mouseleave: function () {

                $('.bussiness-beer-img').css('opacity', '0.6').css('transition', '0.8s');
            }

        })
    }

    if ($(window).width() < 992) {

        $('.brew-beer-left').click(function () {

            $('.brew-beer-img').css('opacity', '1').css('transition', '0.3s');

            $('.bussiness-beer-img').css('opacity', '0.6').css('transition', '0.8s');
        })


        $('.bussiness-beer-right').click(function () {


            $('.bussiness-beer-img').css('opacity', '1').css('transition', '0.8s');

            $('.brew-beer-img').css('opacity', '0.6').css('transition', '0.8s');
        })



    }




    ///////////// Beer-type輪播牆//////////////////


    $(window).scroll(function () {


        let scrollNow = $(window).scrollTop();
       

        if ($(window).width() >= 992) {
            if (scrollNow >= 895) {

                $('.Beer-type').addClass('BeerU-fadeIN')

            }


            if (scrollNow >= 1320) {

                $('.hand').css('transform', 'translate(-150px,-250px) rotate(0)').css('transition', '2s')



                setInterval(() => {
                    $('.type-color').css('opacity', '1').css('transition', '1s')

                }, 1200);


            }

            else {
                $('.hand').css('transform', 'translate(-300px,-250px) rotate(-30deg)').css('transition', '2s')

            }




        }

        if ($(window).width() < 992) {

            if (scrollNow >= 764) {

                $('.Beer-type').css('opacity', '1').css('transition', '0.8s')

            }
        }


    });


    ///////////// Beer-type輪播牆//////////////////


    let page = 0;

    $('.Beer-type-content').parents().find('.drop').eq(page).css('filter', 'drop-shadow(0 0 10px #0AB6E4)').siblings().css('filter', 'transparent');

    $('.Beer-type-content').parents().find('.colorDot').eq(page).css('border', 'solid 3px white').siblings().css('border', 'transparent');





    $('.drop').on({

        click: function () {

            page = $(this).index();
            console.log('dots page', $(this).index());

            $(this).css('filter', 'drop-shadow(0 0 10px #0AB6E4  )').siblings().css('filter', 'none');

            $('.Beer-type-content-warp').css('left', $(this).index() * -720 + 'px').css('transition', '1s');

        },

        mouseenter: function () {
            page = $(this).index();
            // console.log('dots page',$(this).index());

            $(this).css('filter', 'drop-shadow(0 0 10px #0AB6E4  )').siblings().css('filter', 'none');

            $('.Beer-type-content-warp').css('left', $(this).index() * -720 + 'px').css('transition', '1s');


        }


    });



    $('.colorDot').click(function () {

        page = $(this).index();

        // console.log('little dots',$(this).index());


        $(this).css('border', 'solid 3px white').siblings().css('border', 'transparent');

        $('.Beer-type-content-warp').css('left', $(this).index() * -370 + 'px').css('transition', '1s');




    });



    $('.type-backward').click(function () {

        page += 1;

        if (page > 8) {
            page = 0;
        };

        

        $('.Beer-type-content').parents().find('.drop').eq(page).css('filter', 'drop-shadow(0 0 10px #0AB6E4  )').siblings().css('filter', 'none');


        $('.Beer-type-content').parents().find('.colorDot').eq(page).css('border', 'solid 3px white').siblings().css('border', 'transparent');



        if ($(window).width() >= 992) {

            $('.Beer-type-content-warp').css('left', page * -720 + 'px').css('transition', '1s');

        }

        if ($(window).width() < 992) {

            $('.Beer-type-content-warp').css('left', page * -370 + 'px').css('transition', '1s');

        }
        console.log(page);

    })

    $('.type-backward img').on({

        mousedown : function () {

            $(this).css('opacity','0').css('transition','.5s')

        },

        mouseup : function (){
            $(this).css('opacity','1').css('transition','.5s')
            

        }
    })

    $('.type-forward img').on({

        mousedown : function () {

            $(this).css('opacity','0').css('transition','.5s')

        },

        mouseup : function (){
            $(this).css('opacity','1').css('transition','.5s')
            

        }
    })




    $('.type-forward').click(function () {

        page -= 1;

        if (page < 0) {
            page = 8;
        };



        $('.Beer-type-content').parents().find('.drop').eq(page).css('filter', 'drop-shadow(0 0 10px #0AB6E4)').siblings().css('filter', 'none');


        $('.Beer-type-content').parents().find('.colorDot').eq(page).css('border', 'solid 3px white').siblings().css('border', 'transparent');


        if ($(window).width() >= 992) {
            $('.Beer-type-content-warp').css('left', page * -720 + 'px').css('transition', '1s');


        }

        if ($(window).width() < 992) {

            $('.Beer-type-content-warp').css('left', page * -370 + 'px').css('transition', '1s');

        }

        //   console.log(page);

        //   console.log('lg-3 width', $('.colllection-items-warp .col-lg-3').outerWidth());
    })


   

    ////////////啤女精選//////////////



    $(window).scroll(function () {

        let scrollNow = $(window).scrollTop();

        if ($(window).width() >= 992) {
            if (scrollNow >= 1740) {

                $('.BeerU-colllection').addClass('BeerU-fadeIN')

            }
        }
        if ($(window).width() < 992) {

            if (scrollNow >= 1499) {

                $('.BeerU-colllection').addClass('BeerU-fadeIN')

            }
            
        }

    })

    
    if ($(window).width() >= 992) {
        $('.colllection-items-warp').slick({

            // arrows: false,
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
        
            autoplaySpeed: 2000
            
        
        });
    }



    if ($(window).width() < 992){
        $('.colllection-items-warp').slick({

            arrows: false,
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000
            
        
        });

    }

    

  $('.item').on({
    

    mouseenter: function(){

    if ($(window).width() >= 992) {
        $(this).children('.item-flag').css('transform','rotate(20deg) translate(90px,38px)').css('transition','.4s');
    }

    if ($(window).width() < 992){
        $(this).children('.item-flag').css('transform','rotate(20deg) translate(90px,55px)').css('transition','.4s');


    }

       $(this).children('.item-img').css('transform','translate(0px,-20px)').css('transition','.4s')

       $(this).children('.item-intro').css('color','var(--yellow)').css('transition','.4s')


    },

    mouseleave: function(){

        $(this).children('.item-flag').css('transform',' rotate(20deg) translate(90px,68px)').css('transition','.4s');

        $(this).children('.item-img').css('transform','translate(0px,0px)').css('transition','.4s')
 
        $(this).children('.item-intro').css('color','white').css('transition','.4s')


    }
    
     


  })


///////// 啤女分頁//////////////////


$(window).scroll(function () {

    let scrollNow = $(window).scrollTop();

    if ($(window).width() >= 992) {
        if (scrollNow >= 2398) {

            $('.BeerU-feature').addClass('BeerU-fadeIN')

        }
    }
    if ($(window).width() < 992) {

        if (scrollNow >= 2218) {

            $('.BeerU-feature').addClass('BeerU-fadeIN')

        }
        
    }

})

  $('.feature').on({

    mouseenter: function(){
        $(this).find('.feature-img').css('filter','grayscale(80%)').css('transform','scale(1.2)').css('transition','.8s')

        $(this).find('.feature-content').css('background','linear-gradient(to right ,#b69564 0% , transparent 100%').css('transition','.8s')




    },
       

    mouseleave: function(){

        $(this).find('.feature-img').css('filter','grayscale(0%)').css('transform','scale(1)').css('transition','.8s')
        
        
        $(this).find('.feature-content').css('background','linear-gradient(to right ,#000 0% , transparent 100%')

    }




  })

//////////////啤女傳說////////////////

$(window).scroll(function () {

    let scrollNow = $(window).scrollTop();

    if ($(window).width() >= 992) {
        if (scrollNow >= 3207) {

            $('.BeerU-legend-title').addClass('BeerU-fadeIN')

        }

        if (scrollNow >= 3465) {

            $('.legned-story:nth-of-type(1)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');

            setTimeout(() => {

                $('.legned-story:nth-of-type(2)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');

                $('.legned-story:nth-of-type(1)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');

            }, 500)

            setTimeout(() => {
                $('.legned-story:nth-of-type(3)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');


                $('.legned-story:nth-of-type(2)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');



            }, 1200)

            setTimeout(() => {
                $('.legned-story:nth-of-type(3)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');



            }, 1700)
           

        }
    }


    if ($(window).width() < 992) {

        if (scrollNow >= 3272) {

            $('.BeerU-legend-title').addClass('BeerU-fadeIN');

        }

        if (scrollNow >= 3373) {

            $('.legned-story:nth-of-type(1)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');


        } 

        if (scrollNow >= 3524) {

            $('.legned-story:nth-of-type(1)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');

            $('.legned-story:nth-of-type(2)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');

        } 
        if (scrollNow >= 3714) {

            $('.legned-story:nth-of-type(2)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');

            $('.legned-story:nth-of-type(3)').css('opacity','1').css('transition','0.6s').children('.legned').css('border',' solid 2px var(--yellow)').css('transition','0.6s').children().css('color',' var(--yellow)').css('transition','0.6s');;

        } 
        if (scrollNow >= 3811) {

            $('.legned-story:nth-of-type(3)').children('.legned').css('border',' solid 2px var(--gold)').css('transition','0.6s').children().css('color',' var(--gold)').css('transition','0.6s');
        } 
               
        

           

    
    } 
    

})






//////////// 啤啤/////////////////


$(window).scroll(function () {

    let scrollNow = $(window).scrollTop();

    if ($(window).width() >= 992) {
        if (scrollNow >= 3776) {

            $('.pipi').addClass('BeerU-fadeIN')

        }
    }
    if ($(window).width() < 992) {

        if (scrollNow >= 3925) {

            $('.pipi').addClass('BeerU-fadeIN')

        }
        
    }

})


$('.pipi-body').on({
         mouseenter: function(){

            if ($(window).width() >= 992) {

                $('.pipi-arrow').css('transform','translateX(-500px)').css('opacity','0').css('transition','0.6s');

                setTimeout(() => {
                 $('.pipi-arrow').css('transform','translateX(-30px)').css('opacity','0').css('transition','0.01s');
                
                },500)
            
            }


            if ($(window).width() < 992) {
                $('.pipi-arrow').css('transform','translateX(-500px)').css('opacity','0').css('transition','0.6s');

                setTimeout(() => {
                    $('.pipi-arrow').css('transform','translateX(-20px)').css('opacity','0').css('transition','0.01s');

                },500)


            }
            
    
        },
    
        mouseleave: function(){


            setTimeout(() => {
                $('.pipi-arrow').css('opacity','1').css('transition','1s');
            
            },1200)
    
           
    
        }
        
    
    // click: function(){


    //     if ($(window).width() >= 992) {
    //         $('.pipi-arrow').css('transform','translateX(-500px)').css('opacity','0').css('transition','0.8s');

    //         setTimeout(() => {
    //             $('.pipi-arrow').css('transform','translateX(-30px)').css('opacity','0').css('transition','0.1s');

    //         },1000)

    //         setTimeout(() => {
    //             $('.pipi-arrow').css('opacity','1').css('transition','1s');

    //         },1500)
    //     }

    //     if ($(window).width() < 992) {
    //         $('.pipi-arrow').css('transform','translateX(-500px)').css('opacity','0').css('transition','0.8s');

    //         setTimeout(() => {
    //             $('.pipi-arrow').css('transform','translateX(-20px)').css('opacity','0').css('transition','0.1s');

    //         },1000)

    //         setTimeout(() => {
    //             $('.pipi-arrow').css('opacity','1').css('transition','1s');

    //         },1500)

    //      }

    // }



})



// Scroll to top button 
// 桌機版 
if ($(window).width() >= 992) {
    $(window).scroll(function () {

        if ($(this).scrollTop() >= 5) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(500);
        }
    })

    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 750, 'swing');

    })

}

// 手機版
if ($(window).width() < 992) {
    $(window).scroll(function () {
        // console.log($(this).scrollTop())
        if ($(this).scrollTop() >= 15) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(500);
        }


    })

    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 750,'swing');
    })
}
















});








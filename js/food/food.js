// ----- Scroll to top button -----
// 桌機版 
if ($(window).width() >= 992) {
    $(window).scroll(function () {

        if ($(this).scrollTop() >= 1310) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    })

    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 1350
        }, 300, 'swing');

    })

}


// 手機版
if ($(window).width() < 992) {
    $(window).scroll(function () {

        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }

    })

    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    })

    if ($(this).scrollTop() >= 2688) {
                    $('#side-nav').fadeIn(200);
                } else {
                    $('#side-nav').fadeOut(200);
                }
        
}


$(document).ready(function () {
    // Add smooth scrolling to all links
    $("a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 300, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});



// ------- 手動畫 ------- //

$(window).scroll(function () {


    let scrollNow = $(window).scrollTop();
    // console.log('scrollTop', $(this).scrollTop());

    // 桌機版
    if ($(window).width() >= 992) {
        if (scrollNow >= 900) {

            $('.title-line').css('opacity', '1').css('transition', '1s')

        }


        if (scrollNow >= 1255) {

            $('.hand').css('transform', 'translate(-250px,-450px) rotate(15deg)').css('transition', '1s')



            //   setInterval(() => {
            //     $('.type-color').css('opacity','1').css('transition','1s')

            //   }, 1500);


        }

        else {
            $('.hand').css('transform', 'translate(-150px,-250px) rotate(-30deg)').css('transition', '1s')

        }




    }

    // 

    if ($(window).width() < 992) {

        if (scrollNow >= 764) {

            $('.Beer-type').css('opacity', '1').css('transition', '0.8s')

        }

        if (scrollNow >= 1870) {

            $('.hand').css('transform', 'translate(-150px,-250px) rotate(0)').css('transition', '1s')



            //   setInterval(() => {
            //     $('.type-color').css('opacity','1').css('transition','1s')

            //   }, 1500);


        }

        else {
            $('.hand').css('transform', 'translate(-150px,-250px) rotate(-30deg)').css('transition', '1s')

        }



    }


});

//  ------  scroll-animations  ------ //
console.log('hi')
// jQuery(function ($) {
//  // 設置執行Animations=function (){}
//         let doAnimations = function () {

//             console.log('hi2')
//             // let offset = $(window).scrollTop() + $(window).height(),

//             // 設置預設動作的class=$('.animatable')(預設為hidden，paused)
//             $animatables = $('.animatable');

//             // 條件1:若$('.animatable')的數量為0
//              if ($animatables.length == 0) {
//             //     $(window).off('scroll', doAnimations);
//             }
      
//             $(window).scroll(function() {
//             $animatables = $('.animatable');
//             let userScrollTop = $(window).scrollTop()
            
//             let halfWindowHeight = $(window).height() / 5 * 4
                
//             $animatables.each(function (i) {
//             // let $animatable = $(this);
//              let anipo = $(this).offset().top
//              console.log(userScrollTop,halfWindowHeight,anipo)
//              if (anipo < userScrollTop + halfWindowHeight) {
//                 $this.removeClass('animatable').addClass('animated');
            
      
//             // if (($animatable.offset().top + $animatable.height() - 20) < offset) {
//             //    $animatable.removeClass('animatable').addClass('animated');

        


//     // ----- side-nav -----   
//                 let index = $animatable.closest('.pair-wrap').attr('data-index')
//                 let navItem = $('.side-drop-img').eq(index);
//                 navItem.addClass('selected-drop').siblings().removeClass('selected-drop');
                
//             }
        
//         });



//         $('.animated').each(function (i) {
//             let $animatable = $(this);
//             let index = $animatable.closest('.pair-wrap').prev().attr('data-index')
//             if (($(this).offset().top + $(this).height() -100) > offset) {
//                 $(this).removeClass('animated').addClass('animatable');


//     // ----- side-nav -----           
//                 let navItem = $('.side-drop-img').eq(index);
//                 navItem.addClass('selected-drop').siblings().removeClass('selected-drop');

//             }
        
//         });
//     });

//     // Hook doAnimations on scroll, and trigger a scroll
//     $(window).on('scroll', doAnimations);
//     $(window).trigger('scroll');
// }
// });






// -----  side-bar -----

$(window).scroll(function () {

    let scrollNow = $(window).scrollTop();
    console.log(scrollNow)
    

    if ($(window).width() < 992) {
        

        if (scrollNow >= 2250) {

            $('#side-nav').fadeIn(200);
        } else {
           $('#side-nav').fadeOut(200);
        }
    }



            $animatables = $('.animatable');
            $animateds = $('.animated');
            let userScrollTop = $(window).scrollTop()
            
            let halfWindowHeight = $(window).height() / 5 * 4
                
            $animatables.each(function (i) {
             let anipo = $(this).offset().top
             if (anipo < userScrollTop + halfWindowHeight) {
                // console.log(userScrollTop,halfWindowHeight,anipo)
                $(this).removeClass('animatable').addClass('animated');

            // ----- side-nav -----   
                let index = $(this).closest('.pair-wrap').attr('data-index')
                let navItem = $('.side-drop-img').eq(index);
                navItem.addClass('selected-drop').siblings().removeClass('selected-drop');
                
            }
            
            // else if( anipo >= userScrollTop + halfWindowHeight){
            //     console.log('back')
            //     $(this).removeClass('animated').addClass('animatable');
            //     let index = $(this).closest('.pair-wrap').attr('data-index')
            //     let navItem = $('.side-drop-img').eq(index);
            //     navItem.addClass('selected-drop').siblings().removeClass('selected-drop');
            // }
        
        });


        $animateds.each(function (i) {
            let anipo = $(this).offset().top
           
           if( anipo >= userScrollTop + halfWindowHeight){
               console.log('back')
               $(this).removeClass('animated').addClass('animatable');
               let index = $(this).closest('.pair-wrap').attr('data-index')
               let navItem = $('.side-drop-img').eq(index);
               navItem.addClass('selected-drop').siblings().removeClass('selected-drop');
           }
       
       });



    //     $('.animated').each(function (i) {
    //         let $animatable = $(this);
    //         let index = $animatable.closest('.pair-wrap').prev().attr('data-index')
    //         if (($(this).offset().top + $(this).height() -100) > offset) {
    //             $(this).removeClass('animated').addClass('animatable');


    // // ----- side-nav -----           
    //             let navItem = $('.side-drop-img').eq(index);
    //             navItem.addClass('selected-drop').siblings().removeClass('selected-drop');

    //         }
        
    //     });

});



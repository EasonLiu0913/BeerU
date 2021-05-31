let myScore = 0;
// 在手機時改為彈出視窗
$(document).ready(function () {
    $('.option-1-title-ch').addClass('show');

    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize() {
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 481) {




            $(".modal-trigger").click(function (e) {
                e.preventDefault();
                dataModal = $(this).attr("data-modal");
                $("#" + dataModal).css({ "display": "block" });

            });

            $(".close-modal, .modal-sandbox").click(function () {
                $(".modal").css({ "display": "none" });

            });

            $(".option-wrap").click(function () {


                let index = $(this).index()
                // $('.quiz-wrapper').attr('data-eq',index)
                let data_eq = $('.quiz-wrapper').attr('data-eq')

                // console.log(data_eq,index)
                if (data_eq == index) {
                    if ($('.quiz-wrapper').attr('data-choice') == 'yes') {
                        $('.quiz-wrapper').attr('data-choice', 'no')
                    }
                    else if ($('.quiz-wrapper').attr('data-choice') == 'no') {
                        $('.quiz-wrapper').attr('data-choice', 'yes')
                    }
                } else {
                    $('.quiz-wrapper').attr('data-choice', 'yes')
                    $('.quiz-wrapper').attr('data-eq', index)
                }

                
                // 第一題

                $(this).siblings().find(".option-1-txt").removeClass('show').prev().addClass('show').parent().siblings().removeClass('show');

                $(this).siblings().find(".option-1-title-ch").removeClass('active').end().end().find(".option-1-title-ch").toggleClass('active').parent().siblings().toggleClass('show');

                // 第二題

                $(".option-2-title-wrap").removeClass('show');

                $(this).siblings().find(".option-img").removeClass('active');

                $(this).find(".option-img").toggleClass('active').siblings().removeClass('active');

                // 第三題

                $(this).siblings().find(".option-3-title").removeClass('active').next().removeClass('show');

                $(this).find(".option-3-title").toggleClass('active').next().toggleClass('show');

                // 第四題

                $(this).find(".option-4-txt").removeClass('show');

                $(this).siblings().find(".option-4-title").removeClass('active').next().children().removeClass('show');

                $(this).find(".option-4-title").toggleClass('active').next().children().toggleClass('show');

                // 第五題

                $(this).siblings().find(".option-5-title").removeClass('show').siblings().removeClass('show');

                $(this).find(".option-5-title").toggleClass('show').siblings().toggleClass('show');

            });

        }
    }
});



$(".option-wrap").click(function () {

    myScore = $(this).data("score");
    // console.log($(this).data("score"));

    // 心理測驗點擊桌機板
    var newWindowWidth = $(window).width();
    if (newWindowWidth > 481) {


        let index = $(this).index()
        // $('.quiz-wrapper').attr('data-eq',index)
        let data_eq = $('.quiz-wrapper').attr('data-eq')

        // console.log(data_eq,index)
        if (data_eq == index) {
            if ($('.quiz-wrapper').attr('data-choice') == 'yes') {
                $('.quiz-wrapper').attr('data-choice', 'no')
            }
            else if ($('.quiz-wrapper').attr('data-choice') == 'no') {
                $('.quiz-wrapper').attr('data-choice', 'yes')
            }
        } else {
            $('.quiz-wrapper').attr('data-choice', 'yes')
            $('.quiz-wrapper').attr('data-eq', index)
        }



        // 第一題
        $(this).siblings().find(".option-1-txt").removeClass('show').prev().addClass('show').parent().siblings().removeClass('show');

        $(this).find(".option-1-title-ch").toggleClass('show').siblings().toggleClass('show').parent().prev().toggleClass('show');

        // 第二題

        $(this).siblings().find(".option-2-title-wrap").removeClass('show');

        $(this).find(".option-2-title-wrap").toggleClass('show');

        // 第三題

        $(this).siblings().find(".option-3-txt").removeClass('show').prev().removeClass('show').prev().removeClass('active');

        $(this).find(".option-3-txt").toggleClass('show').prev().toggleClass('show').prev().toggleClass('active');

        // 第四題

        $(this).siblings().find(".option-4-title span").removeClass('show').parent().next().next().removeClass('show').siblings().children().removeClass('show').parent().prev().removeClass('active');

        $(this).find(".option-4-title span").toggleClass('show').parent().next().next().toggleClass('show').siblings().children().toggleClass('show').parent().prev().toggleClass('active');

        // 第五題

        $(this).siblings().find(".option-5-title").removeClass('show').siblings().removeClass('show');

        $(this).find(".option-5-title").toggleClass('show').siblings().toggleClass('show');
    }

});




let totalScore = 0;
$('.next-btn-wrap').click(function () {




    if ($('.quiz-wrapper').attr('data-choice') == 'no') {
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-exclamation"></i>').css('background-color', 'var(--red)')
        $('.pop-up-1 .pop-up-text').text('請選擇至少一個選項')
    }
    else if ($('.quiz-wrapper').attr('data-choice') == 'yes') {

        // console.log('ok')
        $(this).closest('.quiz-wrap').addClass('d-none')
        $(this).closest('.quiz-wrap').next().removeClass('d-none')
        // let togohref = $(this).attr('data-href')



        totalScore += myScore;
        // console.log(totalScore);

        let doAnimations = function () {

            $animatables = $('.animatable');

            $animatables.each(function (i) {
                let $animatable = $(this);

                $animatable.removeClass('animatable').addClass('animated');
            }
            );
        };
        doAnimations()

        $(window).on('scroll', doAnimations);
        $(window).trigger('scroll');
        $('.quiz-wrapper').attr('data-choice', 'no')

        $('.result-btn').click(function (e) {
            e.preventDefault();
            // console.log('.result-btn', totalScore > 0 <= 5);
            if (totalScore > 0 && totalScore <= 5) {
                window.location.href = "quiz-result-1.php";
            } else if (totalScore > 5 && totalScore <= 10) {
                window.location.href = "quiz-result-2.php";
            } else if (totalScore > 10 && totalScore <= 15) {
                window.location.href = "quiz-result-3.php";
            } else {
                window.location.href = "quiz-result-4.php";
            }

        })
    }


})

// 彈跳視窗
$('button.ok').on('click', function () {
    $('.general-pop-up').fadeOut(150)
})




// ----------------------animation ----------------------------


jQuery(function ($) {

    let doAnimations = function () {

        let offset = $(window).scrollTop() + $(window).height(),
            $animatables = $('.animatable');

        if ($animatables.length == 0) {
            // $(window).off('scroll', doAnimations);
        }

        $animatables.each(function (i) {
            let $animatable = $(this);

            if (($animatable.offset().top + $animatable.height() - 0) < offset) {
                $animatable.removeClass('animatable').addClass('animated');
            }
        });

        $('.animated').each(function (i) {
            let $animatable = $(this);

            if (($(this).offset().top + $(this).height() - 0) > offset) {
                $(this).removeClass('animated').addClass('animatable');
            }
        });
    };

    $(window).on('scroll', doAnimations);
    $(window).trigger('scroll');
});





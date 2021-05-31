
// 加入購物車功能


// 手寫數量
$('.buy-number').on('input', function () {
    let qty = $(this).val()
    let price = $(this).closest('.beer-product').attr('data-price')
    let changePrice = $(this).closest('.p-buy').find('.price')

    if (/^(\+|-)?\d+$/.test(qty) && qty > 0 && qty <= 30 || qty == "") {
        changePrice.text('$' + qty * price)
    } else if (qty > 30) {
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-exclamation"></i>').css('background-color', 'var(--red)')
        $('.pop-up-1 .pop-up-text').text('購買數量超過庫存，庫存為30')
        $(this).val('30')
        changePrice.text('$' + 30 * price)
    } else {
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>').css('background-color', 'var(--red)')
        $('.pop-up-1 .pop-up-text').text('請輸入正確數量，數量不得為0')
        $(this).val('1')
        changePrice.text('$' + price)
    }
})

// 按+數量
$('.plus').on('click', function () {
    let qty = $(this).prev().val()
    let price = $(this).closest('.beer-product').attr('data-price')
    let changePrice = $(this).closest('.p-buy').find('.price')
    if (/^(\+|-)?\d+$/.test(qty) && qty > 0 && qty < 30 || qty == "") {
        qty = qty * 1 + 1
        $(this).prev().val(qty)
        changePrice.text('$' + qty * price)
    } else if (qty >= 30) {
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-exclamation"></i>').css('background-color', 'var(--red)')
        $('.pop-up-1 .pop-up-text').text('購買數量超過庫存，庫存為30')
        $(this).prev().val('30')
        changePrice.text('$' + 30 * price)
    }
})

// 按-數量
$('.minus').on('click', function () {
    let qty = $(this).next().val()
    let price = $(this).closest('.beer-product').attr('data-price')
    let changePrice = $(this).closest('.p-buy').find('.price')
    if (/^(\+|-)?\d+$/.test(qty) && qty > 1 && qty <= 30 || qty == "") {
        qty = qty * 1 - 1
        $(this).next().val(qty)
        changePrice.text('$' + qty * price)
    } else if (qty <= 1) {
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>').css('background-color', 'var(--red)')
        $('.pop-up-1 .pop-up-text').text('購買數量不得為0')
        $(this).next().val('1')
        changePrice.text('$' + price)
    }
})

// -------------------------------------------------------
// 加入購物車
$('.add-cart').on('click', function () {
    let qty = $(this).closest('.p-buy').find('.buy-number').val()
    let psid = $(this).closest('.beer-product').attr('data-sid')

    $.get('cart-api.php', {
        'action': 'add',
        'psid': psid,
        'qty': qty
    }, function (data) {
        // console.log(data)
        showCartCount(data.cart)
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
        $('.pop-up-1 .pop-up-text').text(data.msg)
    }, 'json')

})

// 收藏清單功能

// 加入
function collectProduct() {
    let btn = $(event.currentTarget)
    let psid = btn.closest('.spring-product').attr('data-sid')

    $.get('member-collect-api.php', {
        'action': 'add',
        'psid': psid
    }, function (data) {
        // console.log(data)
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
        $('.pop-up-1 .pop-up-text').text(data.msg)
    }, 'json')
    btn.addClass('d-none')
    btn.next().removeClass('d-none')
}

// 取消
function cancelCollectProduct() {
    let btn = $(event.currentTarget)
    let psid = btn.closest('.spring-product').attr('data-sid')

    $.get('member-collect-api.php', {
        'action': 'delete',
        'psid': psid
    }, function (data) {
        // console.log(data)
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
        $('.pop-up-1 .pop-up-text').text(data.msg)
    }, 'json')
    btn.addClass('d-none')
    btn.prev().removeClass('d-none')
}

// -------------------------------------------------------------
// 彈跳視窗
$('button.ok').on('click', function () {
    $('.general-pop-up').fadeOut(150)
})

// ----------------------text animation 1----------------------------

jQuery(function ($) {
    // Function which adds the 'animated' class to any '.animatable' in view
    let doAnimations = function () {
        // Calc current offset and get all animatables
        let offset = $(window).scrollTop() + $(window).height(),
            $animatables = $('.animatable');
        // Unbind scroll handler if we have no animatables
        if ($animatables.length == 0) {
            // $(window).off('scroll', doAnimations);
        }
        // Check all animatables and animate them if necessary
        $animatables.each(function (i) {
            let $animatable = $(this);
            // console.log('($animatable.offset().top + $animatable.height() - 100) < offset',($animatable.offset().top + $animatable.height() - 100) < offset);
            if (($animatable.offset().top + $animatable.height() - 20) < offset) {
                $animatable.removeClass('animatable').addClass('animated');
            }
        });

        $('.animated').each(function (i) {
            let $animatable = $(this);

            if (($(this).offset().top + $(this).height() - 40) > offset) {
                $(this).removeClass('animated').addClass('animatable');
            }
        });
    };
    // Hook doAnimations on scroll, and trigger a scroll
    $(window).on('scroll', doAnimations);
    $(window).trigger('scroll');
});

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
        }, 750, 'swing');
    })
}
$(function () {


    // 商品分類切換
    if ($(window).width() >= 992) {
        $('.product-select > .product-category').css('display', 'block')
    }


    $(window).resize(function () {

        if ($(window).width() >= 992) {
            $('.product-select > .product-category').css('display', 'block')
        }
        if ($(window).width() < 992) {
            $('.product-select > .product-category').css('display', 'none')
        }
    })



    // ----------------------------------------------------------
    // 加入購物車功能

    // 手寫數量
    product_arrang.on('input', '.buy-number', function () {
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
    product_arrang.on('click', '.plus', function () {
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
    product_arrang.on('click', '.minus', function () {
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
    product_arrang.on('click', '.add-cart', function () {
        let qty = $(this).closest('.p-buy').find('.buy-number').val()
        let psid = $(this).closest('.beer-product').attr('data-sid')

        $.get('cart-api.php', { 'action': 'add', 'psid': psid, 'qty': qty }, function (data) {
            // console.log(data)
            showCartCount(data.cart)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')

    })




    // --------------------------------------------------------
    // 收藏清單功能

    // 加入
    product_arrang.on('click', '.btn_collect', function () {
        let psid = $(this).closest('.beer-product').attr('data-sid')

        $.get('member-collect-api.php', { 'action': 'add', 'psid': psid }, function (data) {
            // console.log(data)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')
        $(this).addClass('d-none')
        $(this).next().removeClass('d-none')
    })

    // 取消
    product_arrang.on('click', '.btn_collect_active', function () {
        let psid = $(this).closest('.beer-product').attr('data-sid')

        $.get('member-collect-api.php', { 'action': 'delete', 'psid': psid }, function (data) {
            // console.log(data)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')
        $(this).addClass('d-none')
        $(this).prev().removeClass('d-none')
    })


    // -----------------------------------------------------------------
    // 關注功能
    // 加入

    btn_attention.on('click', '.btn_attention_be', function () {
        let tsid = $(this).parent().prev('.product-tag').find('p').attr('data-cate')
        // console.log(tsid)

        $.get('member-attention-api.php', { 'action': 'add', 'tsid': tsid }, function (data) {
            // console.log(data)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')
        $(this).addClass('d-none')
        $(this).next().removeClass('d-none')
    })
    // 取消
    btn_attention.on('click', '.btn_attention_active', function () {
        let tsid = $(this).parent().prev('.product-tag').find('p').attr('data-cate')
        // console.log(tsid)

        $.get('member-attention-api.php', { 'action': 'delete', 'tsid': tsid }, function (data) {
            // console.log(data)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')
        $(this).addClass('d-none')
        $(this).prev().removeClass('d-none')
    })



    // -------------------------------------------------------------
    // 彈跳視窗
    $('button.ok').on('click', function () {
        $('.general-pop-up').fadeOut(150)
    })


    // --------------------------------------------------------------
    // banner自動輪播

    let index = 0;
    $('.all-product .product-banner-box').eq(0).addClass('w-opacity-1')

    if ($('.all-product .product-banner-box').eq(0).hasClass('w-opacity-1')) {
        $('.all-product .product-banner-box').eq(0).find('.product-banner-intro p').addClass('anima-on')
        $('.all-product .product-banner-box').eq(0).find('.product-banner-intro a').addClass('anima-on')
        $('.all-product .product-banner-box').eq(0).find('.product-banner-pic img').addClass('anima-on')
    }

    setInterval(() => {
        index = index + 1;
        if (index > 1) {
            index = 0
        }
        $('.all-product .product-banner-box').eq(index).addClass('w-opacity-1').siblings().removeClass('w-opacity-1')
        if ($('.all-product .product-banner-box').eq(index).hasClass('w-opacity-1')) {
            $('.all-product .product-banner-box').eq(index).find('.product-banner-intro p').addClass('anima-on')
            $('.all-product .product-banner-box').eq(index).find('.product-banner-intro a').addClass('anima-on')
            $('.all-product .product-banner-box').eq(index).find('.product-banner-pic').addClass('anima-on')
            $('.all-product .product-banner-box').eq(index).find('.product-banner-pic img').addClass('anima-on')
            $('.all-product .product-banner-box').eq(index).siblings().find('.product-banner-intro p').removeClass('anima-on')
            $('.all-product .product-banner-box').eq(index).siblings().find('.product-banner-intro a').removeClass('anima-on')
            $('.all-product .product-banner-box').eq(index).siblings().find('.product-banner-pic').removeClass('anima-on')
            $('.all-product .product-banner-box').eq(index).siblings().find('.product-banner-pic img').removeClass('anima-on')
        }
    }, 6000);



    // ----------------------------element scrollin視窗滾動-----------------------------//
    function pageAnima() {
        let userScrollTop = $(window).scrollTop()
        let halfWindowHeight = $(window).height() / 4 * 3
        $('.w-scrollin-start').each(function () {
            let elemPos = $(this).offset().top
            if (elemPos < userScrollTop + halfWindowHeight) {
                $(this).addClass('w-scrollin-on')
            } else {
                $(this).removeClass('w-scrollin-on')
            }
        })
        $('.w-scrollin-anima').each(function () {
            let elemPos = $(this).offset().top
            if (elemPos < userScrollTop + halfWindowHeight) {
                $(this).addClass('w-scrollin-on animate__animated animate__flipInX')
            }
        })
    }
    pageAnima()
    $(window).scroll(function () {
        pageAnima()
    })




})
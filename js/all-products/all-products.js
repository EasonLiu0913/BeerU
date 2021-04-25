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

    // 排序與篩選的按鈕
    $('.fixed-btn').on('click', function () {
        $(this).parent('.product-select').toggleClass('on')
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
            $('.pop-up-1').css('display', 'block')
            $('.pop-up-1 .icon').html('<i class="fas fa-exclamation"></i>')
            $('.pop-up-1 .pop-up-text').text('購買數量超過庫存，庫存為30')
            $(this).val('30')
            changePrice.text('$' + 30 * price)
        } else {
            $('.pop-up-1').css('display', 'block')
            $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>')
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
            $('.pop-up-1').css('display', 'block')
            $('.pop-up-1 .icon').html('<i class="fas fa-exclamation"></i>')
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
            $('.pop-up-1').css('display', 'block')
            $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>')
            $('.pop-up-1 .pop-up-text').text('購買數量不得為0')
            $(this).next().val('1')
            changePrice.text('$' + price)
        }
    })


    // -------------------------------------------------------------
    // 彈跳視窗
    $('button.ok').on('click', function () {
        $('.pop-up').css('display', 'none')
    })



})
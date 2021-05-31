// 關注功能
let btn_attention = $('.buttons')

// 加入
btn_attention.on('click','.btn_attention_be',function(){
    let t_sid = $(this).closest('.buttons').attr('data-cate')
    console.log(t_sid)

    $.get('beer_map-attention-api.php', { 
        'action': 'add', 
        'tag_sid': t_sid 
    }, 
    function (data) {
        console.log(data)
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
        $('.pop-up-1 .pop-up-text').text(data.msg)
    }, 'json')
    $(this).addClass('d-none')
    $(this).prev().removeClass('d-none')
})


// 取消
btn_attention.on('click','.btn_attention_active',function(){
    let t_sid = $(this).closest('.buttons').attr('data-cate')
    console.log(t_sid)

    $.get('beer_map-attention-api.php', { 
        'action': 'delete', 
        'tag_sid': t_sid 
    }, 
        function (data) {
        console.log(data)
        $('.pop-up-1').fadeIn(150)
        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
        $('.pop-up-1 .pop-up-text').text(data.msg)
    }, 'json')
    $(this).addClass('d-none')
    $(this).next().removeClass('d-none')
})

    // 彈跳視窗
    $('button.ok').on('click', function() {
        $('.general-pop-up').fadeOut(150)
    })


// banner動畫
// 預設關閉
$('.pipi_beer').hide()

// 左邊mug出現
$('.beer_mug, .pipi_beer').delay(500).removeClass('d-none').toggleClass('animate__animated animate__fadeIn')

// 右邊天使飛進
setTimeout(function () {
    $('.pipi_beer').show().toggleClass('animate__animated animate__fadeInTopRight').toggleClass('time-05s')
}, 500);

// 天使動動
// setTimeout(function () {
//     $('.pipi_beer_group').toggleClass('animate__animated animate__shakeY').css('animation-duration','7s').toggleClass('infinite');
// }, 0);

// ---------------------------
$('.pipi_beer_group').addClass('pipi_beer_fly').toggleClass('infinite');
// 天使動動
// setTimeout(function () {
//     $('.pipi_beer_group').addClass('pipi_beer_fly').toggleClass('infinite');
// }, 0);






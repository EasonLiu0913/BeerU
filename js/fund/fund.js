//  ------ 募資產品照片點選 ------//
// 取得或設定 HTML tag attribute屬性 的值
// 取值 .attr( attributeName )
// 設值 .attr( attributeName, value )

let nowImgIndex = 0;
let imgInterval = null;

// 剛進網頁時預設第一張圖片改變 border
$('.img-row')
  .eq(0)
  .find('img')
  .css({ border: '3px solid var(--red)', opacity: 1 })
  .parent()
  .siblings()
  .find('img')
  .css({ border: 'transparent', opacity: 0.5 });
$('.img-demo').css('margin', '0 auto');

$('.img-row img').click(function () {
  clearInterval(imgInterval);
  // 點擊時，更換目前圖片索引值(nowImgIndex)
  nowImgIndex = $(this).parent().index();

  let imgSrc = $(this).attr('src');
  $('.img-demo img').attr('src', imgSrc);

  $(this)
    .css({ border: '3px solid var(--red)', opacity: 1 })
    .parent()
    .siblings()
    .find('img')
    .css({ border: 'transparent', opacity: 0.5 });

  autoChangeImgSrc();
});
function autoChangeImgSrc() {
  // 每兩秒依照圖片索引值(nowImgIndex)自動更換圖片
  if ($(window).width() >= 992) {
    imgInterval = setInterval(() => {
      nowImgIndex++;
      if (nowImgIndex > 3) nowImgIndex = 0;
      const nowImg = $('.img-row').eq(nowImgIndex).find('img');
      const imgSrc = nowImg.attr('src');
      $('.img-demo img').attr('src', imgSrc);

      nowImg
        .css({ border: '3px solid var(--red)', opacity: 1 })
        .parent()
        .siblings()
        .find('img')
        .css({ border: 'transparent', opacity: 0.5 });
    }, 2000);
  }
}

autoChangeImgSrc();

//  ------ 頁簽切換 ------//
// Show the first tab by default
$('.tabs-stage > div').hide();
$('.tabs-stage div:first').show();
$('.tabs-nav li:first').addClass('tab-active');

// Change tab class and display content
$('.tabs-nav a').on('click', function (event) {
  event.preventDefault();
  $('.tabs-nav li').removeClass('tab-active');
  $(this).parent().addClass('tab-active');
  $('.tabs-stage > div').hide();
  $($(this).attr('href')).show();
});

//  ------- 常見QA collapsible ------//
var coll = document.getElementsByClassName('collapsible');
var i;

// for (i = 0; i < coll.length; i++) {
//     coll[i].addEventListener("click", function() {
//       this.classList.toggle("active");
//       var content = this.nextElementSibling;
//       if (content.style.display === "block") {
//         content.style.display = "none";
//       } else {
//         content.style.display = "block";
//       }
//     });
// }

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener('click', function () {
    this.classList.toggle('active');
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
      content.style.display = 'block';
    }
  });
}

//  ------ 倒數計畫計時器 ------//
// Set the date we're counting down to
var countDownDate = new Date('June 25, 2021 00:00:00').getTime();

// Update the count down every 1 second
var x = setInterval(function () {
  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById('countdown').innerHTML =
    days + '天 ' + hours + '小時 ' + minutes + '分 ' + seconds + '秒 ';

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('countdown').innerHTML = 'EXPIRED';
  }
}, 1000);

//  ------  收藏清單功能  ------ //

// 加入
function collectProduct() {
  let btn = $(event.currentTarget);
  let psid = btn.closest('.beer-product').attr('data-sid');

  $.get(
    'member-collect-api.php',
    {
      action: 'add',
      psid: psid,
    },
    function (data) {
      // console.log(data)
      $('.pop-up-1').fadeIn(150);
      $('.pop-up-1 .icon')
        .html('<i class="fas fa-check"></i>')
        .css('background-color', 'var(--gold)');
      $('.pop-up-1 .pop-up-text').text(data.msg);
    },
    'json'
  );
  btn.addClass('d-none');
  btn.next().removeClass('d-none');
}

// 取消
function cancelCollectProduct() {
  let btn = $(event.currentTarget);
  let psid = btn.closest('.beer-product').attr('data-sid');

  $.get(
    'member-collect-api.php',
    {
      action: 'delete',
      psid: psid,
    },
    function (data) {
      // console.log(data)
      $('.pop-up-1').fadeIn(150);
      $('.pop-up-1 .icon')
        .html('<i class="fas fa-check"></i>')
        .css('background-color', 'var(--gold)');
      $('.pop-up-1 .pop-up-text').text(data.msg);
    },
    'json'
  );
  btn.addClass('d-none');
  btn.prev().removeClass('d-none');
}

//  ------  scroll-animations  ------ //

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
      if ($animatable.offset().top + $animatable.height() - 20 < offset) {
        $animatable.removeClass('animatable').addClass('animated');
      }
    });

    $('.animated').each(function (i) {
      let $animatable = $(this);

      if ($(this).offset().top + $(this).height() - 40 > offset) {
        $(this).removeClass('animated').addClass('animatable');
      }
    });
  };
  // Hook doAnimations on scroll, and trigger a scroll
  $(window).on('scroll', doAnimations);
  $(window).trigger('scroll');
});

// slick-test

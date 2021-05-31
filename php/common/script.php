<!-- 各種CDN -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
<script src="<?= WEB_ROOT ?>/lib/jquery-3.6.0.js"></script>
<script src="<?= WEB_ROOT ?>/bootstrap/js/bootstrap.bundle.js"></script>



<script>
    // 更新購物車小字
    function showCartCount(cart) {
        let total = 0
        for (let i in cart) {
            total++
        }

        if (total == 0) {
            $('.cart-pnum').addClass('d-none')
        } else {
            $('.cart-pnum').removeClass('d-none')
            $('.cart-pnum').addClass('animate__animated animate__heartBeat')
            $('.cart-pnum').text(total)

            setInterval(() => {
                $('.cart-pnum').removeClass('animate__animated animate__heartBeat ')
            }, 2500);
        }

    }

    let thischeckoutType = '<?= isset($_SESSION['type']) ? $_SESSION['type'] : '' ?>';
    if (thischeckoutType != 'fund') {
        $.get('cartforcount-api.php', function(data) {
            showCartCount(data.cart)
        }, 'json')
    }


    // 更新禮物小圖
    //  傳送AJAX取得成就狀況
    function showAchievement() {
        $.get('member-achieve-api.php', function(data) {
            // console.log(data)
            if (data.consume > 0 || data.accum_spend >= 6000 || data.accum_comment >= 3 || data.accum_event >= 3 || data.accum_fund >= 3) {
                $('.beeru-nav-bar .havegift').fadeIn(150)
                $('.beeru-nav-bar .gift-notice').fadeIn(150)
                setTimeout(function() {
                    $('.beeru-nav-bar .gift-notice').fadeOut(150)
                }, 2500)
            }
            let brandnumber = data.gather.filter(e => e <= 28).length
            let countrynumber = data.gather.filter(e => e >= 29 && e <= 43).length
            let typenumber = data.gather.filter(e => e >= 44 && e <= 52).length

            if ((data.accum_brand == 0 && brandnumber >= 8 && brandnumber < 16) || (data.accum_brand > 0 && data.accum_brand < 2 && brandnumber >= 16 && brandnumber < 24) || (data.accum_brand != 3 && brandnumber == 24)) {
                $('.beeru-nav-bar .havegift').fadeIn(150)
                $('.beeru-nav-bar .gift-notice').fadeIn(150)
                setTimeout(function() {
                    $('.beeru-nav-bar .gift-notice').fadeOut(150)
                }, 2500)
            }

            if ((data.accum_country == 0 && countrynumber >= 5 && countrynumber < 10) || (data.accum_country > 0 && data.accum_country < 2 && countrynumber >= 10 && countrynumber < 15) || (data.accum_country != 3 && countrynumber == 15)) {
                $('.beeru-nav-bar .havegift').fadeIn(150)
                $('.beeru-nav-bar .gift-notice').fadeIn(150)
                setTimeout(function() {
                    $('.beeru-nav-bar .gift-notice').fadeOut(150)
                }, 2500)
            }

            if ((data.accum_type == 0 && typenumber >= 3 && typenumber < 6) || (data.accum_type > 0 && data.accum_type < 2 && typenumber >= 6 && typenumber < 9) || (data.accum_type != 3 && typenumber == 9)) {
                $('.beeru-nav-bar .havegift').fadeIn(150)
                $('.beeru-nav-bar .gift-notice').fadeIn(150)
                setTimeout(function() {
                    $('.beeru-nav-bar .gift-notice').fadeOut(150)
                }, 2500)
            }

        }, 'json')
    }

    showAchievement()
</script>
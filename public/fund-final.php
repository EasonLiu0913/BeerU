<?php include __DIR__ . '../../php/common/config.php' ?>
<!-- <?php include __DIR__ . '../../php/common/__connect_db.php' ?> -->

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:募資計畫-方案確認頁';

//用sid號碼抓方案資料 
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
// $totalPrice = SELECT * FROM `order_detail` WHERE`fund_sid` > 0;

// $od_SQL = SELECT * FROM `order_detail` WHERE `fund_sid` > 0 ;
$f_SQL = "SELECT * FROM `fund` WHERE sid=$sid";
$f = $pdo->query($f_SQL)->fetch();
$totalPriceSql = "SELECT SUM(quantity * price) AS `total` FROM `order_detail` WHERE `fund_sid` > 0";
$rowTotalPrice = $pdo->query($totalPriceSql)->fetch();

//目前贊助次數
$totalBidSql = "SELECT SUM(quantity) AS `bid` FROM `order_detail` WHERE `fund_sid` > 0";
$rowTotalBid = $pdo->query($totalBidSql)->fetch();



// if ($sid == 0) {
//     header('location:http://localhost/beeru/public/fund.php');
// }








?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- my-style -->
<link rel="stylesheet" href="../css/fund/fund-step3.css">

<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>

<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>

<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>


<!-- 這裡開始寫html -->
<section class="fund-step3">
    <div class="fund container">
        <div class="product-intro">
            <div class="img-demo-wrap">
                <img class="pic1" src="../images/joyce_images/fund-p-1.jpg" alt="">
            </div>
            <div class="product-main-text">
                <h3>【CLOUDWATER | 英國知名精釀廠】</h3>
                <p>全球第二 - 英倫第一神廠強勢來台，啤女獨家首發，最強CP值！連續四年(2016-2019)名列在全球最佳酒廠Top 15內，最佳成績為Top2！</p>
                <div class="product-sub-text d-flex">
                    <div class="goal mt-2">
                        <div class="current-value">
                            <p><?= "NT $" . number_format($rowTotalPrice['total'], 0, ".", ",") ?></p>
                        </div>
                        <div class="goal-value">
                            <p><span class="goal-title">目標 |</span>
                                <?= "NT $" . number_format ($f['goal_price'], 0, ".", ",") ?></p>
                        </div>
                    </div>
                    <div class="sub-intro mt-2">
                        <p>贊助次數 | <?=$rowTotalBid['bid']?>次</p>
                        <p>剩餘時間 | <span id="countdown"></span></p>
                        <p>計畫截止日| <?= $f['end_date'] ?></p>
                    </div>




                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="card" id="card-click" onclick="changeColor();">
                    <div class="card-description" target="_blank">
                        <!-- pic -->
                        <img src="../images/joyce_images/<?= $f['pic'] ?>" alt="">
                        <!-- plan_price -->
                        <h2>$<?= $f['plan_price'] ?></h2>
                        <p class="c_name" style="color: var(--gold);"><?= $f['c_name'] ?></p>
                        <!-- plan_title在資料庫叫 e-name -->
                        <div class="e_name mb-3">
                            <p style="color: var(--gold);"><?= $f['e_name'] ?></p>
                        </div>
                        <!-- plan_content -->
                        <div class="plan_content">
                            <?= $f['plan_content'] ?>

                        </div>
                    </div>
                </div>


                <!-- 更改方案按鈕 -->
                <a href="../public/fund.php" class="btn_edit"><i class="fas fa-edit"></i>更改方案</button></a>
            </div>
            <form class="col-sm-7">

                <div class="fund-amount-title">
                    <h2 class="mb-3">贊助金額</h2>
                </div>
                <div class="fund-amount">
                    <div class="unit">
                        <button class="minus"><i class="fas fa-minus mb-5"></i></button>
                 <input class="price" value="<?= $f['plan_price'] ?> " data-price="$<?= $f['plan_price'] ?> ">

                        <button class="add"><i class="fas fa-plus"></i></button>
                    </div>

                    <p><i class="fas fa-exclamation-circle"></i>小提醒：最低金額為贊助選項價格。
可向上加碼，以100元為單位，幫助計畫加速成功。</p>
                    <p><i class="fas fa-medal"></i>啤啤送好禮：加碼500元以上，可增加酒仙指數5%。</p>

                </div>

                <div class="btn_fundnow" onclick="gotoCheckout()"><i class="fas fa-coins"></i>立刻付款贊助</div>

            </form>

        </div>
    </div>


</section>




<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>
<!-- 這裡開始寫jQuery或JS -->

<!-- my script -->
<script>
    //  倒數計畫計時器 
    var countDownDate = new Date("June 25, 2021 00:00:00").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = days + "天 " + hours + "小時 " +
            minutes + "分 " + seconds + "秒 ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);


    $('.price').val($('.price').data('price'));

    // 加減贊助金額
    $('.minus').click(function(e) {
        e.preventDefault();
        var $input = $(this).parent().find('input');
        var $amount = $(this).parent().find('.price');
        var minPrice = $amount.data('price').replace('$', '');
        console.log('minPrice', minPrice);
        console.log('amount', $amount.val().replace('$', ''))

        if (parseInt($amount.val().replace('$', '')) > minPrice) {
            $amount.val('$' + (parseInt($amount.val().replace('$', '')) - 100))
        }
    });

    $('.add').click(function(e) {
        e.preventDefault();
        var $input = $(this).parent().find('input');
        var $amount = $(this).parent().find('.price');
        var minPrice = $amount.data('price').replace('$', '');
        console.log('minPrice', minPrice);
        console.log('amount', $amount.val().replace('$', ''))
        $amount.val('$' + (parseInt($amount.val().replace('$', '')) + 100))

    });



    // 傳送資料到cart
    function gotoCheckout() {
        console.log('gotoCheckout');
        let fsid = window.location.search.substr(5, 1)
        let totalPrice = parseInt($('.price').val().replace('$', ''))

        console.log(fsid, totalPrice)

        $.get('fund2-api.php', {
            fsid,
            totalPrice
        }, function(data) {
            console.log(data)
            console.log(data.rowTotalPrice);
            location.href = 'checkout.php'
        }, 'json')
    }
    // $('.btn_fundnow').on('click', function() {
    //     let fsid = window.location.search.substr(5, 1)
    //     let totalPrice = $('.price').val() * 1

    //     $.get('fund2-api.php', {
    //         fsid,
    //         totalPrice
    //         }, function(data) {
    //             console.log(data)
    //             // location.href = 'checkout.php'
    //         }, 'json')

    // })
</script>


<?php include __DIR__ . '../../php/common/html-end.php' ?>
<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:本月之星';

$psid = 17;

if ($psid != 0) {
    // 此頁商品
    $p_SQL = "SELECT p.* , t1.`name` AS `brand_name`,t2.`name` AS `country_name`,t3.`name` AS `type_name`,t4.`name` AS `merch_name` FROM `products` AS p 
                JOIN `tags` AS t1 
                ON p.`brand_sid` = t1.`sid`
                JOIN `tags` AS t2 
                ON p.`country_sid` = t2.`sid`
                JOIN `tags` AS t3 
                ON p.`type_sid` = t3.`sid`
                JOIN `tags` AS t4 
                ON p.`merch_sid` = t4.`sid`
                WHERE p.`sid` = $psid";
    $row = $pdo->query($p_SQL)->fetch();

    $country_sid = $row['country_sid'];
    $type_sid = $row['type_sid'];
    $brands_sid = $row['brand_sid'];
    $merch_sid = $row['merch_sid'];
    $product_sid = $row['sid'];


    // 相關商品
    $c_SQL = "SELECT * FROM `products` WHERE `sid` = 133";
    $c_row = $pdo->query($c_SQL)->fetch();
    $c_row_sid = $c_row['sid'];

    $t_SQL = "SELECT * FROM `products` WHERE `sid` = 21";
    $t_row = $pdo->query($t_SQL)->fetch();
    $t_row_sid = $t_row['sid'];


    $b_SQL = "SELECT * FROM `products` WHERE `sid` = 99 ";
    $b_row = $pdo->query($b_SQL)->fetch();
    $b_row_sid = $b_row['sid'];


    // new標籤
    $deadline = strtotime('2021-05-01');

    // 從哪裡來
    $come_from = $_SERVER['HTTP_REFERER'] ?? 'http://localhost/BeerU/public/all-product.php';
    $come_cate = strpos($come_from, 'all-product.php?cate=')  ? explode('=', preg_replace('/[^\d=]/', '', $come_from))[1] : 0;

    $c_arr = [];
    if (isset($_SESSION['user'])) {

        $m_sid = $_SESSION['user']['sid'];
        $co_SQL = "SELECT `product_sid` FROM `collect` WHERE `member_sid` = $m_sid";
        $co_row = $pdo->query($co_SQL)->fetchAll();
        if (!empty($co_row)) {
            foreach ($co_row as $co) {
                array_push($c_arr, $co['product_sid']);
            }
        }
    }
} else {
    header('Location: all-product.php');
}

?>



<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- my-style -->
<link rel="stylesheet" href="../css/monthly-product/monthly-product-1-style.css">

<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>

<section class="monthly-product-wrap">
    <div class="monthly-product-banner marble">
        <div class="container">
            <div class="row may-row">
                <div class="col-md-6 col-sm-4 monthly-product-main">
                    <a href="each-product.php?psid=<?= $psid = 17 ?>" style="display: block">
            <img class="animate__animated animate__fadeInLeft may-product-main" src="../images/glori_images/may_product.png"></a></div>
                <div class="col-md-6 col-sm-4 monthly-product-intro">
                    <div class="animatable fadeInUp monthly-title mt-5 mb-3">
                        <p>本月之星</p>
                    </div>
                    <h1 class="p-title-ch mb-2 animatable fadeInUp">源流東京白啤酒</h1>
                    <h2 class="p-title-en animatable fadeInUp">Far Yeast Tokyo White</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="may-product-info">
    <!-- return to top -->
    <a href="javascript:" id="return-to-top"><img src="../images/common/top.svg" alt=""></a>

    <div class="container-fluid e-product-intro-warp">
        <img class="animatable fadeInDown sakura" src="../images/glori_images/sakura.png" alt="">
        <div class="row e-product-intro justify-content-center align-items-center beer-product" data-sid=<?= $row['sid'] ?> data-price=<?= $row['price'] ?> data-abv=<?= $row['abv'] ?>>
            <!-- 產品描述 -->
            <div class="col-12 col-lg-6 product-intro ">
                <!-- 開始內容 -->
                <div class="intro-content d-flex flex-column justify-content-center">
                    <!-- 產品名稱 -->
                    <div class="pro-name animatable fadeInUp">
                        <div class="country d-flex align-items-center">
                            <p><?= $row['country_name'] ?></p>
                            <img class="c-pic" src="../images/glori_images/flag_japan_circle.svg" alt="">
                        </div>
                        <p class="c-name d-none d-lg-block"><?= $row['c_name'] ?></p>
                        <p class="e-name d-none d-lg-block"><?= $row['e_name'] ?></p>
                    </div>

                    <!-- 產品介紹文字 -->
                    <div class="intro-text animatable fadeInUp">
                        <p><?= $row['intro'] ?></p>
                    </div>

                    <!-- 購買 -->
                    <div class="p-buy d-flex flex-wrap animatable fadeInUp">
                        <!-- 選擇數量 -->
                        <div class="col-12 quantity d-flex justify-content-between">
                            <div class="minus"><i class="fas fa-minus"></i></div>
                            <input type="text" class="buy-number" value="1">
                            <div class="plus"><i class="fas fa-plus"></i></div>
                        </div>
                        <!-- 價格 -->
                        <div class="col-5 p-price d-flex justify-content-center align-items-baseline">
                            <span>NT</span>
                            <p class="price">$<?= $row['price'] ?></p>
                        </div>
                        <!-- 加入購物車按鈕 -->
                        <button class="col-7 add-cart"><i class="fas fa-shopping-bag"></i>加入購物車</button>
                    </div>

                    <!-- 產品關鍵字 -->
                    <div class="product-key d-flex flex-wrap animatable fadeInUp">
                        <div class="key-content d-flex flex-lg-column ">
                            <div class="title">
                                <p>類型</p>
                            </div>
                            <p class="content type"><?= $row['type_name'] ?></p>
                        </div>
                        <div class="key-content d-flex flex-lg-column">
                            <div class="title">
                                <p>風味</p>
                            </div>
                            <p class="content flavor"><?= $row['flavor'] ?></p>
                        </div>
                        <div class="key-content d-flex flex-lg-column ">
                            <div class="title">
                                <p>容量</p>
                            </div>
                            <p class="content capacity"><?= $row['capacity'] ?></p>
                        </div>
                        <div class="key-content d-flex flex-lg-column">
                            <div class="title-4">
                                <p>酒精濃度</p>
                            </div>
                            <p class="content abv"><?= $row['abv'] ?>%</p>
                        </div>
                    </div>
                </div>

                <!-- 分享按鈕們 -->
                <div class="share-icons d-flex align-items-center">
                    <div class="fb">
                        <!-- Generator: Adobe Illustrator 25.2.1, SVG Export Plug-In  -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24.1px" height="24px" viewBox="0 0 24.1 24" style="overflow:visible;enable-background:new 0 0 24.1 24;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    opacity: 0;
                                }

                                .st1 {
                                    fill: url(#Path_1940_2_);
                                }

                                .st2 {
                                    fill: #FFD76C;
                                }

                                .st3 {
                                    fill: #FFFFFF;
                                }

                                .st4 {
                                    fill: url(#Path_1940_3_);
                                }
                            </style>
                            <defs>
                            </defs>
                            <g id="Component_39_1_1_">
                                <g id="b_1_" transform="translate(-1018.717 -1137.252)" class="st0">
                                    <g id="Group_140_1_">

                                        <linearGradient id="Path_1940_2_" gradientUnits="userSpaceOnUse" x1="8239.6846" y1="6726.8647" x2="8239.6846" y2="6727.8647" gradientTransform="matrix(23.9999 0 0 -23.9994 -196721.125 162601.9062)">
                                            <stop offset="0" style="stop-color:#FFD76C" />
                                            <stop offset="1" style="stop-color:#C9984B" />
                                        </linearGradient>
                                        <path id="Path_1940_1_" class="st1" d="M1030.7,1161.3c-6.6-0.1-11.9-5.5-11.8-12.2c0.1-6.6,5.5-11.9,12.2-11.8
                                s11.9,5.5,11.8,12.2c0,0.1,0,0.2,0,0.4C1042.5,1156.2,1037.1,1161.3,1030.7,1161.3z" />
                                    </g>
                                    <path id="Path_1941_1_" class="st2" d="M1032.1,1157.5c0-0.5,0-1,0-1.5s0-1,0-1.5v-1.5c0-0.5,0-1,0-1.5s0-1,0-1.5h2.5l0.4-3h-2.9
                            c0-0.3,0-0.5,0-0.8c0-0.5,0-1,0-1.5c0-0.5,0.4-0.9,0.9-1c0.2,0,0.4,0,0.6,0c0.4,0,0.8,0,1.1,0c0.1,0,0.2,0,0.3,0
                            c0-0.9,0-1.7,0-2.6c-0.7,0-1.3-0.1-1.9-0.1c-0.4,0-0.9,0-1.3,0.1c-1.2,0.2-2.2,1-2.6,2.2c-0.2,0.5-0.3,1.1-0.3,1.6
                            c0,0.6,0,1.2,0,1.8c0,0.1,0,0.2,0,0.4c-0.8,0-1.7,0-2.5,0v2.9h2.5c0,0.2,0,0.3,0,0.5c0,2.2,0,4.4,0,6.6c0,0.1,0,0.3,0,0.4
                            L1032.1,1157.5z" />
                                </g>
                                <g id="a_1_" transform="translate(-986.717 -1137.252)">
                                    <g id="Group_137_1_">
                                        <path id="Path_1938_1_" class="st3" d="M998.8,1138.2h0.1c3,0,5.9,1.3,7.9,3.5c4.2,4.4,4,11.3-0.3,15.5c-2.1,2-4.8,3.1-7.6,3
                                h-0.1c-3,0-5.8-1.3-7.8-3.4c-4.2-4.4-4.1-11.3,0.3-15.5C993.2,1139.3,995.9,1138.2,998.8,1138.2 M998.8,1137.3
                                c-6.6,0-12,5.3-12.1,11.9s5.3,12,11.9,12.1h0.1c6.4,0,11.7-5,12-11.5c0.2-6.7-5-12.3-11.6-12.5c-0.1,0-0.2,0-0.3,0L998.8,1137.3z
                                " />
                                    </g>
                                    <g id="Group_138_1_">
                                        <path id="Path_1939_1_" class="st3" d="M1000.1,1157.5c0-0.5,0-1,0-1.5s0-1,0-1.5v-1.5c0-0.5,0-1,0-1.5s0-1,0-1.5h2.5l0.4-3h-2.9
                                c0-0.3,0-0.5,0-0.8c0-0.5,0-1,0-1.5c0-0.5,0.4-0.9,0.9-1c0.2,0,0.4,0,0.6,0c0.4,0,0.8,0,1.1,0c0.1,0,0.2,0,0.3,0
                                c0-0.9,0-1.7,0-2.6c-0.7,0-1.3-0.1-1.9-0.1c-0.4,0-0.9,0-1.3,0.1c-1.2,0.2-2.2,1-2.6,2.2c-0.2,0.5-0.3,1.1-0.3,1.6
                                c0,0.6,0,1.2,0,1.8c0,0.1,0,0.2,0,0.4c-0.8,0-1.7,0-2.5,0v2.9h2.5c0,0.2,0,0.3,0,0.5c0,2.2,0,4.4,0,6.6c0,0.1,0,0.3,0,0.4
                                L1000.1,1157.5z" />
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <div class="line">
                        <!-- Generator: Adobe Illustrator 25.2.1, SVG Export Plug-In  -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="23.1px" height="22px" viewBox="0 0 23.1 22" style="overflow:visible;enable-background:new 0 0 23.1 22;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    opacity: 0;
                                }

                                .st1 {
                                    fill: url(#Path_1976_2_);
                                }

                                .st2 {
                                    fill: #1E194B;
                                }

                                .st3 {
                                    fill: #FFFFFF;
                                }

                                .st4 {
                                    fill: url(#Path_1976_3_);
                                }
                            </style>
                            <defs>
                            </defs>
                            <g id="Component_42_1_1_" transform="translate(31.887 1.003)">
                                <g id="b-2_1_" transform="translate(-1019.394 -1204.537)" class="st0">
                                    <g id="Group_191_1_">

                                        <linearGradient id="Path_1976_2_" gradientUnits="userSpaceOnUse" x1="8164.439" y1="6810.9761" x2="8164.439" y2="6811.9761" gradientTransform="matrix(23.076 0 0 -21.9908 -187403.4531 151004.6406)">
                                            <stop offset="0" style="stop-color:#F5D778" />
                                            <stop offset="1" style="stop-color:#C9984B" />
                                        </linearGradient>
                                        <path id="Path_1976_1_" class="st1" d="M1010.6,1212.9c0-5.2-5.2-9.4-11.5-9.4s-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2
                                c1.4,0.3,1.2,0.8,0.9,2.6c0,0.3-0.2,1.1,1,0.6c3.3-1.8,6.4-4,9.1-6.7C1009.7,1217.1,1010.5,1215.1,1010.6,1212.9z" />
                                    </g>
                                    <path id="Path_1977_1_" class="st2" d="M996.7,1210.4h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0.1,0.2,0.2,0.2
                            c0,0,0,0,0,0h0.8c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-5C996.9,1210.5,996.8,1210.4,996.7,1210.4z M1006.7,1210.4h-3.2
                            c-0.1,0-0.2,0.1-0.2,0.2v5c0,0.1,0.1,0.2,0.2,0.2h3.2c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-0.8c0-0.1-0.1-0.2-0.2-0.2c0,0,0,0,0,0
                            h-2.2v-0.8h2.2c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-0.8c0-0.1-0.1-0.2-0.2-0.2c0,0,0,0,0,0h-2.2v-0.8h2.2c0.1,0,0.2-0.1,0.2-0.2
                            c0,0,0,0,0,0v-0.8C1007,1210.5,1006.9,1210.4,1006.7,1210.4L1006.7,1210.4z M994.8,1214.6h-2.2v-4c0-0.1-0.1-0.2-0.2-0.2
                            c0,0,0,0,0,0h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0,0.1,0.1,0.2c0,0,0.1,0.1,0.2,0.1h3.2c0.1,0,0.2-0.1,0.2-0.2
                            c0,0,0,0,0,0v-0.8C995,1214.7,994.9,1214.6,994.8,1214.6L994.8,1214.6z M1002.5,1210.6v5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.8
                            c-0.1,0-0.1,0-0.2-0.1l-2.3-3.1v3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.8c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-5
                            c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h0.8c0.1,0,0.1,0,0.2,0.1l2.3,3.1v-3c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h0.8
                            C1002.4,1210.4,1002.5,1210.5,1002.5,1210.6C1002.5,1210.6,1002.5,1210.6,1002.5,1210.6L1002.5,1210.6z" />
                                </g>
                                <g id="a-2_1_" transform="translate(-989 -1204.537)">
                                    <g id="Group_193_1_">
                                        <path id="Path_1978_1_" class="st3" d="M968.7,1204.5c5.8,0,10.5,3.8,10.5,8.4c0,1.9-0.8,3.8-2.2,5.1c-2.4,2.4-5.2,4.5-8.2,6.2
                                c0.2-1.4,0.2-2.6-1.8-3l0,0l0,0c-5.1-0.7-8.8-4.1-8.8-8.2C958.1,1208.3,962.8,1204.5,968.7,1204.5 M968.7,1203.5
                                c-6.4,0-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2c1.4,0.3,1.2,0.8,0.9,2.6c0,0.2-0.2,0.8,0.4,0.8c0.2,0,0.4-0.1,0.6-0.2
                                c3.3-1.8,6.4-4,9.1-6.7c1.5-1.5,2.4-3.6,2.5-5.8C980.2,1207.7,975,1203.5,968.7,1203.5L968.7,1203.5z" />
                                    </g>
                                    <g id="Group_194_1_">
                                        <path id="Path_1979_1_" class="st3" d="M966.3,1210.4h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0.1,0.2,0.2,0.2
                                c0,0,0,0,0,0h0.8c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-5C966.5,1210.5,966.4,1210.4,966.3,1210.4z M976.3,1210.4h-3.2
                                c-0.1,0-0.2,0.1-0.2,0.2v5c0,0.1,0.1,0.2,0.2,0.2h3.2c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-0.8c0-0.1-0.1-0.2-0.2-0.2c0,0,0,0,0,0
                                h-2.2v-0.8h2.2c0.1,0,0.2-0.1,0.2-0.2c0,0,0,0,0,0v-0.8c0-0.1-0.1-0.2-0.2-0.2c0,0,0,0,0,0h-2.2v-0.8h2.2c0.1,0,0.2-0.1,0.2-0.2
                                c0,0,0,0,0,0v-0.8C976.6,1210.5,976.5,1210.4,976.3,1210.4L976.3,1210.4z M964.4,1214.6h-2.2v-4c0-0.1-0.1-0.2-0.2-0.2
                                c0,0,0,0,0,0h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0,0.1,0.1,0.2c0,0,0.1,0.1,0.2,0.1h3.2c0.1,0,0.2-0.1,0.2-0.2
                                c0,0,0,0,0,0v-0.8C964.6,1214.7,964.5,1214.6,964.4,1214.6L964.4,1214.6z M972.1,1210.6v5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0
                                h-0.8c-0.1,0-0.1,0-0.2-0.1l-2.3-3.1v3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.8c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-5
                                c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h0.8c0.1,0,0.1,0,0.2,0.1l2.3,3.1v-3c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h0.8
                                C972,1210.4,972.1,1210.5,972.1,1210.6C972.1,1210.6,972.1,1210.6,972.1,1210.6L972.1,1210.6z" />
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <div class="share">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 product-pic d-flex justify-content-center align-items-center">
                <div class="pic">
                    <img src="../images/glori_images/drop.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="spring-product-wrap">
    <div class="container">
        <div class="row spring-wrap">
            <div class="left-spring col-md-6">
                <!-- 3月推薦 -->
                <div class="spring-product col" data-sid="133">
                    <div class="spring-img-wrap">
                        <div class="circle-wrap" href="#">
                            <div class="circle"></div>
                            <a href="each-product.php?psid=133"><img class="animatable fadeInUp" src="../images/glori_images/popular_march.png"></a>
                        </div>
                    </div>
                    <p class="title">琳德曼．水蜜桃酸啤</p>
                    <h5 class="title2 mb-2">Lindemans-Pecheresse</h5>
                    <!-- 收藏按鈕 -->
                    <div class="collect" data-sid="<?= $c_row['sid'] ?>">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <button class="btn_collect2" onclick="LogIn_btn()"><i class="far fa-heart"></i></i>加入收藏</button>
                        <?php else : ?>
                            <?php if (in_array($c_row['sid'], $c_arr)) : ?>
                                <button class="btn_collect2 d-none" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php else : ?>
                                <button class="btn_collect2" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- 4月推薦 -->
                <div class="spring-product col" data-sid="21">
                    <div class="spring-img-wrap">
                        <div class="circle-wrap" href="#">
                            <div class="circle"></div>
                            <a href="each-product.php?psid=21">
                                <img class="animatable fadeInUp" src="../images/glori_images/popular_april.png">
                            </a>
                        </div>
                    </div>
                    <p class="title">源流．義式葡萄愛爾</p>
                    <h5 class="title2 mb-2">Far Yeast-Grapevine</h5>
                    <!-- 收藏按鈕 -->
                    <div class="collect" data-sid="<?= $t_row['sid'] ?> ">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <button class="btn_collect2" onclick="LogIn_btn()"><i class="far fa-heart"></i></i>加入收藏</button>
                        <?php else : ?>
                            <?php if (in_array($t_row['sid'], $c_arr)) : ?>
                                <button class="btn_collect2 d-none" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php else : ?>
                                <button class="btn_collect2" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- 5月推薦 -->
                <div class="spring-product col" data-sid="99">
                    <div class="spring-img-wrap">
                        <div class="circle-wrap" href="#">
                            <div class="circle"></div>
                            <a href="each-product.php?psid=99">
                                <img class="animatable fadeInUp" src="../images/glori_images/popular_may.png">
                            </a>
                        </div>
                    </div>
                    <p class="title">美人魚．野生粉紅啤</p>
                    <h5 class="title2 mb-2">La Sirène-Rosè Wild</h5>
                    <!-- 收藏按鈕 -->
                    <div class="collect" data-sid="<?= $b_row['sid'] ?> ">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <button class="btn_collect2" onclick="LogIn_btn()"><i class="far fa-heart"></i></i>加入收藏</button>
                        <?php else : ?>
                            <?php if (in_array($b_row['sid'], $c_arr)) : ?>
                                <button class="btn_collect2 d-none" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php else : ?>
                                <button class="btn_collect2" onclick="collectProduct()"><i class="far fa-heart"></i></i>加入收藏</button>
                                <button class="btn_collect2_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i>已收藏</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 right-intro">
                <div class="animatable fadeInUp monthly-title mb-5">
                    <p>春季推薦</p>
                </div>
                <h1 class="animatable fadeInUp spring-intro mt-2 mb-5">獨特的清爽香氣，迎接炎炎夏日
                </h1>
            </div>
        </div>
    </div>
</section>







<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>
<script src='../js/monthly-product/monthly-product.js'></script>


<?php include __DIR__ . '../../php/common/html-end.php' ?>
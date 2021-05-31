<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:心理測驗結果';

// $psid = substr($_SERVER['QUERY_STRING'], 5);

$psid = 5;

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


    // 推薦商品

    $c_SQL = "SELECT * FROM `products` WHERE `type_sid` = 52 AND `sid` !=  $psid ORDER BY RAND() LIMIT 1";
    $c_row = $pdo->query($c_SQL)->fetch();
    $c_row_sid = $c_row['sid'];


    $t_SQL = "SELECT * FROM `products` WHERE `type_sid` = 52 AND `sid` !=  $psid AND `sid` != $c_row_sid ORDER BY RAND() LIMIT 1";
    $t_row = $pdo->query($t_SQL)->fetch();
    $t_row_sid = $t_row['sid'];

    $b_SQL = "SELECT * FROM `products` WHERE `type_sid` = 52 AND `sid` !=  $psid and `sid` != $t_row_sid AND `sid` != $c_row_sid ORDER BY RAND() LIMIT 1";
    $b_row = $pdo->query($b_SQL)->fetch();

    // new標籤
    $deadline = strtotime('2021-05-01');

    // 從哪裡來
    $come_from = $_SERVER['HTTP_REFERER'] ?? 'http://localhost/BeerU/public/all-product.php';
    $come_cate = strpos($come_from, 'all-product.php?cate=')  ? explode('=', preg_replace('/[^\d=]/', '', $come_from))[1] : 0;


    // 從資料庫抓收藏清單
    // 登入會員的狀態，抓收藏商品
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
<link rel="stylesheet" href="../css/newbie/quiz-result-style.css">

<?php include __DIR__ . '../../public/facebook.php' ?>
<?php include __DIR__ . '../../public/line.php' ?>


<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>

<section class="quiz-result-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 result-info-wrap mt-5">
                <p class="result-title animatable fadeInUp">適合你的精釀啤酒類型：<span>司陶特啤酒</span></p>
                <p class="result-info animatable fadeInUp">
                    有些人平常個性內向，很少表達自己真正的想法與見解，只有在特定時間與特定人面前才會展現能力。但在酒後他們卻判若兩人，變得善於社交，侃侃而談，思維敏捷反應快速。如果是工作酒局，那則能在使命必達的同時，也能體恤下屬。這樣的人其實有強烈的進取心，與遠大的抱負。
                    平常安靜，酒後健談，對你們來說，酒精是釋放壓力的一種方式。</p>
            </div>
        </div>
    </div>

    <!-- 推薦商品-->
    <section class="quiz-result-wrap">
        <div class="container">

            <!-- 推薦商品 -->
            <div class="row related flex-wrap">
                <div class="col-12 rpco-title animatable fadeInUp">
                    <p>推薦商品</p>
                </div>
                <div class="col-12 d-flex related-p animatable fadeInUp">
                    <!-- 商品BOX -->
                    <div class="col-12 col-lg-6 col-xl-4 beer-product-wrap">
                        <div class="beer-product" data-sid=<?= $c_row['sid'] ?> data-price=<?= $c_row['price'] ?> data-abv=<?= $c_row['abv'] ?>>
                            <div class="pro-pic">
                                <!-- 商品圖 -->
                                <a href="each-product.php?psid=<?= $c_row['sid'] ?>">
                                    <img class="beer-pic" src="../images/products/<?= $c_row['pic'] ?>" alt="">
                                </a>
                                <!-- 標籤 -->
                                <div class="label">
                                    <?php if (strtotime($c_row['created_at']) > $deadline) : ?>
                                        <div class="new-label">
                                            <p>NEW</p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($c_row['hot'] == 'true') : ?>
                                        <div class="hot-label">
                                            <p>HOT</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- 國家圖片 -->
                                <div class="country"><img src="../images/country/<?= $c_row['country_pic'] ?>" alt=""></div>

                                <!-- 收藏按鈕 -->
                                <div class="collect">
                                    <?php if (!isset($_SESSION['user'])) : ?>
                                        <button class="btn_collect_nologin" onclick="LogIn_btn()"><i class="far fa-heart"></i></button>
                                    <?php else : ?>
                                        <?php if (in_array($c_row['sid'], $c_arr)) : ?>
                                            <button class="btn_collect_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                            <button class="btn_collect d-none" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                        <?php else : ?>
                                            <button class="btn_collect" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                            <button class="btn_collect_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 商品介紹 -->
                            <div class="pro-intro d-flex flex-column justify-content-between">
                                <!-- 商品名稱 -->
                                <a href="each-product.php?psid=<?= $c_row['sid'] ?>">
                                    <div class="p-name">
                                        <p class="p-name-c"><?= $c_row['c_name'] ?></p>
                                        <p class="p-name-e"><?= $c_row['e_name'] ?></p>
                                    </div>
                                </a>
                                <!-- 購買 -->
                                <div class="p-buy d-flex flex-wrap">
                                    <!-- 選擇數量 -->
                                    <div class="col-12 quantity d-flex justify-content-between">
                                        <div class="minus"><i class="fas fa-minus"></i></div>
                                        <input type="text" class="buy-number" value="1">
                                        <div class="plus"><i class="fas fa-plus"></i></div>
                                    </div>
                                    <!-- 價格 -->
                                    <div class="col-5 p-price">
                                        <p class="price">$<?= $c_row['price'] ?></p>
                                    </div>
                                    <!-- 加入購物車按鈕 -->
                                    <button class="col-7 add-cart"><i class="fas fa-shopping-bag"></i>加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4 beer-product-wrap">
                        <div class="beer-product" data-sid=<?= $t_row['sid'] ?> data-price=<?= $t_row['price'] ?> data-abv=<?= $t_row['abv'] ?>>
                            <div class="pro-pic">
                                <!-- 商品圖 -->
                                <a href="each-product.php?psid=<?= $t_row['sid'] ?>">
                                    <img class="beer-pic" src="../images/products/<?= $t_row['pic'] ?>" alt="">
                                </a>
                                <!-- 標籤 -->
                                <div class="label">
                                    <?php if (strtotime($t_row['created_at']) > $deadline) : ?>
                                        <div class="new-label">
                                            <p>NEW</p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($t_row['hot'] == 'true') : ?>
                                        <div class="hot-label">
                                            <p>HOT</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- 國家圖片 -->
                                <div class="country"><img src="../images/country/<?= $t_row['country_pic'] ?>" alt=""></div>

                                <!-- 收藏按鈕 -->
                                <div class="collect">
                                    <?php if (!isset($_SESSION['user'])) : ?>
                                        <button class="btn_collect_nologin" onclick="LogIn_btn()"><i class="far fa-heart"></i></button>
                                    <?php else : ?>
                                        <?php if (in_array($t_row['sid'], $c_arr)) : ?>
                                            <button class="btn_collect_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                            <button class="btn_collect d-none" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                        <?php else : ?>
                                            <button class="btn_collect" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                            <button class="btn_collect_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 商品介紹 -->
                            <div class="pro-intro d-flex flex-column justify-content-between">
                                <!-- 商品名稱 -->
                                <a href="each-product.php?psid=<?= $t_row['sid'] ?>">
                                    <div class="p-name">
                                        <p class="p-name-c"><?= $t_row['c_name'] ?></p>
                                        <p class="p-name-e"><?= $t_row['e_name'] ?></p>
                                    </div>
                                </a>
                                <!-- 購買 -->
                                <div class="p-buy d-flex flex-wrap">
                                    <!-- 選擇數量 -->
                                    <div class="col-12 quantity d-flex justify-content-between">
                                        <div class="minus"><i class="fas fa-minus"></i></div>
                                        <input type="text" class="buy-number" value="1">
                                        <div class="plus"><i class="fas fa-plus"></i></div>
                                    </div>
                                    <!-- 價格 -->
                                    <div class="col-5 p-price">
                                        <p class="price">$<?= $t_row['price'] ?></p>
                                    </div>
                                    <!-- 加入購物車按鈕 -->
                                    <button class="col-7 add-cart"><i class="fas fa-shopping-bag"></i>加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4 beer-product-wrap">
                        <div class="beer-product" data-sid=<?= $b_row['sid'] ?> data-price=<?= $b_row['price'] ?> data-abv=<?= $b_row['abv'] ?>>
                            <div class="pro-pic">
                                <!-- 商品圖 -->
                                <a href="each-product.php?psid=<?= $b_row['sid'] ?>">
                                    <img class="beer-pic" src="../images/products/<?= $b_row['pic'] ?>" alt="">
                                </a>
                                <!-- 標籤 -->
                                <div class="label">
                                    <?php if (strtotime($b_row['created_at']) > $deadline) : ?>
                                        <div class="new-label">
                                            <p>NEW</p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($b_row['hot'] == 'true') : ?>
                                        <div class="hot-label">
                                            <p>HOT</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- 國家圖片 -->
                                <div class="country"><img src="../images/country/<?= $b_row['country_pic'] ?>" alt=""></div>

                                <!-- 收藏按鈕 -->
                                <div class="collect">
                                    <?php if (!isset($_SESSION['user'])) : ?>
                                        <button class="btn_collect_nologin" onclick="LogIn_btn()"><i class="far fa-heart"></i></button>
                                    <?php else : ?>
                                        <?php if (in_array($b_row['sid'], $c_arr)) : ?>
                                            <button class="btn_collect_active" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                            <button class="btn_collect d-none" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                        <?php else : ?>
                                            <button class="btn_collect" onclick="collectProduct()"><i class="far fa-heart"></i></button>
                                            <button class="btn_collect_active d-none" onclick="cancelCollectProduct()"><i class="fas fa-heart"></i></button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 商品介紹 -->
                            <div class="pro-intro d-flex flex-column justify-content-between">
                                <!-- 商品名稱 -->
                                <a href="each-product.php?psid=<?= $b_row['sid'] ?>">
                                    <div class="p-name">
                                        <p class="p-name-c"><?= $b_row['c_name'] ?></p>
                                        <p class="p-name-e"><?= $b_row['e_name'] ?></p>
                                    </div>
                                </a>
                                <!-- 購買 -->
                                <div class="p-buy d-flex flex-wrap">
                                    <!-- 選擇數量 -->
                                    <div class="col-12 quantity d-flex justify-content-between">
                                        <div class="minus"><i class="fas fa-minus"></i></div>
                                        <input type="text" class="buy-number" value="1">
                                        <div class="plus"><i class="fas fa-plus"></i></div>
                                    </div>
                                    <!-- 價格 -->
                                    <div class="col-5 p-price">
                                        <p class="price">$<?= $b_row['price'] ?></p>
                                    </div>
                                    <!-- 加入購物車按鈕 -->
                                    <button class="col-7 add-cart"><i class="fas fa-shopping-bag"></i>加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>



            <!-- <div class="share-wrap">
                <p class="share-title mt-5">分享測驗結果</p>

                <div class="share-icons d-flex">

                    <div class="fb-share-button" data-href="quiz-result-1.php" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">分享</a></div>


                    <a href="http://line.naver.jp/R/msg/text/?啤女BeerU - 世界精釀啤酒%0D心理測驗結果分享">
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
                                            <stop offset="0" style="stop-color:#F5D778"></stop>
                                            <stop offset="1" style="stop-color:#C9984B"></stop>
                                        </linearGradient>
                                        <path id="Path_1976_1_" class="st1" d="M1010.6,1212.9c0-5.2-5.2-9.4-11.5-9.4s-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2
                                				c1.4,0.3,1.2,0.8,0.9,2.6c0,0.3-0.2,1.1,1,0.6c3.3-1.8,6.4-4,9.1-6.7C1009.7,1217.1,1010.5,1215.1,1010.6,1212.9z"></path>
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
                                			C1002.4,1210.4,1002.5,1210.5,1002.5,1210.6C1002.5,1210.6,1002.5,1210.6,1002.5,1210.6L1002.5,1210.6z"></path>
                                </g>
                                <g id="a-2_1_" transform="translate(-989 -1204.537)">
                                    <g id="Group_193_1_">
                                        <path id="Path_1978_1_" class="st3" d="M968.7,1204.5c5.8,0,10.5,3.8,10.5,8.4c0,1.9-0.8,3.8-2.2,5.1c-2.4,2.4-5.2,4.5-8.2,6.2
                                				c0.2-1.4,0.2-2.6-1.8-3l0,0l0,0c-5.1-0.7-8.8-4.1-8.8-8.2C958.1,1208.3,962.8,1204.5,968.7,1204.5 M968.7,1203.5
                                				c-6.4,0-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2c1.4,0.3,1.2,0.8,0.9,2.6c0,0.2-0.2,0.8,0.4,0.8c0.2,0,0.4-0.1,0.6-0.2
                                				c3.3-1.8,6.4-4,9.1-6.7c1.5-1.5,2.4-3.6,2.5-5.8C980.2,1207.7,975,1203.5,968.7,1203.5L968.7,1203.5z"></path>
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
                                				C972,1210.4,972.1,1210.5,972.1,1210.6C972.1,1210.6,972.1,1210.6,972.1,1210.6L972.1,1210.6z"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>



                    <div href='javascript: void(window.open(&apos;https://lineit.line.me/share/ui?url=&apos; .concat(encodeURIComponent(location.href)) ));' title='分享給 LINE 好友'>
                        <div class="line-it-button" data-lang="zh_Hant" data-type="share-a" data-ver="3" data-size="large"></div>
                    </div>

                    <div class="line-it-button" data-lang="zh_Hant" data-type="share-a" data-ver="3" data-url="https://org-media.line.me/zh_TW/how_to_install#lineitbutton" data-color="default" data-size="large" data-count="false" style="display: none;"></div>

                    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>


                </div>
            </div>
            -->
            
            <div class="back-btn-wrap mt-5">
                <a href="newbie.php">
                    <div class="back-btn">返回新手入門</div>
                </a>
            </div>
        </div>
    </section>
</section>









<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>

<!-- my script -->

<script src='../js/newbie/quiz.js'></script>
<script src='../js/newbie/quiz-result.js'></script>


<?php include __DIR__ . '../../php/common/html-end.php' ?>
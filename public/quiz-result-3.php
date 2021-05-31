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

$c_SQL = "SELECT * FROM `products` WHERE `type_sid` = 46 AND `sid` !=  $psid ORDER BY RAND() LIMIT 1";
$c_row = $pdo->query($c_SQL)->fetch();
$c_row_sid = $c_row['sid'];


$t_SQL = "SELECT * FROM `products` WHERE `type_sid` = 46 AND `sid` !=  $psid AND `sid` != $c_row_sid and `sid` < 225 ORDER BY RAND() LIMIT 1";
$t_row = $pdo->query($t_SQL)->fetch();
$t_row_sid = $t_row['sid'];

$b_SQL = "SELECT * FROM `products` WHERE `type_sid` = 46 AND `sid` !=  $psid and `sid` != $t_row_sid AND `sid` != $c_row_sid and `sid` < 225 ORDER BY RAND() LIMIT 1";
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
                <p class="result-title animatable fadeInUp">適合你的精釀啤酒類型：<span>印度淡愛爾</span></p>
                <p class="result-info animatable fadeInUp">
                    有一種人容易在酒後就直接睡著，沒有太多其餘的對談與行為。這樣的人個性隨和，且心胸開闊，比較不會因為小事與他人斤斤計較。你們看似能和很多人好好相處，但實則多與人沒有交流。你們通常容易滿足，也對生活現狀感到安逸，對未來沒有過多要求與追求，把日子過的順利就是你們最大的心願。 酒精對你們來說，就像放鬆劑一樣，喝完就能安心睡覺。</p>
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
                <div class="share-icons d-flex align-items-center">

                    <div class="fb-share-button" data-href="quiz-result-1.php" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">分享</a></div>


                    <div class="line-it-button" data-lang="zh_Hant" data-type="share-a" data-ver="3" data-url="https://org-media.line.me/zh_TW/how_to_install#lineitbutton" data-color="default" data-size="large" data-count="false" style="display: none;"></div>
                    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

                </div>
            </div> -->


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
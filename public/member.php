<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU-會員中心';



if (isset($_SESSION['user'])) {


    // 判斷是哪個會員
    $m_sid = $_SESSION['user']['sid']; //抓會員sid

    // 從資料庫抓會員資料
    $member_SQL = "SELECT * FROM `member` WHERE `sid` = $m_sid";
    $m_row = $pdo->query($member_SQL)->fetch();


    // 從資料庫抓折價券
    $discount_SQL = "SELECT * FROM `achievement` WHERE `coupon` > 0 AND `member_sid` = $m_sid ORDER BY `create_at`";
    $d_row = $pdo->query($discount_SQL)->fetchAll();

    // 從資料庫撈酒仙指數
    $achieve_SQL = "SELECT `achieve` FROM `achievement` WHERE `achieve` > 0 AND `member_sid` = $m_sid ";
    $a_row = $pdo->query($achieve_SQL)->fetchAll(PDO::FETCH_NUM);
    $a_total = 0;
    if (!empty($a_row)) {
        foreach ($a_row as $a) {
            $a_total += $a[0];
        }
    }

    // 從資料庫抓目前訂單資料
    $order_SQL = "SELECT * FROM `orders` WHERE `member_sid` = $m_sid AND `status` = '處理中' ORDER BY `sid` DESC";
    $or_row = $pdo->query($order_SQL)->fetchAll();


    // 從資料庫抓過往訂單資料
    $past_SQL = "SELECT * FROM `orders` WHERE `member_sid` = $m_sid AND `status` = '已完成' ORDER BY `sid` DESC";
    $pa_row = $pdo->query($past_SQL)->fetchAll();




    // 從資料庫裡撈要評價的商品
    $comment_SQL = "SELECT o.`sid`, o.`product_sid`, p.`c_name`, p.`e_name`, p.`pic` FROM `order_detail` o 
    JOIN `products` p 
    ON o.`product_sid` = p.`sid`
    WHERE `member_sid` = $m_sid AND `product_sid` > 0 AND `comment` = 'false'
    ORDER BY o.`sid` DESC";
    $com_row = $pdo->query($comment_SQL)->fetchAll();



    // 從資料庫抓已評論的商品
    $commentdone_SQL = "SELECT c.`sid`, c.`product_sid`,c.`score`,c.`text`, p.`c_name`, p.`e_name`, p.`pic` FROM `comment` c
    JOIN `products` p 
    ON c.`product_sid` = p.`sid`
    WHERE `member_sid` = $m_sid 
    ORDER BY `sid` DESC";
    $comdone_row = $pdo->query($commentdone_SQL)->fetchAll();
};











?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->
<!-- 包含自己的css和js -->

<link rel="stylesheet" href="../css/member/member.css">
<link rel="stylesheet" href="../css/member/memberdiscount.css">




<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>
<!-- 這裡開始寫html -->


<!-- 折價券pop-up-->
<section class="discount-popup">
    <div class="discount-box d-flex flex-wrap align-content-start">
        <div class="col-12 box-title d-flex justify-content-center align-items-center mb-4">
            <img src="../images/logo/logo_beeru_gold.svg" alt="">
            <p>折價券列表</p>
        </div>
        <div class="col-12 coupon-list d-flex flex-wrap align-content-start">

            <?php if (!empty($d_row)) : ?>
                <!-- 單張折價券 -->
                <?php foreach ($d_row as $d) : ?>
                    <div class="col-6 col-lg-4 coupon-wrap">
                        <div class="coupon" data-sid="<?= $d['sid'] ?>" data-num="<?= $d['coupon'] ?>">
                            <p>折價券 <span class="num">$<?= $d['coupon'] ?></span>元</p>
                            <p>有效期限:<?= date("Y/m/d", strtotime($d['create_at'] . "+6 month")) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 empty-status d-flex flex-column justify-content-center align-items-center">
                    <p>目前沒有折價券喔!</p>
                    <p>快到會員中心>我的成就，來累積更多的券吧！</p>
                    <div class="pipi mt-4">
                        <img src="../images/common/pipi_empty.svg" alt="">
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="button-wrap-3 mx-auto">
            <button class="discount_ok">我知道了</button>
        </div>
    </div>
</section>


<section class="member">
    <div class="member-wrap">
        <div class="container">
            <div class="row justify-content-center">


                <div class="backtomenu d-block d-lg-none"><i class="fas fa-arrow-circle-left mr-1"></i>回選單</div>

                <!-- 大標 -->
                <div class="col-12 member-title">
                    <p>會員中心</p>
                </div>

                <!-- 概況 -->
                <div class="col-12 col-lg-5 member-overveiw d-flex">
                    <div class="col-4 col-lg-6 memberpic px-0 p-lg-5 d-flex align-items-center justify-content-center">
                        <div class="user-pic">
                            <img src="../images/user/<?= $m_row['user-pic'] ?>" alt="">
                            <div class="edit-pic"></div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-6 memberinfo d-flex flex-column justify-content-center align-items-center">
                        <div class="helloname">Hello, <?= $m_row['nickname'] ?></div>
                        <p>我的成就</p>
                        <div class="beerpercent">酒仙指數<span class="beerpercent-num"><?= $a_total ?></span>%</div>
                        <button class="checkmydiscount mt-2">查看折價券</button>

                    </div>
                </div>

                <!-- 功能區域 -->
                <div class="col-12 member-func px-0">
                    <div class="member-func-content d-flex flex-lg-wrap mt-3 justify-content-lg-center">
                        <!-- 選單 -->
                        <div class="col-12 col-lg-10 member-menu">
                            <ul class="member-item-grop d-flex flex-column flex-lg-row justify-content-between">
                                <li class="menu-item memberData-item" data-content="memberData"><i class="fas fa-user-tag"></i>會員資料<i class="fas fa-chevron-right"></i></li>
                                <li class="menu-item memberCollect-item" data-content="memberCollect"><i class="fas fa-beer"></i>我的酒櫃<i class="fas fa-chevron-right"></i></li>
                                <li class="menu-item memberComment-item" data-content="memberComment"><i class="fas fa-comment-dots"></i>我的評價<i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="menu-item memberEvent-item" data-content="memberEvent"><i class="fas fa-calendar-alt"></i>我的預約<i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="menu-item memberFund-item" data-content="memberFund"><i class="fas fa-hand-holding-usd"></i>我的贊助<i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="menu-item memberAchievement-item" data-content="memberAchievement"><i class="fas fa-trophy"></i>我的成就<i class="fas fa-chevron-right"></i></li>
                                <li class="menu-item memberOrder-item" data-content="memberOrder"><i class="fas fa-copy"></i>我的訂單<i class="fas fa-chevron-right"></i></li>
                                <li class="menu-item d-block d-lg-none" data-content="logout"><i class="fas fa-sign-out-alt"></i>會員登出<i class="fas fa-chevron-right"></i>
                                </li>
                            </ul>
                            <div class="menu-active-line"></div>
                            <div class="menu-active-line2"></div>
                        </div>

                        <!-- 內容 -->
                        <div class="col-12 col-lg-10 member-func-show">

                            <!-- 會員資料 -->
                            <section class="member-func-box memberData">
                                <div class="data-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">會員資料</p>

                                    <!-- 會員資料 -->
                                    <div class="col-12 col-lg-5 mydata">
                                        <div class="mydata-txt mydata-email mb-3">
                                            <p>信箱</p>
                                            <p class="myEmail"><?= $m_row['email'] ?></p>
                                        </div>
                                        <div class="mydata-txt mydata-nickname mb-3">
                                            <p>姓名</p>
                                            <p class="myNickname"><?= $m_row['nickname'] ?></p>
                                        </div>
                                        <div class="mydata-txt mydata-birthday mb-3">
                                            <p>生日</p>
                                            <p class="myBirthday"><?= $m_row['birthday'] ?></p>
                                        </div>
                                        <div class="mydata-txt mydata-address mb-5">
                                            <p>地址</p>
                                            <p class="myADD"><?= $m_row['address'] ?></p>
                                        </div>
                                        <div class="data-button-wrap d-flex justify-content-center">
                                            <button class="btn_edit-data">編輯資料</button>
                                            <button class="btn_reset-password">重設密碼</button>
                                        </div>
                                    </div>

                                    <!-- 編輯資料 -->
                                    <form name="Edit_data" class="col-12 col-lg-5 mydata-edit mydata-editall" method="post" novalidate>
                                        <P class="d-none d-lg-block">修改會員資料</P>
                                        <div class="mydata-txt mydata-email mb-3">
                                            <p>信箱</p>
                                            <p class="myEmail"><?= $m_row['email'] ?></p>
                                        </div>
                                        <div class="mydata-txt mydata-nickname mb-3">
                                            <p>姓名</p>
                                            <i class="fas fa-user-alt user-icon02"></i>
                                            <input type="text" class="input-btn" name="nickname" required value="<?= $m_row['nickname'] ?>">
                                            <!-- <small class="warn"><i class="far fa-times-circle"></i>錯誤</small> -->

                                        </div>
                                        <div class="mydata-txt mydata-birthday mb-3">
                                            <p>生日</p>
                                            <input class="input-btn birthday" type="date" name="birthday" required value="<?= $m_row['birthday'] ?>">
                                            <small class="warn"></small>

                                        </div>
                                        <div class="mydata-txt mydata-address mb-5">
                                            <p>地址</p>
                                            <textarea class="input-btn2" name="address" rows="2"><?= $m_row['address'] ?></textarea>


                                        </div>
                                        <div class="data-button-wrap d-flex justify-content-center">

                                            <button type="submit" class="btn_edit-confirm" onclick="checkForm_edit(); return false;">送出</button>
                                            <button class="btn_edit-cancel">取消</button>

                                        </div>
                                    </form>


                                    <!-- 重設密碼 -->
                                    <form name="Resetpassword" method="post" class="col-12 col-lg-5 password-reset mydata-editall" novalidate>
                                        <P class="d-none d-lg-block">重設我的密碼</P>
                                        <div class="mydata-txt old-password mb-3">
                                            <p>目前密碼</p>
                                            <i class="fas fa-lock lock-icon02"></i>
                                            <input class="input-btn oldPassword" name="oldPassword"  required >
                                            <small class="warn"><i class="far fa-times-circle"></i></small> 
                                        </div>
                                        
                                        <div class="mydata-txt old-password mb-3">
                                            <p>輸入新密碼</p>
                                            <i class="fas fa-lock lock-icon02"></i>
                                            <input class="input-btn resetPassword" name="resetPassword" required>
                                            <small class="warn"><i class="far fa-times-circle"></i></small> 
                                        </div>
                                        <div class="mydata-txt old-password mb-3">
                                            <p>再次輸入密碼</p>
                                            <i class="fas fa-lock lock-icon02"></i>
                                            <input class="input-btn resetPassword-again" name="resetPassword-again" required>
                                            <small class="warn"><i class="far fa-times-circle"></i></small> 
                                        </div>

                                        <div class="data-button-wrap d-flex justify-content-center">
                                            <button type="submit"  class="btn_password-confirm" onclick="checkform_restPassword(); return false;">送出</button>
                                            
                                            <button class="btn_password-cancel">取消</button>
                                        </div>
                                    </form>

                                </div>
                            </section>


                            <!-- 我的酒櫃 -->
                            <section class="member-func-box memberCollect">

                                <div class="collect-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">我的酒櫃</p>

                                    <!-- 關注 -->
                                    <div class="col-12 myattention d-flex flex-wrap align-items-center justify-content-center ">
                                        <p class="col-12 memberAccordion">關注<i class="fas fa-chevron-circle-up ml-1"></i></p>
                                        <form class="col-12 col-lg-11 myattention-items memberAccordion-content" name="myattention">
                                            <label for="Belgium">
                                                <input type="checkbox" id="Belgium" name="" value=""><span>比利時</span>
                                            </label>
                                            <label for="IPA">
                                                <input type="checkbox" id="IPA" name="" value=""><span>印度淡愛爾</span>
                                            </label>
                                            <label for="moondog">
                                                <input type="checkbox" id="moondog" name="" value=""><span>月亮狗</span>
                                            </label>
                                            <br>
                                            <button class="btn_cancelAtten">取消關注</button>
                                        </form>

                                    </div>


                                    <!-- 收藏 -->
                                    <div class="col-12 mycollect d-flex flex-wrap align-items-center justify-content-center">
                                        <p class="col-12 memberAccordion">收藏<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 mycollect-items d-flex flex-wrap align-items-center justify-content-center memberAccordion-content">
                                            <!-- 排序&搜尋 -->
                                            <div class="col-12 SortAndSearch-wrap mb-4">
                                                <div class="SortAndSearch d-flex flex-wrap justify-content-center justify-content-lg-end">
                                                    <!-- 排序 -->
                                                    <div class="sort order-2 order-lg-1">
                                                        <form action="" id="sort" name="sort">
                                                            <select name="sort-option" id="sort-option" class="sort-option" onchange="changeSort()">
                                                                <option value="1">最新上架商品</option>
                                                                <option value="2">價格 (由低至高)</option>
                                                                <option value="3">價格 (由高至低)</option>
                                                                <option value="4">酒精濃度 (由低至高)</option>
                                                                <option value="5">酒精濃度 (由高至低)</option>
                                                            </select>
                                                        </form>
                                                    </div>

                                                    <!-- 搜尋 -->
                                                    <div class="p_search order-1">
                                                        <i class="fas fa-search"></i>
                                                        <input type="text" id="search3" class="search2" placeholder="搜尋啤酒">
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- 商品排列 -->
                                            <div class="col-12 product-arrang d-flex flex-wrap">
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </section>

                            <!-- 我的評價 -->
                            <section class="member-func-box memberComment">
                                <div class="comment-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">我的評價</p>

                                    <!-- 待評價 -->
                                    <div class="col-12 comment-notyet d-flex flex-wrap align-items-center justify-content-center">
                                        <p class="col-12 memberAccordion">待評價<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 mycomment-items px-0 memberAccordion-content">

                                            <?php if (!empty($com_row)) : ?>

                                                <?php foreach ($com_row as $com) : ?>
                                                    <!-- 單支產品評價 -->
                                                    <div class="comment-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-pro="<?= $com['product_sid'] ?>">

                                                        <!-- 商品資訊 -->
                                                        <div class="col-12 col-lg-4 com-pro d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">商品</p>
                                                            </div>
                                                            <div class="col-12 this-p d-flex align-items-center px-0">
                                                                <div class="col-2 thisp-pic px-0">
                                                                    <a href="each-product.php?psid=<?= $com['product_sid'] ?>"><img src="../images/products/<?= $com['pic'] ?>" alt=""></a>
                                                                </div>
                                                                <div class="col-10 thisp-name px-0 pr-lg-4">
                                                                    <a href="each-product.php?psid=<?= $com['product_sid'] ?>">
                                                                        <p class="c-name"><?= $com['c_name'] ?></p>
                                                                    </a>
                                                                    <a href="each-product.php?psid=<?= $com['product_sid'] ?>">
                                                                        <p class="e-name "><?= $com['e_name'] ?></p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- 打分數 -->
                                                        <div class="col-12 col-lg-2 com-score d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">分數</p>
                                                            </div>
                                                            <div class="col-12 thisscore d-flex px-0 align-items-center">
                                                                <select name="score" class="myscore">
                                                                    <option value="5">5</option>
                                                                    <option value="4">4</option>
                                                                    <option value="3">3</option>
                                                                    <option value="2">2</option>
                                                                    <option value="1">1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- 寫下評價 -->
                                                        <div class="col-12 col-lg-5 com-txt d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">評論</p>
                                                            </div>
                                                            <div class="col-12 thiscommtent d-flex px-0 align-items-center">
                                                                <textarea name="commtent" rows="2" class="commenttextarea">請寫下對這支酒的感想!</textarea>
                                                            </div>
                                                            <small class="warn"></small>
                                                        </div>

                                                        <!-- 送出 -->
                                                        <div class="col-12 col-lg-1 member-button com-button d-flex  align-items-center px-0 justify-content-center">
                                                            <button class="btn_comment-confirm" onclick="commentProduct('add')">送出</button>
                                                        </div>

                                                    </div>
                                                <?php endforeach; ?>

                                            <?php else : ?>
                                                <div class="empty-status px-3 px-lg-5">
                                                    <p>目前沒有待評價的商品</p>
                                                    <a href="all-product.php"><button class="starttogo">開始購物<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button></a>
                                                </div>
                                            <?php endif; ?>



                                        </div>
                                    </div>

                                    <!-- 已評價 -->
                                    <div class="col-12 comment-done d-flex flex-wrap align-items-center justify-content-center ">
                                        <p class="col-12 memberAccordion">已評價<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 mydonecomment-items px-0 memberAccordion-content">

                                            <?php if (!empty($comdone_row)) : ?>

                                                <?php foreach ($comdone_row as $comdone) : ?>
                                                    <!-- 單支產品評價 -->
                                                    <div class="comment-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-sid="<?= $comdone['sid'] ?>" data-pro="<?= $comdone['product_sid'] ?>">

                                                        <!-- 商品資訊 -->
                                                        <div class="col-12 col-lg-4 com-pro d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">商品</p>
                                                            </div>
                                                            <div class="col-12 this-p d-flex align-items-center px-0">
                                                                <div class="col-2 thisp-pic px-0">
                                                                    <a href="each-product.php?psid=<?= $comdone['product_sid'] ?>">
                                                                        <img src="../images/products/<?= $comdone['pic'] ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="col-10 thisp-name px-0 pr-lg-4">
                                                                    <a href="each-product.php?psid=<?= $comdone['product_sid'] ?>">
                                                                        <p class="c-name"><?= $comdone['c_name'] ?></p>
                                                                    </a>
                                                                    <a href="each-product.php?psid=<?= $comdone['product_sid'] ?>">
                                                                        <p class="e-name "><?= $comdone['e_name'] ?></p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- 打分數 -->
                                                        <div class="col-12 col-lg-2 com-score d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">分數</p>
                                                            </div>
                                                            <div class="col-12 thisscore d-flex px-0 align-items-center">

                                                                <div class="beer-score" data-score="<?= $comdone['score'] ?>">
                                                                    <img src="../images/common/beerscore-<?= $comdone['score'] ?>.svg" alt="">
                                                                </div>

                                                                <select name="score" class="myscore myscore-edit d-none">
                                                                    <option value="5">5</option>
                                                                    <option value="4">4</option>
                                                                    <option value="3">3</option>
                                                                    <option value="2">2</option>
                                                                    <option value="1">1</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- 寫下評價 -->
                                                        <div class="col-12 col-lg-5 com-txt d-flex flex-wrap align-items-center px-lg-0">
                                                            <div class="col-12 px-0">
                                                                <p class="title">評論</p>
                                                            </div>
                                                            <div class="col-12 thiscommtent d-flex px-0 align-items-center">
                                                                <p class="mycommenttxt"><?= $comdone['text'] ?></p>

                                                                <textarea name="commtent" rows="2" class="commenttextarea commenttextarea-edit d-none">請寫下對這支酒的感想!</textarea>
                                                            </div>
                                                        </div>

                                                        <!-- 修改 -->
                                                        <div class="col-12 col-lg-1 member-button com-button d-flex align-items-center px-0 justify-content-center ">
                                                            <button class="btn_comment-edit" onclick="editComment()"><i class="fas fa-pencil-alt"></i></button>

                                                            <div class="edit-buttons-wrap d-none">
                                                                <div class="edit-buttons d-flex flex-wrap align-content-center px-0 justify-content-center ">
                                                                    <button class="btn_comment-confirm" onclick="commentProduct('edit')">送出</button>
                                                                    <button class="btn_comment-cancel" onclick="canceleditComment()">取消</button>
                                                                </div>

                                                            </div>


                                                        </div>

                                                    </div>
                                                <?php endforeach; ?>

                                            <?php else : ?>
                                                <div class="empty-status px-3 px-lg-5">
                                                    <p>目前沒有已評價的商品</p>
                                                    <a href="all-product.php"><button class="starttogo">開始購物<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button></a>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                    </div>


                                </div>
                            </section>


                            <!-- 我的預約 -->
                            <section class="member-func-box memberEvent">
                                <div class="event-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">我的預約</p>

                                    <!-- 已預約 -->
                                    <div class="col-12 event-signdone d-flex flex-wrap align-items-center justify-content-center">
                                        <p class="col-12 memberAccordion">已預約<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myevent-items px-0 memberAccordion-content">

                                            <!-- 單個活動 -->
                                            <div class="event-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-sid="">

                                                <!-- 活動照片資訊 -->
                                                <div class="col-12 col-lg-2 event-pic d-flex flex-wrap align-items-center px-lg-0">
                                                    <a href=""><img src="../images/event/event-open.jpeg" alt=""></a>
                                                </div>
                                                <!-- 活動主題 -->
                                                <div class="col-12 col-lg-3 event-name d-flex flex-wrap align-items-lg-center px-lg-0 pl-lg-4 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title d-none d-lg-block">試飲會主題</p>
                                                        <p class="title d-block d-lg-none">主題</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thisname d-flex px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <a href="">
                                                            <p>六月『啤酒不簡單』</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- 活動地點 -->
                                                <div class="col-12 col-lg-3 event-location d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title">地點</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thislocation d-flex px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>忠孝東路四段270號
                                                            11樓之311樓之311樓之3</p>
                                                    </div>
                                                </div>
                                                <!-- 活動日期 -->
                                                <div class="col-12 col-lg-3 event-time d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title">日期</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thistime px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>2021/06/06(日)</p>
                                                        <p>19:30-21:00</p>
                                                    </div>
                                                </div>


                                                <!-- 取消 -->
                                                <div class="col-12 col-lg-1 member-button event-button d-flex  align-items-center px-0 justify-content-center">
                                                    <button class="btn_event-cancel">取消</button>
                                                </div>

                                            </div>



                                        </div>
                                    </div>

                                    <!-- 關注中 -->
                                    <div class="col-12 event-atten d-flex flex-wrap align-items-center justify-content-center ">
                                        <p class="col-12 memberAccordion">關注中<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myattenevent-items px-0 memberAccordion-content">

                                            <!-- 單個活動 -->
                                            <div class="event-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-sid="">

                                                <!-- 活動照片資訊 -->
                                                <div class="col-12 col-lg-2 event-pic d-flex flex-wrap align-items-center px-lg-0">
                                                    <a href=""><img src="../images/event/shutterstock_662619631.jpg" alt=""></a>
                                                </div>
                                                <!-- 活動主題 -->
                                                <div class="col-12 col-lg-3 event-name d-flex flex-wrap align-items-lg-center px-lg-0 pl-lg-4 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title d-none d-lg-block">試飲會主題</p>
                                                        <p class="title d-block d-lg-none">主題</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thisname d-flex px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <a href="">
                                                            <p>六月『啤酒不簡單』</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- 活動地點 -->
                                                <div class="col-12 col-lg-3 event-location d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title">地點</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thislocation d-flex px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>忠孝東路四段270號
                                                            11樓之311樓之311樓之3</p>
                                                    </div>
                                                </div>
                                                <!-- 活動日期 -->
                                                <div class="col-12 col-lg-3 event-time d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-2 col-lg-12 px-0">
                                                        <p class="title">日期</p>
                                                    </div>
                                                    <div class="col-10 col-lg-12 thistime px-0 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>2021/06/06(日)</p>
                                                        <p>19:30-21:00</p>
                                                    </div>
                                                </div>


                                                <!-- 報名/已額滿 -->
                                                <div class="col-12 col-lg-1 member-button event-button d-flex  align-items-center px-0 justify-content-center">
                                                    <!-- <a href=""><button>報名</button></a> -->
                                                    <p class="fullsign">已額滿</p>
                                                </div>

                                            </div>



                                        </div>
                                    </div>


                                </div>
                            </section>



                            <!-- 我的贊助 -->
                            <section class="member-func-box memberFund">
                                <div class="fund-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">我的贊助</p>

                                    <!-- 已贊助 -->
                                    <div class="col-12 fund-done d-flex flex-wrap align-items-center justify-content-center">
                                        <p class="col-12 memberAccordion">已贊助<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myfund-items px-0 memberAccordion-content">

                                            <!-- 單個贊助方案 -->
                                            <div class="fund-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-sid="">

                                                <!-- 募資照片資訊 -->
                                                <div class="col-12 col-lg-2 fund-pic d-flex flex-wrap align-items-center px-lg-0">
                                                    <a href=""><img src="../images/joyce_images/fund-p-9.jpg" alt=""></a>
                                                </div>
                                                <!-- 計畫主題 -->
                                                <div class="col-12 col-lg-3 fund-name d-flex flex-wrap align-items-lg-center px-lg-0 pl-lg-4 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">募資計畫</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisname d-flex px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <a href="">
                                                            <p>酸啤酒愛好者『黑暗之心』</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- 截止時間 -->
                                                <div class="col-12 col-lg-2 fund-endtime d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">截止時間</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisendtime d-flex px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>2021/08/06</p>
                                                    </div>
                                                </div>
                                                <!-- 目前進度 -->
                                                <div class="col-12 col-lg-2 fund-schedule d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">目前進度</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisschedule px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>50%</p>
                                                    </div>
                                                </div>

                                                <!-- 贊助方案 -->
                                                <div class="col-12 col-lg-3 fund-confirm d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">贊助方案</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisconfirm px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>方案一</p>
                                                        <p class="fund-total">贊助金額1330元</p>
                                                    </div>
                                                </div>


                                            </div>



                                        </div>
                                    </div>

                                    <!-- 關注中 -->
                                    <div class="col-12 fund-atten d-flex flex-wrap align-items-center justify-content-center ">
                                        <p class="col-12 memberAccordion">關注中<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myattenfund-items px-0 memberAccordion-content">

                                            <!-- 單個贊助方案 -->
                                            <div class="fund-box px-3 px-lg-5 py-4 d-flex flex-wrap align-items-start" data-sid="">

                                                <!-- 募資照片資訊 -->
                                                <div class="col-12 col-lg-2 fund-pic d-flex flex-wrap align-items-center px-lg-0">
                                                    <a href=""><img src="../images/joyce_images/fund-p-9.jpg" alt=""></a>
                                                </div>
                                                <!-- 計畫主題 -->
                                                <div class="col-12 col-lg-3 fund-name d-flex flex-wrap align-items-lg-center px-lg-0 pl-lg-4 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">募資計畫</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisname d-flex px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <a href="">
                                                            <p>酸啤酒愛好者『黑暗之心』</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- 截止時間 -->
                                                <div class="col-12 col-lg-2 fund-endtime d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">截止時間</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisendtime d-flex px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>2021/08/06</p>
                                                    </div>
                                                </div>
                                                <!-- 目前進度 -->
                                                <div class="col-12 col-lg-3 fund-schedule d-flex flex-wrap align-items-lg-center px-lg-0 ">
                                                    <div class="col-3 col-lg-12 px-0">
                                                        <p class="title">目前進度</p>
                                                    </div>
                                                    <div class="col-9 col-lg-12 thisschedule px-lg-0 pl-2 pr-2 mt-lg-4 mb-3 mb-lg-0">
                                                        <p>50%</p>
                                                    </div>
                                                </div>

                                                <!-- 贊助 -->
                                                <div class="col-12 col-lg-2 member-button fund-button d-flex  align-items-center px-0 justify-content-center">
                                                    <a href=""><button>贊助</button></a>
                                                </div>




                                            </div>



                                        </div>
                                    </div>


                                </div>
                            </section>


                            <!-- 我的訂單 -->
                            <section class="member-func-box memberOrder">
                                <div class="order-wrap d-flex flex-wrap align-items-center justify-content-center">

                                    <p class="d-block d-lg-none mobile-title">我的訂單</p>

                                    <!-- 目前訂單 -->
                                    <div class="col-12 order-now d-flex flex-wrap align-items-center justify-content-center px-0 px-lg-4 ">
                                        <p class="col-12 memberAccordion">目前訂單<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myordernow-items px-0 memberAccordion-content">

                                            <!-- 單筆訂單 -->

                                            <?php if (!empty($or_row)) : ?>

                                                <?php foreach ($or_row as $or) : ?>
                                                    <div class="order-detail">
                                                        <p class="text-center text-lg-left">訂單編號：<?= $or['order_num'] ?></p>
                                                        <div class="order-d-box px-3 px-lg-5 py-4 d-flex flex-wrap">

                                                            <!-- 訂單 -->
                                                            <div class="col-12 col-lg-10 order-part px-0">
                                                                <!-- 訂單資訊 -->
                                                                <div class="overview">
                                                                    <div class="view-head d-flex">
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            日期</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            總金額</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            付款方式</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            訂單狀態</div>
                                                                    </div>
                                                                    <div class="view-content d-flex">
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $or['date'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            NT$<?= $or['total_price'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $or['payment'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $or['status'] ?></div>
                                                                    </div>
                                                                </div>
                                                                <!-- 商品列表 -->
                                                                <p class="col-12 px-2 detail-header">訂單明細<i class="fas fa-caret-up ml-1"></i></p>
                                                                <div class="product-detail">
                                                                    <!-- 表頭 -->
                                                                    <div class="d-header d-flex flex-wrap">
                                                                        <div class="p-thead col-7 col-lg-8 pl-2">商品名稱</div>
                                                                        <div class="p-thead col-2 px-0 text-center">數量</div>
                                                                        <div class="p-thead col-3 col-lg-2 px-0 text-center">
                                                                            小計</div>
                                                                    </div>

                                                                    <!-- 從資料庫抓產品細節 -->
                                                                    <?php
                                                                    $order_sid = $or['sid'];
                                                                    $detail_SQL = "SELECT o.`product_sid`, p.`c_name`, p.`e_name`, p.`pic`, o.`quantity`, o.`price` 
                                                                    FROM `order_detail` o JOIN `products` p ON o.`product_sid` = p.`sid` 
                                                                    WHERE `order_sid` = $order_sid";
                                                                    $detail_row = $pdo->query($detail_SQL)->fetchAll();
                                                                    ?>
                                                                    <!-- 單支產品開始 -->
                                                                    <?php foreach ($detail_row as $detail) : ?>
                                                                        <div class="my-checkout-p d-flex align-items-center mb-2">
                                                                            <div class="col-7 col-lg-8 d-flex align-items-center">
                                                                                <div class="col-2 thisp-pic px-0">
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>"><img src="../images/products/<?= $detail['pic'] ?>" alt="">
                                                                                </div></a>
                                                                                <div class="col-10 thisp-name px-0">
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>">
                                                                                        <p class="c-name"><?= $detail['c_name'] ?></p>
                                                                                    </a>
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>">
                                                                                        <p class="e-name d-none d-lg-block"><?= $detail['e_name'] ?></p>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 thisp-qty px-0 text-center"><?= $detail['quantity'] ?>
                                                                            </div>
                                                                            <div class="col-3 col-lg-2 thisp-subp px-0 text-center">
                                                                                NT.<?= $detail['price'] ?></div>
                                                                        </div>
                                                                    <?php endforeach; ?>

                                                                    <!-- 最後金額計算 -->
                                                                    <div class="calc-price mt-4">
                                                                        <div class="coupon d-flex justify-content-end">

                                                                            <?php if ($or['discount'] > 0) : ?>
                                                                                <div class="col-4 col-lg-2 text-right">折價券</div>
                                                                                <div class="col-4 col-lg-2 text-right">-NT.<?= $or['discount'] ?>
                                                                                </div>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                        <div class="shipping d-flex justify-content-end">
                                                                            <div class="col-4 col-lg-2 text-right">運費</div>
                                                                            <div class="col-4 col-lg-2 text-right">NT.<?= $or['shipping'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="total-price d-flex justify-content-end">
                                                                            <div class="col-4 col-lg-3 text-right">金額總計
                                                                            </div>
                                                                            <div class="col-4 col-lg-2 text-right">NT.<?= $or['total_price'] ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- 收件人資訊 -->
                                                                    <div class="re-detail mt-5">
                                                                        <div class="d-header d-flex flex-wrap">
                                                                            <p class="col-12 px-2">收件人資訊</p>
                                                                        </div>
                                                                        <div class="re-content d-flex px-3 flex-column flex-lg-row">
                                                                            <div class="re01 col-lg-2 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0 pl-lg-1">
                                                                                    收件人</div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 pl-lg-1">
                                                                                    <?= $or['re_name'] ?></div>
                                                                            </div>
                                                                            <div class="re02 col-lg-3 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">收件人電話
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $or['re_mobile'] ?></div>
                                                                            </div>
                                                                            <div class="re03 col-lg-5 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">收件地址
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $or['re_add'] ?></div>
                                                                            </div>
                                                                            <div class="re04 col-lg-2 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">運送方式
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $or['ship'] ?></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>

                                                            <!-- 按鈕 -->
                                                            <div class="col-12 col-lg-2 member-button fund-button d-flex flex-lg-column align-items-center px-0 justify-content-center">
                                                                <button>取消</button>
                                                                <button>留言</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>


                                            <?php else : ?>
                                                <div class="empty-status px-3 px-lg-5">
                                                    <p>目前沒有處理中的訂單</p>
                                                    <a href="all-product.php"><button class="starttogo">開始購物<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button></a>
                                                </div>
                                            <?php endif; ?>



                                        </div>
                                    </div>

                                    <!-- 過往訂單 -->
                                    <div class="col-12 order-past d-flex flex-wrap align-items-center justify-content-center  px-0 px-lg-4">
                                        <p class="col-12 memberAccordion">過往訂單<i class="fas fa-chevron-circle-up ml-1"></i></p>

                                        <div class="col-12 myorderpast-items px-0 memberAccordion-content">


                                            <?php if (!empty($pa_row)) : ?>

                                                <?php foreach ($pa_row as $pa) : ?>
                                                    <div class="order-detail">
                                                        <p class="text-center text-lg-left">訂單編號：<?= $pa['order_num'] ?></p>
                                                        <div class="order-d-box px-3 px-lg-5 py-4 d-flex flex-wrap">

                                                            <!-- 訂單 -->
                                                            <div class="col-12 col-lg-10 order-part px-0">
                                                                <!-- 訂單資訊 -->
                                                                <div class="overview">
                                                                    <div class="view-head d-flex">
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            日期</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            總金額</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            付款方式</div>
                                                                        <div class="v-thead col-3 px-0 text-center text-lg-left">
                                                                            訂單狀態</div>
                                                                    </div>
                                                                    <div class="view-content d-flex">
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $pa['date'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            NT$<?= $pa['total_price'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $pa['payment'] ?></div>
                                                                        <div class="v-tbody col-3 px-0 text-center text-lg-left">
                                                                            <?= $pa['status'] ?></div>
                                                                    </div>
                                                                </div>
                                                                <!-- 商品列表 -->
                                                                <p class="col-12 px-2 detail-header">訂單明細<i class="fas fa-caret-up ml-1"></i></p>
                                                                <div class="product-detail">
                                                                    <!-- 表頭 -->
                                                                    <div class="d-header d-flex flex-wrap">
                                                                        <div class="p-thead col-7 col-lg-8 pl-2">商品名稱</div>
                                                                        <div class="p-thead col-2 px-0 text-center">數量</div>
                                                                        <div class="p-thead col-3 col-lg-2 px-0 text-center">
                                                                            小計</div>
                                                                    </div>

                                                                    <!-- 從資料庫抓產品細節 -->
                                                                    <?php
                                                                    $order_sid = $pa['sid'];
                                                                    $detail_SQL = "SELECT o.`product_sid`, p.`c_name`, p.`e_name`, p.`pic`, o.`quantity`, o.`price` 
                                                                    FROM `order_detail` o 
                                                                    JOIN `products` p ON o.`product_sid` = p.`sid` 
                                                                    WHERE `order_sid` = $order_sid";
                                                                    $detail_row = $pdo->query($detail_SQL)->fetchAll();
                                                                    ?>
                                                                    <!-- 單支產品開始 -->
                                                                    <?php foreach ($detail_row as $detail) : ?>
                                                                        <div class="my-checkout-p d-flex align-items-center mb-2">
                                                                            <div class="col-7 col-lg-8 d-flex align-items-center">
                                                                                <div class="col-2 thisp-pic px-0">
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>"><img src="../images/products/<?= $detail['pic'] ?>" alt="">
                                                                                </div></a>
                                                                                <div class="col-10 thisp-name px-0">
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>">
                                                                                        <p class="c-name"><?= $detail['c_name'] ?></p>
                                                                                    </a>
                                                                                    <a href="each-product.php?psid=<?= $detail['product_sid'] ?>">
                                                                                        <p class="e-name d-none d-lg-block"><?= $detail['e_name'] ?></p>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 thisp-qty px-0 text-center"><?= $detail['quantity'] ?>
                                                                            </div>
                                                                            <div class="col-3 col-lg-2 thisp-subp px-0 text-center">
                                                                                NT.<?= $detail['price'] ?></div>
                                                                        </div>
                                                                    <?php endforeach; ?>

                                                                    <!-- 最後金額計算 -->
                                                                    <div class="calc-price mt-4">
                                                                        <div class="coupon d-flex justify-content-end">

                                                                            <?php if ($pa['discount'] > 0) : ?>
                                                                                <div class="col-4 col-lg-2 text-right">折價券</div>
                                                                                <div class="col-4 col-lg-2 text-right">-NT.<?= $pa['discount'] ?>
                                                                                </div>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                        <div class="shipping d-flex justify-content-end">
                                                                            <div class="col-4 col-lg-2 text-right">運費</div>
                                                                            <div class="col-4 col-lg-2 text-right">NT.<?= $pa['shipping'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="total-price d-flex justify-content-end">
                                                                            <div class="col-4 col-lg-3 text-right">金額總計
                                                                            </div>
                                                                            <div class="col-4 col-lg-2 text-right">NT.<?= $pa['total_price'] ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- 收件人資訊 -->
                                                                    <div class="re-detail mt-5">
                                                                        <div class="d-header d-flex flex-wrap">
                                                                            <p class="col-12 px-2">收件人資訊</p>
                                                                        </div>
                                                                        <div class="re-content d-flex px-3 flex-column flex-lg-row">
                                                                            <div class="re01 col-lg-2 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0 pl-lg-1">
                                                                                    收件人</div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 pl-lg-1">
                                                                                    <?= $pa['re_name'] ?></div>
                                                                            </div>
                                                                            <div class="re02 col-lg-3 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">收件人電話
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $pa['re_mobile'] ?></div>
                                                                            </div>
                                                                            <div class="re03 col-lg-5 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">收件地址
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $pa['re_add'] ?></div>
                                                                            </div>
                                                                            <div class="re04 col-lg-2 px-0 d-flex flex-row flex-lg-wrap align-items-lg-start">
                                                                                <div class="col-3 col-lg-12 re-thead px-0">運送方式
                                                                                </div>
                                                                                <div class="col-9 col-lg-12 re-tbody pl-3 px-lg-0">
                                                                                    <?= $pa['ship'] ?></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>

                                                            <!-- 按鈕 -->
                                                            <div class="col-12 col-lg-2 member-button fund-button d-flex flex-lg-column align-items-center px-0 justify-content-center">
                                                                <button>留言</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>


                                            <?php else : ?>
                                                <div class="empty-status px-3 px-lg-5">
                                                    <p>目前沒有過往的訂單</p>
                                                    <a href="all-product.php"><button class="starttogo">開始購物<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button></a>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                    </div>


                                </div>
                            </section>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>








<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>
<!-- 這裡開始寫jQuery或JS -->


<script>
    function scrollToTop() {
        $('html, body').animate({
            scrollTop: 0
        }, 300, 'swing');
    }

    // 桌機板-選單hover效果--------------------------------------------------------------------------------------
    if ($(window).width() >= 992) {

        $('.menu-item').on('mouseenter', function() {
            let itemleft = $(this).position().left
            $('.menu-active-line').css('left', itemleft).addClass('on')
            $('.menu-active-line2').addClass('out')
        })
        $('.member-item-grop').on('mouseleave', function() {
            // let startleft = $('.menu-active-line2').css('left')
            $('.menu-active-line').removeClass('on')
            $('.menu-active-line2').removeClass('out')
        })

        $('.menu-item').on('click', function() {
            let itemleft = $(this).position().left
            $('.menu-active-line2').css('left', itemleft)
        })


    }


    // 會員功能頁面切換---------------------------------------------------------------------------------------
    // 桌機板
    if ($(window).width() >= 992) {


        $('.menu-item').on('click', function() {
            $('.member-func-box').fadeOut(0)
            let content = $(this).attr('data-content')
            $(`.${content}`).fadeIn(150)

            let url = location.pathname + `?${content}`
            history.pushState({
                url: url,
                title: document.title
            }, document.title, url)

        })


        // 初始狀態
        if (window.location.search == '') {
            let url = location.pathname + `?memberData`
            history.pushState({
                url: url,
                title: document.title
            }, document.title, url)
        }
        let showContent = window.location.search.substr(1)
        $('.member-func-box').fadeOut(0)
        $(`.${showContent}`).fadeIn(150)
        let itemleft = $(`.${showContent+'-item'}`).position().left
        $('.menu-active-line2').css('left', itemleft)

    }

    // 手機版
    if ($(window).width() < 992) {

        $('.menu-item').on('click', function() {
            $('.member-menu').fadeOut(0)
            let content = $(this).attr('data-content')
            $(`.${content}`).fadeIn(150)

            // 樣式修改
            $('.helloname').nextAll().addClass('d-none')
            $('.user-pic').addClass('small')
            $('.backtomenu').addClass('on')
        })


        $('.backtomenu').on('click', function() {
            $('.member-menu').fadeIn(150)
            $('.member-func-box').fadeOut(0)

            // 樣式修改
            $('.helloname').nextAll().removeClass('d-none')
            $('.user-pic').removeClass('small')
            $('.backtomenu').removeClass('on')
        })


    }


    // 會員資料功能---- 編輯資料&重設密碼-----------------------------------------------------------------------
    $('.btn_edit-data').on('click', function() {
        $('.mydata').fadeOut(0)
        $('.mydata-edit').fadeIn(150)
        $('.mobile-title').text('修改會員資料')
        scrollToTop()
    })
    $('.btn_edit-cancel').on('click', function() {
        $('.mydata-edit').fadeOut(0)
        $('.mydata').fadeIn(150)
        $('.mobile-title').text('會員資料')
        scrollToTop()
    })
    $('.btn_reset-password').on('click', function() {
        $('.mydata').fadeOut(0)
        $('.password-reset').fadeIn(150)
        $('.mobile-title').text('重設我的密碼')
        scrollToTop()
    })
    $('.btn_password-cancel').on('click', function() {
        $('.password-reset').fadeOut(0)
        $('.mydata').fadeIn(150)
        $('.mobile-title').text('會員資料')
        scrollToTop()
    })

    


    //設定只能18歲
    let maxYear = new Date().getFullYear() - 18;
    let maxDate = new Date().getDate()
    let maxMonth = new Date().getMonth() + 1

    function setMonth(s) {
        return s < 10 ? '0' + s : s;
    }

    let maxAge = maxYear + '-' + setMonth(maxMonth) + '-' + maxDate;
    $('.birthday').attr('max', maxAge);

    //錯誤初始狀態
    $('.warn').css('display', 'none');

    //檢查修改資料
    function checkForm_edit() {

        let isPass = true;

        if (isPass)
            $.post(

                'Edit-data-api.php',

                $(document.Edit_data).serialize(),

                function(data) {


                    if (data.success) {

                        $('.pop-up-1').fadeIn(150);
                        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
                        $('.pop-up-1 .pop-up-text').text('修改成功');
                        $('button.ok').on('click', function() {
                            location.reload();

                        })

                    } else {

                        $('.pop-up-1').fadeIn(150);
                        $('.pop-up-1 .icon').html('<i class="fas fa-times"></i>').css('background-color', 'var(--red)')
                        $('.pop-up-1 .pop-up-text').text('資料不能相同');
                        $('button.ok').on('click', function() {

                            $('.pop-up-1').fadeOut(150);

                        })

                        // alert(data.error)

                    }


                }, 'json')

    }
    
        // 重設密碼
        function checkform_restPassword(){

        const $oldPassword = $('.oldPassword')
        const $resetPassword = $('.resetPassword');
        const $resetPassword_again = $('.resetPassword-again');
        let isPass = true;


        // 舊密碼和新密碼要不一樣
        if($oldPassword.val() == $resetPassword.val()){
            isPass = false;
            $oldPassword.css('border','3px solid var(--pink)');
            $oldPassword.next().css('display','block').children().text('密碼不可以相同');


            $resetPassword.css('border','3px solid var(--pink)');
            $resetPassword.next().css('display','block').children().text('密碼不可以相同');


        }

        //輸入不能為空
        if($resetPassword.val() == '' && $resetPassword_again.val() == ''){

            isPass = false;
            
            $resetPassword.css('border','3px solid var(--pink)');
            $resetPassword.next().css('display','block').children().text('輸入不可以為空');

            $resetPassword_again.css('border','3px solid var(--pink)');
            $resetPassword_again.next().css('display','block').children().text('輸入不可以為空');
            
            
        }

        //再次輸入密碼要跟新密碼一樣
        if($resetPassword.val() != $resetPassword_again.val() ){
            isPass = false;
            $resetPassword.css('border','3px solid var(--pink)');
            $resetPassword.next().css('display','block').children().text('新密碼不相同');

            $resetPassword_again.css('border','3px solid var(--pink)');
            $resetPassword_again.next().css('display','block').children().text('新密碼不相同');


        }



        if(isPass){
            $.post(
                
            'Rest-password-api.php',
            $(document.Resetpassword).serialize(),
            function(data){

                if (data.success) {

                    $('.pop-up-1').fadeIn(150);
                            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
                            $('.pop-up-1 .pop-up-text').text('修改密碼成功');
                            $('button.ok').on('click', function() {
                                location.reload();

                            })

                }else {
                    

                    $oldPassword.css('border','3px solid var(--pink)');
                    $oldPassword.next().css('display','block').children().text('密碼輸入錯誤')
               
                }

            }, 'json'


            )
        }

        }





    // 手風琴-------------------------------------------------------------------------------------------------

    $('.memberAccordion').on('click', function() {

        let divheight = $(this).next().height()

        if (divheight > 0) {
            $(this).next().attr('data-height', divheight)
            $(this).next().css('height', 0).addClass('no')
            $(this).children('i').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down')

        } else {
            let showheight = $(this).next().attr('data-height')
            $(this).next().css('height', showheight).removeClass('no')
            $(this).children('i').removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up')
        }


    })


    $('.detail-header').on('click', function() {
        let divheight = $(this).next().height()
        if (divheight > 0) {
            $(this).next().attr('data-height', divheight)
            $(this).next().css('height', 0)
            $(this).children('i').removeClass('fa-caret-up').addClass('fa-caret-down')

        } else {
            let showheight = $(this).next().attr('data-height')
            $(this).next().css('height', showheight).removeClass('no')
            $(this).children('i').removeClass('fa-caret-down').addClass('fa-caret-up')
        }
    })



    // 折價券開啟/關閉-----------------------------------------------------------------------------------------------
    $('button.checkmydiscount').on('click', function() {
        $('.discount-popup').fadeIn(150)
    })

    $('button.discount_ok').on('click', function() {
        $('.discount-popup').fadeOut(100)
    })



    // 評論---------------------------------------------------------------------------------------------------------

    // 刪除placeholder
    $(".commenttextarea").on('click', function() {
        if ($(this).val() == '請寫下對這支酒的感想!') {
            $(this).val('')
        }
    })

    // 送出

    function commentProduct(myaction) {
        let isPass = true
        let action = myaction
        let com_btn = $(event.currentTarget)
        let csid = com_btn.closest('.comment-box').attr('data-sid') != undefined ? com_btn.closest('.comment-box').attr('data-sid') : 0;
        let psid = com_btn.closest('.comment-box').attr('data-pro')
        let score = com_btn.closest('.member-button').prevAll('.com-score').find('select.myscore').val()
        let comment = com_btn.closest('.member-button').prevAll('.com-txt').find('textarea.commenttextarea').val()

        // console.log(action,psid,score,comment)

        if (isPass) {
            $.post(
                'member-comment-api.php', {
                    action,
                    csid,
                    psid,
                    score,
                    comment
                },
                function(data) {
                    console.log(data)
                    // com_btn.closest('.comment-box').remove()
                    $('.pop-up-1').fadeIn(150)
                    $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
                    $('.pop-up-1 .pop-up-text').text(data.msg)

                    $('button.ok').on('click', function() {
                        $('.general-pop-up').fadeOut(150)
                        location.href = 'member.php?memberComment'
                    })
                },
                'json'
            )
        }
    }

    // 編輯評論
    function editComment() {
        let edit_btn = $(event.currentTarget)
        let thisScore = edit_btn.closest('.member-button').prevAll('.com-score').find('.beer-score').attr('data-score')
        let thisComment = edit_btn.closest('.member-button').prevAll('.com-txt').find('.mycommenttxt').text()
        // 分數
        edit_btn.closest('.member-button').prevAll('.com-score').find('.beer-score').addClass('d-none')
        edit_btn.closest('.member-button').prevAll('.com-score').find('.myscore-edit').removeClass('d-none')
        edit_btn.closest('.member-button').prevAll('.com-score').find('.myscore-edit').val(thisScore)
        // 評論
        edit_btn.closest('.member-button').prevAll('.com-txt').find('.mycommenttxt').addClass('d-none')
        edit_btn.closest('.member-button').prevAll('.com-txt').find('.commenttextarea-edit').removeClass('d-none')
        edit_btn.closest('.member-button').prevAll('.com-txt').find('.commenttextarea-edit').val(thisComment)
        // 按鈕
        edit_btn.next().removeClass('d-none')
        edit_btn.addClass('d-none')
    }
    // 取消編輯評論
    function canceleditComment() {
        let cancel_btn = $(event.currentTarget)
        // 分數
        cancel_btn.closest('.member-button').prevAll('.com-score').find('.beer-score').removeClass('d-none')
        cancel_btn.closest('.member-button').prevAll('.com-score').find('.myscore-edit').addClass('d-none')
        // 評論
        cancel_btn.closest('.member-button').prevAll('.com-txt').find('.mycommenttxt').removeClass('d-none')
        cancel_btn.closest('.member-button').prevAll('.com-txt').find('.commenttextarea-edit').addClass('d-none')
        // 按鈕
        cancel_btn.closest('.edit-buttons-wrap').prev().removeClass('d-none')
        cancel_btn.closest('.edit-buttons-wrap').addClass('d-none')
    }


    // 收藏---------------------------------------------------------------------------------------------------------------------

    // 設定一個產品介紹的字樣
    let product_arrang = $('.member .product-arrang')
    let sortandsearch = $('.member .SortAndSearch-wrap')
    let beerProduct = document.getElementsByClassName('beer-product')
    let order = 1;
    let userSearch = '';

    const collectProductTpl = p => {
        return `
        <div class="col-12 col-lg-6 col-xl-4 beer-product-wrap">
                            <div class="beer-product" data-sid=${p.product_sid} data-price=${p.price} data-abv=${p.abv}>
                                <div class="pro-pic">
                                    <!-- 商品圖 -->
                                    <a href="each-product.php?psid=${p.product_sid}">
                                        <img class="beer-pic" src="../images/products/${p.pic}" alt="">
                                    </a>
                                    <!-- 標籤 -->
                                    <div class="label ${p.product_sid}-label">
                                    </div>

                                    <!-- 國家圖片 -->
                                    <div class="country"><img src="../images/country/${p.country_pic}" alt=""></div>

                                    <!-- 收藏按鈕 -->
                                    <div class="collect">
                                        <button class="btn_collect_active"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>

                                <!-- 商品介紹 -->
                                <div class="pro-intro d-flex flex-column justify-content-between">
                                    <!-- 商品名稱 -->
                                    <a href="each-product.php?psid=${p.product_sid}">
                                        <div class="p-name">
                                            <p class="p-name-c">${p.c_name}</p>
                                            <p class="p-name-e">${p.e_name}</p>
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
                                            <p class="price" >$${p.price}</p>
                                        </div>
                                        <!-- 加入購物車按鈕 -->
                                        <button class="col-7 add-cart"><i class="fas fa-shopping-bag"></i>加入購物車</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        `
    }
    const noCollectTpl = p => {
        return `
        <div class="empty-status px-3 px-lg-5">
          <p>目前沒有收藏的商品</p>
          <a href="all-product.php"><button class="starttogo">開始收藏<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button></a>
        </div>
        `
    }

    //  傳送AJAX取得收藏商品清單
    function getCollectProductData() {
        $.get('member-collect-api.php',{order,userSearch}, function(data) {
            // console.log(data)
            p_data = data //把資料拉到全域變數
            renderallProducts()
        }, 'json')
    }

    // 一進到畫面就執行
    getCollectProductData()

    // 產生產品畫面
    function renderallProducts() {
        product_arrang.html('')
        if (p_data.collect.length == 0) {
            product_arrang.append(noCollectTpl())
            sortandsearch.addClass('d-none')

        } else {
            p_data.collect.forEach(el => {
                product_arrang.append(collectProductTpl(el))
                sortandsearch.removeClass('d-none')
                let ishot = el.hot //抓熱門的值
                let created_at = Date.parse(el.created_at).valueOf() //抓建立時間
                let deadline = Date.parse('2021-05-01').valueOf() //設定要有new標籤的時間點
                let product_label = $(`.${el.product_sid}-label`)

                const alllabelTpl = function() {

                    // 有hot沒有new
                    if (ishot == 'true' && created_at >= deadline == false) {
                        return `
                        <div class="hot-label">
                            <p>HOT</p>
                        </div>
                        `
                    }

                    // 有new沒有hot
                    if (created_at >= deadline && ishot == 'false') {
                        return `
                        <div class="new-label">
                            <p>NEW</p>
                        </div>
                        `
                    }

                    // 兩者都有
                    if (ishot == 'true' && created_at >= deadline) {
                        return `
                        <div class="new-label">
                            <p>NEW</p>
                        </div>
                        <div class="hot-label">
                            <p>HOT</p>
                        </div>
                        `
                    }

                }
                product_label.append(alllabelTpl())

            })
        }
    }


    // 取消收藏
    product_arrang.on('click', '.btn_collect_active', function() {
        let psid = $(this).closest('.beer-product').attr('data-sid')
        $.get('member-collect-api.php', {
            'action': 'delete',
            'psid': psid
        }, function(data) {
            // console.log(data)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')

        $(this).closest('.beer-product-wrap').remove()

        if( beerProduct.length == 0){
            product_arrang.append(noCollectTpl())
            sortandsearch.addClass('d-none')
        }

    })

    // 排序--------------------------------------
    function changeSort() {

        order = $('#sort-option').val()
        getCollectProductData()

    }

    // 查詢--------------------------------------
    $('#search3').on('keypress', function(event) {
        let pressBtn = event.keyCode
        if (pressBtn == 13 && $(this).val() != "" ) {
            userSearch = $(this).val()
            order = 1
            getCollectProductData()
        }

    })


    // ----------------------------------------------------------
    // 加入購物車功能

    // 手寫數量
    product_arrang.on('input', '.buy-number', function() {
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
    product_arrang.on('click', '.plus', function() {
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
    product_arrang.on('click', '.minus', function() {
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
    product_arrang.on('click', '.add-cart', function() {
        let qty = $(this).closest('.p-buy').find('.buy-number').val()
        let psid = $(this).closest('.beer-product').attr('data-sid')

        $.get('cart-api.php', {
            'action': 'add',
            'psid': psid,
            'qty': qty
        }, function(data) {
            // console.log(data)
            showCartCount(data.cart)
            $('.pop-up-1').fadeIn(150)
            $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color', 'var(--gold)')
            $('.pop-up-1 .pop-up-text').text(data.msg)
        }, 'json')

    })

    // -------------------------------------------------------------
    // 彈跳視窗
    $('button.ok').on('click', function() {
        $('.general-pop-up').fadeOut(150)
    })
</script>



<?php include __DIR__ . '../../php/common/html-end.php' ?>
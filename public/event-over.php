<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:品飲會:花絮回顧';
$sid=isset($_GET['sid']) ? intval($_GET['sid']) :1 ;
$pdo->query("UPDATE `event` SET `event_visited`=`event_visited`+1 WHERE `sid` = 1");

$e_SQL = "SELECT * FROM `event` WHERE sid=$sid";
$e = $pdo->query($e_SQL)->fetch();


// 如果sid＝0,跳轉回去event.php
if($sid== 0){ 
    // header('Location: http://192.168.21.56/beeru/public/event-over.php');
    // exit;
}
?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
    <!-- my-style -->
    <link rel="stylesheet" href="../css/event/title.css">
    <link rel="stylesheet" href="../css/event/event.css">
    <link rel="stylesheet" href="../css/event/event-join.css">
    <link rel="stylesheet" href="../css/event/event-over.css">
    <link rel="stylesheet" href="../css/tool.css">

    <?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>

    <!-- 可變動區 -->
    <!-- event品飲會:花絮回顧 -->
    <section class="event join">
        <!-- 2.banner -->
        <div class="container event-banner pd0">
            <!-- 2.1關注按鈕+分享 -->
            <div class="row justify-content-end justify-content-md-end align-items-end
            flex-nowrap">
                <!-- 2.2.1.關注 -->
                <!-- <button class="btn_attention px-3 py-1"><i class="fas fa-plus"></i>加入關注</button> -->
                <!-- 2.2.2.分享 -->
                <div class="share-icons d-flex ">
                    <div class="fb">
                        <!-- Generator: Adobe Illustrator 25.2.1, SVG Export Plug-In  -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" width="24.1px" height="24px" viewBox="0 0 24.1 24"
                            style="overflow:visible;enable-background:new 0 0 24.1 24;" xml:space="preserve">
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

                                        <linearGradient id="Path_1940_2_" gradientUnits="userSpaceOnUse" x1="8239.6846"
                                            y1="6726.8647" x2="8239.6846" y2="6727.8647"
                                            gradientTransform="matrix(23.9999 0 0 -23.9994 -196721.125 162601.9062)">
                                            <stop offset="0" style="stop-color:#FFD76C" />
                                            <stop offset="1" style="stop-color:#C9984B" />
                                        </linearGradient>
                                        <path id="Path_1940_1_" class="st1"
                                            d="M1030.7,1161.3c-6.6-0.1-11.9-5.5-11.8-12.2c0.1-6.6,5.5-11.9,12.2-11.8
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
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" width="23.1px" height="22px" viewBox="0 0 23.1 22"
                            style="overflow:visible;enable-background:new 0 0 23.1 22;" xml:space="preserve">
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

                                        <linearGradient id="Path_1976_2_" gradientUnits="userSpaceOnUse" x1="8164.439"
                                            y1="6810.9761" x2="8164.439" y2="6811.9761"
                                            gradientTransform="matrix(23.076 0 0 -21.9908 -187403.4531 151004.6406)">
                                            <stop offset="0" style="stop-color:#F5D778" />
                                            <stop offset="1" style="stop-color:#C9984B" />
                                        </linearGradient>
                                        <path id="Path_1976_1_" class="st1"
                                            d="M1010.6,1212.9c0-5.2-5.2-9.4-11.5-9.4s-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2
                                        c1.4,0.3,1.2,0.8,0.9,2.6c0,0.3-0.2,1.1,1,0.6c3.3-1.8,6.4-4,9.1-6.7C1009.7,1217.1,1010.5,1215.1,1010.6,1212.9z" />
                                    </g>
                                    <path id="Path_1977_1_" class="st2"
                                        d="M996.7,1210.4h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0.1,0.2,0.2,0.2
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
                                        <path id="Path_1978_1_" class="st3"
                                            d="M968.7,1204.5c5.8,0,10.5,3.8,10.5,8.4c0,1.9-0.8,3.8-2.2,5.1c-2.4,2.4-5.2,4.5-8.2,6.2
                                        c0.2-1.4,0.2-2.6-1.8-3l0,0l0,0c-5.1-0.7-8.8-4.1-8.8-8.2C958.1,1208.3,962.8,1204.5,968.7,1204.5 M968.7,1203.5
                                        c-6.4,0-11.5,4.2-11.5,9.4c0,4.6,4.1,8.5,9.6,9.2c1.4,0.3,1.2,0.8,0.9,2.6c0,0.2-0.2,0.8,0.4,0.8c0.2,0,0.4-0.1,0.6-0.2
                                        c3.3-1.8,6.4-4,9.1-6.7c1.5-1.5,2.4-3.6,2.5-5.8C980.2,1207.7,975,1203.5,968.7,1203.5L968.7,1203.5z" />
                                    </g>
                                    <g id="Group_194_1_">
                                        <path id="Path_1979_1_" class="st3"
                                            d="M966.3,1210.4h-0.8c-0.1,0-0.2,0.1-0.2,0.2c0,0,0,0,0,0v5c0,0.1,0.1,0.2,0.2,0.2
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
        </div>
        <!-- 3.content -->
        <div class="container event-content px-5">
            <!-- 3.1.title -->
            <div class='name'>
                <p>酒花國度的美式精釀啤酒</p>
                <hr>
            </div>
            <!-- 3.2.時間+地點 + 名額+價格 -->
            <div class='row mx-0 align-items-stretch'>
                <!--時間+地點-->
                <div class="timelocation col-md-6">
                    <div class="time">
                        <div class="d-flex align-items-center">
                            <p class='t1-i'><i class="far fa-clock"></i>活動時間</p>
                            <!-- <div class='btn_join over calender'><a href=""><i class="fas fa-calendar-plus"></i>加入行事曆</a>
                            </div> -->
                        </div>
                        <p class='t1-c'>2021-05-09(日) 16:00 ~ 19:00</p>
                    </div>
                    <div class="location">
                        <p class='t1-i'><i class="fas fa-map-marker-alt"></i>活動地點</p>
                        <p class='t1-c'>悄悄話 chinese whispers
                            <br> <span>106台北市大安區仁愛路四段345巷2弄11號</span>
                        </p>
                    </div>
                </div>
                <!-- 名額+價格 -->
                <div
                    class="row mx-5 mx-md-0 px-2 quotaprice col-md-6 justify-content-center flex-sm-nowrap flex-md-wrap">
                    <!-- <div class="col-sm-6 col-md-12 block quota">剩餘名額：0/20</div> -->
                    <div class="col-sm-6 col-md-12 block price">價格：NT$200</div>
                </div>
            </div>

        </div>
        <!-- 4.overview -->
        <div class="row mx-0 px-5 ">
            <div class="overview">
            “ 美國啤酒為市場上最主流的啤酒之一，美式精釀常兼具著復古、大膽與創新，以當地的啤酒花或麥芽得到新的詮釋和演繹，本次活動會以美國歷史作為開端走進花花世界的美國精釀啤酒。”
            </div>
        </div>
        <!-- 5.活動介紹 -->
        <div class="container event-intro px-0">
            <div class="row mx-auto">
                <div class="title">
                    <p>活動介紹</p>
                </div>
            </div>
            <!-- 3.4.1-特別精選+文字 -->
            <div class="row px-md-5 justify-content-around mx-0 mx-5">
                <!-- 3.4.1.1.特別精選 -->
                <div class="serve col-md-6 mb-4 mb-md-0   animatable fadeInUp">
                    <p class='t1 text-center'>特別精選</p>
                    <div class="row mx-0">
                        <div class="product col-6">
                            <div class="product-img"> <img class="" src="../images/products/MT-Themisto.png" alt="">
                            </div>
                            <div class="product-name">摩登時代．水澤神女IPA<br></div>
                            <div class='know-more'>
                                <a href="/beeru/public/each-product.php?psid=203">進入購物車</a>
                            </div>
                        </div>
                        <div class="product col-6">
                            <div class="product-img"> <img src="../images/products/LC-Vanilla Latte Chocolate Milk Stout.png" alt="">
                            </div>
                            <div class="product-name">迷情海岸．香草拿鐵巧克力牛奶司陶特</div>
                            <div class='know-more'>
                                <a href="/beeru/public/each-product.php?psid=153">進入購物車</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3.4.1.2.說明 -->
                <div class="intro-content col-md-5 pt-0 px-0 pr-md-0   animatable fadeInUp">
                每個客人來到美式餐酒館，都會問有美國啤酒嗎？<br>是的！這次就帶領大家，尋找，美國土生土長的美式精釀啤酒！<br>一切都要從禁酒令開始說起，1919年至1933年長達13年的時間， 全美國禁止販賣運輸生產，從事任何啤酒相關的業務，對當時的釀酒業來說，可說是遭受相當大的打擊。解禁後，現在大眾所熟悉的啤酒品牌如雨後春筍般茁壯，至今美國已經有超過6,000家酒廠登記設立。接著就讓我們細說更多元的美式精釀啤酒，品嘗酒花國度的美式風味吧！本次活動特別推薦：摩登時代．水澤神女IPA、迷情海岸．香草拿鐵巧克力牛奶司陶特。
                </div>
            </div>
        </div>
        <!-- 6.活動地點 -->

        <div class="event_review">
            <!-- 標題：花絮回顧 -->
            <div class="container event-join-sign">
                <div class="row mx-0 px-5">
                    <div class="title">
                        <p>花絮回顧</p>
                    </div>
                </div>
                <div class="row mx-0 px-0">

                </div>  
                <div class="row mx-0 px-0">
                    <div class="mx-0 col-md-8 mb-5 mb-md-0">
                        <div class="photo1  animatable fadeInUp"><img src="../images/event/event_1_1.jpg" alt="">
                            <p class='lh15 pt-2 pb-5'>➺精釀啤酒們列隊歡迎品飲者的到來</p>
                        </div>
                        <div class="row mx-aut">
                            <div class="col-md-6 mb-5 mb-md-0 pl-0 pr-0 pr-md-4 photo2   animatable fadeInUp"><img src="../images/event/event_1_2.jpg" alt="">
                                <p class='lh15 pt-2'>➺The Bruery布魯里有自己的特殊酒杯</p>
                            </div>
                            <div class="col-md-6 pl-0 pl-md-4 pr-0 photo3   animatable fadeInUp"><img src="../images/event/event_1_3.jpg" alt="">
                                <p class='lh15 pt-2'>➺迷人的琥珀色澤，厚實飽滿的泡沫</p>
                            </div>
                        </div>
                    </div>
                    <div class="mx-0 col-md-4">
                        <div class="photo4  animatable fadeInUp"><img src="../images/event/event_1_4.jpg" alt="">
                            <p class='lh15 pt-2 pb-5'>➺LOST COAST迷情海岸創始人Barbara Groom芭芭拉</p>
                        </div>
                        <div class="photo5  animatable fadeInUp"><img src="../images/event/event_1_5.jpg" alt="">
                            <p class='lh15 pt-2 pb-5 text-justify'>➺LOST COAST迷情海岸的酒標有種怪誕的畫風，極具特色。</p>
                        </div>
                        <!-- <div class="photo"><img src="../images/event/event-over-photo.jpg" alt="">
                            <p class='lh15 pt-2 pb-5'>說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字</p>
                        </div> -->
                        
                    </div>
                </div>
            </div>
            <!-- 按鈕 -->
            <div class="col all-button flex-nowrap px-0">
                <!-- 返回上頁 -->
                <a href="../public/event.php"><button class='btn_join return d-block mx-auto w-75 col-md-5'> 返回上頁</button></a>
            </div>
        </div>
    </section>

<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>

  <!-- my script -->
  <script src='../js/event/event_anime_scroll.js'></script>



<?php include __DIR__ . '../../php/common/html-end.php' ?>
<?php include __DIR__ . '../../php/common/config.php'
?>

<!-- 需要置換的變數們 -->
<?php
$page_title = '啤女BeerU:品飲會';

$e_SQL = "SELECT * FROM `event` ORDER BY `sid` DESC";
$e_rows = $pdo->query($e_SQL)->fetchAll();

// 抓資料庫裡的關注清單
// 關注列
$a_arr = [];

// 設定登入會員後
if (isset($_SESSION['user'])) {
    // 設定已登入會員sid
    $m_sid = $_SESSION['user']['sid'];
    // $e_sid = isset($_GET['event_sid']) ? intval($_GET['event_sid']) : 0;
    // 選擇attention抓event_sid，綁定有會員sid
    $a_SQL = "SELECT `event_sid` FROM `attention` WHERE `member_sid` = $m_sid";
    // 抓取建立a_row
    $a_row = $pdo->query($a_SQL)->fetchAll();
    // 如果有關注
    if (!empty($a_row)) {
        foreach ($a_row as $a) {
            // 抓出來
            array_push($a_arr, $a['event_sid']);
        }
    }
}
?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- my-style -->
<link rel="stylesheet" href="../css/event/title.css">
<link rel="stylesheet" href="../css/event/event.css">
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
<!-- event品飲會 -->
<section class="event">
    <!-- return to top -->
    <a href="javascript:" id="return-to-top"><img src="../images/common/top.svg" alt=""></a>
    <!-- 1. title -->
    <div class="col-12 member-title mt-5 ">
        <p>品飲會</p>
    </div>

    <!-- 2.banner -->
    <div class="container-fluid event-banner">
        <!-- 2.1.底圖 -->
        <img class='banner_bg' src="../images/event/SVG/event-banner-bgc.svg" alt="">
        <!-- 2.2.標題+動畫 -->
        <div class="row justify-content-center align-items-center">
            <!-- 2.2.1.大標 -->
            <div class="col-10 col-lg-3 order-2 order-lg-1">
            <p class=''>給我</p>
            <p  class='typewrite mt-0' data-period="2000" data-type='["一杯酒的時間"]'>
                <span class="wrap"></span>
            </p>
            </div>
            <!-- 2.2.2.動畫 -->
            <div class='col-12 col-lg-3 order-1 order-lg-2'>
                <img class='beer_mug d-none' src="../images/event/SVG/beer_mug_0.svg" alt="">

                <img class='beer_mug_b' src="../images/event/SVG/beer_mug_b.svg" alt="">

                <div class="pipi_beer_group">
                    <img class='pipi_beer d-none' src="../images/event/SVG/pipi_beer.svg" alt="">
                    <img class='pipi_beer_b' src="../images/event/SVG/pipi_beer_b.svg" alt="">
                </div>
            </div>
        </div>

    </div>

    <!-- 3.content -->
    <div class="container event-content">
        <!-- 3.1.title -->
        <div class="row mx-0 px-0">
            <div class='title'>
                <p>精選活動</p>
            </div>
        </div>

        <!-- 3.2.event-card -->
        <!-- 立即報名 -->
        <?php foreach ($e_rows as $e) :
            //1.設定期限exp=[設定日期]<[現在日期]---->顯示已結束，剩餘名額消失
            $exp = strtotime($e['event_date']) < time();

            // 2.取報名人數
// 2.1-設參數
            $esid = $e['sid'];
// 2.2-選擇total_p這欄，從event_join表
            $people_SQL = "SELECT `total_p` FROM `event_join` WHERE `event_sid`= $esid";
// 2.3-抓出
            $people_row = $pdo->query($people_SQL)->fetchAll(PDO::FETCH_NUM);

            // 預設總報名人數為0
            $totalp = 0;
            // 如果people row不等於0
            if (!empty($people_row)) {
// 2.4-跑回圈-total p
                foreach ($people_row as $p) {
                    $totalp += $p[0];
                };
            };
// 2.5-剩餘人數=報名總額-目前報名的人
            $left_people = $e['event_people'] - $totalp;

            //3.設定人數小於5--->要變成紅色
            $remain =  $left_people < 5;
        ?>
            <div class="row justify-content-between align-items-center event-card animatable fadeInUp">
                <!-- 3.2.1.banner -->
                <div class='card-banner col-12 col-lg-4 px-0'><img src=" ../images/event/<?= $e['event_pic_s'] ?>" alt=""></div>
                <!-- 3.2.2.content -->
                <div class="col-12 col-lg-6 card-content pr-5">
                    <!-- 3.2.2.1.時間+地區 -->
                    <div class="row justify-content-between">
                        <li class='time'><i class="far fa-clock"></i><?= $e['event_time'] ?></li>
                        <li class='location'><i class="fas fa-map-marker-alt"></i><?= $e['event_zone'] ?></li>
                    </div>
                    <!-- 3.2.2.2.標題+簡介 -->
                    <div class='intro ml-4'>
                        <p><?= $e['event_title'] ?></p>
                        <p><?= $e['event_overview'] ?></p>
                    </div>
                    <!--3.2.2.3.剩餘名額+瀏覽人次 -->
                    <div class="row justify-content-between align-items-end">
                        <?php if (!$exp) : ?>
                            <?php if (!$remain) : ?>
                                <li class='quota blue'>
                                    剩餘名額：<?= $left_people ?>
                                    /<?= $e['event_people'] ?></li>
                            <?php else : ?>
                                <li class='quota red'>
                                    剩餘名額：<?= $left_people ?>
                                    /<?= $e['event_people'] ?></li>
                            <?php endif ?>
                        <?php else : ?>
                            <li class='quota blue invisible'>剩餘名額：<?= $e['event_join'] ?>/<?= $e['event_people'] ?></li>
                        <?php endif ?>
                        <li class='review'><i class="far fa-eye"></i>
                            <?= $e['event_visited'] ?></li>
                    </div>
                    <!-- 3.2.2.4.加入關注+立即報名 -->
                    <div class="row justify-content-between">
                        <!-- 如果活動時間還沒到：期限exp > 現在日期 -->
                        <?php if (!$exp) : ?>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <button class="btn_attention btn_attention_nologin col-5 " onclick="LogIn_btn()"><i class="fas fa-plus"></i>加入關注</button>
                            <?php else : ?>
                                <?php if (in_array($e['sid'], $a_arr)) : ?>
                                    <!-- 沒有關注的時候顯示 加入關注 -->
                                    <button class="btn_attention btn_attention_be col-5 d-none">
                                        <i class="fas fa-plus"></i>加入關注
                                    </button>
                                    <!-- 會員有關注的話 顯示已關注 -->
                                    <button class="btn_attention_active col-5">
                                        <i class="fas fa-check"></i>已關注
                                    </button>
                                <?php else : ?>
                                    <!-- 一開始顯示加入關注 -->
                                    <button class="btn_attention btn_attention_be col-5">
                                        <i class="fas fa-plus"></i>加入關注
                                    </button>
                                    <button class="btn_attention_active col-5 d-none">
                                        <i class="fas fa-check"></i>已關注
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a data-cate="<?= $e['sid'] ?>" href="../public/event-join.php?sid=<?= $e['sid'] ?>" class='col-6'>
                                <div class='btn_join'>立即報名</div>
                            </a>
                        <?php else : ?>
                            <li class='quota aaa col-6 px-0'>已結束</li>
                            <a href="../public/event-over.php" class='col-6'>
                                <div class='btn_join over'>花絮回顧</div>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <!-- 3.2.3.card-deco phone-->
                <div class='card-deco-phone col-12 col-lg-1'>
                    <div class='deco-line'>
                    </div>
                    <div class='cut'>
                        <div class='circle'></div>
                    </div>
                </div>
                <!-- 3.2.3.card-deco pc-->
                <div class='card-deco-pc col-12 col-lg-1'>
                    <!-- 3.2.3.1.line -->
                    <div class='deco-line'>
                    </div>
                    <!-- 3.2.3.2.cut -->
                    <div class='cut'>
                        <div class='circle'></div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</section>

<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>

<!-- my script -->
<script src='../js/event/event_anime_banner.js'></script>
<script src='../js/event/event_anime_scroll.js'></script>
<script src='../js/event/event_anime_text.js'></script>
<script src='../js/event/event_scroll_to_top.js'></script>
<script src='../js/event/event.js'></script>
<script src='../js/event/event_attention.js'></script>



<?php include __DIR__ . '../../php/common/html-end.php' ?>
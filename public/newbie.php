<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:新手入門';

?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- my-style -->
<link rel="stylesheet" href="../css/newbie/newbie-style-1.css">

<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>

<section class="newbie-wrap">
    <div class="container-fluid">
        <div class="row newbie-intro">
            <div class="col-md-6 col-sm-4 left-crystal-bg">
                <div class="crystal-wrap animate__animated animate__pulse">
                    <img class="crystal" src="../images/glori_images/crystal.png">
                    <div class="inside-beer"></div>
                    <div class="inside-heads"></div>
                </div>
                <div class="pipi"></div>
            </div>
            <div class="col-md-6 col-sm-4 right-info">
                <div class="newbie-title animatable fadeInUp mt-5 ">
                    <p>新手入門</p>
                </div>
                <p class="newbie-intro-txt animatable fadeInUp">雖然全球的啤酒消費量驚人，卻很少人真正了解它。就讓我們一起探索麥芽的秘密、啤酒花的特性以及發酵的奧妙。
                    如果不知道從何開始，可以先從我們客製化的心理測驗來尋找最適合你的精釀啤酒。</p>
                <div class="caption-txts">
                    <p class="caption animatable fadeInUp">尋找自己適合的精釀啤酒，
                    </p>
                    <p class="caption animatable fadeInUp">
                        可以從妳是哪一種啤女開始 ～</p>
                </div>
                <div class="enter-btn">
                    <a href="quiz.php">
                        <div class="know-more mb-5">開始測驗</div>
                    </a>
                </div>
                <div class="caption-txt">
                    <p class="caption animatable fadeInUp">想探索精釀啤酒，
                    </p>
                    <p class="caption animatable fadeInUp">
                        可以從啤酒百科開始 ～</p>
                </div>
                <div class="enter-btn" id="scroll">
                    <a class="scroll" href="#knowledge-wrap">
                        <div class="know-more">了解更多</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="knowledge-wrap" id="knowledge-wrap">
    <!-- return to top -->
    <a href="javascript:" id="return-to-top"><img src="../images/common/top.svg" alt=""></a>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-4 knowledge-intro-wrap">
                <div class="knowledge-title mt-5 animatable fadeInUp">
                    <p>啤酒百科</p>
                </div>
                <p class="knowledge-intro txt-1 animatable fadeInUp">精釀啤酒(Craft Beer)最早出現在1970年代，當時英美兩國不約而同出現了不少小型釀酒廠 (Microbrewery)
                    與家庭式釀酒廠(Homebrewing)，相較於產量多、規模大的大眾啤酒品牌，這些超級小廠 (有些規模甚至小到就藏在自家車庫) 會依照各自喜好，釀出味道、香氣與材料都別有風格的手工啤酒。
                </p>
                <p class="knowledge-intro txt-2 animatable fadeInUp">啤酒的種類啤酒可用發酵法粗分為「Ale」跟「Lager」兩種類型：
                    頂層發酵的統稱為「艾爾Ale」，發酵溫度為18-23°，發酵時間較短，可於兩到三天完成。艾爾啤酒的酵母在發酵時會產生豐富的酯質，使酒體帶有特殊的水果香氣，口感通常比拉格啤酒更加濃郁，為傳統釀造方法。
                    低層發酵的則稱為「拉格Lager」，源自於德語的Lagern（窖藏之意），又稱窖藏啤酒，是一種利用低溫熟成技術製作的啤酒，發酵溫度為9-12°，酵母會沈澱在桶底發酵，酒體清澈，顏色也多為淡色。優點為酒體穩定、不易變質，而商業啤酒多採用這種發酵方式釀造。
                </p>
            </div>
            <div class="col-md-6 col-sm-4 hop-bg">
                <div class="pipi-bubble animatable fadeInUp">
                    <img src="../images/glori_images/pipi-bubble.svg" alt="">
                </div>
                <div class="about-beer animatable bounceIn">
                    <img src="../images/glori_images/about-beer.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="four-ingre-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 ingre-title-wrap">
                <div class="ingredient-title mt-5 animatable fadeInUp">
                    <p>啤酒原料</p>
                </div>
                <p class="ingredient-intro">精釀啤酒主原料僅4種，天然添加物呈現風味多樣化</p>
            </div>
            <div class="row four-ingre-row mt-5">
                <div class="col-md ingredient-wrap animatable fadeInUp">
                    <div class="ingredient-title-sm animatable bounceIn">
                        <p class="ingre-ch">麥芽</p>
                        <p class="ingre-en">Malt</p>
                    </div>
                    <p class="ingre-txt">決定了酒的顏色、香味、酒體、口感、尾韻，徹底影響一瓶啤酒的樣貌。</p>
                </div>
                <div class="col-md ingredient-wrap animatable fadeInUp">
                    <div class="ingredient-title-sm animatable bounceIn">
                        <p class="ingre-ch">啤酒花</p>
                        <p class="ingre-en">Hop</p>
                    </div>
                    <p class="ingre-txt">提供苦味，增添香味，壓抑細菌來維持酵母活性。</p>
                </div>
                <div class="col-md ingredient-wrap animatable fadeInUp">
                    <div class="ingredient-title-sm animatable bounceIn">
                        <p class="ingre-ch">酵母</p>
                        <p class="ingre-en">Yeast</p>
                    </div>
                    <p class="ingre-txt">分為拉格酵母、愛爾酵母和野生酵母3大類，發酵溫度不同，所造成的風味各異</p>
                </div>
                <div class="col-md ingredient-wrap animatable fadeInUp">
                    <div class="ingredient-title-sm animatable bounceIn">
                        <p class="ingre-ch">水</p>
                        <p class="ingre-en">Water</p>
                    </div>
                    <p class="ingre-txt">水的硬度，即水中的礦物質含量會影響啤酒的口味、色澤</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="brew-steps-wrap mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 brew-title-wrap mt-5">
                <div class="brew-title mt-5 animatable fadeInUp">
                    <p>釀啤酒步驟</p>
                </div>
                <p class="brew-intro">不管是釀製二十公升或兩千公升的啤酒，方法永遠只有一種。</p>
            </div>
            <div class="row each-step-wrap mt-5">
                <div class="col-md each-step">
                    <p class="step-title">1.麥芽</p>
                    <img class="step1 animatable fadeInUp" src="../images/glori_images/1-malt.svg">
                </div>
                <div class="col-md each-step">
                    <p class="step-title">2.糊化</p>
                    <img class="step2 animatable fadeInUp" src="../images/glori_images/2-milling.svg">
                </div>
                <div class="col-md each-step">
                    <p class="step-title">3.啤酒花</p>
                    <img class="step3 animatable fadeInUp" src="../images/glori_images/3-hop.svg">
                </div>
                <div class="col-md each-step">
                    <p class="step-title">4.煮沸</p>
                    <img class="step4 animatable fadeInUp" src="../images/glori_images/4-boil.svg">
                </div>
                <div class="col-md each-step">
                    <p class="step-title">5.冷卻</p>
                    <img class="step5 animatable fadeInUp" src="../images/glori_images/5-cooling.svg">
                </div>
            </div>
            <div class="row each-step-wrap mt-5">
                <div class="col-md each-step2">
                    <p class="step-title">6.酵母</p>
                    <img class="step1 animatable fadeInUp" src="../images/glori_images/6-yeast.svg">
                </div>
                <div class="col-md each-step2">
                    <p class="step-title">7.發酵</p>
                    <img class="step2 animatable fadeInUp" src="../images/glori_images/7-fermentation.svg">
                </div>
                <div class="col-md each-step2">
                    <p class="step-title">8.過濾</p>
                    <img class="step3 animatable fadeInUp" src="../images/glori_images/8-filtration.svg">
                </div>
                <div class="col-md each-step2">
                    <p class="step-title">9.倒入</p>
                    <img class="step4 animatable fadeInUp" src="../images/glori_images/9-pouring.svg">
                </div>
                <div class="col-md each-step2">
                    <p class="step-title">10.分裝</p>
                    <img class="step5 animatable fadeInUp" src="../images/glori_images/10-distribution.svg">
                </div>
            </div>
</section>

<section class="beer-glass-wrap mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 glass-title-wrap mt-5">
                <div class="glass-title mt-5 animatable fadeInUp">
                    <p>酒杯介紹</p>
                </div>
                <p class="glass-intro">就像喝葡萄酒一樣，一種啤酒一種杯，選對杯子就能讓啤酒美味升級。</p>
            </div>
        </div>
        <div class="container-fluid glass-wrap-border">
            <div class="row each-glass-wrap mt-5 align-items-end">
                <div class="col-md-3 col-sm-6 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-1">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">不缺角杯</p>
                            <p class="glass-title-en">Nonik</p>
                        </div>
                        <img class="glass-1 animatable bounceIn" src="../images/glori_images/Nonik.png">
                    </button>
                </div>
                <div class="col-md-3 col-sm-6 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-2">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">高腳鬱金香杯</p>
                            <p class="glass-title-en">Tulip</p>
                        </div>
                        <img class="glass-2 animatable bounceIn" src="../images/glori_images/Tulip-Glass.png">
                    </button>
                </div>
                <div class="col-md-3 col-sm-6 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-3">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">聖杯</p>
                            <p class="glass-title-en">Chalice/Goblet</p>
                        </div>
                        <img class="glass-3 animatable bounceIn" src="../images/glori_images/GobletChalice.png">
                    </button>
                </div>
                <div class="col-md-3 col-sm-6 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-4">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">笛型杯</p>
                            <p class="glass-title-en">Flute</p>
                        </div>
                        <img class="glass-4 animatable bounceIn" src="../images/glori_images/Flute.png">
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid glass-wrap-border mb-5">
            <div class="row each-glass-wrap align-items-end mt-5">
                <div class="col-md-3 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-5">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">直口杯</p>
                            <p class="glass-title-en">Stange</p>
                        </div>
                        <img class="glass-5 animatable bounceIn" src="../images/glori_images/Stange.png">
                    </button>
                </div>
                <div class="col-md-3 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-6">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">威力比切杯</p>
                            <p class="glass-title-en">Willi Becher</p>
                        </div>
                        <img class="glass-6 animatable bounceIn" src="../images/glori_images/Willi-Becher.png">
                    </button>
                </div>
                <div class="col-md-3 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-7">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">皮爾森杯</p>
                            <p class="glass-title-en">Pilsner</p>
                        </div>
                        <img class="glass-7 animatable bounceIn" src="../images/glori_images/Pisner-Glass.png">
                    </button>
                </div>
                <div class="col-md-3 each-glass animatable fadeInUp">
                    <button class="modal-trigger" data-modal="modal-glass-8">
                        <div class="glass-title-wrap">
                            <p class="glass-title-ch">雪克杯</p>
                            <p class="glass-title-en">Shaker</p>
                        </div>
                        <img class="glass8 animatable bounceIn" src="../images/glori_images/Shaker.png">
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- 各啤酒杯彈出視窗 -->

<!-- 不缺角杯 Nonik -->
<div class="modal" id="modal-glass-1">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>不缺角杯</h1>
            <h3>Nonik</h3>
            <img class="glass-1" src="../images/glori_images/Nonik.png">
        </div>
        <div class="modal-body">
            <p>由Alber & Co的Hugo Pick所設計，杯形最大的特色在於環狀突出的設計方便手拿，防止滑落而摔出缺角，也可以讓杯子堆疊時更加穩固，杯子間也不會因此卡住，常用在飲用英式愛爾或社交型啤酒。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 不缺角杯 Nonik -->

<!-- 高腳鬱金香杯 Tulip -->
<div class="modal" id="modal-glass-2">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>高腳鬱金香杯</h1>
            <h3>Tulip</h3>
            <img class="glass-1" src="../images/glori_images/Tulip-Glass.png">
        </div>
        <div class="modal-body">
            <p>外型貌似一朵盛放的鬱金香，杯型收口的設計可以讓香味集中，中段收窄的部分可以保留香氣，並且幫助維持酒帽。外張的杯緣可以擴香並貼合嘴形，容易入口，適合香味複雜的愛爾或是比利時啤酒。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 高腳鬱金香杯 Tulip -->

<!-- 聖杯 Chalice/Goblet -->
<div class="modal" id="modal-glass-3">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>聖杯</h1>
            <h3>Goblet</h3>
            <img class="glass-1" src="../images/glori_images/GobletChalice.png">
        </div>
        <div class="modal-body">
            <p>Chalice和Goblet都叫聖杯，高腳杯型的設計源自於基督宗教的儀式，Chalice比起Goblet杯壁較厚，重量較沉。聖杯的特色在於開口大、瓶身淺而底部寬，有助於酒體產生泡沫與減緩其消失的速度，適合泡沫細密的修道院啤酒。
            </p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 聖杯 Chalice/Goblet -->

<!-- 笛型杯 Flute -->
<div class="modal" id="modal-glass-4">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>笛型杯</h1>
            <h3>Flute</h3>
            <img class="glass-1" src="../images/glori_images/Flute.png">
        </div>
        <div class="modal-body">
            <p>這種杯型適合飲用香檳，瓶身集中收口的設計可以聚攏泡沫，集中啤酒的香氣，流線型的杯身設計給人優雅尊貴的感覺，呈現酒的顏色與氣泡，用於富有水果香氣的比利時啤酒。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 笛型杯 Flute -->

<!-- 直口杯 Stange -->
<div class="modal" id="modal-glass-5">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>直口杯</h1>
            <h3>Stange</h3>
            <img class="glass-1" src="../images/glori_images/Stange.png">
        </div>
        <div class="modal-body">
            <p>Stange是德文棍棒的意思，直身的設計可減少酒體與外界接觸，讓容易揮發的芬芳物質保持在酒內，容量通常低於200ml，必須在泡沫消失前飲用完畢，常用於傳統的德式啤酒與科隆啤酒。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 直口杯 Stange -->

<!-- 威力比切杯 Willi Becher -->
<div class="modal" id="modal-glass-6">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>威力比切杯</h1>
            <h3>Willi Becher</h3>
            <img class="glass-1" src="../images/glori_images/Willi-Becher.png">
        </div>
        <div class="modal-body">
            <p>標準的德式啤酒杯，據稱是由Willy Steinmeier所設計，瓶身的上下差異不顯著，微微收口的設計有助於香氣集中，適用於德式愛爾或是拉格啤酒。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 威力比切杯 Willi Becher -->


<!-- 皮爾森杯 Pilsner -->
<div class="modal" id="modal-glass-7">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>皮爾森杯</h1>
            <h3>Pilsner</h3>
            <img class="glass-1" src="../images/glori_images/Pisner-Glass.png">
        </div>
        <div class="modal-body">
            <p>專為皮爾森設計的酒杯，上寬下窄的設計可以支撐酒帽，細長透明的瓶身可以呈顯色澤金黃的淺色拉格啤酒，欣賞酒泡上升的美感。杯腳的設計可用手指拿捏，避免手溫接觸到杯身，讓啤酒保持冰涼。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 皮爾森杯 Pilsner -->

<!-- 雪克杯 Shaker -->
<div class="modal" id="modal-glass-8">
    <div class="modal-sandbox"></div>
    <div class="modal-box">
        <div class="modal-header">
            <h1>雪克杯</h1>
            <h3>Shaker</h3>
            <img class="glass-1" src="../images/glori_images/Shaker.png">
        </div>
        <div class="modal-body">
            <p>美式的雪克杯造型簡單，上寬下窄，大小適用於手搖調酒杯，所以較外型相似的圓錐品脫杯更為強壯，容量通常是473ml，適用於所有的啤酒類型，例如IPA、愛爾啤酒、拉格、司陶特等。</p>
            <button class="close-modal">我知道了</button>
        </div>
    </div>
</div>
<!-- 雪克杯 Shaker -->


<section class="beer-guide-wrap">
    <div class="container-fluid guide-container">
        <div class="row guide-row mb-5">
            <div class="col-md-4 guide-wrap mt-5">
                <div class="guide-title mt-5 animatable fadeInUp">
                    <p>啤酒地圖</p>
                </div>
                <img class="map-icon animatable bounceIn" src="../images/glori_images/map-icon.svg">
                <p class="guide-intro animatable fadeInUp">每次品嚐啤酒的時候，也同時在品嚐啤酒的文化。每個國家賦予啤酒的價值不盡相同。對於啤酒滋味的理解，也會根據飲食文化而有所不同。跟著我們一起探索吧！
                </p>
                <div class="know-more-wrap">
                    <a href="beer_map.php">
                        <div class="know-more">了解更多</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 guide-wrap mt-5">
                <div class="guide-title2 mt-5 animatable fadeInUp">
                    <p>品飲會</p>
                </div>
                <img class="map-icon animatable bounceIn" src="../images/glori_images/flavor-icon.svg">
                <p class="guide-intro animatable fadeInUp">在啤女的品飲會，將品嚐到世界各國不同的精釀啤酒。喜歡甜的、酸的、苦的；清爽順口的、果香明顯的、麥香濃厚的、酒花香氣奔放的、或是酒精感明顯的；讓我們來幫您尋味。
                </p>
                <div class="know-more-wrap">
                    <a href="event.php">
                        <div class="know-more">了解更多</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 guide-wrap mt-5">
                <div class="guide-title mt-5 animatable fadeInUp">
                    <p>餐酒搭配</p>
                </div>
                <img class="map-icon animatable bounceIn" src="../images/glori_images/meal-icon.svg">
                <p class="guide-intro animatable fadeInUp">不同種類的精釀啤酒能昇華料理的風味；那品嚐具有酸、甜、苦、辣、鹹、鮮味的啤酒與料理的結合，又會創造出什麼感受？讓我們一起把啤酒帶上餐桌。
                </p>
                <div class="know-more-wrap">
                    <a href="food.php">
                        <div class="know-more">了解更多</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>







<?php include __DIR__ . '../../php/common/html-body-footer.php' ?>
<?php include __DIR__ . '../../php/common/script.php' ?>

<!-- my script -->

<script src='../js/newbie/newbie.js'></script>

<?php include __DIR__ . '../../php/common/html-end.php' ?>
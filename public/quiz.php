<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '啤女BeerU:心理測驗';

?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- my-style -->
<link rel="stylesheet" href="../css/newbie/quiz-style.css">

<link rel="stylesheet" href="../css/pop-up.css">

<?php include __DIR__ . '../../php/common/html-body-navbar.php' ?>
<!-- 會員登入 -->
<?php include __DIR__ . '../../php/common/Login-Sign.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-1.php' ?>
<?php include __DIR__ . '../../php/common/pop-up-2.php' ?>
<section class="mobile-menu">
    <?php include __DIR__ . '../../php/common/category.php' ?>
</section>

<section class="quiz-wrapper" data-choice="no" data-eq="">
    <section class="quiz-1-wrap quiz-wrap " id="quiz-1-wrap">
        <div class="container">
            <p class="animatable fadeInUp quiz-q mt-3">請選出一面鏡子。</p>
            <div class="row quiz-row mt-5">
                <div class="col-md-3 option-wrap modal-trigger animate__animated animate__swing" data-modal="modal-1-1" data-score="1">
                    <img class="option-img" src="../images/glori_images/q1-o1.svg">
                    <div class="option-1-title-wrap">
                        <p class="option-1-title-ch">司陶特</p>
                        <span class="option-1-txt">
                            又稱烈性黑啤酒，是一種由波特啤酒改良而來的深色啤酒，而Stout一名源自法語，原義是強烈的意思，口味較波特啤酒濃烈。
                        </span>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animate__animated animate__swing" data-modal="modal-1-2" data-score="2">
                    <img class="option-img" src="../images/glori_images/q1-o2.svg">
                    <div class="option-1-title-wrap">
                        <p class="option-1-title-ch">波特</p>
                        <span class="option-1-txt o2-txt">
                            一種深色啤酒，源自於18世紀英國倫敦地區，以烘焙麥芽發酵而成。帶有咖啡般香味。
                        </span>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animate__animated animate__swing" data-modal="modal-1-3" data-score="3">
                    <img class="option-img" src="../images/glori_images/q1-o3.svg">
                    <div class="option-1-title-wrap">
                        <p class="option-1-title-ch">印度淡愛爾</p>
                        <span class="option-1-txt">
                            在釀造時加入了大量具有防腐性能的啤酒花以確保啤酒的新鮮，從此漸漸形成一種風味獨特的啤酒類型。
                        </span>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animate__animated animate__swing" data-modal="modal-1-4" data-score="4">
                    <img class="option-img" src="../images/glori_images/q1-o4.svg">
                    <div class="option-1-title-wrap">
                        <p class="option-1-title-ch">拉格</p>
                        <span class="option-1-txt">
                            現今的主流商業啤酒，除麥芽外，也可能添加玉米、米等副添加物，味道通常非常清淡，適合大口暢飲。
                        </span>
                    </div>
                </div>
            </div>
            <p class="quiz-quote animatable fadeInUp">人的心靈就像一面鏡子，你看到的世界，取決於你如何看待自己。</p>
            <div class="next-btn-wrap mt-3" data-href="quiz-2-wrap">
                    <div class="next-btn">下一步</div>
            </div>
        </div>
    </section>

    <section class="quiz-2-wrap quiz-wrap d-none" id="quiz-2-wrap">
        <div class="container">
            <p class="quiz-q mt-3 animatable fadeInUp">哪裡更適合讓妳獨自小酌呢?</p>
            <div class="row quiz-row mt-5">
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-2-1" data-score="1">
                    <img class="option-img" src="../images/glori_images/sports_bar.jpeg">
                    <div class="option-2-title-wrap">
                        <p class="option-2-title-ch">美式酒吧
                            <span class="option-2-txt">
                                美國的啤酒以英國啤酒為基礎，再加入歐洲其他國家啤酒文化而更形豐富。然而地區上的限制與市場特性，讓美國逐漸發展與舊世界不同風格的啤酒。如今美國以品質卓越的手工精釀啤酒傲視全球，也將美式風格啤酒推為啤酒界的霸主。
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-2-2" data-score="2">
                    <img class="option-img" src="../images/glori_images/izakaya.jpeg">
                    <div class="option-2-title-wrap">
                        <p class="option-2-title-ch">日式居酒屋<span class="option-2-txt">
                                一般而言，啤酒有兩種釀造方法，
                                採頂層發酵釀造的「Ale Beer」，帶有芳醇香氣。 採低層發酵釀造的「Lager Beer」，帶有清爽與微苦風味。
                                在歐美地區，兩種啤酒都受到大眾喜愛，不過日本的啤酒90%以上皆為Lager。
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-2-3" data-score="3">
                    <img class="option-img" src="../images/glori_images/australian_bar.jpeg">
                    <div class="option-2-title-wrap">
                        <p class="option-2-title-ch">比利時酒吧<span class="option-2-txt">
                                比利時的啤酒絕大多數都是愛爾啤酒。但與德國純酒令不同，比利時啤酒可以添加除了麥芽、酵母、啤酒花以外的原料，因此從酵母、穀物到香料添加都有不同的變化，讓比利時啤酒成為世界上最複雜的啤酒。比起其他國家，酒精濃度也更高。
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-2-4" data-score="4">
                    <img class="option-img" src="../images/glori_images/germany_bary.jpeg">
                    <div class="option-2-title-wrap">
                        <p class="option-2-title-ch">德式酒吧<span class="option-2-txt">
                                雖然「德國製造」的啤酒在全球占了三分之一，但德國並不是喝最多啤酒的國家。德國人平均每人每年喝掉約110公升啤酒（大概是300到320杯），皮爾森啤酒（Pilsner）的老家捷克共和國平均每人每年喝掉140到150公升。
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <p class="quiz-quote animatable fadeInUp">每次品嚐啤酒的時候，也同時在品嚐啤酒的文化。</p>
            <div class="next-btn-wrap mt-3" onclick="function(doAnimations)">
                <a href="#quiz-3-wrap">
                    <div class="next-btn">下一步</div>
                </a>
            </div>
        </div>
    </section>

    <section class="quiz-3-wrap quiz-wrap d-none" id="quiz-3-wrap">
        <div class="container">
            <p class="quiz-q mt-3 animatable fadeInUp">請挑選一種啤酒杯</p>
            <div class="row quiz-row mt-5">
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-3-1" data-score="1">
                    <p class="option-3-title">小麥啤酒杯</p>
                    <img class="option-img" src="../images/glori_images/Weizen-Glass.png">
                    <p class="option-3-txt">
                        特殊的弧度造型有聚集香氣、減緩泡沫消失、方便手拿等多種用途。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-3-2" data-score="2">
                    <p class="option-3-title">扎啤杯</p>
                    <img class="option-img" src="../images/glori_images/Stein.png">
                    <p class="option-3-txt">
                        為了減緩啤酒升溫，杯壁玻璃都很厚。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-3-3" data-score="3">
                    <p class="option-3-title">品脫杯</p>
                    <img class="option-img" src="../images/glori_images/Conical-Pint.png">
                    <p class="option-3-txt">
                        「品脫杯」顧名思義就是一杯容量剛好一品脫(約 470 ml)。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger animatable bounceIn" data-modal="modal-3-4" data-score="4">
                    <p class="option-3-title">球型酒杯</p>
                    <img class="option-img" src="../images/glori_images/Snifter.png">
                    <p class="option-3-txt">
                        類似葡萄酒杯的設計，適合優雅地喝啤酒。
                    </p>
                </div>
            </div>
            <p class="quiz-quote animatable fadeInUp">就像喝葡萄酒一樣，一種啤酒一種杯，選對杯子就能讓啤酒美味升級。</p>
            <div class="next-btn-wrap mt-3" onclick="function(doAnimations)">
                <a href="#quiz-4-wrap">
                    <div class="next-btn">下一步</div>
                </a>
            </div>
        </div>
    </section>

    <section class="quiz-4-wrap quiz-wrap d-none" id="quiz-4-wrap">
        <div class="container">
            <p class="quiz-q mt-3 animatable fadeInUp">請選擇一款自己最喜歡的下酒菜</p>
            <div class="row quiz-row mt-5">
                <div class="col-md-3 option-wrap modal-trigger" data-modal="modal-4-1" data-score="1">
                    <p class="option-4-title">沙拉佐酪梨醬
                        <span class="option-4-beer">
                            推薦啤酒：比利時小麥啤酒</span>
                    </p>
                    <div class="option-img-wrap animatable bounceIn">
                        <img class="option-img" src="../images/glori_images/q4-o1.svg">
                    </div>
                    <p class="option-4-txt">
                        啤酒最好與酪梨的油潤口感和香料味形成對比，而比利時版本的小麥啤酒最為適合。它具備的細微泡沫與淡雅酸味，可以「清爽」口腔。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger" data-modal="modal-4-2" data-score="2">
                    <p class="option-4-title">披薩
                        <span class="option-4-beer">
                            推薦啤酒：IPA</span>
                    </p>
                    <div class="option-img-wrap animatable bounceIn">
                        <img class="option-img" src="../images/glori_images/q4-o2.svg">
                    </div>
                    <p class="option-4-txt">
                        披薩的主要番茄風味可與啤酒花的果香完美結合；啤酒花在此扮演類似奧勒岡葉的提味角色。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger" data-modal="modal-4-3" data-score="3">
                    <p class="option-4-title">烤雞肉串
                        <span class="option-4-beer">
                            推薦啤酒：淡色愛爾啤酒</span>
                    </p>
                    <div class="option-img-wrap animatable bounceIn">
                        <img class="option-img" src="../images/glori_images/q4-o3.svg">
                    </div>
                    <p class="option-4-txt">
                        雞肉的味道通常不如紅肉來得厚實，所以最好選擇一款強調啤酒花香氣的淡色愛爾啤酒，無論是草本或果香風格，都能提昇雞肉的美味。
                    </p>
                </div>
                <div class="col-md-3 option-wrap modal-trigger" data-modal="modal-4-4" data-score="4">
                    <p class="option-4-title">白肉魚
                        <span class="option-4-beer">
                            推薦啤酒：小麥啤酒</span>
                    </p>
                    <div class="option-img-wrap animatable bounceIn">
                        <img class="option-img" src="../images/glori_images/q4-o4.svg">
                    </div>
                    <p class="option-4-txt">
                        白肉魚本身因為味道過於細緻，很難自成一盤佳餚。小麥啤酒的檸檬風味完美提供了這種不會出錯的傳統搭配，其清爽風格與魚肉的鮮甜亦屬天作之合。
                    </p>
                </div>
            </div>
            <p class="quiz-quote animatable fadeInUp">徹底認識手中的啤酒，才能替它找到合適的靈魂伴侶。</p>
            <div class="next-btn-wrap mt-3" onclick="function(doAnimations)">
                <a href="#quiz-5-wrap">
                    <div class="next-btn">下一步</div>
                </a>
            </div>
        </div>
    </section>

    <section class="quiz-5-wrap quiz-wrap d-none" id="quiz-5-wrap">
        <div class="container">
            <p class="quiz-q mt-3 animatable fadeInUp">微醺時，會做出什麼舉動?</p>
            <div class="row quiz-row mt-5">
                <div class="col-md-3 option-wrap" data-score="1">
                    <p class="option-5-title">大哭</p>
                    <img class="option-img animatable bounceIn" src="../images/glori_images/cry.svg">
                </div>
                <div class="col-md-3 option-wrap" data-score="2">
                    <p class="option-5-title">生氣</p>
                    <img class="option-img animatable bounceIn" src="../images/glori_images/mad.svg">
                </div>
                <div class="col-md-3 option-wrap" data-score="3">
                    <p class="option-5-title">開心</p>
                    <img class="option-img animatable bounceIn" src="../images/glori_images/happy.svg">
                </div>
                <div class="col-md-3 option-wrap" data-score="4">
                    <p class="option-5-title">打瞌睡</p>
                    <img class="option-img animatable bounceIn" src="../images/glori_images/sleep.svg">
                </div>
            </div>
            <p class="quiz-quote animatable fadeInUp">微醺時不孤單，有啤女陪伴妳。</p>
            <div class="next-btn-wrap mt-3">
                <a class="result-btn" href="#">
                    <div class="next-btn">測驗結果</div>
                </a>
            </div>
        </div>
    </section>

    <section class="quiz-empty"></section>

    <!-- 各題目彈出視窗 -->

    <!-- 第一題之一-->
    <div class="modal" id="modal-1-1">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>司陶特</h1>
                <h3>STOUT</h3>
            </div>
            <div class="modal-body">
                <p>又稱烈性黑啤酒，是一種由波特啤酒改良而來的深色啤酒，而Stout一名源自法語，原義是強烈的意思，口味較波特啤酒濃烈。</p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第一題之二-->
    <div class="modal" id="modal-1-2">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>波特</h1>
                <h3>PORTER</h3>
            </div>
            <div class="modal-body">
                <p>一種深色啤酒，源自於18世紀英國倫敦地區，以烘焙麥芽發酵而成。當時廣受河上及街道搬運工（Porter）的歡迎，因此得名。帶有咖啡般香味。</p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第一題之三-->
    <div class="modal" id="modal-1-3">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>印度淡愛爾</h1>
                <h3>IPA</h3>
            </div>
            <div class="modal-body">
                <p>是一種酒花香氣更濃郁的淡色艾爾，最初為了讓啤酒在從英格蘭到印度的遠距離航程中不至於腐敗，因此在釀造時加入了大量具有防腐性能的啤酒花以確保啤酒的新鮮，從此漸漸形成一種風味獨特的啤酒類型。</p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第一題之四-->
    <div class="modal" id="modal-1-4">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>拉格</h1>
                <h3>LAGER</h3>
            </div>
            <div class="modal-body">
                <p>現今的主流商業啤酒，除麥芽外，也可能添加玉米、米等副添加物，味道通常非常清淡，適合大口暢飲。</p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第二題之一-->
    <div class="modal" id="modal-2-1">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>美式酒吧</h1>
            </div>
            <div class="modal-body">
                <p>美國的啤酒以英國啤酒為基礎，再加入歐洲其他國家啤酒文化而更形豐富。然而地區上的限制與市場特性，讓美國逐漸發展與舊世界不同風格的啤酒。如今美國以品質卓越的手工精釀啤酒傲視全球，也將美式風格啤酒推為啤酒界的霸主。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第二題之二-->
    <div class="modal" id="modal-2-2">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>日式居酒屋</h1>
            </div>
            <div class="modal-body">
                <p>一般而言，啤酒有兩種釀造方法，
                    採頂層發酵釀造的「Ale Beer」，帶有芳醇香氣。 採低層發酵釀造的「Lager Beer」，帶有清爽與微苦風味。
                    在歐美地區，兩種啤酒都受到大眾喜愛，不過日本的啤酒90%以上皆為Lager。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第二題之三-->
    <div class="modal" id="modal-2-3">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>比利時酒吧</h1>
            </div>
            <div class="modal-body">
                <p>比利時的啤酒絕大多數都是愛爾啤酒。但與德國純酒令不同，比利時啤酒可以添加除了麥芽、酵母、啤酒花以外的原料，因此從酵母、穀物到香料添加都有不同的變化，讓比利時啤酒成為世界上最複雜的啤酒。比起其他國家，酒精濃度也更高。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第二題之四-->
    <div class="modal" id="modal-2-4">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>德式酒吧</h1>
            </div>
            <div class="modal-body">
                <p>雖然「德國製造」的啤酒在全球占了三分之一，但德國並不是喝最多啤酒的國家。德國人平均每人每年喝掉約110公升啤酒（大概是300到320杯），皮爾森啤酒（Pilsner）的老家捷克共和國平均每人每年喝掉140到150公升。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第三題之一-->
    <div class="modal" id="modal-3-1">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>小麥啤酒杯</h1>
            </div>
            <div class="modal-body">
                <p>特殊的弧度造型有聚集香氣、減緩泡沫消失、方便手拿等多種用途。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第三題之二-->
    <div class="modal" id="modal-3-2">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>扎啤杯</h1>
            </div>
            <div class="modal-body">
                <p>為了減緩啤酒升溫，杯壁玻璃都很厚。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第三題之三-->
    <div class="modal" id="modal-3-3">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>品脫杯</h1>
            </div>
            <div class="modal-body">
                <p>「品脫杯」顧名思義就是一杯容量剛好一品脫(約 470 ml)。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第三題之四-->
    <div class="modal" id="modal-3-4">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>球型酒杯</h1>
            </div>
            <div class="modal-body">
                <p>類似葡萄酒杯的設計，適合優雅地喝啤酒。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第四題之一-->
    <div class="modal" id="modal-4-1">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>沙拉佐酪梨醬</h1>
                <h3>推薦啤酒：小麥啤酒</h3>
            </div>
            <div class="modal-body">
                <p>啤酒最好與酪梨的油潤口感和香料味形成對比，而比利時版本的小麥啤酒最為適合。它具備的細微泡沫與淡雅酸味，可以「清爽」口腔。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第四題之二-->
    <div class="modal" id="modal-4-2">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>披薩</h1>
                <h3>推薦啤酒：IPA</h3>
            </div>
            <div class="modal-body">
                <p>披薩的主要番茄風味可與啤酒花的果香完美結合；啤酒花在此扮演類似奧勒岡葉的提味角色。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第四題之三-->
    <div class="modal" id="modal-4-3">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>烤雞肉串</h1>
                <h3>推薦啤酒：淡色愛爾</h3>
            </div>
            <div class="modal-body">
                <p>雞肉的味道通常不如紅肉來得厚實，所以最好選擇一款強調啤酒花香氣的淡色愛爾啤酒，無論是草本或果香風格，都能提昇雞肉的美味。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

    <!-- 第四題之四-->
    <div class="modal" id="modal-4-4">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <h1>白肉魚</h1>
                <h3>推薦啤酒：小麥啤酒</h3>
            </div>
            <div class="modal-body">
                <p>白肉魚本身因為味道過於細緻，很難自成一盤佳餚。小麥啤酒的檸檬風味完美提供了這種不會出錯的傳統搭配，其清爽風格與魚肉的鮮甜亦屬天作之合。
                </p>
                <button class="close-modal">關閉</button>
            </div>
        </div>
    </div>

</section>









<!-- <?php include __DIR__ . '../../php/common/html-body-footer.php' ?> -->

<?php include __DIR__ . '../../php/common/script.php' ?>

<!-- my script -->

<script src='../js/newbie/quiz.js'></script>

<?php include __DIR__ . '../../php/common/html-end.php' ?>
</head>

<body>

    <header class="beeru-nav-bar">
        <div class="container">
            <div class="row  flex-column flex-lg-row align-items-center justify-content-lg-between align-items-lg-start">
                <div class="trigger"><span></span></div>
                <!-- logo -->
                <a href="index.php">
                    <div class="nav-bar-logo"><img src="<?= WEB_ROOT ?>/images/logo/logo_beeru_white.svg" alt=""></div>
                </a>
                <!-- 選單 -->
                <ul class="nav-bar-list list-unstyled d-flex justify-content-around">
                    <li class="nav-item"><a href="monthly-product.php">本月主打</a></li>
                    <li class="nav-item"><a href="newbie.php">新手入門</a></li>
                    <li class="nav-item">啤酒指南
                        <ul class="nav-sub-menu list-unstyled">
                            <li class="nav-sub-menu-item"><a href="beer_map.php">啤酒地圖</a></li>
                            <li class="nav-sub-menu-item"><a href="food.php">餐酒搭配</a></li>
                            <!-- <li class="nav-sub-menu-item"><a href="">風味輪</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item">啤酒活動
                        <ul class="nav-sub-menu list-unstyled">
                            <li class="nav-sub-menu-item"><a href="event.php">預約品飲會</a></li>
                            <li class="nav-sub-menu-item"><a href="fund.php">募資計畫</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a href="all-product.php">全部商品</a></li>
                </ul>
                <!-- 會員&搜尋 -->
                <ul class="nav-bar-member list-unstyled d-flex ">

                    <!-- 搜尋 -->
                    <input type="text" id="search" name="search" class="search-bar" placeholder="找啤酒">
                    <li class="search"><i class="fas fa-search"></i></li>

                    <!-- 購物車 -->
                    <div class="cart-g position-relative">
                        <li class="shopping-cart"><a href="cart-list.php"><img src="<?= WEB_ROOT ?>/images/common/icon_shopbag.svg" alt=""></a></li>
                        <span class="cart-pnum d-none"></span>
                    </div>


                    <!-- 登入後頭像 -->

                    <?php if (isset($_SESSION['user'])) : ?>

                        <p name=Logout class="logout d-none d-lg-block" onclick="Logout(); return false;">LOG OUT</p>

                        <li class="user-pic">
                            <a href="member.php"><img src="<?= WEB_ROOT ?>/images/user/<?= htmlentities($_SESSION['user']['user-pic']) ?>" alt=""></a>
                            <div class="havegift">
                                <i class="fas fa-gift"></i>
                            </div>
                        </li>
                        <div class="gift-notice">
                            <p>恭喜!成就達標!</p>
                            <p>快到<a href="member.php?memberAchievement"><i class="fas fa-hand-point-right"></i>我的成就</a></p>
                            <p>領禮物囉!</p>
                        </div>



                    <?php else : ?>
                        <!-- 未登入按鈕 -->
                        <li class="user-login"><a href="javascript: "><img src="<?= WEB_ROOT ?>/images/common/icon_member.svg" alt=""></a></li>


                    <?php endif ?>


                </ul>
            </div>
        </div>
    </header>
    <div class="header"></div>

    <section class="beer-warning d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <p>禁止酒駕</p>
                <p>酒後不開車 安全有保障</p>
            </div>
        </div>

    </section>
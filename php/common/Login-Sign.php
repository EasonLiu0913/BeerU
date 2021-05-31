<section class="LogIn-Sign">
    <div class="log-wrap">
        <div class="log-sandbox"></div>
        <div class="log-box">

            <div class="logo-wrap">
            <img src="../images/logo/logo_beeru_gold.svg" alt="">
            </div>

            <div class="cancel-quit">
            <i class="fas fa-times cancel-icon"></i>
            </div>

            <!-- 起始畫面 -->
            <div class="log-content first-login-page" >
                <div class="first-content">
                    <h3>現在加入會員</h3>
                    <h3>立即享有50元折扣！</h3>
                </div>  

                <div class="login-title social-login-title">
                    <h4>用以下社群帳號繼續</h4>
                </div>

                <div class="social-icon fb-01" >
                    <img src="../images/common/icon_fb_blue.svg" alt="">
                </div>

                <div class="login-title member-login-title">
                    <h4>或用啤女帳號繼續</h4>
                </div>

                <div class="LogInOut-btn-warp d-flex">
                    <div class="log-btn LogIn-btn01">登入</div>
                    <div class="log-btn LogOut-btn02">註冊</div>
                </div>
            </div>   

            
            
            <!-- 登入畫面 -->
            <div class="log-content LogIn-page" >

                <div class="LogIn-title">
                    <h3>用啤女帳戶登入</h3>
                </div>


                <!-- 登入表單 -->
                <form class="LogIn-content-wrap" name="Login" method="post"  novalidate onsubmit="checkform_Login(); return false;">

                    <div class="input-account">
                    <i class="fas fa-user-alt user-icon01"></i>
                    <input class="input-btn account" type="email" placeholder="啤女帳號" name="account" id="account">
                    </div>
                    <small class="warn "><i class="far fa-times-circle"></i></small>

                    <div class="input-password">
                    <i class="fas fa-lock lock-icon01"></i>
                    <input class="input-btn password" type="password" placeholder="密碼" id="password" name="password">
                    </div>


                    <small class="warn"><i class="far fa-times-circle"></i></small>


                    <button class="LogIn-btn02 Login" type="submit"> 登入</button>

                </form>

                <div class="forget-password">
                    <h3 class="forget-password-btn">忘記密碼</h3>
                    <h3>｜</h3>
                    <h3>重新寄認證信</h3>
                </div>



                <div class="not-menber">
                    <h3>還不是會員嗎？</h3>
                    <h3><span class="LogSign-rightNow">立即註冊新帳號</span></h3>
                </div>


                <div class="backward back01">
                    <h3>回上頁</h3>
                </div>

                </div>   
                    
                <!-- 註冊畫面 -->
              <div class="log-content LogSign-page" >
                    <div class="LogSign-title">
                        <h3>註冊啤女帳號</h3>
                    </div>


                    <!-- 註冊表單 -->
                    <form name="Sign" class="logSign-content-wrap"
                    novalidate onsubmit="Sign_email();return false">
                            
                        <div class="account-password-wrap d-flex">

                            <div class="logSign-account">
                                <h3>啤女帳號</h3>
                                <i class="far fa-envelope email-icon01"></i>
                                <input class="input-btn newAccount" type="email" id="newAccount" name="newAccount" required >
                                <small class="warn-text ">帳號為您的電子信箱</small>
                                <small class="warn"><i class="far fa-times-circle"></i></small>
                                
                            </div>

                            <div class="logSign-password">
                                <h3>密碼</h3>
                                <i class="fas fa-lock lock-icon02"></i>
                                <input class="input-btn newPassword" name="newPassword" type="password" id="newPassword">
                                <small class="warn-text ">密碼為 6 碼以上的英文或數字</small>
                                <small class="warn"><i class="far fa-times-circle"></i></small>
                                
                                
                            </div>    
                        </div>


                        <div class="member-wrap d-flex">

                            <div class="logSign-name">
                                <h3>姓名</h3>
                                <i class="fas fa-user-alt user-icon02"></i>
                                <input type="text" class="input-btn nickname"  id="nickname"  name="nickname" required>
                                <small class="warn"><i class="far fa-times-circle"></i></small>
                            </div>

                            <div class="logSign-birthday">
                                <h3>生日 </h3>
                                <input class="input-btn birthday" 
                                type="date" id="birthday" name="birthday">
                                <small class="warn"><i class="far fa-times-circle"></i></small>
                            </div>
                        </div>


                        <div class="logSign-address">
                            <h3>地址</h3>
                            <input type="text" class="input-btn address"  id="address"  name="address">

                        </div>


                        <div class="logSign-notice">
                            <p>按下註冊鈕的同時，表示您已詳閱我們的資料使用政策與使用條款，同意使用<span>啤女</span>所提供的服務並訂閱電子報。</p>
                        </div>

                        <button type="submit" class="logSign-btn Sign" >註冊</button>

                        <div class="already-account">
                            <h3>已經有帳號了？</h3>
                            <h3><span class="LogIn-rightNow">馬上登入</span></h3>
                        </div>

                        <div class="backward back02" >
                            <h3>回上頁</h3>
                        </div>


                    </form>

                    <div class="social-signIn-wrap mt-4">
                        
                        <div class="social-icon fb-02" >
                            <img src="../images/common/icon_fb_blue.svg" alt="">
                        </div>
                        <h4>用社群帳號快速註冊</h4>

                    </div>

            </div>    




            <!-- 驗證畫面 -->
                <form class="log-content Check-page" name="Sign_submit" method="post"  novalidate onsubmit="SignSubmit();return false" >
                    <div class="Check-title">
                        <h3>請查看您的 Email</h3>
                    </div>
                    
                    <div class="Check-warp">
                        <div class="Check-content-warp">

                            <div class="Check-content content01">
                                <p>為了確保是你本人，我們已寄送一封認證信到你的 Email，請點擊信裡的確認連結以開通帳號。
                                </p>
                            </div>
                            <div class="Check-content content02 mt-4">
                                <p>找不到認證信時，請到「垃圾信件」分類查找，或在信箱搜尋「啤女」或 「BEERU」。</p>
                            </div>
                        </div>


                        <div class="Check-Email">
                            <i class="far fa-envelope email-icon02"></i>
                            <input class="input-btn check_number" placeholder="您的驗證碼" id="email-check" name="check_number">
                            <small class="warn"><i class="far fa-times-circle"></i></small>
                        </div>

                        <button type="submit" class="check-email-btn">驗證信箱</button>

                        <div class="backward back03" >
                            <h3>回上頁</h3>
                        </div>

                        
                    </div>

                </form>   

            <!-- 載入中 -->
            <div class="log-content Loading-page">
                   <div class="loader"></div>
                   <p>請稍候...</p>
                </div>


            <!-- 註冊成功畫面 -->
            <div class="log-content  Sign-Success">
                
                <div class="Success-wrap">
                    <div class="Success-title">
                        <h3>註冊成功</h3>
                    </div>

                    <div class="Success-img">
                        <div class="Success-top">
                            <img src="../images/common/Success_Top.svg" alt="">
                        </div>
                        <div class="Success-hands d-flex">
                            
                            <div class="Success_hand hand_L">
                                <img src="../images/common/Success_L.svg" alt="">
                            </div>
                            <div class="Success_hand hand_R">
                                <img src="../images/common/Success_R.svg" alt="">
                            </div>
                    
                        </div>
                    </div>

                    <div class="Success-content">
                        <p>恭喜您成為啤女的一員!</p>
                        <p>歡迎您與我們一起探索精釀啤酒的世界吧!</p>
                    </div>

                    <button class="Success-btn">完成</button>

                </div>

            </div>


             <!-- 忘記密碼畫面 -->
             <div class="log-content Forget-Password" >
                <div class="Forget-Password-title">
                    <h3>忘記密碼</h3>
                </div>

                <form name="UserEmail" class="UserEmail-wrap" novalidate>

                    <div class="Forget-UserEmail">
                        <h3>E-mail信箱</h3>
                        <i class="far fa-envelope email-icon01"></i>
                        <input class="input-btn Forget_UserEmail" type="email" id="Forget-UserEmail" name="ForgetUserEmail" >
                    </div>
                    <div class="send-email-warp d-flex">
                        <small class="warn-text">請輸入您的電子信箱來傳送驗證碼</small>
                        <small class="warn-suscess"><i class="fas fa-check"></i>驗證碼已傳送</small>
                        <small class="warn"><i class="far fa-times-circle"></i></small>
                        <button class="search-email"  type="submit" onclick="Forget_Email();return false">傳送</button>
                    </div>
                   

                    <div class="Forget-Check">
                        <h3>請輸入驗證碼</h3>
                        <input class="input-btn Forget_UserEmail_Check" type="text" id="Forget-UserEmail-Check" name="Forget_UserEmail_Check">
                        <small class="warn"><i class="far fa-times-circle"></i></small>
                        <div class="resend-warp d-flex">
                            <i class="fas fa-redo-alt"></i>
                            <button class="resende-code-btn" 
                            type="submit" onclick="Forget_Email();return false">重新傳送驗證碼</button>
                        </div>

                    </div>

                    <button class="forget-next-btn" type="submit" onclick="Forget_check();return false">下一步</button>

                    <div class="backward back04" >
                        <h3>回上頁</h3>
                    </div>

                </form>


                <form name="ForgetChagePassword" class="ForgetChagePassword-wrap" novalidate>

                    <div class="Forget-change">
                        <h3>輸入新密碼</h3>
                        <i class="fas fa-lock lock-icon04"></i>
                        <input class="input-btn forgetPassword" type="password" id="forgetPassword" name="forgetPassword">
                        <small class="warn"><i class="far fa-times-circle"></i></small>
                    </div>

                    <div class="Forget-change-again">
                        <h3>再次輸入密碼</h3>
                        <i class="fas fa-lock lock-icon04"></i>
                        <input class="input-btn forgetPassword_again" type="password" id="forgetPassword-again" name="forgetPassword_again">
                        <small class="warn"><i class="far fa-times-circle"></i></small>
                    </div>

                    <button class="Forget-change-btn" type="submit" onclick="Forget_reset();return false">重新修改密碼</button>
                    
                </form>

    
            </div>
               
                


                
        </div>      
    </div>
</section>
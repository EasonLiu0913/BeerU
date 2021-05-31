<?php include __DIR__ . '../../php/common/config.php' ?>

<!-- 需要置換的變數們 -->
<?php

$page_title = '登入測試';


?>

<?php include __DIR__ . '../../php/common/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->
<!-- 包含自己的css和js -->



<style>
 
   .content {
        width: 100%;
        height: 100vh;
    }
</style>



<div class="content">
 
    
     <!-- 登入測試 -->
     <form class="LogIn-content-wrap" name="Login" method="post"  novalidate onsubmit="checkform_Login(); return false;">
    
         <h3>登入帳號</h3>
          <input  type="email" id="account" name="account">
               
          
          <h3>登入密碼</h3>
          <input  type="password" id="password" name="password" >
          
          
          <button class="LogIn-btn02" type="submit"> 登入</button>
          
     </form>    


     <br>  <br>  <br> 
     <!-- 註冊畫面 -->
         <form name="Sign" method="post"  novalidate  onsubmit="Sign_email();return false">
           
    
           <h3>註冊帳號</h3>
           <input type="email" id="newAccount" name="newAccount" required>
     

           <h3>密碼</h3>
          <input type="password"  id="newPassword" name="newPassword" required>


          <h3>姓名</h3>
          <input type="text"  id="nickname" name="nickname" required>


          <h3>地址</h3>
          <textarea  name="address"  id="address" cols="20" rows="1"></textarea>
         

          <h3>生日 </h3>
          <input type="date" name="birthday">
          
      
          <button type="submit" class="btn btn-primary" >註冊</button>


     </form>     

     <br><br> 
     
     <form name="Sign_submit" method="post"  novalidate onsubmit="SignSubmit();return false">



        <h3>驗證碼</h3>
        <input type="text" name="check_number">
        

        <button type="submit" class="btn btn-primary">驗證</button>


     </form>


     <br><br> 


      <!-- 忘記密碼畫面 -->
      <div class="log-content Forget-Password" >
                <div class="Forget-Password-title">
                    <h3>忘記密碼</h3>
                </div>

                <form name="UserEmail" class="UserEmail-wrap" method="post" >

                    <div class="Forget-UserEmail">
                        <h3>E-mail信箱</h3>
                        <i class="far fa-envelope email-icon01"></i>
                        <input class="input-btn" type="email" id="Forget-UserEmail" name="ForgetUserEmail" >
                    </div>
                    <div class="send-email-warp d-flex">
                        <small class="warn-text">請輸入您的電子信箱來傳送驗證碼</small>
                        <button class="search-email"  type="submit" onclick="Forget_Email();return false">搜尋</button>
                    </div>
                   

                    <div class="Forget-Check">
                        <h3>請輸入驗證碼</h3>
                        <input class="input-btn" type="text" id="Forget-UserEmail-Check" name="Forget_UserEmail_Check">
                        <div class="resend-warp d-flex">
                            <i class="fas fa-redo-alt"></i>
                            <button class="resende-code-btn"type="submit" onclick="Forget_Email();return false">重新傳送驗證碼</button>
                        </div>
                    </div>

                    <div class="forget-next-btn">下一步</div>

                    <div class="backward back04" >
                        <h3>回上頁</h3>
                    </div>

                </form>


                <form name="ForgetChagePassword" class="ForgetChagePassword-wrap" >

                    <div class="Forget-change">
                        <h3>輸入新密碼</h3>
                        <i class="fas fa-lock lock-icon03"></i>
                        <input class="input-btn" type="password" id="forget-password" name="forget_change_password">
                    </div>

                    <div class="Forget-change-again">
                        <h3>再次輸入密碼</h3>
                        <i class="fas fa-lock lock-icon03"></i>
                        <input class="input-btn" type="password" id="forget-password-again" name="forget_password_again">
                    </div>

                    <button class="Forget-change-btn">重新修改密碼</button>
                    
                </form>

    
            </div>



</div>
<?php include __DIR__ . '../../php/common/script.php' ?>



<script>




</script>


<?php include __DIR__ . '../../php/common/html-end.php' ?>
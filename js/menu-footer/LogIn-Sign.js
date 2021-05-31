$(document).ready(function(){

    const $account = $('.account');
    const $password = $('.password');


    const $newAccount = $('.newAccount');
    const $newPassword = $('.newPassword');
    const $nickname = $('.nickname');
    const $birthday = $('.birthday');

    const $Forget_UserEmail = $('.Forget_UserEmail');
    const $Forget_UserEmail_Check = $('.Forget_UserEmail_Check');

    const $fp = $('.forgetPassword');
    const $fpa = $('.forgetPassword_again');
    

        
    //會員登入的視覺效果

    //navbar登入起始畫面按鈕
    $('.user-login').click(function(){

        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        const fileds03 = [$Forget_UserEmail,$Forget_UserEmail_Check];

        const fileds04 = [$fp,$fpa];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');
    
    
        
        });
    

        fileds03.forEach(el =>{
   
            el.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $('.send-email-warp .warn-text').css('display','block')
            $('.send-email-warp .warn-suscess').css('display','none')

            
            
           
    
        });

        fileds04.forEach(el =>{
   
            el.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            
    
    
        });



        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px')
        }

        if ($(window).width() < 992){
        $('.log-box').css('width','90%').css('max-width','338px').css('height','50%').css('min-height','460px')


        }


        $('.LogIn-Sign').fadeIn(100);
        $('.first-login-page').fadeIn(1);
        
        $('.LogIn-page').fadeOut(1);
        $('.LogSign-page').fadeOut(1);
        $('.Check-page').fadeOut(1);
        $('.Sign-Success').fadeOut(1);
        $('.Forget-Password').fadeOut(1);
        $('.UserEmail-wrap').fadeOut(1);
        $('.ForgetChagePassword-wrap').fadeOut(1);

        $('.send-email-warp .warn-text').text('請輸入您的電子信箱來傳送驗證碼')
        $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
        $('.Sign').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
        

    });





    //按周圍區域退出
    $('.log-sandbox').click(function(){


    $('.send-email-warp .warn-text').text('請輸入您的電子信箱來傳送驗證碼')
    $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');

    $('.Sign').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');

    $('.LogIn-Sign').fadeOut(300);
    const fileds01 = [$account,$password];

    const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

    const fileds03 = [$Forget_UserEmail,$Forget_UserEmail_Check];

    const fileds04 = [$fp,$fpa];

    fileds01.forEach(el =>{
    
        el.css('border', '1px solid var(--gold)');
        $('.warn').css('display', 'none');
        

    });

    fileds02.forEach(el2 =>{
    
        el2.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        $newAccount.next().css('display','block');
        $newPassword.next().css('display','block');


    
    });

    fileds03.forEach(el =>{
   
        el.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        $('.send-email-warp .warn-text').css('display','block')
        $('.send-email-warp .warn-suscess').css('display','none')

       
       

    });

    fileds04.forEach(el =>{
   
        el.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        


    });

    

    })

    $('.cancel-quit').click(function(){
        $('.Check-page').fadeOut(300);
        $('.LogIn-Sign').fadeOut(300);
        const fileds01 = [$account,$password];
        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
        
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });

    })

    $('.later-check').click(function(){

        $('.Check-page').fadeOut(300);
        $('.LogIn-Sign').fadeOut(300);
        const fileds01 = [$account,$password];
        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
        
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });

    })


    //進入登入頁
    $('.LogIn-btn01').click(function(){




    
        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

        }

        if ($(window).width() < 992){
        $('.log-box').css('width','90%').css('max-width','338px').css('height','60%').css('min-height','500px').css('transition','.4s');


        }




    $('.first-login-page').fadeOut(1);
    
    $('.LogIn-page').fadeIn(1000);

        
    })


    //進入註冊畫面

    $('.LogOut-btn02').click(function(){
        const fileds01 = [$account,$password];
        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });


        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });



        if ($(window).width() >= 992){

            $('.log-box').css('width','50%').css('height','86%').css('transition','.4s');
        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('max-width','338px').css('height','80%').css('transition','.4s');


        }



        $('.first-login-page').fadeOut(1);

        

        $('.LogSign-page').fadeIn(1000);
        

    })


    // // 進入驗證頁
    // $('.Sign').click(function(){

    //     // 驗證信送出，載入中
    //     if ($(window).width() >= 992){

    //         $('.log-box').css('width','30%').css('height','20%').css('min-height','300px').css('transition','.4s')
    //     }

    //     if ($(window).width() < 992){
    //         $('.log-box').css('width','60%').css('min-height','210px').css('height','40%').css('transition','.4s')



    //     }
        
    //     $('.logo-wrap').fadeOut(1);
    //     $('.cancel-quit').fadeOut(1);
    //     $('.LogSign-page').fadeOut(1).css('margin-top','40px');
    //     $('.Loading-page').fadeIn(1000);


    //     setTimeout(() => {

    //         $('.Loading-page').fadeOut(1);
    //         $('.LogIn-Sign').fadeOut(1);


    //     },5000)

    //     setTimeout(() => {

    //         $('.LogIn-Sign').fadeIn(1);
    //         $('.logo-wrap').fadeIn(1000);
        
    //         //進入驗證頁面
    //         $('.Check-page').fadeIn(1000);


    //         if ($(window).width() >= 992){
    //             $('.log-box').css('width','35%').css('height','500px').css('min-width','583px').css('transition','.4s');
    //         }

    //         if ($(window).width() < 992){
    //             $('.log-box').css('width','90%').css('max-width','338px').css('height','70%').css('transition','.4s');

    //     }

    //     },5500)
    // })


    // 立即註冊
    $('.LogSign-rightNow').click(function(){

        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });




        if ($(window).width() >= 992){

            $('.log-box').css('width','50%').css('height','86%').css
        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('height','80%').css
        }



        $('.LogIn-page').fadeOut(1);
        $('.LogSign-page').fadeIn(1000);

    })


    // 馬上登入
    $('.LogIn-rightNow').click(function(){

        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });



        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

        }

        if ($(window).width() < 992){
        $('.log-box').css('width','90%').css('max-width','338px').css('height','60%').css('min-height','500px').css('transition','.4s');
    
        }



        $('.first-login-page').fadeOut(1);
        $('.LogSign-page').fadeOut(1);
    
        $('.LogIn-page').fadeIn(1000);
    
        
    })


    //回到起始畫面
    $('.back01 h3').click(function(){

        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });
    


        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('max-width','338px').css('height','50%').css('min-height','460px').css('transition','.4s');
        
        
        }


        

        $('.LogIn-page').fadeOut(1);
        $('.LogSign-page').fadeOut(1);
        $('.first-login-page').fadeIn(100);
        // $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

    
    })

    //回到起始畫面
    $('.back02 h3').click(function(){

        const fileds01 = [$account,$password];
        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });
    


        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('max-width','338px').css('height','50%').css('min-height','460px').css('transition','.4s');
        
        
        }


        

        $('.LogIn-page').fadeOut(1);
        $('.LogSign-page').fadeOut(1);
        $('.first-login-page').fadeIn(100);
        // $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

    
    })

    //驗證頁返回
    $('.back03 h3').click(function(){

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });




        $('.Check-page').fadeOut(1);
        $('.LogSign-page').fadeIn(1000);

        if ($(window).width() >= 992){

            $('.log-box').css('width','50%').css('height','86%').css
        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('max-width','338px').css('height','80%').css


        }
    


    })

    //忘記密碼畫面

    //忘記密碼第一步
    $('.forget-password-btn').click(function(){

        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        const fileds03 = [$Forget_UserEmail,$Forget_UserEmail_Check];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');


        
        });

        

        fileds03.forEach(el =>{
   
            el.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $('.send-email-warp .warn-text').css('display','block')
            $('.send-email-warp .warn-suscess').css('display','none')

            $('.send-email-warp .warn-text').text('請輸入您的電子信箱來傳送驗證碼')
            $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
           
    
        });


        if ($(window).width() >= 992){

            $('.log-box').css('width','35%').css('height','65%').css('min-height','550px').css('transition','.4s');;
        }

        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('height','75%').css('min-height','473px').css('transition','.4s');;
        }

        $('.LogIn-page').fadeOut(1);
        $('.Forget-Password').fadeIn(1000);
        $('.UserEmail-wrap').fadeIn(1000);


    })


    //忘記密碼第二步
    // $('.forget-next-btn').click(function(){
   

    //     if ($(window).width() >= 992){

    //         $('.log-box').css('width','35%').css('height','30%').css('min-height','500px').css('transition','.4s');
    //     }

    //     if ($(window).width() < 992){
    //         $('.log-box').css('width','90%').css('height','50%').css('min-height','460px').css('transition','.4s');
    //     }



    //     $('.UserEmail-wrap').fadeOut(1);
    //     $('.ForgetChagePassword-wrap').fadeIn(1000);




    // })


    //返回登入
    $('.back04 h3').click(function(){
        const fileds01 = [$account,$password];

        const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

        const fileds03 = [$Forget_UserEmail,$Forget_UserEmail_Check];

        fileds01.forEach(el =>{
        
            el.css('border', '1px solid var(--gold)');
            $('.warn').css('display', 'none');
            

        });

        fileds02.forEach(el2 =>{
    
            el2.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $newAccount.next().css('display','block');
            $newPassword.next().css('display','block');

        });

        

        fileds03.forEach(el =>{
   
            el.css('border', '1px solid var(--gold)');
            $('.LogIn-Sign .warn').css('display', 'none');
            $('.send-email-warp .warn-text').css('display','block')
            $('.send-email-warp .warn-suscess').css('display','none')

            $('.send-email-warp .warn-text').text('請輸入您的電子信箱來傳送驗證碼')
            $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
           
    
        });


        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

        }

        if ($(window).width() < 992){
        $('.log-box').css('width','90%').css('max-width','338px').css('height','60%').css('min-height','500px').css('transition','.4s');
    
        }

    
        $('.LogIn-page').fadeIn(1000);

        $('.Forget-Password').fadeOut(1);
        $('.UserEmail-wrap').fadeOut(1);



    })










})

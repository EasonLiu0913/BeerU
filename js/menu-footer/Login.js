// 登入
const account_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
const $account = $('.account');
const $password = $('.password');
const $Forget_UserEmail = $('.Forget_UserEmail');
const $Forget_UserEmail_Check = $('.Forget_UserEmail_Check');

const $fp = $('.forgetPassword');
const $fpa = $('.forgetPassword_again');





//初始錯誤狀態
$('.LogIn-Sign .warn').css('display', 'none');

function checkform_Login(){

    let isPass = true;
    
    const fileds01 = [$account,$password];

    fileds01.forEach(el =>{
   
        el.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
       

    });




    //帳號不符合格式
    if(!account_re.test($account.val())){
        isPass = false;
        $account.css('border', 'solid 2px var(--pink)');
        $account.parent().next().css('display', 'block').children().text('帳號為E-mail格式');
        ;

    }
    
    //輸入不能為空
    if($account.val() == '' && $password.val()== ''){
        isPass = false;
        $account.css('border', 'solid 2px var(--pink)');
        $password.css('border', 'solid 2px var(--pink)');

        $account.parent().next().css('display', 'block').children().text('輸入不可以為空');
        $password.parent().next().css('display', 'block').children().text('輸入不可以為空');



    }

    
    if(isPass){

        $.post(
            'Login-api.php',
            $(document.Login).serialize(),
            function(data){
                console.log(data)
                if(data.success){
                    


                    $('.LogIn-Sign').fadeOut(100);
                    $('.pop-up-1').fadeIn(150);
                    $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color','var(--gold)')
                    $('.pop-up-1 .pop-up-text').text('登入成功');
                    $('button.ok').on('click', function () {
                        location.reload();
                    })

                   
                    


                } else {
                     
                
                    $account.css('border', 'solid 2px var(--pink)');
                    $password.css('border', 'solid 2px var(--pink)');
                    $password.parent().next().css('display', 'block').children().text('帳號或密碼錯誤');
                 
                    
                }
            },
            'json'
        )

    }

}


// 登出
function Logout(){
    $('.pop-up-2').fadeIn(150);
    $('.pop-up-2 .icon').html('<i class="fas fa-door-open"></i>').css('color','var(--gold)').css('background-color','transparent');
    $('.pop-up-2 .pop-up-text').text('是否要登出？');
    $('.pop-up-2 .yes').text('登出');
    $('.pop-up-2 .no').text('取消');

    $('.pop-up-2 .yes').on('click', function () {
        location.href= 'Logout-api.php';
    })
    $('.pop-up-2 .no').on('click', function () {
        $('.pop-up-2').fadeOut(150);
    })
    

}


function LogIn_btn(){

    // 進入登入頁 
    if ($(window).width() >= 992){
        $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');

    }
    if ($(window).width() < 992){
    $('.log-box').css('width','90%').css('max-width','338px').css('height','60%').css('min-height','400px').css('transition','.4s');

    }
    $('.LogIn-Sign').fadeIn(100);
    $('.first-login-page').fadeOut(1);
    
    $('.LogIn-page').fadeIn(1000);
    $('.back01').css('display','none')


    // 立即註冊
    $('.LogSign-rightNow').click(function(){

    if ($(window).width() >= 992){

        $('.log-box').css('width','50%').css('height','86%').css
    }

    if ($(window).width() < 992){
        $('.log-box').css('width','90%').css('height','80%').css
    }


    // 馬上登入
    $('.LogIn-page').fadeOut(1);
    $('.LogSign-page').fadeIn(1000);

    $('.back02').css('display','none')

    $('.LogIn-rightNow').click(function(){



        if ($(window).width() >= 992){
            $('.log-box').css('width','35%').css('height','60%').css('min-height','494px').css('transition','.4s');
    
        }
    
        if ($(window).width() < 992){
            $('.log-box').css('width','90%').css('max-width','338px').css('height','60%').css('min-height','400px').css('transition','.4s');
        }
    
    
    
        $('.first-login-page').fadeOut(1);
        $('.LogSign-page').fadeOut(1);
     
        $('.LogIn-page').fadeIn(1000);
     
         
     })

    })


}

///忘記密碼第一步
function Forget_Email(){

    const fileds03 = [$Forget_UserEmail,$Forget_UserEmail_Check];

    fileds03.forEach(el =>{
   
        el.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        $('.send-email-warp .warn-text').css('display','block')
        $('.send-email-warp .warn-suscess').css('display','none')

        $('.send-email-warp .warn-text').text('請輸入您的電子信箱來傳送驗證碼')
        $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
       

    });

   

    let isPass=true;

    //格式錯誤
    if(!account_re.test($Forget_UserEmail.val())){
        isPass = false;
        $Forget_UserEmail.css('border', 'solid 2px var(--pink)');
        $('.send-email-warp .warn-text').css('display','none');
        $('.send-email-warp .warn').css('display','block').children().text('Email格式錯誤');
        ;

    }

    //輸入不可為空
    if($Forget_UserEmail.val() == ''){
        isPass = false;
        $Forget_UserEmail.css('border', 'solid 2px var(--pink)');
        $('.send-email-warp .warn-text').css('display','none');
        $('.send-email-warp .warn').css('display','block').children().text('輸入不可為空');


    }

    


    if(isPass){
      
        $('.search-email').attr('disabled', true).css('background-color','#7F7F7F').css('opacity','0.4');
        $('.send-email-warp .warn-text').text('傳送中....')

        $.post(
        
            "Forget-step1-api.php",
            $(document.UserEmail).serialize(),
            function(data){

                    if(data.success){
                        // alert('驗證碼已送出');
                        $('.send-email-warp .warn-text').css('display','none')
                        $('.send-email-warp .warn-suscess').css('display','block')

                    } else {
                        // alert(data.error);
                        $Forget_UserEmail.css('border', 'solid 2px var(--pink)');
                        $('.send-email-warp .warn-text').css('display','none')
                        $('.send-email-warp .warn-suscess').css('display','none')
                        $('.send-email-warp .warn').css('display','block').children().text('此Email不存在');

                        $('.search-email').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1'); 

                    }

            },'json'

        )

    }
}


function Forget_check(){

    let isPass=true;

    if(isPass){

      
        $.post(
        
            "Forget-step2-api.php",
            $(document.UserEmail).serialize(),
            function(data){

                    if(data.success){
                        // alert('驗證成功');

                        //忘記密碼第二步
                        if ($(window).width() >= 992){

                            $('.log-box').css('width','35%').css('height','30%').css('min-height','500px').css('transition','.4s');
                        }
                
                        if ($(window).width() < 992){
                            $('.log-box').css('width','90%').css('height','50%').css('min-height','460px').css('transition','.4s');
                        }
                
                
                
                        $('.UserEmail-wrap').fadeOut(1);
                        $('.ForgetChagePassword-wrap').fadeIn(1000);

                    } else {
                        // alert(data.error);
                        $Forget_UserEmail_Check.css('border', 'solid 2px var(--pink)');
                        $Forget_UserEmail_Check.next().css('display','block').children().text('驗證碼錯誤');

                    }

            },'json'

        )

    }
}


///忘記密碼第三步
function Forget_reset(){

    const fileds04 = [$fp,$fpa];

    fileds04.forEach(el =>{
   
        el.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        


    });


    let isPass=true;


    if( $fp.val() !=  $fpa.val() ){

        isPass=false;
        $fp.css('border', 'solid 2px var(--pink)');
        $fp.next().css('display','block').children().text('輸入密碼不同');

        $fpa.css('border', 'solid 2px var(--pink)');
        $fpa.next().css('display','block').children().text('輸入密碼不同');

        
    }


    //密碼為 6 碼以上
    if($fp.val().length < 6){

        isPass = false;
        $fp.css('border', 'solid 2px var(--pink)');
        $fp.next().css('display','block').children().text('密碼不可小於6碼');

    }
    if($fpa.val().length < 6){

        isPass = false;
        $fpa.css('border', 'solid 2px var(--pink)');
        $fpa.next().css('display','block').children().text('密碼不可小於6碼');

    }



    if($fp.val()==''){
        isPass=false;

        $fp.css('border', 'solid 2px var(--pink)');
        $fp.next().css('display','block').children().text('輸入不可為空');

    }
    if($fpa.val()==''){

        isPass=false;
        $fpa.css('border', 'solid 2px var(--pink)');
        $fpa.next().css('display','block').children().text('輸入不可為空');

    }


     


    if(isPass){
      
        $.post(
        
            "Forget-step3-api.php",
            $(document.ForgetChagePassword).serialize(),
            function(data){

                    if(data.success){
                        $('.LogIn-Sign').fadeOut(100);
                        $('.pop-up-1').fadeIn(150);
                        $('.pop-up-1 .icon').html('<i class="fas fa-check"></i>').css('background-color','var(--gold)')
                        $('.pop-up-1 .pop-up-text').text('修改密碼成功');
                        $('button.ok').on('click', function () {
                            location.reload();
                        })
                        
                    } else {
                        alert(data.error);
                    }

            },'json'

        )

    }
}





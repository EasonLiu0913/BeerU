//註冊
const $newAccount = $('.newAccount');
const $newPassword = $('.newPassword');
const $nickname = $('.nickname');
const $birthday = $('.birthday');



//註冊會員,傳送驗證email
function Sign_email(){

       let isPass = true;

       const fileds02 = [$newAccount,$newPassword,$nickname,$birthday];

       fileds02.forEach(el2 =>{
   
        el2.css('border', '1px solid var(--gold)');
        $('.LogIn-Sign .warn').css('display', 'none');
        $newAccount.next().css('display','block');
        $newPassword.next().css('display','block');


      
       });

         // $newAccount.next().css('display','block');
        // $newPassword.next().css('display','block');

      
      
        //帳號不符合格式
        if(!account_re.test($newAccount.val())){
            isPass = false;
            $newAccount.css('border', 'solid 2px var(--pink)');
            $newAccount.next().css('display','none');
            $newAccount.next().next().css('display','block').children().text('帳號為E-mail格式');

        }


       //不可為空
       if($newAccount.val() == '' ){

        isPass = false;

        $newAccount.css('border', 'solid 2px var(--pink)');
        $newAccount.next().css('display','none');
        $newAccount.next().next().css('display','block').children().text('此處不可為空');

       }


       if($newPassword.val() == ''){

        isPass = false;
        $newPassword.css('border', 'solid 2px var(--pink)');
        $newPassword.next().css('display','none');
        $newPassword.next().next().css('display','block').children().text('此處不可為空');


       }


       if( $nickname.val() == ''){

        isPass = false;

        $nickname.css('border', 'solid 2px var(--pink)');
        $nickname.next().css('display','block').children().text('此處不可為空');

    
       }
        


       if($birthday.val() == ''){

        isPass = false;

        $birthday.css('border', 'solid 2px var(--pink)');
        $birthday.next().css('display','block').children().text('此處不可為空');

       }

       //密碼為 6 碼以上
       

       if($newPassword.val().length < 6){

        isPass = false;
        $newPassword.css('border', 'solid 2px var(--pink)');
        $newPassword.next().css('display','none');
        $newPassword.next().next().css('display','block').children().text('密碼不可小於6碼');

       }

       

      
       if(isPass){

        $('.Sign').attr('disabled', true).css('background-color','#7F7F7F').css('opacity','0.4');
        
        $.post(
            'Email-check-api.php',
            $(document.Sign).serialize(),
            function(data){
                console.log(data)
                if(data.success){

                    // 驗證信送出，載入中
                    if ($(window).width() >= 992){

                        $('.log-box').css('width','30%').css('height','20%').css('min-height','300px').css('transition','.4s')
                    }

                    if ($(window).width() < 992){
                        $('.log-box').css('width','60%').css('min-height','210px').css('height','40%').css('transition','.4s')



                    }
                    
                    $('.logo-wrap').fadeOut(1);
                    $('.cancel-quit').fadeOut(1);
                    $('.LogSign-page').fadeOut(1).css('margin-top','40px');
                    $('.Loading-page').fadeIn(1000);


                    setTimeout(() => {

                        $('.Loading-page').fadeOut(1);
                        $('.LogIn-Sign').fadeOut(1);


                    },5000)

                    setTimeout(() => {

                        $('.LogIn-Sign').fadeIn(1);
                        $('.logo-wrap').fadeIn(1000);
                    
                        //進入驗證頁面
                        $('.Check-page').fadeIn(1000);


                        if ($(window).width() >= 992){
                            $('.log-box').css('width','35%').css('height','500px').css('min-width','583px').css('transition','.4s');
                        }

                        if ($(window).width() < 992){
                            $('.log-box').css('width','90%').css('max-width','338px').css('height','70%').css('transition','.4s');

                    }

                    },5500)
                   




                } else {

                    $('.Sign').attr('disabled', false).css('background-color','var(--gold)').css('opacity','1');
                    $newAccount.css('border', 'solid 2px var(--pink)');
                    $newAccount.next().css('display','none');
                    $newAccount.next().next().css('display','block').children().text('帳號已註冊');

                    
                }
            },'json'
        )
    }


}




//註冊會員,建立會員資料
function SignSubmit(){

    const $check_number = $('.check_number');

    
    let isPass = true;


    if(isPass){
            $.post(
                'Sign-api.php',
                $(document.Sign_submit).serialize(),
                function(data){
                    console.log(data)
                    if(data.success){
                        
                        
                        // 驗證完成，載入中
                        if ($(window).width() >= 992){

                            $('.log-box').css('width','30%').css('height','20%').css('min-height','300px').css('transition','.4s')
                        }
                    
                        if ($(window).width() < 992){
                            $('.log-box').css('width','60%').css('min-height','210px').css('height','40%').css('transition','.4s')


      
                    
                        }
                        
                        $('.logo-wrap').fadeOut(1);
                        $('.cancel-quit').fadeOut(1);
                        $('.Check-page').fadeOut(1).css('margin-top','40px');
                        $('.Loading-page').fadeIn(1000);


                        setTimeout(() => {

                            $('.Loading-page').fadeOut(1);
                            $('.LogIn-Sign').fadeOut(1);


                        },1000)

                        setTimeout(() => {

                            $('.LogIn-Sign').fadeIn(1);
                            $('.logo-wrap').fadeIn(1000);
                            $('.Sign-Success').fadeIn(2500);
                            


                           // 註冊成功
                            if ($(window).width() >= 992){

                                $('.log-box').css('width','40%').css('height','60%').css('min-height','500px').css('transition','.4s');
                            }

                           
                        
                            if ($(window).width() < 992){
                                $('.log-box').css('width','90%').css('min-height','473px').css('height','65%').css('transition','.4s');

                             }

                        },1500)

                        $('button.Success-btn').on('click', function () {
                            location.reload();
                         })

                         $('.log-sandbox').click(function(){
                            location.reload();

                         })
                    
                        
                    } else {
                        $check_number.css('border', 'solid 2px var(--pink)');
                        $check_number.next().css('display','block').children().text('驗證碼錯誤');
                    }
                },
                'json'
            )
        }


}


// 設定註冊只能18歲
let Sign_maxYear = new Date().getFullYear()-18;
let Sign_maxDate = new Date().getDate()
let Sign_maxMonth = new Date().getMonth()+1

function Sign_setMonth(s){
   return s<10 ? '0'+s : s;
}

let Sign_maxAge = Sign_maxYear +'-'+Sign_setMonth(Sign_maxMonth)+'-'+Sign_maxDate ;
$('.birthday').attr('max',Sign_maxAge);
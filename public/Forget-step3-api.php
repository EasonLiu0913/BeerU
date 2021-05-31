<?php include __DIR__ . '../../php/common/config.php' ;



$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有新增'
];


$output['forget']=$_POST['forgetPassword'];

if(isset($_POST['forgetPassword'])){

        $r_sid =  $_SESSION['user_forget']['sid'];


        $np_sql = "UPDATE `member` SET `password`=?  WHERE `sid` = $r_sid ";
        $np_stmt = $pdo -> prepare($np_sql);

        $np_stmt -> execute([
    
            password_hash($_POST['forgetPassword'],PASSWORD_DEFAULT)

        ]);

        if($np_stmt->rowCount()){


            
            $_SESSION['user']=$_SESSION['user_forget'];

            unset($_SESSION['user_forget']);
           

            $output['success'] = true;
            $output['error'] = '';


        }else {
            $output['error'] = '重新設定發生錯誤';
        }


}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>


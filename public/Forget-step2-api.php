<?php include __DIR__ . '../../php/common/config.php' ;


$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有新增'
];



$check_code = $_SESSION['ForgetUser']['check_code'];
$check_number= $_POST['Forget_UserEmail_Check'];

// $output['check_number']=$_POST['Forget_UserEmail_Check'];


if($check_code == $check_number && isset($_POST['ForgetUserEmail'])){

    $a_sql = "SELECT * FROM `member` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt->execute([ $_POST['ForgetUserEmail']]);
    $row = $a_stmt->fetch();


    if(empty($row)) {
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;  // 程式結束
    }


    $_SESSION['user_forget'] = $row;
    $output['success'] = true;
    $output['error'] = '';
    $output['User'] = $_SESSION['user_forget'];

    unset($_SESSION['ForgetUser']);

    
}
else{
    $output['error'] = '驗證碼錯誤';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
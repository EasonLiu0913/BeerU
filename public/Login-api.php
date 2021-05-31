<?php include __DIR__ . '../../php/common/config.php' ;


$output = [
    'success' => false,
    'code' => 0,
    'error' => '帳號或密碼錯誤'
];


$output['account'] =  $_POST['account'];
$output['password'] = $_POST['password'];




if(isset($_POST['account'])) {

    $a_sql = "SELECT * FROM `member` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt->execute([ $_POST['account']]);
    $row = $a_stmt->fetch();
 

    if(empty($row)) {
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;  // 程式結束
    }

    if(password_verify($_POST['password'], $row['password'])){
        unset($row['password']);
        unset($row['hash']);
        $_SESSION['user'] = $row;
        $output['success'] = true;
        $output['error'] = '';
        $output['User'] = $_SESSION['user'];
    }

}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>


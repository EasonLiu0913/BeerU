
<?php 

// echo '[]'; exit;


include __DIR__ . '../../php/common/config.php';


$output = [
    'msg' => ''
];

$countryName = $_POST['countryName'];
$mapSQL = "SELECT * FROM `map` WHERE `country` = ?";
$map_stmt = $pdo->prepare($mapSQL);
$map_stmt->execute([$_POST['countryName']]);
$map_row = $map_stmt->fetch();

// $cups_sql = "SELECT * FROM `products` WHERE `abv`=0 ORDER BY RAND() LIMIT 3";
// $cups = $pdo->query($cups_sql)->fetchAll();

$beers_sql = "SELECT * FROM `products` WHERE `country_sid`=? AND `sid` < 225 ORDER BY RAND() LIMIT 3";
$beers_stmt = $pdo->prepare($beers_sql);
$beers_stmt->execute([$map_row['sid']]);
$beers = $beers_stmt->fetchAll();

// echo json_encode($map_row, JSON_UNESCAPED_UNICODE);
// echo json_encode($beers, JSON_UNESCAPED_UNICODE);





// 關注列
$a_arr = [];
// 設定登入會員後
if (isset($_SESSION['user'])) {
    // 設定已登入會員sid
    $m_sid = $_SESSION['user']['sid'];
    // 選擇attention抓tag_sid，綁定有會員sid
    $a_SQL = "SELECT `tag_sid` FROM `attention` WHERE `tag_sid` > 0 AND `member_sid` = $m_sid";
    // 抓取建立a_row
    $a_row = $pdo->query($a_SQL)->fetchAll();
    // 如果有關注
    if (!empty($a_row)) {
        foreach ($a_row as $a) {
            // 抓出來
            array_push($a_arr, $a['tag_sid']);
        }
    }
}

echo json_encode([
    'map_row' => $map_row,
    'beers' => $beers,
    'attention' => $a_arr,


], JSON_UNESCAPED_UNICODE
);


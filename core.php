<?php


require("inc/bd.php");
require("inc/site_config.php");

session_start();
$sid = $_SESSION['hash'];

// Запрос для подсчета онлайн пользователей
$sql_select5 = "SELECT COUNT(*) FROM kot_user WHERE online=1";
$result5 = $mysqli->query($sql_select5);
$online = $result5->fetch_row()[0];

// Запрос для получения последних 15 игр
$sql_select = "SELECT * FROM kot_games ORDER BY `id` DESC LIMIT 15";
$result = $mysqli->query($sql_select);

$game = ""; // Инициализируем переменную

while ($row = $result->fetch_assoc()) {
    $sql_select1 = "SELECT * FROM kot_user WHERE id=" . $row['user_id'];
    $result1 = $mysqli->query($sql_select1);
    $row1 = $result1->fetch_assoc();

    $sts = "danger"; // По умолчанию
    $st = "danger"; // По умолчанию

    if ($row['chance'] >= 60) {
        $sts = "success";
    } elseif ($row['chance'] >= 30) {
        $sts = "warning";
    }

    if ($row['type'] == "win") {
        $st = "success";
    } elseif ($row['type'] == "lose") {
        $st = "danger";
    }

    $login = ucfirst($row['login']);
    
    $game .= "<tr data-user='2370363' data-game='1'><td>$login</td><td class='text-$st' style='font-weight:600'>$row[number]</td><td style='width:120px;'>$row[cel]</td><td>$row[sum]</td><td><div class='progress'><div class='progress-bar bg-$sts' role='progressbar' style='width: $row[chance]%'></div></div></td><td class='text-$st' style='font-weight:600'>$row[win_summa]</td></tr>";

    $login = "";
}

$time = time() + 5;

$update_sql111 = "UPDATE kot_user SET online='1', online_time='$time' WHERE hash='$sid'";
$mysqli->query($update_sql111) or die("" . $mysqli->error);

$sql_select = "SELECT COUNT(*) FROM kot_user WHERE online='1'";
$result = $mysqli->query($sql_select);
$row = $result->fetch_assoc();
$online_default = $row['COUNT(*)'];
$online = $online_default + $fake_online; // Проверьте, откуда берется значение $fake_online

$response = array(
    'game' => $game,
    'online' => $online
);

echo json_encode($response);
?>

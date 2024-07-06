<?php
include('site_config.php');

$shop_id = '3175'; // ID кассы в fropay
$secret_key = 'l7b4vp2qdmskt8a'; // Секретный ключ в настройках кассы
$pay = $_POST['pay']; // Номер платежа в системе FROPAY
$label = $_POST['label']; // ID платежа в вашей системе
$amount = $_POST['amount']; // Сумма платежа в формате 100.00
$hashsign = $_POST['hash']; // Зашифрованная строка shop_id.amount.secretKey.label.pay методом sha256

$sign = hash('sha256', $shop_id.$amount.$secret_key.$label.$pay);

if ($sign != $hashsign) {
die('Неверный hash'); // проверка hash, при желании можно не использовать
}

$idmoney = $label;
$data = date('d-m-Y H:i:s');
$yandex = '';
$suma = $amount;
include('bd.php');
		if (is_numeric($idmoney))
		{
		$sql_select = "SELECT * FROM kot_user WHERE id='$idmoney'";
$result = $mysqli->query($sql_select);
$row = mysqli_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$ref = $row['ref_id'];
}
	$sumaref = ($suma / 100) * 10;
if($ref >= 1)
{	
			$sql_select = "SELECT * FROM kot_user WHERE id='$ref'";
$result = $mysqli->query($sql_select);
$row = mysqli_fetch_array($result);
if($row)
{	
$balanceref = $row['balance'];
$balancerefs = $balanceref + $sumaref;
$update_sql1 = "Update kot_user set balance='$balancerefs' WHERE id='$ref'";
    $mysqli->query($update_sql1) or die("" . mysql_error());
}
} 

$balancenew = $row['balance'] + $suma;
$update_sql1 = "Update kot_user set balance='$balancenew' WHERE id='$idmoney'";
    $mysqli->query($update_sql1) or die("" . mysql_error());
			$insert_sql1 = "
			INSERT INTO `kot_payments` (`user_id`, `suma`, `data`, `qiwi`, `transaction`) 
			VALUES ('{$idmoney}', '{$suma}', '{$data}', '{$yandex}', '{$pay}')
			";
$mysqli->query($insert_sql1);
} 

    die('YES');
?>
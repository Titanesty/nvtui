<?php
require ("config.php");
session_start();
$site_access = $_GET['access'];
if($site_access != '') {
  $_SESSION['access'] = $site_access;
  header('Location: /');
}
$refer = $_GET['i'];
if($refer != '') {
  $_SESSION['ref'] = $refer;
  header('Location: /');
}
$sid = $_SESSION['hash'];

$selecter1 = "SELECT * FROM kot_user WHERE hash = '$sid'";
         $result4 = $mysqli->query($selecter1);
         $row = mysqli_fetch_array($result4);
		 if($row)
		{	
          $login = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
          $id = $row['id'];
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
        }
if($social_link == '') {
  $social_link = "Не привязан";
}
$select_deps = "SELECT * FROM kot_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = $mysqli->query($select_deps);
$select_refs = "SELECT * FROM kot_user WHERE ref_id = '$id'";
$result_ref = $mysqli->query($select_refs);
$sql_select222 = "SELECT * FROM kot_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = $mysqli->query($sql_select222);
$img = substr($login, 0, 2);
$img = strtoupper($img);// аватарка (не трогать)
if($is_ban == 1) {
  header('Location: /ban');
} 
if($_SESSION['login'] != 1) {
  header('Location: /login');
}
if($_SESSION['login'] == 1) {
if($login == '' || $pass == '') {
  header('Location: /complete');
}
}
?>
<?php 
  if(empty($_SESSION['access'])) {
    ?>
 
       <div style="background:#e0e8f3;width: 100%;height: 100vh;z-index: 55555;position: fixed;">

<div class="page-header page-header-kyc"><div class="container"><div class="row justify-content-center"><div class="col-lg-8 col-xl-7 text-center"><h1 class="page-title">Сайт переехал на </h1>
<b style="font-size: 52px;"><?=$sitename?>.<span style="color:orange"><?=$sitedomen?></span></b><p class="large">Всегда проверяйте адрес сайта, остерегайтесь мошенников</p>
<a class="btn btn-primary " href="/?access=1">Перейти на сайт</a>
</div>
</div>
</div>
      </div>
      </div>
      <?php } ?>
<!DOCTYPE html>

<html lang="ru" class="js">

<head>

   <meta name="yandex-verification" content="24b16affb97ea5f1" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
    .btn-primary.btn {
        background:#2c80ff;
    }
        .swal-icon--error {
            border-color: #f27474;
            -webkit-animation: animateErrorIcon .5s;
            animation: animateErrorIcon .5s
        }

        .swal-icon--error__x-mark {
            position: relative;
            display: block;
            -webkit-animation: animateXMark .5s;
            animation: animateXMark .5s
        }

        .swal-icon--error__line {
            position: absolute;
            height: 5px;
            width: 47px;
            background-color: #f27474;
            display: block;
            top: 37px;
            border-radius: 2px
        }

        .swal-icon--error__line--left {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            left: 17px
        }

        .swal-icon--error__line--right {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            right: 16px
        }

        @-webkit-keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @-webkit-keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        @keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        .swal-icon--warning {
            border-color: #f8bb86;
            -webkit-animation: pulseWarning .75s infinite alternate;
            animation: pulseWarning .75s infinite alternate
        }

        .swal-icon--warning__body {
            width: 5px;
            height: 47px;
            top: 10px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--warning__body,
        .swal-icon--warning__dot {
            position: absolute;
            left: 50%;
            background-color: #f8bb86
        }

        .swal-icon--warning__dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -4px;
            bottom: -11px
        }

        @-webkit-keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }

            to {
                border-color: #f8bb86
            }
        }

        @keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }

            to {
                border-color: #f8bb86
            }
        }

        .swal-icon--success {
            border-color: #a5dc86
        }

        .swal-icon--success:after,
        .swal-icon--success:before {
            content: "";
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            background: #fff;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal-icon--success:before {
            border-radius: 120px 0 0 120px;
            top: -7px;
            left: -33px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 60px 60px;
            transform-origin: 60px 60px
        }

        .swal-icon--success:after {
            border-radius: 0 120px 120px 0;
            top: -11px;
            left: 30px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 60px;
            transform-origin: 0 60px;
            -webkit-animation: rotatePlaceholder 4.25s ease-in;
            animation: rotatePlaceholder 4.25s ease-in
        }

        .swal-icon--success__ring {
            width: 80px;
            height: 80px;
            border: 4px solid hsla(98, 55%, 69%, .2);
            border-radius: 50%;
            box-sizing: content-box;
            position: absolute;
            left: -4px;
            top: -4px;
            z-index: 2
        }

        .swal-icon--success__hide-corners {
            width: 5px;
            height: 90px;
            background-color: #fff;
            padding: 1px;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal-icon--success__line {
            height: 5px;
            background-color: #a5dc86;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 2
        }

        .swal-icon--success__line--tip {
            width: 25px;
            left: 14px;
            top: 46px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation: animateSuccessTip .75s;
            animation: animateSuccessTip .75s
        }

        .swal-icon--success__line--long {
            width: 47px;
            right: 8px;
            top: 38px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation: animateSuccessLong .75s;
            animation: animateSuccessLong .75s
        }

        @-webkit-keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }

            54% {
                width: 0;
                left: 1px;
                top: 19px
            }

            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }

            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }

            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }

            54% {
                width: 0;
                left: 1px;
                top: 19px
            }

            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }

            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }

            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @-webkit-keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }

            65% {
                width: 0;
                right: 46px;
                top: 54px
            }

            84% {
                width: 55px;
                right: 0;
                top: 35px
            }

            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        @keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }

            65% {
                width: 0;
                right: 46px;
                top: 54px
            }

            84% {
                width: 55px;
                right: 0;
                top: 35px
            }

            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        .swal-icon--info {
            border-color: #c9dae1
        }

        .swal-icon--info:before {
            width: 5px;
            height: 29px;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--info:after,
        .swal-icon--info:before {
            content: "";
            position: absolute;
            left: 50%;
            background-color: #c9dae1
        }

        .swal-icon--info:after {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px
        }

        .swal-icon {
            width: 80px;
            height: 80px;
            border-width: 4px;
            border-style: solid;
            border-radius: 50%;
            padding: 0;
            position: relative;
            box-sizing: content-box;
            margin: 20px auto
        }

        .swal-icon:first-child {
            margin-top: 32px
        }

        .swal-icon--custom {
            width: auto;
            height: auto;
            max-width: 100%;
            border: none;
            border-radius: 0
        }

        .swal-icon img {
            max-width: 100%;
            max-height: 100%
        }

        .swal-title {
            color: rgba(0, 0, 0, .65);
            font-weight: 600;
            text-transform: none;
            position: relative;
            display: block;
            padding: 13px 16px;
            font-size: 27px;
            line-height: normal;
            text-align: center;
            margin-bottom: 0
        }

        .swal-title:first-child {
            margin-top: 26px
        }

        .swal-title:not(:first-child) {
            padding-bottom: 0
        }

        .swal-title:not(:last-child) {
            margin-bottom: 13px
        }

        .swal-text {
            font-size: 16px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: left;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 400;
            color: rgba(0, 0, 0, .64);
            max-width: calc(100% - 20px);
            overflow-wrap: break-word;
            box-sizing: border-box
        }

        .swal-text:first-child {
            margin-top: 45px
        }

        .swal-text:last-child {
            margin-bottom: 45px
        }

        .swal-footer {
            text-align: right;
            padding-top: 13px;
            margin-top: 13px;
            padding: 13px 16px;
            border-radius: inherit;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .swal-button-container {
            margin: 5px;
            display: inline-block;
            position: relative
        }

        .swal-button {
            background-color: #7cd1f9;
            color: #fff;
            border: none;
            box-shadow: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            margin: 0;
            cursor: pointer
        }

        .swal-button:not([disabled]):hover {
            background-color: #78cbf2
        }

        .swal-button:active {
            background-color: #70bce0
        }

        .swal-button:focus {
            outline: none;
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(43, 114, 165, .29)
        }

        .swal-button[disabled] {
            opacity: .5;
            cursor: default
        }

        .swal-button::-moz-focus-inner {
            border: 0
        }

        .swal-button--cancel {
            color: #555;
            background-color: #efefef
        }

        .swal-button--cancel:not([disabled]):hover {
            background-color: #e8e8e8
        }

        .swal-button--cancel:active {
            background-color: #d7d7d7
        }

        .swal-button--cancel:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(116, 136, 150, .29)
        }

        .swal-button--danger {
            background-color: #e64942
        }

        .swal-button--danger:not([disabled]):hover {
            background-color: #df4740
        }

        .swal-button--danger:active {
            background-color: #cf423b
        }

        .swal-button--danger:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(165, 43, 43, .29)
        }

        .swal-content {
            padding: 0 20px;
            margin-top: 20px;
            font-size: medium
        }

        .swal-content:last-child {
            margin-bottom: 20px
        }

        .swal-content__input,
        .swal-content__textarea {
            -webkit-appearance: none;
            background-color: #fff;
            border: none;
            font-size: 14px;
            display: block;
            box-sizing: border-box;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 10px 13px;
            border-radius: 2px;
            transition: border-color .2s
        }

        .swal-content__input:focus,
        .swal-content__textarea:focus {
            outline: none;
            border-color: #6db8ff
        }

        .swal-content__textarea {
            resize: vertical
        }

        .swal-button--loading {
            color: transparent
        }

        .swal-button--loading~.swal-button__loader {
            opacity: 1
        }

        .swal-button__loader {
            position: absolute;
            height: auto;
            width: 43px;
            z-index: 2;
            left: 50%;
            top: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            text-align: center;
            pointer-events: none;
            opacity: 0
        }

        .swal-button__loader div {
            display: inline-block;
            float: none;
            vertical-align: baseline;
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            margin: 2px;
            opacity: .4;
            border-radius: 7px;
            background-color: hsla(0, 0%, 100%, .9);
            transition: background .2s;
            -webkit-animation: swal-loading-anim 1s infinite;
            animation: swal-loading-anim 1s infinite
        }

        .swal-button__loader div:nth-child(3n+2) {
            -webkit-animation-delay: .15s;
            animation-delay: .15s
        }

        .swal-button__loader div:nth-child(3n+3) {
            -webkit-animation-delay: .3s;
            animation-delay: .3s
        }

        @-webkit-keyframes swal-loading-anim {
            0% {
                opacity: .4
            }

            20% {
                opacity: .4
            }

            50% {
                opacity: 1
            }

            to {
                opacity: .4
            }
        }

        @keyframes swal-loading-anim {
            0% {
                opacity: .4
            }

            20% {
                opacity: .4
            }

            50% {
                opacity: 1
            }

            to {
                opacity: .4
            }
        }

        .swal-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, .4);
            z-index: 10000;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s
        }

        .swal-overlay:before {
            content: " ";
            display: inline-block;
            vertical-align: middle;
            height: 100%
        }

        .swal-overlay--show-modal {
            opacity: 1;
            pointer-events: auto
        }

        .swal-overlay--show-modal .swal-modal {
            opacity: 1;
            pointer-events: auto;
            box-sizing: border-box;
            -webkit-animation: showSweetAlert .3s;
            animation: showSweetAlert .3s;
            will-change: transform
        }

        .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s, -webkit-transform .3s;
            transition: transform .3s, opacity .2s;
            transition: transform .3s, opacity .2s, -webkit-transform .3s
        }

        @media (max-width:500px) {
            .swal-modal {
                width: calc(100% - 20px)
            }
        }

        @-webkit-keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }
        
        .circle-online {
  width :8px;
  height:8px;

  background: linear-gradient(to right, #0ACB90, #2BDE6D);
  border-radius:100%;
}
.pulse-online {
  animation :pulse 11s infinite;
  animation-duration: 4s;
}
@-webkit-keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
        }
        70% {
            -webkit-box-shadow: 0 0 0 10px rgba(10, 203, 144, 0);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }
    @keyframes pulse {
        0% {
  
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.5);
        }
        70% {
                 transform:rotateY(0deg); 

            -moz-box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }

    </style>
    <meta name="author" content="<?=$sitename?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$sitename?> - официальный сайт - сервис мгновенных игр</title>
    <meta name="description" content="<?=$sitename?> - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему."><!-- Fav Icon -->
    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->
    <!-- Vendor Bundle CSS -->
    <script src="https://kit.fontawesome.com/6cce539f85.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                              <script>
                              setTimeout(function() {
                              $('#userBalance').attr('myBalance', <?=$balance?>);
                                                                        updateBalance(0, <?=$balance?>); 
                              }, 1400);
                              </script>
    <link rel="stylesheet" href="../css/fa.css">
    <link rel="stylesheet" href="../css/ti.css">   
    <link rel="stylesheet" href="../css/vendor.bundle.css">
    <link rel="stylesheet" href="../css/loader-0.css">
    <link rel="stylesheet" href="../css/style.css" id="layoutstyle">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/wnoty.css">
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="../ajax/wheel.js"></script>
    <script src="../ajax/func.js"></script>
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
	<script src="https://d3js.org/d3-shape.v1.min.js"></script> 
	
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
<script>
    window.renderRecaptchas = function() {
        var recaptchas = document.querySelectorAll('.g-recaptcha');
        for (var i = 0; i < recaptchas.length; i++) {
            grecaptcha.render(recaptchas[i], {
                sitekey: recaptchas[i].getAttribute('data-sitekey')
            });
        }
    }
</script>
                
<script>    
 window.onerror = null;                              
$(function() {
  window.history.replaceState(null, null, window.location.pathname);
  

                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));

            });
                              function bots() {
if(navigator.onLine) {
 $.ajax({
            url: 'bots.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('bots()',<?=$fake_interval?>);
                              function historys() {
if(navigator.onLine) {
 $.ajax({
            url: 'core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				$("#oe").html(obj.online);
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('historys()',5000);
        
         function offliner() {
if(navigator.onLine) {
 $.ajax({
            url: 'offline.php',
            timeout: 10000,
            success: function(data) {
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('offliner()',30000);                     
            </script>

</head>

<body class="page-user no-touch">

    <div class="topbar-wrap" style="padding-top: 0px;">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="">
                    <style>
                        .mmmob {
                            display: none;
                        }

                        @media (max-width: 991px) {
                            .des {
                                display: none;
                            }

                            .mmmob {
                                display: block;
                            }

                            .desktop-nav {
                                margin-top: -55px;
                            }

                        }

                    </style>
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative" id="close-nav"><a class="toggle-nav">
                                <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>
                            </a></li>
                    </ul>
                    <center onclick="window.location.href='/'" class="desktop-nav" style="cursor:pointer;font-weight: 600;padding: 5px;color: #fff;font-size: 25px;"><?=$sitename?></center>
                </div>
            </div><!-- .container -->
        </div><!-- .topbar -->
        <div class="navbar">
            <div class="container">

                <div class="navbar-innr">

                    <ul class="navbar-menu des">
                         <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/check.php">Честная игра</a></li>
                        <li><a href="/faq.php">FAQ</a></li>
                        <li><a href="/support.php">Контакты</a></li>
                        <li><a href="/withdraws.php">Выплаты</a></li>
                        <?php if($is_admin == 1) { ?>
                        
                        <li><a href="/admin">Админка</a></li>
                        <?php } ?>
                    </ul>

                    
                     
                    <ul class="navbar-menu mmmob">
                        <li class="has-dropdown page-links-all"><a class="drop-toggle" href="#">Страницы</a>
                            <ul class="navbar-dropdown" style="color: #495463;">
                                <li><a href="/">Главная</a></li>
                                <li><a href="/check.php">Честная игра</a></li>
                                <li><a href="/faq.php">FAQ</a></li>
                                <li><a href="/support.php">Контакты</a></li>
                                <li><a href="/withdraws.php">Выплаты</a></li>
                             
                            </ul>
                        </li>
                       
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#game').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');">Играть</a></li>
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#profile').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');">Настройки</a></li>
                       <li><a class="asff4" onclick="location.href='<?=$site_support?>'">Служба поддержки</a></li>
                       
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#ref').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');">Мои рефералы</a></li>
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#bonus').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');">Раздача</a></li>
                        <?php if($is_admin == 1) { ?>
                        
                        <li><a class="asff4" onclick="location.href = '/admin';">Админка</a></li>
                        
                        <?php } ?>
                        <li><a class="asff4" onclick="exit();location.href = '';">Выйти</a></li>
                        
                        
                    </ul>
                    
                    
                    
                    <ul class="navbar-btns">
                        <li><a href="<?=$group?>" target="_blank" class="btn btn-sm btn-outline btn-light"><em style="color: #3b5998;" class="fab fa-vk"></em><span>Вконтакте</span></a></li>
                    </ul>
                </div><!-- .navbar-innr -->
            </div><!-- .container -->
        </div><!-- .navbar -->
    </div><!-- .topbar-wrap -->
<script>

    $(function() {
        
        $.ajax({
            type: 'POST',
            url: 'action.php',
            data: {
                type: 'newMes',
                sid: Cookies.get('sid')
                
            },
            success: function(data) {
             var obj = jQuery.parseJSON(data);
                if ('success' in obj) {
                    $('.new-mes').show();
                }
            }
        });
        
        
        
        
        updateProfit();
                $(window).scroll(function(){
                  var docscroll=$(document).scrollTop();
                  if(docscroll>$(window).height()){
                    $('token-statistics').css({'height': $('nav').height(),'width': $('nav').width()}).addClass('fixed');
                  }else{
                    $('token-statistics').removeClass('fixed');
                  }
                });
               //changeTowerAmount();
                    
            });
        </script>
        <div class="card-block" style="display:none">
                                                <div class="card-text">
                                                    <h1><?=$sitename?></h1>
                                                   <p>Если вы не знаете, чем заняться сегодня вечером, то рекомендуем вам обратить внимание на <b>онлайн игру <?=$sitename?></b>. Интернет сервис <?=$sitename?> представляет собой состязание с выбором суммы и шанса победы. Здесь не только увлекательные развлечения, но и множество преимуществ.</p>
                                                    <h2><?=$sitename?> - мобильная версия</h2>
                                                    <p>Глобальный прогресс не стоит на месте и сегодня есть у каждого возможность играть в нвути онлайн с мобильных устройств. Наш настоящий сайт v полностью адаптивен к вашим гаджетам. Официальный сайт становится доступен вне дома, будь-то работа, школа или парк.</p>
                                                    <p>Другими словами, сервис Нвути предлагает своим пользователям играть с мобильных устройств, причем для этого не нужно скачивать и устанавливать на свой телефон дополнительные приложения.</p>
                                                    
                                                    <h3>Играть на официальном сайте нвути в полном объёме честно</h3>
                                                    
                                                    <p>Так как в начале каждой игры виден хеш-код игры, благодаря ему не составит труда проверить сражение нвути. Вкладывая средства, вы можете быть уверены в том, что администрация сайта не выдает вам фальшивые данные, поскольку разработчики nvuti каждый день совершенствуют систему.</p>

                                                    <h3>Игра базируется на бонусах</h3>

                                                    <p>Если выпадает символ разброса, то начисляется стартовый бонус nvuti. Это означает, что игрок получает возможность <b>играть без депозита</b>.</p> 
                                                    <p>При этом на счет начисляются настоящие деньги, следовательно пользователь может поэкспериментировать с разнообразными стратегиями. Мы постоянно предоставляет различные бонусы и настоящие раздачи денег, которые дают шанс выиграть приз - Джек-пот.</p>

                                                    <h3>Делитесь с друзьями ссылкой нвути</h3>
                                                    <p>Приглашайте друзей выиграть денежный куш, сидя дома на диване или кресле, где вас ничего не отвлекает. Продвинутая реферальная система начисляет 10% за каждый депозит. Для этого проделайте один легкий шаг - отправьте ему ссылку на <b>сайт Нвути бест</b> или разместите в социальных сетях, форумах.</p>
                                                    <p>На подлинном сайте поддерживается более 20 видов оплаты, таких как: QIWI, WebMoney, VISA, MasterCard, Dash, Bitcoin, Payeer и многие другие. Посетители мгновенных игр часто задаются вопросом: «А какая у вас комиссия при пополнении?» Мы с радостью отвечаем, что на сайте <b>nvuti</b> никогда не было и не будет издержек.</p>
                                                    <p>По всем вопросам, связанным с регистрацией, можно проконсультироваться со службой онлайн-техподдержки, доступной в любое время.</p>
                                                    
                                                    <h4>Быстрые выплаты на настоящем сайте <?=$sitename?></h4>
                                                    <p>Программисты нашего официального сайта тащтельно слядет за игрой нвути. Благодаря им, вывод осуществляется за считанные минуты на любую платежную систему электронных денег.</p>
                                                    <p>Хотим заметить, что выплата возможна только на кошелек с которого был пополнен баланс на сайте нвути. Это одна из мер безопасности сайта <?=$sitename?> для защиты вашего баланса аккаунта от мошенников.</p>

                                                </div>
                                            </div>
<div class="page-content">
    <div class="container">
        <div class="row">
                                    <div class="aside sidebar-right col-lg-3 ">
<a href="#" data-toggle="modal" data-target="#promo" class="btn btn-info btn-xl btn-between w-100 mgb-1-5x">Активировать промокод <em class="ti ti-arrow-right"></em></a>
                                <div class="token-statistics card card-token height-auto ">
                    <div class="card-innr">
                        <div class="token-balance">


                            <div class="token-balance token-balance-with-icon mobile" style="margin-bottom: 0px;">
                                <div class="token-balance-text">
                                    <h6 class="card-sub-title"><?=$login?></h6>



                                    <span style="    color: #fff;font-weight: 500;font-size: 1.6em;line-height: 1;letter-spacing: -0.02em;" mybalanceMob="0.00" class="odometer" id="userBalanceMob">
                                        <?=$balance?></span>
                                </div>
                                <div style="margin:0 auto;">
                                    <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#modalDeposit" onclick="getNowDeposits()">Пополнить</span>
                                    <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#withdraw" onclick="getLasterMyWithdraws()">Вывести</span>
                                </div>


                            </div>




                            <div class="token-balance token-balance-with-icon kjfwf">
                                <div style="
    height: 50px;" class="token-balance-icon">
                                    <div class="user-photo" style="font-size:20px">
                                        <?=$img?>                                    </div>
                                </div>
                                <div class="token-balance-text">
                                    <h6 class="card-sub-title">
                                        <?=$login?>                                    </h6>



                                    <span style="    color: #fff;font-weight: 500;font-size: 1.6em;line-height: 1;letter-spacing: -0.02em;" mybalance="0.00" class="odometer" id="userBalance"></span>
                                </div>


                            </div>
                            <div class="kjfwf" style="margin:0 auto;"> <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#modalDeposit" onclick="getNowDeposits()">Пополнить </span>
                                <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#withdraw" onclick="getLasterMyWithdraws()">Вывести</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="token-sales card mrnr">
                    <div class="card-innr">
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12 ativemenu">
                                <a class="asff4 font-mid text-dark mfjkg" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#game').show(); $(this).addClass('mfjkg'); ">Играть</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#profile').show(); $(this).addClass('mfjkg'); ">Настройки аккаунта</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="location.href='<?=$site_support?>'">Служба поддержки</a>
                                <div class="new-mes" style="position: absolute;height: 14px;width: 14px;border-radius: 50%;border: 2px solid #fff;background: #2c80ff;content: '';top: 5px;right: 0px; display:none"> </div>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#ref').show(); $(this).addClass('mfjkg'); ">Мои рефералы</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <div class="asff4 font-mid text-dark" style="cursor:pointer;" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#bonus').show(); $(this).addClass('mfjkg'); ">Раздача</div>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <div class="font-mid text-dark" style="cursor:pointer" onclick="exit(); location.href = ''">Выход</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- .col -->

                           <style>
            @media (min-width: 768px) {
    .modal-dialog-md {
        min-width: 700px!important;
    }
            }
            .chat-wrap {
 position:relative;
 display:flex;
 height:calc(100vh - 265px);
 overflow:hidden
}
.chat-wrap .dropdown-content {
 box-shadow:0px 0 35px 0px rgba(0,0,0,0.05)
}
.chat-wrap .dropdown-content-top-left {
 top:0
}
.chat-wrap .simplebar-track,
.chat-wrap .simplebar-scrollbar {
 visibility:hidden !important
}
.chat-wrap .simplebar-content {
 display:flex;
 flex-direction:column
}
.chat-wrap .simplebar-scroll-content {
 padding-right:0 !important;
 margin-bottom:0 !important
}
.chat-wrap:after {
 position:absolute;
 top:0;
 left:0;
 bottom:0;
 right:0;
 content:'';
 background:rgba(0,0,0,0.3);
 visibility:hidden;
 opacity:0;
 transition:all .4s
}
.chat-wrap.contact-active:after,
.chat-wrap.information-active:after {
 opacity:1;
 visibility:visible
}
.chat-avatar {
 flex-shrink:0
}
.chat-avatar img {
 width:36px;
 border-radius:6px;
 border:2px solid #fff
}
.chat-avatar-xs img {
 width:18px
}
.chat-avatar-sm img {
 width:24px
}
.chat-avatar-lg img {
 width:40px
}
.chat-avatar.circle img {
 border-radius:50%
}
.chat-avatar-group {
 position:relative;
 border-radius:6px;
 overflow:hidden;
 border:2px solid #fff
}
.circle>.chat-avatar-group {
 border-radius:50%
}
.chat-avatar-group:before,
.chat-avatar-group:after {
 position:absolute;
 content:'';
 background-color:#fff;
 left:50%;
 z-index:1
}
.chat-avatar-group:before {
 height:100%;
 width:1px
}
.chat-avatar-group:after {
 top:50%;
 width:50%;
 height:1px
}
.chat-avatar-group img {
 border-radius:0 !important;
 border:none
}
.chat-avatar-group img:not(:first-child) {
 position:absolute;
 width:20px;
 right:0
}
.chat-avatar-group img:nth-child(2) {
 top:0
}
.chat-avatar-group img:nth-child(3) {
 bottom:0
}
.chat-name {
 margin-bottom:0;
 font-weight:500;
 font-size:14px;
 color:#495463
}
.chat-status {
 position:relative
}
.chat-status:after {
 position:absolute;
 height:10px;
 width:10px;
 border-radius:50%;
 top:-5px;
 right:-5px;
 border:2px solid #fff;
 content:'';
 background:#758698
}
.chat-status-idle:after {
 background:#ffc100
}
.chat-status-active:after {
 background:#00d285
}
.chat-status.circle:after {
 top:2px;
 right:2px
}
.chat-time {
 font-size:12px;
 color:#758698
}
.chat-time .icon {
 font-size:11px;
 color:#b9d2f2
}
.chat-time .icon:not(:first-of-type) {
 margin-left:-5px
}
.chat-time .icon+span {
 margin-left:2px
}
.chat-time span+.icon:first-of-type {
 margin-left:5px
}
.chat-seen .icon {
 color:#00d285
}
.chat-lock .icon {
 color:#495463;
 margin-right:10px
}
.chat-attachment {
 position:relative;
 max-width:130px;
 overflow:hidden
}
.chat-attachment:first-child {
 border-radius:4px 0 0 0
}
.self .chat-attachment:first-child {
 border-radius:0 4px 0 0
}
.chat-attachment:last-child {
 border-radius:0 4px 4px 0
}
.self .chat-attachment:last-child {
 border-radius:4px 0 0 4px
}
.chat-attachment:before {
 position:absolute;
 top:0;
 bottom:0;
 left:0;
 right:0;
 background:#000;
 content:'';
 opacity:.4;
 transition:all .4s
}
.self .chat-attachment:before {
 opacity:.7;
 background:#2c80ff
}
.chat-attachment:hover:before {
 opacity:0.6
}
.self .chat-attachment:hover:before {
 opacity:.9
}
.chat-attachment-caption {
 position:absolute;
 left:0;
 right:0;
 bottom:0;
 color:#fff;
 padding:7px 15px;
 font-size:13px;
 opacity:1;
 transition:all .4s
}
.chat-attachment-download {
 position:absolute;
 top:50%;
 left:50%;
 transform:translate(-50%, -50%);
 opacity:0;
 transition:all .4s;
 color:#fff;
 width:32px;
 line-height:32px;
 background:rgba(255,255,255,0.2);
 text-align:center
}
.chat-attachment-download:hover {
 color:#495463;
 background:#fff
}
.self .chat-attachment-download:hover {
 color:#2c80ff
}
.chat-attachment:hover .chat-attachment-caption {
 opacity:0
}
.chat-attachment:hover .chat-attachment-download {
 opacity:1
}
.chat-attachment-list {
 display:flex;
 margin:-5px
}
.chat-attachment-list li {
 width:33.33%;
 padding:5px
}
.chat-attachment-item {
 border:5px solid rgba(230,239,251,0.5);
 height:100%;
 min-height:60px;
 text-align:center;
 font-size:30px;
 display:flex;
 align-items:center;
 justify-content:center
}
.chat-users {
 display:none;
 align-items:center
}
.chat-users>* {
 padding:0 10px
}
.chat-users-stack {
 display:flex;
 flex-direction:row-reverse
}
.chat-users-stack .chat-avatar:not(:first-child) {
 margin-right:-12px
}
.chat-users-search {
 display:flex;
 margin:-5px
}
.chat-users-search>div {
 padding:5px
}
.chat-users-add {
 position:relative
}
.chat-contacts {
 position:absolute;
 left:-100%;
 top:0;
 width:350px;
 max-width:85%;
 flex-shrink:0;
 transition:all .4s;
 z-index:1;
 background:#fff;
 height:100%
}
.chat-contacts.active {
 left:0
}
.chat-contacts-tools {
 padding:20px;
 position:relative;
 overflow:hidden
}
.chat-contacts-tools-long {
 transition:all .4s
}
.chat-contacts-tools-short {
 transition:all .4s;
 position:absolute;
 top:20px;
 opacity:0
}
.chat-contacts-heading {
 background:#d2dde9;
 padding:5px 20px;
 display:flex;
 align-items:center;
 justify-content:space-between
}
.chat-contacts-heading .toggle-tigger {
 color:#758698;
 position:relative;
 top:2px
}
.chat-contacts-title {
 font-size:0.8rem;
 font-weight:500;
 letter-spacing:0.1em;
 margin-bottom:0;
 text-transform:uppercase;
 white-space:nowrap
}
.chat-contacts-title span {
 color:#758698
}
.chat-contacts-list {
 height:100%;
 width:350px;
 max-width:100%
}
.chat-contacts-wrap {
 height:calc(100% - 117px);
 overflow:hidden;
 position:relative
}
.chat-contacts-wrap:after {
 position:absolute;
 left:0;
 right:0;
 bottom:0;
 height:20px;
 content:'';
 background:linear-gradient(180deg, rgba(255,255,255,0) 0%, #fff 100%)
}
.chat-contacts-wrap .simplebar-content {
 padding-bottom:0 !important
}
.chat-contacts-item {
 display:flex;
 align-items:center;
 padding:8px 20px;
 min-height:96px;
 transition:background .4s
}
.chat-contacts-item:not(:last-child) {
 border-bottom:1px solid #e6effb
}
.chat-contacts-item:hover,
.chat-contacts-item.current,
.chat-contacts-item.active {
 background:#f7fafd
}
.chat-contacts-item.unseen p {
 font-weight:500;
 color:#292f37
}
.chat-contacts-content {
 padding-left:10px;
 transition:all .4s
}
.chat-contacts-content .chat-name {
 margin-bottom:3px
}
.chat-contacts-content p {
 color:#758698;
 font-size:12px;
 line-height:1.34;
 max-width:85%;
 margin-bottom:0;
 overflow:hidden;
 height:18px
}
.chat-contacts-badges {
 display:flex;
 align-items:center;
 margin:0 -3px;
 margin-bottom:2px
}
.chat-contacts-badges li {
 padding:0 3px;
 display:inline-flex
}
.chat-contacts-info {
 justify-content:space-between;
 align-items:center
}
.chat-contacts-texts {
 position:relative
}
.chat-contacts-texts .badge {
 position:absolute;
 right:0;
 top:50%;
 transform:translateY(-50%)
}
.chat-messages {
 display:flex;
 flex-direction:column;
 flex-grow:1
}
.chat-messages-head {
 position:relative;
 padding:14px 12px;
 display:flex;
 align-items:center;
 justify-content:space-between;
 border-bottom:1px solid #d2dde9
}
.chat-messages-name {
 font-weight:500;
 display:inline-flex;
 align-items:center
}
.chat-messages-name .icon {
 margin-left:7px
}
.chat-messages-name-ellipsis {
 width:80px;
 display:inline-block;
 white-space:nowrap;
 overflow:hidden;
 text-overflow:ellipsis
}
.chat-messages-tools {
 display:flex
}
.chat-messages-tools>li {
 padding:0 0;
 display:inline-flex
}
.chat-messages-tools>li>a {
 display:inline-flex;
 color:#495463;
 border-radius:50%;
 padding:7px
}
.chat-messages-tools>li>a.active {
 color:#2c80ff
}
.chat-messages-tools>li>a.show-information.active {
 color:#2c80ff;
 background:#e6effb
}
.chat-messages-search {
 position:absolute;
 top:100%;
 left:30px;
 right:30px;
 bottom:-20px;
 z-index:4;
 padding:10px 0 0 0;
 margin-top:1px;
 background:#fff;
 opacity:0;
 visibility:hidden;
 transition:all .4s
}
.chat-messages-search.active {
 transform:translateY(10px);
 opacity:1;
 visibility:visible
}
.chat-messages-body {
 height:calc(100% - 165px)
}
.chat-messages-body .simplebar-content {
 padding-top:15px;
 padding-bottom:15px
}
.chat-messages-list {
 padding:15px 12px 0
}
.chat-messages-item {
 display:flex;
 align-items:flex-end;
 padding:5px 0
}
.chat-messages-item.self {
 flex-direction:row-reverse
}
.chat-messages-sap {
 position:relative;
 width:70%;
 text-align:center;
 margin-left:auto;
 margin-right:auto;
 padding:5px 0
}
.chat-messages-sap span {
 display:inline-block;
 padding:0 20px;
 background:#fff;
 position:relative;
 z-index:5;
 color:#758698;
 font-size:13px
}
.chat-messages-sap:before {
 position:absolute;
 top:50%;
 height:1px;
 left:0;
 right:0;
 background:#e6effb;
 content:'';
 transform:translateY(-50%)
}
.chat-messages-content {
 margin:0;
 flex-grow:1
}
.chat-messages-bubble {
 position:relative;
 padding:16px 20px;
 background:#f7fafd;
 margin:4px 0;
 display:inline-block;
 border-radius:4px
}
.chat-messages-body .chat-messages-bubble {
 border-radius:4px 4px 4px 0;
 clear:both;
 float:left
}
.chat-messages-body .self .chat-messages-bubble {
 text-align:right;
 float:right;
 background:#2c80ff;
 color:#fff;
 border-radius:4px 4px 0 4px
}
.chat-messages-bubble p {
 margin-bottom:8px
}
.chat-messages-bubble p:last-of-type {
 margin-bottom:0
}
.chat-messages-bubble:hover .chat-messages-actions {
 opacity:1
}
.chat-messages-attachments {
 padding:4px 0;
 display:flex;
 width:100%;
 margin:0 -1px
}
.chat-messages-attachments>div {
 margin:0 1px
}
.self .chat-messages-attachments {
 flex-direction:row-reverse
}
.chat-messages-actions {
 position:absolute;
 left:100%;
 top:50%;
 transform:translateY(-50%);
 opacity:0;
 transition:all .4s;
 z-index:2
}
.self .chat-messages-actions {
 left:auto;
 right:100%
}
.chat-messages-actions>a {
 padding:0 20px;
 color:#495463
}
.chat-messages-actions>a:hover {
 color:#2c80ff
}
.chat-messages-badges {
 padding:4px 0 2px;
 display:flex;
 margin:0 -5px
}
.chat-messages-badges>div,
.chat-messages-badges>li {
 padding:0 5px
}
.chat-messages-info {
 display:flex;
 margin:0 -8px;
 padding-top:2px;
 clear:both;
 flex-wrap:wrap
}
.self .chat-messages-info {
 flex-direction:row-reverse
}
.chat-messages-info li {
 font-size:12px;
 padding:0 8px;
 position:relative
}
.chat-messages-info li:not(:last-child):after {
 position:absolute;
 right:0;
 top:50%;
 content:'';
 height:4px;
 width:4px;
 background:#d2dde9;
 border-radius:50%;
 transform:translate(50%, -50%)
}
.self .chat-messages-info li:not(:last-child):after {
 right:auto;
 left:0;
 transform:translate(-50%, -50%)
}
.chat-messages-info li a {
 color:#758698
}
.chat-messages-info li a:hover {
 color:#2c80ff
}
.chat-messages-info-name {
 width:100%
}
.chat-messages-info-name:after {
 display:none
}
.chat-messages-field {
 padding:0 12px 12px;
 margin-top:auto;
 display:flex;
 align-items:center
}
.chat-messages-field .toggle-mobile-content {
 bottom:100%;
 left:50%;
 transform:translateX(-50%)
}
.chat-messages-input {
 position:relative;
 flex-grow:1;
 margin-right:8px
}
.chat-messages-insert {
 margin:0 -10px;
 padding:0 5px;
 background:#fff
}
.chat-messages-insert li {
 padding:8px 10px
}
.chat-messages-icon {
 display:inline-flex
}
.chat-messages-icon a {
 display:inline-flex
}
.chat-information {
 width:350px;
 max-width:100%;
 padding:0 30px;
 flex-shrink:0;
 height:100%;
 overflow-y:scroll
}
.chat-information-wrap {
 position:absolute;
 right:-100%;
 top:0;
 transition:all .4s;
 width:350px;
 max-width:85%;
 height:100%;
 overflow:hidden;
 flex-shrink:0;
 background:#fff;
 z-index:1;
 padding:25px 0
}
.chat-information-wrap.active {
 right:0
}
.chat-information .accordion-content {
 padding-right:0 !important
}
.chat-information .accordion-heading {
 text-transform:uppercase;
 color:#495463;
 font-size:13px;
 font-weight:500;
 margin-bottom:16px;
 letter-spacing:0.03em
}
.chat-information .accordion-heading span {
 color:#758698;
 display:inline-block;
 margin-left:4px
}
.chat-details-item {
 margin-bottom:15px
}
.chat-details-title {
 font-weight:12px;
 color:#758698;
 margin-bottom:8px
}
.chat-details-info {
 display:flex;
 align-items:center
}
.chat-details-info .chat-name {
 margin-left:8px
}
.chat-details-drop {
 margin-left:auto;
 position:relative;
 display:inline-flex
}
.chat-details-drop>a {
 display:inline-flex;
 color:#758698
}
.chat-details-drop .dropdown-content {
 top:-5px
}
.chat-member-list {
 margin-left:-10px;
 margin-right:-10px;
 height:165px;
 margin-top:15px
}
.chat-member-item {
 position:relative;
 display:flex;
 align-items:center;
 padding:4px 10px
}
.chat-member-item .chat-name {
 margin-left:5px;
 color:#758698
}
.chat-member-item>* {
 position:relative;
 z-index:1
}
.chat-member-item:before {
 position:absolute;
 content:'';
 background:rgba(230,239,251,0.5);
 top:0;
 bottom:0;
 left:0;
 right:0;
 z-index:0;
 opacity:0;
 transition:all .4s
}
.chat-member-item:hover:before,
.chat-member-item:hover .chat-member-action {
 opacity:1
}
.chat-member-item:hover .chat-name {
 color:#495463
}
.chat-member-action,
.chat-member-position {
 margin-left:auto
}
.chat-member-action {
 position:relative;
 opacity:0;
 transition:all .4s
}
.chat-member-action a {
 position:relative;
 color:#758698;
 top:2px
}
.chat-member-action .dropdown-content {
 margin-top:-3px
}
.chat-member-position {
 color:#758698;
 font-size:11px
}
.chat-add-short {
 position:absolute;
 top:20px;
 left:20px;
 opacity:0;
 transition:all .4s
}
.btn-long {
 display:none
}
@media (min-width: 480px) {
 .chat-contacts-info {
  display:flex
 }
 .chat-contacts-content p {
  max-width:75%;
  height:auto
 }
 .btn-short {
  display:none
 }
 .btn-long {
  display:block
 }
}
@media (min-width: 576px) {
 .chat-messages-head {
  padding:14px 30px
 }
 .chat-messages-list {
  padding:15px 30px 0
 }
 .chat-messages-name-ellipsis {
  width:auto;
  max-width:220px
 }
 .chat-messages-info-name {
  width:auto
 }
 .chat-messages-info-name:after {
  display:block
 }
 .chat-messages-body .chat-messages-bubble {
  max-width:85%
 }
 .chat-messages-input {
  margin-right:20px
 }
 .chat-messages-field {
  padding:0 30px 30px
 }
 .chat-messages-field .toggle-mobile-content {
  transform:translateX(0)
 }
 .chat-messages-insert {
  display:flex
 }
}
@media (min-width: 992px) {
 .chat-wrap {
  overflow:visible
 }
 .chat-wrap:after {
  display:none !important
 }
 .chat-contacts {
  position:static
 }
 .chat-contacts.short {
  width:80px
 }
 .chat-contacts-list {
  min-width:350px
 }
 .chat-contacts-tools-long {
  opacity:1
 }
 .short .chat-contacts-tools-long {
  opacity:0
 }
 .chat-contacts-tools-short {
  opacity:0
 }
 .short .chat-contacts-tools-short {
  opacity:1
 }
 .chat-contacts-heading {
  justify-content:space-between
 }
 .short .chat-contacts-heading {
  justify-content:center
 }
 .short .chat-contacts-title {
  display:none
 }
 .short .chat-contacts-content {
  opacity:0
 }
 .chat-users {
  margin:0 -10px
 }
 .chat-users-search {
  transition:all .4s
 }
 .short .chat-users-search {
  opacity:0
 }
 .short .chat-add-short {
  opacity:1
 }
 .chat-information {
  min-width:350px
 }
 .chat-information-wrap {
  position:static;
  width:0;
  right:0
 }
 .chat-information-wrap.active {
  width:350px
 }
 .chat-users {
  display:flex
 }
 .chat-messages {
  border-left:1px solid #d2dde9;
  border-right:1px solid #d2dde9
 }
 .chat-messages-icon {
  display:none
 }
}
.timeline {
 position:relative;
 padding:15px 0
}
.timeline-wrap {
 position:relative;
 overflow:hidden;
 height:100%;
 min-height:300px
}
.timeline-wrap .timeline-innr {
 overflow-x:hidden;
 height:100%;
 position:absolute;
 padding-right:20px;
 padding-bottom:30px
}
.timeline-wrap.loaded .timeline-innr {
 padding-bottom:0
}

                .mobile{
                        display: none;
                    }
                    .desProfit{
                        display: block;
                    }
                    .mobileProfit {
                        display: none;
                    }
                    .heded{
                       height:210px
                    }
                    
                @media (max-width: 576px) {
                    .mobile{
                        display: flex;
                    }
                    .heded{
                       height: 120px
                    }
                   .mrnr{
                       display: none
                   }
                    
                    .hbetf{
                       display: none
                   }
                    .mobileProfit {
                        padding-top: 20px;
                        display: block;
                    }
                    .desProfit {
                        display: none;
                    }
                    .kjfwf {
                        display: none;
                    }
                }
                    
                    .mfjkg{
                        color:#2c80ff!important;
                        cursor:default;
                    }
                .asff4 {
                    color:#2c80ff;
                }
                </style>

            <style>


        .loader-support {
  --path: #253992;
  --dot: #2c80ff;
  --duration: 3s;
  width: 44px;
  height: 44px;
  position: relative;
}
.loader-support:before {
  content: '';
  width: 6px;
  height: 6px;
  border-radius: 50%;
  position: absolute;
  display: block;
  background: var(--dot);
  top: 37px;
  left: 19px;
  -webkit-transform: translate(-18px, -18px);
          transform: translate(-18px, -18px);
  -webkit-animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg {
  display: block;
  width: 100%;
  height: 100%;
}
.loader-support svg rect,
.loader-support svg polygon,
.loader-support svg circle {
  fill: none;
  stroke: var(--path);
  stroke-width: 6px;
  stroke-linejoin: round;
  stroke-linecap: round;
}
.loader-support svg polygon {
  stroke-dasharray: 145 76 145 76;
  stroke-dashoffset: 0;
  -webkit-animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg rect {
  stroke-dasharray: 192 64 192 64;
  stroke-dashoffset: 0;
  -webkit-animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg circle {
  stroke-dasharray: 150 50 150 50;
  stroke-dashoffset: 75;
  -webkit-animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}


@-webkit-keyframes pathRect {
  25% {
    stroke-dashoffset: 64;
  }
  50% {
    stroke-dashoffset: 128;
  }
  75% {
    stroke-dashoffset: 192;
  }
  100% {
    stroke-dashoffset: 256;
  }
}

@keyframes pathRect {
  25% {
    stroke-dashoffset: 64;
  }
  50% {
    stroke-dashoffset: 128;
  }
  75% {
    stroke-dashoffset: 192;
  }
  100% {
    stroke-dashoffset: 256;
  }
}
@-webkit-keyframes dotRect {
  25% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  50% {
    -webkit-transform: translate(18px, -18px);
            transform: translate(18px, -18px);
  }
  75% {
    -webkit-transform: translate(0, -36px);
            transform: translate(0, -36px);
  }
  100% {
    -webkit-transform: translate(-18px, -18px);
            transform: translate(-18px, -18px);
  }
}
@keyframes dotRect {
  25% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  50% {
    -webkit-transform: translate(18px, -18px);
            transform: translate(18px, -18px);
  }
  75% {
    -webkit-transform: translate(0, -36px);
            transform: translate(0, -36px);
  }
  100% {
    -webkit-transform: translate(-18px, -18px);
            transform: translate(-18px, -18px);
  }
}
@-webkit-keyframes pathCircle {
  25% {
    stroke-dashoffset: 125;
  }
  50% {
    stroke-dashoffset: 175;
  }
  75% {
    stroke-dashoffset: 225;
  }
  100% {
    stroke-dashoffset: 275;
  }
}
@keyframes pathCircle {
  25% {
    stroke-dashoffset: 125;
  }
  50% {
    stroke-dashoffset: 175;
  }
  75% {
    stroke-dashoffset: 225;
  }
  100% {
    stroke-dashoffset: 275;
  }
}
.loader-support {
  display: inline-block;
  margin: 0 16px;
}
    
    
    </style>

            <style>
                .mobile{
                        display: none;
                    }
                    . desProfit{
                        display: block;
                    }
                    .mobileProfit {
                        display: none;
                    }
                    .heded{
                       height:210px
                    }
                    
                @media (max-width: 576px) {
                    .mobile{
                        display: flex;
                    }
                    .heded{
                       height: 120px
                    }
                   .mrnr{
                       display: none
                   }
                    
                    .hbetf{
                       display: none
                   }
                    .mobileProfit {
                        padding-top: 20px;
                        display: block;
                    }
                    .desProfit {
                        display: none;
                    }
                    .kjfwf {
                        display: none;
                    }
                }
                    
                    .mfjkg{
                        color:#2c80ff!important;cursor:default;
                    }
                
                </style>

            <div class="main-content col-lg-9" id="game">



                <div class="content-area card">

                    <div class="card-innr">
                        <div class="card-head has-aside">
                            <h4 class="card-title">Режим игры</h4>
                        </div>
                        <style>
                            .avatar_in_roll{
            width: 60px;
    height: 60px;
    margin: 15px 1px;
    background-color: #2b3035;
    border-radius: 3px;
    background-size: 100% 100%;
    }
                        
                        </style>


                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dice-game">Nvuti</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#battle">Battle</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mines">Mines</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#newdice">Slider</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#coinflip">Coinflip</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#wheel">Wheel</a></li>
                        </ul>
                            
                        <div class="tab-content" id="profile-details">
                            <!-- WHEEL -->
                            
                            <div class="tab-pane fad" id="wheel">
                                <div class="KotDev.fun">
                                <div class="game-tbl">
                                    <center>
                                    <div id="activeBorder" class="wheel-circle" style="margin-bottom:140px">
                                    <img id="x50" src="../images/wheel.svg" class="relll" style="position:relative">
                                    <div class="arrow-chance" style="margin-top:-18%"> <i class="fas fa-location-arrow" id="chanceArrow"></i> </div>
                                   </div>
                                    </center>
                                    </div>
                                   <div class="right-side bets-tbl">
                                       <center>
                                       <div class="amount-bet box" >
                                    <div class="title text-uppercase">Сумма ставки</div>
                                    <div class="content amount-bet-content">
                                        <div class="amout-bet-content-inp" style="width:100%">
                                            <input class="input-bordered text-center" type="number" value="1" id="amountBetInputWheelGame" onkeyup="chanceGameCalculate()" onkeydown="chanceGameCalculate()" style="width: auto;"> </div>
                                            </div>
                                             </div>
                                            
                                      <div class="dice-game-box-percent">
                                                <button style="color: #fff;" class="btn btn-wheel-black dice-game-box-percent-btn" onclick="wheel('2')">x2</button>
                                                <button style="color: #fff;" class="btn btn-danger btn-wheel-red dice-game-box-percent-btn" onclick="wheel('3')">x3</button>
                                                </div><div class="dice-game-box-percent">
                                                <button class="btn btn-wheel-blue dice-game-box-percent-btn" onclick="wheel('5')" style="background: #345ed7;color: #fff;">x5</button>
                                                <button class="btn btn-wheel-yellow dice-game-box-percent-btn" onclick="wheel('50')" style="background: #eed152;color: #fff;border: 0;">x50</button>
                            </div><br>
                            
                            </center>
                        </div>
                </div>
                                </div>
                                
                            <!-- COINFLIP -->
                            <div class="tab-pane fad" id="coinflip">
                                <div class="game-tbl">
                               <center>
                                   <div id="coin">
                                    <div class="side-a"><img src="../images/orel.png" /></div>
                                    <div class="side-b"><img src="../images/reshka.png" /></div>    
                                        </div>
                               </center>
                           </div>
                           <div class="bets-tbl" id="betsss">
                               <div class="amount-bomb box">
                                    <div class="title text-uppercase text-center"> Сделать ставку </div>
                                    <div class="content">
                                        <input style="width:100%;" class="input-bordered text-center" id="coinflipBet" value="1" placeholder="Сумма ставки">
                                  <div class="dice-game-box-percent coinflipButtons">

                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn" onclick="coinflipbet('1')">Орёл<sup>x2</sup></button>
                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn btn-wheel-red" onclick="coinflipbet('30')">Ребро<sup>x10</sup>
                                                </button>
                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn btn-wheel-yellow" onclick="coinflipbet('2')"><center>Решка<sup>x2</sup></center>
                                                </button>
                                                </div><center>
                                            </center></div>


                                </div>
                           </div>
              
                            </div>
                            <!-- SLIDER -->
                            <div class="tab-pane fad" id="newdice">
                                <div class="game_chance">
				<p class="game_chance_txt">
					Шанс на победу <br></br>					<span class="game_chance_value" style="color:#000">
						<span id="one" class="percent_box">50.00</span>%
					</span>
				</p>
				<p class="game_chance_txt">
					Выплата	<br></br>					<span class="game_chance_value">
						<span id="winner">1.98</span>x
					</span>
				</p>
			</div>
                             <div class="wrap_range">
				<div class="index__home__indicator__inner index__home__indicator__inner--line" style="display:none;">
					<div class="index__home__indicator__inner__number is-rolling is-hidden " style="transform: translate(-45%, 20px);">
						<div class="index__home__indicator__inner__number__roll is-negative ">
							<img alt="vk.com/id321223555" src="/cub.svg" class="roll-img"><span id="nums">0.00</span>
						</div>
					</div>
				</div>
				
				<div style="margin-top:30px">
<div class="row no-gutters height-100">
				<input type="range" oninput="fun1()" id="r1" name="chance" style="width:100%;background: -webkit-linear-gradient(left, rgb(241, 2, 96) 0%, rgb(241, 2, 96) 50%, rgb(8, 229, 71) 50%, rgb(8, 229, 71) 100%);" min="2" value="50" max="98" step="0.01" class="range rangeFindOne">
                                    
			</div><br>
			<br>
			<br>
			<input style="float:left" class="input-bordered text-center col-md-4 dice-input" id="betSizeDice" value="1" placeholder="Сумма ставки">
		
		
			<button style="color:#fff; float:right" onclick="betdice()" class="btn btn-light btn-block col-md-4" id="betDice">Сделать ставку <i class="fas fa-coins"></i></button>
			<br>
                            </div>
                            </div>
                            </div>

                            <!-- MINES -->
                           
                            <div class="tab-pane fad" id="mines">
                                 <center>
                                <div class='mine-game-tbl'>
                                   <div class="minefield">
								<button class="mine" data-number="1" disabled="">1</button>
								<button class="mine" data-number="2" disabled="">2</button>
								<button class="mine" data-number="3" disabled="">3</button>
								<button class="mine" data-number="4" disabled="">4</button>
								<button class="mine" data-number="5" disabled="">5</button>
								<button class="mine" data-number="6" disabled="">6</button>
								<button class="mine" data-number="7" disabled="">7</button>
								<button class="mine" data-number="8" disabled="">8</button>
								<button class="mine" data-number="9" disabled="">9</button>
								<button class="mine" data-number="10" disabled="">10</button>
								<button class="mine" data-number="11" disabled="">11</button>
								<button class="mine" data-number="12" disabled="">12</button>
								<button class="mine" data-number="13" disabled="">13</button>
								<button class="mine" data-number="14" disabled="">14</button>
								<button class="mine" data-number="15" disabled="">15</button>
								<button class="mine" data-number="16" disabled="">16</button>
								<button class="mine" data-number="17" disabled="">17</button>
								<button class="mine" data-number="18" disabled="">18</button>
								<button class="mine" data-number="19" disabled="">19</button>
								<button class="mine" data-number="20" disabled="">20</button>
								<button class="mine" data-number="21" disabled="">21</button>
								<button class="mine" data-number="22" disabled="">22</button>
								<button class="mine" data-number="23" disabled="">23</button>
								<button class="mine" data-number="24" disabled="">24</button>
								<button class="mine" data-number="25" disabled="">25</button>	
                                </div>
                                </div>	
                                <div class='mine-bets-tbl' >
                                    <input style="width:100%;" class="input-bordered text-center" id="amountBetInputBomb" value="1" placeholder="Сумма ставки"><br>
                                    <button id="startmines" class="btn btn-primary" style="width:49%; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;margin-bottom:8px;" onclick="startgame()">Начать игру</button>
                                    <button id="finishmines" class="btn btn-primary" style="width:49%; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;margin-bottom:8px;" onclick="finishgame()" disabled="">Забрать</button>
                                    <br>
                                    
                                    <div class='select-bomb' style=''>
                                       
                    <p><span>Число мин:</span></p>
                   
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="3">3</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="5">5</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="10">10</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="24">24</span>
                                        
                                        
                                    </div>
                                    <br>
                                    <div style='display:inline-block; float:left'>
                                    <p><span style='margin-top:7px'>Следующий икс:</span></p>
                                    <p><span class="" style="font-size:44px;" id="MineProfit">1.00</span> <span style="font-size:44px;"> X</span></p>
                                    </div>
                                    <div style='display:inline-block; float:right'>
                                    <p><span style='margin-top:7px'>Выигрыш:</span></p>
                                    <p><span class="" style="font-size:44px;" id="win">0.00</span> <span style="font-size:44px;"> Р</span></p>
                                    </div>
                                </div>
                                </div>
                               
                                
                                <!-- END -->
                            
                            <!-- BATTLE -->
                            <div class="tab-pane fad" id="battle">
                           
                            <center>
    <div class="cg_graph_block game-tbl" style="">
    <div class="cursor"><i class="fas fa-sort-up"></i></div>
    <div class="battle-roulette no-copy">
      <div class="counter flex">
        <span id="timer" style="font-size: 40px;text-align: center;">
          <span style="display: block;font-size: 15px;color: gray;font-weight: 100;">Возможный выигрыш</span>
          <num style="font-size:28px" id="ProfitBattle">2.00</num>
          </span></div>
    <svg id="cricle"  version="1" xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 400 400" >
      <defs><linearGradient id="grad2" x1="0%" y1="0%" x2="0%" y2="100%">
          <stop offset="0%" style="stop-color:#5dc0ff;stop-opacity:1"></stop>
          <stop offset="100%" style="stop-color:#0b6cee;stop-opacity:1"></stop>
          </linearGradient></defs>
          <defs><linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:#ff7365;stop-opacity:1;"></stop>
            <stop offset="100%" style="stop-color:#f92e7f;stop-opacity:1"></stop>
            </linearGradient></defs>
            <g class="chart" transform="translate(200, 200)">
              <g class="timer" transform="translate(0,0)">
                <g class="bets" id="circle" style="transform: rotate(0deg); transition: transform 4s cubic-bezier(0.15, 0.15, 0, 1);">
                  <path id="blue" fill="url(#grad2)" d="M1.1021821192326179e-14,-180A180,180,0,1,1,1.1021821192326179e-14,180L9.491012693391987e-15,155A155,155,0,1,0,9.491012693391987e-15,-155Z" transform="rotate(0)" style="opacity: 1;"></path>
                  <path id="red" fill="url(#grad1)" d="M1.1021821192326179e-14,180A180,180,0,1,1,-3.3065463576978534e-14,-180L-2.847303808017596e-14,-155A155,155,0,1,0,9.491012693391987e-15,155Z" transform="rotate(0)" style="opacity: 1; "></path>
                  </g></g></g></svg>
                  </div>
                  </div>
 
                         
                            
                            <div class="col-md-6 bets-tbl" style="">
                            <div class="row">
                            <!-- INPUTS -->
                            <div class="col-6">
                                                    <div class="input-item input-with-label">
                                                        <label for="full-name" class="input-item-label text-center">Сумма</label>
                                                        <input autocomplete="off" id="BetSizeBattle" onkeyup="profitbattle();" class="input-bordered text-center" value="1">
                                                    </div><!-- .input-item -->

                                                    
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label"><label for="full-name" class="input-item-label text-center">Процент</label><input autocomplete="off" class="input-bordered text-center" type="text" name="full-name" value="50" id="BetPerBattle" onkeyup="battlechance(this); profitbattle()" ></div><!-- .input-item -->
                                                   
                                                </div>
                                                  
                            <!-- END INPUTS -->
                            <!-- <div class="row" style="margin-top:-7px"> -->
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center">0 - <span id="MinRangeBattle">499</span></span>
                                                            <div id="BattleMin" class="input-item input-with-label"><a id="redselect" onclick="select_team('red', 'blue')" style="" class="btn btn-light btn-block btn-outline"><i class="fa fa-angle-down red"></i> Красный</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center"><span id="MaxRangeBattle">500</span> - 999</span>
                                                            <div id="BattleMax" class="input-item input-with-label btn-block"><a id="blueselect" style="" onclick="select_team('blue', 'red')" class="btn btn-light btn-block btn-outline"><i class="fa fa-angle-up blue"></i> Синий</a></div><!-- .input-item -->
                            
                                                        </div>
                            
                            </div>
                            <button style="color:#fff; " onclick="battlebet()" class="btn btn-light btn-block" id="createBetBattle">Сделать ставку <i class="fas fa-coins"></i></button>
                            <div id="error_battle" style="display:none;pointer-events: none; box-shadow: rgba(255, 105, 114, 0.14) 0px 5px 23px 0px;" class="btn  btn-block bg-danger"></div>
                            
                           <div id="success_battle" style="display:none;pointer-events: none; box-shadow: rgba(255, 105, 114, 0.14) 0px 5px 23px 0px;" class="btn  btn-block bg-success"></div>
                            </div>
                            </div> <!-- ROW -->
                            </center>
                            <div class="tab-pane fade active show" id="dice-game">
                                <div style="margin-top:30px">

                                    <div class="row no-gutters height-100">
                                        <div class="col-md-6 ">

                                            <div class="row">
                                                <div class="col-12 mobileProfit">
                                                    <ul class="token-info-list text-center" style="padding-bottom:0px">
                                                        <li class="" style="font-size:64px;margin-top:-47px" id="BetProfitD">1.11</li>
                                                        <span class="card-sub-title card-tyy">Возможный выигрыш</span>
                                                    </ul>

                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label">
                                                        <label for="full-name" class="input-item-label text-center">Сумма</label>
                                                        <input autocomplete="off" id="BetSize" onkeyup="validateBetSizeD(this);updateProfit()" class="input-bordered text-center" value="1">
                                                    </div><!-- .input-item -->

                                                    <div class="d-sm-flex justify-content-center" style="width:100%;margin:0">
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()">Удвоить</span>
                                                        <span onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px">Половина</span>
                                                    </div>

                                                    <style>
                                                        .tll{
                                                            margin-left:-15px; margin-top:6px
                                                        }
                                                   @media (max-width: 576px) {
                                                       .tll{
                                                           margin-left:19px; margin-top:6px
                                                       }
                                                    }
                                                    </style>
                                                    <div class="d-sm-flex justify-content-center tll" style="">
                                                        <span onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;">Макс</span>
                                                        <span onclick="$('#BetSize').val(1);updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px">Мин</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label"><label for="full-name" class="input-item-label text-center">Процент</label><input autocomplete="off" class="input-bordered text-center" type="text" name="full-name" value="90" id="BetPercent" onkeyup="validateBetPercentD(this);updateProfit()"></div><!-- .input-item -->
                                                    <div class="d-sm-flex justify-content-center" style="width:100%;margin:0">
                                                        <center>
                                                                                                                <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()">Удвоить</span>
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()">Половина</span>
                                                    </center></div>
                                                    <div class="d-sm-flex justify-content-center tll">
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(95);updateProfit()">Макс</span>
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px" onclick="$('#BetPercent').val(1);updateProfit()">Мин</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center hbetf" style="margin-top:30px ">
                                                    <center style="font-size:12px">Hash игры:</center>
                                                    <span id="hashBet">
                                                        7638577a6ed7805e1f4de47f163cafab0beeacb0a66c58423181c6c32061d09d435f485ba81bf4be8621c6e2b500c181d8fb2b407b419d901d64e027bbc5e26c


                                                    </span>
                                                </div>


                                            </div>
                                            <script>
                                                function validateBetPercentD(inp) {
                                                    if (inp.value > 95) {
                                                        inp.value = 95;
                                                    }


                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
                                            <script>
                                                function validateBetSizeD(inp) {

                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>


                                        </div>
                                        <div class="col-md-1 "></div>
                                        <div class="col-md-5 height-100">
                                            <div class="token-info  ">
                                                <div class="heded">
                                                    <ul class="token-info-list text-center desProfit">
                                                        <li class="" style="font-size:64px;margin-top:-47px" id="BetProfit">19</li>
                                                        <span class="card-sub-title card-tyy">Возможный выигрыш</span>
                                                    </ul>
                                                    <div class="row" style="margin-top:-7px">
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center">0 - <span id="MinRange"></span></span>
                                                            <div id="buttonMin" class="input-item input-with-label"><a onclick="betMin()" style="color:#fff" class="btn btn-light btn-block">Меньше</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center"><span id="MaxRange"></span> - 999999</span>
                                                            <div id="buttonMax" class="input-item input-with-label btn-block"><a style="color:#fff" onclick="betMax()" class="btn btn-light btn-block">Больше</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-12" style="margin-top:-20px">
                                                           <div style="background:#fff;padding:0px 20px!important" class="btn  btn-block"></div>

                                                        </div>

                                                        <div class="col-12">
                                                            <center>
                                                                <div id="betLoad" class='cssload-loader' style="background: none;display:none">
                                                                    <div class='cssload-inner cssload-one'></div>
                                                                    <div class='cssload-inner cssload-two'></div>
                                                                    <div class='cssload-inner cssload-three'></div>
                                                                </div>
                                                            </center>
                                                            <div id="succes_bet" style="background: linear-gradient(to right, #0ACB90, #2BDE6D);display:none;pointer-events:none;box-shadow: 0 5px 23px 0 rgba(0, 215, 126, 0.27);" class="btn btn-success btn-block"></div>


                                                        </div>
                                                        <div class="col-12">
                                                            <div id="error_bet" style="display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>
                                                        </div>


                                                    </div>
                                                    <center id="checkBet" data-toggle="modal" data-target="#checkDiceModal" style="text-align: center; margin-top:5px;display:none;-webkit-user-select: none;-moz-user-select: none; cursor:pointer" href="">Проверить игру</center>
                                                    <div class="modal fade" id="checkDiceModal" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                                                            <div class="modal-content"><a style="cursor:pointer" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                                                                <div class="popup-body" id="modalDice">


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <script>
                            function exit() {
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "exit"
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
					location.reload(true);
                                                                return 
                                            }else{
                                               
				alert('Что-то пошло не так, обратитесь в поддержку...');
                                            }
                                        }   
   });
                              
}
                                  //bets 
                                                        function betMin() {
                                    var nwin = $('#MinRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
					$('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
										},	
                                                                                data: {
                                                                                    type: "minbet",
                                                                                  win: coef,
                                                                                  sum: sum,
                                                                                   nwin: nwin,
                                                                                  per: $('#BetPercent').val()
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
                                               
					$('#error_bet').css('display', 'none');							   
				$('#succes_bet').show();																		$('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return 
                                            }else{
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance); 
				$('#succes_bet').css('display', 'none');								$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#error_bet').css('display', '');
												
											}
                                        }
                                    });
                                                          
}
                                                     
                                  function betMax() {
                                    var nwin = $('#MaxRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
											
$('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
										},	
                                                                                data: {
                                                                                    type: "maxbet",
                                                                                    win: coef,
                                                                                    sum: sum,
                                                                                    nwin: nwin,
                                                                                    per: $('#BetPercent').val()
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
											   
			$('#error_bet').css('display', 'none');																			$('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#succes_bet').css('display', '');
                                            }else{
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
$('#succes_bet').css('display', 'none');									$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash);                                                               return $('#error_bet').css('display', '');
												
											}
                                        }
                                    });
}                                                           
                                                        

                                                    </script>

                                                    <script>
                                                        function updateProfit() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#BetProfitD').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    }

                                                                    function sss() {
                                                                        $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
                                                                    }
                                                                    $('#BetPercent').keyup(function() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    });
                                                                    $('#BetSize').keyup(function() {
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                    });
                                                        
                                                        function updateBalance(start, end) {

                var el = document.getElementById('userBalance');

                od = new Odometer({
                    el: el,
                    value: start
                });

                od.update(end);
                                                            
                var elMob = document.getElementById('userBalanceMob');

                odelMob = new Odometer({
                    el: elMob,
                    value: start
                });

                odelMob.update(end);
            }
                                                                </script>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <style>
                                    .effect-shine {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
}

@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}
                                    
                                    
                                </style>
                                
                                <div class="card-head has-aside" style="margin-top:80px">
                                    <h4 class="card-title">Последние игры</h4>
                                    <div style="margin-left: 177px;display: inline-block;position: absolute;" class="circle-online pulse-online"></div>
                                    <span id='oe' style="margin-left: 194px;display: inline-block;position: absolute;margin-top: 3px;"><?=$online?> </span>
                                    
                                    <div class="card-opt"><a style="opacity: 0.8;font-weight: bolder;" onclick="$('.jghtt').fadeToggle(); $('.ngh').toggle();" class="link link-light ">
                                        <span class="ngh"><em class="ti ti-angle-down" style="font-size: 17px;cursor:pointer"></em></span>
                                        <span class="ngh" style="font-weight: 400; display: none;font-size: 17px;cursor:pointer"><em class="ti ti-angle-up"></em></span>
                                        </a><div class="toggle-class dropdown-content"><ul class="dropdown-list"><li><a href="#">30 days</a></li><li><a href="#">1 years</a></li></ul></div></div>
                                </div>
                                <table class="table jghtt tnx-table table-responsive text-center" style="margin-top:20px">
                                    <thead>
                                        <tr>
                                            <th style="width:14%">Логин</th>
                                            <th style="width:15%">Число</th>
                                            <th style="width:15%">Цель</th>
                                            <th style="width:15%">Сумма</th>
                                            <th style="width:15%">Шанс</th>
                                            <th style="width:15%">Выигрыш</th>

                                        </tr><!-- tr -->
                                    </thead>
                                    <tbody id='response'>
                                        <tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr><tr>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                                </div>
                                            </td>
                                            
                                        </tr>

                                        <tr style="opacity:0">
                                            <td>Login</td>
                                            <td class="text-danger" style="font-weight:600">234234</td>
                                            <td>499999 - 999999</td>
                                            <td>242434</td>
                                            <td>
                                                <div class="progress effect-shine">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td class="text-danger" style="font-weight:600">0.00</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div><!-- .tab-pane -->
                            

                        </div>
                    </div> <!-- .card-innr -->
                </div> <!-- .content-area -->
            </div><!-- .col -->



            <div class="main-content col-lg-9" id="support" style="display:none" >
                    <div class="loader-support " id="loaderSupport" style="display:none">
                                    <svg viewBox="0 0 80 80">
                                        <circle id="test" cx="40" cy="40" r="32"></circle>
                                    </svg>
                                </div>

                    <script>

                        function  chsel(){
                        $('#notch').hide();
                        if ($('#typet').val() == 1){
                            $('#notch_m').html('Обязательно укажите дату, платежную систему, сумму и детали платежа (комментарий, номер транзакции и т.д.)');
                            $('#notch').show();
                        }
                        if ($('#typet').val() == 2){
                            $('#notch_m').html('Обязательно укажите ID вывода (первый столбец в истории)');
                            $('#notch').show();
                        }
                    }
                    
                    </script>

                    <div class="content-area card">
                        
                        
                        <div class="content-area " id="createTicket" style="display:none">
                            <div class="card-innr card-innr-fix">
                                <div class="card-head has-aside">
                                    <h4 class="card-title">Новый тикет</h4>
                                    <div class="card-opt"><a onclick="$('#createTicket').hide();$('#listTickets').fadeIn(1000);" style="cursor:pointer;color:#2c80ff" class="link ucap  "><em class="fas fa-arrow-left mr-2"></em> Назад</a></div>
                                </div>
                                <div class="gaps-1x"></div><!-- .gaps -->

                                <div class="input-item input-with-label"><label class="input-item-label ">Раздел</label>

                                    <div class="select-wrapper">
                                        <select id="typet" class="input-bordered" autocomplete="off" onchange="chsel()">
                                            <option style="display:none;"></option>
                                            <option value="1">Проблема с пополнением</option>
                                            <option value="2">Проблема с выводом</option>
                                            <option value="3">Сотрудничество</option>
                                            <option value="4">Жалобы/предложения</option>
                                            <option value="5">Другое</option>
                                        </select></div>

                                </div>
                                <div class="input-item input-with-label"><label class="input-item-label ">Тема</label><input id="sub" class="input-bordered" type="text" autocomplete="off"></div>
                                <div class="input-item input-with-label"><label class="input-item-label ">Сообщение</label><textarea id="mes" class="input-bordered input-textarea" autocomplete="off"></textarea>
                                </div>
                                <div id="notch" class="token-calc-note note note-plane mb-10" style="display:none"><em class="fas fa-info-circle text-light"></em><span style="font-size: 13px !important;
margin-bottom: 15px;" class="note-text text-light" id="notch_m"></span></div>

                                <div id="te" class="note note-plane note-danger note-sm pdt-1x pl-0" style="color: rgba(255,104,104,0.9) !important;display:none"></div>
                                <div class="gaps-1x"></div>

                                <button id="sbt" class="btn btn-primary" onclick="sendTicket()">Отправить</button>

                            </div><!-- .card-innr -->
                        </div>
                        
                        <div class="token-transaction  card-full-height" id="listTickets" style="display:none">
                            <div class="card-innr">
                                <div class="card-head has-aside">
                                    <h4 class="card-title">Служба поддержки</h4>
                                    <div class="card-opt"><a onclick="$('#listTickets').hide();$('#createTicket').fadeIn(1000);" style="cursor:pointer;color:#2c80ff" class="link ucap  "><em class="fas fa-plus mr-2 mb-1"></em> Создать тикет </a></div>
                                </div>
                                
                             <div id="pqfwf"></div>


                                


                            </div>
                        </div>
                    
                        <div class="chat-wrap" id="chat" style="display:none;height: auto!important;">
                        </div>

                        <script>
                            
                            
                            function closeTicket(id){
                                
                                 $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    data: {
                                        id: id,
                                        type: 'closeTicket',
                                        sid: Cookies.get('sid')
                                        
                                    },
                                    success: function(data) {
                                     var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            return supStart();
                                        }
                                    }
                                });
                                
                            }
                                
                                function showIdTicket(id) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#loaderSupport').show();
                                    },
                                    data: {
                                        type: 'showIdTicket',
                                        sid: Cookies.get('sid'),
                                        id: id
                                    
                                    },
                                    success: function(data) {
                                        $('#loaderSupport').hide();
                                        
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            $('#listTickets').hide();
                                            $('#createTicket').hide();
                                            $('#chat').show();
                                            $('#chat').html(obj.success.text);
                                            $('input').focus();
        var block = document.getElementById("scbd");
                                            block.scrollTop = block.scrollHeight;
                                            
     $('[data-target="ch"]').each(function (index, value) { 
  $(this).html($(this).text().replace(/([^\S]|^)(((https?\:\/\/)|(www\.))(\S+))/gi,  function(match, space, url){
      var hyperlink = url;
      if (!hyperlink.match('^https?:\/\/')) {
        hyperlink = 'http://' + hyperlink;
      }
      return space + '<a target="_blank" style="color: black;box-shadow: 0 1px 0 currentColor;"href="' + hyperlink + '">' + url.toLowerCase() + '</a>';
    }));
});
                                            
                                            
                                            
                                        }

                                    }
                                });
                                
                            }
                                
                                
                            function sendMes(nti){

                              
                                if ($('#mesT').val() == "") {
                                    $('#tee').css('display', 'block');
                                    return $('#tee').html('Введите сообщение');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#tee').css('display', 'none');
                                        $('#sbtM').addClass('disabled');
                                    },
                                    data: {
                                        type: 'sendMessage',
                                        id: nti,
                                        sid: Cookies.get('sid'),
                                        mes: $('#mesT').val()
                                    },
                                    success: function(data) {
                                        $('#sbtM').removeClass('disabled');
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            $('#chdi').html($('#chdi').html() + '<div class="chat-messages-item self"><div class="chat-messages-content"><div class="chat-messages-bubble"><p>' + obj.success.mes + '</p></div><ul class="chat-messages-info"><li><a href="#"></a></li></ul></div></div>');
                                            var block = document.getElementById("scbd");
                                            block.scrollTop = block.scrollHeight;
                                            return $('#mesT').val('');
                                        }else{
                                           
                                        $('#tee').html(obj.error.text);
                                        $('#tee').css('display', 'block');
                                        }

                                    }
                                });
                                

                            }
                            
                            
                            
                            
                            
                            function supStart() {
                                
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#loaderSupport').show();
                                    },
                                    data: {
                                        type: 'getTicketList',
                                        sid: Cookies.get('sid')
                                    },
                                    success: function(data) {
                                        $('#loaderSupport').hide();
                                        
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                           $('.new-mes').hide();
                                           $('#listTickets').show();
                                           $('#chat').hide();
                                           return $('#pqfwf').html(obj.success.text);
                                        } 

                                    }
                                });
                                
                            }
                            
                            
                            function sendTicket() {
                                //$('#te').css('display', 'none');

                                if ($('#typet').val() < 1 || $('#typet').val() > 5) {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Укажите раздел');
                                }
                                if ($('#sub').val() == "") {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Укажите тему');
                                }
                                if ($('#mes').val() == "") {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Введите сообщение');
                                }


                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#te').css('display', 'none');
                                        $('#sbt').addClass('disabled');
                                    },
                                    data: {
                                        type: 'createTicket',
                                        sid: Cookies.get('sid'),
                                        cr: $('#typet').val(),
                                        sub: $('#sub').val(),
                                        mes: $('#mes').val()
                                    },
                                    success: function(data) {
                                        $('#sbt').removeClass('disabled');
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            showIdTicket(obj.success);
                                            
                                            // return false;
                                        } else {

                                            $('#te').html(obj.error.text);
                                            $('#te').css('display', 'block');
                                        }

                                    }
                                });



                            }

                        </script>




                    </div> <!-- .content-area -->
                </div><!-- .col -->
              
            <div class="main-content col-lg-9" id="profile" style="display:none">
                <div class="content-area card">
                    <div class="card-innr">
                        <div class="card-head">
                            <h4 class="card-title">Ваш профиль</h4>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Изменить пароль</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Социальные сети</a></li>
                        </ul><!-- .nav-tabs-line -->
                        <div class="tab-content" id="profile-details">
                            <div class="tab-pane fade show active" id="personal-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label"><label for="full-name" class="input-item-label">Новый пароль</label><input id="resetPass" class="input-bordered" type="password"></div><!-- .input-item -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label"><label for="full-name" class="input-item-label">Повторите пароль</label><input id="resetPassRepeat" class="input-bordered" type="password"></div><!-- .input-item -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a id="error_resetPass" class="btn  btn-block btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto"></a>
                                        <a id="succes_resetPass" class="btn  btn-block btnSuccess" style="display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));">Пароль изменен</a>
                                    </div>
                                </div>
                                <div class="gaps-1x"></div><!-- 10px gap -->
                                <div class="d-sm-flex justify-content-between align-items-center"><button class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" onclick="resetPass()">Изменить</button>

                                    <script>

                                        function resetPass() {
										if ($('#resetPass').val() == ''){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Введите пароль');
										}
										if ($('#resetPass').val().length < 5){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароль от 5 символов');
										}
									if ($('#resetPass').val() != $('#resetPassRepeat').val()){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароли не совпадают');
									}
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#error_resetPass').hide();
											$('#succes_resetPass').hide();
										},	
                                        data: {
                                            type: "resetPassPanel",
                                            sid: Cookies.get('sid'),
                                            newPass: $('#resetPass').val()
                                        },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $("#succes_resetPass").show();
											 
																						 return false;
                                            }else{
												$('#error_resetPass').show();
												return $('#error_resetPass').html(obj.error);
											}
                                        }
                                    });
                                    
                                }
								</script>






                                    <div class="gaps-2x d-sm-none"></div>
                                </div>

                            </div><!-- .tab-pane -->
                            
                            <div class="tab-pane fade" id="settings">
                                                        
                            Привязан аккаунт: <a href="<?=$social_link?>" target="_blank"><?=$social_link?></a>
                                                            </div><!-- .tab-pane -->
                            

                        </div><!-- .tab-content -->
                    </div><!-- .card-innr -->
                </div>
            </div>
        
<div class="main-content col-lg-9" id="ref" style="display:none">
                <div class="content-area card">
                    <div class="card-innr">
                        <div class="card-head">
                            <h5 class="card-title card-title-md">Приглашайте друзей и зарабатывайте</h5>
                        </div>
                        <div class="card-text">
                            <p>Получайте <strong>10% сразу на баланс</strong> с каждого пополнения реферала.</p>
                        </div>
                        <div class="referral-form">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 font-bold">Ваша ссылка</h5>
                            </div>
                            <div class="copy-wrap mgb-1-5x mgt-1-5x"><span class="copy-feedback"></span><em class="fa fa-link"></em><input type="text" class="copy-address" value="http://<?=$linksite?>/?i=<?=$id?>" disabled=""><button class="copy-trigger copy-clipboard" data-clipboard-text="http://<?=$linksite?>/?i=<?=$id?>"><em class="ti ti-files"></em></button></div><!-- .copy-wrap -->
                        </div>

                        <div class="note note-plane note-light note-md font-italic"><em class="fas fa-info-circle"></em><p style="padding-top: 3px;">Pеферальная ссылка изменена</p></div>
                        <ul class="share-links" style="display:none">
                            <li>Поделиться : </li>
                            <li><a href="#"><em class="fab fa-google-plus-g"></em></a></li>
                            <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                            <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                            <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                        </ul>
                    </div>
                </div>


                                <div class="d-sm-flex justify-content-center">

                    <div class="content-area card col-lg-12" style="border-radius:0 6px 6px 0">
                        <div class="card-innr">
                            <style>
                                #example1_filter2{
                                    display:none;
                                }
                                #example1_length{
                                    display:none;
                                }
                                @media (max-width:500px) {
                                    #example1_paginate {
                                            display: inline-grid;
                                    }
                                }
                                @media (max-width:451px) {
                                    #example1 {
                                            display: block!important;
                                    }
                                }
                            </style>
                            <table id="example1" class="display table-responsive dataTable no-footer" style="width:100%;    display: inline-table;">
                                <thead>
                                    <tr>

                                        <th style="width:20%" class="text-center">ID</th>
                                        <th style="width:20%" class="text-center">Дата</th>
                                        <th style="width:40%" class="text-center">Логин</th>
                                        <th style="width:20%" class="text-center">Прибыль (Всего: 0)</th>


                                    </tr>
                                </thead>
                                <tbody class="">
                                      <?php 
while($row = mysqli_fetch_array($result_ref)) {
 
$id_ref = $row['id'];
$date = $row['date_reg'];
$log_ref = $row['login']; 
echo "<tr class='text-center odd' role='row'><td class='sorting_1'>$id_ref</td><td>$date</td><td style='text-transform: capitalize!important;'>$log_ref</td><td>0.00</td></tr>";

  }
  
                                      ?>
      
                                      </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- .col -->
            </div><!-- .col -->


            <div class="main-content col-lg-9" id="bonus" style="display:none">
                <div class="card-innr card">
                    <div class="status status-empty">
                        <div class="status-icon"><em class="ti ti-gift"></em></div><span class="status-text text-dark">Получайте каждый день до 100 на свой баланс абсолютно бесплатно,<br>Для получения необходимо подписаться на нашу <a href="<?=$group?>" target="_blank">группу</a></span>
                        <div class="row">
                            
                                                        <div class="offset-md-3 col-md-6">
                                <div style="transform: scale(0.65);" class="g-recaptcha" data-sitekey="<?=$sitekey?>"></div>
                            </div>

                            <div class="offset-md-3 col-md-6">
                                    <a class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;" id="butPromo" onclick="getDaily()">Получить</a>
                            </div><!-- .col -->
                                                        
                        </div>
                        <a id="error_promo" class="btn  btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto;margin-top: 25px;cursor:default;"></a>
                        <a id="succes_promo" class="btn btnSuccess" style="margin-top: 25px; display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));"></a>
                    </div>
                </div>
                <p class="text-light text-center"><em class="fas fa-info-circle" style="font-size:11px"></em> Мы не требуем обязательный депозит для вывода средств</p>
            </div>


            <script>
                function getPromo() {
										if ($('#g-recaptcha-response').val() == ''){
										$('#error_promo').show();
										return $('#error_promo').html('Поставьте галочку');
										}
									
										
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#butPromo').html('<div class="loader"></div>').addClass("disabled");
										},	
                                        data: {
                                            type: "getQiwi",
                                            sid: Cookies.get('sid'),
											rc: $('#g-recaptcha-response').val()
                                        },
                                        success: function(data) {
                                            $('#butPromo').html('Получить').removeClass("disabled");
											$('#error_promo').hide();
                                            var obj = jQuery.parseJSON(data);
                                            if ('success' in obj) {
                                               $("#succes_promo").show();
											  $('#succes_promo').html(obj.success.text);
											  $('#promoBalance').html(obj.success.promo_balance);
											  updateBalance(obj.success.balance, obj.success.new_balance);
											  grecaptcha.reset();
																						 return false;
                                            }else{
												grecaptcha.reset();
												$('#error_promo').show();
												$("#succes_promo").hide();
												return $('#error_promo').html(obj.error.text);
											}
                                        }
                                    });
                                    
                                }
                
                </script>


            
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#example1").dataTable({
                        "aoColumnDefs": [{
                            'bSortable': false,
                            'aTargets': [1, 2]
                        }],
                        "order": [
                            [0, "desc"]
                        ]
                    });
                });

            </script>

        </div><!-- .container -->
    </div><!-- .container -->
</div><!-- .page-content -->
<div class="footer-bar">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">

            </div><!-- .col -->
            <div class="col-md-4 mt-2 mt-sm-0">
                <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                       
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .footer-bar -->

<div class="modal fade" id="modalDeposit" tabindex="-1">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">


                <p>Выберите способ оплаты:</p>

                <ul class="pay-list guttar-15px">
                    <input id="systemPay" style="display:none">
                                    
                    <li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-coin1">
						<label class="pay-check-label" style="height:65px" for="pay-coin1"> <img src="card.png" alt="pay-logo" style="height: 35px;margin: 10px;"></label>
					</li>

                    <li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();"><input type="radio" class="pay-check" name="pay-option" id="pay-paypal1"><label class="pay-check-label" for="pay-paypal1"><img src="../images/pa.png" alt="pay-logo" style="height: 22px;width: 97px;margin-top: 16px;margin-bottom: 16px;"></label></li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-paypal23">
						<label class="pay-check-label" style="height:65px;padding: 5px 5px 5px;" for="pay-paypal23"> <img alt="pay-logo" style="height: 41px;margin: 8px;" src="sbp.png"></label>
					</li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-paypal24">
						<label class="pay-check-label" style="height:65px;padding: 5px 5px 5px;" for="pay-paypal24"> <img alt="pay-logo" style="height: 41px;margin: 8px;" src="sbernew.png"></label>
					</li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-paypal25">
						<label class="pay-check-label" style="height:65px;padding: 5px 5px 5px;" for="pay-paypal25"> <img alt="pay-logo" style="height: 41px;margin: 8px;" src="cardsms.png"></label>
					</li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-paypal26">
						<label class="pay-check-label" style="height:65px;padding: 5px 5px 5px;" for="pay-paypal26"> <img alt="pay-logo" style="height: 41px;margin: 8px;" src="alfa.png"></label>
					</li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();">
						<input type="radio" class="pay-check" name="pay-option" id="pay-paypal27">
						<label class="pay-check-label" style="height:65px" for="pay-paypal27"> <img alt="pay-logo" style="height: 20px;margin: 18px; " src="data:image/png;base64,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"></label>
					</li><li class="pay-item" onclick="$('#fropay').show();$('#fk').hide();"><input type="radio" class="pay-check" name="pay-option" id="pay-coin"><label class="pay-check-label" for="pay-coin">
                            <img src="../images/qiwipay.png" style="height: 35px;margin: 9px;" alt="pay-logo"></label></li><li class="pay-item" onclick="$('#fropay').hide();$('#fk').show();"><input type="radio" class="pay-check" name="pay-option" id="pay-paypal"><label class="pay-check-label" style="height:65px" for="pay-paypal"><img src="../images/fk-logo.png" alt="pay-logo" style="height: 40px;margin: 10px;"></label></li>
                       
                    

                </ul>
                <div id="fropay">
                <label for="token-address" class="input-item-label">Сумма:</label>
                <div class="input-item input-with-label"><input class="input-bordered col-6" type="text" id="depositSizee" value="100" style=""><span class="input-note">* Все комиссии берем на себя</span></div>
                
                
                
                
                <ul class="d-flex flex-wrap align-items-center guttar-30px">
                    <li><a onclick="deposit_fropay()"  class="btn btn-primary" style="color:#fff; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" id='depositButtonn'>Далее</a></li>
                    <a id="error_deposit" style="color: rgb(255, 255, 255); display:none" class="btn btnError bg-danger "></a>

                </ul>
                </div>
                <div id="fk" style="display:none;">
                <label for="token-address" class="input-item-label">Сумма:</label>
                <div class="input-item input-with-label"><input class="input-bordered col-6" type="text" id="depositSize" value="100" style=""><span class="input-note">* Все комиссии берем на себя</span></div>
                
                
                
                
                <ul class="d-flex flex-wrap align-items-center guttar-30px">
                    <li><a onclick="deposit_default()"  class="btn btn-primary" style="color:#fff; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" id='depositButton'>Далее</a></li>
                    <a id="error_deposit" style="color: rgb(255, 255, 255); display:none" class="btn btnError bg-danger "></a>

                </ul>
                </div>
<script>
function deposit_fropay() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#depositButton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_deposit").hide();
										},	
                                                                                data: {
                                                                                    type: "depositfropay",
           sum: $("#depositSize").val()
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#depositButton').html('Далее');                             
                  window.location.href = obj.locations;
                                                                return 
                                            }else{
                 $('#depositButton').html('Далее');                              
                $("#error_deposit").show();                               
                $("#error_deposit").html(obj.error); 
                                            }
                                        }   
   });
}
</script>
                <div class="gaps-2x"></div>
                <hr>
                <div class="gaps-2x"></div>

                <table class="table tnx-table">
                    <thead>
                        <tr>
                            <th>Номер операции</th>
                            <th>Дата</th>
                            <th>Сумма</th>

                        </tr><!-- tr -->
                    </thead><!-- thead -->
                    <tbody id="lastDepN">
                        <?php 
while($row = mysqli_fetch_array($result_deps)) {
 
$id_dep = $row['transaction'];
$date_dep = $row['data'];
$sum_dep = $row['suma']; 
echo "<tr>
                    <td>$id_dep</td>
                    <td>$date_dep</td>
                    <td>$sum_dep</td>
                    </tr>";

  }
  
                                      ?>              
                                      </tbody><!-- tbody -->
                    <center id="loadpw" style="display:none">Загрузка...</center>
                </table>
    <script>
    
    
    
    function deposit() {
						if ( $('#systemPay').val() > 3 || !$.isNumeric($('#systemPay').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Укажите систему пополнения');
						}
						if ( $('#depositSize').val() == ''){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите сумму');
						}
						
						if (!$.isNumeric($('#depositSize').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите корректную сумму');
						}
						$.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "deposit",
                        sid: Cookies.get('sid'),
                        system: $('#systemPay').val(),
                        size: $('#depositSize').val()
                    },
					  beforeSend: function(data) {
						
						$('#depositButton').addClass('disabled').html('<div class="loader"></div>');
					},
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        if ('success' in obj) {
							window.location.href = obj.success.location;
                        }

                        if ('error' in obj) {
                            $('#depositButton').removeClass('disabled').html('Далее');
                            $('#error_deposit').show();
                            return $('#error_deposit').html(obj.error.text);
                        }

                    }
                });
						
					}
    
    
        
        function getNowDeposits(){
                            if ($('#lastDepN').html() !== ""){
                                return;
                            }
                            $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "getLasterDep",
                        sid: Cookies.get('sid')
                    },
					  beforeSend: function(data) {
						$('#loadpw').show();
					},
                    success: function(data) { 
                        $('#loadpw').hide();
                        var obj = jQuery.parseJSON(data);
                      
                        if ('success' in obj) {
                            return $('#lastDepN').html(obj.success.text);
                        }else{
                            $('#loadpw').html("Ошибка");
                        }


                    }
                });
                        }
        
        
    </script>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Modal End -->


<div class="modal fade" id="withdraw" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">


                <div class="row">
                    <div class="col-md-6">
                        <div class="input-item input-with-label"><label for="swalllet" class="input-item-label">Выберите систему </label><select autocomplete="off" class="select-bordered select-block select2-hidden-accessible" id="hide_search" onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                <optgroup label="Платежные системы">
                                    <option value="4">Qiwi</option>
                                    <option value="2">Payeer</option>
                                    <option value="3">WebMoney</option>
                                    <option value="1">Яндекс.Деньги</option>
                                </optgroup>
                                <optgroup label="Мобильная связь (Россия)">
                                    <option value="5">Билайн</option>
                                    <option value="6">Мегафон</option>
                                    <option value="7">МТС</option>
                                    <option value="8">Теле 2</option>
                                </optgroup>
                                <optgroup label="Банковские карты (Россия)">
                                    <option value="9">VISA</option>
                                    <option value="10">MASTERCARD</option>
                                </optgroup>
                            </select></div><!-- .input-item -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <div class="input-item input-with-label"><label for="token-address" class="input-item-label">Укажите реквизиты:</label><input autocomplete="off" placeholder="+79XXXXXXXXX" class="input-bordered" id="walletNumber" value=""><span class="input-note" id="cardLL" style="display:none">Только для РФ</span></div>
                <div class="input-item input-with-label"><label class="input-item-label">Сумма:</label><input autocomplete="off" class="input-bordered" id="WithdrawSize" value=""></div>
                <span class="text-light  d-inline-flex align-items-center"><span class="mb-0"><small id="limitsW">От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату</small></span> <span class="badge badge-disabled ml-2">Комиссия: 0%</span></span>



                <a id="error_withdraw" class="btn  btn-block btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto;margin-top: 10px;"></a>
                <a id="succes_withdraw" class="btn  btn-block btnSuccess" style="margin-top: 10px;display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));">Выплата успешно создана</a>
                <div class="gaps-2x"></div>
                <div class="d-sm-flex justify-content-between align-items-center"><button id="withB" onclick="createwithdraw();" class="btn btn-primary" style="width:100px;box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);">Вывести</button></div>



                <script>
                    function withdraw() {
                        if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
                            $('#error_withdraw').show();
                            return $('#error_withdraw').html('Заполните все поля');
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            beforeSend: function() {
                                $('#withB').addClass('disabled');
                                $('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');


                            },
                            data: {
                                type: "withdraw",
                                sid: Cookies.get('sid'),
                                system: $('#hide_search').val(),
                                size: $('#WithdrawSize').val(),
                                wallet: $('#walletNumber').val()
                            },
                            success: function(data) {
                                $('#error_withdraw').hide();
                                $('#succes_withdraw').hide();

                                $('#withB').removeClass('disabled');
                                $('#withB').html('Выплата');
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {

                                    $('#succes_withdraw').show();
                                    $('#emptyHistory').hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(obj.success.add_bd + tt);
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }

                                if ('error' in obj) {
                                    $('#error_withdraw').show();
                                    return $('#error_withdraw').html(obj.error.text);
                                }

                            }
                        });
                    }


                    function withdrawSelect() {
                        $('#cardLL').hide();
                        $('#walletNumber').val('');
                        var e = $('#hide_search').val();
                        if (e >= 5 && e <= 8) {
                            $('#nameWithdraw').html('Номер телефона:');
                            $('#walletNumber').attr('placeholder', '');
                        }
                        if (e >= 1 && e <= 4) {
                            if (e == 4) {
                                $('#walletNumber').attr('placeholder', '+79XXXXXXXXX');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 2) {
                                $('#walletNumber').attr('placeholder', 'P1000000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 1) {
                                $('#walletNumber').attr('placeholder', '410011499718000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 3) {
                                $('#walletNumber').attr('placeholder', 'R123456789000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            $('#nameWithdraw').html('Номер кошелька:');
                        }
                        if (e >= 9) {
                            $('#nameWithdraw').html('Номер карты:');
                            $('#cardLL').show();

                            if (e == 10) {
                                $('#walletNumber').attr('placeholder', '512107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            } else {
                                $('#walletNumber').attr('placeholder', '412107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            }
                        }
                    }



                    function getLasterMyWithdraws() {
                        /*if ($('#withdrawT').html() !== ""){
                            return;
                        }*/
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "getLasterMyWithdraws",
                                sid: Cookies.get('sid')
                            },
                            beforeSend: function(data) {
                                $('#loadmyd').show();
                            },
                            success: function(data) {
                                $('#loadmyd').hide();
                                var obj = jQuery.parseJSON(data);

                                if ('success' in obj) {
                                    $('#withdrawT').html(obj.success.text);
                                    return $('#gnext').html(obj.success.text1);
                                } else {
                                    $('#loadmyd').html("Ошибка");
                                }


                            }
                        });
                    }


                    function removeWithdraw(id) {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "removeWithdraw",
                                sid: Cookies.get('sid'),
                                id: id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $('#' + id + '_his').fadeOut('slow');
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }
                            }
                        });
                    }


                    function showWithdrawHistory(start) {

                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "withdrawHistory",
                                sid: Cookies.get('sid'),
                                start: start
                            },
                            success: function(data) {
                                if (data == 'null') {
                                    $("#withdrawHistoryLoad").hide();
                                    return $("#gnext").hide();
                                }
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $("#withdrawHistoryLoad").hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(tt + obj.success.add);
                                    $('#gnext').html(obj.success.next);
                                }
                            }
                        });

                    }

                </script>





                <div class="gaps-2x"></div>
                <hr>
                <div class="gaps-2x"></div>

                <table class="table tnx-table table-responsive" id="withdrawT">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Дата</th>
                            <th class="text-center">Реквизиты</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center" style="width:10%">Статус</th>

                        </tr><!-- tr -->
                    </thead><!-- thead -->
                    <tbody>
									<?php
                                      while($row = mysqli_fetch_array($result2)) {
$id_w = $row['id'];
$sum_w = $row['sum'];
$ps = $row['ps'];
$wallet = $row['wallet'];                                   
$date_w = $row['date'];
$status = $row['status'];
if($status == 0) {
$remove = "<em class='ti ti-close' style='color:red;cursor:pointer' onclick="."removeWithdrawUser('$id_w')"."></em>";
$badge = "<span class='badge badge-warning'>Ожидание</span>";
}
if($status == 1) {
$remove = '';
$badge = "<span class='badge badge-success'>Выполнено</span>";
}
if($status == 2) {
$remove = '';
$badge = "<span class='badge badge-danger'>Отклонено</span>";
}                                      
echo "<tr class='text-center' style='cursor:default!important' id='$id_w'><td>$remove</td><td>$id_w</td><td>$date_w</td><td style='overflow-x: auto;'><img src='images/$ps.png'> $wallet</td><td>$sum_w</td><td>$badge</td></tr>";                                        
}
                                      ?>
                   
                                      
                                      
                    </tbody><!-- tbody -->
                </table>
                <center id="gnext"></center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>


<div class="modal fade" id="startBonus" tabindex="-1">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>

            <div class="popup-body">
                

                <div class="form-step-head card-innr" style="border:0">
                    <div class="step-head">
                        <div class="step-number">02</div>
                        <div class="step-head-text">
                            <h4>Вступите в нашу группу</h4><a href="<?=$group?>" target="_blank"><?=$group?></a>
                        </div>
                    </div>
                </div>
                <div class="gaps-1x"></div>
                <a class="btn btn-primary" id="bonBut" onclick="getBonus()" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);color:#fff;margin:0 auto;display: table;">Получить бонус</a>
                <a class="btn" id="success_bonuss" style="background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));color:#fff;margin:0 auto; display: none;">Бонус получен</a>
                <center id="error_bonuss1"  style="margin-top:15px;display: none;"><a id="error_bonuss" class="btn btnError bg-danger " style="color:#fff;margin-top:10px auto;"></a></center>

                
                <div class="gaps-4x"></div>
                <center id="xrqexr" style="font-size:11px;margin-top:15px;opacity:0.7;cursor:pointer" onclick="hideBonus()">Больше не показывать предложение</center>

                <script>
                    
                    function getBonus() {

                $.ajax({
                                            type: 'POST',
                                            url: 'action.php',
                                             beforeSend: function(data) {
                                                        $('#bonBut').addClass('disabled');
                                                        $('#bonBut').html('<div class="loader" style="height:23px;width:23px"></div>');
                                                    },
                                            data: {
                                                type: 'getBonus',
                                                sid: Cookies.get('sid'),
                                                a:  Cookies.get('ab')
                                            },
                                            success: function(data) {
                                                $('#success_bonuss').hide();
                                                $('#error_bonuss1').hide();
                                                $('#bonBut').removeClass('disabled');
                                                        $('#bonBut').html('Получить бонус');
                                             var obj = jQuery.parseJSON(data);
                                                if ('success' in obj) {
                                                    
                                                        $('#bonBut').hide();
                                                        $('#xrqexr').hide();
                                                        //Cookies.set('ab', '1'); 
                                                        $('#success_bonuss').css('display','table');
                                                        updateBalance(obj.success.balance, obj.success.new_balance);
                                                     window.location.href = '';
                                                    return;
                                                   
                                                } 
                                                if ('error' in obj) {
                                                    $('#error_bonuss1').show();
                                                    return $('#error_bonuss').html(obj.error.text);
                                                }
                                            }
                                        });
            }
                    
                    
                    function hideBonus() {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "hideBonus",
                                sid: Cookies.get('sid'),
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    window.location.href = '';
                                }
                            }
                        });
                    }

                </script>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Modal End -->

<script src="../script/jquery.bundle.js"></script>
<!--<script src="../script/datatables.min.js"></script> -->
<script>


var jgjger = setInterval(function() {
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 2000);

setTimeout(function() {
  clearInterval(jgjger);
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 30000);
    
  
</script>
    
<script src="../script/script.js"></script>
<div class="footer-bar">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <ul class="footer-links">
                    <li><a href="/terms.php">Пользовательское соглашение</a></li>
                    <li><a href="/policy.php">Политика конфеденциальности</a></li>
                </ul>
                <a href="https://fropay.bid/">fropay</a>
            </div><!-- .col -->
            <!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>
                                      <!-- MODAL -->
<div class="modal fade show" id="promo" tabindex="-1" style="display: none; ">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a style="cursor:pointer" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body" style=''>
    <center>
    Введите промокод<br>
<input type='text' style='width:250px;' class='input-bordered' id='promoactive' value='' placeholder='Промокод'><br>
  
    <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promoactive" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promoactive" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->  
    <button id="activebutton" class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="activepromo()">Активировать</button><br>
   
                                      <br><br>
                                      
                               <!-- СОЗДАНИЕ ПРОМОКОДА -->
                                      
  Название промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createname' value='' placeholder='Название'><br><br>
  Сумма промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createsum' value='' placeholder='Сумма'><br><br>
   Кол-во активаций промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createactive' value='' placeholder='Кол-во активаций'><br> 
     <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promocreate" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promocreate" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->                                   
    <button id="createbutton" class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="createpromo()">Создать</button><br>
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
<style>
.actives {
    color:#fff;
}
                       .circle {
                           border:1px solid rgba(149,147,147,0.5); 
                           color:gray;
                           background:#fff;
                       }
                       .circle:hover {
                           
                           color:#fff;
                           
                       }
                   </style>
                  
                   <input for="navs-toggle" type="checkbox" id="navs-toggle" hidden>

</body>

</html>
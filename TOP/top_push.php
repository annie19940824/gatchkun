<?php
session_start();
require('../dbconect_gatch.php');


$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

require('himajin.php'); // [$login_users]に暇人全員のデータを格納してある
require('condition_gatch.php'); //[$condition_gatch]に合致ユーザーのデータを格納してある
?>

<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="utf-8">
    <title>練習</title>
    <!-- ========stylesheet======== -->
    <link rel="stylesheet" type="text/css" href="top.css">
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========jQuery======== -->
    <script src="../jQuery/jquery-3.1.1.js"></script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- ========push.js======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js">Push.Permission.request();</script>
    <!-- ========PHPで定義した変数をJSで使う======== -->
    <script type="text/javascript">
        var login_id = <?php echo json_encode($login_id); ?>;
        var login_condition = <?php echo json_encode($login_condition); ?>;
    </script>
</head>

<body>
    <header>
        <span style="line-height: 56px; font-size: 25px;">ようこそ暇人さん</span>
        <div id="hamburger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div id="friend-add">
            <a href="../ID/ID_create_input.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
        </div>
        <div id="alert">
            <i class="fa fa-bell" aria-hidden="true"></i></i>
        </div>
    </header>


    <div id="himajin">
        <?php foreach($login_users as $login_user): ?>
            <div>
                <a href="../chatpage.php?id=<?php echo $login_user['user_id']; ?>" style="text-decoration: none;">
                    <button type="submit" class="tochat">
                    <img src="../LOGIN/profile_image/<?php echo $login_user['picture'] ;?>">
                    </button>
                </a>
                <p><?php echo $login_user['user_name']; ?></p>
                <p style="font-size: 10px;"><?php echo $login_user['tubuyaki'];?></p>
            </div>
        <?php endforeach ?>
    </div><!-- himajin -->


    <div id="gatch">
        <h1>合致ユーザー</h1>
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <div>
                <a href="../chatpage.php?id=<?php echo $condition_gatch['user_id']?>" style="text-decoration: none;">
                    <button type="submit" class="tochat">
                    <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>">
                    </button>
                </a>
                <p><?php echo $condition_gatch['user_name'] ;?></p>
                <p style="font-size: 10px;"><?php echo $condition_gatch['tubuyaki'] ;?></p>
            </div>
        <?php endforeach ?>
    </div><!-- gatch -->

    <div id="condition">
        <p>あなたのコンディションは<img id="test" src="../images/<?php echo $login_condition; ?>">です</p>
            <div>
                <!-- カラオケ -->
                <button id="karaoke">
                    <img src="../images/i_karaoke.gif">
                </button>
                <!-- ドライブ -->
                <button id="drive">
                    <img src="../images/i_drive.gif">
                </button>
                <!-- アルコール -->
                <button id="alcohol">
                    <img src="../images/i_nomi.gif">
                </button>
                <!--宅飲み -->
                <button id="insake">
                    <img src="../images/i_takunomi.gif">
                </button>
                <!-- カフェ -->
                <button id="cafe">
                    <img src="../images/i_cafe.gif">
                </button>
                <!--買い物 -->
                <button id="kaimono">
                    <img src="../images/i_kaimono.gif">
                </button>
                 <!-- ご飯 -->
                <button id="meshi">
                    <img src="../images/i_meshi.gif">
                </button>
                <!-- ゲーム -->
                 <button id="game">
                    <img src="../images/i_game.gif">
                </button>
                <!--その他-->
                <button id="sonota">
                    <img src="../images/i_sonota.gif">
                </button>
            </div>
    </div><!-- condition -->
<!-- <script type="text/javascript" src="condition.js?id="<?= date(); ?>></script>
 -->
<script type="text/javascript" src="condition.js"></script>
<script type="text/javascript" src="push.js"></script>

</body>
</html>
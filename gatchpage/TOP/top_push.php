<?php

session_start();
require('../../dbconect_gatch.php');

if (!isset($_SESSION['login_user']['user_id'])) {
    header('Location: ../LOGIN/gatch_login.php');
    exit();
}
$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

// [$login_users]に暇人全員のデータを格納
require('himajin.php');

//[$condition_gatch]に合致ユーザーのデータを格納
require('condition_gatch.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>練習</title>
    <!-- ========stylesheet======== -->
    <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="top.css">
    <link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========jQuery======== -->
    <script src="../../YUSUKE1/jQuery/jquery-3.1.1.js"></script>
    <script src="../../YUSUKE1/jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========push.js======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
</head>

<body>
    <?php require('../../asset/head.php'); ?>

    <div class="container" style="width: 100%;">
        <h3 class="theme" style="margin: 195px 0 24px 7%;">
            ログインしている暇人一覧
        </h3>
        <div class="himajin-container">
            <div class="icon">
                <i class="fa fa-caret-left" aria-hidden="true"></i>
            </div>
            <div id="himajin">
                <?php foreach($login_users as $login_user): ?>
                    <div>
                        <a href="../CHAT/chatpage.php?id=<?php echo $login_user['user_id']; ?>" style="text-decoration: none;">
                            <button class="tochat" id="<?php echo $login_user['user_id']; ?>" onclick="push(<?php echo $login_user['user_id']; ?>)">
                                <img src="../LOGIN/profile_image/<?php echo $login_user['picture'] ;?>" class="himajin-pic">
                                <img src="../../asset/images/<?php echo $login_user['conditions'] ;?>" class="himajin-cond">
                            </button>
                        </a>
                        <p class="himajin-name"><?php echo $login_user['user_name']; ?></p>
                        <p class="himajin-tub"><?php echo $login_user['tubuyaki'];?></p>
                    </div>
                <?php endforeach ?>
            </div><!-- himajin -->
            <div class="icon" style="text-align: right;">
                <i class="fa fa-caret-right" aria-hidden="true"></i>
            </div>
        </div><!-- himajin-container -->
    </div><!-- container -->

    <div id="gatch">
        <div class="container">
            <h3 class="theme" style="text-align: left;">
            合致候補の暇人
            </h3>
            <div class="row">
                <?php foreach($condition_gatch as $condition_gatch): ?>
                    <div class="col-xs-6" style="padding: 0;">
                        <a href="../CHAT/chatpage.php?id=<?php echo $condition_gatch['user_id']; ?>" style="text-decoration: none; color: black;">
                            <button class="tochat" id="<?php echo $condition_gatch['user_id']?>" onclick="push(<?php echo $condition_gatch['user_id']; ?>)">
                            <div class="gatch-box">
                                <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>" class="gatch-pic">
                                <p>
                                    <?php echo $condition_gatch['user_name'];?>
                                    <br>
                                    <span class="gatch-tubuyaki">
                                    <?php echo $condition_gatch['tubuyaki'];?>
                                    </span>
                                    <br>
                                    <span>
                                     最終ログイン：<?php echo $condition_gatch['created'];?>
                                    </span>
                                </p>
                                <img src="../../asset/images/<?php echo $condition_gatch['conditions'];?>" class="gatch-cond">
                            </div>
                            </button>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div><!-- gatch -->

    <div style="display: block;">
    <?php require('../../asset/footer.php'); ?>
    </div>

<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
    var myId = <?= $_SESSION['login_user']['user_id']; ?>;
    var myName = "<?= $_SESSION['login_user']['user_name']; ?>";
    var picture = "<?= $_SESSION['login_user']['picture']; ?>";
    var socket = io('http://localhost:3000');
</script>
<script type="text/javascript" src="push.js"></script>
</body>
</html>

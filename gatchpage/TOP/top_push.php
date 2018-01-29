<?php
session_start();
require('../../dbconect_gatch.php');


$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

/*require('himajin.php');*/
    $sql = "SELECT *
            FROM   `gatchi_users`
            WHERE  `login` = 1
            AND    `user_id` != ?";
    $data = array($login_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $login_users = $stmt->fetchall();


/*require('condition_gatch.php');*/
    $sql = "SELECT *
            FROM  `gatchi_users`
            WHERE `login`= 1
            AND   `conditions` =?
            AND   `user_id` != ?
           ";
    $data = array($login_condition,$login_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $condition_gatch = $stmt->fetchall();
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
    <script src="../../jQuery/jquery-3.1.1.js"></script>
    <script src="../../jQuery/jquery-migrate-1.4.1.js"></script>
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
    <?php require('../../asset/head.php'); ?>
    <h3 class="theme" style="margin: 170px 0 0 6%;">
        ログインしている暇人一覧
    </h3>
    <div class="himajin-container">
        <div class="icon">
            <i class="fa fa-caret-left" aria-hidden="true"></i>
        </div>
        <div id="himajin">
            <?php foreach($login_users as $login_user): ?>
                <div>
                    <a href="../chatpage.php?id=<?php echo $login_user['user_id']; ?>" style="text-decoration: none;">
                        <button type="submit" class="tochat">
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
    </div>

    <h3 class="theme" style="margin-left: 6%;">
        合致候補の暇人
    </h3>
    <div id="gatch">
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <div class="col-xs-6">
                <div class="gatch-box">
                    <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>" class="gatch-pic">
                    <p style="margin-left: 30px; font-size: 30px">
                        <?php echo $condition_gatch['user_name'];?>
                        <br>
                        <span class="gatch-tubuyaki">
                        <?php echo $condition_gatch['tubuyaki'];?>
                        </span>
                    </p>
                    <img src="../../asset/images/<?php echo $condition_gatch['conditions'];?>" class="gatch-cond">
                </div>
            </div>
        <?php endforeach ?>
    </div><!-- gatch -->
<script type="text/javascript" src="condition.js?id="<?= date(); ?>></script>
<script type="text/javascript" src="push.js"></script>

</body>
</html>

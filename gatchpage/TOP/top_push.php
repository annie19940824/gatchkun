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
    <link rel="stylesheet" type="text/css" href="../../asset/css/">
    <link rel="stylesheet" type="text/css" href="top.css">
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

    <div style="width: 100%; margin: 0; padding: 0;" >
        <div style="width: 5%; height: 283px; line-height: 450px; color: orange; padding: 0; float: left;">
            <i class="fa fa-caret-left" aria-hidden="true" style="font-size: 70px;"></i>
        </div>
        <div id="himajin" style="float: left;">
            <?php foreach($login_users as $login_user): ?>
                <div>
                    <a href="../chatpage.php?id=<?php echo $login_user['user_id']; ?>" style="text-decoration: none;">
                        <button type="submit" class="tochat">
                        <img src="../LOGIN/profile_image/<?php echo $login_user['picture'] ;?>">
                        </button>
                    </a>
                    <p><?php echo $login_user['user_name']; ?></p>
                    <p><?php echo $login_user['tubuyaki'];?></p>
                </div>
            <?php endforeach ?>
        </div><!-- himajin -->
        <div style="width: 5%; height: 283px; line-height: 450px; color: orange; padding: 0; margin-right: 0; float: left; text-align: right;">
            <i class="fa fa-caret-right" aria-hidden="true" style="font-size: 70px;"></i>
         </div>
    </div>

    <div id="gatch" style="margin-top: 30px; width: 100%;">
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <div class="col-xs-6">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box; text-align: center;">
                    <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>" style="padding: 10px;">
                    <p style="margin-left: 30px; font-size: 25px">
                        <?php echo $condition_gatch['user_name'];?>
                    </p>
                    <p>
                        <?php echo $condition_gatch['tubuyaki'];?>
                    </p>
                    <img src="../../asset/images/<?php echo $condition_gatch['conditions'];?>" style="float: right; width: 70px; height: 70px; ">
                </div>
            </div>
        <?php endforeach ?>
    </div><!-- gatch -->

<script type="text/javascript" src="condition.js?id="<?= date(); ?>></script>
<script type="text/javascript" src="push.js"></script>

</body>
</html>

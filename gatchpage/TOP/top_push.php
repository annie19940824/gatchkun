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
    <!-- <header>
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
    </header> -->
    <?php require('../../asset/head.php'); ?>

    <div id="himajin">
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


    <div id="gatch" class="container">
        <h1>合致ユーザー</h1>
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <!-- <div>
                <a href="../chatpage.php?id=<?php echo $condition_gatch['id']?>" style="text-decoration: none;">
                    <button type="submit" class="tochat">
                        <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>">
                    </button>
                </a>
                <p><?php echo $condition_gatch['user_name'];?></p>
                <p style="text-align: right;"><?php echo $condition_gatch['tubuyaki'];?></p>
            </div> -->
        <?php endforeach ?>
        <div class="row">
            <div class="col-xs-offset-1 col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
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
            <div class="col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
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
           <div class="col-xs-offset-1 col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
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
            <div class="col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
                    <img src="../LOGIN/profile_image/<?php echo $condition_gatch['picture'];?>" style="padding: 10px;">
                    <p style="margin-left: 30px; font-size: 25px">
                        <?php echo $condition_gatch['user_name'];?>
                    </p>
                    <p>
                        <?php echo $condition_gatch['tubuyaki'];?>
                    </p>
                    <img src="../../asset/images/<?php echo $condition_gatch['conditions'];?>" style="float: right; width: 70px; height: 70px; ">
                </div>
            </div><div class="col-xs-offset-1 col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
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
            <div class="col-xs-5">
                <div class="gatch-box" style="width: 600px; height: 100px; background-color: orange; display: inline-block; text-align: left; box-sizing: border-box;">
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
        </div>
    </div><!-- gatch -->
<script type="text/javascript" src="condition.js?id="<?= date(); ?>></script>
<script type="text/javascript" src="push.js"></script>

</body>
</html>

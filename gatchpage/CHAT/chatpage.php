<?php

session_start();
require('../../dbconect_gatch.php');

$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

$user = $_SESSION['login_user']['user_id'];
$other = $_GET['id'];

if (!isset($_GET['id'])) {
  header('Location:../TOP/top_push.php');
  exit();
}


  if(!empty($_POST)){

          $errors = array();
          $chat = htmlspecialchars($_POST['chat']);

      if($chat == ''){
          $errors['chat'] = 'blank';

                  }
      if(empty($errors)){
      $sql ='INSERT INTO `gatch_chat` SET
                                      `users_id`=?,
                                      `other_id`=?,
                                      `chat` = ?,
                                      `created`=NOW()
       ';
      $data = array($user,$other,$chat);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

      header('Location: chatpage.php'.'?id='.$other);
      exit();
      }

}

/* チャット画面にchatを表示させるためのsql*/
      $sql = 'SELECT  `chat`,
                      `user_name`,
                      `user_id`,
                      `other_id`,
                      `picture`
              FROM     `gatch_chat`
              LEFT JOIN `gatchi_users`
              ON `gatch_chat`.`users_id`=`gatchi_users`.`user_id`
              WHERE (user_id = ? AND other_id =?)
              OR (user_id=? AND other_id=?)
              ORDER BY `gatch_chat`.`created` ASC
        ';
       $data = array($user,$other,$other,$user);
       $stmt = $dbh->prepare($sql);
       $stmt->execute($data);
       $tweets = $stmt->fetchAll();

/*自分のプロフィールを表示したい*/
       $sql='SELECT `user_id`,`user_name`,`picture`, `created`
             FROM `gatchi_users` WHERE `user_id`=?';
       $data = array($user);
       $stmt = $dbh->prepare($sql);
       $stmt->execute($data);
       $user_profile = $stmt->fetch(PDO::FETCH_ASSOC);

/*相手のプロフィールを表示したい*/

       $sql='SELECT `user_id`,`user_name`,`picture`,`tubuyaki`,`created`
             FROM `gatchi_users` WHERE `user_id`=?';
       $data = array($other);
       $stmt = $dbh->prepare($sql);
       $stmt->execute($data);
       $other_profile = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>チャットページ</title>

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
	<link rel="stylesheet" type="text/css" href="../../asset/css/chatmain.css">
  <!-- ========fontawesome========-->
  <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- ========jQuery======== -->
  <script src="../../YUSUKE1/jQuery/jquery-3.1.1.js"></script>
  <script src="../../YUSUKE1/jQuery/jquery-migrate-1.4.1.js"></script>
  <!-- ========push.js======== -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
</head>

<body style="width: 100%; height: 100%;">
    <div>
        <?php require('../../asset/head.php');?>
    </div>
    <div class="container" style="margin-top: 170px;">
        <div class="row">
            <div class="col-xs-5"><!-- 5/12 -->
                <h3 class="theme">チャットルーム</h3>
                <h3>チャット相手　<?php echo $other_profile['user_name']; ?>　さん</h3>
                <div style="display: inline-block; width: 150px;" >
                    <img src="../LOGIN/profile_image/<?php echo $other_profile['picture'];?>" style="width:120px; height: 120px;">
                </div>
                <div style="font-size: 15px; display: inline-block; height: 100px; width: 300px">
                        <P><?php echo  $other_profile ['tubuyaki'];?></P>
                        コンディションは
                        <img src="../../asset/images/<?= $_SESSION['login_user']['conditions'] ?>" style="width:50px;height:50px; display: inline-block;">
                        です
                        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                        </p>
                </div>
                <p style="margin-top: 15px;">
                  最終ログイン:　<?php echo $other_profile['created'];?>
                </p>
            </div><!-- 5/12 -->
            <div class="col-xs-7" style="margin-top: 25px;"><!-- 7/12 -->
                <div class="col-xs-12">
                    <div style="text-align: center; font-size: 20px; background-color: #cccccc; height: 40px;">
                        <strong style="font-size: 25px">
                            <?php echo $other_profile['user_name']; ?>
                        </strong>
                        さんとのトーク
                    </div>
                    <div class="chat_border chat_area" id="chat">
                        <?php foreach($tweets as $t){ ?>
                            <div class="chat-box">
                                <?php if($t['user_id']==$other){ // 相手だったら  ?>
                                    <!-- 相手のつぶやき -->
                                    <div class="otherbox" style="float: left; margin-left:25px;">
                                        <div class="chat-face">
                                            <img src="../LOGIN/profile_image/<?php echo  $other_profile['picture']; ?>" alt="相手のチャット画像です。" >
                                        </div>
                                        <div class="other-hukidashi">
                                            <?php echo $t['chat']; ?>
                                        </div>
                                    </div>
                                <?php }elseif($t['user_id']==$user){ //自分だったら ?>
                                    <!-- 自分のつぶやき -->
                                    <div class="mybox" style="float: right; margin-right:25px;">
                                        <div class="my-hukidashi">
                                            <p style="word-wrap: break-word; white-space: normal;">
                                                  <?php echo $t['chat']; ?>
                                            </p>
                                        </div>
                                        <div class="chat-face">
                                            <img src="../LOGIN/profile_image/<?php echo $user_profile['picture'];  ?>" alt="自分のチャット画像です。">
                                        </div>
                                    </div>
                                <?php } ?><!-- if -->
                            </div>
                        <?php }?><!-- foreach -->
                    </div>
                <!-- 送信画面 -->
                    <div class="chat_send">
                        <form method="POST" action="">
                            <div class="message">
                                <textarea name='chat' placeholder="メッセージを入力してください。"></textarea><input type="submit" value="送信する" class="btn">
                            </div>
                        </form>
                        <?php if(isset($errors) && $errors == 'blank'){ ?>
                            <div class="alert alert-danger">
                                何も入力されていません。
                            </div>
                        <?php } ?>
                    </div><!-- chat_send -->
                </div><!-- 12/12 -->
            </div><!-- 7/12 -->
        </div><!-- row -->
    </div><!-- container -->
<script type="text/javascript">
 window.onload = function () {
 document.getElementById( "chat" ).scrollTop = 100000;
}
</script>
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
    var myId = <?= $_SESSION['login_user']['user_id']; ?>;
    var myName = "<?= $_SESSION['login_user']['user_name']; ?>";
    var picture = "<?= $_SESSION['login_user']['picture']; ?>";
    var socket = io('http://localhost:3000');
</script>
<script type="text/javascript" src="../TOP/push.js"></script>
</body>

</html>
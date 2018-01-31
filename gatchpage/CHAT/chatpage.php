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
  <!-- ========push.js======== -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
</head>

<body>

   <?php require('../../asset/head.php');?>
 <br>
 <br>
 <br>
 <br>


<div style="margin-top:100px;">

  <div class="container">
		<div class="row">
      <div class="col-xs-5"><!-- 5/12 -->
       <h3 class="theme">チャットルーム</h3>
          <h3>チャット相手<?php echo $other_profile['user_name']; ?>さん</h3>
          <img src="../LOGIN/profile_image/<?php echo $other_profile['picture'];?>" style="width:50px ;height:50px;">
            <span style="font-size: 12px">
            <p class="himajin-tub"><?php echo  $other_profile ['tubuyaki'];?></p>
            最終ログイン:<?php echo $other_profile['created'];?>

            <br>

            <span class="obi">
             コンディションは
             <img id="test" src="../../asset/images/<?= $_SESSION['login_user']['conditions'] ?>" style="width:50px;height:50px;">
          です
          <i class="fa fa-hand-o-left" aria-hidden="true"></i>
          </span>
          </span>

          <br>
      </div><!-- 5/12 -->

       <div class="col-xs-7"><!-- 7/12 -->
        <div class="chat_boder chat_area" style="width: 700px; height: 600px;border: 2px solid #cccccc;">
         <p style="text-align: center ; font-size: 20px; padding-bottom: 20px; background-color: #cccccc">
            <strong style="font-size: 35px">
              <?php echo $other_profile['user_name']; ?>
            </strong>
           さんとのトーク
         </p>
            <div class="col-xs-6"><!-- 6/12 -->
                  <?php foreach($tweets as $t){ ?>
                     <?php if($t['user_id']==$user){ // 自分だったら  ?>
                            <!-- 自分のつぶやき -->
                            <div class="chat-box">
                              <div class="chat-face">
                                <img src="../LOGIN/profile_image/<?php echo  $user_profile['picture']; ?>" alt="自分のチャット画像です。" style=" width:90px; height:90px; margin-left:30px">
                              </div>
                              <div class="chat-area">
                                <div class="chat-hukidashi" style="margin-left: 150px">
                                  <?php echo $t['chat']; ?>
                                </div>
                              </div>
                            </div>
                   <?php }else{ //相手だったら ?>
                    </div><!-- 6/12 -->
                    <div class="col-xs-6"><!-- 相手のつぶやき -->
                      <div class="chat-box">
                             <div class="chat-face">
                              <img src="../LOGIN/profile_image/<?php echo $other_profile['picture'];  ?>" alt="相手のチャット画像です。" width="90" height="90">
                            </div>

                            <div class="chat-area">
                            <div class="chat-hukidashi someone">
                               <?php echo $t['chat']; ?>
                            </div>
                            </div>

                          <?php }?><!-- if -->
                        <?php }?><!-- foreach -->
                  </div><!-- 6/12 -->
          </div><!-- ボーダー -->
           <!-- 送信画面 -->
               <div class="chat_send">
                   <form method="POST" action="">
                    <div class="col-xs-10">
                     <textarea name='chat' placeholder="メッセージを入力してください。"></textarea>
                     </div>
                     <div class="col-xs-2">
                          <input type="submit" value="送信する" class="btn btn-primary" style="width: 140px;height: 50px; background-color:#cdffcc;color:#42484d; border-color: 3px #cccccc">
                     </div>
                    </form>
                             <?php if(isset($errors) && $errors == 'blank'){ ?>
                             <div class="alert alert-danger">
                              何も入力されていません。
                             </div>


                             <?php } ?>
                             <br>
                </div><!-- chat_send -->
        </div>
     </div><!-- 7/12 -->
   </div><!-- row -->
</div><!-- container -->
<div style="margin-bottom: 20px">
</div>
</div>

<?php
  require('../../asset/footer.php');
?>

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
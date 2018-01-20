<?php

session_start();
require('dbconect_gatch.php');

$user = $_SESSION['login_user']['user_id'];
$other = $_GET['id'];

if (!isset($_GET['id'])) {
  header('Location: /TOP/top_push.php');
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
              ORDER BY `gatch_chat`.`created` DESC
        ';
       $data = array($user,$other,$other,$user);
       $stmt = $dbh->prepare($sql);
       $stmt->execute($data);
       $tweets = $stmt->fetchAll();

 var_dump($tweets);

/*自分のプロフィールを表示したい*/
       $sql='SELECT `user_id`,`user_name`,`picture`, `created`
             FROM `gatchi_users` WHERE `user_id`=?';
       $data = array($user);
       $stmt = $dbh->prepare($sql);
       $stmt->execute($data);
       $user_profile = $stmt->fetch(PDO::FETCH_ASSOC);

/*相手のプロフィールを表示したい*/

       $sql='SELECT `user_id`,`user_name`,`picture`,`created`
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
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/chatmain.css">
</head>
<body>
	<h1 style="text-align: center;">はい合致チャット画面</h1>
  <p style="text-align: center; font-size: 20px">
    <?php echo $other_profile['user_name'];?>さんと合致しました！！
  </p>

  <div class="container">
		<div class="row">
			<div class="col-xs-4"><!-- 4/12 -->
          <h3 style="text-align: center;">
            マイプロフィール
          </h3>
          ようこそ：<?php echo $user_profile['user_name'] ; ?>さん<br>
          <img src="LOGIN/profile_image/<?php echo $user_profile['picture'];?>" width="50px"><br>

          <span style="font-size: 12px ;text-align: center;">
            id : <?php echo $user_profile['user_id']; ?>
            / ユーザー名 : <?php echo $user_profile['user_name'];?><br>
            登録日時:<?php echo $user_profile['created'] ;?>
          </span>

          <form method="POST" action="">
            <textarea name="chat"></textarea>
            <br>
            <input type="submit" value="送信" class="btn btn-primary">
          </form>

          <?php if(isset($errors) && $errors == 'blank'){ ?>
            <div class="alert alert-danger">
              何も入力されていません。
            </div>
          <?php } ?>
          <br>
          <a href="TOP/top_push.php" class="btn btn-info">
            もどる
          </a>
          <br><br>
          <a href="logout.php" class="btn btn-danger">
            ログアウト
          </a>
      </div><!-- 4/12 -->

      <div class="col-xs-4"><!-- 8/12 -->
          <h3 style="text-align: center;">チャット画面</h3>
          <?php foreach($tweets as $t){ ?>
            <?php if($t['user_id']==$user){ // 自分だったら  ?>
              <!-- 自分のつぶやき -->
              <div class="chat-box">
                <div class="chat-face">
                <img src="LOGIN/profile_image/<?php echo  $user_profile['picture'];  ?>" alt="自分のチャット画像です。" width="90" height="90">
                </div>
                <br>
                <br>
                <div>
                <?php echo $user_profile['user_name'] ; ?>
                </div>
                <div class="chat-area">
                  <div class="chat-hukidashi">
                  
                    <?php echo $t['chat']; ?>
                  
                  </div>
                </div>
              </div>
            <?php }else{ //相手だったら ?>
              <!-- 相手のつぶやき -->
              <div class="chat-box">
                <div class="chat-face">
                <img src="LOGIN/profile_image/<?php echo $other_profile['picture'];  ?>"
            alt="相手のチャット画像です。" width="90" height="90">
                </div>
                 <?php echo $other_profile['user_name'] ; ?>
                <div class="chat-area">
                  <div class="chat-hukidashi someone">
                  
                   <?php echo $t['chat']; ?>
                  
                  </div>
                </div>
              </div>
            <?php }?><!-- if -->
          <?php }?><!-- foreach -->
      </div><!-- 8/12 -->

            <!--  ここまでチャット画面 -->
			<div class="col-xs-4" ><!-- 12/12 -->
        <h3 style="text-align: center;" >合致メイト</h3>
        ようこそ：<?php echo $other_profile['user_name']; ?>さん<br>
        <img src="LOGIN/profile_image/<?php echo $other_profile['picture'];?>" width="50px"><br>
        <span style="font-size: 12px">
          id:<?php echo $other_profile['user_id']; ?>/
          ユーザー名:<?php echo $other_profile['user_name']; ?><br>
          登録日時 :<?php echo $other_profile['created'];?>
        </span>
		  </div><!-- 12/12 -->
			<!-- ここまで相手のプロフィール -->
		</div>
	</div>


</body>
</html>
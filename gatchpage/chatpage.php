<?php

session_start();
require('../dbconect_gatch.php');
 require('../asset/head.php');

$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

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
	<link rel="stylesheet" href="../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/common.css">
	<link rel="stylesheet" type="text/css" href="../asset/rin/Rin-3.3.7-2/dist/css/chatmain.css">
</head>

<body style="margin-top: 80px;">
  <div class="container">
		<div class="row">
			
      <div class="col-xs-5"><!-- 5/12 -->
       <h3 class="theme">チャットルーム</h3>
        <h3>
          チャット相手<?php echo $other_profile['user_name']; ?>さん</h3>
        <img src="LOGIN/profile_image/<?php echo $other_profile['picture'];?>" style="width:10px height:10px;">
        <span style="font-size: 12px">
          id:<?php echo $other_profile['user_id']; ?>/
          ユーザー名:<?php echo $other_profile['user_name']; ?><br>
          登録日時 :<?php echo $other_profile['created'];?>
        </span>
    
          <br>   
      </div><!-- 5/12 -->

      <div class="col-xs-7"><!-- 7/12 -->
      
        <div class="chat_boder" style="width: 700px; height: 600px;border: solid #008080;">
　　　　   <p style="text-align: center ; font-size: 20px; background-color: #cccccc">
           <strong>aaaaa</strong>
           さんのチャットページ</p>

            <div>
              <?php foreach($tweets as $t){ ?>
                <?php if($t['user_id']==$user){ // 自分だったら  ?>
              
                <!-- 自分のつぶやき -->
                <div class="chat-box">
                  <div class="chat-face">
                    <img src="LOGIN/profile_image/<?php echo  $user_profile['picture']; ?>" alt="自分のチャット画像です。" width="90" height="90">
                  </div>
                  
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
                  <img src="LOGIN/profile_image/<?php echo $other_profile['picture'];  ?>" alt="相手のチャット画像です。" width="90" height="90">
                </div>
                  
                 <div>
                   <?php echo $other_profile['user_name'] ; ?>
                </div>

                <div class="chat-area">
                <div class="chat-hukidashi someone">
                  
                   <?php echo $t['chat']; ?>
                  
                </div>
                </div>

              <?php }?><!-- if -->
            <?php }?><!-- foreach -->
        </div>

        
      <!-- 送信画面 -->
          <div class="col-xs-3">
            <div class="chat_send">
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
            </div><!-- chat_send -->
           </div><!-- 3/12 -->
           <div class="col-xs-9">
             

           </div>

        </div>
     </div><!-- 7/12 -->
   </div><!-- row -->
</div><!-- container -->



<?php
require('../asset/footer.php');
?>
</body>

</html>
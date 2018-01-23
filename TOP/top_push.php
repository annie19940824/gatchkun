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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <!-- ========firebase======== -->
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <!-- ========PHPで定義した変数をJSで使う======== -->
    <script type="text/javascript">
        var login_id = <?php echo json_encode($login_id); ?>;
        var login_condition = <?php echo json_encode($login_condition); ?>;
    </script>
</head>

<body>
    <header>
        <button id="push">ほげほげ</button>
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
                    <button type="submit" class="tochat" id="<?php echo $login_user['user_id']; ?>" onclick="push(<?php echo $login_user['user_id']; ?>)">
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
                    <button type="submit" class="tochat" id="<?php echo $condition_gatch['user_id']?>">
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


    <!-- node(express) -->
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        var myId = <?= $_SESSION['login_user']['user_id']; ?>;
        var socket = io('http://localhost:3000');

        // $('#push').click(() => {
        //     socket.emit('pushSend', {id: myId});
        //     return false;
        // });
            function push(id){
                var otherId = id;
                socket.emit('pushSend',
                    {sentId: myId,
                     receiveId: otherId

                    });
                return false;
            };

        socket.on('pushOn', (data) => {
          console.log(myId);
          console.log(data['id']);
          if(myId==data['id']){
            Push.create('合致！', {
                body: '更新をお知らせします！',
                icon: 'profile_image/01.jpg',
                timeout: 8000, // 通知が消えるタイミング
                // モバイル端末でのバイブレーション秒数
                vibrate: [100, 100, 100],
                onClick: function() {
                    // 通知がクリックされた場合の設定
                    console.log(this);
                }
            });
          }
        });
    </script><!-- node -->

<!-- =========================firebase関連(使いません) ===========================-->
   <!--  <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyCAXV5bDJUvHI0CUgnDQBC5yBHya5TurXY",
        authDomain: "toppush-sumple.firebaseapp.com",
        databaseURL: "https://toppush-sumple.firebaseio.com",
        projectId: "toppush-sumple",
        storageBucket: "toppush-sumple.appspot.com",
        messagingSenderId: "909608741708"
      };
    var pushRef = new Firebase("https://toppush-sumple.firebaseio.com/e");
    $(function(){

        $("").on('click',function(){
            pushRef.push({
                login_id: ?,
                other_id: ?
            });
        });
        $("").on('click',function(){
            pushRef.push({
                login_id: ?,
                other_id: ?
            });
        });
    });
        // データベースにデータが追加されたときに発動する
        pushRef.limitToLast(10).on('child_added', function (snapshot) {
            //取得したデータ
            var data = snapshot.val();
            var sent_id = data.login_id;
            var receive_id = data.other_id;

        // idが自分と同じだったら通知を表示するようにする
        // ○○と合致しました
            if (receive_id === ?) {
                Push.create('はい！合致~', {
                    body: '通知',
                    icon: 'icon.png',
                    timeout: 8000, // 通知が消えるタイミング
                    vibrate: [100, 100, 100], // モバイル端末でのバイブレーション秒数
                    onClick: function() {
                    // 通知がクリックされた場合の設定
                    console.log(this);
                    }
                });
            }
        });
    </script> -->
<!-- =======================firebase関連終了============================ -->


</body>
</html>
<?php 
session_start();
require('../dbconect_gatch.php');

	if(!isset($_SESSION['login_user']['user_id'])){
		// $_SESSIONが存在しない、つまり前の画面から飛んできていない
		// $_SESSIONがない状態だとエラーが発生するので、
		// 強制的に、前の画面に戻してあげる
		// headerとexit();はセットで使います
		header('location: gatch_login.php');
		exit();
	}

	// ユーザー登録ボタンを押した時のみ動作するプログラムを記述
	if(!empty($_POST)){
		echo 'コンディションとつぶやきを保存しました';

		$conditions = $_POST['conditions'];
		$tubuyaki = $_POST['tubuyaki'];

		$sql = 'UPDATE `gatchi_users` SET `conditions`=?,`tubuyaki`=?,`login`=1 WHERE `user_id`=?';
										
		// ?マークを上書きするデータを用意する
		$data = array($conditions,$tubuyaki,$_SESSION['login_user']['user_id']);
		$stmt = $dbh->prepare($sql); // SQL文セット完了
		$stmt->execute($data); // ?マークを上書きしてSQL実行

        $_SESSION['user_info']['conditions'] = $_POST['conditions'];


		header('Location:../TOP/top_push.php');
		exit();

	}




?>






<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>コンディション設定ページ</title>

	<!-- Bootstrap  -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" type="text/css" href="../css/cushion_page.css">
</head>
<body>

<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	 <img src="../images/gatchi_logo88.gif" width="40%">
	</div>

	<div class="col-xs-8" float="left">
	 <img src="../images/header_asset02.jpg" width="35%">
	</div>
		</div>
			</div>
	
</header>

<div id="heading">
	<p>ようこそ、暇人の　
		<span style="color: red"><?php echo $_SESSION['login_user']['user_name'] ?>
		</span>　
	さん</p>
	<h1>今のあなたの気分は？</h1>
	<h3 style="margin-bottom: 30px">ひとつだけ選択できます。</h3>

   <form action="" method="POST">
   <p style="margin-bottom: 15px">

   <input type="radio" name="conditions" value="i_nomi.gif">飲みに行こ

   <input style="margin-left: 25px" type="radio" name="conditions" value="i_drive.gif">ドライブ行こ

   <input style="margin-left: 25px" type="radio" name="conditions" value="i_takunomi.gif  ">宅飲みしよ

		<br>
		<br>

		<input type="radio" name="conditions" value="i_game.gif">ゲームしよ

		<input style="margin-left: 25px" type="radio" name="conditions" value="i_cafe.gif">カフェろ

		<input style="margin-left: 25px" type="radio" name="conditions" value="i_meshi.gif">メシ行こ

		<br>
		<br>

		<input type="radio" name="conditions" value="i_kaimono.gif">買い物行こ

		<input style="margin-left: 25px" type="radio" name="conditions" value="i_karaoke.gif">カラオケ行こ

		<input style="margin-left: 25px" type="radio" name="conditions" value="i_sonota.gif">その他
        </p>

	<h1>とりあえずつぶやいておきましょう</h1>
	<h3 style="margin-bottom: 30px; color: navy">暇人募集のつぶやき（２０文字以内）</h3>
	<textarea name="tubuyaki" rows="4" placeholder="例：金沢駅前で暇してます"></textarea>
	<br>

<a href="*">
	<!-- <img src="../images/search_friend_btn.gif" class="search"> -->
	<input type="submit" value="合致候補を探す">
</a>
</form>
	

	

</div>



	<footer style="width: 100%; background-color: #f8f2f2 ; float: left; padding-bottom: 20px;" >
	       <?php 

		require('../footer.html'); 

		?>
    </footer>

</body>
</html>
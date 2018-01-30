<?php
session_start();
require('../../dbconect_gatch.php');

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

        $_SESSION['login_user']['conditions'] = $_POST['conditions'];


		header('Location:../TOP/top_push.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>コンディション設定ページ</title>
	<!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========stylesheet======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.css">
	<!-- ========共通CSS======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
	<!-- Theme style  -->
	<link rel="stylesheet" type="text/css" href="../../asset/rin/Rin-3.3.7-2/dist/css/cushion_page.css">
</head>
<body style="margin-top: 115px;">
	<?php require('../../asset/head3.php'); ?>

	<div id="heading">
		<p>ようこそ、暇人の　
			<span style="color: red"><?php echo $_SESSION['login_user']['user_name'] ?>
			</span>　
		さん</p>
	</div>

	<div class="container">
	<div class="row">
	<div class="col-xs-6">
	
		<h3 class="theme" style="margin-bottom: 30px;">今のあなたの気分は？ (ひとつだけ選択)</h3>

   			<form action="" method="POST">
   	
   	<!-- ラジオボタン1段目 -->
   		<div class="container">
		<div class="row">
		<div class="col-xs-2">

   			<p>
   			<input type="radio" name="conditions" value="i_nomi.gif">
   			<span class="condition">
   			<img src="../../asset/images/i_nomi.gif" style="width: 45px;">
   			</span>
   			<span class="conditions">飲みに行こ
   			</span>
   		</div>

   		<div class="col-xs-3">
   			
   			<input type="radio" name="conditions" value="i_drive.gif">
   			<span class="condition">
   			<img src="../../asset/images/i_drive.gif" style="width: 45px;">
   			</span>
   			ドライブ行こ
   			</p>

   		</div>
   		</div>
   		</div>

		<br>

   		<div class="container">
		<div class="row">
		<div class="col-xs-2">

   			<p>
   			<input type="radio" name="conditions" value="i_takunomi.gif  ">
   			<span class="condition">
   			<img src="../../asset/images/i_takunomi.gif" style="width: 45px;">
   			</span>
   			宅飲みしよ

		</div>

		<div class="col-xs-3">
			<input type="radio" name="conditions" value="i_game.gif">
			<span class="condition">
			<img src="../../asset/images/i_game.gif" style="width: 45px;">
   			</span>
   			ゲームしよ
   			</p>

   		</div>
   		</div>
   		</div>

   		<br>

		<div class="container">
		<div class="row">
		<div class="col-xs-2"> 		
   			<p>
			<input type="radio" name="conditions" value="i_cafe.gif">
			<span class="condition">
			<img src="../../asset/images/i_cafe.gif" style="width: 45px;">
   			</span>
   			カフェろ

   		</div>
   			
   		<div class="col-xs-3">

			<input type="radio" name="conditions" value="i_meshi.gif">
			<span class="condition">
			<img src="../../asset/images/i_meshi.gif" style="width: 45px;">
   			</span>
   			メシ行こ
   			</p>

   		</div>
   		</div>
   		</div>

			<br>

		<div class="container">
		<div class="row">
		<div class="col-xs-2">

			<p>
			<input type="radio" name="conditions" value="i_kaimono.gif">
			<span class="condition">
			<img src="../../asset/images/i_kaimono.gif" style="width: 45px;">
   			</span>
   			買い物行こ

   		</div>

   		<div class="col-xs-3">

			<input type="radio" name="conditions" value="i_karaoke.gif">
			<span class="condition">
			<img src="../../asset/images/i_karaoke.gif" style="width: 45px;">
   			</span>
   			カラオケ行こ
   			</p>

   		</div>
   		</div>
   		</div>

   			<br>

   		<div class="container">
		<div class="row">
		<div class="col-xs-6">

   			<p>
			<input type="radio" name="conditions" value="i_sonota.gif">
			<span class="condition">
			<img src="../../asset/images/i_sonota.gif" style="width: 45px;">
   			</span>
   			その他
   			</p>

   		</div>
   		</div>
   		</div>

        </p>
    </div>
    	
    

    <div class="col-xs-6">

	<h3 class="theme" style="margin-bottom: 30px;">ログインする前につぶやいておきましょう</h3>
		
		<p>20文字以内で入力できます</p>
		<textarea style="width:85%;" name="tubuyaki" placeholder="例：金沢駅前で暇してます"></textarea>
	<br>
	<br>

		<a href="*">
			<!-- <img src="../images/search_friend_btn.gif" class="search"> -->
		<input type="submit" class="btn btn-primary btn-lg" value="合致候補を探す">
		</a>
	</div>
			</form>
	</div>
	</div>
</div>

<br>
<br>

<?php require('../../asset/footer.php'); ?>
	
</body>
</html>
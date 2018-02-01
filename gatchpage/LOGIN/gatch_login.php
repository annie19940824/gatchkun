<?php
session_start();
require('../../dbconect_gatch.php');
$username='';
$email='';
$password='';
if(!empty($_POST)){ // [J-01]
	// このif文の中はログインボタンを押したときのみ動作する
	if (!empty($_POST['login'])) {

		// $username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//エラー件数チェック
		$errors = array();

		/*if($username == ''){ // [J-09]
			$errors['username']='blank';
		} // [J-09]usernameがブランクかどうかの条件閉鎖*/

		if($email == ''){ // [J-02]
			$errors['email']='blank';
		} // [J-02]emailがブランクかどうかの条件閉鎖

		if($password == ''){ // [J-03]
			$errors['password']='blank';
		} // [J-03]passwordがブランクかどうかの条件閉鎖

		elseif( strlen($password) < 6 ){ // [J-04]
			$errors['password']='length';
		} // [J-04]passwordの文字数に関する条件閉鎖

		if(empty($errors)){ // [J-05]

		// DBと入力項目が一致するかチェックを行う
		// SQL文を作成する
		$sql = "SELECT * FROM `gatchi_users`
				WHERE `email` = ?
				AND `password` = ?";

		// ?マークを代入する
		$data = array($email,$password);
		$stmt = $dbh->prepare($sql);
		// SQL文を準備する
		$stmt->execute($data);
		// ?マークを代入して実行

		// SELECT文はFETCHしないと取得できない
		// 1行取得する
		$record = $stmt->fetch(PDO::FETCH_ASSOC);
		if($record){ // [J-06]

			// $record['id'] -> DBの値
			// $record['username'] -> DBの値
			// $record['email'] -> DBの値
			// $record['password'] -> DBの値
			// これらはすべてDBのカラムとカラムに入っている値が$recordに入っている状態

			//すべてのユーザーデータが入った変数$recordを一時的に保持しておく
			$_SESSION['login_user'] = $record;

			// リダイレクト (ポスイト送信を破棄してリンクを飛ばす)
			header('Location: cushion_page.php');
			exit();

		} // [J-06] リダイレクト条件閉鎖

		else{ //[J-07]
			$errors['login'] = 'ng';
			// echo 'そんなユーザは登録されてないですよ<br>';
		} // [J-07]リダイレクトされなかったとき閉鎖
		} // [J-05]エラーバリデーション閉鎖
	}


	// このif文の中は会員登録送信ボタンを押したときのみ動作する
	if (!empty($_POST['create'])) {
		echo 'ユーザー作ります<br>';

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// エラーチェック
		$errors = array();

		// バリデーション
		if($username == ''){
			$errors['username']='blank';
		}

		if($email == ''){
			$errors['email']='blank';
		}

		if($password == ''){
			$errors['password']='blank';
		}elseif (strlen($password) < 6) {
			$errors['password']='length';
		}


	//画像のバリデーション
	if(!empty($_FILES['profile_image']['name'])){
		// ファイル名があったら処理開始
		//画像の拡張子をチェックする
		//拡張子の後ろから３文字を抜き出す

		$filename=$_FILES['profile_image']['name'];
		$ext = substr($filename,-3);

		if($ext != 'jpg' && $ext !='png' && $ext !='gif'){
			$errors['profile_image'] = 'extention';
		}
	}else{
		$errors['profile_image'] = 'blank';
	}

	if(empty($errors)){

		move_uploaded_file($_FILES['profile_image']['tmp_name'],'profile_image/'.$_FILES['profile_image']['name']);
		// これで画像を保存することができる

		// エラーがない場合はセッションにもデータを保存してあげる
		$_SESSION['user_info']['id']=$user_id;
		$_SESSION['user_info']['username']=$username;
		$_SESSION['user_info']['email']=$email;
		$_SESSION['user_info']['password']=$password;
		$_SESSION['user_info']['profile_image']=$filename;

		// リダイレクト
		header('Location: check.php');
		exit();


	}

	}

	}

 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン画面</title>
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========stylesheet======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.css">
	<!-- ========共通CSS======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
</head>
<body style="margin-top: 145px;">
<?php require('../../asset/head2.php'); ?>

	<div class="container">
	<div class="row">
	<div class="col-xs-6">

	<form action="" method="POST" accept-charset="utf-8">
	<?php if(isset($errors['login']) && $errors['login'] == 'ng'){ ?>
	<div class="alert alert-danger">
		Eメールアドレスまたはパスワードが違います
	</div>
	<?php } ?>

	<!-- メールアドレス入力エリア -->
	<h3 class="theme">会員ログイン</h3>
	<label>メールアドレス</label><br>
		<input style="width: 80%" type="text" name="email" placeholder="Eメールアドレス" value="<?php echo $email; ?>"><br>

	<?php if(isset($errors['email']) && $errors['email'] == 'blank'){ ?>
	<div class="alert alert-danger">
	Eメールアドレスを入力してください</div>
	<?php } // [J-08]Eメールアドレスのブランク確認閉鎖 ?>

	<br>

	<!-- パスワード入力エリア -->
	<label>パスワード
		<span class="hosoku">※6文字以上の半角英数字で入力</span>
	</label><br>
		<input type="text" name="password">
		<br>

	<?php if(isset($errors['password']) && $errors['password'] == 'blank'){ // [J-09] ?>
	<div class="alert alert-danger">
	パスワードを入力してください</div>
	<?php } // [J-09]パスワードのブランク確認閉鎖  ?><br>
	<input type="hidden" name="login" value="login">
	<!-- 送信ボタンエリア -->
	<input type="submit" value="ログイン" class="btn btn-primary btn-s">

	</form>
	</div>


	<div class="col-xs-6">
	<h3 class="theme">はい合致〜！ 新規会員登録</h3>

	<form action="" method="POST" enctype="multipart/form-data">

	<label>ユーザー名</label><br>
	<input style="width: 80%" type="text" name="username" placeholder="例：合致ときめき子" value="<?php echo $username; ?>">
	<br>

	<?php if(isset($errors['username']) && $errors['username'] == 'blank'){ ?>
	<div class="alert alert-danger">
	ユーザー名を入力してください
	</div>
	<?php } ?>
	<br>

	<!-- メールアドレス入力エリア -->
	<label>メールアドレス</label><br>
		<input style="width: 80%" type="text" name="email" placeholder="Eメールアドレス" value="<?php echo $email; ?>"><br>

	<?php if(isset($errors['email']) && $errors['email'] == 'blank'){ ?>
	<div class="alert alert-danger">
	Eメールアドレスを入力してください
	</div>
	<?php } ?>
	<br>

	<!-- パスワード入力エリア -->
	<label>パスワード
		<span class="hosoku">※6文字以上の半角英数字で入力</span>
	</label>
	<br>
	<input type="text" name="password">
	<br>

	<?php if(isset($errors['password']) && $errors['password'] == 'blank'){ ?>
	<div class="alert alert-danger">
	パスワードを入力してください
	</div>
	<?php } ?>
	<br>

	<!-- プロフィール画像アップロードエリア -->
	<label>プロフィール画像</label>
	<input type="file" name="profile_image" accept="image/*">
	<br>

	<?php if(isset($errors['profile_image']) && $errors['profile_image'] == 'blank'){ ?>
	<div class="alert alert-danger">
	画像を選択してください</div>
	<?php } ?>

	<?php if(isset($errors['profile_image']) && $errors['profile_image'] == 'extention'){ ?>
 	<div class="alert alert-danger">
 	使用できる拡張子は、「jpg」，「png」，「gif」のみです。
 	</div>
 	<?php } ?>

 	<input type="hidden" name="create" value="create">

 	<!-- 送信ボタンエリア -->
 	<input type="submit" name="登録確認" class="btn btn-primary btn-s">

 	</form>

	</div>

	</div>

</div>
<br>
<br>

<?php require('../../asset/footer.php'); ?>

</body>
</html>
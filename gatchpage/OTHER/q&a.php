<?php

session_start();
require('../../dbconect_gatch.php');


$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>個人情報保護方針</title>
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========stylesheet======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.css">
	<!-- ========共通CSS======== -->
	<link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
</head>
<body style="margin-top: 155px;">
<?php require('../../asset/head5.php'); ?>

<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<div id="main-box">

		<h3 class="theme">よくある質問</h3>
		<br>
		<h3>１．ユーザーについて</h3>
		<br>
		<h5 class="read">Q.会員登録情報は変更できますか？</h5>
		<p>A.要検討</p>
		<br>
		<h5 class="read">Q.一度退会すると二度と会員登録することはできませんか？</h5>
		<p>A.要検討</p>
		<br>

		<hr>
		<h3>２．トップページについて</h3>
		<br>
		<h5 class="read">Q.トップページに表示されている友達はログインしている人だけですか？</h5>
		<p>A.ログインしている友人だけです。</p>
		<br>
		<h5 class="read">Q.暇人ユーザー、おすすめユーザー、リクエストユーザーの違いを教えてください。</h5>
		<p>A.暇人ユーザーには、あなたの友達で、現在ログインしている人たちが表示されます。
		おすすめユーザーには、ログインしている友人のうち、コンディションがマッチしている友人が表示		されます。
		リクエストユーザーには、ログインしている友人のうち、あなたにリクエストを送った人たちが表示		されます。
		</p>
		<br>

		<hr>
		<h3>３．マイページについて</h3>
		<br>
		<h5 class="read">Q.My page では何ができますか？</h5>
		<p>A.My pageでは、コンディションの選択、20文字のつぶやき、プロフィール編集、あなたのラ		ンキング、友達追加用のあなたのIDの発行ができます。</p>
		<br>

		<hr>
		<h3>４．Users profileについて</h3>
		<br>
		<h5 class="read">Q.Users profile では何が見れますか？</h5>
		<p>A.Users profileでは友人のプロフィール、友人のコンディション、友人のランキングをみる		ことができます。また、ここから、リクエストを送信することができます。</p>
		<br>

		<hr>
		<h3>５．コンディションについて</h3>
		<br>
		<h5 class="read">Q.コンディションはどのようにして設定できますか？</h5>
		<p>A.ログイン後、またはMy pageから設定できます</p>
		<br>
		<h5 class="read">Q.自分にあったコンディションがないときはどうすればいいですか？</h5>
		<p>A.その他を設定して、20文字のつぶやきであなたの気持ちを表現してみてもいいかもしれません</p>
		<br>

		<hr>
		<h3>６．合致について</h3>
		<br>
		<h5 class="read">Q.合致するとどうなりますか？</h5>
		<p>A.合致すると、自動的にチャット画面に切り替わります。</p>
		<br>
		<h5 class="read">Q.合致した後にキャンセルはできますか？</h5>
		<p>A.チャットルームの下部のキャンセルボタンからキャンセルしてください。
		キャンセル後は、自動的にトップページに戻ります。
		</p>
		<br>
		<h5 class="read">Q.複数人と合致する機能はありますか？</h5>
		<p>A.あくまで一対一の合致アプリですので、複数人と合致したい場合は、再度ログインしなおして		暇人を見つけてください。</p>
		<br>
		<h5 class="read">Q.どのようにしてリクエストを出すのですか？</h5>
		<p>A.暇人ユーザーの中から、リクエストを送信したい場合は、一度、その友人のUsers 		profileに移動していただき、そこからリクエストを送信してください。
		おすすめユーザに対してリクエストを送る場合は、Users profileに移動する必要はありません。
		</p>
		<br>
		<h5 class="read">Q.一度出したリクエストはキャンセルできますか？</h5>
		<p>A.要検討</p>
		<br>
		<h5 class="read">Q.複数人からリクエストが来ている場合はどうすればいいですか？</h5>
		<p>A.リクエストユーザーの中から一名だけ選ぶことができます。リクエストを承認した時点で、そ		れ以外のユーザーからのリクエストは表示されなくなります。</p>
		<br>

		<hr>
		<h3>７．友達について</h3>
		<br>
		<h5 class="read">Q.どこから自分のIDを発行できますか？</h5>
		<p>A.My pageからID発行ページに移動してください。</p>
		<br>
		<h5 class="read">Q.どのようにして友達を追加するのですか？</h5>
		<p>A.設定から友達追加ページに移動していただき、そこに友人のIDを入力してください。</p>
		<br>
		<h5 class="read">Q.友達を追加するとどうなりますか？</h5>
		<p>A.友達を追加すると、今後、友人がログインするとあなたのトップページに友人が表示されます。</p>
		<br>
		<h5 class="read">Q.友達を止めるにはどうすればいいですか？</h5>
		<p>A.要検討</p>
		<br>
		<h5 class="read">Q.ID発行回数に制限はありますか？</h5>
		<p>A.回数に制限はありませんが、1つのIDにつき1名まで使用することができます。</p>
		<br>

		<hr>
		<h3>８．その他機能</h3>
		<br>
		<h5 class="read">Q.ランキングでは何がみれますか？</h5>
		<p>A.あなたのログイン情報や、合致のデータをもとに、全ユーザーの中でのあなたの相対的なポジションを確認できます。</p>
		<br>
		<br>
		</div>
	</div>
	</div>
</div>

<?php require('../../asset/footer.php'); ?>


</body>
</html>
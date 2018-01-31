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
<?php require('../../asset/head4.php'); ?>

<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<div id="main-box">

				<h3 class="theme">運営者情報</h3>
				
				<h5 class="read">サイト名</h5>
				<p>はい、合致〜</p>
				<br>

				<h5 class="read">運営者</h5>
				<p>はい、合致〜バッチのみんな</p>
				<br>

				<h5 class="read">住所</h5>
				<p>セブ島</p>
				<br>

				<h5 class="read">連絡先</h5>
				<p>tom@tom</p>
				<br>

				<h5 class="read">運営目的</h5>
				<p>暇人を最速でマッチさせます！</p>
			</div>
		</div>
	</div>

	</div>
	<br>
	<br>
	<?php require('../../asset/footer.php'); ?>

</body>
</html>
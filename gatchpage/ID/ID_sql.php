<?php

$loginuser = $_SESSION['login_user']['user_id'];
// ID入力
	if (!empty($_POST['idInput'])) {

		$sql ="SELECT `random`
			   FROM   `friend-add`
			   WHERE  `inputer_id` IS NULL";
		$data = array();
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		$random = $stmt->fetchall();
		$inputedId = $_POST['idInput'];

		foreach ($random as $key) {
			if ($key['random'] == $inputedId) {

				$inputer = $loginuser; // ここを$_SESSION変更する
				$sql ="UPDATE `friend-add`
			   		   	  SET `inputer_id` = ?,
			   		   	      `relation_created` = NOW()
			   		    WHERE `random` = ?";
				$data = array($inputer,$inputedId);
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);

				break;
			}else{
				continue;
			}
		} // foreach
		header('Location:ID_create_input.php');
		exit();
	} // if (!empty($_POST))



/*ID出力画面*/
// $loginuser = 30;

	$str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
	$r_str = null;


	for ($i = 0; $i < 30; $i++) {
		$r_str .= $str[rand(0, count($str) - 1)];
	}
	// ここで$_strがDBにないか確認
	if (!empty($_POST['onetimeId'])) { // $_strをコピーしたら

		$sql ="INSERT INTO `friend-add`
			   SET `creater_id` = ?,
			   	   `random` = ?,
	 			   `random_created` = NOW()";
		$data = array($loginuser,$_POST['onetimeId']);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
	}

	// コピー履歴
	$sql = "SELECT `random`,`random_created`
			FROM   `friend-add`
			WHERE  `creater_id` = ?
	       ";

	$data = array($loginuser);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$created_id = $stmt->fetchall();
?>
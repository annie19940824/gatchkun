<?php
	// ログインしているユーザーの中で
	// 自分のコンディションと同じユーザーをすべて表示

	$sql = "SELECT *
			FROM  `gatchi_users`
			WHERE `login`= 1
			AND   `conditions` =?
			AND   `user_id` != ?
		   ";
	$data = array($login_condition,$login_id);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$condition_gatch = $stmt->fetchall();
?>
<?php
	// 自分以外のログインしている人を全員表示する
	// usersテーブルからデータを取得してfetchallしてforeachで表示
	$sql = "SELECT *
			FROM   `gatchi_users`
			WHERE  `login` = 1
			AND    `user_id` != ?
		   ";
	$data = array($login_id);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$login_users = $stmt->fetchall();
?>